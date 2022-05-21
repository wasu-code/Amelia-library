<?php
////

namespace app\controllers;

use core\App;

////

class UsersCtrl {
    private $form;

    public function __construct() {
        $this->form = new PersonEditForm();
    }

    ////

    public function action_listUsers() {
        $records = App::getDB()->select("user", ["idUser","login","role","registration_date","firstName","lastName","Address_idAddress"]);
        App::getSmarty()->assign("lista",$records);        
        App::getSmarty()->display("UsersList.tpl");
    }

    public function action_userEdit() {
        //++ get id of person to edit from session or parameters

        if ($this->validateEdit()) {
            try {
                $record = App::getDB()->get("user", "*", [
                    "idUser" => $this->form->id
                ]);

                $this->form->id = $record['idUser'];
                $this->form->login = $record['login'];
                $this->form->role = $record['role'];
                $this->form->registered = $record['registration_date'];
                $this->form->name = $record['firstName'];
                $this->form->surname = $record['lastName'];
                $this->form->adress = $record['Address_idAddress'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }


        App::getSmarty()->display("UserEdit.tpl");
    }

    ////
    public function validateEdit() {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }



}
?>