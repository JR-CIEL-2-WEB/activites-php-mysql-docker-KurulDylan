<?php 

function triangle($nb_lignes) {
    for ($i = 1; $i <= $nb_lignes; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo "*";
        }
        echo "<br>";
    }
}

