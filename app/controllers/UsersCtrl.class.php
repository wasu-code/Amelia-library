<?php
////

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\PersonEditForm;

////

class UsersCtrl
{
    private $form;

    public function __construct()
    {
        $this->form = new PersonEditForm();
    }

    ////

    public function action_listUsers()
    {
        $records = App::getDB()->select("user", ["idUser", "login", "role", "registration_date", "firstName", "lastName", "Address_idAddress"]);
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->display("UsersList.tpl");
    }

    public function action_userEdit()
    {
        //++ get id of person to edit from session or parameters

        if ($this->validateEdit()) {
            try {
                $person = App::getDB()->get("user", "*", ["idUser" => $this->form->id]);
                //$this->form->id = $person['idUser'];
                $this->form->login = $person['login'];
                $this->form->role = $person['role'];
                $this->form->registered = $person['registration_date'];
                $this->form->name = $person['firstName'];
                $this->form->surname = $person['lastName'];
                $this->form->addressId = $person['Address_idAddress'];

                $adr = App::getDB()->get("address", "*", ["idAddress" => $this->form->addressId]);
                $this->form->city = $adr['city'];
                $this->form->street = $adr['street'];
                $this->form->building = $adr['buildingNumber'];
                $this->form->apartment = $adr['apartmentNumber'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        App::getSmarty()->assign("form", $this->form);
        App::getSmarty()->assign("action", "update");
        App::getSmarty()->display("UserEdit.tpl");
    }

    public function action_userEditDB()
    {
        //sprawdź czy adres istnieje i weź jego id lub dodaj nowy i weź id
        //dodaj osobe jeśli nie istnieje i dodaj id adresu
        //do listy lub głównej z info udana operacja
    }

    public function action_userAdd()
    {
        Utils::addInfoMessage("Wpisz dane dla nowego użytkownika");
        App::getSmarty()->assign("action", "add");
        App::getSmarty()->display("UserEdit.tpl");
    }

    public function action_userAddDB()
    {
        $v = new Validator();
        $this->form->city = $v->validateFromPost("city", ['required' => true, 'required_message' => 'Nie podano miasta']);
        $this->form->street = $v->validateFromPost("street", ['required' => true, 'required_message' => 'Nie podano ulicy']);
        $this->form->building = $v->validateFromPost("building", ['required' => true, 'required_message' => 'Nie podano numeru budynku']);
        $this->form->apartment = $v->validateFromPost("apartment");

        $this->form->login = $v->validateFromPost("login", ['required' => true, 'required_message' => 'Nie podano loginu']);
        $this->form->role = $v->validateFromPost("role", ['required' => true, 'required_message' => 'Nie podano roli']);
        $this->form->registered = $v->validateFromPost("registered", ['required' => true, 'required_message' => 'Nie podano daty rejestracji']);
        $this->form->name = $v->validateFromPost("name", ['required' => true, 'required_message' => 'Nie podano imienia']);
        $this->form->surname = $v->validateFromPost("surname", ['required' => true, 'required_message' => 'Nie podano nazwiska']);
        $this->form->pass = $v->validateFromPost("pass", ['required' => true, 'required_message' => 'Nie podano hasła']);

        //sprawdź czy login zajęty
        $person = App::getDB()->get("user", "login", ["login" => $this->form->login]);
        if ($person != null) {
            Utils::addErrorMessage("Osoba o takim loginie już istnieje");
        }

        if (!App::getMessages()->isError()) {//jeśli nie ma błędów
            //sprawdź czy adres istnieje w bazie
            $adr = App::getDB()->get("address", "idAddress", [
                "AND" => [
                    "city" => $this->form->city,
                    "street" => $this->form->street,
                    "buildingNumber" => $this->form->building,
                    "apartmentNumber" => $this->form->apartment
                ]
            ]);

            if ($adr != null) { ///tak->zwróć id
                $this->form->addressId = $adr;
            } else { ///nie-> dodaj i zwróć id
                try {
                    App::getDB()->insert("address", [
                        "city" => $this->form->city,
                        "street" => $this->form->street,
                        "buildingNumber" => $this->form->building,
                        "apartmentNumber" => $this->form->apartment
                    ]);
                } catch (\PDOException $e) {
                    Utils::addErrorMessage('Wystąpił błąd podczas dodawania rekordu do bazy');
                    if (App::getConf()->debug)
                        Utils::addErrorMessage($e->getMessage());
                }
                $adr = App::getDB()->get("address", "idAddress", [
                    "AND" => [
                        "city" => $this->form->city,
                        "street" => $this->form->street,
                        "buildingNumber" => $this->form->building,
                        "apartmentNumber" => $this->form->apartment
                    ]
                ]);
                $this->form->addressId = $adr;
            }

            try {
                if(!App::getMessages()->isError()) {
                    App::getDB()->insert("user", [
                        "login" => $this->form->login,
                        "role" => $this->form->role,
                        "registration_date" => $this->form->registered,
                        "firstName" => $this->form->name,
                        "lastName" => $this->form->surname,
                        "pass" => $this->form->pass,
                        "Address_idAddress" => $this->form->addressId
                    ]);
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas zapisu osoby');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            

        }


        if (App::getMessages()->isError()) { //gdy są błędy wróć do widoku
            App::getSmarty()->assign("form", $this->form);
            App::getSmarty()->assign("action", "add");
            App::getSmarty()->display("UserEdit.tpl");
        } else { //dodaj do bazy
            Utils::addInfoMessage("Dodano nową osobę do bazy");
            App::getSmarty()->display("HomePage.tpl");
        }
        
    }

    ////
    public function validateEdit()
    {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }
}
