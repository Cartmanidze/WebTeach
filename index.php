<?php


//FRONT CONTROLLER
//1. All settings
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();
//2.Include file system
define('ROOT',dirname(__FILE__));

//3.Connect data base
require_once (ROOT.'/components/Autoload.php');

//4.Call router
$router = new Router();
$router->run();
