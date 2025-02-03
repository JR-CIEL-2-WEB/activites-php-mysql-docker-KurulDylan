<?php
require_once 'tri_selection.php';

function mediane($notes) {
    tri_selection($notes); // Assurez-vous que cette fonction trie bien le tableau

    $milieu = floor(count($notes) / 2); // Corrige la conversion implicite

    if (count($notes) % 2 == 0) {
        return ($notes[$milieu - 1] + $notes[$milieu]) / 2;
    } else {
        return $notes[$milieu];
    }
}

?>
