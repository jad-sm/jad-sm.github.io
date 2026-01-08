<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $destination = htmlspecialchars($_POST["destination"]);
    $date = htmlspecialchars($_POST["date"]);

    // Envoi de l'email
    $to = "jadsalameh514@gmail.com"; // ⬅️ Remplace avec ton email
    $subject = "Nouvelle réservation - Jad Voyage";
    $message = "Nom: $nom\nEmail: $email\nDestination: $destination\nDate: $date";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);

    // Connexion à MySQL
    $servername = "localhost";
    $username = "eliera_jad";
    $password = "Jad@1@2@3";
    $dbname = "eliera_jad";

    $conn = new mysqli(localhost, eliera_jad, eliera_jad, eliera_jad);
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO reservations (nom, email, destination, date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nom, $email, $destination, $date);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: confirmation.html");
    exit();
}
?>
