<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');

    require_once(PATH_BASIS . '/Controller/UserChecklist/UserChecklist.php');
?>
    <div id="content">
        <div><h1>Teilnehmer Auswahl</h1></div>
        
        <tbody>
        <form action="../View/userChecklist.php" method="post">
            <tr>
                <?php
                $userSelectList = UserChecklist::getUserSelectList();
                echo $userSelectList;
                ?>
                <td><input type="submit" value="hinzuf&uuml;gen"></td>
            </tr>
        </form>
    </div>

<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
