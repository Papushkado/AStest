<?php
session_start();

// Vérifier si le formulaire a été soumis

if (isset($_POST['email']) && isset($_POST['mot_de_passe'])) {
  // Connexion à la bdd

  require_once 'config.php';
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $username, $password);
  
  // Récupérer les données soumises par le formulaire
  $email = $_POST['email'];
  $mot_de_passe = $_POST['mot_de_passe'];
  
  // Vérif existence
  $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mot_de_passe = :mot_de_passe");
  $stmt->execute(['email' => $email, 'mot_de_passe' => $mot_de_passe]);
  $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
  
  // Si l'utilisateur existe, le connecter et rediriger vers la page d'accueil
  if ($utilisateur) {
    $_SESSION['id_utilisateur'] = $utilisateur['id'];
    header('Location: index.php');
    exit();
  } else {

    $erreur = "L'email ou le mot de passe est incorrect.";
  }
}
?>
