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

Utils::addRoute('listUsers', 'UsersCtrl',["mod","admin"]); #K
Utils::addRoute('userEdit', 'UsersCtrl',["mod","admin"]); //display form to enter data
Utils::addRoute('userAdd', 'UsersCtrl',["mod","admin"]);
Utils::addRoute('userDelete', 'UsersCtrl',["mod"]);
Utils::addRoute('userUpdate', 'UsersCtrl',["mod","admin"]);

Utils::addRoute('listBooks', 'BookListCtrl');
Utils::addRoute('listReserved', 'BookListCtrl', ['mod']);

Utils::addRoute('addBook', 'BookEditCtrl', ['admin']);
Utils::addRoute('showBookView', 'BookEditCtrl',["mod","admin"]);
Utils::addRoute('deleteBook', 'BookEditCtrl', ['admin']);
Utils::addRoute('editBook', 'BookEditCtrl', ['mod','admin']);

Utils::addRoute('reserveBook', 'BookEditCtrl', ['user']);
Utils::addRoute('rentBook', 'BookEditCtrl', ['mod']);
Utils::addRoute('returnBook', 'BookEditCtrl', ['mod']);

Utils::addRoute('bookDetails', 'DetailsCtrl');
Utils::addRoute('authorDetails', 'DetailsCtrl');

//TEST AREA
Utils::addRoute('tst_view', 'HelloCtrl');//xx
//Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('elo', 'HelloCtrl');