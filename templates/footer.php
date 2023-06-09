<footer>
    <div class="container-fluid footer">
    <div class="row mx-auto pb-4 p-2 align-item-center">
        <div class="col-md-4 pt-4 ps-5" >
            <h5>Clinique Vétérinaire Animacare</h5>
            <p>15 Rue des Lilas</p>
            <p>75012 Paris</p>
        </div>
        <div class="col-md-4 pt-4 ps-5" >
            <h5>Urgence 24h/24 7j/7: 0245133</h5>
            <p>Rendez-vous: du lundi au samedi de 8h à 20h</p>
            <div class=" btn btn_rdv" >
             <a href="<?= generateLink("appointment.php") ?>">Prendre rendez-vous</a>
             </div>
        </div>
        <div class="col-md-4 pt-4 ps-5" >
            <h5>Rejoignez-nous sur :</h5>
            <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
            <a href="http://www.facebook.com/"><i class="bi bi-facebook"></i></a>
            
        </div>
    </div>
    </div>

<div class="container-fluid d-flex copyright">
    <img src="<?= generateLink("assets/img/logo.png") ?>" class="logo_footer" alt="logo">
    <p> &copy; copyright - 2023</p>
</div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>