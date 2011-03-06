<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AbstractNmAttendance
 *
 * @author awagen
 */
abstract class AbstractNmAttendance {// TODO delete

    private $ID;
    private $ort;
    private $datum;

    abstract public function get_warning_status();

    abstract public function delete_with_dependencys();

    abstract public function create_db_entry();

    abstract public function save();

    abstract protected static function parse_result_as_objekt($row);

    abstract public static function load($ID);
    // nachfolgendes funktioniert nicht richtig bei der vererbung
/*
    public function setOrt($ort) {
        $this->ort = $ort;
    }

    public function setDatum($datum) {
        $this->datum = $datum;
    }

    public function getID() {
        return $this->ID;
    }

    public function getOrt() {
        return $this->ort;
    }

    public function getDatum() {
        return $this->datum;
    }*/

}

?>
