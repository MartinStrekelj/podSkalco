<?php

require_once("ViewHelper.php");

class MatchController {

    public static function showAddForm(){
        ViewHelper::render("view/add-match.php");
    }
}