<?php
class HomeController
{

      static public function index($page)
      {
            if (isset($_SESSION['prof_id'])) {
                  $_SESSION['nbr_Messages_NSeen'] = Messanger::getNumberMessagesNonSeen($_SESSION['user_info']['user_id']);
                  $_SESSION['modules'] = Module::getModuleProf($_SESSION['user_info']['user_id']);
                  $pages = ['home', 'note', 'noteModule', 'test', 'message', 'contact', 'messanger', 'modules', 'module'];
                  if (in_array($page, $pages)) {
                        include('views/prof/' . $page . '.php');
                  } else if ($page == "addCour") {
                        CourController::ajouterCour();
                  } else if ($page == "addTask") {
                        TaskController::ajouterTask();
                  } else if ($page == "deleteCour") {
                        CourController::suprimerCour();
                  } else if ($page == "deleteTask") {
                        TaskController::deleteTask();
                  } else if ($page == 'AddNote') {
                        NoteController::enregistrerNote();
                  } else if ($page == 'deleteNote') {
                        NoteController::suprimerNote();
                  } else if ($page == "AddMessageAdmin") {
                        ContactController::AddMessage();
                  } else if ($page == 'modifierProfil') {
                        include('views/' . $page . '.php');
                  } else if ($page == 'showProfile') {
                        include('views/profile/showProfile.php');
                  } else if ($page == 'editProfile') {
                        include('views/profile/editProfile.php');
                  } else {
                        include('views/includes/404.php');
                  }
            } else if (isset($_SESSION['admin_id'])) {
                  $pages = ['home', 'etudiant', 'prof', 'filliere', 'module', 'class'];
                  if (in_array($page, $pages)) {
                        include('views/admin/' . $page . '.php');
                  } else if ($page == 'modifierProfil') {
                        include('views/' . $page . '.php');
                  } else if ($page == 'showProfile') {
                        include('views/profile/showPofile.php');
                  } else if ($page == 'editProfile') {
                        include('views/profile/editProfile.php');
                  } else {
                        include('views/includes/404.php');
                  }
            } else if (isset($_SESSION['etudiant_id'])) {
                  $_SESSION['notifications_nbr'] = Notification::getNumberNotificationsNonSeen();
                  $_SESSION['notifications'] = Notification::getNotificationsNonSeen($_SESSION['user_info']['user_id']);
                  $_SESSION['nbr_Messages_NSeen'] = Messanger::getNumberMessagesNonSeen($_SESSION['user_info']['user_id']);
                  $_SESSION['modules'] = Module::getModuleEtudiant($_SESSION['user_info']['class']);
                  $pages = ['home', 'cour', 'note', 'message', 'contact', 'messanger', 'modules', 'module'];
                  if (in_array($page, $pages)) {

                        include('views/etudiant/' . $page . '.php');
                  } else if ($page == 'showProfile') {
                        include('views/profile/showProfile.php');
                  } else if ($page == 'editProfile') {
                        include('views/profile/editProfile.php');
                  } else {
                        include('views/includes/404.php');
                  }
            } else {
                  if ($page == 'login') {
                        include('views/Login/' . $page . '.php');
                  } else {
                        include('views/includes/404.php');
                  }
            }
      }
}
