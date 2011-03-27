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


    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $bday = $_POST['bday'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password_confirm'];
    $rolle = $_POST['rolle'];
    $lbz = $_POST['lbz'];
    $agt = $POST['AGT'];

    $correctEntry = CreateUser::checkEntry($firstname, $lastname, $email, $bday, $password);

    if (correctEntry == true)
         CreateUser::createNewUser($firstname, $lastname, $email, $bday, $password);
    else
        die ("Folgende Eingabe ist nicht korrekt: " . $correctEntry);


 class CreateUser{

    public static function checkEntry($firstname,$lastname,$email,$bday,$password){
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

    
    public static function createNewUser($firstname,$lastname,$email,$bday,$password){
        $user = new User();
        $user->setName($lastname);
        $user->setVorname($firstname);
        $user->setEmail("a");
        $user->setGebDat($bday);
        $user->setPassword($password);
        $user->setRollen_ID(10);
        $user->setLbz_ID(100);
        $user->setAgt("ja");

        $user->create_db_entry();

        header("Location: ../View/usersOverview.php");
     }

 }

?>
