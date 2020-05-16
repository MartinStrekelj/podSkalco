<?php

session_start();

require_once("controller/UserController.php");
require_once("controller/RouteController.php");
require_once("controller/MatchController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [

    "index" => function(){
        RouteController::index();
    },

    "login" => function (){
        UserController::showLoginForm();
    },

    "" => function () {
        ViewHelper::redirect(BASE_URL . "index");
    },

    "registration" => function() {
        UserController::showRegistrationForm();
    },

    "add-match" => function() {
        MatchController::showAddForm();
    }

];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 