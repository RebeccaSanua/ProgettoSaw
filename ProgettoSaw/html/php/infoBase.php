<?php
    session_start();
    if(!isset($_SESSION['loggato'])|| $_SESSION['loggato']!== true){
        header("location: areaClienti.php");
        exit;
    }
    include dirname(dirname(dirname(__FILE__))) . '/scripts/FetchData.php';
    if(isset($_POST['salva'])){
        include dirname(dirname(dirname(__FILE__))) . '/scripts/UpdateProfile.php';
    }
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Info Base</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/infoBase.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
</head>
<body>
    <!-- controllo per header -->
    <?php require  dirname(dirname(__FILE__)) . '/components/logged.php'; ?>
    <section>
        <a id="freccia" href="account.php"><img id="tornaIndietro" src="../../res/icone/iconaFreccia.png" onmouseover="changeImage('../../res/icone/iconaFrecciaHover.png')" onmouseout="changeImage('../../res/icone/iconaFreccia.png')" alt="icona freccia per tornare indietro"></a>
        <form method="post" action="../../scripts/UpdateProfile.php" id="Boxinfo">
            <h1>Informazioni base</h1>
            <div id="dati">
                <div class="info" id="nome">
                    <h3>Nome*</h3>
                    <h3 style="margin-left:5px;">:</h3>
                    <input type="text" id="firstname" name="firstname" value="<?php echo ucfirst($user['Nome'])?>" required disabled>
                </div>
                <div class="info" id="cognome">
                    <h3>Cognome*</h3>
                    <h3 style="margin-left:5px;">:</h3>
                    <input type="text" id="lastname" name="lastname" value="<?php echo ucfirst($user['Cognome'])?>" required disabled>
                </div>
                <div class="info" id="Email">
                    <h3>Email*</h3>
                    <h3 style="margin-left:5px;">:</h3>
                    <input type="email" id="email" name="email" value="<?php echo $user['Email']?>" required disabled>
                </div>
                <div class="info" id="Password">
                    <h3>Password*</h3>
                    <h3 style="margin-left:5px;">:</h3>
                    <input type="password" id="pass" name="pass" value="password1234" required disabled>
                </div>
            </div>
            <div id="modificaDati">
                <img class="modifica" src="../../res/icone/iconaModifica.png" alt="icona cliccabile che permette la modifica del campo" onclick="abilitaModifica('firstname', 'nome')">
                <img class="modifica" src="../../res/icone/iconaModifica.png" alt="icona cliccabile che permette la modifica del campo" onclick="abilitaModifica('lastname', 'cognome')">
                <img class="modifica" src="../../res/icone/iconaModifica.png" alt="icona cliccabile che permette la modifica del campo" onclick="abilitaModifica('email', 'Email')">
                <img class="modifica" src="../../res/icone/iconaModifica.png" alt="icona cliccaile che permette la modifica del campo" onclick="abilitaModifica('pass', 'Password')">
            </div>
            <div id="modificaBottoni">
                <button type="submit" name="salva" onclick="buttonClick('salva');" id="salva">Salva dati modificati</button>
                <h5><img id="alert"  alt="icona informazioni" src="../../res/icone/iconaInfo.png"> Dopo il salvataggio non potrai più recuperare i dati precedenti</h5>
                <div><h3 id="ripristina" onclick="refresh()">Ripristina i dati prima di salvarli</h3></div>
            </div>
            <script>
                function refresh() {
                    location.reload();
                }
                function changeImage(imagePath) {
                    var image = document.getElementById("tornaIndietro");
                    image.src = imagePath;
                }
            </script>
        </form>
    </section>
    <script src="../../js/abilitaModifica.js"></script>
    <?php include '../components/footer.html'; ?>
</body>
</html>