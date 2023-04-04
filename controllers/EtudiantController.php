<?php
class EtudiantController
{
    
    static public function getAllEtudiantDeclass()
    {
        if (isset($_POST['id'])) {
            $module_id =  $_POST['id'];
            $module = ModuleController::getModuleById($module_id);
            $class_id = $module['class_id'];
            $etudiantes = Etudiant::AllEtudiant($class_id);
            if (isset($_SESSION['prof_id'])) {
                $Etudiantes = [];
                foreach ($etudiantes as $etudaint) {
                    $para = [
                        'student_id' => $etudaint['user_id'],
                        'module_id' => $module_id,
                        'prof_id' => $_SESSION['prof_id']
                    ];
                    $Notes = Note::getNoteOfStudent($para);
                    if (!empty($Notes['note_value'])) {
                        $nt = $Notes['note_value'];
                    } else
                        $nt = '';
                    $data = [
                        'user_id' => $etudaint['user_id'],
                        'fullname' => $etudaint['fullname'],
                        'username' => $etudaint['username'],
                        'img' => $etudaint['img'],
                        'email' => $etudaint['email'],
                        'class_id' => $etudaint['class'],
                        'note' => $nt,
                    ];
                    $Etudiantes[] = $data;
                }
            }
            return $Etudiantes;
        } else {
            Redirect::to('note');
        }
    }
    static public function getAllEtudiant()
    {
        if (isset($_POST['submit']) && isset($_POST['class_id'])) {
            $class_id = $_POST['class_id'];
            return Etudiant::AllEtudiant($class_id);
        } else if (isset($class_id)) {
            return Etudiant::AllEtudiant($class_id);
        } else {
            Redirect::to('home');
        }
    }
    static public function getAllProf()
    {
        if (isset($_POST['departement_id'])) {
            $_SESSION['departement_id'] = $_POST['departement_id'];
            return Etudiant::AllProf($_SESSION['departement_id']);
        } else if (isset($_SESSION['departement_id'])) {
            return Etudiant::AllProf($_SESSION['departement_id']);
        } else {
            Redirect::to('home');
        }
    }

    static public function ajouterEtudiant()
    {
        if (isset($_POST['ajouter'])) {
            $data = array(
                'fullname' => $_POST['fullname'],
                'class_id' => $_POST['class_id']
            );
            $res = Etudiant::ajouter($data);
            if ($res === 'ok') {
                if (isset($_SESSION['prof_id'])) {
                    Redirect::to('class');
                } else {
                    Redirect::to('etudiant');
                }
            }
        }
    }

    static public function ajouterProf()
    {
        if (isset($_POST['ajouterprof'])) {
            $data = array(
                'fullname' => $_POST['fullname'],
                'departement_id' => $_POST['departement_id']
            );
            $res = Etudiant::ajouterprof($data);
            if ($res === 'ok') {
                Redirect::to('prof');
            }
        }
    }

    static public function deleteEUser()
    {
        if (isset($_POST['user_id']) && isset($_POST['suprimer'])) {
            $res = Etudiant::delete($_POST['user_id']);
            if ($res === '3') {
                Redirect::to('etudiant');
            } else {
                Redirect::to('prof');
            }
        }
    }

    static public function userDconn()
    {
        if (isset($_POST['logout'])) {
            session_start();
            session_unset();
            session_destroy();
            Redirect::to('login');
        }
    }

    static public function userConn()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'username' => $_POST['username'],
                'user_password' => $_POST['password_user']
            ];
            $res = Etudiant::userConn($data);
            if ($res['statut'] === 1) {
                $_SESSION['user_info'] = $res;
                $_SESSION['admin_id'] = $res['user_id'];
                Redirect::to('home');
            } else if ($res['statut'] === 2) {
                $_SESSION['user_info'] = $res;
                $_SESSION['prof_id'] = $res['user_id'];
                Redirect::to('home');
            } else if ($res['statut'] === 3) {
                $_SESSION['user_info'] = $res;
                $_SESSION['etudiant_id'] = $res['user_id'];
                Redirect::to('home');
            } else {
                echo "there is a fault";
                Redirect::to('login');
            }
        }
    }

    public static function modifierInfoUser()
    {
        if (isset($_POST['modifier'])) {
            $password = $_POST['password'];
            $username =  $_POST['username'];
            $fullname =  $_POST['fullname'];
            $email = $_POST['email'];
            $res = Etudiant::UpdateProfile($username, $fullname, $email, $password, $_FILES);
            Redirect::to('editProfile');
        }
    }
    public static function getStudentsOfClass($id)
    {
        $students = Etudiant::getEtudiantsOfClasse($id);
        return $students;
    }
}
