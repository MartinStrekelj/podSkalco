<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
 
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
            <a href="<?= BASE_URL . "login" ?>" class="button is-danger"><span class="icon is-large is-left"><i class="fas fa-caret-left"></i></span>-  Pojdi nazaj</a>
            <form action="<?= BASE_URL . "registration" ?>" method="POST">
            <div class="field" style="margin-top: 20px">
            <label class="label">Uporabniško ime</label>
            <div  class="control has-icons-left has-icons-right">
                <input required name="USERNAME" class="input" type="text" placeholder="Vpiši svoje uporabniško ime!" value="<?= $data["USERNAME"] ?>">
                <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
                </span>
                <div>
                    <p class="help is-danger"><?= $errors["USERNAME"]  ?></p>
                </div>
            <div class="field" style="margin-top: 20px">
            <label class="label">Geslo</label>
            <div class="control has-icons-left has-icons-right">
                <input id = "password" required name="PASSWORD" class="input" type="password" placeholder="Izberi si geslo" value="<?= $data["PASSWORD"] ?>" onkeyup="check()">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
                <div>
                    <p class="help is-danger"><?= $errors["PASSWORD"]  ?></p>
                </div>
                <div class="field" style="margin-top: 20px">
            <label class="label">Ponovi geslo</label>
            <div class="control has-icons-left has-icons-right">
                <input id="confirm-password" name="CONFIRM_PASSWORD"  class="input" type="password" placeholder="Ponovi geslo" value="<?= $data["CONFIRM_PASSWORD"] ?>" onkeyup="check();">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
                <div>
                    <p id="passwordChecker" class="help is-info">Ujemanje gesla</p> 
                </div>
                <div class="field" style="margin-top: 20px">
                <label class="label">Telefonska številka</label>
                <div class="control has-icons-left has-icons-right">
                <input name="GSM" class="input" type="text" placeholder="GSM. npr 041242992" value="<?= $data["GSM"] ?>">
                <span class="icon is-small is-left">
                    <i class="fas fa-mobile-alt"></i>
                </span>
                </div>
                <div>
                    <p class="help is-danger"><?= $errors["GSM"]  ?></p>
                </div>
            <div class="field" style="margin-top: 20px">
            <label class="label">Izkušnje in predznanje</label>
            <div class="control">
                <div class="select">
                <select name="PREDZNANJE">
                    <option value="1">Začetnik</option>
                    <option value="2">Izkušeni badmintonaš</option>
                    <option value="3">Veteran</option>
                </select>
                </div>
                <div>
                    <p class="help is-info">Izkušnje in predznanje bodo prikazane na vašem igralskem profilu.</p>
                </div>
            </div>
            </div>

            <div class="field" style="margin-top: 20px">
            <div class="control">
                <label class="checkbox">
                <input required type="checkbox">
                 Strinjam se z <a href="#">pogoji uporabe</a>
                </label>
            </div>
            </div>

            <div class="field is-grouped" style="margin-top: 20px">
            <div class="control">
                <button type="submit" class="button is-link">Registracija</button>
            </div>
            </div>
            </form>
        </div>
    </div>
    <script>
        var check = function() {
            const passwordChecker = document.getElementById("passwordChecker")
         if (document.getElementById('password').value == document.getElementById('confirm-password').value) {
                // Matching
                passwordChecker.innerHTML = "Gesli se ujemati" 
                if (passwordChecker.classList.contains("is-danger")){
                    passwordChecker.classList.replace("is-danger", "is-success");
                }else{
                    passwordChecker.classList.replace("is-info", "is-success");
                }
         } else {
                // NOT
                passwordChecker.innerHTML = "Gesli se ne ujemati"
                
                if (passwordChecker.classList.contains("is-success")){
                    passwordChecker.classList.replace("is-success", "is-danger");
                }else{
                    passwordChecker.classList.replace("is-info", "is-danger");
                }
            }
            if (document.getElementById("password").value.length == 0){
                if (passwordChecker.classList.contains("is-success") && !passwordChecker.classList.contains("is-info")){
                    passwordChecker.classList.replace("is-success", "is-info");
                }else{
                    passwordChecker.classList.replace("is-danger", "is-info");
                }
                passwordChecker.innerHTML = "Ujemanje gesla"
            }
        }
    </script>
</body>
</html>