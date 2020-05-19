
<?php

require_once("ViewHelper.php");
require_once("Model/SkalcaDB.php");

class RouteController {

    public static function index(){
        ViewHelper::render("view/dashboard.php");
    }
    public static function showAllPlayers(){
        $vars = ["players" => SkalcaDB::getAllPlayers()];
        ViewHelper::render("view/all-players.php", $vars);
    }

    public static function showFields(){
        $vars = [ "fields" => SkalcaDB::getAllFields()];
        ViewHelper::render("view/display-fields.php", $vars);
    }
}