<body class="animsition">
    <div class="page-wrapper">
        <?php require_once($sidebar);?>
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
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
                                              <th class="text-right">MODIFIER</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($seenFilms as $film): ?>
                                          <tr>
                                              <td><?= $film->titre ?></td>
                                              <td><?= $film->duree_min . ' min';?></td>
                                              <td><?= substr($film->resum, 0, 40); ?></td>
                                              <td><?= $film->nom ?></td>
                                              <td class="text-right"><?= $film->annee_prod ?></td>
                                              <td class="text-right"><i class="fas fa-trash" onclick="window.location = '/PiePHP/user/del-history?f=<?= $film->id_film;?>'"></i></td>
                                          </tr>
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
