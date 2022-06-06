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
            //+sprawdź czy autor już istnieje
            $a = App::getDB()->get("Author", "idAuthor",[
                "firstName" => $this->form->name,
                "lastName" => $this->form->surname
            ]);
            if ($a!=null) {
                $b = App::getDB()->select("book","idBook",[
                    "title" => $this->form->title,
                    "publicationDate" => $this->form->published,
                ]);

                for ($i=0;$i<count($b);$i++) {
                    $c = App::getDB()->get("Book_has_Author","Author_idAuthor",["Author_idAuthor" => $a, "Book_idBook" => $b]);
                    if ($c!=null) {
                        Utils::addErrorMessage('Książka o takim tytule, dacie publikacji i autorze znajduje się już w bazie');
                        break;
                    }
                }
            }
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
                $authorID = App::getDB()->get("author","idAuthor",[
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
            //App::getSmarty()->assign("form", $this->form);//xx bo ajax
            App::getSmarty()->assign("action", "add");
            //App::getSmarty()->display("BookEdit.tpl");
            App::getSmarty()->display("messagebox.tpl");
        } else { //dodaj do bazy
            Utils::addInfoMessage("Dodano nową książkę do bazy. Możesz dodać kolejną");
            //SessionUtils::storeMessages();
            //App::getRouter()->redirectTo("homepage");
            App::getSmarty()->display("messagebox.tpl");
        }
    }

    public function action_bookDeleteDB() {
        if ($this->validateID()) {
            try {
                //usuń powiązane transakcje
                App::getDB()->delete("transaction", ["book_idBook" => $this->form->id]);
                //usuń powiązanie z autorem
                App::getDB()->delete("book_has_author", ["book_idBook" => $this->form->id]);
                //usuń
                App::getDB()->delete("book", ["idBook" => $this->form->id]);
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

    public function action_bookEdit() {//++
        Utils::addInfoMessage("Uaktualnij dane tej książki");
        if ($this->validateID()) {
            try {
                $book = App::getDB()->get("book", "*", ["idBook" => $this->form->id]);
                $this->form->title = $book["title"];
                $this->form->published = $book["publicationDate"];
                $this->form->description = $book["description"];
                $this->form->quantity = $book["quantity"];
                $this->form->available = $book["available"];
                $this->form->genere = $book["genere"];

                $authorID = App::getDB()->get("book_has_author", "author_idAuthor", ["book_idBook" => $this->form->id]);
                $author = App::getDB()->get("author", "*", ["idAuthor" => $authorID]);
                $this->form->author_id = $authorID;
                $this->form->name = $author["firstName"];
                $this->form->surname = $author["lastName"];

            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->assign("action", "update");
        App::getSmarty()->display("BookEdit.tpl");
    }

    public function action_bookEditDB() {
        if ($this->validateFromPost(true)) {
            //aktualizuj autora
            try {
                $a = App::getDB()->get("Author", "idAuthor",[
                    "firstName" => $this->form->name,
                    "lastName" => $this->form->surname
                ]);
                if ($a!=null) {//zapisz ID
                    $this->form->author_id = $a;
                } else { //utwórz
                    App::getDB()->insert("Author",[
                        "firstName" => $this->form->name,
                        "lastName" => $this->form->surname
                    ]);
                    $this->form->author_id = App::getDB()->get("Author","idAuthor",[
                        "firstName" => $this->form->name,
                        "lastName" => $this->form->surname
                    ]);
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas dodania/sprawdzania autora w bazie');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }
        //aktualizuj książkę
        if (!App::getMessages()->isError()) {
            try {
                App::getDB()->update("book", [
                    "title" => $this->form->title,
                    "publicationDate" => $this->form->published,
                    "description" => $this->form->description,
                    "quantity" => $this->form->quantity,
                    "available" => $this->form->available,
                    "genere" =>$this->form->genere
                ], ["idBook" => $this->form->id]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas aktualizowania danych książki');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        //powiąż autora z książką
        if (!App::getMessages()->isError()) {
            try {
                App::getDB()->update("book_has_author", [
                    "author_idAuthor" => $this->form->author_id
                ], ["book_idBook" => $this->form->id]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas próby powiązania książki z autorem');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }


        ///
        if (App::getMessages()->isError()) { //gdy są błędy wróć do widoku
            //App::getSmarty()->assign("form", $this->form);//xx bo ajax
            App::getSmarty()->assign("action", "update");
            //App::getSmarty()->display("UserEdit.tpl");
            App::getSmarty()->display("messagebox.tpl");
        } else { //dodano do bazy
            Utils::addInfoMessage("Zmiany zostały zapisane, możesz opuścić tą stronę");
            //SessionUtils::storeMessages();
            //App::getRouter()->redirectTo("listUsers");
            App::getSmarty()->display("messagebox.tpl");
        }
    }


    ////
    public function validateFromPost($id = false)
    {
        $v = new Validator();
        if ($id==true) {
            $this->form->id = $v->validateFromPost("id", ['required' => true, 'required_message' => 'Nie uzyskano id']);
        } else {
            $this->form->id = $v->validateFromPost("id");
        }
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
        if (App::getDB()->get("Book", "idBook", ["idBook" => $this->form->id]) == null) {
            Utils::addErrorMessage("Brak ksążki o podanym ID");
        }

        return !App::getMessages()->isError();
    }



}
?>