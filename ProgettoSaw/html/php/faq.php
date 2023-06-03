<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: FAQ</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/faq.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
</head>
<body>
    <!-- session start e controllo per header -->
    <?php session_start(); require '../components/logged.php'; ?>
    <div id="faq">
        <h1>FAQ</h1>
        <h2>Trova le risposte alla domende più frequenti</h2>
    </div>
    <aside>
    <nav>
      <ul>
        <li><a href="#paragrafo1">Iscrizione</a></li>
        <li><a href="#paragrafo2">Apertura veicolo</a></li>
        <li><a href="#paragrafo3">Termine noleggio</a></li>
        <li><a href="#paragrafo4">Prenotazione</a></li>
      </ul>
    </nav>
    </aside>
    <section>
        <h2 id="paragrafo1">Iscrizione</h2>
        <p>Puoi iscriverti sia sul sito che sulla App, compilando il form di iscrizione: ti serviranno patente in corso di validità, anche estera, e documento di identità valido.
        <br><b>Il servizio è accessibile anche per neopatentati.</b>
        <br>È necessario registrare la carta di pagamento al momento della registrazione, può essere credito o prepagata.
        </p>
        <h2 id="paragrafo2">Apertura veicolo</h2>
        <p>Quando sei davanti al veicolo puoi aprirlo dall’App leggendo il QR Code o digitando il numero di targa.
        <br>Il sistema apre le porte dell’auto e puoi iniziare il tuo viaggio. Trovi le chiavi all’interno del veicolo.
        <br>Una volta fatto questo passaggio, guidi l’auto normalmente, se ti devi fermare la chiudi con le chiavi e le porti con te.
        <br>Se trovi il veicolo danneggiato, molto sporco e se mancano le chiavi, puoi fare una segnalazione con l’App oppure chiamare il call center.
        </p>
        <h2 id="paragrafo3">Termine noleggio</h2>
        <p>Una volta completato il tuo viaggio, puoi rilasciare il veicolo: spegni l’auto e verifica che tutto sia in ordine.
        <br>Lascia le chiavi nel cassetto, controlla che i finestrini siano chiusi, esci dal veicolo e assicurati di chiudere le portiere. Procedi con la riconsegna (l’App ti ricorderà le operazioni da fare), chiudendo l’auto con il QR Code o inserendo la targa. Attendi fino alla chiusura dell’auto.
        <br>Con il servizio Station Based, il veicolo deve essere rilasciato nello stesso parcheggio di prelievo. Nel caso in cui il parcheggio GoGreen fosse occupato abusivamente, puoi parcheggiare nelle vicinanze: il rilascio sarà consentito nell’arco di 200 metri, altrimenti sarà necessario contattare il call center.
        <br>Con il servizio Free Floating, invece, puoi rilasciare l’auto dove vuoi, all’interno dell’area centrale della città (visualizza la <a href="mappa.php">mappa</a> dell’area operativa).
        </p>
        <h2 id="paragrafo4">Prenotazione</h2>
        <p>Puoi prenotare un veicolo usando la tua App oppure dal portale web, scegliendo l’opzione Station Based (a parcheggio fisso) o l’opzione Free Floating (a flusso libero).
        <br>Nel primo caso, apri la mappa, seleziona il parcheggio, scegli la tipologia di vettura e prenota. La targa del veicolo ti verrà assegnata 60 minuti prima del prelievo e potrà essere visualizzata su App, via mail e via SMS.
        <br>La prenotazione dovrà indicare la data e orario di partenza e di arrivo.
        <br>Se scegli l’opzione Free Floating, puoi prenotare la tua auto dalla mappa al momento, verificando dove si trova, fino a 15 minuti prima del prelievo.
        <br>Per i modelli <b>Tesla Eco-Rocket</b> ed <b>Rangerover Eco-Explorer</b> è richiesto l’inserimento, come sistema di pagamento, di una carta non prepagata.
        <br>Per ogni corsa, è garantito il miglior prezzo di listino. La scelta tra tariffa oraria o forfait giornaliera viene operata automaticamente dal sistema in fase di fatturazione.
        <br>Per maggiori informazioni consulta la pagina <a href="prenotaVeicolo.php">Tariffe</a>.
        </p>

    </section>
    <?php include '../components/footer.html'; ?>
</body>
</html>