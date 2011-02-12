<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Model/Authentification/checkuser.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1>Userübersicht</h1></div>
        <div align="right">neuer Benutzer<img alt="hinzuf&uuml;gen" src="images/add.gif" /></div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>Status</th>
                    <th>G.26</th>
                    <th>Strecke</th>
                    <th>&Uuml;bung</th>
                    <th>Einsatz</th>
                    <th>Unterweisung</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    require_once(PATH_BASIS . '/Model/UserOverview/Userlist.php');
                    $userlist = Userlist::getUserTable();
                    echo $userlist;
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>

