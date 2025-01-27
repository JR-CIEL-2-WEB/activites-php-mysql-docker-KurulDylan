<?php
include "tri_selection.php";
function mediane ($notes) {
    tri_selection($notes); ## il faut remplacer par  un tri selection  par la suite 
    $milieu = count($notes) / 2;
    if (count($notes) % 2 == 0) {
        return ($notes[$milieu - 1] + $notes[$milieu]) / 2;
    } else {
        return $notes[$milieu];
    }
    
}
?>
