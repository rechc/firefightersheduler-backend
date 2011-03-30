<?php
/*
 * Wird eingebunden um zu prüfen ob User eingeloggt ist
 */
    session_start ();
    if (!isset ($_SESSION["user_id"])){
      header ("Location: login_formular.php?pleaseLogin=1");
    }
?>