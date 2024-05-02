<?php
$servername = "89.46.111.220"; // Indirizzo IP del server MySQL
$username = "11551973@aruba.it"; // Nome utente del database MySQL
$password = "D3v0F4rl017.!2"; // Password del database MySQL
$database = "Sql1784935"; // Nome del database

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $database);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
} else {
    echo "Connessione al database riuscita!";
}
?>