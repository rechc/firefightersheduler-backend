<?php include ('Layout/header.inc.php') ?>
<?php include ('Layout/navi.inc.php') ?>
    <div id="content">
        <div><h1>User&uuml;bersicht</h1></div>
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
                    require_once('../Model/UserOverview/Userlist.php');
                    $userlist = Userlist::getUserTable();
                ?>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include ('Layout/footer.inc.php') ?>

