<?php require($nav);?>
<aside id="colorlib-hero">
	<div class="flexslider">
		<ul class="slides">
			<?php foreach ($getLastFilms as $film): ?>
					<li>
						<img src="./webroot/assets/affich/gran/<?= $film->id_film ?>.png" class='caroussel-img'>
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
									<div class="slider-text-inner text-center">
										<h1><?= $film->titre;?></h1>
										<p><a class="btn btn-primary btn-demo" href="/PiePHP/Films/Details?f=<?= $film->id_film ?>">Regarder</a></p>
									</div>
								</div>
							</div>
						</div>
					</li>
			<?php endforeach ?>
			</ul>
		</div>
		</aside>
		<!--FORM SEARCH  -->
		<div id="colorlib-reservation">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-wrap">
						<form method="get" action="/PiePHP/Films" class="colorlib-form">
			              	<div class="row">
				               	<div class="col-md-10">
				                  <div class="form-group">
				                    <label for="date">Recherche:</label>
				                    <div class="form-field">
				                      <i class="icon fas fa-film"></i>
				                      <input type="text" name="q" id="date" class="form-control" placeholder="Titre du film rechercher ... " value="<?php if (isset($_GET['q'])){ echo $_GET['q'];} ?>">
				                    </div>
				                  </div>
				                </div>
				                <div class="col-md-2">
				                  <input type="submit" class="btn btn-primary btn-block" value="Rechercher">
				                </div>
			              </div>
			       </form>
					</div>
				</div>
			</div>
		</div>
		<!--END FORM SEARCH  -->
		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center animate-box">
						<h2>A l'affiche</h2>
						<p>Cette semaine à l'affiche dans nos salle située dans toutes la france</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">
								<?php foreach ($getCarrouselFilms as $film): ?>
									<div class="item">
										<img src="./webroot/assets/affich/moy/<?= $film->id_film;?>.png"  class="room" />
										<div class="desc text-center">
											<h2><?= $film->titre ?></h2>
											<p><a href="/PiePHP/Films/Details?f=<?= $film->id_film;?>" class="btn btn-primary btn-book">Regarder</a></p>
										</div>
									</div>
								<?php endforeach ?>
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<a href="/PiePHP/Films">Tous les films <i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
