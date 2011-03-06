<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
<div><h1>Fehler</h1></div>
<div>Sie sind nicht berechtigt diese Seite anzuzeigen</div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
