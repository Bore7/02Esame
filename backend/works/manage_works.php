<?php
// Includi il file di connessione al database
require_once "../database.php";

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

    // Includi il file di connessione al database
    require_once "../database.php";

    // Verifica se l'ID del lavoro è stato inviato tramite POST
    if (isset($_POST['work_id'])) {
        $work_id = $_POST['work_id'];

        // Includi il file di connessione al database
        require_once "../database.php";

        // Prepara e esegui la query per eliminare il lavoro dal database
        $query = "DELETE FROM works WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $work_id);
        $stmt->execute();

        // Verifica se l'eliminazione è avvenuta con successo
        if ($stmt->affected_rows > 0) {
            // Lavoro eliminato con successo
            echo "Lavoro eliminato con successo.";
        } else {
            // Errore durante l'eliminazione del lavoro
            echo "Si è verificato un errore durante l'eliminazione del lavoro.";
        }

        // Chiudi lo statement
        $stmt->close();
    } else {
        // Se l'ID del lavoro non è stato fornito, mostra un messaggio di errore
        echo "ID del lavoro non fornito.";
    }

    // Chiudi la connessione al database
    $conn->close();
    exit; // Termina lo script dopo l'eliminazione del lavoro
}

// Esegui la query per ottenere tutti i lavori
$query = "SELECT * FROM works";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Works</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        .actions {
            margin-bottom: 20px;
        }
        .actions a {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        /* Stili per il pulsante di eliminazione */
        button.delete-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Elenco dei Lavori</h2>
        <div class="actions">
            <a href="add_works.php">Aggiungi Nuovo Lavoro</a>
        </div>
        <?php if ($result->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Descrizione</th>
                    <th>Azioni</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["titolo"]; ?></td>
                        <td><?php echo $row["descrizione"]; ?></td>
                        <td>
                            <a href="edit_works.php?id=<?php echo $row["id"]; ?>">Modifica</a>
                            |
                            <form action="delete_works.php" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo lavoro?');">
                                <input type="hidden" name="work_id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" class="delete-btn">Elimina</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>Nessun lavoro trovato nel database.</p>
        <?php } ?>
    </div>
</body>
</html>