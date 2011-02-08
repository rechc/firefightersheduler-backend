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
            $einsatz = "Einsatz";
            $unterweisung = "Unterweisung";

            foreach($user_array as $user){
                $G26 = $user->getG26_object();
                $strecke = $user->getStreckeListe_object()->getStreckeAt(0);
//                $uebung = $user->getUebungListe_object();
//                $einsatz = $user->getEinsatzListe_object();
//                $unterweisung = $user->getUnterweisungListe_object();
                
                $output .= "<tr>";
                    $output .= "<td>". $user->getName() ."</td>";
                    $output .= "<td>". $user->getVorname() ."</td>";
                    $output .= "<td><img alt='einsatzbereit' src='images/icon-ampel-gruen.gif' /></td>";
                    $output .= "<td>". $G26->getGueltigBis() ."</td>";
                    $output .= "<td>". $strecke->getDatum() ."</td>";
                    $output .= "<td>". $uebung ."</td>";
                    $output .= "<td>". $einsatz ."</td>";
                    $output .= "<td>". $unterweisung ."</td>"; //$unterweisung->getDatum()
                    $output .= "<td><a href='viewUser.php'><img alt='anschauen' src='images/view.gif' /></a>&nbsp;
                        <img alt='bearbeiten' src='images/edit.png' /></td>";
                $output .= "</tr>";
            }
            return $output;
        }
    }

?>
