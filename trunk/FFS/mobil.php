<?php
    session_start();
    include 'global.inc.php';
    include ('Controller/UserView/PersonalList.php');
    require_once ('Controller/UserView/PersonalList.php');
    $loggedIn = false;
    if(isset($_SESSION['user_id'])) {
        $uid = $_SESSION['user_id'];
        $loggedIn = true;
        $user=User::get_user($uid);
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript"> google.load("jquery", "1.3.2"); </script>
    <script src="jqtouch/jqtouch.min.js" type="application/x-javascript" charset="utf-8"></script>
    <style type="text/css" media="screen">@import "jqtouch/jqtouch.min.css";</style>
    <style type="text/css" media="screen">@import "themes/jqt/theme.min.css";</style>
    <script type="text/javascript">
        var JQT = $.jQTouch({
        icon: 'jqtouch.png',
        statusBar: 'black-translucent',
        preloadImages: [
            'themes/jqt/img/chevron_white.png',
            'themes/jqt/img/bg_row_select.gif',
            'themes/jqt/img/back_button_clicked.png',
            'themes/jqt/img/button_clicked.png'
            ]
    });
    </script>
  </head>
  <body>
      <div id="Home">
          <div class="toolbar">
            <h1>Home</h1>
          </div>
          <?php if ($loggedIn) { ?>
          <ul class="flip">
              <li class="arrow"><a href="#overview">Übersicht</a></li>
              <li class="forward"><a href="mobilLogoff.php">Abmelden</a></li>
          </ul>
          <?php } else { ?>
          <ul class="rounded">
              <li class="arrow"><a href="#Login">Anmelden</a></li>
          </ul>
          <?php } ?>
      </div>
      <?php if ($loggedIn) { ?>
      <div id="overview">
          <div class="toolbar">
            <a href="#Home" class="back">Home</a>
            <h1>overview</h1>
          </div>
          <h2>G26.3</h2>
          <ul class="individual">
              <li>bis</li>
              <li><?php echo $user->getG26Liste_object()->get_array_at(0)->getDatum() ?></li>
          </ul>
          <h2>Strecke</h2>
          <ul class="individual">
              <li>365 Tage ab</li>
              <li><?php echo $user->getStreckeListe_object()->get_array_at(0)->getDatum() ?></li>
          </ul>
          <h2>Übung</h2>
          <ul class="individual">
              <li>365 Tage ab</li>
              <li><?php echo $user->getUebungListe_object()->get_array_at(0)->getDatum() ?></li>
          </ul>
          <h2>Einsatz</h2>
          <ul class="individual">
              <li>365 Tage ab</li>
              <li><?php echo $user->getEinsatzListe_object()->get_array_at(0)->getDatum() ?></li>
          </ul>
          <h2>Unterweisung</h2>
          <ul class="individual">
              <li>365 Tage ab</li>
              <li><?php echo $user->getUnterweisungListe_object()->get_array_at(0)->getDatum() ?></li>
          </ul>
      </div>
      <?php } else { ?>
      <form id="Login" action="mobilLogin.php" method="POST" class="form">
          <div class="toolbar">
              <h1>Login</h1>
              <a class="back" href="#">Zurück</a>
          </div>
          <ul>
              <li><input type="text" name="email" value="" placeholder="Emailadresse"></li>
              <li><input type="password" name="passwd" value="" placeholder="Passwort"></li>
          </ul>
          <a style="margin:0 10px;color:rgba(0,0,0,.9)" href="mobilLogin.php" class="submit whiteButton">Absenden</a>
      </form>
      <?php } ?>
  </body>
</html>