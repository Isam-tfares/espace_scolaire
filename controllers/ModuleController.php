<?php
class ModuleController
{
    static public function getModuleById($id)
    {
        if (ModuleController::isHereModule($id)) {
            $module = Module::getModuleOfNote($id);
            return $module;
        } else {
            Redirect::to('home');
        }
    }
    static public function getAllModulle()
    {
        if (isset($_POST['class_id']) && isset($_POST['submit'])) {
            $_SESSION['class_id'] = $_POST['class_id'];
            return Module::allModules($_SESSION['class_id']);
        } else if (isset($_SESSION['class_id'])) {
            return Module::allModules($_SESSION['class_id']);
        } else {
            Redirect::to('home');
        }
    }
    static public function ajouterModule()
    {
        if (isset($_POST['ajouter'])) {
            $data = array(
                'module_name' => $_POST['module_name'],
                'class_id' => $_POST['class_id'],
                'prof_id' => $_POST['select']
            );
            print_r($data);
            $res = Module::ajouter($data);
            if ($res === 'ok') {
                Redirect::to('module');
            } else
                echo "kkk";
        }
    }
    static public function deleteModule()
    {
        if (isset($_POST['module_id']) && isset($_POST['suprimer'])) {
            $res = Module::delete($_POST['module_id']);
            if ($res === 'ok') {
                Redirect::to('module');
            }
        }
    }
    static public function getModulesOfUser()
    {
        if (isset($_SESSION['prof_id'])) {
            $modules = Module::getModuleProf($_SESSION['prof_id']);
            return $modules;
        }
        if (isset($_SESSION['etudiant_id'])) {
            $id_class = Etudiant::getIdClass($_SESSION['etudiant_id']);
            $modules = Module::getModuleEtudiant($id_class['class']);
            $Modules = [];
            foreach ($modules as $module) {

                $profInfo = Etudiant::getProfOfModule($module['prof_id']);
                $profname = $profInfo['fullname'];
                $profemail = $profInfo['email'];
                $data = [
                    'module_name' => $module['module_name'],
                    'module_id' => $module['module_id'],
                    'prof_name' => $profname,
                    'prof_email' => $profemail,
                ];
                $Modules[] = $data;
            }
            return $Modules;
        }
    }
    static public function isHereModule($id)
    {
        $modules = ModuleController::getModulesOfUser();
        $Check = false;
        foreach ($modules as $module) {
            if ($id == $module['module_id']) {
                $Check = true;
            }
        }
        return $Check;
    }
    static public function getModule($id)
    {
        if (ModuleController::isHereModule($id)) {
            Notification::makeNotificationsSeen($_SESSION['user_info']['user_id'], $id);
            $_SESSION['notifications_nbr'] = Notification::getNumberNotificationsNonSeen();
            $_SESSION['notifications'] = Notification::getNotificationsNonSeen($_SESSION['user_info']['user_id']);
            $module = Module::getModuleOfNote($id);
            $cours = Cour::getCourofModule($id);
            $tasks = Task::getTasksofModule($id);
            return [$module, $cours, $tasks];
        } else {
            Redirect::to('home');
        }
    }
}
