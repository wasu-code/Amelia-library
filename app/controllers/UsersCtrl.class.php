<?php
////

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\SessionUtils;
use core\RoleUtils;
use app\forms\PersonEditForm;
use app\forms\SearchForm;

////

class UsersCtrl
{
    private $form;
    private $Sform;

    public function __construct()
    {
        $this->form = new PersonEditForm();
        $this->Sform = new SearchForm();
    }

    ////

    public function listing()
    {
        $search_params = [];
        $v = new Validator();
        $this->Sform->login = $v->validateFromPost("sf_login");
        if ( isset($this->Sform->login) && strlen($this->Sform->login) > 0) {
			$search_params['login[~]'] = $this->Sform->login;
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
		$where ["ORDER"] = "login";
        $where ["LIMIT"] = [$currentPage*$recordsLimit,$recordsLimit];


        try {
            $records = App::getDB()->select("user", ["idUser", "login", "role", "registration_date", "firstName", "lastName", "Address_idAddress"],$where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu z bazy');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        
        App::getSmarty()->assign("SearchForm", $this->Sform);
        App::getSmarty()->assign("lista", $records);
        App::getSmarty()->assign("page", $currentPage);
        App::getSmarty()->assign("limit", $recordsLimit);
        //App::getSmarty()->display("UsersList.tpl");
    }

    public function action_listUsers() {
        $this->listing();
        App::getSmarty()->display("UsersList.tpl");
    }

    public function action_listUsers_table() {
        $this->listing();
        App::getSmarty()->display("UsersList-table.tpl");
    }

    public function action_userEdit()
    {
        //++ get id of person to edit from session or parameters
        Utils::addInfoMessage("Uaktualnij dane użytkownika");
        if ($this->validateID()) {
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

        $this->validateFromPost(false);

        $role = App::getDB()->get("user", "role", ["idUser" => $this->form->id]);

        if (RoleUtils::inRole("mod") && ($role == "admin" || $role == "mod")) {
            Utils::addErrorMessage("Brak Uprawnień do edycji roli nadrzędnej");
        }

        if (RoleUtils::inRole("user")) {
            Utils::addErrorMessage("Brak Uprawnień do edycji roli nadrzędnej");
        }

        if (!App::getMessages()->isError()) {
            try {
                $this->getAddressID(); //adres nie edytowac tylko nowy jak nie istnieje
            
                App::getDB()->update("user", [
                    "login" => $this->form->login,
                    "role" => $this->form->role,
                    "registration_date" => $this->form->registered,
                    "firstName" => $this->form->name,
                    "lastName" => $this->form->surname,
                    "Address_idAddress" => $this->form->addressId
                ], ["idUser" => $this->form->id]);
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas aktualizowania bazy');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }



        ////
        if (App::getMessages()->isError()) { //gdy są błędy wróć do widoku
            App::getSmarty()->assign("form", $this->form);//xx bo ajax
            App::getSmarty()->assign("action", "update");
            //App::getSmarty()->display("UserEdit.tpl");
            App::getSmarty()->display("messagebox.tpl");
        } else { //dodano do bazy
            Utils::addInfoMessage("Zmiany zostały zapisane, możesz opuścić tą stronę");
            SessionUtils::storeMessages();
            //App::getRouter()->redirectTo("listUsers");
            App::getSmarty()->display("messagebox.tpl");
        }
    }

    public function action_userAdd()
    {
        Utils::addInfoMessage("Wpisz dane dla nowego użytkownika");
        App::getSmarty()->assign("action", "add");
        App::getSmarty()->display("UserEdit.tpl");
    }

    public function action_userAddDB()
    {
        if ($this->validateFromPost()) {
            //sprawdź czy login zajęty
            $person = App::getDB()->get("user", "login", ["login" => $this->form->login]);
            if ($person != null) {
                Utils::addErrorMessage("Osoba o takim loginie już istnieje");
            }
        }

        if (RoleUtils::inRole("mod") && ($this->form->role == "admin" || $this->form->role == "mod")) {
            Utils::addErrorMessage("Nie możesz utworzyć użytkownika o wyższej (lub równej) sobie randze");
        }


        if (!App::getMessages()->isError()) { //jeśli nie ma błędów
            //sprawdź czy adres istnieje w bazie
            $this->getAddressID();

            if (!App::getMessages()->isError()) {
                try {
                    if (!App::getMessages()->isError()) {
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
        }

        ////
        if (App::getMessages()->isError()) { //gdy są błędy wróć do widoku
            App::getSmarty()->assign("form", $this->form);//xx bo ajax
            App::getSmarty()->assign("action", "add");
            //App::getSmarty()->display("UserEdit.tpl");
            App::getSmarty()->display("messagebox.tpl");
        } else { //dodaj do bazy
            Utils::addInfoMessage("Dodano nową osobę do bazy");
            SessionUtils::storeMessages();
            //App::getRouter()->redirectTo("homepage");
            App::getSmarty()->display("messagebox.tpl");
        }
    }

    public function action_userDelete()
    {
        if ($this->validateID()) {
            $role = App::getDB()->get("user", "role", ["idUser" => $this->form->id]);

            if (RoleUtils::inRole("mod") && ($role == "admin" || $role == "mod")) {
                Utils::addErrorMessage("Brak Uprawnień do usunięcia roli nadrzędnej");
            }

            if (RoleUtils::inRole("user")) {
                Utils::addErrorMessage("Brak Uprawnień do usunięcia roli nadrzędnej");
            }
            try {
                if (!App::getMessages()->isError()) {
                    //usuń
                    App::getDB()->delete("user", ["idUser" => $this->form->id]);
                    //info
                    Utils::addInfoMessage("Usunięcie powiodło się");
                    SessionUtils::storeMessages();
                    //App::getRouter()->redirectTo("listUsers");//??
                } else {
                    SessionUtils::storeMessages();
                    //App::getRouter()->redirectTo("listUsers");//??
                }
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania osoby');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
            $this->listing();
            App::getSmarty()->display("UsersList-table.tpl");
        } else {
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("homepage");
        }
    }

    ////
    public function validateID()
    {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        if (App::getDB()->get("user", "idUser", ["idUser" => $this->form->id]) == null) {
            Utils::addErrorMessage("Brak osoby o podanym ID");
        }

        return !App::getMessages()->isError();
    }

    public function validateFromPost($pass = true)
    {
        $v = new Validator();
        $this->form->id = $v->validateFromPost("id");
        $this->form->city = $v->validateFromPost("city", ['required' => true, 'required_message' => 'Nie podano miasta']);
        $this->form->street = $v->validateFromPost("street", ['required' => true, 'required_message' => 'Nie podano ulicy']);
        $this->form->building = $v->validateFromPost("building", ['required' => true, 'required_message' => 'Nie podano numeru budynku', 'int' => true]);
        $this->form->apartment = $v->validateFromPost("apartment", ['int' => true]);

        $this->form->login = $v->validateFromPost("login", ['required' => true, 'required_message' => 'Nie podano loginu']);
        $this->form->role = $v->validateFromPost("role", ['required' => true, 'required_message' => 'Nie podano roli']);
        $this->form->registered = $v->validateFromPost("registered", ['required' => true, 'required_message' => 'Nie podano daty rejestracji', 'date_format' => 'Y-m-d'])->format('Y-m-d'); //data to obiekt, by na text ->format('Y-m-d')
        $this->form->name = $v->validateFromPost("name", ['required' => true, 'required_message' => 'Nie podano imienia']);
        $this->form->surname = $v->validateFromPost("surname", ['required' => true, 'required_message' => 'Nie podano nazwiska']);
        if ($pass) {
            $this->form->pass = $v->validateFromPost("pass", ['required' => true, 'required_message' => 'Nie podano hasła']);
        }

        return !App::getMessages()->isError();
    }

    public function getAddressID()
    {
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
                Utils::addErrorMessage('Wystąpił błąd podczas dodawania adresu');
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
    }
}
