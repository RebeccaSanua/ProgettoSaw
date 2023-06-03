<header>
    <div class="Logo">
        <a href="index.php"><img src="../../res/logoGoGreen.png" alt="Immagine logo del sito"></a>
    </div>
    <nav style="margin-left:10%;">
        <div><a href="mappa.php">Mappa</a></div>
        <div><a href="prenotaVeicolo.php">Tariffe</a></div>
        <div><a href="dona.php">Donazioni</a></div>
        <div><a href="faq.php">Faq</a></div>
        <div class="dropdown" class="dropbtn"> Il Mio Account
            <div class="dropdown-content">
              <a href="account.php">Account</a>
              <a href="noPage.php">Le mie auto</a>
              <a href="../../scripts/Logout.php" id="logout">Logout</a> <img src="../../res/icone/iconaLogout.png" alt="icona Logout">
            </div>
          </div>
          <input style="margin-left:10%;" type="text" id="box-bottom" placeholder="Search"> 
          <div id="search"><img onclick="redirect()" src="../../res/icone/iconaSearch.png" alt="icona lente ingrandimento per la ricerca della pagina"></div>
    </nav>
    <script>
      function redirect(){
        var keyword = document.getElementById("box-bottom").value;
            window.location.href = "ricerca.php?keyword=" + encodeURIComponent(keyword);
      }
  </script>
</header>