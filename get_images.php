<?php
// Connessione al database
require_once "backend/database.php";

// Query per selezionare i percorsi delle immagini dai progetti
$query = "SELECT immagine FROM works";
$result = $conn->query($query);

$images = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = array(
            'image_url' => $row['immagine'],
            'image_alt' => 'Descrizione immagine' // Puoi sostituire questa stringa con una descrizione reale dell'immagine se disponibile nel tuo database
        );
    }
}

// Chiudi la connessione al database
$conn->close();

// Restituisci i dati delle immagini come JSON
header('Content-Type: application/json');
echo json_encode($images);
?>