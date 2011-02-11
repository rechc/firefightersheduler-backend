<?php

require_once('../Configuration/ExceptionText.php');
require_once('../Configuration/Config.php');
require_once('G26.php');
require_once('FFSException.php');

/**
 * Description of G26Liste
 * realisiert die 1 zu n Beziehung zwischen User und G26
 *
 * @author Warken Andreas
 * @version Version 1.0
 */
class G26Liste {

    public $g26_array;

    /**
     * Standard Konstruktor
     * mit Initialisierung
     */
    public function __construct() {
        $this->g26_array = new ArrayObject();
    }

    /**
     * load
     * laed zu der Uebergebenen UserID alle G26en
     * und fuegt sie dem g26_array hinzu.
     *
     * @param <type> $UserID Die UserID des Datenbankeintrags
     * @return G26Liste
     */
    public static function load($UserID) {
        if (is_numeric($UserID)) {
            $sql = "SELECT * FROM g26
            WHERE userID = '$UserID'
            ORDER BY gueltigBis DESC;";

            $dbConnector = DbConnector::getInstance();
            $result = $dbConnector->execute_sql($sql);

            if (mysql_num_rows($result) > 0) {// wenn mehr als 0 eintraege
                $g26liste = new G26Liste;

                while ($row = mysql_fetch_array($result)) { //sequentielles durchgehen der zeilen
                    $g26liste->append_g26(
                            G26::parse_result_as_objekt($row));
                }
                return $g26liste;
            } else {
                throw new FFSException(ExceptionText::g26Liste_no_g26());
            }
        } else {
            throw new FFSException(ExceptionText::user_ID_not_numeric());
        }
    }

    /**
     * get_array_at
     * liefert den Eintrag an der uebergebenen Index-stelle
     *
     * @param <type> $index Stelle im Array
     * @return <type> Objekt
     */
    public function get_array_at($index) {
        if (!empty ($this->g26_array[$index]))
            return $this->g26_array[$index];
        else
            return "unbekannt";
    }

    /**
     * append_g26
     * fuegt eine G26 dem Array hinzu
     *
     * @param <type> $g26
     */
    public function append_g26($g26) {
        if (is_a($g26, "G26")) {
            $this->g26_array->append($g26);
        } else {
            throw new FFSException(ExceptionText::g26Liste_not_g26());
        }
    }

    /**
     * get_warning_status
     * liefert den Warnungsstatus des neusten G26objektes
     * (geht von einer sortierten Liste aus)
     */
    public function get_warning_status() {
        if (is_a($this->g26_array[0], "G26")) {
            return $this->g26_array[0]->get_warning_status();
        } else {
            return Config::red();
        }
    }


    public function getG26_array() {
        return $this->g26_array;
    }

}

?>
