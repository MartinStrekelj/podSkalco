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
                            <th>Naziv tekmovanja</th>
                            <th>Čas in datum tekmovanja</th>
                            <th>Številka igrišča</th>
                            <th>Uredi tekmo</th>
                            <th>Izbriši tekmo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>foo</td>
                            <td>smth</td>
                            <td>bar</td>
                            <td><a href="" class="button is-warning">Uredi</a></td>
                            <td><a href="" class="button is-danger">Izbriši</a></td>
                        </tr>
                    </tbody>
                </div>
        </div>
    </div>

<script> 
    const selected = document.getElementById("my_matches")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

</script>
</body>
</html>