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
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                        <th>Igralec</th>
                        <th><abbr title="Odigrane sezone">Igralne sezone</abbr></th>
                        <th><abbr title="Znanje ob prijavi">Predznanje</abbr></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Megi</td>
                            <td>Škufca</td>
                            <td>Začetnik</td>
                        </tr>
                        <tr>
                            <td>Janez</td>
                            <td>Škufca</td>
                            <td>Profesionalec</td>
                        </tr>
                    </tbody>
                </div>
        </div>
    </div>

<script> 
    const selected = document.getElementById("all_players")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

</script>
</body>
</html>