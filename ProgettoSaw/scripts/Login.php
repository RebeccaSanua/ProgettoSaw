<?php
    session_start();

    require_once dirname(__FILE__) . '/Config.php';
    
    if (isset($_POST['email']) && isset($_POST['pass'])) {
        $email = $dbConnection->real_escape_string(strtolower($_POST['email']));
        $pass = $dbConnection->real_escape_string($_POST['pass']);
    
        $query = "SELECT * FROM users WHERE Email = ?";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows === 1){
            $user = $result->fetch_assoc();
            $hashedPass = $user['Password'];

            if (password_verify($pass, $hashedPass)) {
                // Login effettuato con successo
                $_SESSION['loggato'] = true;
                $_SESSION['user_id'] = $user['uID'];
                $_SESSION['user_email'] = $user['Email'];
                $_SESSION['user_firstname'] = $user['Nome'];
                $_SESSION['user_lastname'] = $user['Cognome'];
                $_SESSION['user_password'] = $hashedPass;
                header('Location: ../html/php/account.php');
                exit;
            } else {
                // Password errata
                echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
                echo "Errore: la password fornita è errata.";
            }
        }   
        else {
            // L'utente non esiste nel database
            echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
            echo "Errore: l'indirizzo email fornito non è registrato.";
        }
    } 
    else {
        // Dati non inviati
        echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
        echo "Errore: i dati non sono stati inviati.";
    }
        
    $dbConnection->close();
?>
