<?php
class TaskController
{

    static public function ajouterTask()
    {
        if (isset($_POST['module']) && isset($_POST['name']) && isset($_POST['ajouterTask'])) {
            $name =  $_POST['name'];
            $module =  $_POST['module'];

            if (ModuleController::isHereModule($_POST['module'])) {
                Task::ajouter($name, $module);
                Redirect::withPost('module', $_POST['module'], "Devoir ajouté avec succés");
            }
        }
        Redirect::withPost('module', $_POST['module'], "Il y'a u probleme Essayez de Renvoyer");
    }

    static public function isHisTask($id)
    {
        $task =  Task::getTask($id);
        return ModuleController::isHereModule($task['module_id']);
    }

    static public function deleteTask()
    {

        if (isset($_POST['task_id']) && isset($_POST['supprimer']) && TaskController::isHisTask($_POST['task_id'])) {

            $res = Task::supprimer($_POST['task_id']);
            if ($res == 'ok') {
                Redirect::withPost('module', $_POST['module'], 'Devoir a été supprimer avec succés');
            }
            Redirect::withPost('module', $_POST['module'], 'Il y a une problème Ressayer');
        }
        Redirect::withPost('module', $_POST['module'], 'Il y a une problème Ressayer');
    }
}
