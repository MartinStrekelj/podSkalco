<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organiziraj tekmovanje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
    <?php include_once("navbar.php") ?>
    <div class="columns" style="margin-top:20px;">
        <div class="column is-3 is-mobile">
        <?php include_once("sidemenu.php") ?>
        </div>
        <div class="column">
            <div class="columns is-centered">
                <div class="column is-10">
                    <p class="title is-4">Posodobi profil</p>
                    <form action="<?= BASE_URL . "edit-profile" ?>" method="POST">
            <div class="field" style="margin-top: 20px">
            <label class="label">Uporabniško ime</label>
            <div  class="control has-icons-left has-icons-right">
                <input required name="USERNAME" class="input" type="text" placeholder="Vpiši svoje uporabniško ime!" value="<?= $user["USERNAME"] ?>" autocomplete="off">
                <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
                </span>
                <div>
                    <p class="help is-danger"><?= $errors["USERNAME"]  ?></p>
                </div>
            <div class="field" style="margin-top: 20px">
            <label class="label">Geslo</label>
            <div class="control has-icons-left has-icons-right">
                <input id = "password" required name="PASSWORD" class="input" type="password" placeholder="Izberi si geslo" value="<?= $user["PASSWORD"] ?>" onkeyup="check()">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
                <div>
                    <p class="help is-danger"><?= $errors["PASSWORD"]  ?></p>
                </div>
                <div class="field" style="margin-top: 20px">
            <label class="label">Ponovi geslo</label>
            <div class="control has-icons-left has-icons-right">
                <input id="confirm-password" name="CONFIRM_PASSWORD"  class="input" type="password" placeholder="Ponovi geslo" value="" onkeyup="check();">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
                <div>
                    <p id="passwordChecker" class="help is-info">Ujemanje gesla</p> 
                </div>
                <div class="field" style="margin-top: 20px">
                <label class="label">Telefonska številka</label>
                <div class="control has-icons-left has-icons-right">
                <input name="GSM" class="input" type="text" placeholder="GSM. npr 041242992" value="<?= $user["GSM"] ?>">
                <span class="icon is-small is-left">
                    <i class="fas fa-mobile-alt"></i>
                </span>
                </div>
                <div>
                    <p class="help is-danger"><?= $errors["GSM"]  ?></p>
                </div>
                <div class="field" style="margin-top: 20px">
                <label class="label">Spol</label>
                <div class="control">
                <label class="radio">
                    <input type="radio" name="SPOL" value="M" checked>
                    Moški
                </label>
                <label class="radio">
                    <input type="radio" name="SPOL" value="Ž">
                    Ženski
                </label>
                </div>
                </div>
                </div>
                <div class="field is-grouped" style="margin-top: 20px">
            <div class="control">
                <button type="submit" class="button is-warning">Posodobi</button>
            </div>
            </div>
            </form>
        </div>
    </div>

<script> 
    const selected = document.getElementById("my_profile")
    if (selected != undefined){
        selected.classList.add("is-active");
    }
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