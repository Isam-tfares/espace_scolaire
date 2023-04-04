<?php
class DepartementController{
    static public function getAllDepartement(){
        return departement::AllDepartement();
    }
    static public function ajouterDepartement(){
        if(isset($_POST['ajouter'])){
        $res=Departement::ajouter($_POST['departement_name']);
        if($res==='ok'){
            Redirect::to('home');
        }
        }
    }
    static public function deleteDepartement(){
        if(isset($_POST['departement_id']) && isset($_POST['delete'])){
        $res=Departement::delete($_POST['departement_id']);
        if($res==='ok'){
            Redirect::to('home');
        }
        }
    }
    
}