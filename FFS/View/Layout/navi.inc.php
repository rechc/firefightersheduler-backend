    <?php 
    include_once PATH_BASIS . '/Controller/SessionHelper.php';
    ?>
    <div id="buttonbar">
        <ul>
    <?php
    if(SessionHelper::isLoggedIn()){
        ?>
        <li><a href="viewUser.php">Meine Daten</a></li>
        <?php
          if(SessionHelper::isAdminOrAGW()){
            echo "<li><a href=\"userOverview.php\">Benutzerübersicht</a></li>";
            echo "<li><a href=\"addData.php\">Daten hinzuf&uuml;gen</a></li>";
          }
          echo "<li class=\"right\"><a href=\"../Controller/Authentification/logout.php\">Logout</a></li>";
    }
    ?>
        </ul>
    </div>