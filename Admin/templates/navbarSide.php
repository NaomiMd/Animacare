<a class="btn btn-navSide" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
<svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg>
</a>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <a href="<?= generateLink("index.php") ?>" class="offcanvas-title" id="offcanvasExampleLabel"><img src="<?= generateLink("assets/Img/logo.png")?>" width="150" alt="logo"></a>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav mt-4">
        <li class="nav-item mb-2">
          <a href="<?= generateLink("Admin/Dashboard.php") ?>" class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= generateLink("Admin/Schedule/viewSchedule.php")?>" class="nav-link">Horaires</a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= generateLink("Admin/Gallery/viewGallery.php")?>" class="nav-link">Galerie</a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= generateLink("Admin/Appointment/viewAppointment.php")?>" class="nav-link">Rendez-vous</a>
        </li>
        <li class="nav-item mb-2">
          <a href="<?= generateLink("Admin/Employees/viewEmployee.php")?>" class="nav-link">Employés</a>
        </li>
      </ul>
      <div class="logout-btn" >
        <a href="<?= generateLink("logout.php") ?>" class="nav-link">Se déconnecter</a>
      </div>
  </div>
</div>