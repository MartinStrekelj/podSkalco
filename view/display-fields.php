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
            <div class="columns">
                <div class="column is-10">
                <?php foreach ($fields as $field): ?>
                <div class="box">
                    <article class="media">
                        <div class="media-left">
                        <figure class="image is-64x64">
                            <img src="https://images.unsplash.com/photo-1564226803039-3e220a95321f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=291&q=80" alt="Image">
                        </figure>
                        </div>
                        <div class="media-content">
                        <div class="content">
                            <p>
                            <strong><?= $field["NAZIV"] ?></strong>
                            <br>
                            <?= $field["OPIS"] ?>
                            </p>
                        </div>
                </div>
        </div>
        <?php endforeach; ?>
        </div>
    </div>
    </div>

<script> 
    const selected = document.getElementById("all_fields")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

</script>
</body>
</html>