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
            <div id="#match_dashboard" class="columns">
                <?php include_once("empty-dashboard.php") ?>
            </div>
        </div>
    </div>
    <script> 
    const selected = document.getElementById("dashboard")
    if (selected != undefined){
        selected.classList.add("is-active");
    }
</script>
</body>
</html>