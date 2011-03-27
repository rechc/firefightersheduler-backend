<?php
include_once '../../global.inc.php';
require_once PATH_BASIS .'/Model/Strecke.php';
require_once PATH_BASIS .'/Model/Einsatz.php';
require_once PATH_BASIS .'/Model/Uebung.php';
require_once PATH_BASIS .'/Model/Unterweisung.php';

//$date = $_POST['datum']; //??
//$city = $_POST['ort'];  //??
//$participants = $_POST['check']; //??

$dataselection = $_POST['auswahl'];
switch ($dataselection) {
    case 'addUserToStrecke':
        $sid = $_POST['sid'];
        $strecke= Strecke::load($sid);
        $uid = $_POST['uid'];
        $strecke->add_user_connection($uid);
        header("Location: ../../View/editStrecke.php?uid=".$uid);
        break;
    case 'addUserToEinsatz':
        $eid = $_POST['eid'];
        $einsatz= Einsatz::load($eid);
        $uid = $_POST['uid'];
        $einsatz->add_user_connection($uid);
        header("Location: ../../View/editEinsatz.php?uid=".$uid);
        break;
    case 'addUserToUebung':
        $uebid = $_POST['uebid'];
        $uebung= Uebung::load($uebid);
        $uid = $_POST['uid'];
        $uebung->add_user_connection($uid);
        header("Location: ../../View/editUebung.php?uid=".$uid);
        break;
    case 'addUserToUnterweisung':
        $uwid = $_POST['uwid'];
        $unterweisung= Unterweisung::load($uwid);
        $uid = $_POST['uid'];
        $unterweisung->add_user_connection($uid);
        header("Location: ../../View/editUnterweisung.php?uid=".$uid);
        break;
}

?>
