<?php
class FilmController extends Controller
{
  public function DetailFilmAction()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $userModel = new UserModel();
    $filmModel = new FilmModel($paramsGet);

    $userInfo = $userModel->getUser();
    $getDetailFilm = $filmModel->getDetailFilm($paramsGet['f']);
    $getNoteFilm = $filmModel->getNoteFilm($paramsGet['f']);

    $this->render('card', ['titre' => 'Details film', 'getNoteFilm' => $getNoteFilm, 'getDetailFilm' => $getDetailFilm, 'nav' =>'src/View/Required/navigateur.php', 'userInfo' => $userInfo, 'footer' => 'src/View/Required/footer.php', 'links' => 'src/View/Required/header.php']);

  }
}
