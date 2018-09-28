<?php
class Controller
{
  private static $_render;
  protected $request;
  protected $template;

  public function __construct() {
      $this->request = new \Request();
      $this->template = new \TemplateEngine();
      session_start();
  }

  protected function render($view, $scope = []) {
   extract($scope);
   $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
   if (file_exists($f)) {
     ob_start();
     include($f);
     $view = ob_get_clean();
     ob_start();
     include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
     self::$_render = ob_get_clean();
   }
  }


  protected function renderTwig($view, $scope = []) {
   extract($scope);
   $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.html';
   if (file_exists($f)) {
     ob_start();
       $content = $this->template->run($f);
       eval('?>' . $content . '<?php');
     $view = ob_get_clean();
     ob_start();
     include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
     self::$_render = ob_get_clean();
   }
  }


  function __destruct(){
    echo self::$_render;
  }

}
