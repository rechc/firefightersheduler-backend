<?php

include_once '../global.inc.php';
require_once(PATH_BASIS . '/Model/AllUser.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CronJobEmailNote
 *
 * @author awagen
 */
class CronJobEmailNote {

    // TODO kommentieren gesamte klasse
    public static function start() {
        $all = AllUser::get_userarray_for_manager_view();
        foreach ($all as $user) {
            $user->start_cronjob_note_check();
        }
        
    }

}

?>
