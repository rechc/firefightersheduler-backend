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
        break;
    case 'addUserToEinsatz':
        $eid = $_POST['eid'];
        $einsatz= Einsatz::load($einsatz);
        $uid = $_POST['uid'];
        $einsatz->add_user_connection($uid);
        break;
    case 'addUserToUebung':
        $uebid = $_POST['uebid'];
        $uebung= Uebung::load($uebid);
        $uid = $_POST['uid'];
        $uebung->add_user_connection($uid);
        break;
    case 'addUserToUnterweisung':
        $uwid = $_POST['uwid'];
        $unterweisung= Unterweisung::load($uebid);
        $uid = $_POST['uid'];
        $unterweisung->add_user_connection($uid);
        break;
}

?>
