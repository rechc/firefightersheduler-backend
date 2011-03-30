<?php
/*
 * Dient als Hilfsklasse von addData.php
 * Erstellt eine Ansicht mit Checkbox pro Benutzer
 */
require_once(PATH_BASIS . '/Model/AllUser.php');

class UserChecklist {

   public static function getUserSelectList() {
        $user_array = AllUser::get_userarray_for_manager_view();
        $output = "";

        foreach ($user_array as $user) {
            $output .= "<input type='checkbox' name='checkedUsers[]' value='". $user->getID() . "'>" .  $user->getName() . ", " . $user->getVorname();
            $output .= "<br> \n";
        }
        return $output;
    }
}
?>
