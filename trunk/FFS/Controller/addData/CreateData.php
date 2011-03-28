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

$user_array = $_POST['check'];
$date = $_POST['datum'];
$city = $_POST['ort'];
$dataselection  = $_POST['auswahl'];

$createData = new CreateData($dataselection, $date, $city, $user_array);

class CreateData {

    public function __construct($dataselection, $date, $city, $user_array) {
        switch ($dataselection) {
            case 'Einsatz':
                $selction = "addUserToStrecke";
                $data = new Einsatz();
                break;
            case 'Uebung':
                $data = new Uebung();
                break;
            case 'Strecke':
                $data = new Strecke();
                break;
            case 'Unterweisung':
                $data = new Unterweisung();
                break;
        }

        $data->setDatum($date);
        $data->setOrt($city);
        $data->create_db_entry();
        //TODO $id festlegen;
        addUsers($user_array, $selction, $id);
    }

    public function addUsers($user_array, $selction, $id){
        foreach ($user_array as $user) {
            AddData::addUserConnection($selection, "create", $id, $user->getID());
        }
    }
    
}
?>
