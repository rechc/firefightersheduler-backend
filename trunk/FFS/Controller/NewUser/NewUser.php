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
    public static function createRolleView() {
        $output = "";
        if (SessionHelper::isAGW()) {
            $output .= "<input type ='text' style='background-color:lightgray;' readonly name ='rolle' id='rolle' value='Nutzer (10)'>";
        }
        elseif (SessionHelper::isAdmin()) {
            $output .= "<select name='rolle' id='rolle'>";
                $output .= "<option value='10'>Nutzer (10)</option>";
                $output .= "<option value='40'>AGW (40)</option>";
                $output .= "<option value='50'>Administrator (50)</option>";
            $output .= "</select>";
        }
        return $output;
    }

    /**
     * Liest aus Datenbank alle Leitbezirke und generiert Ansicht
     */
    public static function createLBZView(){
        $sql = "SELECT ID, name FROM lbz";
        $dbConnector = DbConnector::getInstance();
        $result = $dbConnector->execute_sql($sql);

        $output = "<select name='lbz' id='lbz'>";
        while($data = mysql_fetch_array($result)){
            $output .= "<option value='". $data['ID'] ."'>". $data['name'] ."</option>";
        }
        $output .= "</select>";
        return $output;
    }
  }
?>
