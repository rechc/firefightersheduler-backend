<?php
    session_start ();
    // TODO die Session sollte komplett gelöscht werden bevor werte zugewiesen werden, wegen session injektions
     
    include_once '../../global.inc.php';
    require_once('../DbConnector.php');
//    require_once(PATH_BASIS . '/Model/DbConnector.php');

    $sql = "SELECT ID, email, name, vorname, passwort, rollen_ID " .
            "FROM user " .
            "WHERE ( email = '" . $_REQUEST["Mail"] .
            "' ) AND ( " .
            "passwort = '" .  $_REQUEST["Pwd"] . "')";
//            "passwort = '" .  md5($_REQUEST["Pwd"]) . "')";

    $dbConnector = DbConnector::getInstance();
    $result = $dbConnector->execute_sql($sql);

    if (mysql_num_rows($result) > 0) {
        // Benutzerdaten in ein Array auslesen.
        $data = mysql_fetch_array($result);

// Sessionvariablen erstellen und registrieren
        $_SESSION["user_id"] = $data["ID"];
        $_SESSION["user_email"] = $data["email"];
        $_SESSION["user_nachname"] = $data["name"];
        $_SESSION["user_vorname"] = $data["vorname"];
        $_SESSION["user_rolle"] = $data["rollen_ID"];

        header("Location: ../../View/viewUser.php");
    } else {
        header("Location: ../../View/login_formular.php?fehler=1");
    }
?>