<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = $_POST['message'];

    $filePath = 'data.json';
    if (file_exists($filePath)) {
        $data = json_decode(file_get_contents($filePath), true);
    } else {
        $data = [];
    }

    $accountExists = false;
    foreach ($data as $user) {
        if ($user['email'] === $email) {
            $accountExists = true;
            break;
        }
    }

    if ($accountExists) {
        // Afficher un message d'erreur directement
        echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Erreur</title>
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
        </head>
        <body>
            <div class='container text-center mt-5'>
                <div class='alert alert-danger'>
                    <h1>Erreur</h1>
                    <p>Un compte avec cet email existe déjà.</p>
                </div>
                <a href='index.html' class='btn btn-primary'>Revenir au formulaire</a>
            </div>
        </body>
        </html>";
    } else {
        // Ajouter un nouvel utilisateur
        $newUser = [
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'message' => $message,
        ];
        $data[] = $newUser;
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

        // Afficher le message de bienvenue directement
        echo "<!DOCTYPE html>
        <html lang='fr'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Bienvenue</title>
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
        </head>
        <body>
            <div class='container text-center mt-5'>
                <h1>Bienvenue $prenom $name !</h1>
                <p>Votre compte a été créé avec succès.</p>
                <a href='index.html' class='btn btn-primary'>Revenir au formulaire</a>
            </div>
        </body>
        </html>";
    }
}
?>
