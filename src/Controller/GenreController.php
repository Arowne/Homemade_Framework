<?php
class GenreController extends Controller
{
  public function genreFilmAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $genreModel = new GenreModel($paramsPost, $paramsGet);

    $userInfo = $userModel->getUser();
    $allGenre = $genreModel->getGenres();

    $this->render('all-genre', ['titre' => 'Tous les genres', 'allGenre' => $allGenre, 'sidebar' =>'src/View/Required/sidebar-admin.php', 'userInfo' => $userInfo, 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);

  }


  public function modifGenreAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $genreModel = new GenreModel($paramsPost, $paramsGet);

    $userInfo = $userModel->getUser();
    $allGenre = $genreModel->getGenres();
    $id = $genreModel->modifGenre();

    if (isset($id)) {
      $this->render('modif-genre', ['titre' => 'Genre Modifier', 'allGenre' => $allGenre, 'sidebar' =>'src/View/Required/sidebar-admin.php', 'userInfo' => $userInfo, 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
    }
    else{
      $this->render('modif-genre', ['titre' => 'ModifGenre', 'allGenre' => $allGenre, 'sidebar' =>'src/View/Required/sidebar-admin.php', 'userInfo' => $userInfo, 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
    }

  }

  public function addGenreAction() {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $genreModel = new GenreModel($paramsPost, $paramsGet);

    $userInfo = $userModel->getUser();
    $addGenre = $genreModel->addGenres();

    if (isset($id)) {
      header("Location: user/all-genre");
    }
    else{
      $this->render('add-genre', ['titre' => 'Ajouter un genre', 'sidebar' =>'src/View/Required/sidebar-admin.php', 'userInfo' => $userInfo, 'footer' => 'src/View/Required/footer-admin.php', 'links' => 'src/View/Required/header-admin.php']);
    }

  }

  public function delGenreAction() {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $genreModel = new GenreModel($paramsPost, $paramsGet);

    $userInfo = $userModel->getUser();
    $id = $genreModel->delGenres();

    if (isset($id)) {
      header("Location: all-genre");
    }

  }

}
