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
                $putput .= "<option value='agw'>normal (10)</option>";
                $output .= "<option value='agw'>AGW (40)</option>";
                $output .= "<option value='admin'>Administrator (50)</option>";
            $output .= "</select>";
        }
        return $output;
    }

    public static function createLBZView(){
        $sql = "SELECT name FROM lbz";
        $dbConnector = DbConnector::getInstance();
        $result = $dbConnector->execute_sql($sql);

        $output = "<select name='lbz' id='lbz'>";
        while($data = mysql_fetch_array($result)){
            $output .= "<option value='". $data['name'] ."'>". $data['name'] ."</option>";
        }
        $output .= "</select>";
        return $output;
    }
  }
?>
