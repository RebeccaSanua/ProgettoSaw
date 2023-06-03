<?php
    session_start();
    require_once('Config.php');
    if(!isset($_POST['firstname']) && !isset($_POST['lastname']) && !isset($_POST['email']) && !isset($_POST['pass'])){
        header("location: ../html/php/infoBase.php");
    }

    if(isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['email']) || isset($_POST['pass'])){
        // Sanificazione dei dati inviati dall'utente
        if(isset($_POST['firstname'])){
            $nome = $dbConnection->real_escape_string($_POST['firstname']);
        } else {
            $nome = $_SESSION['user_firstname'];
        }

        if(isset($_POST['lastname'])){ 
            $cognome = $dbConnection->real_escape_string($_POST['lastname']);
        } 
        else {
            $cognome = $_SESSION['user_lastname'];
        }

        if(isset($_POST['email'])){ 
            $email = $dbConnection->real_escape_string(strtolower($_POST['email']));
        } 
        else {
            $email = $_SESSION['user_email'];
        }

        if(isset($_POST['pass'])){ 
            $pass = $dbConnection->real_escape_string($_POST['pass']);
            $hashedPass = password_hash($pass, PASSWORD_ARGON2I);
        } 
        else {
            $hashedPass = $_SESSION['user_password'];
        }

        if (isset($_SESSION['loggato']) && $_SESSION['loggato']) {
            // Recupera l'ID utente dell'utente loggato
            $id_utente = $_SESSION['user_id'];
        }

        // Verifica se l'email è già presente nel database
            $email_query = "SELECT uID FROM users WHERE Email = ?";
            $email_stmt = $dbConnection->prepare($email_query);
            $email_stmt->bind_param("s", $email);
            $email_stmt->execute();
            $email_result = $email_stmt->get_result();

            if ($email_result->num_rows > 0 && $email!=$_SESSION['user_email']) {
                // L'email è già presente nel database, gestisci l'errore di duplicazione
                echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
                echo "Errore: l'indirizzo email fornito è già stato utilizzato.";
            } else {
                // L'email non è presente nel database, esegui l'aggiornamento dei dati
                $update_query = "UPDATE users SET Nome = ?, Cognome = ?, Email = ?, Password = ? WHERE uID = ?";
                $update_stmt = $dbConnection->prepare($update_query);
                $update_stmt->bind_param("ssssi", $nome, $cognome, $email, $hashedPass, $id_utente);

                if ($update_stmt->execute()) {
                    // Aggiornamento dei dati avvenuto con successo
                    $_SESSION['user_firstname'] = $nome;
                    $_SESSION['user_lastname'] = $cognome;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_password'] = $hashedPass;
                    header("Location: ../html/php/infoBase.php");
                } else {
                    // Altri errori
                    echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
                    echo "Errore durante il salvataggio dei dati: " . $update_stmt->error;
                }
            }
        } else {
            echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
            echo "Errore: i dati non sono stati inviati correttamente.";
        }
    $dbConnection->close();
?>
