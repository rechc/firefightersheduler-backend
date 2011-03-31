<?php
    include_once '../global.inc.php';
    require_once (PATH_BASIS . '/Model/User.php');
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
    require_once (PATH_BASIS . '/Controller/SessionHelper.php');
?>
    <div id="content">
    <!-- Start Content -->
    <?php
        if (isset ($_REQUEST["requestmail"])) {
                $email    = $_REQUEST["requestmail"];
                User::generate_and_send_new_password($email);
                echo "Passwort wurde zugesandt";
                ?>
                <br><a href="login_formular.php"><b>&gt;&gt; Hier gehts zur Anmeldung &lt;&lt;</b></a>
    <?php
        }
    ?>
    <form action="#" method="post">
        <div id="login">
            <div id="pos">
            <h3>Passwort vergessen</h3>
                <table border="0">
                    <tr class="input">
                        <td>E-Mail:</td>
                        <td><input type="text" name="requestmail" class="input-field"></td>
                    </tr>
                    <tr class="input">
                        <td>&nbsp</td>
                        <td><input type="submit" value="Passwort anfordern" id="login-button"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
    <!-- Ende Content -->
    </div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
