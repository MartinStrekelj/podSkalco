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
                    <p class="title is-4 is-spaced">Moj profil</p>
                    <p class="subtitle is-5">Uporabniško ime: <span class="tag is-medium is-info"><?= $player["USERNAME"]?></span></p>
                    <p class="subtitle is-5">Spol: <span class="tag is-medium is-info"><?= $player["SPOL"]?></span></p>
                    <p class="subtitle is-5">Telefonska številka: <span class="tag is-medium is-info"><?= $player["GSM"]?></span></p>
                    <p class="subtitle is-5">Član od: <span class="tag is-medium is-info"><?= $player["PRIDRUŽITEV"]?></span></p>
                    <p class="subtitle is-5">Znanje: <span class="tag is-medium is-info"><?php 
                    if ($player["PREDZNANJE"] == 1){
                        echo "Začetnik";
                    }
                    elseif ($player["PREDZNANJE"] == 2){
                        echo "Izkušen igralec";
                    }
                    else{
                        echo "Veteran";
                    }
                    ?></span></p>
                    <hr>
                    <a href="<?= BASE_URL . "edit-profile" ?>" class="button is-warning">Uredi profil</a>
                    <hr>
                    <form action="<?= BASE_URL . "delete-user" ?>" method="post">
                        <label class="checkbox">
                        <input name="confirm_delete" type="checkbox" required>
                            Prepričan sem, da želim izbrisati profil.
                        </label>
                        <br>
                        <button type="submit" style="margin-top: 20px" class="button is-danger">Izbriši profil</button>
                        </form>
                </div>
        </div>
    </div>

<script> 
    const selected = document.getElementById("my_profile")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

</script>
</body>
</html>