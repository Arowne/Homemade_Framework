<body class="animsition">
    <div class="page-wrapper">
        <?php require_once($sidebar);?>
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-20">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item">PROFIL</li>
                                        </ul>
                                    </div>
                                    <button class="au-btn au-btn-icon au-btn--green" onclick="window.location = 'add-film-admin.php' " >
                                        <i class="zmdi zmdi-plus"></i>ajouter un film
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 profil-box" onclick="window.location='/PiePHP/Films'">
                                <div class="statistic__item">
                                    <h2 class="number"><?= $countFilms;?></h2>
                                    <span class="desc"> films disponible</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 profil-box" onclick="window.location='/PiePHP/user/added-film'">
                                <div class="statistic__item">
                                    <h2 class="number"><?= count($addedFilms);?></h2>
                                    <span class="desc">films ajouter</span>
                                    <div class="icon">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 profil-box" onclick="window.location='/PiePHP/user/history'">
                                <div class="statistic__item">
                                    <h2 class="number"><?= count($seenFilms);?></h2>
                                    <span class="desc">films vue</span>
                                    <div class="icon">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">DERNIERS FILMS VUE </h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>TITRE</th>
                                                <th>DUREE</th>
                                                <th>RESUME</th>
                                                <th>GENRE</th>
                                                <th class="text-right">ANNEE DE PRODUCTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i = 0;?>
                                          <?php foreach ($seenFilms as $film): ?>
                                            <?php $i++;?>
                                              <tr>
                                                  <td><?= $film->titre ?></td>
                                                  <td><?= $film->duree_min . ' min';?></td>
                                                  <td><?= substr($film->resum, 0, 40); ?></td>
                                                  <td><?= $film->nom ?></td>
                                                  <td class="text-right"><?= $film->annee_prod ?></td>
                                              </tr>
                                            <?php if ($i == 5) { break;} ?>
                                          <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</body>

</html>
<!-- end document-->
