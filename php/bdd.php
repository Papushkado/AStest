<?php 
// Connexion à la base de données
$serveur = "localhost"; // Le nom du serveur MySQL
$utilisateur = "nom_utilisateur"; // Le nom d'utilisateur pour la connexion à la base de données
$mot_de_passe = "mot_de_passe"; // Le mot de passe pour la connexion à la base de données
$nom_bdd = "nom_de_la_base_de_donnees"; // Le nom de la base de données que vous avez créée

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

// Vérification de la connexion à la base de données
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupération des informations d'un utilisateur en fonction de son identifiant
$identifiant = "utilisateur_test";
$resultat = $connexion->query("SELECT * FROM utilisateurs WHERE identifiant='$identifiant'");

if ($resultat->num_rows > 0) {
    // Affichage des informations de l'utilisateur
    $ligne = $resultat->fetch_assoc();
    echo "Identifiant : " . $ligne["identifiant"] . "<br>";
    echo "Mot de passe : " . $ligne["mot_de_passe"];
} else {
    echo "Aucun utilisateur trouvé avec cet identifiant.";
}

// Fermeture de la connexion
?> 