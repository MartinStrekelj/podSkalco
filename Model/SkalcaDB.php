<?php

require_once "DBinit.php";

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

    public static function register($USERNAME, $PASSWORD, $PREDZNANJE, $GSM){
        $db = DBInit::getInstance();
        
        
        $statement = $db->prepare("INSERT INTO Igralci (USERNAME, PASSWORD, PREDZNANJE, SEZONE, GSM)
            VALUES (:username, :password, :predznanje, :sezone, :gsm)");

        $statement -> bindParam(":username", $USERNAME);
        $statement -> bindParam(":password", $PASSWORD);
        $statement -> bindParam(":predznanje", $PREDZNANJE);
        $statement -> bindParam(":sezone", 0);
        $statement -> bindParam(":gsm", $GSM);
        $statement -> execute();
    }

}