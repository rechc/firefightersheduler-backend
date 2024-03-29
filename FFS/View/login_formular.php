<?php
    session_start ();
    include_once '../global.inc.php';
    require_once ''. PATH_BASIS . '/Configuration/ExceptionText.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
<div id="content">
    <!-- Ausgabe von Loginrelevanten Fehlermeldungen -->
        <?php 
            if (isset($_REQUEST["fehler"])) {
                echo "Login fehlgeschlagen! ";
            }
            if (isset($_REQUEST["pleaseLogin"])){
                echo "bitte Melden Sie sich zuerst an";
            }
        ?>
        <div id="infobox"></div>
        <form action="../Controller/Authentification/login.php" method="post">
            <div id="login">
                <div id="pos">
                <h3>Login</h3>
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
                            <td>&nbsp</td>
                            <td><input type="submit" value="Login" id="login-button"></td>
                        </tr>
                    </table>
                    <p class="button">
                        
                    </p>
                    <p class="button">
                        <a href="JavaScript:register()">registrieren</a>
                        <a href="forgotPw.php">Passwort vergessen</a>
                    </p>
                </div>
            </div>
        </form>
        <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>