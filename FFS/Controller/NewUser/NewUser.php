<?php
/**
 * Dient als Hilfsklasse von newUser.php
 * Erstellt Rollenansicht und/oder Leitbezirk Ansicht
 */

require_once(PATH_BASIS . '/Model/DbConnector.php');

class NewUser {

    /**
     * Prüft die Berechtigung eines Benutzers
     * und gebt je nach Recht eine generierte Rollenansicht zurück
     */
    public static function createRolleView($rolle) {
        $output = "";
        if (SessionHelper::isAGW()) {
            $output .= "<select name='rolle' id='rolle'>";
            if ($rolle == 10) {
                    $output .= "<option value='10' selected>Nutzer (10)</option>";
                } else if ($rolle == 40){
                    $output .= "<option value='40' selected>AGW (40)</option>";
                } else if ($rolle == 50){
                    $output .= "<option value='50' selected>Administrator (50)</option>";
                } else {
                    $output .= "<option value='10'>Nutzer (10)</option>";
                }
        }
        elseif (SessionHelper::isAdmin()) {
            $output .= "<select name='rolle' id='rolle'>";
                if ($rolle == 10) {
                    $output .= "<option value='10' selected>Nutzer (10)</option>";
                    $output .= "<option value='40'>AGW (40)</option>";
                    $output .= "<option value='50'>Administrator (50)</option>";
                } else if ($rolle == 40){
                    $output .= "<option value='10'>Nutzer (10)</option>";
                    $output .= "<option value='40' selected>AGW (40)</option>";
                    $output .= "<option value='50'>Administrator (50)</option>";
                } else if ($rolle == 50){
                    $output .= "<option value='10'>Nutzer (10)</option>";
                    $output .= "<option value='40'>AGW (40)</option>";
                    $output .= "<option value='50' selected>Administrator (50)</option>";
                } else {
                    $output .= "<option value='10'>Nutzer (10)</option>";
                }      
            $output .= "</select>";
        }
        return $output;
    }

    /**
     * Liest aus Datenbank alle Leitbezirke und generiert Ansicht
     */
    public static function createLBZView($lbz){
        $sql = "SELECT ID, name FROM lbz";
        $dbConnector = DbConnector::getInstance();
        $result = $dbConnector->execute_sql($sql);

        $output = "<select name='lbz' id='lbz'>";
        while($data = mysql_fetch_array($result)){
            if ($data['ID'] == $lbz) {
                $output .= "<option value='". $data['ID'] ."' selected>". $data['name'] ."</option>";
            } else {
               $output .= "<option value='". $data['ID'] ."'>". $data['name'] ."</option>"; 
            }
            
        }
        $output .= "</select>";
        return $output;
    }
  }
?>
