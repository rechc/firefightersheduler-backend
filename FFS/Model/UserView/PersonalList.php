<?php

require_once(PATH_BASIS . '/Model/User.php');
require_once(PATH_BASIS . '/Model/Table.php');
require_once(PATH_BASIS . '/Model/UserOverview/Userlist.php');
require_once (PATH_BASIS . '/Controller/SessionHelper.php');

class PersonalList {
    //optional: man kann hier auch mit einem objekt und nicht nur statischen funktionen arbeiten somit würde man sich das mehrfache laden des Benutzers sparen.

    /**
     * Standard Konstruktor
     */
    public function __construct() {

    }

    public static function getUserDataTable() {

    }

    public static function getUserData($user) {
        $table = new Table();
        $output = $table->openTR();
        $output = Userlist::getUserData($user);
        $output .= $table->closeTR();
        return $output;
    }

    /**
     *
     * @return <type> 
     */
    public static function getStammDaten($user) {
        $output = "";
        if ($user != NULL){
            $output .= "<td>";
            $output .= $user->getGebDat();
            $output .= "</td>";
            $output .= "<td>";
            $output .= $user->getEmail();
            $output .= "</td>";
            $output .= "<td>";
            $output .= $user->getLbz_ID();
            $output .= "</td>";
            $output .= "<td>";
            $output .= $user->getAgt();
            $output .= "</td>";
            $output .= "<td>";
            $output .= $user->getRollen_ID();
            $output .= "</td>";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"editStammdaten.php?id=" . $user->getID() . "\"><img src=\"images/edit.png\"></a></td>\n";
            }
        }
        return $output;
    }

    public static function getG26Table($user) {
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
            $output .= "\t\t\t<td>" . $garray_entry->getDatum() . "</td>\n";
            $output .= "\t\t\t<td>" . $garray_entry->getGueltigBis() . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"editG26.php?id=" . $garray_entry->getID() . "&uid=" . $uid . "\"><img src=\"images/edit.png\"></a></td>\n";
            }
            $output .= "\t\t</tr>\n";
        }
        return $output;
    }

    public static function getStreckeTable($user) {
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
            $output .= "\t\t\t<td>" . $starray_entry->getDatum() . "</td>\n";
            $output .= "\t\t\t<td>" . $starray_entry->getOrt() . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"editStrecke.php?id=" . $starray_entry->getID() . "\"><img src=\"images/edit.png\"></a></td>\n";
            }
            $output .= "\t\t</tr>\n";
        }
        return $output;
    }

    public static function getEinsatzTable($user) {
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
            $output .= "\t\t\t<td>" . $earray_entry->getDatum() . "</td>\n";
            $output .= "\t\t\t<td>" . $earray_entry->getOrt() . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"editEinsatz.php?id=" . $earray_entry->getID() . "\"><img src=\"images/edit.png\"></a></td>\n";
            }
            $output .= "\t\t</tr>\n";
        }
        return $output;
    }

    public static function getUebungTable($user) {
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
            $output .= "\t\t\t<td>" . $uarray_entry->getDatum() . "</td>\n";
            $output .= "\t\t\t<td>" . $uarray_entry->getOrt() . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"editUebung.php?id=" . $uarray_entry->getID() . "\"><img src=\"images/edit.png\"></a></td>\n";
            }
            $output .= "\t\t</tr>\n";
        }
        return $output;
    }

    public static function getUnterweisungTable($user) {
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
            $output .= "\t\t\t<td>" . $uwarray_entry->getDatum() . "</td>\n";
            $output .= "\t\t\t<td>" . $uwarray_entry->getOrt() . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"editUnterweisung.php?id=" . $uwarray_entry->getID() . "\"><img src=\"images/edit.png\"></a></td>\n";
            }
            $output .= "\t\t</tr>\n";
        }
        return $output;
    }

}

?>
