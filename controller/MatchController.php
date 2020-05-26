<?php

require_once("ViewHelper.php");

class MatchController {

    public static function showAddForm($data=[], $errors=[]){

        $fields = SkalcaDB::getAllFields();

        if (empty($data)) {
            $data = [
                "USERNAME" => "",
                "PASSWORD" => "",
                "CONFIRM_PASSWORD" => "",
                "GSM" => "",
            ];
        }

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }

        $vars = ["user" => $data, "errors" => $errors, "fields" => $fields];
        ViewHelper::render("view/add-match.php", $vars);
    }

    public static function addMatch(){
        $rules = [
            "NAZIV" => [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ <a-zA-Z0-9>]+$/"]
            ],
            "URA" => FILTER_VALIDATE_INT,
            "DATUM" => FILTER_SANITIZE_STRING,
            "OPISTEKME" => FILTER_SANITIZE_SPECIAL_CHARS,
            "FID" => FILTER_SANITIZE_NUMBER_INT
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        #najdi vse evente ob tej uri in datumu
        $validTimeslot =  SkalcaDB::matchTimeslotTaken($data["DATUM"], $data["URA"], $data["FID"]);
        #preveri če na ta dan in uro že obstaja event
        
        $errors["NAZIV"] = $data["NAZIV"] === false  ? "Izberite si naziv tekme: dovoljene so samo črke in številke." : "";
        $errors["URA"] = $data["URA"] === false  ? "Izberite si ustrezen termin/uro dogodka." : "";
        $errors["DATUM"] = $data["DATUM"] === false  ? "Izberite si ustrezen termin/uro dogodka." : "";
        $errors["OPISTEKME"] = $data["OPISTEKME"] === false  ? "Napišite kratek opis dogodka." : "";

        $isDataValid = true;
            foreach ($errors as $error) {
                $isDataValid = $isDataValid && empty($error);
            }
            if ($isDataValid){
                if ($validTimeslot){
                    SkalcaDB::addMatch($data["NAZIV"], $data["FID"], $_SESSION["user_id"], $data["URA"], $data["DATUM"], $data["OPISTEKME"], 0);
                    ViewHelper::redirect(BASE_URL . "");
                }else {
                    $fields = SkalcaDB::getAllFields();
                    $vars = ["timeslotError" => "Izbrani termin za dogodek je že izbran. Poskusite izbrati drugo igrišče ali termin.", "data" => $data, "errors" => $errors, "fields" => $fields];
                    var_dump($validTimeslot);
                    Viewhelper::render("view/add-match.php", $vars);
                }
            }else{
                self::showAddForm($data, $errors);
            }
    }

    public static function displayUserMatches() {
        $matches = SkalcaDB::getMatchByPID($_SESSION["user_id"]);
        $fields  = SkalcaDB::getAllFields();
        $vars    = ["matches" => $matches, "fields" => $fields];

        ViewHelper::render("view/display-usersMatch.php", $vars);
    }

    public static function userLiked($MID, $PID, $likes){
        foreach ($likes as $like) {
            if ($like["MID"] == $MID && $like["PID"] == $PID){
                return true;
            }
        }
        return false;
    }

    public static function addUpvote(){
        SkalcaDB::addUpvote($_POST["MID"], $_POST["PID"]);
        $type = true;
        SkalcaDB::updateTotalLikesCount($_POST["MID"], $type);

        $likes = SkalcaDB::getLikes($_POST["MID"]);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($likes);
    }

    public static function removeUpvote(){
        SkalcaDB::removeUpvote($_POST["MID"], $_POST["PID"]);
        $type = false;
        SkalcaDB::updateTotalLikesCount($_POST["MID"], $type );

        $likes = SkalcaDB::getLikes($_POST["MID"]);
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($likes);
    }

    public static function showEditMatchForm($data=[], $errors=[]){
        // ViewHelper::render("view/match-detail")
        $fields = SkalcaDB::getAllFields();
        $data = SkalcaDB::getMatchByMID($_GET["MID"]);

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }
        $vars = ["match" => $data, "errors" => $errors, "fields" => $fields];
        ViewHelper::render("view/edit-match.php", $vars);
    }

    public static function editMatch(){
        // SkalcaDB::editMatch($_GET("MID"))
        $rules = [
            "NAZIV" => [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ <a-zA-Z0-9>]+$/"]
            ],
            "URA" => FILTER_VALIDATE_INT,
            "DATUM" => FILTER_SANITIZE_STRING,
            "OPISTEKME" => FILTER_SANITIZE_SPECIAL_CHARS,
            "FID" => FILTER_SANITIZE_NUMBER_INT,
            "MID" => FILTER_SANITIZE_NUMBER_INT
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        #najdi vse evente ob tej uri in datumu
        $validTimeslot =  SkalcaDB::matchTimeslotTaken($data["DATUM"], $data["URA"], $data["FID"]);
        #preveri če na ta dan in uro že obstaja event
        
        $errors["NAZIV"] = $data["NAZIV"] === false  ? "Izberite si naziv tekme: dovoljene so samo črke in številke." : "";
        $errors["URA"] = $data["URA"] === false  ? "Izberite si ustrezen termin/uro dogodka." : "";
        $errors["DATUM"] = $data["DATUM"] === false  ? "Izberite si ustrezen termin/uro dogodka." : "";
        $errors["OPISTEKME"] = $data["OPISTEKME"] === false  ? "Napišite kratek opis dogodka." : "";

        $isDataValid = true;
            foreach ($errors as $error) {
                $isDataValid = $isDataValid && empty($error);
            }
            
            if ($isDataValid){
                if ($validTimeslot){
                    SkalcaDB::editMatch($data["MID"], $data["NAZIV"], $data["FID"], $_SESSION["user_id"], $data["URA"], $data["DATUM"], $data["OPISTEKME"]);
                    ViewHelper::redirect(BASE_URL . "");
                }else {
                    $fields = SkalcaDB::getAllFields();
                    $vars = ["timeslotError" => "Izbrani termin za dogodek je že izbran. Poskusite izbrati drugo igrišče ali termin.", "data" => $data, "errors" => $errors, "fields" => $fields];
                    Viewhelper::render("view/-match.php", $vars);
                }
            }else{
                self::showAddForm($data, $errors);
            }
    }

    public static function deleteMatch(){

    }
}