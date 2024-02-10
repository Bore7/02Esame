<?php
        include 'Contatto-Class.php';
        $errors = array();
        $invioRiuscito = false;
        
        // VERIFICA INVIO DEL FORM
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $nome = $cognome = $telefono = $email = $messaggio = ""; // INIZIALIZZO LE VARIABILI
        
            function clean_input($data) {   // PER SICUREZZA PULISCO I DATI E LI VALIDO
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        
            $nome = clean_input($_POST["nome"]);     // RIPETO PER OGNI CAMPO
            $cognome = clean_input($_POST["cognome"]);
            $telefono = clean_input($_POST["telefono"]);
            $email = clean_input($_POST["email"]);
            $messaggio = clean_input($_POST["Messaggio"]);
        
           
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
