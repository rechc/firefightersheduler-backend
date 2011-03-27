<?php
    require_once PATH_BASIS .'/Controller/SessionHelper.php';
    //Test ob Berechtigung vorhanden
    $user = SessionHelper::getCurrentUser();
    if (!empty ($user)){
        if (!($user->is_agw()) & !($user->is_admin())) {
                header ("Location:" .PATH_BASIS. "View/wrongAuthorization.php");
        }
    } else{
        header ("Location:" .PATH_BASIS. "View/wrongAuthorization.php");
    }
?>
