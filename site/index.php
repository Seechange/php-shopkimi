<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//load models
require "../config.php";
require "../connectDB.php";
require "../bootstrap.php";
require "../vendor/autoload.php";

//router
$c = $_GET["c"] ?? "home";
$a = $_GET["a"] ?? "index";
$controllerName = ucfirst($c). "Controller";//StudentController
require "controller/" . $controllerName . ".php";
$controller = new $controllerName();//new StudentController();
$controller->$a();//$controller->list();
?>