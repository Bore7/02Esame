<?php
$servername = "89.46.111.220"; // Indirizzo IP del server MySQL
$username = "Sql1784935"; // Nome utente del database MySQL
$password = "D3v0F4rl017.!2"; // Password del database MySQL
$database = "Sql1784935_1"; // Nome del database

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $database);

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $database);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}
?>