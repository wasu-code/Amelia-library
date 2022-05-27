<?php
////

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\SessionUtils;
use core\RoleUtils;
use app\forms\BookEditForm;

////

class BookEditCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new BookEditForm();
    }

    public function action_bookAdd() {
        Utils::addInfoMessage("Wpisz dane dla nowej książki");
        App::getSmarty()->assign("action", "add");
        App::getSmarty()->display("BookEdit.tpl");
    }

    public function action_bookAddDB() {

        if ($this->validateFromPost()) {
            //+sprawdź czy książka już istnieje
            /*$book = App::getDB()->select("book","idBook",[
                "title" => $this->form->title,
                "publicationDate" => $this->form->published,
            ]);
            if($book==null){
                for ($i=0;$i<count($book);$i++) {
                    $author = App::getDB()->get("Book_has_Author","Author_idAuthor",["Book_idBook"==$book[i]["idBook"]]);
                    //if($author==$this->form->name)
                };
                

                Utils::addErrorMessage('Książka o takim tytule, dacie publikacji i autorze znajduje się już w bazie');
            }*/
        }

        if (!App::getMessages()->isError()) { //jeśli nie ma błędów
            try {
                
                App::getDB()->insert("book", [
                    "title" => $this->form->title,
                    "publicationDate" => $this->form->published,
                    "description" => $this->form->description,
                    "quantity" => $this->form->quantity,
                    "available" => $this->form->available,
                    "genere" => $this->form->genere
                ]);

                //get book ID
                $bookID = App::getDB()->get("book","idBook", [
                    "title" => $this->form->title,
                    "publicationDate" => $this->form->published,
                    "description" => $this->form->description,
                    "quantity" => $this->form->quantity,
                    "available" => $this->form->available,
                    "genere" => $this->form->genere
                ]);


                //sprawdź czy autor w bazie
                $authorID = App::getDB()->get("Author","idAuthor",[
                    "firstName" => $this->form->name,
                    "lastName" => $this->form->surname
                ]);

                if($authorID == null) {//stwórz autora jak nie w bazie
                    App::getDB()->insert("Author",[
                        "firstName" => $this->form->name,
                        "lastName" => $this->form->surname
                    ]);
                    $authorID = App::getDB()->get("Author","idAuthor",[
                        "firstName" => $this->form->name,
                        "lastName" => $this->form->surname
                    ]);
                } 

                //przypisz autora do książki
                App::getDB()->insert("Book_has_Author",[
                    "Book_idBook" => $bookID,
                    "Author_idAuthor" => $authorID
                ]);

                
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu książki lub autora do bazy');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        ////
        if (App::getMessages()->isError()) { //gdy są błędy wróć do widoku
            App::getSmarty()->assign("form", $this->form);
            App::getSmarty()->assign("action", "add");
            App::getSmarty()->display("BookEdit.tpl");
        } else { //dodaj do bazy
            Utils::addInfoMessage("Dodano nową książkę do bazy");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("homepage");
        }
    }

    public function action_bookDeleteDB() {
        if ($this->validateID()) {
            try {
                //usuń powiązanie
                App::getDB()->delete("Book_has_Author", ["Book_idBook" => $this->form->id]);
                //usuń
                App::getDB()->delete("Book", ["idBook" => $this->form->id]);
                //info
                Utils::addInfoMessage("Usunięcie powiodło się");
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania książki z bazy');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            } finally {
                SessionUtils::storeMessages();
                App::getRouter()->redirectTo("listBooks");
            }
        } else {
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("listBooks");
        }
    }

    public function action_bookEdit() {

    }

    public function action_bookEditDB() {

    }

    public function action_bookReserve() {
        //zapisz taransakcje; available--
    }

    public function action_bookRent() {
        //zapisz taransakcje; available--
        //usuń rezerwację jeśli była
    }

    public function action_bookReturn() {
        //zapisz transakcje; available++
    }


    ////
    public function validateFromPost($pass = true)
    {
        $v = new Validator();
        $this->form->id = $v->validateFromPost("id");
        $this->form->title = $v->validateFromPost("title", ['required' => true, 'required_message' => 'Nie podano tytułu']);
        $this->form->published = $v->validateFromPost("published", ['required' => true, 'required_message' => 'Nie podano daty publikacji']);
        $this->form->description = $v->validateFromPost("description");
        $this->form->genere = $v->validateFromPost("genere");
        $this->form->quantity = $v->validateFromPost("quantity", ['int' => true]);
        $this->form->available = $v->validateFromPost("available", ['int' => true]);

        //$this->form->author_id = $v->validateFromPost("author_id", ['required' => true, 'required_message' => 'Nie podano id autora']);
        $this->form->name = $v->validateFromPost("name", ['required' => true, 'required_message' => 'Nie podano imienia autora']);
        $this->form->surname = $v->validateFromPost("surname", ['required' => true, 'required_message' => 'Nie podano nazwiska autora']);

        return !App::getMessages()->isError();
    }

    public function validateID()
    {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        if (App::getDB()->get("user", "idUser", ["idUser" => $this->form->id]) == null) {
            Utils::addErrorMessage("Brak ksążki o podanym ID");
        }

        return !App::getMessages()->isError();
    }



}
?>