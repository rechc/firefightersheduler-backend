<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserSelectList
 *
 * @author christian
 */
require_once(PATH_BASIS . '/Model/AllUser.php');


class UserChecklist {

   public static function getUserSelectList() {

        $user_array = AllUser::get_userarray_for_manager_view();
        $output = "";

        foreach ($user_array as $user) {
            $output .= "<input type='checkbox' name='check' value='". $user->getID() . "'>" .  $user->getName() . ", " . $user->getVorname() . "</option>";
            $output .= "<br>";
        }
        return $output;
    }
}
?>
