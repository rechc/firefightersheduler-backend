<?php
    require_once(PATH_BASIS . '/Model/User.php');
    require_once(PATH_BASIS . '/Model/DbConnector.php');
    require_once(PATH_BASIS . '/Configuration/Config.php');
    
 class AllUser {
    /**
     * Standard Konstruktor
     */
    public function __construct(){}

    /**
     * get_userarray_for_manager_view
     * Liefert ein Array aller User (ohne passwort)
     * @return User-ArrayObject
     */
//    public static function get_userarray_for_manager_view(){
//         $sql = "SELECT ID, email, name, vorname, gebDat, lbz_ID, agt, rollen_ID
//                 FROM user";
//
//         $dbConnector = DbConnector::getInstance();
//         $result = $dbConnector->execute_sql($sql);
//
//         return User::parse_result_list_as_object($result);
//     }

     public static function get_userarray_for_manager_view(){
         $sql = "SELECT ID FROM user";

         $dbConnector = DbConnector::getInstance();
         $result = $dbConnector->execute_sql($sql);

         $i = 0;
         $user_array = new ArrayObject(); //array();
         while($ID = mysql_fetch_array($result)){
             $user = User::get_user($i+1);  //WICHTIG i muss zu $ID
             $user_array[] = $user;
             $i++;
         }
         return $user_array;
     }
 }
?>
