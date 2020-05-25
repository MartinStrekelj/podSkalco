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
                <?php if (!empty($timeslotError)): ?>
                <div class="notification is-warning">
                    <button class="delete"></button>
                    <?= $timeslotError ?>
                </div>
            <?php endif; ?>
                <form action="<?= BASE_URL . "add-match" ?>" method="post">
                <div class="field" style="margin-top: 20px">
            <label class="label">Naziv tekme</label>
            <div class="control has-icons-left has-icons-right">
                <input name = "NAZIV" id="match_title" class="input" type="text" placeholder="npr. Petkova liga" required>
                <span class="icon is-small is-left">
                <i class="fas fa-heading"></i>
                </span>
                <div class="field" style="margin-top: 20px">
                    <label class="label">Čas tekme</label>
                    <div class="select">
                    <select name = "URA" required>
                        <option value="8">8.05 - 9.00</option>
                        <option value="9">9.05 - 10.00</option>
                        <option value="10">10.05 - 11.00</option>
                        <option value="11">11.05 - 12.00</option>
                        <option value="12">12.05 - 13.05</option>
                        <option value="13">13.05 - 14.00</option>
                        <option value="14">14.05 - 15.00</option>
                        <option value="15">15.05 - 16.00</option>
                        <option value="16">16.05 - 17.00</option>
                        <option value="17">17.05 - 18.00</option>
                        <option value="18">18.05 - 19.00</option>
                        <option value="19">19.05 - 20.00</option>
                    </select>
                    <span class="icon is-small is-left">
                        <i class="far fa-clock"></i>
                    </span>
                    </div>

                    <div class="field" style="margin-top: 20px">
                        <label class="label">Datum tekmovanja</label>
                            <div class="control has-icons-left has-icons-right">
                                <input name="DATUM" id="match_date" class="input" min="6/3/2020" type="date" required>
                        <span class="icon is-small is-left">
                        <i class="fas fa-calendar-check"></i>
                        </span>
                        </div>
                    <div>
                        <p class="help is-info">Priporočamo izbiro datuma z pomočjo koledarčka</p>
                    </div>
            <div class="field" style="margin-top: 20px">
                <label class="label">Opis tekme</label>
                <textarea name="OPISTEKME" id="description" class="textarea is-info" placeholder="Povej ostalim igralcem na kaj se prijavljajo" rows="5"></textarea>
            </div>
            <div class="field" style="margin-top: 20px">
                <label class="label">Igrišče</label>
                <div class="control">
                    <div class="select">
                    <select name="FID" required>
                        <?php foreach ($fields as $field): ?>
                            <option value="<?= $field["FID"] ?>"> <?= $field["NAZIV"] ?></option>
                        <?php endforeach; ?>
                    </select>
                    </div>
            </div>

            <div class="field is-grouped" style="margin-top: 20px">
            <div class="control">
                <button type="submit" class="button is-link">Organiziraj</button>
            </div>
            </form>
            <div class="control">
                <button onclick="resetForm()" class="button is-danger is-inverted">Pobriši vse</button>
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
        const match_date  = document.getElementById("match_date")
        match_title.value = ""
        match_description.value = ""
        match_date.value = "mm/dd/yyyy"
    }

</script>
</body>
</html>