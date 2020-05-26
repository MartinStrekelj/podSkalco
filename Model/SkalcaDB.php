<?php

require_once "DBinit.php";

class SkalcaDB{
    public static function getAllPlayers() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM igralci");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAllFields() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM igrisca");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAllMatches() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT * FROM tekme");
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function register($USERNAME, $PASSWORD, $PREDZNANJE, $GSM, $SPOL){
        $db = DBInit::getInstance();
        
        
        $statement = $db->prepare("INSERT INTO igralci (USERNAME, PASSWORD, GSM, SPOL, PREDZNANJE)
            VALUES (:username, :password, :gsm, :spol, :predznanje)");

        $PASSWORD = hash("crc32", $PASSWORD);
        $GSM = str_replace(" ", "", $GSM);
        $statement -> bindParam(":username", $USERNAME);
        $statement -> bindParam(":password", $PASSWORD);
        $statement -> bindParam(":predznanje", $PREDZNANJE);
        $statement -> bindParam(":gsm", $GSM);
        $statement -> bindParam(":spol", $SPOL);
        $statement -> execute();
    }

    public static function findUserByName($USERNAME){
        $db = DBinit::getInstance();
        $statement = $db -> prepare("SELECT PID, USERNAME FROM igralci WHERE USERNAME = :username");
        $statement -> bindParam(":username", $USERNAME);
        $statement -> execute();

        return $statement -> fetchObject();
    }

    public static function getPlayer($PID){
        $db = DBinit::getInstance();
        $statement = $db -> prepare("SELECT * FROM igralci WHERE PID = :pid");
        $statement -> bindParam(":pid", $PID, PDO::PARAM_INT);
        $statement -> execute();

        $player = $statement -> fetch();

        if ($player != null) {
            return $player;
        } else {
            throw new InvalidArgumentException("No record with id $PID");
        }
    }
    
    public static function validLoginAttempt($USERNAME, $PASSWORD){
    $db = DBinit::getInstance();

    $PASSWORD = hash("crc32", $PASSWORD);

    $statement = $db -> prepare("SELECT COUNT(PID) FROM igralci WHERE USERNAME = :username AND PASSWORD = :password");
    $statement -> bindParam(":username", $USERNAME);
    $statement -> bindParam(":password", $PASSWORD);

    $statement -> execute();
    return $statement -> fetchColumn(0) == 1;

    }

    public static function update($PID, $USERNAME, $PASSWORD, $PREDZNANJE, $GSM, $SPOL){
        $db = DBInit::getInstance();
        
        
        $statement = $db->prepare("UPDATE igralci SET USERNAME = :username, PASSWORD = :password, GSM = :gsm, SPOL = :spol
            WHERE PID = :pid");

        $PASSWORD = hash("crc32", $PASSWORD);
        $statement -> bindParam(":pid", $PID);
        $statement -> bindParam(":username", $USERNAME);
        $statement -> bindParam(":password", $PASSWORD);
        $statement -> bindParam(":gsm", $GSM);
        $statement -> bindParam(":spol", $SPOL);
        $statement -> execute();
    }

    public static function deleteUser($PID){
        $db = DBInit::getInstance();
        $statement = $db->prepare("DELETE FROM igralci
            WHERE PID = :pid");
        $statement -> bindParam(":pid", $PID);
        $statement -> execute();
    }


    public static function search($query) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT PID, USERNAME, PREDZNANJE FROM igralci 
            WHERE USERNAME LIKE :query OR PREDZNANJE LIKE :query");
        $statement->bindValue(":query", '%' . $query . '%');
        $statement->execute();

        return $statement->fetchAll();
    }  


    public static function matchTimeslotTaken($DATUM, $URA, $FID){
        $db = DBInit::getInstance();
        $statement = $db -> prepare("SELECT COUNT(MID) FROM tekme WHERE
                                    DATUM = :datum AND URA = :ura AND FID = :fid;");
        $statement -> bindParam(":datum", $DATUM);
        $statement -> bindParam(":ura", $URA);
        $statement -> bindParam(":fid", $FID);
        $statement -> execute();
        
        return $statement -> fetchColumn(0) == 0;
    }

    public static function addMatch($NAZIV, $FID, $ORGANIZATOR, $URA, $DATUM, $OPISTEKME, $LIKES){
        $db = DBInit::getInstance();
        
        
        $statement = $db->prepare("INSERT INTO tekme (NAZIV, FID, ORGANIZATOR, URA, DATUM, OPISTEKME, LIKES)
            VALUES (:naziv, :fid, :org, :ura, :datum, :opis, :likes);");

        $statement -> bindParam(":naziv", $NAZIV);
        $statement -> bindParam(":fid", $FID);
        $statement -> bindParam(":org", $ORGANIZATOR);
        $statement -> bindParam(":ura", $URA);
        $statement -> bindParam(":datum", $DATUM);
        $statement -> bindParam(":opis", $OPISTEKME);
        $statement -> bindParam(":likes", $LIKES);
        $statement -> execute();
    }

    public static function getMatchByPID ($PID){
        $db = DBInit::getInstance();

        $statement = $db ->prepare("SELECT * FROM tekme WHERE ORGANIZATOR = :pid");
        $statement -> bindParam(":pid", $PID);
        $statement -> execute();

        return $statement -> fetchAll();
    }

    public static function getLikes($MID){
        $db = DBinit::getInstance();

        $statement = $db -> prepare("SELECT LIKES FROM tekme WHERE MID = :mid");
        $statement -> bindParam(":mid", $MID);
        $statement -> execute();

        return $statement -> fetch();
    }

    public static function upLikes($MID){
        // TODO
        $db = DBinit::getInstance();
    }

    public static function getAllLikes(){
        $db = DBinit::getInstance();

        $statement = $db -> prepare("SELECT * FROM likes;");
        $statement -> execute();

        return $statement -> fetchAll();
    }

    public static function addUpvote($MID, $PID){
        $db = DBinit::getInstance();
        $statement = $db -> prepare("INSERT INTO likes (MID, PID) VALUES (:mid, :pid);");
        $statement -> bindParam(":mid", $MID);
        $statement -> bindParam(":pid", $PID);

        $statement -> execute();
    }

    public static function updateTotalLikesCount($MID, $type){
        $db = DBinit::getInstance();

        $statement = $db->prepare("UPDATE likes SET LIKES = :likes
        WHERE PID = :pid");
        $currentLikes = self::getLikes($MID) -> LIKES;
        if ($type == true){
            $statement -> bindParam(":likes", $currentLikes + 1);
        } else {
            $statement -> bindParam(":likes", $currentLikes - 1);
        }

        $statement -> execute();
    }

}