<?php
session_start();

// Connessione al database
require_once "../database.php";

// Se è stato inviato l'id della categoria da eliminare
if (isset($_GET["delete_id"]) && !empty($_GET["delete_id"])) {
    // Prendi l'id della categoria da eliminare
    $delete_id = $_GET["delete_id"];

    // Prepara e esegui l'istruzione SQL per eliminare la categoria
    $query = "DELETE FROM categories WHERE category_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $delete_id);
    if ($stmt->execute()) {
        echo "<script>alert('Categoria eliminata con successo!');</script>";
        // Redirect alla pagina stessa per aggiornare la lista delle categorie
        echo "<script>window.location.href = 'manage_categories.php';</script>";
        exit;
    } else {
        echo "<script>alert('Si è verificato un errore durante l'eliminazione della categoria.');</script>";
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Categorie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .add-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .dashboard-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Esegui la query per ottenere tutte le categorie
    $query = "SELECT * FROM categories";
    $result = $conn->query($query);

    // Verifica se ci sono categorie nel database
    if ($result->num_rows > 0) {
        // Creazione della tabella per visualizzare le categorie
        echo "<h2>Categorie</h2>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nome</th><th>Azioni</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["category_id"] . "</td>";
            echo "<td>" . $row["category_name"] . "</td>";
            echo "<td>
                      <a href='edit_category.php?id=" . $row["category_id"] . "'>Modifica</a> | 
                      <a href='?delete_id=" . $row["category_id"] . "' onclick='return confirm(\"Sei sicuro di voler eliminare questa categoria?\")'>Elimina</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nessuna categoria trovata.</p>";
    }

    // Chiudi la connessione al database
    $conn->close();
    ?>

    <!-- Aggiungi un link per aggiungere una nuova categoria -->
    <a class="add-link" href="add_category.php">Aggiungi Nuova Categoria</a>

    <!-- Aggiungi un link per tornare alla dashboard -->
    <a class="dashboard-link" href="../dashboard.php">Torna alla Dashboard</a>
</div>

</body>
</html>