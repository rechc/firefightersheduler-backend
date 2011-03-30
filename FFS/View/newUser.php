<?php
include_once '../global.inc.php';
require_once PATH_BASIS . '/Controller/Authentification/checkuser.php';
require_once PATH_BASIS . '/Controller/Authentification/authorizationCheck.php';
require_once PATH_BASIS . '/Controller/NewUser/NewUser.php';
include (PATH_BASIS . '/View/Layout/header.inc.php');
include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
<div id="content">
    <?php
    $email = "@ff-riegelsberg.de";
    $bday = "1900-12-31";
    if (isset($_REQUEST["uid"])) {
        $uid = $_REQUEST["uid"];
        $user = User::get_user($uid);
        $lastname = $user->getName();
        $firstname = $user->getVorname();
        $email = $user->getEmail();
        $bday = $user->getGebDat();
        $password = $user->getPassword();
    }
    ?>

    <h1>Benutzer erstellen </h1>
    <div id="userdata">
        <form id="editUser" name="sendform" action="../Controller/CreateUser.php" method="post">
<!--                        Benutzer-ID: <input type ="text" name="id" id="id" value="" readonly>-->
            <table border="0">
                <tr>
                    <td>Name: </td>
                    <td><input type ="text" name="lastname" id="lastname" value="<?php echo $lastname ?>"></td>

                    <td>Vorname: </td>
                    <td><input type ="text" name="firstname" id="firstname" value="<?php echo $firstname ?>">
                </tr>
                <tr>
                    <td>E-Mail: </td>
                    <td><input type ="text" name ="email" id="email" value="<?php echo $email ?>"></td>

                    <td>Geburtsdatum: </td>
                    <td><input type ="text" name="bday" id="bday" value="<?php echo $bday ?>"></td>
                </tr>
                <tr>
                    <td>Passwort: </td>
                    <td><input type ="password" name ="password" id="user_password" value="<?php echo $password ?>"></td>

                    <td>Passwort bestätigen:
                    <td><input type ="password" name="password_confirm" id="password_confirm" value="<?php echo $password ?>"></td>
                </tr>
                <tr>
                    <td> UID: </td>
                    <td><input style="background-color:lightgray;" type ='text' readonly name ='uid' id='rolle' value='<?php echo $uid ?>'></td>
                    <td>Rolle:</td>
                    <td>
                        <?php
                        echo NewUser::createRolleView();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Atemschutzgeräteträger: </td>
                    <td><select name="AGT" id="AGT">
                            <option value='1'>ja</option>
                            <option value='0'>nein</option>
                        </select>
                    </td>
                    <td>Löschbezirk:</td>
                    <td>
                        <?php
                        echo NewUser::createLBZView();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <div>
                            <?php
                            if (isset($_REQUEST["uid"])) {
                                echo "<input type='submit' value='ändern' name='ok' id='ok'>";
                            } else {
                                echo "<input type='submit' value='hinzufügen' name='ok' id='ok'>";
                            }
                            ?>
                            <input type="button" value="checkform" name="delete" id="checkform" onclick="javascript: checkdata();">
                            <input type ="reset" value="abbrechen" name="reset" id="reset" onClick="document.location.href='userOverview.php'">
                        </div>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
