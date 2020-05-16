
<?php

require_once("ViewHelper.php");

class RouteController {

    public static function index(){
        ViewHelper::render("view/dashboard.php");
    }
}