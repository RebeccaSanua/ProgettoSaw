<?php
    // Connessione al database
    require_once('Config.php');
    
    // Verifica se è stata inviata una richiesta POST con la parola chiave
    if(isset($_POST['keyword'])  && !empty($_POST['keyword'])){
        // Ottieni la parola chiave inserita dall'utente
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM keywords WHERE keywords LIKE '%" . $keyword . "%' OR Nome LIKE '%" . $keyword . "%' OR MATCH(Descrizione) AGAINST ('" . $keyword . "' IN BOOLEAN MODE) OR Nome_pagina LIKE '%" . $keyword . "%'";

        // Query di ricerca utilizzando i prepared statement
        $query = "SELECT * FROM keywords WHERE keywords LIKE ? OR Nome LIKE ? OR MATCH(Descrizione) AGAINST (? IN BOOLEAN MODE) OR Nome_pagina LIKE ?";
        $stmt = $dbConnection->prepare($query);
        $searchTerm = "%" . $keyword . "%";
        $stmt->bind_param("ssss", $searchTerm, $searchTerm, $keyword, $searchTerm);
        $stmt->execute();

        // Eseguire la query di ricerca
        $result = $stmt->get_result();

        // Mostrare i risultati
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo " <h1><a href='". $row['Link_pagina'] ."'>". $row['Nome'] ." </a></h1>
                        <h4> Pubblicato il ".$row['Data_aggiunta_prodotto']."</h4>
                        <p>". $row['Descrizione'] ."..</p>
                        <h3> Accedi alla pagina <a href='". $row['Link_pagina'] ."'>". $row['Nome_pagina'] ."</a> per scoprirne di più.</h3>";        
            }
        } else {
            echo "Nessun risultato trovato.";
        }   
    }
    else {
        echo "";
    }
    // Chiudere la connessione al database  
    $dbConnection->close();
?>
