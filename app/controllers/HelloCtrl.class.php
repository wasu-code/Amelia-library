<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class HelloCtrl { 
    
    public function action_hello() {//xx
		        
        $variable = 123;
        
        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        
        App::getSmarty()->assign("value",$variable);        
        App::getSmarty()->display("Hello.tpl");
        
    }

    public function action_elo() {//xx
        
        Utils::addInfoMessage("Test SELECT");

        $records = App::getDB()->select("user", ["login", "firstName"], ["firstName" => "Dom"]);

        App::getSmarty()->assign("lista",$records);        
        App::getSmarty()->display("Hello.tpl");
        
    }

    public function action_tst_view() {//xx
		        
        //App::getSmarty()->assign("value",$variable);        
        App::getSmarty()->display("default.tpl");
        
    }

    ////

    public function action_homepage() {
        App::getSmarty()->display("HomePage.tpl");
    }

    public function action_accessdenied() {
        App::getSmarty()->display("AccessDenied.tpl");
    }

    /*public function action_loginsuccesful() {
        Utils::addInfoMessage("Zalogowano poprawnie.");
        App::getSmarty()->display("HomePage.tpl");
    }*/

    public function action_logoutsuccessful() {
        App::getSmarty()->display("LogoutConfirm.tpl");
    }
    
}
