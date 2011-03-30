<?php
/**
 * 
 */
require_once (PATH_BASIS . '/Model/User.php');

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
            header("Location: ../View/login_formular.php?fehler=1"); //TODO testen ob zu loginproblemem fuehrt
        }
    }

    /**
     *  Liefert aktuellen Benutzernamen
     */
    public static function getCurrentUserName() {
        $output.= $_SESSION["user_vorname"];
        $output .= " ";
        $output.= $_SESSION["user_nachname"];
        return $output;
    }

    /**
     * Prüft ob Benutzer Admin oder AGW ist
     */
    public static function isAdminOrAGW(){
        $user = SessionHelper::getCurrentUser();
        if (empty ($user)){
            return false;
        } else {
             if (($user->is_agw()) | ($user->is_admin()) && SessionHelper::isLoggedIn()) {
                 return true;
             } else
                return false;
        }
    }

    /**
     * Prüft ob aktueller Benutzer Admin ist
     */
    public static function isAdmin(){
        $user = SessionHelper::getCurrentUser();
        if (empty ($user))
            return false;

         if (($user->is_admin()) && SessionHelper::isLoggedIn()) {
             return true;
         }
         return false;
    }

    /*
     * Prüft ob aktueller Benutzer AGW ist
     */
    public static function isAGW(){
        $user = SessionHelper::getCurrentUser();
        if (empty ($user))
            return false;
         else{
             if (($user->is_agw()) && SessionHelper::isLoggedIn()) {
                 return true;
             } else
                return false;
         }
    }

    /**
     * Prüft ob Benutzer eingeloggt ist
     */
    public static function  isLoggedIn(){
        $current_uid = $_SESSION["user_id"];
        if (empty($current_uid))  //TODO is:set??
            return false;
        else
            return true;
    }

}

?>
