<header>
<nav class="navbar fixed-top navbar-expand-lg p-0">
  <div class="container-fluid navbar_fluid">
    <a class="navbar-brand"><img class="logo" src="<?= generateLink("assets/img/logo.png") ?>" alt="Logo de la clinique"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mx-auto p-0"></div>
      <ul class="navbar-nav">
        <li class="nav-item pt-3">
          <a class="nav-link" aria-current="page" href="<?= generateLink("index.php") ?>">
          <span class="span-nav">Accueil</span>
          </a>
        </li>
       
        <li class="nav-item pt-3">
          <a class="nav-link" href="<?= generateLink("clinique.php") ?>">
          <span class="span-nav" >La clinique</span>
           </a>
        </li>
        <li class="nav-item pt-3">
          <a class="nav-link" href="<?= generateLink("contact.php") ?>">
            <span class="span-nav">Contact</span>
        </a>
        </li>
        <!-- VISIBLE UNIQUEMENT SI UN ADMIN EST CO-->
        <li class="nav-item pt-3">
          <a class="nav-link" href="<?= generateLink("Admin/Dashboard.php") ?>">
            <span class="span-nav">Dashboard</span>
        </a>
        </li>

        <li class="nav-block text-center p-0" id="account" >
          <a class="nav-link" href="<?= generateLink("login.php") ?>">
            <i class="bi bi-person-circle"></i>
            <span class="span-nav">Accèder au compte</span>
        </a>
        </li>
        <li class="nav-block text-center p-0" id="urgency" >
          <div class="nav-link">
            <span>Urgence 24h/24<br> 7j/7</span>
            <span><strong>0245133</strong></span>
        </div>
        </li>
        <li class="nav-block text-center p-0" id="calendar">
          <a class="nav-link" href="<?= generateLink("appointment.php") ?>">
          <i class="bi bi-calendar2-week"></i>
            <span class="span-nav">Prendre RDV</span>
        </a>
        </li>
      </ul>
 
    </div>
  </div>
</nav>
</header>