<?php
class FilmModel extends Entity
{
  private static $relations = ['has one genre' => 'genre', 'has one note' => 'note_film', 'has one id' => 'id_film'];


  //RECHERCHE FILM //
  public function getSearchFilm()
  {
    $allFilms = $this->orm->find('film', false,
    [
      " WHERE " => 'titre LIKE "%'. $_GET["q"] . '%"',
      "" => "",
      ""
    ]);
    return $allFilms;
  }
  //END RECHERCHE FILM //

  // PROFIL //
  public function getFilmAction()
  {
    $allFilms = $this->orm->find('film', false, false);
    return count($allFilms);
  }

  public function getDetailFilm($getId)
  {
    $getFilms = $this->orm->find('film', [self::$relations['has one genre'], 'id_genre'],
    [
      " WHERE " => " id_film = " . $getId,
      "" => "",
      ""
    ]);
    return $getFilms;
  }

  public function getNoteFilm($getId)
  {
    $getNote = $this->orm->find('note_film', false,
    [
      " WHERE " => " id_film = " . $getId,
      "" => "",
      ""
    ]);
    return $getNote;
  }

  public function filmViewUser($membreId)
  {
    $vueFilms = $this->orm->find('film', [self::$relations['has one genre'], 'id_genre'],
    [
      " INNER JOIN historique_membre ON " => " historique_membre.id_film = film.id_film ",
      " WHERE " => " id_membre = " . $membreId,
      ""
    ]);
    return $vueFilms;
  }

  public function filmAddUser()
  {
    $addedFilms = $this->orm->find('film',[self::$relations['has one genre'], 'id_genre'],
    [
      " WHERE " => " id_perso = " . $_SESSION['id'],
      "" => "",
      ""
    ]);
    return $addedFilms;
  }
  // END PROFIL //

  //SLIDER INDEX//
  public function getLastFilms()
  {
    $allFilms = $this->orm->find('film', false,
    [
      " ORDER BY id_film " => " DESC",
      " LIMIT " => " 5 ",
      ""
    ]);
    return $allFilms;
  }
  //END SLIDER INDEX//


  //CAROUSSEL INDEX//
  public function getCarrouselFilms()
  {
    $allFilms = $this->orm->find('film', false,
    [
      " ORDER BY vues " => " DESC",
      " LIMIT " => " 5 ",
      ""
    ]);
    return $allFilms;
  }
  //END CAROUSSEL//

  // AJOUT DE FILM //
  public function filmField()
  {
    $fields = [
      'titre' => $this->paramsPost['titre'],
      'duree_min' => $this->paramsPost['duree'],
      'annee_prod' => $this->paramsPost['annee_prod'],
      'id_genre' => $this->paramsPost['genre'],
      'resum' => $this->paramsPost['resume'],
      'id_perso' =>  $_SESSION['id']
    ];
    return $fields;
  }

  public function filmImages()
  {
    if (isset($_FILES['img_min'])  && isset($_FILES['img_moy']) && isset($_FILES['img_gra'])) {
        $fields =
        [
          'img_min' => $_FILES['img_min'],
          'img_moy' => $_FILES['img_moy'],
          'img_gra' => $_FILES['img_gra']
        ];
        return $fields;
    }
  }

  public function addFilm()
  {

    $fields = $this->filmField();
    $fieldsImage = $this->filmImages();
    $regex = $this->regex();
    $verif = $this->orm->verification(
      false,
      [
        $regex['ville'] => $fields['titre'],
        $regex['id'] => $fields['duree_min'],
        $regex['année'] => $fields['annee_prod'],
        $regex['id'] => $fields['id_genre'],
      ]
    );

    if ($verif == true) {
      $id = $this->orm->create('film', $fields, 'id_film');
      $noteFields =
      [
        "id_film" => $id,
        "note" => $this->paramsPost['note']
      ];
      $this->orm->create(self::$relations['has one note'], $noteFields);
      $this->addImageMin($id);
      $this->addImageMoy($id);
      $this->addImageGran($id);
      return $id;
    }

  }


  // function enregistrement d'image minifier
  public function addImageMin($id)
  {

    if (isset($_FILES['image_min']) && !empty($_FILES['image_min']['name'])) {
      $tailleMax = 5000000;
      $extensionValide = array('jpg', 'jpeg', 'png', 'bmp');
      if ($_FILES['image_min']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['image_min']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValide)) {
          if (isset($id)) {
            @mkdir(getcwd() . "/webroot/assets/affich");
            if (is_dir(getcwd() . '/webroot/assets/affich')) {
              $chemin = getcwd() . "/webroot/assets/affich/" . $id . ".png";
              $resultat = move_uploaded_file($_FILES['image_min']['tmp_name'], $chemin);
              $imgSize = getimagesize($chemin);
              if ($imgSize[0]>300 || $imgSize[0]<50 || $imgSize[1]>300 || $imgSize[0]<50) {
                unlink($chemin);
              }
            }
          }
        }
      }
    }

  }

  //function d'enregistrement d'image de taille moyenne
  public function addImageMoy($id)
  {

    if (isset($_FILES['image_moy']) && !empty($_FILES['image_moy']['name'])) {
      $tailleMax = 5000000;
      $extensionValide = array('jpg', 'jpeg', 'png', 'bmp');
      if ($_FILES['image_moy']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['image_moy']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValide)) {
          if (isset($id)) {
            @mkdir(getcwd() . "/webroot/assets/affich/moy");
            if (is_dir(getcwd() . "/webroot/assets/affich/moy/")) {
              $chemin = getcwd() . "/webroot/assets/affich/moy/" . $id . ".png";
              $resultat = move_uploaded_file($_FILES['image_moy']['tmp_name'], $chemin);
              $imgSize = getimagesize($chemin);
              if ($imgSize[0]<300 || $imgSize[0]>1000 || $imgSize[1]<300 || $imgSize[1]>1000) {
                unlink($chemin);
              }
            }
          }
        }
      }
    }

  }

  //function de verification enregistrement d'image grande taille
  public function addImageGran($id)
  {

    if (isset($_FILES['image_gran']) && !empty($_FILES['image_gran']['name'])) {
      $tailleMax = 5000000;
      $extensionValide = array('jpg', 'jpeg', 'png', 'bmp');
      if ($_FILES['image_gran']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['image_gran']['name'], '.'), 1));
        if (in_array($extensionUpload, $extensionValide)) {
          if (isset($id)) {
            @mkdir(getcwd() . "/webroot/assets/affich/gran");
            if (is_dir(getcwd() . "/webroot/assets/affich/gran")) {
              $chemin = getcwd() . "/webroot/assets/affich/gran/" . $id . ".png";
              $resultat = move_uploaded_file($_FILES['image_gran']['tmp_name'], $chemin);
              $imgSize = getimagesize($chemin);
              if ($imgSize[0]<1800 || $imgSize[1]<900) {
                unlink($chemin);
              }
            }
          }
        }
      }
    }

  }

  //END AJOUT DE FILM //

  // UPDATE FILM //

  public function saveFilm()
  {

    $fields = $this->filmField();
    $fieldsImage = $this->filmImages();
    $regex = $this->regex();
    $verif = $this->orm->verification(
      false,
      [
        $regex['ville'] => $fields['titre'],
        $regex['id'] => $fields['duree_min'],
        $regex['année'] => $fields['annee_prod'],
        $regex['id'] => $fields['id_genre'],
      ]
    );

    if ($verif == true) {
      $id = $this->filmUpdate($fields);
      if (isset($_FILES['image_min']) && !empty($_FILES['image_min']['name'])) {
        $this->addImageMin($id);
      }
      if (isset($_FILES['image_moy']) && !empty($_FILES['image_moy']['name'])) {
        $this->addImageMoy($id);
      }
      if (isset($_FILES['image_gran']) && !empty($_FILES['image_gran']['name'])) {
        $this->addImageGran($id);
      }
      return $id;
    }

  }
  public function delFilm() {

    $this->orm->delete('film', 'id_film', $this->paramsPost['f']);
    header('Location: /PiePHP/user/added-film');

  }
  // UPDATE FILM //
  public function filmUpdate($fields) {

    $updateUser = $this->dbconnexion->connexion->prepare('UPDATE  film INNER JOIN note_film ON film.id_film = note_film.id_film SET note = :note , id_genre = :id_genre, titre = :titre, resum = :resume, duree_min = :duree_min, annee_prod = :annee_prod WHERE film.id_film = :id_film');
    $updateUser->bindParam(':titre', $fields['titre'], PDO::PARAM_STR);
    $updateUser->bindParam(':duree_min', $fields['duree_min'], PDO::PARAM_INT);
    $updateUser->bindParam(':annee_prod', $fields['annee_prod'], PDO::PARAM_INT);
    $updateUser->bindParam(':id_genre', $fields['id_genre'], PDO::PARAM_INT);
    $updateUser->bindParam(':resume', $fields['resum'], PDO::PARAM_STR);
    $updateUser->bindParam(':note', $this->paramsPost['note'], PDO::PARAM_INT);
    $updateUser->bindParam(':id_film', $this->paramsGet['f'], PDO::PARAM_INT);
    $updateUser->execute();
    return $this->paramsGet['f'];

  }
  // END UPDATE USER //

}
