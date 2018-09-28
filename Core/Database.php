<?php
class Database
{
  private $server = 'localhost';
  private $user = 'root';
  private $password = 'root';
  private $dbname = 'epitech_tp';
  public $connexion;

  function __construct($server = null, $user = null, $password = null, $dbname = null)
  {

    if ($server = null) {
      $this->server = $server;
      $this->user = $user;
      $this->password = $password;
      $this->dbname = $dbname;
    }

    try{
      $this->connexion = new PDO("mysql:host=" . $this->server . ";dbname=" . $this->dbname . ";charset=utf8", $this->user, $this->password);
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
      $e->getMessage();
    }

    if (!isset($_SESSION)) {
      session_start();
    }

  }

}
