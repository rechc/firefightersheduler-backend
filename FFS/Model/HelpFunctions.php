<?php

/**
 * Description of HelpFunctions
 * Funktionen die niergends richtig passen aber benoetigt werden
 * @author awagen
 */
class HelpFunctions {

    /**
     * generate_string
     * generiert einen zufaelligen String mit angegebener Länge
     * @param <type> $length
     * @return string
     */
    public static function generate_string($length) {
        $pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $pool .= "abcdefghijklmnopqrstuvwxyz";
        $pool .= "1234567890";
        $pool .= "#+/!?";

        $password = "";
        for ($i = 0; $i < $length; $i++) {
            $password .= $pool{rand(0, strlen($pool) - 1)};
        }
        return $password;
    }

}

?>
