<?php
    session_start ();
    if (!isset ($_SESSION["user_id"])){
      header ("Location: login_formular.php?pleaseLogin=1");
    }
?>