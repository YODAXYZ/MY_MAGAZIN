<?php
ini_set('display_errors',1);//error
error_reporting(E_ALL);

session_start();

define('ROOT', dirname(__FILE__));
include_once (ROOT.'/components/Autoload.php');
//Уже не нужны подключения благодаря AutoLoad
//include_once (ROOT.'/components/Router.php');
//include_once (ROOT . '/components/Db.php');
$router = new Router();
$router->run();
?>