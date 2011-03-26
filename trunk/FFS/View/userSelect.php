<?php
    include_once '../global.inc.php';
    require_once PATH_BASIS .'/Controller/Authentification/checkuser.php';
    require_once PATH_BASIS .'/Controller/Authentification/authorizationCheck.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');

    require_once(PATH_BASIS . '/Controller/UserSelect/UserSelectList.php'); // TODO pfui
?>
    <div id="content">
        <div><h1>Teilnehmer Auswahl</h1></div>
        
        <p>
          <?php
            $userSelectList = UserSelectList::getUserSelectList();
            echo $userSelectList;
          ?>
        </p>
    </div>

<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>
