<?php

require_once "DBinit.php";

class SkalcaDB{
    public static function getAllPlayers() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT PID, USERNAME, PREDZNANJE, PRIDRUŽITEV, GSM FROM Igralci");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAllFields() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT NAZIV, OPIS FROM Igrisca");
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
        
        
        $statement = $db->prepare("INSERT INTO Igralci (USERNAME, PASSWORD, PREDZNANJE, GSM)
            VALUES (:username, :password, :predznanje, :gsm)");

        $PASSWORD = hash("crc32", $PASSWORD);

        $statement -> bindParam(":username", $USERNAME);
        $statement -> bindParam(":password", $PASSWORD);
        $statement -> bindParam(":predznanje", $PREDZNANJE);
        $statement -> bindParam(":gsm", $GSM);
        $statement -> execute();
    }

    // public static function findUserByName ($USERNAME){
    //     $db = DBinit::getInstance()

    //     $statement = $db ->prepare("SELECT USERNAME")

    // }

    public static function findUserByName($USERNAME){
        $db = DBinit::getInstance();
        $statement = $db -> prepare("SELECT PID, USERNAME FROM Igralci WHERE USERNAME = :username");
        $statement -> bindParam(":username", $USERNAME);
        $statement -> execute();

        return $statement -> fetchObject();
    }
    
    public static function validLoginAttempt($USERNAME, $PASSWORD){
    $db = DBinit::getInstance();

    $PASSWORD = hash("crc32", $PASSWORD);

    $statement = $db -> prepare("SELECT COUNT(PID) FROM Igralci WHERE USERNAME = :username AND PASSWORD = :password");
    $statement -> bindParam(":username", $USERNAME);
    $statement -> bindParam(":password", $PASSWORD);

    $statement -> execute();
    return $statement -> fetchColumn(0) == 1;

    }
}