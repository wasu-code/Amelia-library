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
    private $v;
    public $currentPage = 0;
    public $recordsLimit = 2;

    public function __construct()
    {
        $this->form = new SearchForm();
        $this->v = new Validator();
    }

    ////
    public function pagingControl() {
        $this->currentPage = $this->v->validateFromPost("page",["int" => true]);
        $this->recordsLimit = $this->v->validateFromPost("limit",["int" => true]);
        if ($this->currentPage < 0 || !is_int($this->currentPage)) {
			$this->currentPage = 0;
		}
        if ($this->recordsLimit < 1 || !is_int($this->recordsLimit)) {
            $recordsLimit = 10;
        }

        App::getSmarty()->assign("page", $this->currentPage);
        App::getSmarty()->assign("limit", $this->recordsLimit);
    }

    public function listing() {
        $search_params = [];
        //$v = new Validator();
        $this->form->title = $this->v->validateFromPost("sf_title");
        if ( isset($this->form->title) && strlen($this->form->title) > 0) {
			$search_params['title[~]'] = $this->form->title;
		}

        $this->pagingControl();

        $num_params = sizeof($search_params);
		if ($num_params > 1) {
			$where = [ "AND" => &$search_params ];
		} else {
			$where = &$search_params;
		}
		//dodanie frazy sortującej
		$where ["ORDER"] = "title";
        $where ["LIMIT"] = [$this->currentPage*$this->recordsLimit,$this->recordsLimit];



        try {
            $records = App::getDB()->select("book", ["idBook","title","publicationDate","genere","available"],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu z bazy');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getSmarty()->assign("SearchForm", $this->form);
        App::getSmarty()->assign("lista", $records);
        //App::getSmarty()->assign("page", $currentPage);
        //App::getSmarty()->assign("limit", $recordsLimit);
        if(RoleUtils::inRole("user")) {
            $role="user";
            //App::getSmarty()->display("BookList-user.tpl");  
        } else if (RoleUtils::inRole("mod")) {
            $role="mod";
            //App::getSmarty()->display("BookList-mod.tpl");  
        } else if (RoleUtils::inRole("admin")) {
            $role="admin";
            //App::getSmarty()->display("BookList-admin.tpl");  
        } 
        App::getSmarty()->assign("role", $role);
        //App::getSmarty()->display("BookList.tpl");  
        
        
    }

    public function action_listBooks() {
        $this->listing();
        App::getSmarty()->display("BookList.tpl");
    }

    public function action_listBooks_table() {
        $this->listing();
        App::getSmarty()->display("BookList-table.tpl");
    }

    public function listingReserved() {
        //sprawdź transakcje i idBook tam gdzie reserved
        //wyświetl z book wskazanych przez reserved w transakcjach
        try {
            $records = [];


            //obtain list of IDs of reserved books and users
            $tList = App::getDB()->select("transaction",[
                "user_idUser",
                "book_idBook",
                "transactionDate",
                "idTransaction"
            ],["type" => "reserve"]);

            //get data for usersand books with IDs from above
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

        //create table taking into account only those that match search parameters
        $this->form->title = $this->v->validateFromPost("sf_title");
        $this->form->login = $this->v->validateFromPost("sf_login");
        $records2 = [];

        for ($i=0, $j=0;$i<count($records);$i++) {
            if (!empty($this->form->title) && str_contains($records[$i]["title"], $this->form->title)) {
                $records2[$j]=$records[$i];
                $j++;
            }else if (!empty($this->form->login) && str_contains($records[$i]["login"], $this->form->login)) {
                $records2[$j]=$records[$i];
                $j++;
            }
        }

        if (empty($this->form->title) && empty($this->form->login)) {
            $records2 = $records;
        }

        ///

        $this->pagingControl();
        if (sizeof($records2)>$this->recordsLimit) {
            $records2 = array_slice($records2,$this->currentPage*$this->recordsLimit,$this->recordsLimit); //array,offset-start,length
        }
        App::getSmarty()->assign("lista", $records2);
        App::getSmarty()->assign("SearchForm", $this->form);
        //App::getSmarty()->display("ReservedList.tpl");
    }

    public function action_listReserved() {
        $this->listingReserved();
        App::getSmarty()->display("ReservedList.tpl");
    }

    public function action_listReserved_table() {
        $this->listingReserved();
        App::getSmarty()->display("ReservedList-table.tpl");
    }

    public function listingRented() {
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
        
        $this->pagingControl();
        if (sizeof($records)>$this->recordsLimit) {
            $records = array_slice($records,$this->currentPage*$this->recordsLimit,$this->recordsLimit); //array,offset-start,length
        }
        App::getSmarty()->assign("lista", $records);
        //App::getSmarty()->display("RentedList.tpl");

    }

    public function action_listRented() {
        $this->listingRented();
        App::getSmarty()->display("RentedList.tpl");
    }

    public function action_listRented_table() {
        $this->listingRented();
        App::getSmarty()->display("RentedList-table.tpl");
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