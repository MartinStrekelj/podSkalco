
<?php

require_once("ViewHelper.php");

class UserController {

    public static function showLoginForm(){
        ViewHelper::render("view/login.php");
    }

    public static function login(){
        ViewHelper::render("view/login.php");
    }

    public static function showRegistrationForm(){
        ViewHelper::render("view/registration.php");
    }
}