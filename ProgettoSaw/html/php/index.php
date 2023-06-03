<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
</head>
<body>
    <!-- session start e controllo per header -->
    <?php session_start(); require '../components/logged.php'; ?>
    <div id="Page">
    <div class="MidPage">
        <div id="Motto">
            <h1>Rendi i tuoi viaggi sempre più <br> sostenibili</h1>
            <button onclick="buttonClick('Prenota'); location.href='prenotaVeicolo.php'" id="Prenota">Prenota il tuo veicolo</button> 
            <?php
                if (!isset($_SESSION['loggato'])) {
                // L'utente è loggato, inclusione del div
                    echo ' <h3>Non sei ancora cliente GoGreen?</h3>
                    <a href="registrazione.php"> Registrati </a>';
                }
            ?>
        </div>
    </div>
    <article>
        <h2>La mobilità sostenibile è una priorità per noi di GoGreen.</h2>
        <p> Il nostro servizio di car sharing con macchine <b>full eletric</b> è ora disponibile in tutta italia. </p>
        <p>Offriamo un’opzione <b>ecologica</b> ed <b>economica</b> per soddisfare le esigenze di trasporto. <br> Nella sezione successiva, esamineremo in dettaglio i vantaggi del nostro servizio e dimostreremo come può aiutare a ridurre i costi, aumentare l’efficienza e contribuire a un futuro più sostenibile. Scopri come il nostro servizio può essere la <b>soluzione ideale</b> per le tue esigenze di mobilità.</p>
        <section>
            <div class="iconePrimaLinea">
                <img src="../../res/icone/iconeHome/3.png" alt="icona di mani che tengono la terra, indice della sostenibilità ambientale">
                <h2>Sostenibilità ambientale</h2>
                <p>Le nostre macchine elettriche sono alimentate da fonti di energia pulita e rinnovabile, riducendo l’impatto ambientale del trasporto su strada.</p>
            </div>
            <div class="iconePrimaLinea">
                <img src="../../res/icone/iconeHome/2.png" alt="icona mano che tiene portafoglio, indice della convenienza economica">
                <h2>Convenienza economica</h2>
                <p>Risparmiate sui costi associati alla proprietà di un’auto personale e godete dei vantaggi economici dell’elettricità rispetto al carburante tradizionale</p>
            </div>
            <div class="iconeSecondaLinea">
                <img src="../../res/icone/iconeHome/4.png" alt="icona mappa con indicaore di localizzazione, indice della flessibilità">
                <h2>Flessibilità</h2>
                <p>Prenotate un’auto quando ne avete bisogno e restituitela quando avete finito, il tutto con pochi semplici clic.</p>
            </div>
            <div class="iconeSecondaLinea">
                <img src="../../res/icone/iconeHome/1.png" alt="icona lampadina illuminata, indice della tecnologia all'avanguardia">
                <h2>Tecnologia all’avanguardia</h2>
                <p>Godete di un’esperienza di guida piacevole e sicura grazie alle avanzate funzionalità di assistenza alla guida e ai sistemi di intrattenimento a bordo delle nostre macchine elettriche.</p>
            </div>
        </section>
    </article>
    </div>
    <?php include '../components/footer.html'; ?>
</body>
</html>