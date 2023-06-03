<?php
    require_once('Config.php');

    if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['pass'])){
         // Sanificazione dei dati inviati dall'utente
        $firstname = $dbConnection->real_escape_string(ucfirst($_POST['firstname']));
        $lastname = $dbConnection->real_escape_string(ucfirst($_POST['lastname']));
        $email = $dbConnection->real_escape_string(strtolower($_POST['email']));
        $pass =  $dbConnection->real_escape_string($_POST['pass']);
    
        $patternEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com|it|org|net|edu|gov|mil|biz|info|io|me|tv|co)$/";
        $patternPass = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+,-.;'\/?[\]{}|`~=:]).{8,}$/";

        //hashing password
        $hashedPass = password_hash($pass, PASSWORD_ARGON2I);

        // Query INSERT per memorizzare i dati dell'utente nel database utilizzando prepared statement
        $query = "INSERT INTO users (Nome, Cognome, Email, Password) VALUES (?, ?, ?, ?)";
        $stmt = $dbConnection->prepare($query);
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hashedPass);
        $stmt->execute();
        
        if ($stmt->affected_rows === 1){
            // Sanificazione dei dati prima di visualizzarli in una pagina HTML
            $name = htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8');
            $name = ucfirst($name);
            echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
            echo "Ciao " . $name . ",<br> La tua registrazione è andata a buon fine.";
            echo "<p>Accedi all'area clienti e scopri le offerte del tuo account</p>";
            echo '<a href="../html/php/areaClienti.php">Accedi</a>';
        }
        else{
            if ($dbConnection->connect_errno === 1062) {
                // Codice di errore 1062: violazione di chiave univoca (email duplicata)
                echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
                echo "Errore: l'indirizzo email fornito è già stato utilizzato.";
            } else{
                // Altri errori
                echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
                echo "Errore durante la registrazione";
            }
        }
    }
    else {
        echo '<link rel="stylesheet" type="text/css" href="../css/error.css">';
        echo "Errore: i dati non sono stati inviati.";
    }

    $dbConnection->close();
?>