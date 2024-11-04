<?php 

function moyenne($notes) {
    $somme = 0;
    for ($i = 0; $i < count($notes); $i++) {
        $somme += $notes[$i];
    }
    return $somme / count($notes);
}

echo moyenne([10, 12, 14, 16, 18]);