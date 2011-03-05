<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Model/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Model/UserView/PersonalList.php');
    require_once (PATH_BASIS . '/Model/G26.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <div><h1>G26 Untersuchung von uid.name bearbeiten <?php echo $_GET["id"]; ?></h1></div>
        <?php
            if (isset($_REQUEST["uid"]))
                        $uid = $_REQUEST["uid"];
                    else
                        $uid = $_SESSION["user_id"];
            $user=User::get_user($uid);
            $g26    = G26::load_by_g26id($_GET["id"]);
            $datum  = $g26->getDatum();
            $gueltig= $g26->getGueltigBis();
        ?>
        <form action="../Model/Authentification/Authorization/login.php" method="post">
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
                        <td><input type="submit" value="Speichern"></td>
                        <td><a href="javascript:history.back();">Zur&uuml;ck</a></td>
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
        
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>