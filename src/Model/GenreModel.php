<?php
class GenreModel extends Entity
{
  private static $relation = ['has many films' => 'film'];

  public function getGenres($idGenre = false)
  {

      if (!isset($this->paramsGet['f'])) {
        $allGenre = $this->orm->find('genre', false, false);
      }
      else {
        $allGenre = $this->orm->find('genre', false,
        [
          " WHERE " =>  " id_genre = " . $this->paramsGet['f'],
          "" => "",
          ""
        ]);
      }

      return $allGenre;

  }

  public function addGenres()
  {

    $field = $this->field($this->paramsPost);
    $regex = $this->regex();

    $verif = $this->orm->verification(
    '',
    [
      $regex['nom'] => $field['nom']
    ]);

    if ($verif == true) {
      $id = $this->orm->create('genre', $field, 'id_genre');
      return $id;
    }

     return $this->paramsGet['f'];

  }

  public function delGenres()
  {

      $id = $this->orm->delete('genre', 'id_genre', $this->paramsGet['f']);
      return $id;

  }

  public function modifGenre()
  {

    $field = $this->field($this->paramsPost);
    $regex = $this->regex();

    $verif = $this->orm->verification(
    '',
    [
      $regex['nom'] => $field['nom']
    ]);

    if ($verif == true) {
      $id = $this->updateGenre($this->paramsGet['f'], $field);
      return $id;
    }

  }

  public function updateGenre($idGenre, $fields)
  {

    $updateGenre = $this->dbconnexion->connexion->prepare('UPDATE  genre SET nom = :nom WHERE id_genre = :id');
    $updateGenre->bindParam(':id', $idGenre, PDO::PARAM_INT);
    $updateGenre->bindParam(':nom', $fields['nom'], PDO::PARAM_STR);
    $updateGenre->execute();
    return $this->paramsGet['f'];

  }

  public function field($fields)
  {

    $field =
    [
      "nom" => $fields['genre']
    ];

    return $field;

  }

}
