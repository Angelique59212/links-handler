<?php

require '../vendor/autoload.php';
require '../Router.php';

use App\Router;
use RedBeanPHP\R;

R::setup('mysql:host=localhost;dbname=links-handler', 'dev','dev');

session_start();

try {
    Router::route();
}
catch (ReflectionException $e) {
    echo "Une erreur est survenue";
}

//$user = R::dispense('user');
//
//$user->pseudo = $this->dataClean($this->getFormField('pseudo'));
//$password = $this->dataClean($this->getFormField('password'));
//$passwordRepeat = $this->dataClean($this->getFormField('password-repeat'));
//
//try {
//    $insertId = R::store($user);
//
//} catch (SQL $e) {
//    echo 'Une erreur est survenue en base de données';
//}

