<?php
class Request {
    public $securePost;
    public $secureGet;

    public function __construct() {

      $securePost = [];
      foreach ($_POST as $key => $value) {
        $securePost[$key] = $this->securisation($value);
      }
      $this->securePost = $securePost;

      $secureGet = [];
      foreach ($_GET as $key => $value) {
        $secureGet[$key] = $this->securisation($value);
      }
      $this->secureGet = $secureGet;

    }

    public function getQueryParams($method){

        if ($method == 'POST') {
          return $this->securePost;
        }
        else if ($method == 'GET'){
          return $this->secureGet;
        };

    }

    public function securisation($data) {

  		$data = trim($data);
  		$data = strip_tags($data);
  		$data = stripslashes($data);
  		return $data;

  	}

}
