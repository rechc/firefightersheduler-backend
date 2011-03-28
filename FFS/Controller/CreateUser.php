<?php
/*
 * Description
 *
 *@author Rech Christian, bla
 *@version alpha
 */
include_once '../global.inc.php';
require_once PATH_BASIS . '/Model/User.php';
require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';

    $uid = $_POST['uid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $bday = $_POST['bday'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password_confirm'];
    $rolle = $_POST['rolle'];
    $lbz = $_POST['lbz'];
    $agt = $POST['AGT'];

    $correctEntry = CreateUser::checkEntry($firstname,$lastname,$email,$bday,$password, $agt, $lbz, $rolle);
    if (correctEntry == true)
         CreateUser::createNewUser($uid, $firstname,$lastname,$email,$bday,$password, $agt, $lbz, $rolle);
    else
          header("Location: ../View/userOverview.php?fehler=" . $correctEntry);
//        die ("Folgende Eingabe ist nicht korrekt: " . $correctEntry);


 class CreateUser{

    public static function checkEntry($firstname,$lastname,$email,$bday,$password, $agt, $lbz, $rolle){
          if (empty ($firstname)){
            return "Vorname";
        } elseif (empty ($lastname)) {
            return "Nachname";
        } elseif (empty ($email)) {
            return "E-Mail";
        } elseif (empty ($bday)) {
            return "Geburtsdatum";
        } else {
            return true;
        }
    }

    
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
        $user->setAgt(1);  //TODO $agt geht nicht
        $user->setRollen_ID($rolle);
        $user->setLbz_ID(1); //TODO $lbz geht nicht

        if (empty ($uid))
            $user->create_db_entry();

        header("Location: ../View/userOverview.php");
     }

 }

?>
