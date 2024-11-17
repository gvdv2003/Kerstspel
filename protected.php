<?php
// protected.php
session_start();

// Controleer of de gebruiker geauthenticeerd is
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    // Gebruiker is niet geauthenticeerd, stuur terug naar de index
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Beveiligde Pagina</title>
</head>
<body>
<h2>Welkom op de beveiligde pagina!</h2>
<p>Je hebt een geldige code ingevoerd en hebt nu toegang tot deze inhoud.</p>
</body>
</html>
