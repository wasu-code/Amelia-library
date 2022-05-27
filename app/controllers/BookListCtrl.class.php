<?php
////

namespace app\controllers;

use core\App;
//use core\Utils;
//use core\ParamUtils;
//use core\Validator;
//use core\SessionUtils;
//use core\RoleUtils;
//use app\forms\PersonEditForm;

////

class BookListCtrl
{
    //private $form;

    public function __construct()
    {
        //$this->form = new PersonEditForm();
    }

    public function action_listBooks() {
        $records = App::getDB()->select("book", ["idBook","title","publicationDate","genere","available"]);
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->display("BookList.tpl");
    }

    public function action_listReserved() {
        //sprawdź transakcje i idBook tam gdzie reserved
        //wyświetl z book wskazanych przez reserved w transakcjach
    }

    public function action_bookDetails() {
        //widok dodać
        //+dodać pokaż więcej w widoku listy
    }



}
?>