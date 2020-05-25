<?php

require_once("ViewHelper.php");

class MatchController {

    public static function showAddForm(){
        $fields = SkalcaDB::getAllFields();
        $vars = ["fields" => $fields];
        ViewHelper::render("view/add-match.php", $vars);
    }

    public static function addMatch(){
        
    }

    public static function displayAllMatches() {
        ViewHelper::render("view/display-match.php");
    }
}