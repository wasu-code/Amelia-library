<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('homepage'); #default action
App::getRouter()->setLoginRoute('accessdenied'); #action to forward if no permissions

//BASIC
Utils::addRoute('homepage', 'HelloCtrl');

//LOGIN
Utils::addRoute('login', 'LogCtrl'); #OK //show login page
Utils::addRoute('logOut', 'LogCtrl'); #OK
Utils::addRoute('accessdenied', 'HelloCtrl'); #OK
//Utils::addRoute('loginsuccesful', 'HelloCtrl', ["user","mod","admin"]); #OK //confirmation message
Utils::addRoute('logoutsuccessful', 'HelloCtrl');
Utils::addRoute('logCheck', 'LogCtrl'); #OK //perform login from form's data

Utils::addRoute('listUsers', 'UsersCtrl',["mod","admin"]); #K //bez stronicowania
Utils::addRoute('listUsers_table', 'UsersCtrl',["mod","admin"]);
Utils::addRoute('userEdit', 'UsersCtrl',["mod","admin"]); #OK           //display form to enter data
Utils::addRoute('userEditDB', 'UsersCtrl',["mod","admin"]); #OK        //commit changes and write data do database
Utils::addRoute('userAdd', 'UsersCtrl',["mod","admin"]); #OK
Utils::addRoute('userAddDB', 'UsersCtrl',["mod","admin"]); #OK
Utils::addRoute('userDelete', 'UsersCtrl',["mod","admin"]); #OK

Utils::addRoute('listBooks', 'BookListCtrl'); #OK - bez stronicowania
Utils::addRoute('listBooks_table', 'BookListCtrl'); 
Utils::addRoute('listReserved', 'BookListCtrl', ['mod']); #K - brak wyszukiwania
Utils::addRoute('listReserved_table', 'BookListCtrl', ['mod']);
Utils::addRoute('listRented', 'BookListCtrl', ['mod']); #K - brak wyszukiwania
//Utils::addRoute('bookDetails', 'BookListCtrl');
//Utils::addRoute('authorDetails', 'BookListCtrl');

Utils::addRoute('bookAdd', 'BookEditCtrl', ['admin']); #OK
Utils::addRoute('bookAddDB', 'BookEditCtrl', ['admin']); #OK
Utils::addRoute('bookDeleteDB', 'BookEditCtrl', ['admin']); #OK
Utils::addRoute('bookEdit', 'BookEditCtrl',["mod","admin"]);
Utils::addRoute('bookEditDB', 'BookEditCtrl', ['mod','admin']);

Utils::addRoute('bookReserve', 'BookStatusCtrl', ['user']); #K
Utils::addRoute('bookRent', 'BookStatusCtrl', ['mod']); #K
Utils::addRoute('bookRentReserved', 'BookStatusCtrl', ['mod']); #K
Utils::addRoute('bookReturn', 'BookStatusCtrl', ['mod']); #K

//TEST AREA
Utils::addRoute('tst_view', 'HelloCtrl');//xx
//Utils::addRoute('hello', 'HelloCtrl');
Utils::addRoute('elo', 'HelloCtrl');
Utils::addRoute('tst_transactions', 'BookListCtrl');