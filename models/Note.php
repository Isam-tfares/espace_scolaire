<?php

class Note
{
     static public function getAllNote($data)
     {
          $stm = DB::connect()->prepare("SELECT * FROM notes WHERE student_id=:id");
          $stm->bindParam(':id', $data);
          $stm->execute();
          $notes = $stm->fetchAll();
          return $notes;
     }
     static public function getSeuil($class)
     {
          $stm = DB::connect()->prepare("SELECT * FROM classes WHERE class_id=:id");
          $stm->bindParam(':id', $class);
          $stm->execute();
          $seuil = $stm->fetch();
          return $seuil;
     }
     static public function ajouter($note, $student_id, $module_id)
     {
          $stm = DB::connect()->prepare("SELECT * FROM notes WHERE module_id='$module_id' and student_id='$student_id'");

          $stm->execute();
          if ($stm->rowcount()) {
               $stm = DB::connect()->prepare("UPDATE notes SET note_value='$note' WHERE module_id='$module_id' and student_id='$student_id'");

               if ($stm->execute()) {
                    return 'ok';
               } else {
                    return 'error';
               }
          } else {
               $stm = DB::connect()->prepare("INSERT INTO notes (note_value,module_id,student_id) VALUES('$note','$module_id','$student_id')");

               if ($stm->execute()) {
                    return 'ok';
               } else {
                    return 'error';
               }
          }
     }
     static public function getNoteOfStudent($data)
     {
          $stm = DB::connect()->prepare('SELECT * FROM notes WHERE student_id=:id and module_id=:id3');
          $stm->bindParam(':id', $data['student_id']);
          $stm->bindParam(':id3', $data['module_id']);
          $stm->execute();
          $res = $stm->fetch();
          return $res;
     }
     static public function suprimer($student_id, $module_id)
     {
          $stm = DB::connect()->prepare("DELETE FROM notes WHERE student_id='$student_id'  and module_id='$module_id'");
          if ($stm->execute()) {
               return 'ok';
          } else {
               return 'error';
          }
     }
     static public function getNotesOfModule($module)
     {
          $database = Db::connect();
          $statement = $database->prepare("SELECT u.user_id AS student_id, u.username AS student_name, n.note_value FROM users u INNER JOIN notes n ON u.user_id = n.student_id INNER JOIN modules m ON m.module_id = n.module_id WHERE m.module_id = '$module';");
          $statement->execute();
          return $statement->fetchAll();
     }
}
