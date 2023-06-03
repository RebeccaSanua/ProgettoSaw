<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="icon" href="../../res/goGreen-vuoto.png">
    <style>
        h1{
            display: block;
            text-align: center;
            color: black;
            font-family: "Open Sans", sans-serif;
            font-size:25pt;
            margin-top:20%;
            margin-bottom:20%;
        } 
    </style>
</head>
<body>
    <!-- session start e controllo per header -->
    <?php session_start(); require '../components/logged.php'; ?>
   <h1>Presto disponibile.</h1>
    <?php include '../components/footer.html'; ?>
</body>
</html>