	<div id="page">
    <aside id="colorlib-hero">
    <div class="flexslider">
      <ul class="slides">
        <li style="background-image: url('../webroot/assets/images/fml.png');">
          <div class="overlay"></div>
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
                <div class="slider-text-inner slider-text-inner2 text-center">
                  <div class="connexion-interface">
                    <h4 class="connexion-title">Bienvenue !</h4>
                    <h6 class="cnx-req">Adresse email:</h6>
                    <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                        <span id="err-messcnx" class="err-mess"></span><br>
                        <input type="text" name="email" id="email" class="cnx-inpt" placeholder="Entrez votre email..." value="<?php if (isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>"><br>
                        <h6 class="cnx-req">Mots de passe :</h6>
                        <input type="password" name="password" id="password" class="cnx-inpt" placeholder="Mots de passe ..."><br>
                        <button type="submit" name="submit" id="submit" class="btn btn-block btn-info cnx-btn">Connexion</button><br>
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember" id="remember-text">Se souvenir de moi</label><br>
                        <span><a href="register" class="cnx-link">Inscription </a></span>|<span><a href="forget-password.php" class="cnx-link"> Mots de passe oublié ?</a></span><br>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        </ul>
      </div>
  </aside>
</div>

<div class="gototop js-top">
  <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>
