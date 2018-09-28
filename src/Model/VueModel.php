<?php
class VueModel extends Entity
{
  private static $relations = ["has one film" => "film", "has many users" => "fiche_personne"];

  public function setVue() {

    $field = $this->field();
    $this->orm->create('film_vues', $field);
    $id = $this->updateVue();

  }

  public function field() {

    $fields1 =
    [
      'id_perso'  => $_SESSION['id'],
      'id_film'  => $this->paramsGet['f'],
    ];

    return $fields1;

  }

  public function updateVue() {

    $updateGenre = $this->dbconnexion->connexion->prepare('UPDATE  film SET vues = vues+1 WHERE id_film = :id_film');
    $updateGenre->bindParam(':id_film', $this->paramsGet['f'], PDO::PARAM_INT);
    $updateGenre->execute();
    return $this->paramsGet['f'];

  }

}
