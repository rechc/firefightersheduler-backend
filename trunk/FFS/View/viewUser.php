<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Model/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Model/UserView/PersonalList.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1>Ansicht - Tobias Lana</h1></div>
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
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUserData();
                ?>
            </tbody>
        </table>
        <div><h1>G26.3 Untersuchungen</h1></div>
        <table>
            <thead>
                <tr>
                    <th>Untersuchung am</th>
                    <th>G&uuml;ltig bis</th>
                    <th>Bemerkungen</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <td>01.01.2009</td>
                    <td>01.01.2012</td>
                    <td>Sehhilfe</td>
                </tr>
                <tr>
                    <td>01.01.2006</td>
                    <td class="noway">01.01.2009</td>
                    <td>Sehhilfe</td>
                </tr>
                <tr>
                    <td>01.01.2003</td>
                    <td class="noway">01.01.2006</td>
                    <td>- keine -</td>
                </tr>
            </tbody>
        </table>
        <div><h1>&Uuml;bungsstrecken</h1></div>
        <table>
            <thead>
                <tr>
                    <th width="50px">Status</th>
                    <th width="150px">Datum</th>
                    <th>Ort</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getStreckeTable();
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
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getEinsatzTable();
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
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUebungTable();
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
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <?php
                    echo PersonalList::getUnterweisungTable();
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>