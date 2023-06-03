<?php
        if (isset($_SESSION['loggato'])) {
            // L'utente ha effettuato il login
            include 'headerLogged.php';
        } else {
            // L'utente non ha effettuato il login
            include 'header.html';
        }
?>