<?php
session_start();

// Connessione al database
require_once "../database.php";

// Variabile per contenere eventuali messaggi di errore
$error = '';

// Verifica se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera il nome della nuova categoria
    $new_name = $_POST["new_name"];

    // Validazione del campo
    if (empty($new_name)) {
        $error = "Il campo Nome Categoria è obbligatorio.";
    } else {
        // Prepara e esegui l'istruzione SQL per inserire la nuova categoria nel database
        $query = "INSERT INTO categories (category_name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $new_name);

        if ($stmt->execute()) {
            // Categoria inserita con successo
            echo "<script>alert('Categoria aggiunta con successo!');</script>";
        } else {
            // Errore durante l'inserimento della categoria
            $error = "Si è verificato un errore durante l'inserimento della categoria.";
        }

        // Chiudi lo statement
        $stmt->close();
    }
}

// Chiudi la connessione al database
$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Categoria</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 400px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button[type="submit"], a.button {
        display: block;
        width: 100%;
        padding: 10px 20px;
        margin-top: 20px;
        text-align: center;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        box-sizing: border-box; /* Aggiunto box-sizing per includere padding e border nel calcolo della larghezza */
    }

    button[type="submit"]:hover, a.button:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }

    /* Aggiunta regola per il pulsante di ritorno */
    .button-container {
        margin-top: 20px; /* Margine superiore per spostare il pulsante verso il basso */
        text-align: center; /* Allineamento al centro per il pulsante */
        box-sizing: border-box; /* Aggiunto box-sizing per includere padding e border nel calcolo della larghezza */
    }
</style>
</head>
<body>

<div class="container">
    <h2>Aggiungi Categoria</h2>
    <?php if (!empty($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="new_name">Nome Categoria:</label><br>
        <input type="text" id="new_name" name="new_name" required><br><br>
        <button type="submit">Aggiungi Categoria</button>
    </form>

    <!-- Contenitore per il pulsante di ritorno -->
    <div class="button-container">
        <a class="button" href="manage_categories.php">Torna a Gestione Categorie</a>
    </div>
</div>

</body>
</html>