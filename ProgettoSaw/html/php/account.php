<?php
    session_start();
    if(!isset($_SESSION['loggato'])|| $_SESSION['loggato']!== true){
        header("location: areaClienti.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Account</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/account.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
</head>
<body>
    <!-- controllo per header -->
    <?php require '../components/logged.php'; ?>
    <section>
        <div id="account">
            <h1>Account</h1>
            <button onclick="buttonClick('elimina'); displayForm();" id="elimina">elimina account</button>
            <form action="../../scripts/EliminaAccount.php" method="post" id="check">
                <h3>Sei sicuro?</h3>
                <button action="../../scripts/EliminaAccount.php" method="post" onclick="buttonClick('sicuro');" id="sicuro" name="sicuro">sicuro</button>
            </form>
            <script>
                function displayForm() {
                    setTimeout(function() {
                        var form = document.getElementById("check");
                        if (form) {
                            form.style.display = "block";
                        }
                    }, 100); // Ritardo di 100 millisecondi (0,1 secondo)
                    }
            </script>
        </div>
        <a href="infoBase.php">
        <div class="informazioni">
            <img src="../../res/icone/iconeAccount/1.png" alt="icona infromazioni di base">
            <h2>Informazioni di base</h2>
            <p>Aggiorna i dettagli del tuo account o modifica la password</p>
        </div></a>
        <a href="noPage.php">
        <div class="informazioni">
            <img src="../../res/icone/iconeAccount/2.png" alt="icona dati personali">
            <h2>Dati personali</h2>
            <p>Aggiorna i dati personali del tuo account</p>
        </div></a>
        <a href="noPage.php">
        <div class="informazioni">
            <img src="../../res/icone/iconeAccount/3.png" alt="icona carta d'identità">
            <h2>Carta d'identità</h2>
            <p>Aggiorna le informazioni relative alla tua carta d'identità</p>
        </div></a>
        <a href="noPage.php">
        <div class="informazioni">
            <img src="../../res/icone/iconeAccount/5.png" alt="icona patente">
            <h2>Patente</h2>
            <p>Aggiorna le informazioni relative alla patente</p>
        </div></a>
        <a href="noPage.php">
        <div class="informazioni">
            <img src="../../res/icone/iconeAccount/4.png" alt="icona indirizzo di residenza">
            <h2>Indirizzo di residenza</h2>
            <p>Aggiorna l'Indirizzo di residenza</p>
        </div></a>
        <a href="noPage.php">
        <div class="informazioni">
            <img src="../../res/icone/iconeAccount/6.png" alt="icona indirizzo di fatturazione">
            <h2>Indirizzo di fatturazione</h2>
            <p>Aggiorna l'indirizzo di fatturazione</p>
        </div></a>
    </section>
    <?php include '../components/footer.html'; ?>
</body>
</html>