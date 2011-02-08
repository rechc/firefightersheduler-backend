<?php
require_once(PATH_BASIS.'/Model/User.php');

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

        public static function getStreckeTable(){
            $uid = $_SESSION["user_id"];
            $user = User::get_user($uid);
            $stlist = $user->getStreckeListe_object();
            $starray = $stlist->getStrecke_array();
            $output = "";
            $output .= "<!-- ARRAY::::::::".sizeOf($starray)." -->\n";
            foreach ($starray as $starray_entry) {
                $output .= "<tr>\n";                
                if ($starray_entry->get_warning_status() == 0) {
                    $output .= "\t\t\t<td class=\"fine\">";
                    $output .= $starray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($starray_entry->get_warning_status() == 1) {
                    $output .= "\t\t\t<td class=\"attention\">";
                    $output .= $starray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($starray_entry->get_warning_status() == 2) {
                    $output .= "\t\t\t<td class=\"noway\">";
                    $output .= $starray_entry->getDatum();
                    $output .= "</td>\n";
                } else {
                    $output .= "\t\t\t<td></td>\n";
                }                
                $output .= "\t\t\t<td>".$starray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }
        public static function getEinsatzTable(){
            $uid = $_SESSION["user_id"];
            $user = User::get_user($uid);
            $elist = $user->getEinsatzListe_object();
            $earray = $elist->getEinsatz_array();
            $output = "";
            $output .= "<!-- ARRAY::::::::".sizeOf($earray)." -->\n";
            foreach ($earray as $earray_entry) {
                $output .= "<tr>\n";
                if ($earray_entry->get_warning_status() == 0) {
                    $output .= "\t\t\t<td class=\"fine\">";
                    $output .= $earray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($earray_entry->get_warning_status() == 1) {
                    $output .= "\t\t\t<td class=\"attention\">";
                    $output .= $earray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($earray_entry->get_warning_status() == 2) {
                    $output .= "\t\t\t<td class=\"noway\">";
                    $output .= $earray_entry->getDatum();
                    $output .= "</td>\n";
                } else {
                    $output .= "\t\t\t<td></td>\n";
                }
                $output .= "\t\t\t<td>".$earray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }

        public static function getUebungTable(){
            $uid = $_SESSION["user_id"];
            $user = User::get_user($uid);
            $ulist = $user->getUebungListe_object();
            $uarray = $ulist->getUebung_array();
            $output = "";
            $output .= "<!-- ARRAY::::::::".sizeOf($uarray)." -->\n";
            foreach ($uarray as $uarray_entry) {
                $output .= "<tr>\n";
                if ($uarray_entry->get_warning_status() == 0) {
                    $output .= "\t\t\t<td class=\"fine\">";
                    $output .= $uarray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($uarray_entry->get_warning_status() == 1) {
                    $output .= "\t\t\t<td class=\"attention\">";
                    $output .= $uarray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($uarray_entry->get_warning_status() == 2) {
                    $output .= "\t\t\t<td class=\"noway\">";
                    $output .= $uarray_entry->getDatum();
                    $output .= "</td>\n";
                } else {
                    $output .= "\t\t\t<td></td>\n";
                }
                $output .= "\t\t\t<td>".$uarray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }
        public static function getUnterweisungTable(){
            $uid = $_SESSION["user_id"];
            $user = User::get_user($uid);
            $uwlist = $user->getUnterweisungListe_object();
            $uwarray = $uwlist->getUnterweisung_array();
            $output = "";
            $output .= "<!-- ARRAY::::::::".sizeOf($uwarray)." -->\n";
            foreach ($uwarray as $uwarray_entry) {
                $output .= "<tr>\n";
                if ($uwarray_entry->get_warning_status() == 0) {
                    $output .= "\t\t\t<td class=\"fine\">";
                    $output .= $uwarray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($uwarray_entry->get_warning_status() == 1) {
                    $output .= "\t\t\t<td class=\"attention\">";
                    $output .= $uwarray_entry->getDatum();
                    $output .= "</td>\n";
                } elseif ($uwarray_entry->get_warning_status() == 2) {
                    $output .= "\t\t\t<td class=\"noway\">";
                    $output .= $uwarray_entry->getDatum();
                    $output .= "</td>\n";
                } else {
                    $output .= "\t\t\t<td></td>\n";
                }
                $output .= "\t\t\t<td>".$uwarray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }



}
?>
