        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="/PiePHP/" class="text-logo">
                    MY CINEMA
                </a>
            </div>

            <div class="menu-sidebar2__content js-scrollbar1">

                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="../webroot/assets/images/icon/avatar-big-01.jpg" alt="John Doe" />
                    </div>
                    <h4 class="name"><?= $userInfo[0]->prenom; ?></h4>
                    <a href="/PiePHP/user/deconnexion">Deconnexion</a>
                </div>

                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="/PiePHP/user/profil">
                                <i class="fas fa-user-circle"></i>Profil
                            </a>
                        </li>
                        <li>
                            <a href="/PiePHP/Films">
                                <i class="fas fa-film"></i>Recherche films
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="/PiePHP/user/add-film">
                                <i class="fas fa-plus"></i>Ajouter un film
                            </a>
                        </li>
                        <li>
                            <a href="/PiePHP/user/history">
                                <i class="fas fa-book"></i>History
                            </a>
                        </li>
                        <li>
                            <a href="/PiePHP/user/all-genre">
                                  <i class="fas fa-list-alt"></i>Tous les genres
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="/PiePHP/user/account-info">
                                <i class="zmdi zmdi-settings"></i>Parametres du compte
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
