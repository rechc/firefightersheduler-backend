<?php
    // Session starten
    session_start ();
    require_once('../DbConnector.php');

    $sql = "SELECT ID, email, name, vorname, passwort " .
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

        header("Location: ../../View/viewUser.php");
    } else {
        header("Location: ../../View/login_formular.php?fehler=1");
    }
?>