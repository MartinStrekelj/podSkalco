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
                <div class="column is-8">
                <div class="field" style="margin-top: 20px">
            <label class="label">Naziv tekme</label>
            <div class="control has-icons-left has-icons-right">
                <input id="match_title" class="input" type="text" placeholder="npr. Petkova liga">
                <span class="icon is-small is-left">
                <i class="fas fa-heading"></i>
                </span>
            <!-- </div>
            <p class="help is-success">This username is available</p>
            </div> -->
            <div class="field" style="margin-top: 20px">
            <label class="label">Opis tekme</label>
            <textarea id="description" class="textarea is-info" placeholder="Povej ostalim igralcem na kaj se prijavljajo" rows="5"></textarea>
            <!-- </div>
            <p class="help is-danger">This email is invalid</p>
            </div> -->

            <div class="field" style="margin-top: 20px">
            <label class="label">Igrišče</label>
            <div class="control">
                <div class="select">
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                </div>
            </div>
            </div>

            <div class="field is-grouped" style="margin-top: 20px">
            <div class="control">
                <button class="button is-link">Organiziraj</button>
            </div>
            <div class="control">
                <button onclick="resetForm()" class="button is-link is-inverted">Pobriši vse</button>
            </div>
            </div>
                </div>
            </div>
        </div>
    </div>

<script> 
    const selected = document.getElementById("new_match")
    if (selected != undefined){
        selected.classList.add("is-active");
    }

    resetForm = () => {
        const match_description = document.getElementById("description")
        const match_title = document.getElementById("match_title")
        match_description.reset()
        match_title.reset()

    }

</script>
</body>
</html>