  <?php require($nav);?>
    <aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				   	<li>
					   	<img src="../webroot/assets/affich/gran/<?= $getDetailFilm[0]->id_film ?>.png" class='caroussel-img' style="position:absolute">
				   		<div class="overlay"></div>
				   		<div class="container-fluid">
				   			<div class="row">
					   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
					   				<div class="slider-text-inner slider-text-inner2 text-center">
					   					<h1><?= $getDetailFilm[0]->titre ?></h1>
					   				</div>
					   			</div>
					   		</div>
				   		</div>
				   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
						<div class="col-md-7 col-md-push-5">
							<article class="animate-box">
								<img src="../webroot/assets/affich/moy/<?= $getDetailFilm[0]->id_film ?>.png" class="blog-img">
								<div class="desc">
									<div class="meta">
										<p>
											<span>
                        <?php if (isset($getNoteFilm[0])) :?>
                          <span>Notre note : </span>
                            <?php for ($i = 0; $i < $getNoteFilm[0]->note; $i++): ?>
  													     <i class="fas fa-star"></i>
                            <?php endfor ?>
                        <?php endif ?>
											</span>
                      <div id="get-vue-div">
                        <b id="get-vue">
                          <i class="fas fa-eye"></i>
                          <?= $getDetailFilm[0]->vues;?>
                        </b>
                      </div>
										</p>
									</div>
                  <h2><?= $getDetailFilm[0]->titre ?></h2>
									<h5><?= $getDetailFilm[0]->nom ?></h5>
									<p><?= $getDetailFilm[0]->resum ?></p>
								</div>
							</article>
						</div>

            <div class="col-md-4 col-md-pull-7" id="prog">
                  <h1>Lire le film <br> </h1>
                  <i class="fas fa-play-circle" id="play-icon" onclick="window.location='/PiePHP/read?f=<?= $_GET['f'];?>'"></i>
            </div>

				</div>
			</div>
		</div>
