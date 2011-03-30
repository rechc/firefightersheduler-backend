<?php
    session_start ();
    session_unset ();
    session_destroy ();
    session_start ();

    include 'global.inc.php';
    include 'Model/User.php';
    try {
        $currentuser = User::get_user_by_login($_REQUEST["email"], $_REQUEST["passwd"]);
        $uid = $currentuser->getID();
    } catch (FFSException $exc) {
        ?>
        <div>
            <div class="toolbar">
            <h1>Fehler</h1>
        </div>
        <ul class="rounded">
            <li class="info">Fehler</li>
            <li class="forward">
                <a href="mobil.php#Login" rel="external">Erneut versuchen</a>
            </li>
        </ul>
        </div>
        <?php
    }
?>
<div>
    <?php
        if ($currentuser != NULL){
            $_SESSION["user_id"] = $currentuser->getID();
        }
    ?>
    <div class="toolbar">
        <h1>Willkommen</h1>
    </div>
    <ul class="rounded">
        <li><?php echo $currentuser->getVorname()." ".$currentuser->getName() ?></li>
        <li class="forward">
            <a href="mobil.php" rel="external">Weiter</a>
        </li>
    </ul>
</div>

