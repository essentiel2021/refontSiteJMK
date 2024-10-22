<?php
// db.php

// Configuration des paramètres de connexion
$host = '127.0.0.1';     // Nom de l'hôte, en général 'localhost'
$dbname = 'admin_jmk_site';  // Nom de votre base de données
$username = 'root';      // Nom d'utilisateur de la base de données
$password = '';          // Mot de passe de la base de données (si vous en avez un)

try {
    // Création d'une instance de PDO pour la connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Définir le mode d'erreur de PDO pour afficher les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optionnel: message de succès si nécessaire
    // echo "Connexion réussie à la base de données!";
} catch (PDOException $e) {
    // Gestion des erreurs de connexion
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}
?>