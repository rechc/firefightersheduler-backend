<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Controller/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Controller/UserView/PersonalList.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
    require_once (PATH_BASIS . '/Controller/SessionHelper.php');
?>
    <div id="content">
        <div><h3>
                <?php
                    if (isset($_REQUEST["uid"]))
                        $uid = $_REQUEST["uid"];
                    else
                        $uid = $_SESSION["user_id"];
                    $user=User::get_user($uid);
                    echo $user->getVorname()." ".$user->getName();
                ?>
             </h3></div>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='../Controller/DeleteUser.php?uid=". $uid ."' onclick=\"return (confirm('Möchten Sie den Benutzer wirklich löschen?'));\">Benutzer löschen<img alt='' src='images/delete.gif' width='16' height='16'></a></div>";
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
<!--            <tfoot>&nbsp;</tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getUserData($user);
                ?>
            </tbody>
        </table>
        <div><br><h3>Stammdaten</h3></div>
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <tr>
                    <?php
                        echo PersonalList::getStammDaten($user);
                    ?>
                </tr>
            </tbody>
        </table>
        <div><br><h3>G26.3 Untersuchungen</h3></div>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='editG26.php?uid=".$uid."&amp;func=new'>neue G26.3 hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getG26Table($user);
                ?>
            </tbody>
        </table>
        <div><br><h3>&Uuml;bungsstrecken</h3>
        <?php
            if(SessionHelper::isAdminOrAGW()) {
                echo "<div align='right'><a href='addData.php'>neue Strecke hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
                echo "<div align='right'><a href='editStrecke.php?uid=".$uid."'>zu vorhandener Strecke hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
            }
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getStreckeTable($user);
                ?>
            </tbody>
        </table>
        <div><br><h3>Eins&auml;tze</h3>
        <?php
            if(SessionHelper::isAdminOrAGW()) {
                echo "<div align='right'><a href='addData.php'>neuen Einsatz hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
                echo "<div align='right'><a href='editEinsatz.php?uid=".$uid."'>zu vorhandenem Einsatz hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
            }
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getEinsatzTable($user);
                ?>
            </tbody>
        </table>
        <div><br><h3>Einsatz&uuml;bungen</h3>
        <?php
            if(SessionHelper::isAdminOrAGW()) {
                echo "<div align='right'><a href='addData.php'>neue Übung hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
                echo "<div align='right'><a href='editUebung.php?uid=".$uid."'>zu vorhandener Übung hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
            }?>
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getUebungTable($user);
                ?>
            </tbody>
        </table>
        <div><br><h3>Unterweisungen</h3>
        <?php
            if(SessionHelper::isAdminOrAGW()) {
                echo "<div align='right'><a href='addData.php'>neue Unterweisung hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
                echo "<div align='right'><a href='editUnterweisung.php?uid=".$uid."'>zu vorhandener Unterweisung hinzufügen<img alt='neu' src='images/add.gif'></a></div>";
            }
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getUnterweisungTable($user);
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>