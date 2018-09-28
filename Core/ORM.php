<?php
class ORM
{
  private $dbconnexion;

  function __construct(){
    $this->dbconnexion = new \Database();
  }

  public function create ($table, $fields, $idname = false) {

      if (!in_array('', $fields)) {

        $queries = 'INSERT INTO ' . $table ;
        $values = '';
        $flag = '';

        foreach ($fields as $key => $value) {
          $values .= $key . ',';
          $flag .= '?,';
        }

        $queries .= '(' . rtrim($values,',') . ')';
        $queries .= ' VALUES (' . rtrim($flag,',') . ')';
        $fieldsValue = array_values($fields);
        $save = $this->dbconnexion->connexion->prepare($queries);
        $save->execute($fieldsValue);

        if ($idname != false) {
          return $this->lastId($table, $idname);
        }

      } // retourne un id
    }

  public function lastId($table, $idname){

    $queries = 'SELECT ' . $idname . ' FROM ' . $table . ' ORDER BY ' . $idname . ' DESC LIMIT 1 ';
    $reqId = $this->dbconnexion->connexion->prepare($queries);
    $reqId->execute();
    $lastId = $reqId->fetchAll(PDO::FETCH_OBJ);

    return $lastId[0]->$idname;

  }// retourne un id

  public function read ($table, $id) {

      $reqUser = $this->dbconnexion->connexion->prepare('SELECT * FROM ' . $table . 'WHERE id = :id');
      $reqUser->bindParam(":id", $id, PDO::PARAM_INT);
      $reqUser->execute();
      $getUser = $reqUser->fetchAll(PDO::FETCH_OBJ);

      return $getUser;

  } // retourne un objet de l'enregistrement

  public function readUser1 ($table, $id) {

      $reqUser = $this->dbconnexion->connexion->prepare('SELECT * FROM ' . $table . ' WHERE id_perso = ?');
      $reqUser->execute(array($id));
      $getUser = $reqUser->fetchAll(PDO::FETCH_OBJ);

      return $getUser;

  } // retourne un objet de l'enregistrement

  public function readUser2 ($table, $id) {

      $reqUser = $this->dbconnexion->connexion->prepare('SELECT * FROM ' . $table . ' WHERE id_fiche_perso = ?');
      $reqUser->execute(array($id));
      $getUser = $reqUser->fetchAll(PDO::FETCH_OBJ);

      return $getUser;

  } // retourne un objet de l'enregistrement

  public function delete ($table, $col, $id) {

    $queries = 'DELETE FROM ' . $table . ' WHERE ' . $col . ' = :id';
    $reqUser = $this->dbconnexion->connexion->prepare($queries);
    $reqUser->bindParam(":id", $id, PDO::PARAM_STR);
    $reqUser->execute();
    return $id;
  } // retourne un booléen

  public function find ($table, $relations = false, $params = array(' WHERE ' => ' 1 ', ' ORDER BY ' => ' id ASC ', ' LIMIT ')){

    if ($relations == false ) {

      if ($params != false) {
        $param = array_keys($params);
        $paramValue = array_values($params);
        $queries = 'SELECT * FROM ' . $table . $param[0] . $paramValue[0] . $param[1] . $paramValue[1] . $params[0];
      }
      else {
        $queries = 'SELECT * FROM ' . $table;
      }

    }
    else {
      $queries = $this->findRelation($table, $relations, $params);
    }

    $reqFind = $this->dbconnexion->connexion->prepare($queries);
    $reqFind->execute();
    $findAll = $reqFind->fetchAll(PDO::FETCH_OBJ);

    return $findAll;

  }//Retourn un objet

  public function findRelation($table, $relations, $params = array(' WHERE ' => ' 1 ', ' ORDER BY ' => ' id ASC ', ' LIMIT ')) {

    if ($params != false) {
      $param = array_keys($params);
      $paramValue = array_values($params);
      $queries = 'SELECT * FROM ' . $table . ' INNER JOIN ' . $relations[0] . ' ON ' . $relations[0] . "." . $relations[1] . " = ". $table . "." . $relations[1] . $param[0] . $paramValue[0] . $param[1] . $paramValue[1] . $params[0];
      return $queries;
    }
    else {
      $queries = 'SELECT * FROM ' . $table . ' INNER JOIN ' . $relations[0] . ' ON ' . $relations[1];
      return $queries;
    }

  }

  public function verification ($tableAssoc, $regexAssoc = false) {

      $error = [];

      if ($tableAssoc != false) {
        foreach ($tableAssoc as $key => $value ){
            if ($key != $value) {
              $error[$key] = false;
            }
        }
      }

      if ($regexAssoc != false) {
        foreach ($regexAssoc as $key => $value) {
           if (!preg_match_all($key, $value)){
              $error[$key] = false;
           }
        }
      }

      if (isset($error) && empty($error)) {
        return true;
      }
      else {
        return false;
      }

  }//retourne un booléen

}
