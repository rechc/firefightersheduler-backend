<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Model/Authentification/checkuser.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1>Daten hinzuf&uuml;gen</h1></div>        
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
                        <form action="../Model/Data/addData.php" method="post">
                        <tr>
                            <td><select name="auswahl">
                                    <option value="Einsatz">Einsatz</option>
                                    <option value="Uebung">Einsatz&uuml;bung</option>
                                    <option value="Strecke">Belastungstrecke</option>
                                    <option value="Unterweisung">Unterweisung</option>
                                </select>
                            </td>
                            <td><input type="text" name="datum" value="<?php echo $datum ?>"></td>
                            <td><input type="text" name="ort" value="<?php echo $datum ?>"></td>
                            <td><input type="submit" value="hinzuf&uuml;gen"></td>
                        </tr>
                        </form>
                    </tbody>
                </table>
            </div>

    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>