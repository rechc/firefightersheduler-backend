<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
    require_once(PATH_BASIS . '/Controller/UserOverview/Userlist.php');
?>
<!--
    userOverView.php bietet dem AGW und dem Admin eine Übersicht über alle Nutzer
-->
    <div id="content">
        <?php
            if (isset($_REQUEST["userDeleted"])) {
                echo "Benutzer erfolgreich gelöscht!";
            } else if(isset($_REQUEST["created"])){
                echo "Benutzer wurde erfolgreich erstellt/geändert";
            }
        ?>
        <div><h3>Benutzerübersicht</h3></div>
        <div align="right"><a href="newUser.php">neuer Benutzer<img alt="hinzuf&uuml;gen" src="images/add.gif"></a></div>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>G.26</th>
                    <th>Strecke</th>
                    <th>&Uuml;bung</th>
                    <th>Einsatz</th>
                    <th>Unterweisung</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <!-- getUserTable liefert die Tabelle mit allen Usern -->
                <?php
                    $userlist = Userlist::getUserTable();
                    echo $userlist;
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>

