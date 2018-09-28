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
                                  <button class="au-btn au-btn-icon au-btn--green" onclick="window.location = 'add-genre' " >
                                      <i class="zmdi zmdi-plus"></i>ajouter un genre
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- END BREADCRUMB-->


            <section>
              <div class="section__content section__content--p30">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-lg-12">
                              <h2 class="title-1 m-b-25">TOUS LES GENRES</h2>
                              <div class="table-responsive table--no-card m-b-40">
                                  <table class="table table-borderless table-striped table-earning">
                                      <thead>
                                          <tr>
                                              <th>NOM DU GENRE</th>
                                              <th>MODIFIER</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach ($allGenre as $genre): ?>
                                          <tr>
                                              <td><?= $genre->nom ?></td>
                                              <td><i class="fas fa-pencil-alt"  onclick="window.location = 'modif-genre?f=<?= $genre->id_genre;?>'"></i>  <i class="fas fa-trash"  onclick="window.location = 'del-genre?f=<?= $genre->id_genre;?>'"></i></td>
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
