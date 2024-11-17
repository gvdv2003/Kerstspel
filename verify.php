<?php
// verify.php
session_start();
require 'config.php';

if (isset($_POST['code'])) {
    $input_code = $_POST['code'];

    // Controleer of de ingevoerde code geldig is en haal de bijbehorende pagina op
    if (array_key_exists($input_code, $valid_codes)) {
        // Code is geldig: sla de code en de authenticatiestatus op in de sessie
        $_SESSION['authenticated'] = true;
        $_SESSION['code_used'] = $input_code; // Bewaar de ingevoerde code in de sessie

        // Stuur door naar de bijbehorende pagina
        $redirect_page = $valid_codes[$input_code];
        header("Location: $redirect_page");
        exit;
    } else {
        // Code is ongeldig, stuur terug naar index met foutmelding
        echo "Ongeldige code. <a href='index.php'>Probeer opnieuw</a>.";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
