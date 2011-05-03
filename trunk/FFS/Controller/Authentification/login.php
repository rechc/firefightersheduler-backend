<?php
/**
 * Erstellt eine neue User-Session
 */
    session_start ();
    session_unset ();
    session_destroy ();    
    session_start ();
   
    include_once '../../global.inc.php';
    require_once PATH_BASIS . '/Model/User.php';
    
    try {
        $currentuser = User::get_user_by_login($_REQUEST["Mail"], $_REQUEST["Pwd"]);
    } catch (FFSException $exc) {
        header("Location: ../../View/login_formular.php?fehler=1");
    }

    if ($currentuser != NULL){
        // Sessionvariablen erstellen und registrieren
        $_SESSION["user_id"] = $currentuser->getID();
        $_SESSION["user_email"] = $currentuser->getEmail();
        $_SESSION["user_nachname"] = $currentuser->getName();
        $_SESSION["user_vorname"] = $currentuser->getVorname();
        $_SESSION["user_rolle"] = $currentuser->getRollen_ID();
        $currentuser->login_log();

        header("Location: ../../View/viewUser.php");
    }  else {
        header("Location: ../../View/login_formular.php?fehler=1");
    }
?>
