<?php
class HistoriqueController extends Controller
{
  private static $relation = ['has many film' => 'film'];

  public function addHistoryAction ()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $historique = new HistoriqueModel($paramsPost, $paramsGet);
    $user = new UserModel();
    $vueModel = new VueModel($paramsPost, $paramsGet);

    $getUser = $user->getUser();
    $getUserSecret = $user->getUserSecret();
    $historique->addHistory($getUserSecret[0]->id_membre);
    $vueModel->setVue();

    header('Location: /PiePHP/Films/Details?f=' . $_GET['f']);
  }

  public function delHistoriqueAction ()
  {

    $paramsPost = $this->request->getQueryParams("POST");
    $paramsGet = $this->request->getQueryParams("GET");

    $historique = new HistoriqueModel($paramsPost, $paramsGet);
    $user = new UserModel();

    $getUser = $user->getUser();
    $getUserSecret = $user->getUserSecret();
    $historique->delHistorique($getUserSecret[0]->id_membre);

    header('Location: /PiePHP/user/history');
  }

}
