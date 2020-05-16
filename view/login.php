<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badminton Pod Skalco - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>
<body>
    <div class="hero is-fullheight">
    <div class="hero-title">
        <div class="container">
            <p class="title is-1 is spaced">
                    Badminton Pod Skalco <span class="icon is-large"><i class="fas fa-spa"></i></span>
            </p>
            <p class="subtitle is-3">
                    Prijava članov
            </p>
        </div>
        <div class="hero-body">
            <div class="container">
            <form action="<?=BASE_URL . "login"?>">
                <div class="field">
                <label class="label" style="font-size: 1.3em">Ime</label>
                <div class="control">
                    <input class="input is-info is-medium" type="text" placeholder="Uporabniško ime">
                </div>
                </div>
                <div class="field">
                <label class="label" style="font-size: 1.3em">Geslo</label>
                <div class="control">
                    <input class="input is-info is-medium" type="password" placeholder="Svojega gesla ne deli z nikomer!">
                </div>
                </div>
                <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <a href="<?=BASE_URL . "homepage" ?>" class="button is-link is-medium">Prijava</a>
                </div>
                <div class="control">
                    <a href="<?=BASE_URL . "homepage" ?>" class="button is-link is-medium">Vstopi kot gost</a>
                </div>
                </div>
                </form>
                <p class="title is-3">Registracija</p>
                <p class="subtitle is-4">Če bi se radi pridružili badminton društvu "Pod Skalco" se <a style="text-decoration:underline;" >registriraj.</a></p>
                <p class="title is-3">Vstop kot gost</p>
                <p class="subtitle is-4">Če se prijavite kot gost, vam bo na volje le ogled odprtih tekmovanj.</p>
            </div>
        </div>
    </div>
</body>
</html>