<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    require_once PATH_BASIS .'/Controller/NewUser/NewUser.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
    <div id="content">
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <title>FFS Benutzer</title>
                <link rel="stylesheet" type="text/css" href="css/users.css" />
                <script type="text/javascript" src="../Controller/JavaScript/jsXMLHttpRequestHandle.js"></script>
                <script type="text/javascript" src="../Controller/JavaScript/jsUserManager.js"></script>
                <?php
               if (isset($_REQUEST["uid"])){
                        $uid = $_REQUEST["uid"];
                        $user=User::get_user($uid);
                        $lastname = $user->getName();
                        $firstname = $user->getVorname();
                        $email = $user->getEmail();
                        $bday = $user->getGebDat();
                        $password = $user->getPassword();
               }
                ?>
            </head>
            <body>
                <h1>Benutzer erstellen </h1>
                <div id="userdata">
                    <form id="editUser" action="../Controller/CreateUser.php" method="post">
<!--                        Benutzer-ID: <input type ="text" name="id" id="id" value="" readonly>-->
                        <table border="0">
                            <tr>
                                <div>
                                    <td>Name: </td>
                                    <td><input type ="text" name="lastname" id="lastname" value="<?php echo $lastname ?>"></td>
                                </div>
                                <div>
                                    <td>Vorname: </td>
                                    <td><input type ="text" name="firstname" id="firstname" value="<?php echo $firstname ?>"></td>
                                </div>
                            </tr>
                            <tr>
                                <div>
                                    <td>E-Mail: </td>
                                    <td><input type ="text" name ="email" id="email" value="<?php echo $email ?>"></td>
                                </div>
                                <div>
                                    <td>Geburtsdatum: </td>
                                    <td><input type ="text" name="bday" id="bday" value="<?php echo $bday ?>"></td>
                                </div>
                            </tr>
                            <tr>
                                <div>
                                    <td>Passwort: </td>
                                    <td><input type ="password" name ="password" id="user_password" value="<?php echo $password ?>"></td>
                                </div>
                            <div>
                                <td>Passwort bestätigen:
                                <td><input type ="password" name="password_confirm" id="password_confirm" value="<?php echo $password ?>"></td>
                            </div>
                            </tr>
                            <tr>
                                    <td> Geschlecht: </td>
                                    <td>
                                         männlich <input type="radio" value="maennlisch" name="Geschlecht" id="man">
                                         weiblich <input type="radio" value="weiblisch" name="Geschlecht" id="woman">
                                    </td>
                                <td>Rolle:</td>
                                <td>
                                    <?php
                                        echo NewUser::createRolleView();
                                    ?>
                                </td>
                            </tr>
                             <tr>
                                    <td>Atemschutzgeräteträger: </td>
                                    <td>
                                         ja <input type="radio" value="ja" name="AGT" id="AGTyes">
                                         nein <input type="radio" value="nein" name="AGT" id="AGTno">
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
                                        <input type="submit" value="hinzufügen" name="ok" id="ok">
<!--                                        <input type="button" value="löschen" name="delete" id="delete" onClick="document.location.href='javascript:sendDeleteUserRequest(document.getElementById(id))'">-->
                                        <input type ="reset" value="abbrechen" name="reset" id="reset" onClick="document.location.href='javascript:reset()'">
                                     </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </body>
        </html>
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
