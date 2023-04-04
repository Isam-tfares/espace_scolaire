<?php
class NoteController
{
    static public function getAllNotes()
    {
        if (isset($_SESSION['etudiant_id'])) {
            $modules = Module::getModuleEtudiant($_SESSION['user_info']['class']);
            $notes = Note::getAllNote($_SESSION['etudiant_id']);
            $seuil = Note::getSeuil($_SESSION['user_info']['class'])['seuil'];
            $Notes = [];
            $moyenne = 0;
            $isValid = true;
            foreach ($modules as $module) {
                $note = Note::getNoteOfStudent(["student_id" => $_SESSION['etudiant_id'], "module_id" => $module["module_id"]]);
                $data = [
                    'note_value' => $note ? $note['note_value'] : null,
                    'module_name' => $module['module_name'],
                ];
                if ($note == null) {
                    $isValid = false;
                } else {
                    $moyenne += $note['note_value'];
                }
                $Notes[] = $data;
            }
            if ($isValid) {
                return [$Notes, $seuil, $moyenne / count($Notes)];
            }
            return [$Notes, $seuil, null];
        } else
            Redirect::to('home');
    }
    static public function getNotesOfClass($module_id)
    {
        if (ModuleController::isHereModule($module_id)) {
            $module = ModuleController::getModule($module_id);
            $students = EtudiantController::getStudentsOfClass($module['class_id']);
            return $students;
        } else {
            Redirect::to('note');
        }
    }
    static public function enregistrerNote()
    {
        if (isset($_POST['ajouter']) && isset($_POST['student_id']) && isset($_POST['note']) && isset($_POST['module']) && isset($_SESSION['prof_id'])) {
            $note = $_POST['note'];
            $student_id = $_POST['student_id'];
            $module_id = $_POST['module'];
            $module = Module::getModuleOfNote($module_id);
            if (ModuleController::isHereModule($module_id) && Etudiant::getUser($student_id)['class'] == $module['class_id'] && $note >= '0' && $note <= '20') {
                $res = Note::ajouter($note, $student_id, $module_id);
            }
            Redirect::withPost('noteModule', $module_id);
        }
    }
    static public function suprimerNote()
    {
        if (isset($_POST['suprimer']) && isset($_POST['student_id'])  && isset($_POST['module']) && isset($_SESSION['prof_id'])) {

            $student_id = $_POST['student_id'];
            $module_id = $_POST['module'];
            $module = Module::getModuleOfNote($module_id);
            if (ModuleController::isHereModule($module_id) && Etudiant::getUser($student_id)['class'] == $module['class_id']) {
                $res = Note::suprimer($student_id, $module_id);
            }
            Redirect::withPost('noteModule', $module_id);
        }
    }
}
