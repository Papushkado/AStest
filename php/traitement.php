
<?php
if (isset($_POST['submit'])) {
    $to = "isup.je@gmail.com";
    $subject = "Nouveau message de contact";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $headers = "From: " . $name . " <" . $email . ">\r\n" .
        "Reply-To: " . $email . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Votre message a été envoyé avec succès!";
    } else {
        echo "Désolé, une erreur est survenue lors de l'envoi de votre message.";
    }
}

/*$to = "isup.je@gmail.com";
$subject = "Nouveau message de contact";
$message = "Nom: " . $_POST['nom'] . "\n\nEmail: " . $_POST['email'] . "\n\nMessage: " . $_POST['message'];
$headers = "From: " . $_POST['email'];
mail($to, $subject, $message, $headers);
header("Location: confirmation.html");
exit;*/
?>