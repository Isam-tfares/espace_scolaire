<?php
class Module
{
  static public function allModules($data)
  {
    $stm = DB::connect()->prepare('SELECT * FROM modules WHERE class_id=:id');
    $stm->bindParam(':id', $data);
    $stm->execute();
    $modules = $stm->fetchAll();
    return $modules;
  }
  static public function ajouter($data)
  {
    $stm = DB::connect()->prepare('INSERT INTO modules (module_name,class_id,prof_id) values(:val,:depart,:prof)');
    $stm->bindParam(':val', $data['module_name']);
    $stm->bindParam(':depart', $data['class_id']);
    $stm->bindParam(':prof', $data['prof_id']);
    if ($stm->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  static public function delete($data)
  {
    $stm = DB::connect()->prepare('DELETE FROM modules WHERE module_id=:val');
    $stm->bindParam(':val', $data);
    if ($stm->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  static public function getModuleProf($data)
  {
    $stm = DB::connect()->prepare("SELECT modules.*,classes.class_name FROM modules,classes WHERE modules.class_id = classes.class_id and modules.prof_id=:id");
    $stm->bindParam(':id', $data);
    $stm->execute();
    $modules = $stm->fetchAll();
    return $modules;
  }
  static public function getModuleEtudiant($data)
  {
    $stm = DB::connect()->prepare("SELECT * FROM modules WHERE class_id=:id");
    $stm->bindParam(':id', $data);
    $stm->execute();
    $modules = $stm->fetchAll();
    return $modules;
  }
  static public function getModuleOfNote($data)
  {
    $stm = DB::connect()->prepare("SELECT * FROM modules WHERE module_id=:id");
    $stm->bindParam(':id', $data);
    $stm->execute();
    $res = $stm->fetch();
    return $res;
  }
}
