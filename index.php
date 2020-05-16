<?php

session_start();

require_once("controller/UserController.php");

require_once("controller/AppController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("ASSETS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "assets/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

$urls = [

    "index" => function(){
        AppController::index();
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