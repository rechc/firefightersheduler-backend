<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Model/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Model/UserView/PersonalList.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1 style="background-color: red">Tobias Lana [[AUTOFILL]]</h1></div>
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
                    if (isset($_REQUEST["uid"]))
                        $uid = $_REQUEST["uid"];
                    else
                        $uid = $_SESSION["user_id"];
                    
                    echo PersonalList::getUserData($uid);
                ?>
            </tbody>
        </table>
        <div><h1>Stammdaten</h1></div>
        <table>
            <thead>
                <tr>
                    <th>Geb.Dat.</th>
                    <th>Email</th>
                    <th>LBZ</th>
                    <th>AGT</th>
                    <th>Lehrgang</th>
                    <th>Rolle</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_id"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr style="background-color: red">
                    <?php
                        echo PersonalList::getStammDaten();
                    ?>
                 <!---   <td>29.10.1981</td>
                    <td><a href="mailto:t.lana@ff-riegelsberg.de">t.lana@ff-riegelsberg.de</a></td>
                    <td>LB 1</td>
                    <td>Ja</td>
                    <td>01.01.2000</td>
                    <td>Admin</td>  --->
                </tr>
            </tbody>
        </table>
        <div><h1>G26.3 Untersuchungen</h1></div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>G&uuml;ltig bis</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_id"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>\n";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getG26Table($_SESSION["user_id"]);
                ?>
            </tbody>
        </table>
        <div><h1>&Uuml;bungsstrecken</h1></div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_id"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getStreckeTable($_SESSION["user_id"]);
                ?>
            </tbody>
        </table>
        <div><h1>Eins&auml;tze</h1></div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_id"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getEinsatzTable($_SESSION["user_id"]);
                ?>
            </tbody>
        </table>
        <div><h1>Einsatz&uuml;bungen</h1></div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_id"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUebungTable($_SESSION["user_id"]);
                ?>
            </tbody>
        </table>
        <div><h1>Unterweisungen</h1></div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                    <?php
                        if ($_SESSION["user_rolle"] == 40 | $_SESSION["user_id"] == 50) {
                            echo "<th class=\"manage\">&nbsp;</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUnterweisungTable($_SESSION["user_id"]);
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>