<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Model/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Model/Authentification/authorizationCheck.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1>Neuer Benutzer anlegen</h1></div>
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
