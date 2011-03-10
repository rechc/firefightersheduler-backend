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
        if (SessionHelper::isLoggedIn()) {
            $current_uid = $_SESSION["user_id"];
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

    public static function isAdminOrAGW(){
        $user = SessionHelper::getCurrentUser();
        if (empty ($user))
            return false;
        
         if (($user->is_agw()) | ($user->is_admin()) && SessionHelper::isLoggedIn()) {
             return true;
         }
         return false;
    }

    public static function  isLoggedIn(){
        if (empty ($_SESSION["user_id"]))
            return false;
        return true;
    }

}

?>
