<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="/PiePHP/">My cinema</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="/PiePHP/">Home</a></li>
						<li><a href="/PiePHP/Films">Films</a></li>
						<li><a href="/PiePHP/Selection">Selection</a></li>
						<?php if (!isset($_SESSION['id'])):?>
							<li><a href="user/login">Connexion</a></li>
						<?php endif ?>
						<?php if (isset($_SESSION['id'])):?>
							<li class="has-dropdown active">
								<a href="/PiePHP/user/profil"><b><?= $userInfo[0]->prenom; ?></b></a>
								<ul class="dropdown">
									<li><a href="/PiePHP/user/profil"><center>Profil</center></a></li>
									<li><a href="/PiePHP/user/deconnexion"><center>Deconnexion <i class="fas fa-sign-out-alt"></i> </center></a></li>
								</ul>
							</li>
						<?php endif ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
