<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $mot_de_passe = $_POST["mot_de_passe"];

  // Vérifier si l'utilisateur existe déjà dans la base de données
  // Si oui, afficher un message d'erreur
  // Sinon, insérer les données dans la base de données
  // et rediriger l'utilisateur vers la page de connexion




  // Rajouter la connexion à la bdd quand on l'aura

  $conn = mysqli_connect("localhost", "nom_utilisateur", "mot_de_passe", "nom_base_de_donnees");

  // Vérif connexion établie

  if (!$conn) {
    die("Erreur de connexion: " . mysqli_connect_error());
  }

  // Pour voir si l'utilisateur existe

  $sql = "SELECT * FROM utilisateurs WHERE email='$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {

    // S'il existe déjà on ne l'inscrit pas une deuxième fois 

    echo "Cet email est déjà utilisé pour un compte existant. Veuillez vous connecter ou utiliser un autre email.";
  } else {

    
    // Sinon on rajoute dans la bdd

    $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$mot_de_passe')";
    if (mysqli_query($conn, $sql)) {
        
      // Rediriger l'utilisateur vers la page de connexion
      header("Location: connexion.html");
      exit();
    } else {
      echo "Erreur: " . mysqli_error($conn);
    }
  }

  // Fermer la connexion à la base de données
  mysqli_close($conn);

}

?>
