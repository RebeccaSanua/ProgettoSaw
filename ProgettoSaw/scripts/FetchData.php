<?php
require_once dirname(__FILE__) . '/Config.php';

// Recupero l'ID utente dalla variabile di sessione
$userID = $_SESSION['user_id'];

// Query per ottenere i dati del profilo dell'utente utilizzando un prepared statement
$query = "SELECT * FROM users WHERE uID = ?";
$stmt = $dbConnection->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();

// Controllo se la query ha restituito un risultato
if ($result->num_rows === 1) {
    // Recupero i dati del profilo
    $user = $result->fetch_assoc();
}

// Chiusura dello statement e della connessione al database
$stmt->close();
$dbConnection->close();

?>