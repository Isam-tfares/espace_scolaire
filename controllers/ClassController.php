<?php
class ClassController{

    static public function getAllClasses(){
    if(isset($_POST['filliere_id'])){
    $data=$_POST['filliere_id'];
    $_SESSION['filliere_id']=$data;
    return Classe::Allclass($_SESSION['filliere_id']);
    }
    else if(isset($_SESSION['filliere_id'])){
      return Classe::Allclass($_SESSION['filliere_id']);
    }
    else{
       Redirect::to('home');
    }
  }

static public function ajouterClass(){

  if(isset($_POST['ajouter'])){
      $data=array(
          'class_name'=>$_POST['class_name'],
          'filliere_id'=>$_POST['filliere_id']
      );
      $res=Classe::ajouter($data);
  if($res==='ok'){
      Redirect::to('class');
  }
  }
}

static public function deleteClass(){
  if(isset($_POST['class_id']) && isset($_POST['suprimer'])){
  $res=Classe::delete($_POST['class_id']);
  if($res==='ok'){
      Redirect::to('class');
  }
  }
}

}
?>