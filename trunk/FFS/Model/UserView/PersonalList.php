<?php
require_once(PATH_BASIS.'/Model/User.php');
require_once(PATH_BASIS.'/Model/Table.php');
require_once(PATH_BASIS.'/Model/UserOverview/Userlist.php');

class PersonalList{

        /**
         * Standard Konstruktor
         */
        public function __construct(){}

        public static function getUserDataTable(){

        }

        public static function getUserData($uid){
            $user = User::get_user($uid);
            $table = new Table();
            $output = $table->openTR();
            $output = Userlist::getUserData($user);
            $output .= $table->closeTR();
            return $output;
        }

        public static function getG26Table($uid){
            $user = User::get_user($uid);
            $glist = $user->getG26Liste_object();
            $garray = $glist->getG26_array();
            $output = "";
            foreach ($garray as $garray_entry) {
                $output .= "<tr>\n";
                $output .= "\t\t\t<td ";
                if ($garray_entry->get_warning_status() == 0) {
                    $output .= "class=\"fine\">";
                } elseif ($garray_entry->get_warning_status() == 1) {
                    $output .= "class=\"attention\">";
                } elseif ($garray_entry->get_warning_status() == 2) {
                    $output .= "class=\"noway\">";
                } else {
                    $output .= "> ";
                }
                $output .= "&nbsp;</td>\n";
                $output .= "\t\t\t<td>".$garray_entry->getDatum()."</td>\n";
                $output .= "\t\t\t<td>".$garray_entry->getGueltigBis()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }

        public static function getStreckeTable($uid){
            $user = User::get_user($uid);
            $stlist = $user->getStreckeListe_object();
            $starray = $stlist->getStrecke_array();
            $output = "";
            foreach ($starray as $starray_entry) {
                $output .= "<tr>\n";
                $output .= "\t\t\t<td ";
                if ($starray_entry->get_warning_status() == 0) {
                    $output .= "class=\"fine\">";
                } elseif ($starray_entry->get_warning_status() == 1) {
                    $output .= "class=\"attention\">";
                } elseif ($starray_entry->get_warning_status() == 2) {
                    $output .= "class=\"noway\">";
                } else {
                    $output .= "> ";
                }
                $output .= "&nbsp;</td>\n";
                $output .= "\t\t\t<td>".$starray_entry->getDatum()."</td>\n";
                $output .= "\t\t\t<td>".$starray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }

        public static function getEinsatzTable($uid){
            $user = User::get_user($uid);
            $elist = $user->getEinsatzListe_object();
            $earray = $elist->getEinsatz_array();
            $output = "";
            foreach ($earray as $earray_entry) {
                $output .= "<tr>\n";
                $output .= "\t\t\t<td ";
                if ($earray_entry->get_warning_status() == 0) {
                    $output .= "class=\"fine\">";
                } elseif ($earray_entry->get_warning_status() == 1) {
                    $output .= "class=\"attention\">";
                } elseif ($earray_entry->get_warning_status() == 2) {
                    $output .= "class=\"noway\">";
                } else {
                    $output .= "> ";
                }
                $output .= "&nbsp;</td>\n";
                $output .= "\t\t\t<td>".$earray_entry->getDatum()."</td>\n";
                $output .= "\t\t\t<td>".$earray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }

        public static function getUebungTable($uid){
            $user = User::get_user($uid);
            $ulist = $user->getUebungListe_object();
            $uarray = $ulist->getUebung_array();
            $output = "";
            foreach ($uarray as $uarray_entry) {
                $output .= "<tr>\n";
                $output .= "\t\t\t<td ";
                if ($uarray_entry->get_warning_status() == 0) {
                    $output .= "class=\"fine\">";
                } elseif ($uarray_entry->get_warning_status() == 1) {
                    $output .= "class=\"attention\">";
                } elseif ($uarray_entry->get_warning_status() == 2) {
                    $output .= "class=\"noway\">";
                } else {
                    $output .= "> ";
                }
                $output .= "&nbsp;</td>\n";
                $output .= "\t\t\t<td>".$uarray_entry->getDatum()."</td>\n";
                $output .= "\t\t\t<td>".$uarray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }
        public static function getUnterweisungTable($uid){
            $user = User::get_user($uid);
            $uwlist = $user->getUnterweisungListe_object();
            $uwarray = $uwlist->getUnterweisung_array();
            $output = "";
            foreach ($uwarray as $uwarray_entry) {
                $output .= "<tr>\n";
                $output .= "\t\t\t<td ";
                if ($uwarray_entry->get_warning_status() == 0) {
                    $output .= "class=\"fine\">";
                } elseif ($uwarray_entry->get_warning_status() == 1) {
                    $output .= "class=\"attention\">";
                } elseif ($uwarray_entry->get_warning_status() == 2) {
                    $output .= "class=\"noway\">";
                } else {
                    $output .= "> ";
                }
                $output .= "&nbsp;</td>\n";
                $output .= "\t\t\t<td>".$uwarray_entry->getDatum()."</td>\n";
                $output .= "\t\t\t<td>".$uwarray_entry->getOrt()."</td>\n";
                $output .= "\t\t</tr>\n";
            }
            return $output;
        }



}
?>
