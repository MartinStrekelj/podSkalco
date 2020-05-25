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
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                        <figure class="image is-64x64">
                            <img class ="is-rounded" src="<?= "https://api.adorable.io/avatars/64/" . $player["PID"] . "png" ?>  " alt="avatar">
                        </figure>
                        </div>
                        <div class="level-item">
                            <p class="title is-4 has-text-right"> <?= $player["USERNAME"]?></p>
                        </div>
                        </div>
                    </div>
                    <table class="table is-narrow"> 
                    <tbody>
                    <tr>
                        <td><p class="subtitle is-5 has-text-justify">Spol:</td>  
                        <td><span class="tag is-medium is-info"><?= $player["SPOL"]?></span></p></td>
                    </tr>
                    <tr>
                        <td><p class="subtitle is-5">Telefonska številka:</td> 
                        <td><span class="tag is-medium is-info"><?= $player["GSM"]?></span></p></td>
                    </tr>
                    <tr>
                        <td><p class="subtitle is-5">Član od: </td> 
                        <td><span class="tag is-medium is-info"><?= $player["PRIDRUŽITEV"]?></span></p></td>
                    </tr>
                    <tr>
                        <td><p class="subtitle is-5">Znanje:</td> 
                        <td>  
                        <span class="tag is-medium is-info"><?php 
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
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
        </div>
    </div></table>
    </table>
<script> 
    const selected = document.getElementById("all_players")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

</script>
</body>
</html>