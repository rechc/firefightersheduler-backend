<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');

    require_once(PATH_BASIS . '/Controller/addData/UserChecklist.php');
?>
    <div id="content">
        <div><h3>Daten hinzuf&uuml;gen</h3></div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Art</th>
                            <th>Datum</th>
                            <th>Ort</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot></tfoot>
                    <tbody>
                        <form action="../Controller/addData/CreateData.php" method="post">
                            <tr>
                                <td><select name="auswahl">
                                        <option value="Einsatz">Einsatz</option>
                                        <option value="Uebung">Einsatz&uuml;bung</option>
                                        <option value="Strecke">Belastungstrecke</option>
                                        <option value="Unterweisung">Unterweisung</option>
                                    </select>
                                </td>
                                <td><input onchange="dateCheck('datum')" type="text" name="datum" id="datum"></td>
                                <td><input type="text" name="ort"></td>
                                <td><input type="submit" value="hinzuf&uuml;gen"></td>
                            </tr>
                            <tr>
                                <td colspan=4>
                                    Wählen Sie hier die Teilnehmer:
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4>
                                    <?php
                                    $userSelectList = UserChecklist::getUserSelectList();
                                    echo $userSelectList;
                                    ?>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>

    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>