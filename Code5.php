<?php
// page1.php
session_start();
require 'config.php';

// Controleer of de gebruiker geauthenticeerd is en de juiste code heeft gebruikt
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true || $_SESSION['code_used'] !== "CODE123") {
    // Gebruiker heeft niet de juiste code gebruikt, stuur terug naar de index
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Page 5</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h2>Welkom op Page 5!</h2>
<p>Dit is de inhoud voor gebruikers met de toegangscode "CODE123".</p>
</body>
</html>
