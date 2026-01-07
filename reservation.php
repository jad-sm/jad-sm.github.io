<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $destination = htmlspecialchars($_POST['destination']);
    $date = htmlspecialchars($_POST['date']);
    $nb_personnes = htmlspecialchars($_POST['nb_personnes']);

    // Ø¹Ù†ÙˆØ§Ù† Ø§Ù„Ø¨Ø±ÙŠØ¯ Ø§Ù„Ø°ÙŠ Ø³ÙŠØ³ØªÙ‚Ø¨Ù„ Ø§Ù„Ø±Ø³Ø§Ø¦Ù„
    $to = "su@jadsa.site";

    // Ø¹Ù†ÙˆØ§Ù† Ø§Ù„Ù…ÙˆØ¶ÙˆØ¹
    $subject = "Nouvelle rÃ©servation depuis le site";

    // Ù…Ø­ØªÙˆÙ‰ Ø§Ù„Ø±Ø³Ø§Ù„Ø©
    $message = "
    Nouvelle rÃ©servation reÃ§ue :\n
    Nom complet : $nom
    Email : $email
    Destination souhaitÃ©e : $destination
    Date du voyage : $date
    Nombre de personnes : $nb_personnes
    ";

    // Ø±Ø¤ÙˆØ³ Ø§Ù„Ø¨Ø±ÙŠØ¯
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Ø¥Ø±Ø³Ø§Ù„ Ø§Ù„Ø¨Ø±ÙŠØ¯
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('RÃ©servation envoyÃ©e avec succÃ¨s !'); window.location.href = 'reservation.html';</script>";
    } else {
        echo "<script>alert('Erreur lors de l\'envoi du message.'); history.back();</script>";
    }
} else {
    header("Location: reservation.html");
    exit();
}