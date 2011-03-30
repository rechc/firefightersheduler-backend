<?php
/*
 * Erstellt oder ändert einen Benutzer
 */
include_once '../global.inc.php';
require_once PATH_BASIS . '/Model/User.php';
//require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';

$uid = $_POST['uid'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$bday = $_POST['bday'];
$password = $_POST['password'];
$confirm_password = $_POST['password_confirm'];
$rolle = $_POST['rolle'];
$lbz = $_POST['lbz'];
$agt = $_POST['AGT'];

CreateUser::createNewUser($uid, $firstname,$lastname,$email,$bday,$password, $agt, $lbz, $rolle);

 class CreateUser{

     /*
      * Erstellt oder ändert einen Benutzer
      */
    public static function createNewUser($uid, $firstname,$lastname,$email,$bday,$password, $agt, $lbz, $rolle){
        if (empty ($uid))
            $user = new User();
        else
            $user = User::get_user ($uid);
        $user->setName($lastname);
        $user->setVorname($firstname);
        $user->setEmail($email);
        $user->setGebDat($bday);
        $user->setPassword($password);
        $user->setAgt($agt);
        $user->setRollen_ID($rolle);
        $user->setLbz_ID($lbz);

        if (empty ($uid))
            $user->create_db_entry();
        else{
            $user->save_without_pw ();
            $user->save_pw();
        }

        header("Location: ../View/userOverview.php");
     }

 }

?>
