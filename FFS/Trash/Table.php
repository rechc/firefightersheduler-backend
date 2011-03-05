<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Table {

    private $ID;
    private $onClick;
    private $class;

    public function __construct() {
        $this->ID = "";
        $this->onClick = "";
        $this->class = "";
    }

    public function openTR(){
        return "<tr id='". $this->ID ."' class='". $this->class ."' onClick=document.location.href='". $this->onClick ."' >";
    }


    public function closeTR(){
        return "</tr>";
    }

    public function getID() {
        return $this->ID;
    }

    public function getOnClick() {
        return $this->onClick;
    }

    public function getClass() {
        return $this->class;
    }

    public function setID($ID) {
        $this->ID = $ID;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    public function setOnClick($onClick) {
        $this->onClick = $onClick;
    }

    public static function getOpenTag(){
        return "<tr>";
    }

    public static function getCloseTag(){
        return "</tr>";
    }
}

?>
