<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Prenota Veicolo</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/prenotaVeicolo.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
</head>
<body>
    <!-- session start e controllo per header -->
    <?php session_start(); require '../components/logged.php'; ?>
    <section>
        <h1>Scopri le nostre auto elettriche</h1>
        <h2 id="benvenuti">Benvenuti nella nostra sezione dedicata alle auto elettriche</h2>
        <aside>
        <img class="macchina" alt="Immagine Rangerover bianco" src="../../res/macchine/macchina4.png">
        <img class="macchina" alt="Immagine BMW bianca" src="../../res/macchine/macchina3.png">
        <img class="macchina" alt="Immagine BMW Suv bianco" src="../../res/macchine/macchina2.png">
        <img class="macchina" alt="Immagine tesla bianca" src="../../res/macchine/macchina1.png">
        </aside>
        <article>
            <div class="articolo">
                <h2>Rangerover Eco-Explorer</h2>
                <p> Questa elegante auto elettrica a 5 porte offre un’esperienza di guida<br> <b>confortevole</b> e <b>silenziosa</b>. Con un’autonomia di oltre <b>400 km</b><br> con una singola carica, è perfetta per viaggi <b>lunghi</b> o <b>brevi</b>.</p>
                <h3>Da 5€ l'ora,<span> 0,55€ al km</span></h3>
                <button onclick="buttonClick('Prenota1'); location.href='noPage.php'" id="Prenota1">Prenota</button>
            </div>
            <div class="articolo">
                <h2>BMW Eco-Cruiser</h2>
                <p>Questa berlina elettrica offre un’esperienza di guida <b>fluida</b> e <b>silenziosa</b>. <br> Con un’autonomia di oltre <b>600 km</b> con una singola carica, è perfetta per viaggi di <b>lavoro</b> o di <b>piacere</b>.</p>
                <h3>Da 4€ l'ora,<span> 0,45€ al km</span></h3>
                <button onclick="buttonClick('Prenota2'); location.href='noPage.php'" id="Prenota2">Prenota</button>
            </div>
            <div class="articolo">
                <h2>BMW Eco-SUV</h2>
                <p>Questo SUV elettrico offre un’esperienza di guida <b>dinamica</b> e <b>potente</b>. <br> Con un’autonomia di oltre <b>500 km</b> con una singola carica, è ideale per viaggi in <b>famiglia</b> o con <b>amici</b>.</p>
                <h3>Da 6€ l'ora,<span> 0,65€ al km</span></h3>
                <button onclick="buttonClick('Prenota3'); location.href='noPage.php'" id="Prenota3">Prenota</button>
            </div>
            <div class="articolo">
                <h2>Tesla Eco-Rocket</h2>
                <p>Questa auto elettrica offre un’esperienza di guida <b>innovativa</b> e <b>tecnologica</b>. <br>Con un’autonomia di oltre <b>700 km</b> con una singola carica, è ideale per viaggi a <b>lungo raggio</b>.</p>
                <h3>Da 8€ l'ora,<span> 0,85€ al km</span></h3>
                <button onclick="buttonClick('Prenota4'); location.href='noPage.php'" id="Prenota4">Prenota</button>
            </div>
        </article>
    </section>
    <?php include '../components/footer.html'; ?>
</body>
</html>