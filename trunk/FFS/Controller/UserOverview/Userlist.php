<?php

require_once(PATH_BASIS . '/Model/AllUser.php');

/**
 * author christian 
 */
class Userlist {

    /**
     * Standard Konstruktor
     */
    public function __construct() {

    }

    public static function getUserTable() {

        $user_array = AllUser::get_userarray_for_manager_view();
        $output = "";

        foreach ($user_array as $user) {
            $output .= "<tr onClick=document.location.href='viewUser.php?uid=" . $user->getID() . "'>";
            $output .= Userlist::getUserData($user);
            $output .= "<td><a href='viewUser.php?uid=" . $user->getID() . "'><img alt='anschauen' src='images/view.gif' /></a>";
            $output .= "</tr>";
        }
        return $output;
    }

    public static function getUserData($user) {
        try {
            //dummy Daten
//                $G26 = "dummy";
//                $strecke = "dummy";
//                $uebung = "dummy";
//                $einsatz = "dummy";
//                $unterweisung = "dummy";
//                $vorname = "Vorname";
//                $nachname = "Nachname";

            $vorname = $user->getVorname();
            $nachname = $user->getName();

            // TODO hier prüfungen
            //g26
            $g26array = $user->getG26Liste_object()->get_array_at(0);
            if ($g26array != NULL) {
                $G26 = $g26array->getGueltigBis();
            } else {
                $G26 = "unbekannt";
            }

            //strecke
            $streckearray = $user->getStreckeListe_object()->get_array_at(0);
            if ($streckearray != NULL) {
                $strecke = $streckearray->getDatum();
            } else {
                $strecke = "unbekannt";
            }

            //uebung
            $uebungarray = $user->getUebungListe_object()->get_array_at(0);
            if ($uebungarray != NULL) {
                $uebung = $uebungarray->getDatum();
            } else {
                $uebung = "unbekannt";
            }

            //einsatz
            $einsatzarray = $user->getEinsatzListe_object()->get_array_at(0);
            if ($einsatzarray != false) {
                $einsatz = $einsatzarray->getDatum();
            } else {
                $einsatz = "unbekannt";
            }

            //unterweisung
            $unterweisungarray = $user->getUnterweisungListe_object()->get_array_at(0);
            if ($unterweisungarray != false) {
                $unterweisung = $unterweisungarray->getDatum();
            } else {
                $unterweisung = "unbekannt";
            }
        } catch (Exception $e) {
            echo 'Fehler bei Zugriff auf Liste';
        }

        $output = "";
        $output .= "\t\t\t<td ";
        if ($user->get_warning_status() == 0) {
            $output .= "class=\"fine\">";
        } elseif ($user->get_warning_status() == 1) {
            $output .= "class=\"attention\">";
        } elseif ($user->get_warning_status() == 2) {
            $output .= "class=\"noway\">";
        } else {
            $output .= "> ";
        }
        $output .= "&nbsp;</td>\n";
        $output .= "<td>" . $nachname . "</td>\n";
        $output .= "<td>" . $vorname . "</td>\n";
        $output .= "<td>" . $G26 . "</td>\n";
        $output .= "<td>" . $strecke . "</td>\n";
        $output .= "<td>" . $uebung . "</td>\n";
        $output .= "<td>" . $einsatz . "</td>\n";
        $output .= "<td>" . $unterweisung . "</td>\n";

        return $output;
    }

}

?>
