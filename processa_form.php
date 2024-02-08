<?php
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
        
            if (empty($errors)) {   // SALVO IN JSON SE NON CI SONO ERRORI
                // Crea un array con i dati del form
                $form_data = array(
                    "nome" => $nome,
                    "cognome" => $cognome,
                    "telefono" => $telefono,
                    "email" => $email,
                    "messaggio" => $messaggio
                );
        
                
                $json_data = json_encode($form_data);
        
               
                file_put_contents("Dati-Form.json", $json_data);
                $invioRiuscito = true;
        
               
            }
        }
        
        // Se non ci sono errori e l'invio è riuscito, reindirizza la pagina all'ancora del form
   
        
        // Se ci sono errori, visualizzali all'utente
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '<div style="color: red;">' . $error . '</div>';
            }
        }



?>
