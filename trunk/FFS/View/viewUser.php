<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Model/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Model/UserView/PersonalList.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
    require_once (PATH_BASIS . '/Controller/SessionHelper.php');
?>
<head>
    <script type="text/javascript" src="../Model/JavaScript/jsDeleteUser.js"></script>;
</head>
    <div id="content">
        <div><h1>
                <?php
                    if (isset($_REQUEST["uid"]))
                        $uid = $_REQUEST["uid"];
                    else
                        $uid = $_SESSION["user_id"];
                    $user=User::get_user($uid);
                    echo $user->getVorname()." ".$user->getName();
                ?>
             </h1></div>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='JavaScript:getMessage()'>Benutzer löschen<img alt='' src='images/delete.gif' width='16' high='16' /></a></div>";
        ?>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th>Name</th>
                    <th>Vorname</th>
                    <th>G.26</th>
                    <th>Strecke</th>
                    <th>&Uuml;bung</th>
                    <th>Einsatz</th>
                    <th>Unterweisung</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUserData($user);
                ?>
            </tbody>
        </table>
        <div><br><h1>Stammdaten</h1>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='addData.php'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Geb.Dat.</th>
                    <th>Email</th>
                    <th>LBZ</th>
                    <th>AGT</th>
                    <th>Rolle</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <?php
                        echo PersonalList::getStammDaten($user);
                    ?>
                </tr>
            </tbody>
        </table>
        <div><br><h1>G26.3 Untersuchungen</h1></div>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='editG26.php'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>G&uuml;ltig bis</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>\n";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getG26Table($user);
                ?>
            </tbody>
        </table>
        <div><br><h1>&Uuml;bungsstrecken</h1>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='addData.php'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getStreckeTable($user);
                ?>
            </tbody>
        </table>
        <div><br><h1>Eins&auml;tze</h1>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='addData.php'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getEinsatzTable($user);
                ?>
            </tbody>
        </table>
        <div><br><h1>Einsatz&uuml;bungen</h1>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='addData.php'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUebungTable($user);
                ?>
            </tbody>
        </table>
        <div><br><h1>Unterweisungen</h1>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='addData.php'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
        </div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_rolle"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUnterweisungTable($user);
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>