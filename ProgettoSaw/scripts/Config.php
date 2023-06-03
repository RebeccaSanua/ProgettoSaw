<?php

    $host = 'localhost';
    $user = 'S4797564';
    $dbpw = 'Un_Etto_Di_Cotto';
    $db = 'S4797564';

    $dbConnection = new mysqli($host, $user, $dbpw, $db);
   
    if ($dbConnection->connect_error){
        die('Connection to the database failed: ' . $dbConnection->connect_error);
    }

?>