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
            <p class="title is-1 is-spaced has-text-info">
                    Badminton Pod Skalco <span class="icon is-large"><i class="fas fa-spa"></i></span>
            </p>
            <p class="subtitle is-3">
                    Prijava članov
            </p>
            <?php if (!empty($errorMessage)): ?>
                <div class="notification is-danger">
                    <button class="delete"></button>
                    <?= $errorMessage ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($registerMessage)): ?>
                <div class="notification is-success">
                    <button class="delete"></button>
                    <?= $registerMessage ?>
                </div>
            <?php endif; ?>

        </div>
        <div class="hero-body">
            <div class="container">
            <form action="<?=BASE_URL . "login"?>" method="POST">
                <div class="field">
                <label class="label" style="font-size: 1.3em">Ime</label>
                <div class="control">
                    <input name="USERNAME" autocomplete="off" class="input is-info is-medium" type="text" placeholder="Uporabniško ime">
                </div>
                </div>
                <div class="field">
                <label class="label" style="font-size: 1.3em">Geslo</label>
                <div class="control">
                    <input name="PASSWORD" class="input is-info is-medium" type="password" placeholder="Svojega gesla ne deli z nikomer!">
                </div>
                </div>
                <div class="field is-grouped is-grouped-right">
                <div class="control">
                    <button type="submit" class="button is-info is-medium">Prijava</a>
                </div>
                <div class="control">
                    <a href="<?=BASE_URL . "index" ?>" class="button is-info is-medium">Vstopi kot gost</a>
                </div>
                </div>
                </form>
                <p class="title is-3">Registracija</p>
                <p class="subtitle is-4">Če bi se radi pridružili badminton društvu "Pod Skalco" se 
                    <a style="text-decoration:underline;" href="<?= BASE_URL . "registration"?>">registriraj.</a></p>
            </div>
        </div>
    </div>
    <script>
         document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
            $notification.parentNode.removeChild($notification);
            });
        });
        });
    </script>
</body>
</html>