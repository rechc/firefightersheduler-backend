<?php

include_once '../global.inc.php';
require_once(PATH_BASIS . '/Model/AllUser.php');

/**
 * Description of CronJobEmailNote
 * Klasse die vom Cronjob angesprochen wird
 *
 * @author Warken Andreas
 * @version 1
 */
class CronJobEmailNote {

    /**
     * start
     * Muss vom CronJob aufgerufen werden
     * prueft alle Benutzer und versendet Emails
     * falls die Tauglichkeit nicht in Ordnung ist   
     */
    public static function start() {
        $all = AllUser::get_userarray_for_manager_view();
        foreach ($all as $user) {
            $user->start_cronjob_note_check();
        }
    }

}

?>
