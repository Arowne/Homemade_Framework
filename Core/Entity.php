 <?php
class Entity {
  public $orm;
  public $paramsPost;
  public $paramsGet;
  public $dbconnexion;

  public function __construct($paramsPost = false, $paramsGet = false) {
    $this->dbconnexion = new \Database();
    $this->orm = new \ORM();
    if (!empty($paramsPost)) {
      $this->paramsPost = $paramsPost;
    }
    if (!empty($paramsGet)) {
      $this->paramsGet = $paramsGet;
    }
  }

  public function regex(){
    $regex = [
      'email' => '/^[\w\-\+]+(\.[\w\-]+)*@[\w\-]+(\.[\w\-]+)*\.[\w\-]{2,4}$/',
      'nom' => '/^[a-zA-Z-\s]+$/',
      'ville' => '/^[a-zA-Z0-9- ]+$/',
      'cpostal' => '/^[0-9]{5}$/',
      'no_rue' => '/^[0-9]{2}$/',
      'date' => '/^[0-9]{4}-[0-9]{2}-[0-9]{1,2}$/',
      'note' => '/^[0-5]{1}$/',
      'id' => '/^[0-9]+$/',
      'année' => '/^[0-9]{4}$/'
    ];
    return $regex;
  }

}
