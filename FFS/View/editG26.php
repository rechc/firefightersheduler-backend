<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Model/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Model/UserView/PersonalList.php');
    require_once (PATH_BASIS . '/Model/G26.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <?php
            if (isset($_REQUEST["uid"]))
                        $uid = $_REQUEST["uid"];
                    else
                        $uid = $_SESSION["user_id"];
            $user=User::get_user($uid);
            $g26id  = $_GET["id"];
            $g26    = G26::load_by_g26id($g26id);
            $datum  = $g26->getDatum();
            $gueltig= $g26->getGueltigBis();
        ?>
        <div><h1>Erfasste Untersuchung ändern</h1></div>
        <form action="../Model/Authentification/login.php" method="post">
            <div>
                <table>
                    <tr>
                        <td>Datum:</td>
                        <td><input type="text" name="datum" value="<?php echo $datum ?>"></td>
                    </tr>
                    <tr>
                        <td>G&uuml;ltig bis:</td>
                        <td><input type="text" name="gueltigBis" value="<?php echo $gueltig ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="id" value="<?php echo $g26id ?>">&nbsp;</td>
                        <td><input type="submit" value="Änderungen speichern"></td>
                    </tr>
                </table>
            </div>
        </form>
        <div><h1>&Uuml;bersicht</h1></div>
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
                    echo PersonalList::getG26Table($user);
                ?>
            </tbody>
        </table>
        <br /><hr>
        <div><h1>neue Untersuchung erfassen</h1></div>
        <form action="../Model/Authentification/login.php" method="post">
            <div>
                <table>
                    <tr>
                        <td>Datum:</td>
                        <td><input type="text" name="datum"></td>
                    </tr>
                    <tr>
                        <td>G&uuml;ltig bis:</td>
                        <td><input type="text" name="gueltigBis"></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="Untersuchung erfassen"></td>
                    </tr>
                </table>
            </div>
        </form>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>