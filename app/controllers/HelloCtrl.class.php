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
		        
        $variable = 123456;
        
        App::getMessages()->addMessage(new Message("Aaaaaaaaaaa", Message::INFO));
        Utils::addInfoMessage(":-)");
        
        App::getSmarty()->assign("value",$variable);        
        App::getSmarty()->display("Hello.tpl");
        
    }

    public function action_tst_view() {//xx
		        
        //App::getSmarty()->assign("value",$variable);        
        App::getSmarty()->display("default.tpl");
        
    }

    public function action_homepage() {
        App::getSmarty()->display("HomePage.tpl");
    }

    public function action_accessdenied() {
        App::getSmarty()->display("AccessDenied.tpl");
    }

    public function action_loginsuccesful() {
        App::getSmarty()->display("LoginConfirm.tpl");
    }
    
}
