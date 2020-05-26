<?php include_once("controller/MatchController.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title>Pod Skalco</title>
</head>
<body>
    <?php include_once("navbar.php") ?>
    <div class="columns" style="margin-top:20px;">
        <div class="column is-3 is-mobile">
        <?php include_once("sidemenu.php") ?>
        </div>
        <div class="column">
            <div id="match_dashboard" class="columns" style="margin-top: 10px;">
            <div class="column is-12">
                <div class="columns is-multiline is-centered is-variable is-1">
                <?php if (!empty($matches)): ?>
                <?php foreach($matches as $match): ?>
                    <div class="column is-4">
                    <div class="box">
                        <article class="media">
                            <div>
                            </div>
                            <div class="media-content">
                            <div class="content">
                            <p class="title"><?= $match["NAZIV"] ?> </p>
                                <p class="subtitle">Termin: <?php
                                    $originalDate = $match["DATUM"];
                                    $newDate = date("d-m-Y", strtotime($originalDate)); 
                                    echo $newDate
                                    ?>
                                    ob <?= $match["URA"] ?>.05 na igrišču 
                                    <b><?php foreach($fields as $field){
                                        if($field["FID"] == $match["FID"]){
                                            echo $field["NAZIV"];
                                            break;
                                        }
                                    }
                                     ?></b>
                                    <br>
                                    Organizator: <?php foreach($players as $player){
                                    if ($player["PID"] == $match["ORGANIZATOR"]){
                                        echo $player["USERNAME"];
                                        break;
                                    }}?>
                                </p>
                                <?= $match["OPISTEKME"]; ?>
                                </p>
                            </div>
                            <nav class="level is-mobile">
                                <div class="level-left">
                                <?php if(isset($_SESSION["user_id"])): ?>
                                <!-- if user did not like the event yet -->
                                <?php
                                    if (!MatchController::userLiked($match["MID"], $_SESSION["user_id"], $likes)):
                                ?>
                                <button class="like-btn upvote level-item button is-info" aria-label="like" id="<?= $match["MID"]?>">
                                    Zanima me     
                                </button>
                                <?php
                                    else:
                                ?>
                                <!-- if user liked the event -->
                                    <a class="like-btn level-item downvote button is-danger" aria-label="like" id="<?= $match["MID"]?>">
                                        Ne zanima me    
                                    </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <p class="level-item" aria-label="like">
                                    <span>Trenutno se dogodek zanima <span style="font-weight: bolder" id="<?= "likesCount" . $match["MID"] ?>"><?= $match["LIKES"] ?></b></span> oseb.</span>    
                                </div>
                            </nav>
                            </div>
                        </article>
                        </div>
                        </div>    
                <?php endforeach; ?>
                <?php else: ?>
                    <?php include_once("empty-dashboard.php");?>
                <?php endif; ?>
                </div>
                </div>
            </div>
            </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>

    const selected = document.getElementById("dashboard")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

    $(document).ready(function(){
                $("#search-field").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#match-dashboard").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
    });

    $(".like-btn").on("click", function(){
        let match_id = $(this).attr("id");
        $clicked_btn = $(this);
        if ($clicked_btn.hasClass("upvote")){
            action = "like";
        }else{
            action = "dislike";
        }

        if (action == "like"){
            $.ajax({
            url: "<?= BASE_URL .  "api/addUpvote" ?>",
            type: "POST",
            data: {
                "PID": <?= $_SESSION["user_id"] ?>,
                "MID": match_id
            },
            success: function(data){
                    $clicked_btn.removeClass("upvote");
                    $clicked_btn.removeClass("is-link");
                    $clicked_btn.addClass("downvote");
                    $clicked_btn.addClass("is-danger");

                    $("#likesCount" + match_id).text(data.LIKES)
                    $clicked_btn.text("Ne zanima me")
            }     
        });
        } else if (action == "dislike") {
            $.ajax({
            url: "<?= BASE_URL .  "api/removeUpvote" ?>",
            type: "POST",
            data: {
                "PID": <?= $_SESSION["user_id"] ?>,
                "MID": match_id
            },
            success: function(data){
                    $clicked_btn.removeClass("downvote");
                    $clicked_btn.removeClass("is-danger");
                    $clicked_btn.addClass("upvote");
                    $clicked_btn.addClass("is-link");

                    $("#likesCount" + match_id).text(data.LIKES)
                    $clicked_btn.text("Zanima me")
            }  
        })
        }
    })

</script>
</body>
</html>

