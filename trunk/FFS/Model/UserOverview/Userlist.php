<?php
    //require_once('./AllUser.php');
    require_once(PATH_BASIS.'/Model/AllUser.php');
    /**
     * author christian
     */

    class Userlist{
        /**
         * Standard Konstruktor
         */
        public function __construct(){}

        public static function getUserTable(){
            $user_array=AllUser::get_userarray_for_manager_view();
            $output = "";
            
            $uebung = "Uebung";
            $unterweisung = "Unterweisung";

            foreach($user_array as $user){
                $G26 = $user->getG26Liste_object()->get_array_at(0);
                $strecke = $user->getStreckeListe_object()->get_array_at(0);
                $uebung = $user->getUebungListe_object()->get_array_at(0);
                $einsatz = $user->getEinsatzListe_object()->get_array_at(0);
                $unterweisung = $user->getUnterweisungListe_object()->get_array_at(0);


                $output .= "<tr>";
                    $output .= "<td>". $user->getName() ."</td>";
                    $output .= "<td>". $user->getVorname() ."</td>";
                    $output .= "\t\t\t<td ";
//                    if ($user->get_warning_status() == 0) {
//                        $output .= "class=\"fine\">";
//                    } elseif ($user->get_warning_status() == 1) {
//                        $output .= "class=\"attention\">";
//                    } elseif ($user->get_warning_status() == 2) {
//                        $output .= "class=\"noway\">";
//                    } else {
//                        $output .= "> ";
//                    }
                    $output .= "&nbsp;</td>\n";
                    $output .= "<td>". $G26 ."</td>";
                    $output .= "<td>". $strecke ."</td>";
                    $output .= "<td>". $uebung ."</td>";
                    $output .= "<td>". $einsatz ."</td>";
                    $output .= "<td>". $unterweisung ."</td>"; //$unterweisung->getDatum()
                    $output .= "<td><a href='viewUser.php'><img alt='anschauen' src='images/view.gif' /></a>&nbsp;
                        <a href='editUser.php'><img alt='bearbeiten' src='images/edit.png' /></a></td>";
                $output .= "</tr>";
            }
            return $output;
        }
    }

?>
