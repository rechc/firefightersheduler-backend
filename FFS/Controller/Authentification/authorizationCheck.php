<?php
/**
 * Wird von Klassen eingebunden um zu Prüfen ob ein Benutzer mit seiner
 * Berechtigung die Seite öffnen darf.
 */
    require_once PATH_BASIS .'/Controller/SessionHelper.php';
    //Test ob Berechtigung vorhanden
    $user = SessionHelper::getCurrentUser();
    if (!empty ($user)){
        if (!($user->is_agw()) & !($user->is_admin())) {
                header ("Location: ../View/wrongAuthorization.php");
        }
    } else{
        header ("Location: ../View/wrongAuthorization.php");
    }
?>
