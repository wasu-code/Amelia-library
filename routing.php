<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('homepage'); #default action
App::getRouter()->setLoginRoute('accessdenied'); #action to forward if no permissions
//Utils::addRoute('action_name', 'controller_class_name');

//BASIC
Utils::addRoute('homepage', 'HelloCtrl');

//LOGIN
Utils::addRoute('login', 'LogCtrl'); #OK //show login page
Utils::addRoute('logOut', 'LogCtrl'); #OK
Utils::addRoute('accessdenied', 'HelloCtrl'); #OK
Utils::addRoute('loginsuccesful', 'HelloCtrl', ["user","mod","admin"]); #OK //confirmation message
Utils::addRoute('logCheck', 'LogCtrl'); #OK //perform login from form's data

Utils::addRoute('listUsers', 'UsersCtrl',["mod","admin"]); #K //bez stronicowania
Utils::addRoute('userEdit', 'UsersCtrl',["mod","admin"]); #OK           //display form to enter data
Utils::addRoute('userEditDB', 'UsersCtrl',["mod","admin"]); #OK        //commit changes and write data do database
Utils::addRoute('userAdd', 'UsersCtrl',["mod","admin"]); #OK
Utils::addRoute('userAddDB', 'UsersCtrl',["mod","admin"]); #OK
Utils::addRoute('userDelete', 'UsersCtrl',["mod"]); #OK

Utils::addRoute('listBooks', 'BookListCtrl'); #K
Utils::addRoute('listReserved', 'BookListCtrl', ['mod']);
Utils::addRoute('bookDetails', 'BookListCtrl');
//Utils::addRoute('authorDetails', 'BookListCtrl');

Utils::addRoute('bookAdd', 'BookEditCtrl', ['admin']); #OK
Utils::addRoute('bookAddDB', 'BookEditCtrl', ['admin']); #OK
Utils::addRoute('bookDeleteDB', 'BookEditCtrl', ['admin']); #OK
Utils::addRoute('bookEdit', 'BookEditCtrl',["mod","admin"]);
Utils::addRoute('bookEditDB', 'BookEditCtrl', ['mod','admin']);

Utils::addRoute('bookReserve', 'BookEditCtrl', ['user']);
Utils::addRoute('bookRent', 'BookEditCtrl', ['mod']);
Utils::addRoute('bookReturn', 'BookEditCtrl', ['mod']);

//TEST AREA
Utils::addRoute('tst_view', 'HelloCtrl');//xx
//Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('elo', 'HelloCtrl');