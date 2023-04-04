<?php
class Etudiant
{
  static public function getUser($id)
  {
    $stm = DB::connect()->prepare("SELECT * FROM users WHERE user_id = '$id'");
    $stm->execute();
    return $stm->fetch();
  }
  static public function AllEtudiant($data)
  {
    $stm = DB::connect()->prepare('SELECT * FROM users WHERE class=:id and statut=3');
    $stm->bindParam(':id', $data);
    $stm->execute();
    $etudiants = $stm->fetchAll();
    return $etudiants;
  }
  static public function getEtudiantsOfClasse($class_id)
  {
    $stm = DB::connect()->prepare("SELECT * FROM users WHERE class = '$class_id' and statut='3'");
    $stm->execute();
    $etudiants = $stm->fetchAll();
    return $etudiants;
  }
  static public function getEtudiantsOfClasses($listOfclass)
  {
    $stm = DB::connect()->prepare("SELECT * FROM users WHERE class in $listOfclass and statut='3'");
    $stm->execute();
    $etudiants = $stm->fetchAll();
    return $etudiants;
  }

  static public function AllProf($data)
  {
    $stm = DB::connect()->prepare('SELECT * FROM users WHERE departement=:id and statut=2');
    $stm->bindParam(':id', $data);
    $stm->execute();
    $etudiants = $stm->fetchAll();
    return $etudiants;
  }
  static public function getProfsOfClass($id)
  {
    $stm = DB::connect()->prepare('SELECT users.*,modules.prof_id FROM modules,users WHERE modules.class_id=:id and users.user_id=users.user_id');
    $stm->bindParam(':id', $id);
    $stm->execute();
    $profs = $stm->fetchAll();
    return $profs;
  }
  static public function ajouter($data)
  {
    $stm = DB::connect()->prepare('INSERT INTO users (fullname,class) values (:val,:depart)');
    $stm->bindParam(':val', $data['fullname']);
    $stm->bindParam(':depart', $data['class_id']);
    if ($stm->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  static public function ajouterprof($data)
  {
    print_r($data);
    $stm = DB::connect()->prepare('INSERT INTO users (fullname,departement,statut) values (:val,:depart,2)');
    $stm->bindParam(':val', $data['fullname']);
    $stm->bindParam(':depart', $data['departement_id']);
    if ($stm->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  static public function delete($data)
  {
    $stm1 = DB::connect()->prepare('SELECT statut FROM users where user_id=:val1');
    $stm1->bindParam(':val1', $data);
    $stm1->execute();
    $res = $stm1->fetch()['statut'];
    $stm = DB::connect()->prepare('DELETE FROM users WHERE user_id=:val');
    $stm->bindParam(':val', $data);
    if ($stm->execute()) {
      return 'res';
    } else {
      return 'error';
    }
  }

  static public function userConn($data)
  {
    $stm = DB::connect()->prepare('SELECT * FROM users WHERE username=:username and password_user=:psd');
    $stm->bindParam(':username', $data['username']);
    $stm->bindParam(':psd', $data['user_password']);
    $stm->execute();
    if ($stm->rowCount()) {
      $res = $stm->fetch();
      return $res;
    } else {
      return 4;
    }
  }
  static public function getIdClass($data)
  {
    $stm = DB::connect()->prepare("SELECT class FROM users WHERE user_id=:id");
    $stm->bindParam(':id', $data);
    $stm->execute();
    return $stm->fetch();
  }

  static public function getProfOfModule($data)
  {
    $stm = DB::connect()->prepare("SELECT * FROM users WHERE user_id=:id");
    $stm->bindParam(':id', $data);
    $stm->execute();
    return $stm->fetch();
  }
  static public function isExistedUsername($username)
  {
    $database = DB::connect();
    $statement = $database->prepare("SELECT * FROM users where username = '$username' and user_id !='" . $_SESSION['user_info']['user_id'] . "'");
    $statement->execute();
    return $statement->rowCount() > 0;
  }
  static public function UpdateProfile($username, $fullname, $email, $password, $files)
  {
    // if username exist already  we can not updated
    if (Etudiant::isExistedUsername($username)) {
      return 'Username exist already please change it ';
    }

    // if image will be updated 
    if (!empty($files["img"]["name"])) {
      $target_dirP = "assets/imgsProfile/";
      $nameImage = basename(rand(0, 100000000000) . "_" . str_replace('\'', '_', $files["img"]["name"]));
      $target_image = $target_dirP . $nameImage;
      $uOk = 1;

      $database = DB::connect();
      $statement = $database->prepare("UPDATE `users` SET `username`='" . $username . "',`fullname`='" . $fullname . "',`email`='" . $email . "',`password_user`='" . $password . "',`img`='" . $nameImage . "' WHERE user_id=" . $_SESSION["user_info"]["user_id"]);
      $statement->execute();


      //#################################"   Upload file  ###############################"
      if (move_uploaded_file($files["img"]["tmp_name"], $target_image) && $statement->rowCount() > 0) {
        $_SESSION["img"] = $nameImage;
        $_SESSION['user_info'] = Etudiant::getDatas();
        return 'Updated with succes';
      } else {
        return 'A probleme was happen';
      }
    }
    // else 
    else {

      $database = DB::connect();
      $statement = $database->prepare("UPDATE `users` SET `username`='" . $username . "',`fullname`='" . $fullname . "',`email`='" . $email . "',`password_user`='" . $password . "' WHERE user_id='" . $_SESSION["user_info"]["user_id"] . "'");
      $statement->execute();
      if ($statement->rowCount() > 0) {

        $_SESSION['user_info'] = Etudiant::getDatas();
        return 'Updated with succes';
      }

      return 'A probleme was happen';
    }
  }
  static public function modifierInfoUser($data)
  {
    if (empty($data['img'])) {
      $stm = DB::connect()->prepare('UPDATE users SET username=:username,fullname=:fullname,email=:email,password_user=:psd 
    WHERE user_id=:id
    ');
    } else {
      $stm = DB::connect()->prepare('UPDATE users SET img=:img,username=:username,fullname=:fullname,email=:email,password_user=:psd 
      WHERE user_id=:id
      ');
      $stm->bindParam(':img', $data['img']);
    }
    $stm->bindParam(':username', $data['username']);
    $stm->bindParam(':fullname', $data['fullname']);
    $stm->bindParam(':email', $data['email']);
    $stm->bindParam(':psd', $data['password_user']);
    $stm->bindParam(':id', $$_SESSION['user_info']['user_id']);
    if ($stm->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  public static function isStudent($id)
  {
    $stm = DB::connect()->prepare("SELECT * FROM users WHERE user_id=:id and statut =3");
    $stm->bindParam(':id', $id);
    $stm->execute();
    return $stm->rowCount() > 0;
  }
  public static function getDatasOfProfile($id, $statut)
  {
    if ($statut == '3') {
      $stm = DB::connect()->prepare("SELECT users.*,filliere.filliere_name,classes.class_name FROM users,filliere,classes WHERE users.filliere=filliere.filliere_id and users.class=classes.class_id and users.user_id=:id");
    } else {
      $stm = DB::connect()->prepare("SELECT users.*,departement.departement_name FROM users,departement WHERE users.departement=departement.departement_id and users.user_id=:id");
    }
    $stm->bindParam(':id', $id);
    $stm->execute();
    return $stm->fetch();
  }
  static public function getDatas()
  {
    $stm = DB::connect()->prepare("SELECT * FROM users WHERE user_id=:id");
    $stm->bindParam(':id', $_SESSION['user_info']['user_id']);
    $stm->execute();
    return $stm->fetch();
  }
}
