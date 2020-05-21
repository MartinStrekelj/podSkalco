
<?php
require_once("ViewHelper.php");

class UserController {

    public static function showLoginForm($data=[]){
        if (empty($data)){
            $data = [
                "USERNAME" => "",
            ];
        }

        $vars = ["user" => $data];

        ViewHelper::render("view/login.php", $vars);
    }

    public static function login(){
        $rules = [
            "USERNAME" => [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ <a-zA-Z0-9>]+$/"]
            ],
            // we convert HTML special characters
            "PASSWORD" => FILTER_SANITIZE_SPECIAL_CHARS
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        if (SkalcaDB::validLoginAttempt($data["USERNAME"], $data["PASSWORD"])){
            $user = SkalcaDB::findUserByName($data["USERNAME"]);
            $_SESSION["user_id"] = $user -> PID;
            $_SESSION["username"] = $user -> USERNAME;
            ViewHelper::render("view/dashboard.php");
        } else{
            ViewHelper::render("view/login.php", [
                "errorMessage" => "Napačno ime ali geslo."
            ]);
        }
    }

    public static function showRegistrationForm($data = [], $errors = []){

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

        $vars = ["user" => $data, "errors" => $errors];

        ViewHelper::render("view/registration.php", $vars);
    }

    public static function register(){
        $rules = [
            "USERNAME" => [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ <a-zA-Z0-9>]+$/"]
            ],
            // we convert HTML special characters
            "PASSWORD" => FILTER_SANITIZE_SPECIAL_CHARS,
            "CONFIRM_PASSWORD" => FILTER_SANITIZE_SPECIAL_CHARS,
            "PREDZNANJE" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1, "max_range" => 3]
            ],

            "GSM" => 
            [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" =>  ["regexp" => "/^[ <0-9>]*$/"]
            ],
            "SPOL" => FILTER_SANITIZE_SPECIAL_CHARS
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        
        $hits = SkalcaDB::findUserByName($data["USERNAME"]);
        

        $errors["USERNAME"] = $data["USERNAME"] === false  ? "Izberite si uporabniško ime: dovoljene so samo črke in številke" : "";
        $errors["USERNAME"] = (!empty($hits)) ? "Uporabniško ime že obstaja" : "";
        $errors["PASSWORD"] = empty($data["PASSWORD"]) ? "Vpiši geslo!" : "";
        $errors["PASSWORD"] = !($data["PASSWORD"] == $data["CONFIRM_PASSWORD"]) ? "Gesli se nista ujemali. Bodite pozorni pri črkovanju!" : "";
        $errors["GSM"] = $data["GSM"] === false ? "Vpišite svoj GSM. Številka mora biti sestavljena iz 9števk npr. 041551691" : "";



        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }
        if ($isDataValid){
            SkalcaDB::register($data["USERNAME"], $data["PASSWORD"], $data["PREDZNANJE"], $data["GSM"], $data["SPOL"]);
            ViewHelper::render("view/login.php", ["registerMessage" => "Registracije je bila uspešna. Vpišite se!"]);
        }else{
            self::showRegistrationForm($data, $errors);
        }
        }

        public static function showEditForm($errors = []){
            $user = SkalcaDB::getPlayer($_SESSION["user_id"]);
            if (empty($errors)) {
                foreach ($user as $key => $value) {
                    $errors[$key] = "";
                }
            }

            $vars = ["user" => $user, "errors" => $errors];

            ViewHelper::render("view/edit-profile.php", $vars);
        }


        public static function editProfile(){
            $rules = [
                "USERNAME" => [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" => ["regexp" => "/^[ <a-zA-Z0-9>ščćžŠČĆŽ]+$/"]
                ],
                // we convert HTML special characters
                "PASSWORD" => FILTER_SANITIZE_SPECIAL_CHARS,
                "CONFIRM_PASSWORD" => FILTER_SANITIZE_SPECIAL_CHARS,
                "PREDZNANJE" => [
                    "filter" => FILTER_VALIDATE_INT,
                    "options" => ["min_range" => 1, "max_range" => 3]
                ],
    
                "GSM" => 
                [
                    "filter" => FILTER_VALIDATE_REGEXP,
                    "options" =>  ["regexp" => "/^[ <0-9>]*$/"]
                ],
                "SPOL" => FILTER_SANITIZE_SPECIAL_CHARS
            ];
    
            $data = filter_input_array(INPUT_POST, $rules);
            
            $hits = SkalcaDB::findUserByName($data["USERNAME"]);
            
    
            $errors["USERNAME"] = $data["USERNAME"] === false  ? "Izberite si uporabniško ime: dovoljene so samo črke in številke" : "";
            $errors["USERNAME"] = (!empty($hits)) ? "Uporabniško ime že obstaja" : "";
            $errors["PASSWORD"] = !($data["PASSWORD"] == $data["CONFIRM_PASSWORD"]) ? "Gesli se nista ujemali. Bodite pozorni pri črkovanju!" : "";
            $errors["PASSWORD"] = empty($data["PASSWORD"]) ? "Vpiši geslo!" : "";
            $errors["GSM"] = $data["GSM"] === false && strlen($data["GSM"]) == 9 ? "Vpišite svoj GSM. Številka mora biti sestavljena iz 9števk npr. 041551691" : "";
    
            $isDataValid = true;
            foreach ($errors as $error) {
                $isDataValid = $isDataValid && empty($error);
            }
            if ($isDataValid){
                SkalcaDB::update($_SESSION["user_id"],$data["USERNAME"], $data["PASSWORD"], $data["PREDZNANJE"], $data["GSM"], $data["SPOL"]);
                $_SESSION["username"] =$data["USERNAME"];
                $players = SkalcaDB::getAllPlayers();
                ViewHelper::render("view/all-players.php", ["players" => $players, "updateMessage" => "Vaš profil je bil posodobljen."]);
            }else{
                self::showEditForm($errors);
            }

        }

        public static function deleteUser(){
            #confirm delete
            $rules = [
                "confirm_delete" => FILTER_VALIDATE_BOOLEAN
            ];
            $data = filter_input_array(INPUT_POST, $rules);
            if ($data["confirm_delete"] == true){
                SkalcaDB::deleteUser($_SESSION["user_id"]);
                self::logout();
            }
        }

        public static function logout(){
            session_destroy();
            ViewHelper::redirect(BASE_URL . "");
        }


}