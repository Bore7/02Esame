<?php
// Verifica se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Avvia la sessione
    session_start();

    // Verifica se l'utente è autenticato
    if (!isset($_SESSION["user_id"])) {
        // Se l'utente non è autenticato, reindirizzalo alla pagina di login
        header("Location: login.php");
        exit;
    }

    // INCLUDO IL FILE DI CONNESSIONE AL DATABASE
    require_once "../database.php";

    // Verifica se l'ID del lavoro è stato inviato tramite POST e se è un intero positivo
    if (isset($_POST['work_id']) && ctype_digit($_POST['work_id']) && $_POST['work_id'] > 0) {
        $work_id = $_POST['work_id'];

        // Prepara e esegui la query per eliminare il lavoro dal database
        $query = "DELETE FROM works WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $work_id);
        
        if ($stmt->execute()) {
            // Verifica il numero di righe eliminate
            if ($stmt->affected_rows > 0) {
                // Lavoro eliminato con successo
                echo "Lavoro eliminato con successo.";

                // Aggiungi un reindirizzamento JavaScript per tornare alla pagina di gestione dei lavori dopo 2 secondi
                echo '<script>
                    setTimeout(function() {
                        window.location.href = "manage_works.php";
                    }, 2000);
                </script>';
            } else {
                // Nessun lavoro eliminato
                echo "Nessun lavoro trovato con l'ID specificato.";
            }
        } else {
            // Errore durante l'esecuzione della query
            echo "Si è verificato un errore durante l'eliminazione del lavoro.";
        }

        // Chiudi lo statement
        $stmt->close();
    } else {
        // Se l'ID del lavoro non è stato fornito o non è valido, mostra un messaggio di errore
        echo "ID del lavoro non valido.";
    }

    // Chiudi la connessione al database
    $conn->close();
} else {
    // Se non è stata inviata una richiesta POST, reindirizza alla pagina di gestione dei lavori
    header("Location: manage_works.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elimina Lavoro</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="work_id">ID del Lavoro da Eliminare:</label>
        <input type="text" name="work_id" required>
        <input type="submit" value="Elimina">
    </form>
</body>
</html>