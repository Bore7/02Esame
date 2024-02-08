<?php
// Controlla se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal form
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $messaggio = $_POST["Messaggio"];

    // Crea un array con i dati del form
    $dati_form = array(
        "nome" => $nome,
        "cognome" => $cognome,
        "telefono" => $telefono,
        "email" => $email,
        "messaggio" => $messaggio
    );

    // Codifica l'array in formato JSON
    $dati_form_json = json_encode($dati_form);

    // Scrivi i dati JSON nel file "Dati-Form.json"
    file_put_contents("Dati-Form.json", $dati_form_json);

    // Invia una conferma di avvenuta elaborazione del form
    echo "Dati del form elaborati con successo!";
} else {
    // Se il form non è stato inviato, visualizza un messaggio di errore
    echo "Errore: il form non è stato inviato correttamente.";
}
?>