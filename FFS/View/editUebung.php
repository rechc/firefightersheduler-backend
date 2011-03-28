<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Controller/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Controller/UserView/PersonalList.php');
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
        ?>
        <div><h1><?php echo $user->getVorname()." ".$user->getName() ?> zu Einsatzübung hinzuf&uuml;gen</h1></div>
        <form action="../Controller/addData/AddData.php" method="post">
            <div>
                <table>
                    <tr>
                        <td><select name="id" size="1">
                                <?php echo PersonalList::getUebungList() ?>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="auswahl" value="addUserToUebung">
                            <input type="hidden" name="uid" value="<?php echo $uid; ?>">
                            <input type="submit" value="hinzuf&uuml;gen"></td>
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
<!--            <tfoot></tfoot>-->
            <tbody>
                <?php
                    echo PersonalList::getUebungTable($user);
                ?>
            </tbody>
        </table>

    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>