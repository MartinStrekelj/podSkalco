
<?php

require_once("ViewHelper.php");

class UserController {

    public static function showLoginForm(){
        ViewHelper::render("view/login.php");
    }

    public static function login(){
        ViewHelper::render("view/login.php");
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
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);
        
        $hits = SkalcaDB::findUserByName($data["USERNAME"]);
        var_dump(count($hits));
        

        $errors["USERNAME"] = $data["USERNAME"] === false  ? "Izberite si uporabniško ime: dovoljene so samo črke in številke" : "";
        $errors["USERNAME"] = (count($hits) != 0) ? "Uporabniško ime že obstaja" : "";

        $errors["PASSWORD"] = empty($data["PASSWORD"]) ? "Vpiši geslo!" : "";
        $errors["PASSWORD"] = !($data["PASSWORD"] == $data["CONFIRM_PASSWORD"]) ? "Gesli se nista ujemali. Bodite pozorni pri črkovanju!" : "";
        $errors["GSM"] = $data["GSM"] === false ? "Vpišite svoj GSM. Številka mora biti sestavljena iz 9števk npr. 041-551-691" : "";



        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid){
            SkalcaDB::register($data["USERNAME"], $data["PASSWORD"], $data["PREDZNANJE"], $data["GSM"]);
            ViewHelper::redirect(BASE_URL . "login");
        }else{
            self::showRegistrationForm($data, $errors);
        }
        }


}