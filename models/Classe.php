<?php
class Classe{
    static public function Allclass($data){
      $stm=DB::connect()->prepare('SELECT * FROM classes WHERE filliere_id=:id');
      $stm->bindParam(':id',$data);
      $stm->execute();
      $employes=$stm->fetchAll();
      return $employes;
    }
    static public function ajouter($data){
      $stm=DB::connect()->prepare('INSERT INTO classes (class_name,filliere_id) values(:val,:depart)');
      $stm->bindParam(':val',$data['class_name']);
      $stm->bindParam(':depart',$data['filliere_id']);
     if($stm->execute()){
      return 'ok';
     }
     else{
      return 'error';
     }
  }
  static public function delete($data){
      $stm=DB::connect()->prepare('DELETE FROM classes WHERE class_id=:val');
      $stm->bindParam(':val',$data);
     if($stm->execute()){
      return 'ok';
     }
     else{
      return 'error';
     }
}
}
?>