<?php

require_once (PATH_BASIS . '/Model/User.php');

/**
 * Description of SessionHelper
 *
 * @author awagen
 */
class SessionHelper {

    /**
     * getCurrentUser
     * liefert den aktuellen Benutzer, gelesen mittels der Session
     * 
     * @return <type> User Objekt
     */
    public static function getCurrentUser() {
        $current_uid = $_SESSION["user_id"];
        if ($current_uid != NULL) {
            return User::get_user($current_uid);
        } else {
            return NULL; // TODO redirect to Loginpage
        }
    }

    /**
     *
     * @return <type> 
     */
    public static function getCurrentUserName() {
        $output.= $_SESSION["user_vorname"];
        $output .= " ";
        $output.= $_SESSION["user_nachname"];
        return $output;
    }

}

?>
