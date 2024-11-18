<?php

function tri_selection($tab) {
    $n = count($tab);
    for ($i = 0; $i < $n - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($tab[$j] < $tab[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $memoire = $tab[$i];
            $tab[$i] = $tab[$min];
            $tab[$min] = $memoire;
        }
    }
    return $tab;
}

$tab = [10, 12, 14, 1, 8];


echo "Tableau trié : " . implode(", ", tri_selection($tab)) . "<br>";


?>