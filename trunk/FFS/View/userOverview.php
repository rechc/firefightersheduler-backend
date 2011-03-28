<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');

    require_once(PATH_BASIS . '/Controller/UserOverview/Userlist.php');
?>
    <div id="content">
        <?php
            if (isset($_REQUEST["userDeleted"])) {
                echo "Benutzer erfolgreich gelöscht!";
            }
        ?>
        <div><h1>Benutzerübersicht</h1></div>
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    $userlist = Userlist::getUserTable();
                    echo $userlist;
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-html401"
        alt="Valid HTML 4.01 Transitional" height="31" width="88"></a>
    </p>
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>

