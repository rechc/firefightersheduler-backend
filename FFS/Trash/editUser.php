<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Model/Authentification/checkuser.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1>Ansicht - Tobias Lana</h1></div>
        <div align="right">speichern<img alt="hinzuf&uuml;gen" src="images/add.gif" />
                            | zurück<img alt="hinzuf&uuml;gen" src="images/add.gif" /></div>
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
                <tr>
                    <td>Lana</td>
                    <td>Tobias</td>
                    <td><img alt="einsatzbereit" src="images/icon-ampel-gruen.gif" /></td>
                    <td>01.11.2011</td>
                    <td>31.12.2010</td>
                    <td>31.11.2010</td>
                    <td>31.10.2010</td>
                    <td>31.10.2010</td>
                </tr>
            </tbody>
        </table>
        <div><h1>G26.3 Untersuchungen</h1></div>
        <div align="right">Datensatz hinzuf&uuml;gen <img alt="hinzuf&uuml;gen" src="images/add.gif" /></div>
        <table>
            <thead>
                <tr>
                    <th>Untersuchung am</th>
                    <th>G&uuml;ltig bis</th>
                    <th>Bemerkungen</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <td>01.01.2009</td>
                    <td>01.01.2012</td>
                    <td>Sehhilfe</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2006</td>
                    <td class="noway">01.01.2009</td>
                    <td>Sehhilfe</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2003</td>
                    <td class="noway">01.01.2006</td>
                    <td>- keine -</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
            </tbody>
        </table>
        <div><h1>&Uuml;bungsstrecken</h1></div>
        <div align="right">Datensatz hinzuf&uuml;gen <img alt="hinzuf&uuml;gen" src="images/add.gif" /></div>
        <table>
            <thead>
                <tr>
                    <th>Strecke am</th>
                    <th>G&uuml;ltig bis</th>
                    <th>Bemerkungen</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <td>01.01.2011</td>
                    <td>01.01.2012</td>
                    <td>- keine -</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2010</td>
                    <td class="noway">01.01.2011</td>
                    <td>- keine -</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2009</td>
                    <td class="noway">01.01.2010</td>
                    <td>- keine -</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
            </tbody>
        </table>
        <div><h1>Eins&auml;tze und Einsatz&uuml;bungen</h1></div>
        <div align="right">Datensatz hinzuf&uuml;gen <img alt="hinzuf&uuml;gen" src="images/add.gif" /></div>
        <table>
            <thead>
                <tr>
                    <th>Am</th>
                    <th>Einsatz/&Uuml;bung</th>
                    <th>G&uuml;ltig bis</th>
                    <th>Bemerkungen</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <td>01.01.2011</td>
                    <td>Einsatz</td>
                    <td>01.01.2012</td>
                    <td>Zimmerbrand, Alleestra&szlig;e</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2010</td>
                    <td>U&uml;bung</td>
                    <td class="noway">01.01.2011</td>
                    <td>Riegelsberghalle</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2009</td>
                    <td>U&uml;bung</td>
                    <td class="noway">01.01.2010</td>
                    <td>Alleestraße</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
            </tbody>
        </table>
        <div><h1>Unterweisungen</h1></div>
        <div align="right">Datensatz hinzuf&uuml;gen <img alt="hinzuf&uuml;gen" src="images/add.gif" /></div>
        <table>
            <thead>
                <tr>
                    <th>Unterweisung am</th>
                    <th>G&uuml;ltig bis</th>
                    <th>Bemerkungen</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tfoot></tfoot>
            <tbody>
                <tr>
                    <td>01.01.2011</td>
                    <td>01.01.2012</td>
                    <td>Dienst FwDV 7</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2010</td>
                    <td class="noway">01.01.2011</td>
                    <td>nach Strecke</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
                <tr>
                    <td>01.01.2009</td>
                    <td class="noway">01.01.2010</td>
                    <td>Dienst FwDV 7</td>
                    <td><img alt="bearbeiten" src="images/edit.png" /></td>
                </tr>
            </tbody>
        </table>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>