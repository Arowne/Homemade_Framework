<?php
class ErrorController extends Controller
{
  public function errorAction()
  {
    $this->render('404', ['titre' => 'Error', 'footer' => 'src/View/Required/footer.php', 'links' => 'src/View/Required/header.php']);
  }
}
