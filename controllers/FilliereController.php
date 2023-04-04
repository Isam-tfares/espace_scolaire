<?php
class FilliereController{
    static public function getAllFillere(){
        if(isset($_POST['departement_id']) && isset($_POST['submit'])){
        $data=$_POST['departement_id'];
        $_SESSION['departement_id']=$data;
        return  Filliere::AllFilliere($_SESSION['departement_id']);
        }
        else if(isset($_SESSION['departement_id'])){
           return Filliere::AllFilliere($_SESSION['departement_id']);
        }
        else{
            Redirect::to('home');
        }
    }
    static public function ajouterFilliere(){
        if(isset($_POST['ajouter'])){
            $data=array(
                'filliere_name'=>$_POST['filliere_name'],
                'departement_id'=>$_POST['departement_id']
            );
            $res=Filliere::ajouter($data);
        if($res==='ok'){
            Redirect::to('filliere');
        }
    }
    }
    static public function deletefilliere(){
        if(isset($_POST['filliere_id']) && isset($_POST['suprimer'])){
        $res=Filliere::delete($_POST['filliere_id']);
        if($res==='ok'){
            Redirect::to('filliere');
        }
        }
    }
}