<?php
// Configuration de la base de données MySQL
define('DB_SERVER', 'localhost'); // Adresse du serveur MySQL
define('DB_USERNAME', 'nom_utilisateur'); // Nom d'utilisateur MySQL
define('DB_PASSWORD', 'mot_de_passe'); // Mot de passe MySQL
define('DB_NAME', 'nom_base_de_données'); // Nom de la base de données MySQL

// Connexion à la base de données MySQL
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Vérifier la connexion
if($mysqli === false){
    die("ERREUR : Impossible de se connecter. " . $mysqli->connect_error);
}
?>
