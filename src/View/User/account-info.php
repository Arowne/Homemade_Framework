<body class="animsition">
    <div class="page-wrapper">
     <?php require_once($sidebar);?>
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
                                 <button class="au-btn au-btn-icon btn-danger" onclick="window.location = 'del-account' " >
                                     <i class="fas fa-trash"></i>supprimer le profil
                                 </button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
         <!-- END BREADCRUMB-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
                    <div class="section__content section__content--p50">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card ">
                                        <div class="card-header">
                                            <strong>AJOUTER UN FILM </strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal text-center">
                                                <!-- Nom -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="nom" class=" form-control-label">Nom</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="nom" name="nom" placeholder="Nom" value="<?= $userInfo[0]->nom;?>" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Prenom -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="prenom" class=" form-control-label">Prenom</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="prenom" name="prenom" placeholder="Prenom" value="<?= $userInfo[0]->prenom;?>" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Date de naissance  -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="date_naissance" class=" form-control-label">Date de naissance</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="date_naissance" name="date_naissance" disabled="" value="<?= date('Y/m/d', strtotime($userInfo[0]->date_naissance));?>"class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Email -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="email" class=" form-control-label">Email</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="email" id="email" name="email" placeholder="Email" value="<?= $userInfo[0]->email;?>" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Ville  -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="adresse" class=" form-control-label">Adresse</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="adresse" name="adresse" placeholder="Adresse" value="<?= $userInfo[0]->adresse; ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Ville  -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="ville" class=" form-control-label">Ville</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="ville" name="ville" placeholder="Ville" value="<?= $userInfo[0]->ville; ?>" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Ville  -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="CP" class=" form-control-label">Code postal</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="number" id="CP" name="CP" placeholder="Code postal" min="0" value="<?= $userInfo[0]->cpostal; ?>" class="form-control">
                                                    </div>
                                                </div>


                                                <!-- Mots de passe  -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="mdp" class=" form-control-label">Mots de passe</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" id="mdp" name="mdp" disabled="" value="*********" class="form-control">
                                                    </div>
                                                </div>

                                                <!-- Confirmation de mots de passe  -->
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="ConfMdp" class=" form-control-label">Confirmation de mots de passe</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="ConfMdp" name="ConfMdp" placeholder="Confirmer votre mots de passe..." class="form-control">
                                                    </div>
                                                </div>


                                                <input type="submit" class="btn btn-primary" value="Partager">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

</body>
