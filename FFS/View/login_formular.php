<?php
    session_start ();
    include_once '../global.inc.php';
    require_once ''. PATH_BASIS . '/Configuration/ExceptionText.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
<html>
    <head>
        <title>Login</title>
<!--        <link rel="stylesheet" type="text/css" href="./css/login_style.css" />-->
        <script type="text/javascript" src="../Controller/JavaScript/jsLogin.js"></script>
    </head>
    <body>
        <?php //Ausnahme ;-)
            if (isset($_REQUEST["fehler"])) {
                echo "Login fehlgeschlagen! ";
                echo PATH_BASIS;
//                echo Exception::bad_user_login();
            }
            if (isset($_REQUEST["pleaseLogin"])){
                echo "bitte Melden Sie sich zuerst an";
            }
        ?>
        <div name="infobox" id ="infobox"></div>
        <form action="../Controller/Authentification/login.php" method="post">
            <div id="login">
                <div id="pos">
                <h1>Login</h1>
                    <table border="0">
                        <tr class="input">
                            <td>E-Mail:</td>
                            <td><input type="text" name="Mail" class="input-field"></td>
                            <td><a href="JavaScript:register()">registrieren</a></td>
                        </tr>
                        <tr class="input">
                            <td>Kennwort:</td>
                            <td><input type="password" name="Pwd" class="input-field"></td>
                            <td><a href="JavaScript:password()">Passwort vergessen</a></td>
                        </tr>
                    </table>
                    <p class="button">
                        <input type="submit" value="Login" id="login-button">
                    </p>
                    <p class="button">
                        <a href="../Trash/DBConnectionTest.php">user + password table (only for test)</a>
                    </p>
                </div>
            </div>
        </form>
    </body>  
</html>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>