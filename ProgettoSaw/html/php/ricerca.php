<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GoGreen: Ricerca</title>

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="../../css/headerFooter.css">
    <link rel="stylesheet" href="../../css/ricerca.css">
    <link rel="icon" href="../../res/logoGoGreen.png">
    <script src="../../js/buttonClick.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
            var queryString = window.location.search;
            var urlParams = new URLSearchParams(queryString);
            var keyword = urlParams.get('keyword');

            if (keyword) {
                $('#keyword').val(keyword);
                search();
            }

            $('#icon').on('click', function(event) {
                event.preventDefault();
                search();
            });

            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                search();
            });

            function search() {
                var keyword = $('#keyword').val();
                $.ajax({
                    type: 'POST',
                    url: '../../scripts/Search.php',
                    data: { keyword: keyword },
                    success: function(response) {
                        $('#risultati').html(response);
                    },
                    error: function() {
                        $('#risultati').html('Errore durante la ricerca.');
                    }
                });
            }
        });

</script>
</head>
<body>
    <!-- session start e controllo per header -->
    <?php session_start(); require '../components/logged.php'; ?>
    <section>
    <form method="post" id="searchForm" action="../../scripts/Search.php">
        <input type="text" name="keyword" id="keyword" placeholder="Search"> 
        <div id="icon"><img src="../../res/icone/iconaSearch.png" alt="icona lente ingrandimento per la ricerca della pagina"></div>
    </form>
    <div id="risultati">
    </div>
    </section>
    <?php include '../components/footer.html'; ?>
</body>
</html>