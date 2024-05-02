<?php
session_start();

// Connessione al database
require_once "../database.php";

// Verifica se l'utente è autenticato, altrimenti reindirizza al login
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit;
}

// Verifica se è stato fornito un parametro ID valido
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    // Ottieni l'ID dell'utente da eliminare
    $user_id = $_GET["id"];

    // Query per eliminare l'utente dal database
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    
    // Esegui la query
    if($stmt->execute()) {
        // Reindirizza alla pagina di gestione degli utenti con un messaggio di successo
        header("Location: manage_users.php?delete_success=true");
        exit;
    } else {
        // Se si verifica un errore durante l'eliminazione, reindirizza con un messaggio di errore
        header("Location: manage_users.php?delete_error=true");
        exit;
    }
} else {
    // Se non viene fornito un ID valido, reindirizza con un messaggio di errore
    header("Location: manage_users.php?delete_error=true");
    exit;
}

// Chiudi la connessione al database
$conn->close();
?>