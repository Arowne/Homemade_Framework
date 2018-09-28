<?php
class UserController extends Controller
{
  public function modifFilmAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $genreModel = new GenreModel();
    $filmModel = new FilmModel($paramsPost, $paramsGet);

    $userInfo = $userModel->getUser();
    $getGenre = $genreModel->getGenres();
    $getDetailFilm = $filmModel->getDetailFilm($paramsGet['f']);
    $getNoteFilm = $filmModel->getNoteFilm($paramsGet['f']);
    $id = $filmModel->saveFilm();

    if (isset($id)) {
      $this->render('modif-film', ['titre' => 'Film modifié', 'userInfo' => $userInfo, 'getNoteFilm' => $getNoteFilm, 'getGenre' => $getGenre, 'getDetailFilm' => $getDetailFilm, 'sidebar' =>'src/View/Required/sidebar-admin.php',  'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
    }
    else{
      $userInfo = $userModel->getUser();
      $this->render('modif-film', ['titre' => 'Modifier un film', 'userInfo' => $userInfo, 'getNoteFilm' => $getNoteFilm,  'getGenre' => $getGenre, 'getDetailFilm' => $getDetailFilm, 'sidebar' =>'src/View/Required/sidebar-admin.php',  'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
    }

  }
  // Fonction de connexion
  public function loginAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");

    if (isset($paramsPost['email']) && isset($paramsPost['password'])) {
      $userModel = new UserModel($paramsPost);
      $userModel->login();
    }

    if (isset($_SESSION['id'])) {
      ?><script>window.location = "/PiePHP/"</script><?php
    }

    $this->render('login', ['titre' => 'Login', 'footer' => 'src/View/Required/footer.php', 'links' => 'src/View/Required/header-connexion.php']);

  }

  // Fonction d'enregistrements
  public function registerAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $user = new UserModel($paramsPost);
    $user->save();
    if (isset($user->id)) {
      $this->render('registered', ['titre' => 'Bienvenue', 'footer' => 'src/View/Required/footer.php', 'links' => 'src/View/Required/header-connexion.php']);
    }
    else {
      $this->render('register', ['titre' => 'Crée votre compte', 'footer' => 'src/View/Required/footer.php', 'links' => 'src/View/Required/header-connexion.php']);
    }

  }

  // Fonction de consultation de profil
  public function profilAction()
  {

    $filmModel = new FilmModel();
    $userModel = new UserModel();

    $countFilms = $filmModel->getFilmAction();
    $userInfo = $userModel->getUser();
    $membreId = $userModel->getUserSecret();
    $seenFilms = $filmModel->filmViewUser($membreId[0]->id_membre);
    $addedFilms = $filmModel->filmAddUser();

    $this->render('profil',['titre' => 'Profil', 'userInfo' => $userInfo, 'countFilms' => $countFilms, 'seenFilms' => $seenFilms, 'addedFilms' => $addedFilms, 'sidebar' =>'src/View/Required/sidebar-admin.php', 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
  }

  // Fonction de consultation de profil
  public function addFilmAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $userModel = new UserModel();
    $genreModel = new GenreModel();
    $appModel = new FilmModel($paramsPost);

    $userInfo = $userModel->getUser();
    $getGenre = $genreModel->getGenres();
    $id = $appModel->addFilm();

      if (isset($id)) {
        $this->render('add-film', ['titre' => 'Film enregistrer', 'userInfo' => $userInfo, 'getGenre' => $getGenre, 'sidebar' =>'src/View/Required/sidebar-admin.php',  'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
      }
      else{
        $userInfo = $userModel->getUser();
        $this->render('add-film', ['titre' => 'Ajouter un film', 'userInfo' => $userInfo,  'getGenre' => $getGenre, 'sidebar' =>'src/View/Required/sidebar-admin.php',  'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
      }

  }

  // Fonction de consultation de profil
  public function addedFilmAction()
  {

    $userModel = new UserModel();
    $filmModel = new FilmModel();

    $userInfo = $userModel->getUser();
    $membreId = $userModel->getUserSecret();
    $addedFilms = $filmModel->filmAddUser();

    $this->render('added-film',['titre' => 'Films ajouter', 'userInfo' => $userInfo, 'addedFilms' => $addedFilms, 'sidebar' =>'src/View/Required/sidebar-admin.php', 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);

  }

  // Fonction de consultation de profil
  public function delFilmAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $filmModel = new FilmModel($paramsPost, $paramsGet);
    $filmModel->delFilm();

  }

  // Fonction de consultation de profil
  public function historyAction()
  {

    $userModel = new UserModel();
    $filmModel = new FilmModel();

    $userInfo = $userModel->getUser();
    $membreId = $userModel->getUserSecret();
    $seenFilms = $filmModel->filmViewUser($membreId[0]->id_membre);

    $this->render('history', ['titre' => 'Historique', 'userInfo' => $userInfo, 'seenFilms' => $seenFilms, 'sidebar' =>'src/View/Required/sidebar-admin.php',  'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
  }

  // Fonction de parametres du compte
  public function accountSettingAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $user = new UserModel($paramsPost);

    $userInfo = $user->getUser();
    $userInfo2 = $user->getUserSecret();
    $user->saveUpdate($userInfo, $userInfo2);

      if (isset($user->confirmation)) {
        $this->render('registered', ['titre' => 'Modification profil', 'footer' => 'src/View/Required/footer.php', 'links' => 'src/View/Required/header-connexion.php']);
      }
      else {
        $this->render('account-info', ['titre' => 'Informations du compte', 'userInfo' => $userInfo, 'userInfo2' => $userInfo2, 'sidebar' =>'src/View/Required/sidebar-admin.php',  'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
      }

  }

  public function delUserAction()
  {
    $userModel= new UserModel();

    $userModel->delUser($_SESSION['id']);

    $this->render('deconnexion', ['titre' => 'Deconnexion', 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
  }
  
  public function deconnexionAction()
  {

    $this->render('deconnexion', ['titre' => 'Deconnexion', 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);

  }
}
