<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
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
            </head>
            <body>
                <h1>Benutzer erstellen </h1>
                <div id="userdata">
                    <form id="editUser" action="../Controller/createUser.php" method="post">
<!--                        Benutzer-ID: <input type ="text" name="id" id="id" value="" readonly>-->
                        <table border="0">
                            <tr>
                                <div>
                                    <td>Name: </td>
                                    <td><input type ="text" name="lastname" id="lastname" value=""></td>
                                </div>
                                <div>
                                    <td>Vorname: </td>
                                    <td><input type ="text" name="firstname" id="firstname" value=""></td>
                                </div>
                            </tr>
                            <tr>
                                <div>
                                    <td>E-Mail: </td>
                                    <td><input type ="text" name ="email" id="email"></td>
                                </div>
                                <div>
                                    <td>Geburtsdatum: </td>
                                    <td><input type ="text" name="bday" id="bday"></td>
                                </div>
                            </tr>
                            <tr>
                                <div>
                                    <td>Passwort: </td>
                                    <td><input type ="password" name ="password" id="user_password"></td>
                                </div>
                            <div>
                                <td>Passwort bestätigen:
                                <td><input type ="password" name="password_confirm" id="password_confirm"></td>
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
                                    <select name="rolle" id="rolle">
                                        <option value="agw">normal (10)</option>
                                        <option value="agw">AGW (40)</option>
                                        <option value="admin">Administrator (50)</option>
                                    </select>
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
                        <div name="infobox" id ="infobox"></div>
                    </form>
                </div>
            </body>
        </html>
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
