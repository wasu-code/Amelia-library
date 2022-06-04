<?php
////

namespace app\controllers;

use core\App;
use core\Utils;
//use core\ParamUtils;
use core\Validator;
//use core\SessionUtils;
use core\RoleUtils;
use app\forms\SearchForm;

////

class BookListCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new SearchForm();
    }

    ////

    public function action_listBooks() {
        $search_params = [];
        $v = new Validator();
        $this->form->title = $v->validateFromPost("sf_title");
        if ( isset($this->form->title) && strlen($this->form->title) > 0) {
			$search_params['title[~]'] = $this->form->title;
		}

        $currentPage = 0;
        $recordsLimit = 2;
        $currentPage = $v->validateFromPost("page",["int" => true]);
        $recordsLimit = $v->validateFromPost("limit",["int" => true]);
        if ($currentPage < 0 || !is_int($currentPage)) {
			$currentPage = 0;
		}
        if ($recordsLimit < 1 || !is_int($recordsLimit)) {
            $recordsLimit = 10;
        }

        $num_params = sizeof($search_params);
		if ($num_params > 1) {
			$where = [ "AND" => &$search_params ];
		} else {
			$where = &$search_params;
		}
		//dodanie frazy sortującej
		$where ["ORDER"] = "title";
        $where ["LIMIT"] = [$currentPage*$recordsLimit,$recordsLimit];



        try {
            $records = App::getDB()->select("book", ["idBook","title","publicationDate","genere","available"],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu z bazy');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign("SearchForm", $this->form);
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->assign("page", $currentPage);
        App::getSmarty()->assign("limit", $recordsLimit);
        if(RoleUtils::inRole("user")) {
            App::getSmarty()->display("BookList-user.tpl");  
        } else if (RoleUtils::inRole("mod")) {
            App::getSmarty()->display("BookList-mod.tpl");  
        } else if (RoleUtils::inRole("admin")) {
            App::getSmarty()->display("BookList-admin.tpl");  
        } else {
            App::getSmarty()->display("BookList.tpl");  
        }
        
    }

    public function action_listReserved() {
        //sprawdź transakcje i idBook tam gdzie reserved
        //wyświetl z book wskazanych przez reserved w transakcjach
        try {
            $records = [];
            $tList = App::getDB()->select("transaction",[
                "user_idUser",
                "book_idBook",
                "transactionDate",
                "idTransaction"
            ],["type" => "reserve"]);

            for ($i=0;$i<count($tList);$i++) {
                $records[$i]["title"] = App::getDB()->get("book","title",["idBook" => $tList[$i]["book_idBook"]]);
                $records[$i]["login"] = App::getDB()->get("user","login",["idUser" => $tList[$i]["user_idUser"]]);
                $records[$i]["date"] = $tList[$i]["transactionDate"];
                $records[$i]["idTransaction"] = $tList[$i]["idTransaction"];
            }

            //$records = App::getDB()->select("transaction", "Book_idBook", ["type" => "reserve"]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu z bazy');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->display("ReservedList.tpl");
    }

    public function action_listRented() {
        try {
            $records = [];
            $tList = App::getDB()->select("transaction",[
                "user_idUser",
                "book_idBook",
                "transactionDate",
                "idTransaction"
            ],["type" => "rent"]);

            for ($i=0;$i<count($tList);$i++) {
                $records[$i]["title"] = App::getDB()->get("book","title",["idBook" => $tList[$i]["book_idBook"]]);
                $records[$i]["login"] = App::getDB()->get("user","login",["idUser" => $tList[$i]["user_idUser"]]);
                $records[$i]["date"] = $tList[$i]["transactionDate"];
                $records[$i]["idTransaction"] = $tList[$i]["idTransaction"];
            }

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu z bazy');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->display("RentedList.tpl");
    }

    public function action_bookDetails() {
        //widok dodać
        //+dodać pokaż więcej w widoku listy
    }

    ///TST AREA
    public function action_tst_transactions() {
        $records = App::getDB()->select("transaction", ["idTransaction","type","transactionDate","user_idUser","book_idBook"]);
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->display("tst_BookList.tpl");
    }



}
?>