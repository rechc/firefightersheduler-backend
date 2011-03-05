<?php
    require_once PATH_BASIS .'/Controller/SessionHelper.php';
    //Test ob Berechtigung vorhanden
    $user = SessionHelper::getCurrentUser();
    if (!($user->is_agw()) & !($user->is_admin())) {
            header ("Location: wrongAuthorization.php");
    }
?>
