<?php
class UserModel extends Entity
{
  private static $relations = ["has many historique" => "historique_membre", "has many vue" => "film_vues"];

  // USER REGISTER //
  public function fieldRegister1()
  {

    $fields1 =
    [
      'prenom'  => $this->paramsPost['Prenom'],
      'nom'  => $this->paramsPost['Nom'],
      'date_naissance'  => $this->paramsPost['annee'] . "-" . $this->paramsPost['mois'] . "-" . $this->paramsPost['jour'],
      'email'  => $this->paramsPost['email'],
      'adresse'  => $this->paramsPost['No_rue'] . $this->paramsPost['Card_rue'] . $this->paramsPost['Nom_rue'],
      'ville'  => $this->paramsPost['Ville'],
      'cpostal'  => $this->paramsPost['CP']
    ];

    return $fields1;

  }

  public function fieldRegister2($id)
  {

    $fields2 =
    [
        "id_fiche_perso" => $id,
        "id_abo" => $this->paramsPost['abo'],
        "date_abo" => date('Y-m-d'),
        "mdp" => $this->paramsPost['password'],
        "Q_secret" => $this->paramsPost['q_secret'],
        "R_secret" => $this->paramsPost['Reponse_secret']
    ];

    return $fields2;
  }

  public function save()
  {

    $regex = $this->regex();
    $fields1 = $this->fieldRegister1();
    $verif1 = $this->orm->verification(
    [
      $fields1['email'] => $this->paramsPost['ConfEmail']
    ],
    [
      $regex['nom'] => $fields1['nom'],
      $regex['nom'] => $fields1['prenom'],
      $regex['email'] => $fields1['email'],
      $regex['no_rue'] => $this->paramsPost['No_rue'],
      $regex['ville'] => $this->paramsPost['Nom_rue'],
      $regex['ville'] => $fields1['ville'],
      $regex['date'] => $fields1['date_naissance'],
      $regex['cpostal'] => $fields1['cpostal']
    ]);

    $verif2 = $this->orm->verification(
    [
      $this->paramsPost['password'] => $this->paramsPost['ConfMdp']
    ]);

    $exist = $this->exist($fields1);

    if ($verif1 != false && $verif2 != false && count($exist) < 1){
      $id = $this->orm->create("fiche_personne", $fields1, "id_perso");
      $this->id = $id;
      $fields2 = $this->fieldRegister2($id);
      $this->orm->create("membre", $fields2);
    }

  }
  // END USER REGISTER //


  //  USER UPDATE //
  public function fieldUpdate($id, $userInfo, $userInfo2)
  {

    $fields1 =
    [
      "id" => $id,
      'prenom'  => $this->paramsPost['prenom'],
      'nom' => $this->paramsPost['nom'],
      'date_naissance'  => date('Y-m-d', strtotime($userInfo[0]->date_naissance)),
      'email' => $this->paramsPost['email'],
      'adresse'  => $this->paramsPost['adresse'],
      'ville'  => $this->paramsPost['ville'],
      'cpostal'  => $this->paramsPost['CP'],
      "password" => $userInfo2[0]->mdp
    ];

    return $fields1;

  }

  public function saveUpdate($userInfo, $userInfo2)
  {

    $regex = $this->regex();
    $fields = $this->fieldUpdate($_SESSION['id'], $userInfo, $userInfo2);
    $verif = $this->orm->verification(
    [
      $userInfo2[0]->mdp => $this->paramsPost['ConfMdp']
    ],
    [
      $regex['nom'] => $fields['nom'],
      $regex['nom'] => $fields['prenom'],
      $regex['email'] => $fields['email'],
      $regex['ville'] => $this->paramsPost['adresse'],
      $regex['ville'] => $fields['ville'],
      $regex['date'] => date('Y-m-d', strtotime($userInfo[0]->date_naissance)),
      $regex['cpostal'] => $fields['cpostal']
    ]);

    $exist = $this->exist($fields);

    if ($verif != false && (count($exist) < 1 || $fields['email'] == $userInfo[0]->email)){
      $this->update($fields);
      $this->confirmation = 'confimation';
    }

  }

  public function exist ($fields)
  {

    $reqUser = $this->dbconnexion->connexion->prepare('SELECT * FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso WHERE email = :email');
    $reqUser->bindParam(':email', $fields['email'], PDO::PARAM_STR);
    $reqUser->execute();
    $getUser = $reqUser->fetchAll(PDO::FETCH_OBJ);
    return $getUser;

  }

  // END USER UPDATE  //

  // READ USER //
  public function read()
  {

    $reqUser = $this->dbconnexion->connexion->prepare('SELECT * FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso WHERE id_perso = :session_id');
    $reqUser->bindParam(':session_id', $_SESSION['id'], PDO::PARAM_INT);
    $reqUser->execute();
    $getUser = $reqUser->fetchAll(PDO::FETCH_OBJ);

  }
  // END READ USER//


  // UPDATE USER //
  public function update($fields)
  {

    $updateUser = $this->dbconnexion->connexion->prepare('UPDATE  fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso SET nom = :nom , prenom = :prenom, date_naissance = :date_naissance, email = :email, adresse = :adresse, cpostal = :cpostal, ville = :ville, mdp = :mdp WHERE id_fiche_perso = :id');
    $updateUser->bindParam(':id', $fields['id'], PDO::PARAM_STR);
    $updateUser->bindParam(':nom', $fields['nom'], PDO::PARAM_STR);
    $updateUser->bindParam(':prenom', $fields['prenom'], PDO::PARAM_STR);
    $updateUser->bindParam(':date_naissance', $fields['date_naissance'], PDO::PARAM_STR);
    $updateUser->bindParam(':email', $fields['email'], PDO::PARAM_STR);
    $updateUser->bindParam(':cpostal', $fields['cpostal'], PDO::PARAM_INT);
    $updateUser->bindParam(':adresse', $fields['adresse'], PDO::PARAM_INT);
    $updateUser->bindParam(':ville', $fields['ville'], PDO::PARAM_STR);
    $updateUser->bindParam(':mdp', $fields['password'], PDO::PARAM_STR);
    $updateUser->execute();

  }
  // END UPDATE USER //


  // DELETE USER //
  public function delete()
  {

    $deleteUser = $this->dbconnexion->connexion->prepare('DELETE FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso WHERE id_perso = :id_perso');
    $deleteUser->bindParam(':id_perso', $_SESSION['id'], PDO::PARAM_STR);
    $deleteUser->execute();

  }
  // END DELETE USER //

  // READ ALL USER TABLE //
  public function read_all()
  {

    $allUser = $this->dbconnexion->connexion->prepare('SELECT * FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso WHERE id_perso = :id_perso');
    $allUser->execute();
    $getAllUser = $allUser->fetchAll(PDO::FETCH_OBJ);

  }
  // END READ ALL USER TABLE //


  // LOGIN USER  //
  public function login()
  {

    $reqUser = $this->dbconnexion->connexion->prepare('SELECT * FROM fiche_personne INNER JOIN membre ON fiche_personne.id_perso = membre.id_fiche_perso WHERE email = :email AND mdp = :password');
    $reqUser->bindParam(':email', $this->paramsPost['email'], PDO::PARAM_STR);
    $reqUser->bindParam(':password', $this->paramsPost['password'], PDO::PARAM_STR);
    $reqUser->execute();
    $getUser = $reqUser->fetchAll(PDO::FETCH_OBJ);
    $this->createSession($getUser);

  }

  public function createSession($getUser)
  {

    if (count($getUser) == 1) {
        $_SESSION['id'] = $getUser[0]->id_perso;
    }

  }
  // END LOGIN USER //


  // GET USER //
  public function getUser()
  {

    if (isset($_SESSION['id'])) {
      $user = $this->orm->readUser1("fiche_personne", $_SESSION['id']);
      return $user;
    }

  }

  public function getUserSecret()
  {

    if (isset($_SESSION['id'])) {
      $user = $this->orm->readUser2("membre", $_SESSION['id']);
      return $user;
    }

  }
  //END GET USER//


  // DELETE USER //
  public function delUser()
  {

    if (isset($_SESSION['id'])) {
      $user = $this->orm->delete("fiche_personne", "id_perso", $_SESSION['id']);
      $user = $this->orm->delete("membre", "id_fiche_perso", $_SESSION['id']);
      return $user;
    }

  }
  //END GET USER//

}
