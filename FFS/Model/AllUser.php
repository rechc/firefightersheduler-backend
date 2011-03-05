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
     * Liefert ein Array aller User
     * @return User-ArrayObject
     */
     public static function get_userarray_for_manager_view(){
         $sql = "SELECT ID FROM user WHERE agt=1";

         $dbConnector = DbConnector::getInstance();
         $result = $dbConnector->execute_sql($sql);

         $user_array = new ArrayObject();
         while($data = mysql_fetch_array($result)){
            $user = User::get_user($data["ID"]);
            //$user = User::get_user(2);  //verwenden wenn es Probleme gibt. Zum testen
            $user_array->append($user);
         }
         return $user_array;
     }
 }
?>
