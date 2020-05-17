
<?php

require_once("ViewHelper.php");

class RouteController {

    public static function index(){
        ViewHelper::render("view/dashboard.php");
    }
    public static function showAllPlayers(){
        ViewHelper::render("view/all-players.php");
    }
}