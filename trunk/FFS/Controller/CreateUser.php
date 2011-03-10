<?php
/*
 * Description
 *
 *@author Rech Christian, bla
 *@version alpha
 */
    require_once PATH_BASIS . '/Model/User.php';

 class CreateUser{
    public static function checkEntry(){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $bday = $_POST['bday'];
        $password = $_POST['user_password'];
        $confirm_password = $_POST['confirm_password'];
        $rolle = $_POST['rolle'];

        if (empty ($firstname)){
            return false;
        } elseif (empty ($lastname)) {
            return false;
        } elseif (empty ($email)) {
            return false;
        } elseif (empty ($lastname)) {
            return false;
        } elseif (empty ($lastname)) {
            return false;
        } else {
            return true;
        }


    }
 }

    $user = new User();
    $user->setName();
    $user->setVorname();
    $user->setEmail();
    $user->setGebDat();
    $user->setPassword();
    $user->setRollen_ID();

    $user->create_db_entry();

    header("Location: usersOverview.php");
?>
