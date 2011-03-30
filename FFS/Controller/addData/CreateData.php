<?php
/**
 * Wird von addData.php aufgerufen.
 * Erstellt neue Einsatz, Uebung, Strecke bzw. Unterweisung und kann dieser Benutzer zuardnen
 */
include_once '../../global.inc.php';
require_once PATH_BASIS . '/Model/Einsatz.php';
require_once PATH_BASIS . '/Model/Uebung.php';
require_once PATH_BASIS . '/Model/Strecke.php';
require_once PATH_BASIS . '/Model/Unterweisung.php';
require_once PATH_BASIS . '/Controller/addData/AddData.php';

$date = $_POST['datum'];
$city = $_POST['ort'];
$dataselection = $_POST['auswahl'];

$createData = new CreateData($dataselection, $date, $city);
if(isset ($_POST['checkedUsers'])){
    $uid_array = $_POST['checkedUsers'];
    $createData->addUsers($uid_array);
}

class CreateData {

    private $ID;
    private $selection;


    /**
     * Dient zum erstellen eines neuen Einsatz, Uebung, Strecke bzw. Unterweisung
     */
    public function __construct($dataselection, $date, $city) {
        switch ($dataselection) {
            case 'Einsatz':
                $this->selection = "addUserToEinsatz";
                $data = new Einsatz();
                break;
            case 'Uebung':
                $this->selection = "addUserToUebung";
                $data = new Uebung();
                break;
            case 'Strecke':
                $this->selection = "addUserToStrecke";
                $data = new Strecke();
                break;
            case 'Unterweisung':
                $this->selection = "addUserToUnterweisung";
                $data = new Unterweisung();
                break;
        }

        $data->setDatum($date);
        $data->setOrt($city);
        $data->create_db_entry();
        $this->ID = $data->getID();
    }

    /**
     * Fügt die Benutzer aus dem übergeben Array hinzu
     */
    public function addUsers($uid_array) {
        foreach ($uid_array as $uid) {
            AddData::addUserConnection($this->selection, "create", $this->ID, $uid);
        }
    }

}
?>
