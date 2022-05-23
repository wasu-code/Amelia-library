<?php 
namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;
use core\SessionUtils;

class LogCtrl {
    private $form;

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    //// akcje

    public function action_logOut() {
        session_destroy();
        Utils::addInfoMessage("Wylogowano poprawnie.");
        
        App::getSmarty()->display("HomePage.tpl");
    }

    public function action_logCheck() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addInfoMessage('Poprawnie zalogowano do systemu');
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo("homepage");
            //App::getSmarty()->display("HomePage.tpl");//++
        } else {
            //niezalogowany => pozostań na stronie logowania
            SessionUtils::storeMessages();
            //SessionUtils::store('login', $this->form->login);
            App::getRouter()->redirectTo("login");
            //$this->generateView();
        }
    }

    public function action_login() {
        $this->generateView();
    }

    //// funkcje pomocnicze

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;

        // sprawdzenie, czy dane logowania poprawne
        $records = App::getDB()->select("user", ["pass", "role"],["login" => $this->form->login]);
        if (isset($records[0]["pass"])) {
            if ($this->form->pass == $records[0]["pass"]) {//isset
               RoleUtils::addRole($records[0]["role"]);
                $_SESSION['loggedAs'] = $this->form->login;
            } else {
                Utils::addErrorMessage('Niepoprawny login lub hasło');
            }
        } else {
          Utils::addErrorMessage('Nie znaleziono użytkownika o podanym loginie w bazie');
        }

        return !App::getMessages()->isError();
    }


    public function generateView() {
        App::getSmarty()->assign('login', $this->form->login); // dane formularza do widoku
        App::getSmarty()->display('LoginPage.tpl');
    }






}
?>