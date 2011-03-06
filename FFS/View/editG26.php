<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Controller/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Controller/UserView/PersonalList.php');
    require_once (PATH_BASIS . '/Model/G26.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <?php
            $uid = $_REQUEST["uid"];            
            $g26id  = $_GET["id"];
            $g26    = G26::load_by_g26id($g26id);
            if (isset($_POST["aendern"])) {
                $g26->setDatum($_POST["datum"]);
                $g26->setGueltigBis($_POST["gueltigBis"]);
                $g26->save();
                $datum  = $g26->getDatum();
                $gueltig= $g26->getGueltigBis();
            } elseif (isset($_POST["neu"])) {
                $g26 = new G26();
                $g26->setUserID($uid);
                $g26->setDatum($_POST["datum"]);
                $g26->setGueltigBis($_POST["gueltigBis"]);
                $g26->create_db_entry();
                $datum  = $g26->getDatum();
                $gueltig= $g26->getGueltigBis();     
            } else {
                $datum  = $g26->getDatum();
                $gueltig= $g26->getGueltigBis();
            }
            $user=User::get_user($uid);

        ?>
        <div><h1>Erfasste Untersuchung ändern</h1></div>
        <form action="" method="post">
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
                        <td><input type="submit" name="aendern" value="Änderungen speichern">&nbsp;
                            <input type="submit" name="neu" value="Neuer Datensatz"></td>
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
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>