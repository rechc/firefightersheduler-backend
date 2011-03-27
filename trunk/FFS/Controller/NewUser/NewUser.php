<?php
require_once(PATH_BASIS . '/Model/DbConnector.php');

class NewUser {

    public static function createRolleView() {
        $output = "";
        if (SessionHelper::isAGW()) {
            $output .= "<input type ='text' readonly name ='rolle' id='rolle' value='normal (10)'>";
        }
        elseif (SessionHelper::isAdmin()) {
            $output .= "<select name='rolle' id='rolle'>";
                $putput .= "<option value='10'>normal (10)</option>";
                $output .= "<option value='40'>AGW (40)</option>";
                $output .= "<option value='50'>Administrator (50)</option>";
            $output .= "</select>";
        }
        return $output;
    }

    public static function createLBZView(){
        $sql = "SELECT name FROM lbz";
        $dbConnector = DbConnector::getInstance();
        $result = $dbConnector->execute_sql($sql);

        $output = "<select ID, name='lbz' id='lbz'>";
        while($data = mysql_fetch_array($result)){
            $output .= "<option value='". $data['ID'] ."'>". $data['name'] ."</option>";
        }
        $output .= "</select>";
        return $output;
    }
  }
?>
