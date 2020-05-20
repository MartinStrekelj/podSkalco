
<?php

require_once("ViewHelper.php");
require_once("Model/SkalcaDB.php");

class RouteController {

    public static function index(){
        ViewHelper::render("view/dashboard.php");
    }
    public static function showPlayers(){
        if (isset($_GET["id"])){
            $vars = ["player" => SkalcaDB::getPlayer($_GET["id"])];
            if ($_GET["id"] == $_SESSION["user_id"]){
                ViewHelper::render("view/user-profile.php",$vars);
            }else{
            ViewHelper::render("view/player-detail.php", $vars);
        }
        }else{
            $vars = ["players" => SkalcaDB::getAllPlayers()];
            ViewHelper::render("view/all-players.php", $vars);
        }
    }

    public static function showFields(){
        $vars = [ "fields" => SkalcaDB::getAllFields()];
        ViewHelper::render("view/display-fields.php", $vars);
    }
}