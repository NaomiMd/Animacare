<?php
require_once _ROOT_ . "/Controller/GalleryController.php";
$galleryController = new GalleryController();
$galleries = $galleryController->getAll();
?>

<div class="container-fluid accueil_header">
  <h1>
    Votre partenaire de confiance pour la santé <br />
    et le bonheur de vos compagnons.
  </h1>
  <div class="hr"></div>
  <h3>Clinique Animacare</h3>
  <div class="btn button">
    <a href="<?= generateLink("appointment.php") ?>">prendre rendez-vous</a>
  </div>
</div>

<div class="container-fluid text-center presentation">
  <div class="space">
    <img class="oval d-flex" src="<?= generateLink("assets/img/ambulance.png") ?>" alt="urgence">
    <span>Urgence 7j/7<br>24h/24</span>
  </div>
  <div class="space">
    <img class="oval d-flex" src="<?= generateLink("assets/img/medicine.png") ?>" alt="service vétérinaire">
    <span>Services<br>Vétérinaire</span>
  </div>
  <div class="space">
    <img class="oval d-flex" src="<?= generateLink("assets/img/doctor.png") ?>" alt="medecins">
    <span>Médecins<br>Spécialisés</span>
  </div>
</div>

<div class="container clinique">
  <h4>La clinique Animacare vous accueille au 115 Rue des Lilas 75012 Paris.</h4>
  <p>
    Nos vétérinaires et assistants vétérinaires de la Clinique Animacare vous accueillent <b>24h/24</b>, pour le bien être<br>
    de votre animal de compagnie au numéro de téléphone qui suit : <strong> 02 4513 3 </strong><br>
    Nous disposons d'un service d'hospitalisation et d'un service d'urgence assuré par notre équipe de nuit <b>24h/24, 7j/7<b>.
  </p>
</div>

<div class="container-fluid service text-center">
  <h4>Nos services</h4>

  <div class="service_class">
    <div class="service_class_item">
      <img class="oval" src="<?= generateLink("assets/img/surgery.png") ?>"alt="Chirurgie">
      <span>Chirurgie</span>
    </div>

    <div class="service_class_item">
      <img class="oval" src="<?= generateLink("assets/img/stethoscope.png") ?>" alt="Médecine générale">
      <span>Médecine générale</span>
    </div>

    <div class="service_class_item">
      <img class="oval" src="<?= generateLink("assets/img/imaging.png") ?>" alt="Radiologie">
      <span>Radiologie</span>
    </div>

    <div class="service_class_item">
      <img class="oval" src="<?= generateLink("assets/img/nac.png") ?>" alt="N.A.C">
      <span>N.A.C</span>
    </div>

    <div class="service_class_item">
      <img class="oval" src="<?= generateLink("assets/img/ambulance.png") ?>" alt="Hospitalisation">
      <span>Hospitalisation</span>
    </div>
  </div>
</div>

<div class="container team">
  <h4>Une équipe engagée</h4>
  <p>Notre équipe vétérinaire dévouée offre des soins de qualité pour vos animaux de compagnie.</p>
  <p>Avec compassion et expertise, nous sommes là pour répondre à leurs besoins.</p>
</div>
<div class="container-fluid text-center mt-4">
  <a class="btn btn_team" href="<?= generateLink("clinique.php") ?>">Voir l'équipe</a>
  <div class="hr_team"></div>
</div>

<!-- CAROUSEL -->

<div id="carouselExample" class="carousel slide mb-5 mt-5">
    <div class="carousel-inner">
    <?php foreach ($galleries as $key => $gallery) : 
      ?>
      <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
        
        <img src="./assets/img/<?= $gallery->getImage_url(); ?>" class="d-block" alt="<?= $gallery->getName(); ?>">
      </div>
    <?php endforeach ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div> 
