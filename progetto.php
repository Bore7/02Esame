<?php
session_start();
require_once "backend/database.php"; // Assicurati di includere il file di connessione al database

// Verifica se il parametro "progetto" è stato passato nell'URL
if (isset($_GET['progetto'])) {
    // Pulisce e prepara il titolo del progetto dal parametro GET
    $progetto_selezionato = str_replace('_', ' ', $_GET['progetto']);

    // Esegui la query per ottenere i dettagli del progetto dal database
    $query = "SELECT * FROM works WHERE titolo = '$progetto_selezionato'";
    $result = $conn->query($query);

    // Verifica se il progetto è stato trovato nel database
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titolo = $row['titolo'];
        $ruolo = $row['ruolo'];
        $data_fine = $row['data_fine'];
        $descrizione = $row['descrizione'];
        $immagine = $row['immagine'];

        // Visualizza i dettagli del progetto
        echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sito Web Personale">
    <title>$titolo</title>
    <link href="css/stile.min.css"  rel="stylesheet">
    <link href="css/stileSezioneFooter.min.css"  rel="stylesheet">
    <link href="css/StilePaginaProgetto.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="Body-Page">
    <header class="header">
        <a href="#" class="logo"><img src="img/Logo-V.png" alt="Logo V.V" title="V.V" height="80" width="80"></a>
        <nav class="BarNav">
            <a href="index.php#Home">Home</a>
            <a href="index.php#AboutMe">About me</a>
            <a href="index.php#Portfolio" class="active">Portfolio</a>
            <a href="index.php#Contatti">Contatti</a>
        </nav>
    </header>

    <video autoplay loop muted playsinline class="Background-video">
            
        <source src="Background-video.mp4" type="video/mp4"> 
                
    </video>
    
    <section class="Introduzione-Progetto">
        <div class="Contenuto-Introduzione">
            <h1>Portfolio</h1>
            <p><i>Nome Progetto: $titolo <br>
                    Ruolo nel Progetto: $ruolo <br>
                    Quando si è concluso il progetto: $data_fine <br>
                </i></p>
        </div>
    </section>
    <section class="Progetto-Example">
        <div class="Cont-PE">
            <img src="$immagine" alt="$titolo" title="$titolo">
            <div class="Descrizione-Pjc">
                <h2>$titolo</h2>
                <p>$descrizione</p>
                <a href="index.php#Contatti">Contatta per ricevere maggiori informazioni</a>
            </div>
        </div>
    </section>
    <footer>
        <a href="#" class="logo"><img src="img/Logo-V.png" alt="Logo V.V" title="V.V" height="80" width="80"></a>
        <div class="footer">
            <div class="Recapiti">
                <p id="Contatti">Contatti</p>
                <ul>
                    <li>via Stazzo quadro 7, 00060 Riano</li>
                    <li><a href="mailto:valeriovign@outlook.com">valeriovign@outlook.com</a></li>
                    <li><a href="tel:+393319240001">+39 3318916653</a></li>
                </ul>
            </div>
            <div class="ContattamiSu">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-linkedin"></a>
                <a href="#" class="fa fa-google"></a>
            </div>
        </div>
    </footer>
</body>
</html>
HTML;

    } else {
        // Se il progetto non è stato trovato nel database, visualizza un messaggio di errore
        echo "Progetto non trovato.";
    }
} else {
    // Se il parametro "progetto" non è stato passato nell'URL, visualizza un messaggio di errore
    echo "Nessun progetto selezionato.";
}
?>