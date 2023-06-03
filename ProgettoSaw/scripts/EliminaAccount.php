<?php
    session_start();
    require_once('Config.php');

    if (isset($_POST['sicuro'])) {
        $userId = $_SESSION['user_id'];

        // Query per eliminare l'account utilizzando un prepared statement
        $query = "DELETE FROM users WHERE uID = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        
        $_SESSION = array();
        session_destroy();

        if ($stmt->affected_rows === 1) {
            echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
            echo "Account eliminato con successo!";
            echo "<p>Torna all'home page</p>";
            echo '<a href="../html/php/index.php">Home</a>';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
            echo "Errore durante l'eliminazione dell'account";
        }
    }

// Chiudi la connessione al database
$dbConnection->close();
?>
