<?php
////

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
//use core\Validator;
use core\SessionUtils;
//use core\RoleUtils;
//use app\forms\searchForm;

////

class BookStatusCtrl
{
    private $bookID;
    private $userID;
    private $transactionID;

    public function __construct()
    {
        //$this->form = new SearchForm();
    }

    public function action_bookReserve() {
        //zapisz taransakcje; available--
        if($this->validateID()) {
            $this->userID = App::getDB()->get("User","idUser",["login" => $_SESSION["loggedAs"]]);
            try {
                $available = App::getDB()->get("Book", "available",["idBook" => $this->bookID]);
                if($available>0) {
                    //zmniejsz ilość dostępnych
                    App::getDB()->update("Book",[
                        "available" => $available-1,
                    ],[
                        "idBook" => $this->bookID
                    ]);
                    //zapisz transakcję
                    App::getDB()->insert("Transaction",[
                        "type" => "reserve",
                        "transactionDate" => date("Y-m-d"),
                        "Book_idBook" => $this->bookID,
                        "User_idUser" => $this->userID
                    ]);
                } else {
                    Utils::addErrorMessage("Nie ma dostępnych egzemplarzy");
                }

                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }


        //
        if (!App::getMessages()->isError()) { 
            Utils::addInfoMessage("Zarezerwowano pomyślnie");
        } 
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("listBooks");
    }

    public function action_bookRent() {
        //z listBooks
        //zapisz taransakcje; available--
        //---------------------xxxxxx usuń rezerwację jeśli była
        if($this->validateID() && $this->validateLogin()) {

           try {
                $available = App::getDB()->get("Book", "available",["idBook" => $this->bookID]);
                if($available>0) {
                    //zmniejsz ilość dostępnych
                    App::getDB()->update("Book",[
                        "available" => $available-1,
                    ],[
                        "idBook" => $this->bookID
                    ]);
                    //zapisz transakcję
                    App::getDB()->insert("Transaction",[
                        "type" => "rent",
                        "transactionDate" => date("Y-m-d"),
                        "Book_idBook" => $this->bookID,
                        "User_idUser" => $this->userID
                    ]);
                } else {
                    Utils::addErrorMessage("Nie ma dostępnych egzemplarzy");
                }

                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            } 
        }
        

        if (App::getMessages()->isError()) { //gdy są błędy wróć do widoku
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("listBooka");
        } else { 
            Utils::addInfoMessage("Wyporzyczono pomyślnie");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("listBooks");
        }
    }

    public function action_bookRentReserved() {
        //usuń rezerwację 
        //wyporzycz(dodaj transakcje)
        //NIE zmnaiajszaj available, już zmniejszona
        //przyjmuje idTransaction z clean URL
        if($this->validateTransaction()){
            try {
                //zapisz transakcję
                App::getDB()->insert("Transaction",[
                    "type" => "rent",
                    "transactionDate" => date("Y-m-d"),
                    "Book_idBook" => $this->bookID,
                    "User_idUser" => $this->userID
                ]);
                if (!App::getMessages()->isError()) {
                    //delete reservation
                    App::getDB()->delete("Transaction",["idTransaction" => $this->transactionID]);
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            } 
        }

        if (!App::getMessages()->isError()) { 
            Utils::addInfoMessage("Wyporzyczono pomyślnie");
        } 
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("listReserved");
        
    }

    public function action_bookReturn() {
        //zapisz transakcje; available++

        //przyjmuje idTransaction z clean URL

        if($this->validateTransaction()){
            try {       
                $available = App::getDB()->get("Book", "available",["idBook" => $this->bookID]);
                //zmniejsz ilość dostępnych
                App::getDB()->update("Book",[
                    "available" => $available+1,
                ],[
                    "idBook" => $this->bookID
                ]);
                //zapisz transakcję
                App::getDB()->insert("Transaction",[
                    "type" => "return",
                    "transactionDate" => date("Y-m-d"),
                    "Book_idBook" => $this->bookID,
                    "User_idUser" => $this->userID
                ]);
                //zaktualizuj starą transakcję
                App::getDB()->update("Transaction",[
                    "type" => "rented&returned",
                ],[
                    "Book_idBook" => $this->bookID,
                    "User_idUser" => $this->userID
                ]);
                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            } 
        }

        //
        if (App::getMessages()->isError()) { 
            Utils::addInfoMessage("Zwrócono pomyślnie");
        }
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo("listRented");
    }

    ////
    public function validateID()
    {
        $this->bookID = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        if (App::getDB()->get("Book", "idBook", ["idBook" => $this->bookID]) == null) {
            Utils::addErrorMessage("Brak ksążki o podanym ID");
        }

        return !App::getMessages()->isError();
    }

    public function validateTransaction()
    {
        $this->transactionID = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        if (App::getDB()->get("Transaction", "idTransaction", ["idTransaction" => $this->transactionID]) == null) {
            Utils::addErrorMessage("Brak ksążki o podanym ID");
        } else {
            $this->bookID = App::getDB()->get("Transaction","Book_idBook",["idTransaction" => $this->transactionID]);
            $this->userID = App::getDB()->get("Transaction","User_idUser",["idTransaction" => $this->transactionID]);
        }

        return !App::getMessages()->isError();
    }

    public function validateLogin()
    {
        $login = ParamUtils::getFromPost("login", ["required" => true, "required_message" => "nie podano loginu"]);
        $this->userID = App::getDB()->get("User", "idUser", ["login" => $login]);
        if ( $this->userID == null) {
            Utils::addErrorMessage("Brak użytkownika o takim loginie");
        }

        return !App::getMessages()->isError();
    }

}
?>