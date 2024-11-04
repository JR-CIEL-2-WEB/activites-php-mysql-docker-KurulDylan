<?php 

function moyenne($notes) {
    $somme = 0;
    for ($i = 0; $i < count($notes); $i++) {
        $somme += $notes[$i];
    }
    return $somme / count($notes);
}
function mediane ($notes) {
    sort($notes); ## il faut remplacer par  un tri selection  par la suite 
    $milieu = count($notes) / 2;
    if (count($notes) % 2 == 0) {
        return ($notes[$milieu - 1] + $notes[$milieu]) / 2;
    } else {
        return $notes[$milieu];
    }
    
}