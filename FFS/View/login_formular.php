<?php
    session_start ();
    include_once '../global.inc.php';
    require_once ''. PATH_BASIS . '/Configuration/ExceptionText.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
<div id="content">
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
        <div id="infobox"></div>
        <form action="../Controller/Authentification/login.php" method="post">
            <div id="login">
                <div id="pos">
                <h1>Login</h1>
                    <table border="0">
                        <tr class="input">
                            <td>E-Mail:</td>
                            <td><input type="text" name="Mail" class="input-field"></td>
                        </tr>
                        <tr class="input">
                            <td>Kennwort:</td>
                            <td><input type="password" name="Pwd" class="input-field"></td>
                        </tr>
                        <tr class="input">
                            <td></td>
                            <td><input type="submit" value="Login" id="login-button"></td>
                        </tr>
                    </table>
                    <p class="button">
                        
                    </p>
                    <p class="button">
                        <a href="JavaScript:register()">registrieren</a>
                        <a href="JavaScript:password()">Passwort vergessen</a>
                        <a href="../Trash/DBConnectionTest.php">user + password table (only for test)</a>
                    </p>
                </div>
            </div>
        </form>
        <!-- Ende Content -->
    <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
        src="http://www.w3.org/Icons/valid-html401"
        alt="Valid HTML 4.01 Transitional" height="31" width="88"></a>
    </p>
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>