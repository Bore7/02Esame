<?php
        include 'Contatto-Class.php';
        $errors = array();
        $invioRiuscito = false;

        // INIZIALIZZO LE VARIABILI E MANTENGO I VALORI DEL FORM PER FARE IN MODO CHE SI MANTENGANO ANCHE QUANDO CI STA UN ERRORE
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
        $cognome = isset($_POST["cognome"]) ? $_POST["cognome"] : "";
        $telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $messaggio = isset($_POST["Messaggio"]) ? $_POST["Messaggio"] : "";
                
        // VERIFICA INVIO DEL FORM
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $nome = $cognome = $telefono = $email = $messaggio = ""; // INIZIALIZZO LE VARIABILI
        
            function clean_input($data) {   // PER SICUREZZA PULISCO I DATI E LI VALIDO
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        
            
            // RIPULISCO E VALIDO I DATI DEL FORM
            $nome = clean_input($nome);
            $cognome = clean_input($cognome);
            $telefono = clean_input($telefono);
            $email = clean_input($email);
            $messaggio = clean_input($messaggio);
        
           
            if (empty($nome)) {   // FUNZIONE EMPTY PER FARE IN MODO CHE IL CAMPO NON VENGA LASCIATO VUOTO
                $errors[] = "Il campo nome è obbligatorio";
            }
        
            if (empty($cognome)) {
                $errors[] = "Il campo cognome è obbligatorio";
            }
        
           
            // Validazione del numero di telefono
            if (!preg_match("/^[0-9]{10}$/", $telefono)) {
                $errors[] = "Il numero di telefono deve contenere 10 cifre.";
            }
        
            // Validazione del campo email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'indirizzo email non è valido";
            }
        
            if (empty($errors)) {
                // CREO UN NUOVO OGGETTO CONTATTO CON LA CLASSE CONTATTO CHE HO CREATO
                $contatto = new Contatto($nome, $cognome, $telefono, $email, $messaggio);
        
                // Salva i dati del contatto in formato JSON
                $json_data = json_encode($contatto);
                file_put_contents("Dati-Form.json", $json_data);
        
                // Salva i dati del contatto in un file di testo
                $text_data = $contatto->toText();
                file_put_contents("Dati-Form.txt", $text_data, FILE_APPEND);
        
                $invioRiuscito = true;
            }
        }
        
        
   
        
        // Se ci sono errori, visualizzali all'utente
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div style="color: red; text-align: center;">' . $error . '</div>';
            }
        }



?>
