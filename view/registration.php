<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
 
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
            <a href="<?= BASE_URL . "login" ?>" class="button is-danger"><span class="icon is-large is-left"><i class="fas fa-caret-left"></i></span>-  Pojdi nazaj</a>
            <form action="<?= BASE_URL . "registration" ?>" method="POST">
            <div class="field" style="margin-top: 20px">
            <label class="label">Uporabniško ime</label>
            <div class="control has-icons-left has-icons-right">
                <input name="USERNAME" class="input" type="text" placeholder="Vpiši svoje uporabniško ime!">
                <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
                </span>
            <div class="field" style="margin-top: 20px">
            <label class="label">Geslo</label>
            <div class="control has-icons-left has-icons-right">
                <input name="PASSWORD" class="input" type="test" placeholder="Izberi si geslo">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
                <div class="field" style="margin-top: 20px">
            <label class="label">Ponovi geslo</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="password" placeholder="Ponovi geslo">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
                <label class="label">Telefonska številka</label>
            <div class="control has-icons-left has-icons-right">
                <input name="GSM" class="input" type="password" placeholder="GSM. npr 041242992">
                <span class="icon is-small is-left">
                <i class="fas fa-unlock-alt"></i>
                </span>
            <div class="field" style="margin-top: 20px">
            <label class="label">Izkušnje in predznanje</label>
            <div class="control">
                <div class="select">
                <select name="PREDZNANJE">
                    <option value="1">Začetnik</option>
                    <option value="2">Izkušeni badmintonaš</option>
                    <option value="3">Veteran</option>
                </select>
                </div>
                <div>
                    <p class="help is-info">Izkušnje in predznanje bodo prikazane na vašem igralskem profilu.</p>
                </div>
            </div>
            </div>

            <div class="field" style="margin-top: 20px">
            <div class="control">
                <label class="checkbox">
                <input type="checkbox">
                 Strinjam se z <a href="#">pogoji uporabe</a>
                </label>
            </div>
            </div>

            <div class="field is-grouped" style="margin-top: 20px">
            <div class="control">
                <button type="submit" class="button is-link">Registracija</button>
            </div>
            </div>
            </form>
        </div>
    </div>
    
</body>
</html>