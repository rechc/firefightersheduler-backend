<?php
/*
 * Erstellt Ansicht mit den einzelnen Benutzertabllen
 */

require_once(PATH_BASIS . '/Model/User.php');
require_once(PATH_BASIS . '/Controller/UserOverview/Userlist.php');
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
        $output = "<tr>";
        $output .= Userlist::getUserData($user);
        $output .= "</tr>";
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
                $output .= "\t\t\t<td><a href=\"newUser.php?uid=" . $user->getID() . "\"><img src=\"images/edit.png\" alt=\"edit\"></a></td>\n";
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
                $output .= "\t\t\t<td><a href=\"editG26.php?id=" . $garray_entry->getID() . "&amp;func=edit\"><img src=\"images/edit.png\" alt=\"edit\"></a></td>\n";
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
            $output .= "\t\t\t<td>" . htmlentities($starray_entry->getOrt()) . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"../Controller/addData/AddData.php?";
                $output .= "id=".$starray_entry->getID();
                $output .= "&amp;uid=".$user->getID();
                $output .= "&amp;auswahl=addUserToStrecke&amp;option=delete\" ";
                $output .= "onclick=\"return (confirm('Möchten Sie diese Zuordnung wirklich löschen?'));\">";
                $output .= "<img src=\"images/delete2.png\" alt=\"löschen\" title=\"löschen\"></a></td>\n";
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
            $output .= "\t\t\t<td>" . htmlentities($earray_entry->getOrt()) . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"../Controller/addData/AddData.php?";
                $output .= "id=".$earray_entry->getID();
                $output .= "&amp;uid=".$user->getID();
                $output .= "&amp;auswahl=addUserToEinsatz&amp;option=delete\" ";
                $output .= "onclick=\"return (confirm('Möchten Sie diese Zuordnung wirklich löschen?'));\">";
                $output .= "<img src=\"images/delete2.png\" alt=\"löschen\" title=\"löschen\"></a></td>\n";
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
            $output .= "\t\t\t<td>" . htmlentities($uarray_entry->getOrt()) . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"../Controller/addData/AddData.php?";
                $output .= "id=".$uarray_entry->getID();
                $output .= "&amp;uid=".$user->getID();
                $output .= "&amp;auswahl=addUserToUebung&amp;option=delete\" ";
                $output .= "onclick=\"return (confirm('Möchten Sie diese Zuordnung wirklich löschen?'));\">";
                $output .= "<img src=\"images/delete2.png\" alt=\"löschen\" title=\"löschen\"></a></td>\n";
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
            $output .= "\t\t\t<td>" . htmlentities($uwarray_entry->getOrt()) . "</td>\n";
            if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                $output .= "\t\t\t<td><a href=\"../Controller/addData/AddData.php?";
                $output .= "id=".$uwarray_entry->getID();
                $output .= "&amp;uid=".$user->getID();
                $output .= "&amp;auswahl=addUserToUnterweisung&amp;option=delete\" ";
                $output .= "onclick=\"return (confirm('Möchten Sie diese Zuordnung wirklich löschen?'));\">";
                $output .= "<img src=\"images/delete2.png\" alt=\"löschen\" title=\"löschen\"></a></td>\n";
            }
            $output .= "\t\t</tr>\n";
        }
        return $output;
    }

    public static function getStreckeList() {
        $streckeliste = StreckeListe::getAll();
        $streckearray = $streckeliste->getStrecke_array();
        $output = "";
        foreach ($streckearray as $strecke) {
            $ID     = $strecke->getID();
            $datum  = $strecke->getDatum();
            $ort    = $strecke->getOrt();
            $output .= "<option value=\"".$ID."\">".$datum." ".$ort."</option>\n";
        }
        return $output;
    }

    public static function getEinsatzList() {
        $einsatzliste = EinsatzListe::getAll();
        $einsatzarray = $einsatzliste->getEinsatz_array();
        $output = "";
        foreach ($einsatzarray as $einsatz) {
            $ID     = $einsatz->getID();
            $datum  = $einsatz->getDatum();
            $ort    = $einsatz->getOrt();
            $output .= "<option value=\"".$ID."\">".$datum." ".$ort."</option>\n";
        }
        return $output;
    }

    public static function getUnterweisungList() {
        $unterweisungliste = UnterweisungListe::getAll();
        $unterweisungarray = $unterweisungliste->getUnterweisung_array();
        $output = "";
        foreach ($unterweisungarray as $unterweisung) {
            $ID     = $unterweisung->getID();
            $datum  = $unterweisung->getDatum();
            $ort    = $unterweisung->getOrt();
            $output .= "<option value=\"".$ID."\">".$datum." ".$ort."</option>\n";
        }
        return $output;
    }

    public static function getUebungList() {
        $uebungliste = UebungListe::getAll();
        $uebungarray = $uebungliste->getUebung_array();
        $output = "";
        foreach ($uebungarray as $uebung) {
            $ID     = $uebung->getID();
            $datum  = $uebung->getDatum();
            $ort    = $uebung->getOrt();
            $output .= "<option value=\"".$ID."\">".$datum." ".$ort."</option>\n";
        }
        return $output;
    }
}

?>
