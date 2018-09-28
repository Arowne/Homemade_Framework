<?php
class AppController extends Controller
{
  public function indexAction()
  {
    $userModel = new UserModel();
    $filmModel = new FilmModel();

    $userInfo = $userModel->getUser();
    $getLastFilms = $filmModel->getLastFilms();
    $getCarrouselFilms = $filmModel->getCarrouselFilms();
    $this->render(
    'index',
    [
      'titre' => 'Acceuil',
      'userInfo' => $userInfo,
      'getLastFilms' => $getLastFilms,
      'getCarrouselFilms' => $getCarrouselFilms,
      'nav' => 'src/View/Required/navigateur.php',
      'footer' => 'src/View/Required/footer.php',
      'links' => 'src/View/Required/header.php'
    ]);

  }

  public function abonnementAction()
  {

    $userModel = new UserModel();

    $userInfo = $userModel->getUser();
    $this->render(
    'abonnements',
    [
      'titre' => 'Abonnments',
      'userInfo' => $userInfo,
      'nav' => 'src/View/Required/navigateur.php',
      'footer' => 'src/View/Required/footer.php',
      'links' => 'src/View/Required/header.php'
    ]);

  }

  public function filmAction()
  {

    $userModel = new UserModel();

    $userInfo = $userModel->getUser();

    $this->renderTwig(
    'film',
    [
      'titre' => 'Films',
      'userInfo' => $userInfo,
      'nav' => 'src/View/Required/navigateur.php',
      'footer' => 'src/View/Required/footer.php',
      'links' => 'src/View/Required/header.php'
    ]);
  }

  public function getFilmAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $filmModel = new FilmModel($paramsGet);

    $userInfo = $userModel->getUser();
    $searchFilms = $filmModel->getSearchFilm($paramsGet['q']);

    $this->renderTwig(
    'film',
    [
      'titre' => 'Films',
      'userInfo' => $userInfo,
      'searchFilms' => $searchFilms,
      'nav' => 'src/View/Required/navigateur.php',
      'footer' => 'src/View/Required/footer.php',
      'links' => 'src/View/Required/header.php'
    ]);

  }

  public function selectionAction()
  {
    $userModel = new UserModel();
    $userInfo = $userModel->getUser();
    $this->render(
      'selection',
      [
        'titre' => 'Selection',
        'userInfo' => $userInfo,
        'nav' => 'src/View/Required/navigateur.php',
        'footer' => 'src/View/Required/footer.php',
        'links' => 'src/View/Required/header.php'
      ]);
  }


}
