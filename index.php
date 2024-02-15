<!DOCTYPE html>
<html lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sito Web Personale">
        <title>Sito Web Personale</title> 
        <link href="css/stile.min.css"  rel="stylesheet">
        <link href="css/stileSezioneProgetti.min.css"  rel="stylesheet">
        <link href="css/stileSezioneServizi.min.css"  rel="stylesheet">
        <link href="css/stileSezioneForm.min.css"  rel="stylesheet"> 
        <link href="css/stileSezioneAboutMe.min.css"  rel="stylesheet">
        <link href="css/stileSezioneHome.min.css"  rel="stylesheet">
        <link href="css/stileSezioneFooter.min.css"  rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- link libreria per le icone social-->
        

    </head>

    <body>
        
        <header class="header">

            <a href="#" class="logo"><img src="img/Logo-V.png" alt="Logo V.V" title="V.V" height="80" width="80"></a>

            <nav class="BarNav">

                <a href="#Home" class="active" >Home</a>
                <a href="#AboutMe">About me</a>
                <a href="#Portfolio">Portfolio</a>
                <a href="#Contatti">Contatti</a>

            </nav>

        </header>
        
        <video autoplay loop muted playsinline class="Background-video">
            <source src="Background-video.mp4" type="video/mp4"> 
                
        </video>
        
      

        <section class="Home" id="Home">
            
            <div class="Contenuto-home">
                <h3>Full-Stack Developer</h3>
                <div class="TitoloNome"><h1>Valerio </h1>
                    <h1> Vignali</h1></div>
            
                
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum."
                </p>
            </div>
            <div class="Logo-Home">
                <a href="#" class="sfondologo"><img src="img/Rombo-sfondo-logo.png" alt="sfondologo" title="sfondologo" class="rombo"><img src="img/Logo-V.png" alt="Logo V.V" title="V.V" class="logoVV" ></a>
    


            </div>


        </section>


         <!-- Sezione About-Me -->


        <section class="About-me" id="AboutMe">

            <div class="DivImg"><img src="img/Programmatore.jpg" alt="Programmatore" title="About Me" width="700" height="1050" class="Programimg"> </div>


            
            <div class="Contenuto-Aboutme">
                
                <div > <h2>About Me</h2></div>
                
                
                <div> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                    laborum.
                </p></div>

                <!-- Sezione Linguaggi di Programmazione Preferiti -->
                <div class="Preferiti">
                    <h3>Linguaggi di Programmazione Preferiti</h3>
                    <ul>
                        <li><strong>HTML:</strong> HTML è il linguaggio standard per la creazione di pagine web.</li>
                        <li><strong>CSS/SCSS:</strong> CSS (e SCSS) è utilizzato per lo stile e la formattazione delle pagine web.</li>
                        <li><strong>PHP:</strong> PHP è un linguaggio di scripting ampiamente utilizzato per lo sviluppo web lato server.</li>
                        <!-- Aggiungi altri linguaggi di programmazione preferiti con una breve descrizione -->
                    </ul>
                </div>

            </div>
        </section>

        
         <!-- Sezione Servizi -->
        <section class="Servizi" id="Servizi">



            
            <div class="servizi">
                <div class="title">
                    <h2>Servizi</h2>
                </div>

                <div class="box">

                <?php
            // Controlla se il parametro service_id è stato fornito nella richiesta
            if (isset($_GET['service_id'])) {
                $service_id = $_GET['service_id'];

                // Utilizza $service_id per recuperare la descrizione completa del servizio dal tuo database o da un array
                // Ad esempio, puoi avere un array associativo con le descrizioni dei servizi
                $services = [
                    1 => "Testo aggiuntivo per il primo servizio.",
                    2 => "Testo aggiuntivo per il secondo servizio.",
                    3 => "Testo aggiuntivo per il terzo servizio.",
                    4 => "Testo aggiuntivo per il quarto servizio.",
                    5 => "Testo aggiuntivo per il quinto servizio.",
                ];

               
            }
            ?>
                    

                    <div class="servizio">
                        
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h5>Web Designer</h5>

                        <div class="Descrizione" id="D1">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                .</p>

                                <?php
                            if (isset($_GET['service_id']) && $_GET['service_id'] == 1) {
                                echo '<div class="additional-text">';
                                echo '<p>' . $services[1] . '</p>';
                                echo '</div>';
                            }
                            ?>
                            
                            <p style="text-align: center;">
                            <a class="button" href="?service_id=1#D1">Read More</a></p>
                        </div>


                    </div>

                    <div class="servizio">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h5>Web Master</h5>

                        <div class="Descrizione" id="D2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </p>

                            <?php
                            if (isset($_GET['service_id']) && $_GET['service_id'] == 2) {
                                echo '<div class="additional-text">';
                                echo '<p>' . $services[2] . '</p>';
                                echo '</div>';
                            }
                            ?>
                            
                            <p style="text-align: center;">
                            <a class="button" href="?service_id=2#D2">Read More</a></p>
                        </div>

                    </div>

                    <div class="servizio" id="D3">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h5>Frontend Developer</h5>

                        <div class="Descrizione">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                               </p>
                            
                            <?php
                            if (isset($_GET['service_id']) && $_GET['service_id'] == 3) {
                                echo '<div class="additional-text">';
                                echo '<p>' . $services[3] . '</p>';
                                echo '</div>';
                            }
                            ?>

                            
                            
                            <p style="text-align: center;">
                            <a class="button" href="?service_id=3#D3">Read More</a></p>
                        </div>


                    </div>


                    <div class="servizio">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h5>Backend Developer</h5>


                        <div class="Descrizione" id="D4">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                </p>
                                <?php
                            if (isset($_GET['service_id']) && $_GET['service_id'] == 4) {
                                echo '<div class="additional-text">';
                                echo '<p>' . $services[4] . '</p>';
                                echo '</div>';
                            }
                            ?>
                            
                            <p style="text-align: center;">
                            <a class="button" href="?service_id=4#D4">Read More</a></p>
                        </div>


                    </div>


                    <div class="servizio">
                        <span class="material-symbols-outlined">
                            home
                        </span>
                        <h5>Full-Stack Developer</h5>

                        <div class="Descrizione" id="D5">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  
                                </p>
                                <?php
                            if (isset($_GET['service_id']) && $_GET['service_id'] == 5) {
                                echo '<div class="additional-text">';
                                echo '<p>' . $services[5] . '</p>';
                                echo '</div>';
                            }
                            ?>
                            
                            <p style="text-align: center;">
                            <a class="button" href="?service_id=5#D5">Read More</a></p>
                        </div>

                        


                    </div>
                </div>


                    
                    
                
            </div>
        </section>



        <!-- Sezione Portfolio -->

        <?php
        $progetti_json = file_get_contents('Lavori-progetti.json');   // PRNEDO IL CONTENUTO FILE SCRITTO NEL FILE JSON 
        $progetti = json_decode($progetti_json, true);    // DECODIFICO JSON IN PHP

        $ruoloSelezionato = isset($_GET['ruolo']) ? $_GET['ruolo'] : 'All'; // Impostazione predefinita su 'All'

        function getRuoliUnici($progetti)
        {
            $ruoli = array_column($progetti, 'ruolo');
            $ruoliUnici = array_unique($ruoli); // RESTITUISCE SOLO I VALORE UNICI PRESENTI NELL ARRAY DI INPUT $ARRAY PERCHE ALCUNI RUOLI SARANNO
            return $ruoliUnici;
        }

        $ruoliUnici = getRuoliUnici($progetti);
        ?>

        <section class="Lavori" id="Portfolio">
            <div class="container">
                <div class="Titolo-sezione-prj">
                    <h2 class="Quality-works-Progetti-Recenti">Quality works & Progetti Recenti</h2>
                </div>
                <h6><i>Ruolo nel progetto:</i></h6>
            </div>

            <div class="Bottoni-Lavori">
                <?php
                // PULSANTE ALL  PER VEDERE TUTTI I PROGETTI
                echo '<a href="?ruolo=All#Portfolio" class="' . ($ruoloSelezionato == 'All' ? 'active' : '') . '">All</a>';  

                // PULSANTI PER ALTRI RUOLI
                foreach ($ruoliUnici as $ruolo) {
                    echo '<a href="?ruolo=' . urlencode($ruolo) . '#Portfolio" class="' . ($ruoloSelezionato == $ruolo ? 'active' : '') . '">' . $ruolo . '</a>';
                }
                ?>
            </div>

            <div class="row-grid">
                <?php
                foreach ($progetti as $progetto) {
                    echo '<div class="img">';
                    echo '<a href="progetto.php?progetto=' . urlencode(str_replace(' ', '_', $progetto['titolo'])) . '">';  // MODIFICO IL LINK PER PASSARE A PROGETTO.PHP
                    echo '<img src="' . $progetto['immagine'] . '" alt="' . $progetto['titolo'] . '" title="' . $progetto['titolo'] . '" class="pjimg">';
                    echo '</a>'; // CHIUDO IL TAG A
                    echo '<div class="Titolo-pj">';
                    echo '<h4>' . $progetto['titolo'] . '</h4>';
                    echo '<span class="Testo-secondario">' . $progetto['ruolo'] . '</span>';
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