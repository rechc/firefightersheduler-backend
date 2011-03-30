<?php
    // Wird ausgeführt um mit der Ausgabe des Headers zu warten.
    ob_start ();
    session_start ();
    session_unset ();
    session_destroy ();
    ob_end_flush ();
    if(!isset($_SESSION['user_id'])) {
?>
        <div>
            <div class="toolbar">
                <h1>Abgemeldet</h1>
            </div>
            <ul class="rounded">
                <li class="forward">
                    <a href="mobil.php" rel="external">Weiter</a>
                </li>
            </ul>
        </div>
<?php } ?>