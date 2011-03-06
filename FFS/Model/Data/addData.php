<?php

require_once '../../Controller/addDbEntry.php';

    $option = $_REQUEST["auswahl"];
    $datum = $_REQUEST["datum"];
    $ort = $_REQUEST["ort"];
    $sql=addDbEntry::addToDB($option, $datum, $ort);
    echo $sql;
?>
