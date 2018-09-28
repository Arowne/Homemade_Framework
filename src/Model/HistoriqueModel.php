<?php
class HistoriqueModel extends Entity
{
  private static $relations = ["has one film" => "film"];

  public function addHistory($idMembre) {

    $field = $this->field($idMembre);
    $this->orm->create('historique_membre', $field);

  }

  public function delHistorique($idMembre) {

      $id = $this->deleteHistorique('historique_membre', $idMembre, $this->paramsGet['f']);
      return $id;

  }


  public function field($idMembre) {

    $fields1 =
    [
      'id_membre'  => $idMembre,
      'id_film'  => $this->paramsGet['f'],
      'date'  => date('Y-m-d H:i:s')
    ];
    return $fields1;

  }

  public function deleteHistorique ($table, $idMembre, $idFilm) {

    $queries = 'DELETE FROM ' . $table . ' WHERE id_membre = :id_membre AND id_film = :id_film';
    $reqUser = $this->dbconnexion->connexion->prepare($queries);
    $reqUser->bindParam(":id_membre", $idMembre, PDO::PARAM_INT);
    $reqUser->bindParam(":id_film", $idFilm, PDO::PARAM_INT);
    $reqUser->execute();
    return $id;

  } // retourne un booléen


}
