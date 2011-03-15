<?php

class Rolle {

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

}
?>
