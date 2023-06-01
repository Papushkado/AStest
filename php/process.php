<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $choix = implode(', ', $_POST['choix']);
  $niveau = $_POST['niveau'];
  $commentaire = $_POST['commentaire'];

  $to = 'stephenitoc@gmail.com'; // Adresse de reception des mails
  $subject = 'Formulaire de commande';
  $message = "Nom : $nom\n\nPrénom : $prenom\n\nEmail : $email\n\nChoix : $choix\n\nNiveau : $niveau\n\nCommentaire : $commentaire";
  $headers = "From: $email\r\nReply-To: $email\r\n";

  if (mail($to, $subject, $message, $headers)) {
    echo 'Votre demande a été envoyée avec succès.';
  } else {
    echo 'Une erreur est survenue lors de l\'envoi de votre commande.';
  }
}
?>
