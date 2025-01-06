<?php
include 'tri_selection.php';
include 'statistique.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET['list'])) {
    $list = $_GET['list'];
    $array = json_decode($list, true); // Décodage en tableau associatif

    // Tri du tableau
    tri_selection_ref($array);

    // Calcul de la médiane
    $mid = mediane($array);

    // Renvoi du résultat sous forme de JSON
    echo json_encode(["median" => $mid]);
} else {
    echo json_encode(["error" => "No data received"]);
}
?>
