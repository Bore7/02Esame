<?php
session_start();

// Connessione al database
require_once "../database.php";

// Se è stato inviato il modulo di modifica categoria
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se tutti i campi sono stati compilati
    if (isset($_POST["category_id"]) && isset($_POST["new_name"])) {
        $category_id = $_POST["category_id"];
        $new_name = $_POST["new_name"];

        // Prepara e esegui l'istruzione SQL per aggiornare il nome della categoria
        $query = "UPDATE categories SET category_name = ? WHERE category_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $new_name, $category_id);
        if ($stmt->execute()) {
            echo "<script>alert('Nome categoria aggiornato con successo!');</script>";
        } else {
            echo "<script>alert('Si è verificato un errore durante l'aggiornamento del nome della categoria.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Si è verificato un errore durante l'elaborazione del modulo. Assicurati di compilare tutti i campi.');</script>";
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
    <title>Modifica Categoria</title>
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

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Modifica Categoria</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="category_id">ID Categoria:</label><br>
        <input type="text" id="category_id" name="category_id" required><br>
        <label for="new_name">Nuovo Nome:</label><br>
        <input type="text" id="new_name" name="new_name" required><br><br>
        <button type="submit">Aggiorna Nome Categoria</button>
    </form>
</div>

</body>
</html>