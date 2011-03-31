<?php
    session_start ();
    include_once '../global.inc.php';
    require_once ''. PATH_BASIS . '/Configuration/ExceptionText.php';
    include (PATH_BASIS . '/View/Layout/header.inc.php');
    include (PATH_BASIS . '/View/Layout/navi.inc.php');
?>
<div id="content">
Das Produkt 'FireFighterScheduler' entstand im Wintersemester 2010/2011 im Rahmen
der Veranstaltung 'Internettechnologien'. <br>
Das komplette Produkt (mit Ausnahme des Frameworks für die <a href="http://feuerwehr-saar.de/mobil.php" target="_blank">Webapp</a>)
wurde von Tobias Lana, Christian Rech und Andreas Warken umgesetzt.<br>
Bei Fragen wenden sie sich bitte an folgende Adresse htw-itech@googlegroups.com.<br>
Ansprechpartner für Angehörige der FF Riegelsberg ist Tobias Lana (t.lana@ff-riegelsberg.de).<br>
<br>
Ansonsten gilt hier das <a href="http://www.ff-riegelsberg.de/?page_id=30" target="_blank">Impressum der Freiwilligen Feuerwehr Riegelsberg</a>
</div>
<?php include (PATH_BASIS . '/View/Layout/footer.inc.php') ?>