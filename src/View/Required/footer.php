<?php if ($titre != "Error"): ?>
<footer id="colorlib-footer" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-4 colorlib-widget">
        <h4>MyCinema</h4>
        <p>Projet developper dans le cadre de la formation webacademie by epitech par Aaron BOATENG.</p>
        <p>
          <ul class="colorlib-social-icons">
            <li><a href="#"><i class="icon-twitter"></i></a></li>
            <li><a href="#"><i class="icon-facebook"></i></a></li>
            <li><a href="#"><i class="icon-linkedin"></i></a></li>
            <li><a href="#"><i class="icon-dribbble"></i></a></li>
          </ul>
        </p>
      </div>
      <div class="col-md-4 colorlib-widget">
        <h4>Quick Links</h4>
        <p>
          <ul class="colorlib-footer-links">
            <li><a href="films.php">Films</a></li>
            <li><a href="selection.php">Selections</a></li>
            <li><a href="abonnement.php">Abonnement</a></li>
            <li><a href="profil.php">Profil</a></li>
          </ul>
        </p>
      </div>
      <div class="col-md-4">
        <h4>Contact Information</h4>
        <ul class="colorlib-footer-links">
          <li>Aaron Boateng, developpeur web <br></li>
          <li><a href="tel://0660865532">+ 06 60 86 55 32 </a></li>
          <li><a href="mailto:info@yoursite.com">aaron.y.boateng@gmail.com</a></li>
          <li><a href="/PiePHP/admin/login">administration</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</div>
<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<?php if ($titre == "Login" || $titre == "Details film") {
  $root = "..";
}
else{
  $root = ".";
} ?>
<!-- jQuery -->
<script src= "<?= $root ?>/webroot/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?= $root ?>/webroot/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?= $root ?>/webroot/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?= $root ?>/webroot/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="<?= $root ?>/webroot/js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="<?= $root ?>/webroot/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="<?= $root ?>/webroot/js/jquery.magnific-popup.min.js"></script>
<script src="<?= $root ?>/webroot/js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="<?= $root ?>/webroot/js/bootstrap-datepicker.js"></script>
<!-- Main -->
<script src="<?= $root ?>/webroot/js/main.js"></script>
<!-- Main -->
<script src="<?= $root ?>/webroot/js/connexion.js"></script>
<?php endif ?>
