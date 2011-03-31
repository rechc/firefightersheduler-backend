<?php
/*
 * Klasse dient dazu um eine Verbindung zwischen User und Einsatz,Streck,Uebung oder Unterweisung
 */
include_once '../../global.inc.php';
require_once PATH_BASIS .'/Model/Strecke.php';
require_once PATH_BASIS .'/Model/Einsatz.php';
require_once PATH_BASIS .'/Model/Uebung.php';
require_once PATH_BASIS .'/Model/Unterweisung.php';

$option         = $_REQUEST['option'];
$dataselection  = $_POST['auswahl'];
$id             = $_POST['id'];
$uid            = $_POST['uid'];
if (!isset ($_POST['auswahl'])) {
    $dataselection = $_REQUEST['auswahl'];
}
if (!isset ($_POST['id'])) {
    $id     = $_REQUEST['id'];
}
if (!isset ($_POST['uid'])) {
    $uid    = $_REQUEST['uid'];
}
AddData::addUserConnection($dataselection, $option, $id, $uid);

class AddData {
    public static function addUserConnection($dataselection, $option, $id, $uid){
        switch ($dataselection) {
            case 'addUserToStrecke':
                $strecke = Strecke::load($id);
                if ($option == 'delete') {
                    $strecke->del_user_connection($uid);
                } else {
                    $strecke->add_user_connection($uid);
                }
                header("Location: ../../View/editStrecke.php?uid=".$uid);
                break;
            case 'addUserToEinsatz':
                $einsatz= Einsatz::load($id);
                if ($option == 'delete') {
                    $einsatz->del_user_connection($uid);
                } else {
                    $einsatz->add_user_connection($uid);
                }
                header("Location: ../../View/editEinsatz.php?uid=".$uid);
                break;
            case 'addUserToUebung':
                $uebung= Uebung::load($id);
                if ($option == 'delete') {
                    $uebung->del_user_connection($uid);
                } else {
                    $uebung->add_user_connection($uid);
                }
                header("Location: ../../View/editUebung.php?uid=".$uid);
                break;
            case 'addUserToUnterweisung':
                $unterweisung= Unterweisung::load($id);
                if ($option == 'delete') {
                    $unterweisung->del_user_connection($uid);
                } else {
                    $unterweisung->add_user_connection($uid);
                }
                header("Location: ../../View/editUnterweisung.php?uid=".$uid);
                break;
        }
    }
}

?>
