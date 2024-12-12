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
function tri_selection_reference(&$t) {
    $n = count($t);
    for ($i = 0; $i < $n - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($t[$j] < $t[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $memoire = $t[$i];
            $t[$i] = $t[$min];
            $t[$min] = $memoire;
        }
    }
}
$tab = [10, 12, 14, 1, 8];

$t = [2,8,4,8,1,2];
tri_selection_reference($t);
echo "Tableau trié : " . implode(", ", tri_selection($tab)) . "<br>";
echo "Tableau trié reffff : " . implode(", ", $t) . "<br>";


?>