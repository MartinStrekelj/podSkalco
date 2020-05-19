
<?php

require_once("ViewHelper.php");

class UserController {

    public static function showLoginForm(){
        ViewHelper::render("view/login.php");
    }

    public static function login(){
        ViewHelper::render("view/login.php");
    }

    public static function showRegistrationForm(){
        ViewHelper::render("view/registration.php");
    }

    public static function register(){
        $rules = [
            "USERNAME" => [
                "filter" => FILTER_VALIDATE_REGEXP,
                "options" => ["regexp" => "/^[ <a-zA-Z0-9>]+$/"]
            ],
            // we convert HTML special characters
            "PASSWORD" => FILTER_SANITIZE_SPECIAL_CHARS,
            "PREDZNANJE" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => ["min_range" => 1, "max_range" => 3]
            ],
            "GSM" => [
                "filter" => FILTER_VALIDATE_INT,
                "options" => function ($value) { return (is_numeric($value) && $value >=0 && strlen((string)$value) == 9)
                     ? intval($value) : false; }
            ]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["USERNAME"] = $data["USERNAME"] === false ? "Izberite si uporabniško ime: dovoljene so samo črke in številke" : "";
        $errors["PASSWORD"] = empty($data["PASSWORD"]) ? "Izberite si ustrezno geslo" : "";
        $errors["PREDZNANJE"] = $data["PREDZNANJE"] === false ? "Nastavite si nivo predznanja." : "";
        $errors["GSM"] = $data["GSM"] === false ? "Vpišite svoj GSM. Številka mora biti sestavljena iz 9števk npr. 041-551-691" : "";

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }


        if ($isDataValid){
            SkalcaDB::register($data["USERNAME"], $data["PASSWORD"], $data["PREDZNANJE"], 0, $data["GSM"]);
            ViewHelper::redirect(BASE_URL . "login");
        }else{
            var_dump($data["USERNAME"]);
            var_dump($data["PASSWORD"]);
            var_dump($data["PREDZNANJE"]);
            var_dump($data["GSM"]);
            self::showRegistrationForm($data, $errors);
        }
        }


}