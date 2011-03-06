<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class addDbEntry {
    public static function addToDB ($option, $datum, $ort) {
        if ($option == "Einsatz") {
            $DB = "einsatz";
        } elseif ($option == "Uebung") {
            $DB = "uebung";
        } elseif ($option == "Strecke") {
            $DB = "strecke";
        } elseif ($option == "Unterweisung") {
            $DB = "unterweisung";
        } else {
            $DB = "";
            //ToDo ThrowException
        }
        $sql = "INSERT INTO ".$DB." VALUES (NULL, \"".$ort."\", \"".$datum."\")";
        return $sql;
    }
}

?>
