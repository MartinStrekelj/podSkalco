
<nav class="navbar is-spaced" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
        <p class="title is-3 has-text-info">
        Badminton Pod Skalco <span class="icon is-large"><i class="fas fa-spa"></i></span>
        </p>
    </a>
  </div>
    <div class="navbar-end">
      <div class="navbar-item">
        <?php 
        if (isset($_SESSION["user_id"])): ?>
          <div class="buttons">
            <button class="button"><?= $_SESSION["username"]?></button>
          <a href="<?= BASE_URL . "registration" ?>" class="button is-danger is-inverted">
            Odjava
          </a>
        </div>
        <?php else: ?>
          <div class="buttons">
          <a class="button is-info" href="<?= BASE_URL . "login" ?>">
            <strong>Prijava</strong>
          </a>
          <a href="<?= BASE_URL . "registration" ?>" class="button is-info is-inverted">
            Registracija
          </a>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
