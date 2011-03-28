<?php
include_once '../global.inc.php';
require_once('../Model/Einsatz.php');

$neu = new Einsatz();
$neu->setOrt("ort");
$neu->setDatum("10.12.2010");
$neu->create_db_entry();

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
