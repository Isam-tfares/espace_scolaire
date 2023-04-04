<?php
class Departement{
    static public function AllDepartement(){
        $stm=DB::connect()->prepare('SELECT * FROM departement');
        $stm->execute();
        $employes=$stm->fetchAll();
        return $employes;
    }
    static public function ajouter($data){
        $stm=DB::connect()->prepare('INSERT INTO departement (departement_name) values(:val)');
        $stm->bindParam(':val',$data);
       if($stm->execute()){
        return 'ok';
       }
       else{
        return 'error';
       }
    }
    static public function delete($data){
        $stm=DB::connect()->prepare('DELETE FROM departement WHERE departement_id=:val');
        $stm->bindParam(':val',$data);
       if($stm->execute()){
        return 'ok';
       }
       else{
        return 'error';
       }
    }

}