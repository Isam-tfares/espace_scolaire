<?php
class Contact
{
    static public function AddMessage($message)
    {
        $user = (isset($_SESSION['prof_id']) ? "prof " : "etudiant ") . $_SESSION['user_info']['fullname'];
        $stm = DB::connect()->prepare("INSERT INTO `messages`( `message_content`, `message_user`) VALUES ('$message','$user')");
        $stm->execute();
        return $stm->rowCount() > 0;
    }
}
