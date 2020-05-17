<?php

require_once "DBInit.php";

class SkalcaDB{
    public static function getAllPlayers() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT PID, USERNAME, PREDZNANJE, SEZONE, GSM FROM Igralci");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAllMatches() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT MID, FID, ORGANIZATOR, URA, DATUM, OPISTEKME FROM Tekme");
        $statement->execute();

        return $statement->fetchAll();
    }


}