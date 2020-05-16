
<?php

require_once("ViewHelper.php");

class UserController {

    public static function login(){
        ViewHelper::render("view/login.php");
    }
}