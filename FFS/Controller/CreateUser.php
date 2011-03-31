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
$password = "9999";     //$_POST['user_password'];
$confirm_password = $_POST['password_confirm'];
$rolle = $_POST['rolle'];
$lbz = $_POST['lbz'];
$agt = $_POST['AGT'];


    $correctEntry = CreateUser::checkEntry($firstname,$lastname,$email,$bday);
    if ($correctEntry == "correct")
         CreateUser::createNewUser($uid, $firstname,$lastname,$email,$bday,$password, $agt, $lbz, $rolle);
    else
          header("Location: ../View/newUser.php?fehler=" . $correctEntry);
//        die ("Folgende Eingabe ist nicht korrekt: " . $correctEntry)

 class CreateUser{

     /*
      * Prüft ob alle Pflichtfelder ausgefüllt sind
      */
    public static function checkEntry($firstname,$lastname,$email,$bday){
          if (empty ($firstname)){
            return "Vorname";
        } elseif (empty ($lastname)) {
            return "Nachname";
        } elseif (empty ($email)) {
            return "E-Mail";
        } elseif (empty ($bday)) {
            return "Geburtsdatum";
        } else {
            return "correct";
        }
    }

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

        if (empty ($uid)){
            $user->create_db_entry();
//            $user->generate_and_send_new_password($email); //TODO Im Aktivbetrieb Kommentar raus holen
        }else{
            $user->save_without_pw ();
        }

        header("Location: ../View/userOverview.php?created=true");
     }

 }

?>
