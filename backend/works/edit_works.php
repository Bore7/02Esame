<?php
// Avvia la sessione
session_start();

// Verifica se l'utente è autenticato
if (!isset($_SESSION["user_id"])) {
    // Se l'utente non è autenticato, reindirizzalo alla pagina di login
    header("Location: login.php");
    exit;
}

// Include il file di connessione al database
require_once "../database.php";

// Inizializza le variabili per memorizzare i dati del lavoro da modificare
$id = $titolo = $descrizione = $immagine = $categoria_id = $data_fine = "";

// Recupera le categorie dalla tabella categories
$query_categorie = "SELECT * FROM categories";
$result_categorie = $conn->query($query_categorie);
$categorie = [];
if ($result_categorie->num_rows > 0) {
    while ($row = $result_categorie->fetch_assoc()) {
        $categorie[] = $row;
    }
}

// Verifica se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se tutti i campi necessari sono stati compilati
    if (isset($_POST["id"], $_POST["titolo"], $_POST["descrizione"], $_POST["categoria"], $_POST["data_fine"])) {
        // Pulisci e validare i dati inviati dal modulo
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        $titolo = mysqli_real_escape_string($conn, $_POST["titolo"]);
        $descrizione = mysqli_real_escape_string($conn, $_POST["descrizione"]);
        $categoria_id = mysqli_real_escape_string($conn, $_POST["categoria"]);
        $data_fine = mysqli_real_escape_string($conn, $_POST["data_fine"]);

        // Verifica se è stata caricata una nuova immagine
        if ($_FILES["immagine"]["name"]) {
            // Percorso temporaneo del file
            $immagineTemp = $_FILES["immagine"]["tmp_name"];

            // CARTRELLA DI DESTINAZIONE PER SALVARE L'IMMAGINE
            $cartellaDestinazione = "backend/imgPrj/";

            // Sposta il file temporaneo nella cartella di destinazione con il nome originale del file
            $immagineDestinazione = $cartellaDestinazione . $_FILES["immagine"]["name"];
            move_uploaded_file($immagineTemp, $immagineDestinazione);

            // Aggiorna il campo immagine nel database
            $query_img = "UPDATE works SET immagine = '$immagineDestinazione' WHERE id = '$id'";
            if (!$conn->query($query_img)) {
                echo "Errore durante l'aggiornamento dell'immagine: " . $conn->error;
            }
        }

        // Query per aggiornare i dati del lavoro nel database
        $query = "UPDATE works SET titolo = '$titolo', descrizione = '$descrizione', category_id = '$categoria_id', data_fine = '$data_fine' WHERE id = '$id'";
        
        // Esegui la query di aggiornamento
        if ($conn->query($query) === TRUE) {
            // Reindirizza l'utente alla pagina di gestione dei lavori
            header("Location: manage_works.php");
            exit;
        } else {
            // Se si verifica un errore durante l'aggiornamento, mostra un messaggio di errore
            echo "Errore durante l'aggiornamento del lavoro: " . $conn->error;
        }
    } else {
        // Se non tutti i campi sono stati compilati, mostra un messaggio di errore
        echo "Compilare tutti i campi richiesti.";
    }
}

// Recupera l'ID del lavoro dalla query string
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Query per recuperare i dati del lavoro dal database
    $query = "SELECT * FROM works WHERE id = '$id'";
    $result = $conn->query($query);

    // Verifica se è stato trovato un lavoro con l'ID specificato
    if ($result->num_rows > 0) {
        // Estrai i dati del lavoro dalla riga risultante
        $row = $result->fetch_assoc();
        $titolo = $row["titolo"];
        $descrizione = $row["descrizione"];
        $immagine = $row["immagine"];
        $categoria_id = $row["category_id"];
        $data_fine = $row["data_fine"];
    } else {
        // Se non è stato trovato alcun lavoro con l'ID specificato, mostra un messaggio di errore
        echo "Nessun lavoro trovato con l'ID specificato.";
        exit;
    }
} else {
    // Se l'ID del lavoro non è stato specificato nella query string, mostra un messaggio di errore
    echo "ID del lavoro non specificato.";
    exit;
}

// Chiudi la connessione al database
$conn->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica Lavoro</title>
    <!-- Link ai fogli di stile CSS -->
    <link rel="stylesheet" href="../styles.css">
</head>
<style>
    /* Stile CSS per la pagina di modifica lavoro */

    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        color: #555;
    }

    input[type="text"],
    textarea,
    select {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="file"] {
        margin-bottom: 5px;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }         
</style>

<body>
    <div class="container">
        <h2>Modifica Lavoro</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="titolo">Titolo:</label><br>
            <input type="text" id="titolo" name="titolo" value="<?php echo $titolo; ?>"><br>
            <label for="descrizione">Descrizione:</label><br>
            <textarea id="descrizione" name="descrizione"><?php echo $descrizione; ?></textarea><br>
            <label for="immagine">Immagine:</label><br>
            <input type="file" id="immagine" name="immagine" accept="image/*"><br>
            <label for="categoria">Categoria:</label><br>
            <select id="categoria" name="categoria">
                <?php foreach ($categorie as $cat) : ?>
                    <option value="<?php echo $cat['category_id']; ?>" <?php echo ($categoria_id == $cat['category_id']) ? 'selected' : ''; ?>><?php echo $cat['category_name']; ?></option>
                <?php endforeach; ?>
            </select><br>
            <label for="data_fine">Data di Fine:</label><br>
            <input type="date" id="data_fine" name="data_fine" value="<?php echo $data_fine; ?>"><br>
            <input type="submit" value="Salva Modifiche">
        </form>
    </div>
</body>
</html>