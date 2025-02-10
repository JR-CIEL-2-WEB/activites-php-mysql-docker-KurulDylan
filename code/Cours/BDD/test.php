<?php
include "config.php";
include "mediane.php";
include "moyenne.php";
require_once 'tri_selection.php';

try {
    \$pdo = new PDO("mysql:host=\$host;dbname=\$dbname;charset=utf8", \$username, \$password);
    \$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données des tables
    \$employes = getData(\$pdo, 'employes');
    \$salaires = getData(\$pdo, 'salaires');

    // Calculs statistiques
    \$salaires_values = array_column(\$salaires, 'Salaire');
    if (!empty(\$salaires_values)) {
        \$moyenne = moyenne(\$salaires_values);
        \$mediane = mediane(\$salaires_values);
        \$salaires_tries = \$salaires_values;
        tri_selection_reference(\$salaires_tries);
    }

    // Ajout d'un employé
    if (\$_SERVER['REQUEST_METHOD'] === 'POST' && isset(\$_POST['add_employe'])) {
        \$nom = \$_POST['nom'];
        \$stmt = \$pdo->prepare("INSERT INTO employes (nom) VALUES (?)");
        \$stmt->execute([\$nom]);
        header("Refresh:0");
    }

    // Ajout d'un salaire
    if (\$_SERVER['REQUEST_METHOD'] === 'POST' && isset(\$_POST['add_salaire'])) {
        \$salaire = \$_POST['salaire'];
        \$stmt = \$pdo->prepare("INSERT INTO salaires (Salaire) VALUES (?)");
        \$stmt->execute([\$salaire]);
        header("Refresh:0");
    }

    // Suppression d'un employé
    if (isset(\$_GET['delete_employe'])) {
        \$id = \$_GET['delete_employe'];
        \$stmt = \$pdo->prepare("DELETE FROM employes WHERE id = ?");
        \$stmt->execute([\$id]);
        header("Refresh:0");
    }

    // Suppression d'un salaire
    if (isset(\$_GET['delete_salaire'])) {
        \$id = \$_GET['delete_salaire'];
        \$stmt = \$pdo->prepare("DELETE FROM salaires WHERE id = ?");
        \$stmt->execute([\$id]);
        header("Refresh:0");
    }

} catch (PDOException \$e) {
    die("Erreur de connexion : " . \$e->getMessage());
} catch (Exception \$e) {
    die("Erreur : " . \$e->getMessage());
}

function getData(\$pdo, \$table) {
    \$stmt = \$pdo->query("SELECT * FROM \$table");
    return \$stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Employés et Salaires</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Gestion des Employés et Salaires</h1>

    <h2>Employés</h2>
    <table>
        <tr><th>ID</th><th>Nom</th><th>Actions</th></tr>
        <?php foreach (\$employes as \$employe): ?>
            <tr>
                <td><?= \$employe['id'] ?></td>
                <td><?= \$employe['nom'] ?></td>
                <td><a href="?delete_employe=<?= \$employe['id'] ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <form method="post">
      
