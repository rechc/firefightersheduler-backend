<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author awagen
 * @version beta
 */
class Config {

    //put your code here

    public static function xx() {

    }

    // --------- Mailconfig ---------

    public static function emailSenderAdresseServer() {
        return "t0bias@ich-gugge.de";
    }

    /**
     * Paramter z.b bei hosteurope noetig
     * http://faq.hosteurope.de/index.php?cpid=2804&in_object=2&searchword=php+mail
     */
    public static function emailSenderInclParameter() {
        return "-f t0bias@ich-gugge.de";
    }

    public static function emailServer() {
        return "wp090.webpack.hosteurope.de";
    }

    // --------- for user ---------

    public static function email_subject_status(){
        return "Statuswarnung der Feuerwehrtauglichkeit";
    }

    public static function email_text_yellow_status(){
        return "Ihr aktueller Tauglichkeitsstatus der Fuerwehr ist Gelb, das heißt demnächst läuft eine Untersuchung oder Übung ab. \n
            Bitte ueberpruefen sie ihre Untersuchungsdaten so wie ihre Übungssdaten im Online Service der Feuerwehr. \n
            Mit freundlichen Grüßen \n ihr Fuerwehr-Online-Service";
    }
    public static function email_text_red_status(){
        return "Ihr aktueller Tauglichkeitsstatus der Fuerwehr ist ROT, das heißt eine Untersuchung oder Übung ist abgelaufen. \n
            Um offiziel an Einsätzen teilzunehmen, müssen sie diese erneuern. \n
            Bitte ueberpruefen sie ihre Untersuchungsdaten so wie ihre Übungssdaten im Online Service der Feuerwehr. \n
            Mit freundlichen Grüßen \n ihr Fuerwehr-Online-Service";
    }

    public static function wrongEmail() {
        return "es wurde eine fehlerhafte email adresse angegeben";
    }

    public static function newPasswordText($name, $pwd) {
        return "Hallo " . $name . "\n Dein neues Passwort lautet " . $pwd . "\n Dieses Passwort ist nur dir bekannt und kann nicht geändert werden \n
            Mit freundlichen Grüßen \n Dein FFSScheduler-Team";
    }

    public static function newPasswordSubject() {
        return "neues Passwort";
    }

    public static function admin_role_id() {
        return 50;
    }

    public static function agw_role_id() {
        return 40;
    }

    public static function manager_role_id() {
        return 30;
    }

    public static function member_role_id() {
        return 10;
    }

    /**
     * 
     * max Zeitabstand zur letzten Einsatzübung
     * @return Anzahl Tage
     */
    public static function last_uebung() {
        return -365;
    }

    /**
     *
     * max Zeitabstand zum letzten Einsatz
     * @return Anzahl Tage
     */
    public static function last_einsatz() {
        return -365;
    }

    public static function last_strecke() {
        return -365;
    }

    /**
     *
     * max Zeitabstand zur letzten Unterweisung
     * @return Anzahl Tage
     */
    public static function last_unterweisung() {
        return -365;
    }

    /**
     * wieviel tage vor ablauf der zeit der gelbe warning status angezeigt wird
     * @return <type>
     */
    public static function unterweisung_warning_yellow() {
        return 60;
    }

    public static function uebung_warning_yellow() {
        return 60;
    }

    public static function einsatz_warning_yellow() {
        return 60;
    }

    public static function strecke_warning_yellow() {
        return 60;
    }

    /**
     *
     * max Zeitabstand zur letzten belastungsstrecke
     * @return Anzahl Tage
     */
    public static function last_loading_track() {//uebersetzung ka....
        return 356;
    }

    public static function g26_yellow_state() {
        return 60; //vorläufig normale zeit 1068 Tage = 3 JAhre
    }

    public static function green() {
        return 0;
    }

    public static function yellow() {
        return 1;
    }

    public static function red() {
        return 2;
    }

    /* Rot wenn
      G26.3 Untersuchung abgelaufen ODER
      Einsatz UND Einsatzübung älter als 365 Tage ODER
      Belastungsstrecke älter als 365 Tage */

// --------- for db ---------

    /*    const mysqlhost="stud-i-pr2.htw-saarland.de"; // MySQL-Host angeben
      const mysqldb="FFS"; // Gewuenschte Datenbank angeben
      const mysqluser="htwmaps"; // MySQL-User angeben
      const mysqlpwd="g00gl3m4p5k1ll4"; // Passwort angeben


      var $mysqlhost="feuerwehr-saar.de"; // MySQL-Host angeben
      var $mysqldb="db1057229-2"; // Gewuenschte Datenbank angeben
      var $mysqluser="dbu1057229"; // MySQL-User angeben
      var $mysqlpwd="h0m3b0y"; // Passwort angeben
     */

    public static function mysqlhost() {
        return "stud-i-pr2.htw-saarland.de";
    }

    public static function mysqldb() {
        return "FFS";
    }

    public static function mysqluser() {
        return "htwmaps";
    }

    public static function mysqlpwd() {
        return "g00gl3m4p5k1ll4";
    }

}

?>
