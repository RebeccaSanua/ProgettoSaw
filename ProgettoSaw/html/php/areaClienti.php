<?php 
    session_start();
    if(isset($_SESSION['loggato']) && $_SESSION['loggato']== true){
        header("location: account.php");
        exit;
    }
    if(isset($_POST['invia'])) {
		include("../../login.php");
	}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Area Clienti</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/areaClienti.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
</head>
<body>
    <!--controllo per header -->
    <?php require '../components/logged.php'; ?>
    <section>
        <aside>
            <h2>Accedi</h2>
            <h3>alla nostra area clienti</h3>
            <p>Potrai gestire facilmente <b>il tuo account</b> e le tue prenotazioni di car sharing. <br>Potrai visualizzare lo storico delle tue <b>prenotazioni</b>, <br> modificare le tue <b>informazioni personali</b> e gestire i tuoi metodi di pagamento. <br> Inoltre, avrai accesso a <b>offerte esclusive</b> e promozioni riservate ai nostri clienti fedeli. <br>Scopri tutto ciò che l’area clienti ha da offrirti e sfrutta al massimo i vantaggi del car sharing!</p>
            <h4>Non sei ancora cliente GoGreen?</h4>
            <a href="registrazione.php"> Registrati </a>
        </aside>
        <form action="../../scripts/Login.php" method="post">
            <h1>Inserisci i tuoi dati</h1>
            <input type="email" id="email" name="email" placeholder="Inserisci email" required>
            <input type="password" id="pass" name="pass" placeholder="Inserisci password" required>
            <input type="checkbox" onclick="ShowPsw()"> <p>Mostra password</p>
            <button onclick="buttonClick('invia');" id="invia" name="invia">Invia</button>
        </form>
    </section>
    <script>
        function ShowPsw() {
                        var x = document.getElementById("pass");
                        if ( x.type === "password") {x.type = "text";} 
                        else {x.type = "password";}
        }
    </script>
    <?php include '../components/footer.html'; ?>
</body>
</html>