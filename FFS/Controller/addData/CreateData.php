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
require_once PATH_BASIS . '/Model/Einsatz.php';
require_once PATH_BASIS . '/Model/Uebung.php';
require_once PATH_BASIS . '/Model/Strecke.php';
require_once PATH_BASIS . '/Model/Unterweisung.php';

$date = $_POST['datum'];
$city = $_POST['ort'];
$uid_array = $_POST['checkedUsers'];

if (isset($_POST['checkedUsers'])) {
    foreach ($_POST['checkedUsers'] as $v) {
        print " $v\n";
    }
} else {
    //falls kein array tue irgendwas oder nix
}

$dataselection = $_POST['auswahl'];
?>
<html>
    datum: <?php echo $date ?> <br>
    city: <?php echo $city ?> <br>
    check: <?php echo $uid_array ?> <br>
    selection: <?php echo $dateselection ?>
</html>
<?php

//$createData = new CreateData($dataselection, $date, $city, $user_array);
//$createData->addUsers($user_array);

class CreateData {

    private $ID;
    private $selection;

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

    public function addUsers($user_array, $id) {
        foreach ($uid_array as $uid) {
            AddData::addUserConnection($this->selection, "create", $this->id, $uid);
        }
    }

}
?>
