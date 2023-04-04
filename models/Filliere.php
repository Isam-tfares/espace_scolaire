<?php
class Filliere{
    static public function AllFilliere($data){
        $stm=DB::connect()->prepare('SELECT * FROM filliere WHERE departement_id=:id');
        $stm->bindParam(':id',$data);
        $stm->execute();
        $fillieres=$stm->fetchAll();
        return $fillieres;
    }
    static public function ajouter($data){
        $stm=DB::connect()->prepare('INSERT INTO filliere (filliere_name,departement_id) values(:val,:depart)');
        $stm->bindParam(':val',$data['filliere_name']);
        $stm->bindParam(':depart',$data['departement_id']);
       if($stm->execute()){
        return 'ok';
       }
       else{
        return 'error';
       }
    }
    static public function delete($data){
        $stm=DB::connect()->prepare('DELETE FROM filliere WHERE filliere_id=:val');
        $stm->bindParam(':val',$data);
       if($stm->execute()){
        return 'ok';
       }
       else{
        return 'error';
       }
}
}