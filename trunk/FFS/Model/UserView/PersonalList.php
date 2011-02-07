<?php

class PersonalList{

        /**
         * Standard Konstruktor
         */
        public function __construct(){}

        public static function getUserDataTable(){

        }

        public static function getG26Table(){
                $output = "";

                 $output .= "<tr>";
                    $output .= "<td>". $user->getName() ."</td>";
                    $output .= "<td>". $user->getVorname() ."</td>";
                    $output .= "<td><img alt='einsatzbereit' src='images/icon-ampel-gruen.gif' /></td>";
                $output .= "</tr>";
        }


}
?>
