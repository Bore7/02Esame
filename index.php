

<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sito Web Personale">
        <title>Sito Web Personale</title> 
        <link href="css/stile.min.css"  rel="stylesheet">
        <link href="css/stileSezionePortfolio.min.css"  rel="stylesheet">
        <link href="css/stileSezioneServizi.min.css"  rel="stylesheet">
        <link href="css/stileSezioneForm.min.css"  rel="stylesheet"> 
        <link href="css/StileAboutMe.css"  rel="stylesheet">
        <link href="css/stileSezioneHome.min.css"  rel="stylesheet">
        <link href="css/stileSezioneFooter.min.css"  rel="stylesheet">
        <link rel="stylesheet" href="css/StileCompetenze.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- link libreria per le icone social-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
        

    </head>

    <body>
        
        <header class="header">

            <a href="#" class="logo"><img src="img/Logo-V.png" alt="Logo V.V" title="V.V" height="80" width="80"></a>

            <nav class="BarNav">

                <a href="#Home" class="active" >Home</a>
                <a href="#AboutMe">About me</a>
                <a href="#Portfolio">Portfolio</a>
                <a href="#Contatti">Contatti</a>
                <!-- Aggiungi il pulsante per accedere al backend -->
                <a href="backend/login.php" class="backend-link">Area riservata</a>

            </nav>

        </header>
        
        <video autoplay loop muted playsinline class="Background-video">
            <source src="Background-video.mp4" type="video/mp4"> 
                
        </video>
        
      

        <section class="Home" id="Home">
            <div class="Contenuto-home">
                <h3>Full-Stack Developer</h3>
                <div class="TitoloNome">
                    <h1>Valerio</h1>
                    <h1>Vignali</h1>
                </div>
                <p>
                    Sono un appassionato full-stack developer con una forte passione per la creazione di soluzioni innovative e intuitive. Con competenze sia sul front-end che sul back-end, mi dedico a sviluppare esperienze utente coinvolgenti e funzionalità robuste. Lavoro con tecnologie all'avanguardia per trasformare le idee in realtà digitali, offrendo soluzioni su misura per le esigenze dei clienti.
                </p>
            </div>
            <div class="Logo-Home">
                <a href="#" class="sfondologo">
                    <img src="img/Rombo-sfondo-logo.png" alt="sfondologo" title="sfondologo" class="rombo">
                    <img src="img/Logo-V.png" alt="Logo V.V" title="V.V" class="logoVV">
                </a>
            </div>
        </section>


         <!-- Sezione About-Me -->


         <section class="About-me" id="AboutMe">
            <div class="DivImg">
                <img src="img/Programmatore.jpg" alt="Programmatore" title="About Me" width="700" height="1050" class="Programimg">
            </div>

            <div class="Contenuto-Aboutme">
                <div><h2>About Me</h2></div>
                
                <div><p>
                    Ciao, sono Valerio! Sono un appassionato di programmazione con una forte conoscenza dei linguaggi di programmazione web come HTML, CSS e PHP. La mia passione per la programmazione è stata coltivata attraverso il mio impegno nel perseguire una formazione accademica di alta qualità e nel perseguire certificazioni che dimostrano il mio livello di competenza. Ho ottenuto il livello C1 in inglese e ho conseguito diversi certificati accademici, tra cui matematica, fisica e statistica, grazie alla mia partecipazione al liceo internazionale.

                    Pur non avendo esperienza lavorativa diretta nel campo, sono attualmente impegnato nel completamento di un corso di programmazione che mi ha fornito una solida base teorica e pratica. Sono motivato, diligente e sempre desideroso di imparare e crescere professionalmente nel mondo della programmazione.

                    Fuori dall'ambito accademico, mi piace esplorare nuove tecnologie, partecipare a progetti open source e migliorare costantemente le mie abilità attraverso l'autoapprendimento e l'interazione con la community online. Sono entusiasta di mettere le mie competenze al servizio di progetti interessanti e collaborare con altri professionisti nel settore.

                    Grazie per aver visitato il mio sito web portfolio. Non vedo l'ora di connetterci e discutere eventuali opportunità di collaborazione futura!
                </p></div>

                <!-- Call to Action -->
                <div class="call-to-action">
                    <p>Se sei interessato a collaborare o vuoi saperne di più, non esitare a contattarmi!</p>
                    <a href="#form">Contact Me</a>
                </div>
            </div>
        </section>


    
            
        <section>
            <div class="servizi">
                <div class="title">
                    <h2>Servizi</h2>
                </div>

                <div class="box">
                    <?php
                    // Array associativo con descrizioni brevi e estese per ciascun servizio
                    $services = [
                        1 => [
                            'title' => 'Web Designer',
                            'short' => 'Progettazione e realizzazione di interfacce grafiche moderne per siti web.',
                            'extended' => 'Il servizio di Web Designer offre progettazione e realizzazione di interfacce grafiche moderne e intuitive per siti web, focalizzandosi sull\'esperienza utente e sull\'estetica.'
                        ],
                        2 => [
                            'title' => 'Web Master',
                            'short' => 'Gestione tecnica e operativa di siti web, configurazione server e database.',
                            'extended' => 'Il servizio di Web Master include la gestione tecnica e operativa di siti web, configurazione di server, database e servizi di backend per garantire la funzionalità e l\'ottimizzazione delle risorse.'
                        ],
                        3 => [
                            'title' => 'Frontend Developer',
                            'short' => 'Sviluppo dell\'interfaccia utente per applicazioni web.',
                            'extended' => 'Il servizio di Frontend Developer si occupa dello sviluppo dell\'interfaccia utente per applicazioni web, garantendo un\'esperienza utente ottimale attraverso un\'interfaccia intuitiva e moderna.'
                        ],
                        4 => [
                            'title' => 'Backend Developer',
                            'short' => 'Sviluppo e gestione della logica di backend per applicazioni web e sistemi informatici.',
                            'extended' => 'Il servizio di Backend Developer si occupa dello sviluppo e della gestione della logica di backend per applicazioni web e sistemi informatici, implementando le funzionalità e la logica di business necessarie per garantire il corretto funzionamento delle applicazioni.'
                        ],
                        5 => [
                            'title' => 'Full-Stack Developer',
                            'short' => 'Sviluppo completo di applicazioni web, inclusi frontend, backend e integrazione di database.',
                            'extended' => 'Il servizio di Full-Stack Developer offre uno sviluppo completo di applicazioni web, occupandosi sia del frontend che del backend, compresa l\'integrazione di database e servizi esterni per creare soluzioni web complete e funzionali.'
                        ],
                    ];
                    ?>

                    <?php foreach ($services as $service_id => $service) : ?>
                        <div class="servizio" id="D<?php echo $service_id; ?>">
                            <span class="material-symbols-outlined">home</span>
                            <h5><?php echo $service['title']; ?></h5>
                            <div class="Descrizione">
                                <p><?php echo $service['short']; ?></p>
                                <?php
                                if (isset($_GET['service_id']) && $_GET['service_id'] == $service_id) {
                                    echo '<div class="additional-text">';
                                    echo '<p>' . $service['extended'] . '</p>';
                                    echo '</div>';
                                }
                                ?>
                                <p style="text-align: center;">
                                    <a class="button" href="?service_id=<?php echo $service_id; ?>#D<?php echo $service_id; ?>">Read More</a>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        
        <section class="Competenze" id="Competenze">
            <div class="container">
                <h2 class="Sezione-Titolo">Le mie competenze</h2>
                <div class="categorie">
                    <div class="categoria categoria-frontend">
                        <h3 class="categoria-titolo">Frontend Development</h3>
                        <ul class="competenze-lista">
                            <li><i class="fab fa-html5"></i> HTML5</li>
                            <li><i class="fab fa-css3-alt"></i> CSS e SASS</li>
                            <li><i class="fab fa-js"></i> JavaScript (ES6+)</li>
                            <li><i class="fab fa-react"></i> React.js</li>
                            <li><i class="fab fa-angular"></i> Angular</li>
                            <li><i class="fab fa-bootstrap"></i> Bootstrap</li>
                            <li><i class="fab fa-js-square"></i> TypeScript</li>
                        </ul>
                    </div>
                    <div class="categoria categoria-backend">
                        <h3 class="categoria-titolo">Backend Development</h3>
                        <ul class="competenze-lista">
                            <li><i class="fab fa-php"></i> PHP (Laravel)</li>
                            <li><i class="fab fa-node"></i> Node.js</li>
                            <li><i class="fab fa-python"></i> Python (Django)</li>
                            <li><i class="fas fa-database"></i> MySQL</li>
                        </ul>
                    </div>
                    <div class="categoria categoria-altre">
                        <h3 class="categoria-titolo">Altre Competenze</h3>
                        <ul class="competenze-lista">
                            <li><i class="fas fa-paint-brush"></i> Progettazione Grafica (Photoshop, Figma)</li>
                            <li><i class="fas fa-cogs"></i> API (RESTful)</li>
                            <li><i class="fab fa-react"></i> React Native</li>
                            <li><i class="fab fa-react"></i> Redux</li>
                            <li><i class="fas fa-bolt"></i> RxJS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

       

        <script>
            // Aggiungi effetto di animazione quando la sezione delle competenze è visibile
            document.addEventListener("DOMContentLoaded", function () {
                var competenzeSection = document.getElementById("Competenze");

                function mostraSezioneCompetenze() {
                    var rect = competenzeSection.getBoundingClientRect();
                    var windowHeight = window.innerHeight || document.documentElement.clientHeight;
                    if (rect.top <= windowHeight) {
                        competenzeSection.classList.add("mostrato");
                        window.removeEventListener("scroll", mostraSezioneCompetenze);
                    }
                }

                window.addEventListener("scroll", mostraSezioneCompetenze);
                mostraSezioneCompetenze();
            });
        </script>



     
       <!-- Sezione Portfolio -->

       <?php
        require_once "backend/database.php";

        // Esegui la query per ottenere tutti i progetti dal database, includendo l'ID della categoria
        $query = "SELECT works.*, categories.category_name 
                FROM works 
                INNER JOIN categories ON works.category_id = categories.category_id";
        $result = $conn->query($query);

        // Verifica se ci sono progetti nel database
        if ($result->num_rows > 0) {
            $progetti = [];
            // Estrai i dati dei progetti
            while ($row = $result->fetch_assoc()) {
                $progetto = [
                    'titolo' => $row['titolo'],
                    'immagine' => $row['immagine'],
                    'categoria' => $row['category_name'],
                    'data_fine' => $row['data_fine']
                    // Aggiungi altre colonne se necessario
                ];
                $progetti[] = $progetto;
            }
        } else {
            echo "Nessun progetto trovato nel database.";
            exit; // Esci dallo script se non ci sono progetti nel database
        }

        $categoriaSelezionata = isset($_GET['categoria']) ? $_GET['categoria'] : 'All';
        $categorieUniche = array_unique(array_column($progetti, 'categoria'));
        ?>

        <section class="Lavori" id="Portfolio">
            <div class="container">
                <div class="Titolo-sezione-prj">
                    <h2 class="Quality-works-Progetti-Recenti">Quality works & Progetti Recenti</h2>
                </div>
                <h6><i>Categoria del progetto:</i></h6>
            </div>

            <div class="Bottoni-Lavori">
                <a href="?categoria=All#Portfolio" class="<?= ($categoriaSelezionata == 'All' ? 'active' : '') ?>">All</a>
                <?php
                foreach ($categorieUniche as $categoria) {
                    echo '<a href="?categoria=' . urlencode($categoria) . '#Portfolio" class="' . ($categoriaSelezionata == $categoria ? 'active' : '') . '">' . $categoria . '</a>';
                }
                ?>
            </div>

            <div class="row-grid">
                <?php
                if (isset($_GET['categoria'])) {
                    $categoriaSelezionata = $_GET['categoria'];
                    $progettiFiltrati = array_filter($progetti, function ($progetto) use ($categoriaSelezionata) {
                        return $progetto['categoria'] == $categoriaSelezionata;
                    });

                    if ($categoriaSelezionata == 'All' || empty($progettiFiltrati)) {
                        $progettiDaMostrare = $progetti;
                    } else {
                        $progettiDaMostrare = $progettiFiltrati;
                    }
                } else {
                    $progettiDaMostrare = $progetti;
                }

                usort($progettiDaMostrare, function ($a, $b) {
                    return strtotime($b['data_fine']) - strtotime($a['data_fine']);
                });

                foreach ($progettiDaMostrare as $progetto) {
                    echo '<div class="img">';
                    echo '<a href="progetto.php?progetto=' . urlencode($progetto['titolo']) . '">';
                    echo '<img src="' . $progetto['immagine'] . '" alt="' . $progetto['titolo'] . '" title="' . $progetto['titolo'] . '" class="pjimg">';
                    echo '</a>';
                    echo '<div class="Titolo-pj">';
                    echo '<h4>' . $progetto['titolo'] . '</h4>';
                    echo '<span class="Testo-secondario">' . $progetto['categoria'] . '</span>';
                    echo '<p>Data di fine: ' . $progetto['data_fine'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>







        <!-- Sezione Compilazione form-->
        <section class="form" id="form">
            <div class="Titolo-Form">
                <h1>Compila per richiedere informazioni </h1>
                <p>Inserisci i tuoi contatti</p>

            </div>

            <?php include 'processa_form.php'; ?> <!-- Includi il file processa_form.php -->

    

            <form action="index.php#form" method="post">
                <div class="Nome-Cognome">
                    <input type="text" name="nome" size="15" placeholder="Nome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : ''; ?>" required>
                    <input type="text" name="cognome" size="15" placeholder="Cognome" value="<?php echo isset($_POST['cognome']) ? htmlspecialchars($_POST['cognome']) : ''; ?>">
                </div>

                <div class="Tel-Email">
                    <input type="tel" name="telefono" placeholder="Telefono" value="<?php echo isset($_POST['telefono']) ? htmlspecialchars($_POST['telefono']) : ''; ?>">
                    <input type="email" name="email" placeholder="Indirizzo E-mail" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                </div>

                <div class="Textarea">
                    <textarea name="Messaggio" cols="20" rows="4" placeholder="Scrivi il tuo messaggio"><?php echo isset($_POST['Messaggio']) ? htmlspecialchars($_POST['Messaggio']) : ''; ?></textarea>
                </div>

                <div class="Submit-button">
                    <input type="submit" value="Invia">
                </div>
            </form>


             <!-- Visualizzazione del messaggio di successo -->
             <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                <?php if ($invioRiuscito): ?>
                    <div style="color: green; text-align: center;">I dati sono stati inviati con successo!</div>   <!-- Metto lo stile del div direttamente qua dentro, l ho fatto anche in processa_form.php -->
                    
                <?php endif; ?>
            <?php endif; ?>

                
    

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