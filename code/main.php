<?php 

include "statistique.php";


$tab = [10, 12, 14, 16, 18];
echo "La moyenne des notes est : " .moyenne($tab);

echo " la mediane des notes est : " .mediane($tab);



$salaires = [1500, 4500, 2200, 1500, 3300, 1800, 1700, 2000, 4000];


echo "Moyenne des salaires : " . moyenne($salaires) . "</br>";
echo "Médiane des salaires : " . mediane($salaires) . "</br>";

$salaireNicolas = 2200;
if ($salaireNicolas > mediane($salaires)) {
    echo "Nicolas n'est pas dans les moins bien payés de l'entreprise.</br>";
} else {
    echo "Nicolas est dans les moins bien payés de l'entreprise.</br>";
}





?>
