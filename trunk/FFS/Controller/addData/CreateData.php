<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AddMoreData
 *
 * @author christian
 */

include_once '../../global.inc.php';
require_once PATH_BASIS .'/Model/Einsatz.php';
require_once PATH_BASIS .'/Model/Uebung.php';
require_once PATH_BASIS .'/Model/Strecke.php';
require_once PATH_BASIS .'/Model/Unterweisung.php';

$user_array = $POST['check'];
$date = $_POST['datum'];
$city = $_POST['ort'];
$dataselection  = $_POST['auswahl'];

$createData = new CreateData($dataselection, $date, $city, $user_array);

class CreateData {

    public function __construct($dataselection, $date, $city, $user_array) {
        switch ($dataselection) {
            case 'Einsatz':
                $selction = "addUserToEinsatz";
                $data = new Einsatz();
                break;
            case 'Uebung':
                $selction = "addUserToUebung";
                $data = new Uebung();
                break;
            case 'Strecke':
                $selction = "addUserToStrecke";
                $data = new Strecke();
                break;
            case 'Unterweisung':
                $selction = "addUserToUnterweisung";
                $data = new Unterweisung();
                break;
        }

        $data->setDatum($date);
        $data->setOrt($city);
        $data->create_db_entry();
        $this->addUsers($user_array, $selction, $data->getID());
    }

    public function addUsers($user_array, $selction, $id){
        foreach ($user_array as $user) {
            AddData::addUserConnection($selection, "create", $id, $user->getID());
        }
    }
    
}
?>
