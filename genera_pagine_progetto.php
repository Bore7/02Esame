<?php
// CODICE PER OTTENERE PROGETTI SIMILI

$progetti_json = file_get_contents('Lavori-progetti.json');
$progetti = json_decode($progetti_json, true);

foreach ($progetti as $progetto) {
    $titolo = $progetto['titolo'];
    $ruolo = $progetto['ruolo'];
    $data = $progetto['data_fine'];

    $nome_file = str_replace(' ', '_', $titolo) . '.html';

    // DEFINIZIO CONTENUTO PAGINA CON L HTML
    $contenuto_pagina = <<<HTML


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sito Web Personale">
    <title>$titolo</title>
    <link href="../Progetto/css/stile.min.css"  rel="stylesheet">
    <link href="../Progetto/css/stileSezioneFooter.min.css"  rel="stylesheet">
    <link href="../Progetto/css/StilePaginaProgetto.min.css"  rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="Body-Page">
    <header class="header">
        <a href="#" class="logo"><img src="img/Logo-V.png" alt="Logo V.V" title="V.V" height="80" width="80"></a>
        <nav class="BarNav">
            <a href="../Progetto/index.php#Home">Home</a>
            <a href="../Progetto/index.php#AboutMe">About me</a>
            <a href="../Progetto/index.php#Portfolio" class="active">Portfolio</a>
            <a href="../Progetto/index.php#Contatti">Contatti</a>
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
                    Quando si è concluso il progetto: $data <br>
                </i></p>
        </div>
    </section>
    <section class="Progetto-Example">
        <div class="Cont-PE">
            <img src="{$progetto['immagine']}" alt="$titolo" title="$titolo">
            <div class="Descrizione-Pjc">
                <h2>$titolo</h2>
                <p>{$progetto['descrizione']}</p>
                <a href="../Progetto/index.php#Contatti">Contatta per ricevere maggiori informazioni</a>
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

    // SCRIVO il contenuto della pagina HTML nel file solo se non esiste già
    if (!file_exists($nome_file)) {
        file_put_contents($nome_file, $contenuto_pagina);
    }
}
?>