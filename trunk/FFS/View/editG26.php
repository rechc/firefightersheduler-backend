<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS .'/Controller/Authentification/checkuser.php');
    require_once (PATH_BASIS . '/Controller/UserView/PersonalList.php');
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    require_once (PATH_BASIS . '/Model/G26.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <?php
            if (isset ($_REQUEST["uid"])) {
                $uid    = $_REQUEST["uid"];
            }
            // Abfrage welche Funktion
            if (isset ($_REQUEST["func"])) {
                $func = $_REQUEST["func"];
                if ($func == "edit" || $func == "new" || $func == "del") {
                    $function = $func;
                }
            } else {
                $function = "edit";
            }
            // verschiedene Funktionen
            // Start edit Funktion
            if ($function == "edit") {
                $g26 = G26::load_by_g26id($_GET["id"]);
                $id = $g26->getID();
                $uid = $g26->getUserID();
                if ($_POST["submit"] == "edit") {
                    $g26->setDatum($_POST["datum"]);
                    $g26->setGueltigBis($_POST["gueltigBis"]);
                    $g26->save();
                }
                $datum  = $g26->getDatum();
                $gueltig= $g26->getGueltigBis(); 
            }
            // Ende edit
            // Start new Funktion
            if ($function == "new") {
                if ($_POST["submit"] == "new") {
                    $g26 = new G26();
                    $g26->setUserID($_POST["uid"]);
                    $g26->setDatum($_POST["datum"]);
                    $g26->setGueltigBis($_POST["gueltigBis"]);
                    $g26->create_db_entry();
                    // $id = $g26->getID(); // geht nicht weil nach DB Insert keine ID gesetzt wird
                    $uid = $g26->getUserID();
                    $datum  = $g26->getDatum();
                    $gueltig= $g26->getGueltigBis();
                } else {
                    $id     = NULL;
                    $datum  = "JJJJ-MM-TT";
                    $gueltig= "JJJJ-MM-TT"; 
                } 
            }

            $user=User::get_user($uid);

        ?>
        <div><h1>
            <?php 
                if ($function == "edit") { 
                    echo "Ändern";
                } elseif ($function == "new") {
                    echo "Hinzufügen";
                } elseif ($function == "del") {
                    echo "Löschen";
                }
            ?>
        </h1></div>
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
                        <td><input type="hidden" name="id" value="<?php echo $g26id ?>">
                            <input type="hidden" name="uid" value="<?php echo $uid ?>">&nbsp;</td>
                        <td>
                            <?php
                                if ($function == "edit") {
                                    echo "<input type=\"submit\" name=\"submit\" value=\"edit\">\n";
                                } elseif ($function == "new") {
                                    echo "<input type=\"submit\" name=\"submit\" value=\"new\">\n";
                                }
                            ?>
                         &nbsp;</td>
                    </tr>
                </table>
            </div>
        </form>
        <div><h1>&Uuml;bersicht</h1></div>
        <?php
            if(SessionHelper::isAdminOrAGW())
                echo "<div align='right'><a href='editG26.php?uid=".$uid."&func=new'>hinzufügen<img alt='' src='images/add.gif' /></a></div>";
        ?>
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