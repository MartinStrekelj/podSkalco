
<?php

require_once("ViewHelper.php");
require_once("Model/SkalcaDB.php");

class RouteController {

    public static function index(){
        $matches = SkalcaDB::getAllMatches();
        $players = SkalcaDB::getAllPlayers();
        $fields  = SkalcaDB::getAllFields();
        $likes   = SkalcaDB::getAllLikes();

        $vars = ["matches" => $matches, "players" => $players, "fields" => $fields, "likes" => $likes];

        ViewHelper::render("view/dashboard.php", $vars);
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
