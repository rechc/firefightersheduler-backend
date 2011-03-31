<?php
/**
 * Configdatei welche allgemeine Parameter speichert
 */
class Config {
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
    public static function last_loading_track() {
        return 356;
    }

    public static function g26_yellow_state() {
        return 60; //vorläufig normale zeit 1068 Tage = 3 Jahre
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
