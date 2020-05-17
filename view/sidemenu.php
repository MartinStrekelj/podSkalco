<aside class="menu is-mobile is-primary" style="margin-left:20px;">
  <p class="menu-label">
    Tekmovanja
  </p>
  <ul class="menu-list">
    <li><a id="dashboard" class="" href="<?= BASE_URL . "index"?>">Vsa tekmovanja</a>
      <ul>
        <li><a id="new_match"  href="<?= BASE_URL . "add-match"?>">Organiziraj novo tekmo</a></li>
        <li><a id="my_matches" href="<?= BASE_URL . "display_match"?>">Moje tekme</a></li>
      </ul>
    </li>
  </ul>
  <p class="menu-label">
    Informacije
  </p>
  <ul class="menu-list">
    <li><a id="my_profile"  href="<?= BASE_URL . "players?id="?>">Moj profil</a></li>
    <li><a id="all_players" href="<?= BASE_URL . "players"?>">Vsi igralci</a></li>
    <li><a id="all_fields"  href="<?= BASE_URL . "fields"?>">Pregled igrišč</a></li>
  </ul>
</aside>