
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Donazioni</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/dona.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
</head>
<body>
<?php session_start(); require '../components/logged.php'; ?>
<section>
    <h1>Contribuisci a Ridurre le Emissioni</h1> 
    <h2>Dona per il Riciclo delle Batterie al Litio</h2>
    <h3>Benvenuto nella nostra pagina di donazioni!</h3>
    <p id="benvenuto">Qui puoi fare la <b>differenza</b> e contribuire attivamente a ridurre le <b>emissioni</b> causate dallo smaltimento delle <b>batterie al litio</b>. Le <b>batterie al litio</b> sono una componente fondamentale per l'<b>energia pulita</b> e la mobilità sostenibile, ma il loro corretto smaltimento rappresenta ancora una <b>sfida ambientale</b>. Con la tua <b>donazione</b>, puoi sostenere progetti e iniziative volte a mitigare l'<b>impatto negativo</b> di questo processo.</p>
    <p>Importo raggiunto: <span id="donation-amount">0</span>€ / 50000€</p>
    <div id="donation-bar-container"><div id="donation-bar">
    </div>
    </div>
    
    <form id="donation-form">
        <label for="donation-input">Increase Donation Amount:</label>
        <input type="number" placeholder= "inserisci qui la cifra che vuoi donare" min="0" id="donation-input" name="donation-input">
        <input type="submit" id="dona" onclick="buttonClick('dona');"  value="Dona">
        <div class="buttons">
            <input type="button" id="donate-50" value="50€">
            <input type="button" id="donate-100" value="100€">
            <input type="button" id="donate-250" value="250€">
            <input type="button" id="donate-500" value="500€">
        </div>
    </form> 
    <h2 id="titoloMot"><b>I Benefici di un Futuro Sostenibile</b></h2>
    <p id="motivazioni"> <b>Salvaguardia ambientale</b>: <br>Donando, aiuterai a preservare l'ambiente riducendo l'inquinamento delle acque e del suolo causato dallo smaltimento inadeguato delle batterie al litio. <br><br>
        <b>Riduzione delle emissioni di carbonio</b>: <br> Le donazioni finanzieranno progetti che adottano pratiche sostenibili per ridurre le emissioni di carbonio associate al riciclo delle batterie al litio. <br><br>
        <b>Promozione dell'innovazione</b>:<br> Le donazioni sosterranno la ricerca e lo sviluppo di soluzioni all'avanguardia per il riciclo sostenibile delle batterie al litio. <br><br>
    </p>
</section>
<?php include '../components/footer.html'; ?>
<script>
    const donationForm = document.getElementById('donation-form');
    const donationBar = document.getElementById('donation-bar');
    const donationAmountText = document.getElementById('donation-amount');
    let donationAmount = 0;
    let donationGoal = 50000; // Set your donation goal here
    donationForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const donationInput = document.getElementById('donation-input');
        const inputValue = parseInt(donationInput.value.replace('€',''));
        if(donationGoal==donationAmount){
            alert("La quota massima è già stata raggiunta! Sarà presto disponibile una nuova donazione a cui potrai partecipare se vorrai!")
        }
        else if((inputValue + donationAmount) > donationGoal){
            alert("Purtroppo il tuo contributo è più di quanto possiamo accettare!")
        }
        else{
            if (inputValue >= 0) {
                updateDonationAmount(inputValue);
                donationInput.value = '';
            } else{
                donationInput.value = '';
            }
        }
    });
    
    const donateButtons = document.querySelectorAll('input[type="button"]');
    donateButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            if(donationAmount<=donationGoal){
                event.preventDefault();
                donateAmount = parseInt(event.target.value.replace('€', ''));
                updateDonationAmount(donateAmount);
            }
        });
    });

    function updateDonationAmount(amount) {
        if((donationAmount += amount) > donationGoal){
            donationAmount -=amount;
            alert("La quota massima è già stata raggiunta! Sarà presto disponibile una nuova donazione a cui potrai partecipare se vorrai!")
        } else {
            donationAmountText.textContent = donationAmount;
            const newWidth = (donationAmount / donationGoal) * 100;
            if(newWidth == 100){
                alert('E stata raggiunta la quota stabilita! Grazie del tuo contributo :)');
                donationBar.style.width = 100 + '%';
            }
            else if(donationAmount<=donationGoal){
                donationBar.style.width = newWidth + '%';
            }
        }
    }
</script>
</body>
</html>

