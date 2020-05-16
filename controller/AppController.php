
<?php

require_once("ViewHelper.php");

class AppController {

    public static function index(){
        ViewHelper::render("view/dashboard.php");
    }
}