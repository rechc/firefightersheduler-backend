<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS . '/Model/User.php';
//    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';

    $id = $_REQUEST["uid"];
    $user = User::get_user($id);
    $user->delete_with_dependencys();
?>
