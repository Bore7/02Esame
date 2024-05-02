<?php
session_start();
require_once "../database.php";

// Query per recuperare le categorie esistenti
$query_categorie = "SELECT * FROM categories";
$result_categorie = $conn->query($query_categorie);
$categorie = [];
if ($result_categorie->num_rows > 0) {
    while ($row = $result_categorie->fetch_assoc()) {
        $categorie[] = $row;
    }
}
$result_categorie->free_result();

// Variabile per contenere eventuali messaggi di errore
$error = '';

// Verifica se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati dal modulo
    $titolo = $_POST["titolo"];
    $descrizione = $_POST["descrizione"];
    $categoria_id = $_POST["categoria"];
    $data_fine = $_POST["data_fine"];

    // Validazione dei campi
    if (empty($titolo) || empty($descrizione) || empty($_FILES["immagine"]["name"]) || empty($categoria_id) || empty($data_fine)) {
        $error = "Tutti i campi sono obbligatori.";
    } elseif (strlen($titolo) > 100) {
        $error = "Il titolo non può superare i 100 caratteri.";
    } elseif (strlen($descrizione) > 500) {
        $error = "La descrizione non può superare i 500 caratteri.";
    } elseif (!is_numeric($categoria_id) || $categoria_id <= 0) {
        $error = "Categoria non valida.";
    } elseif (!strtotime($data_fine)) {
        $error = "Data di fine non valida.";
    } else {
        // Cartella di destinazione per salvare l'immagine sul server FTP
        $ftp_server = 'ftp.valeriovignali.it';
        $ftp_user = '11551973@aruba.it';
        $ftp_pass = 'D3v0F4rl017!';
        $ftp_dir = '/valeriovignali.it/backend/works/imgPrj/';

        // Connessione FTP
        $conn_id = ftp_connect($ftp_server);
        if (!$conn_id) {
            die("Impossibile connettersi al server FTP");
        }

        // Accesso FTP
        $login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
        if (!$login_result) {
            die("Login FTP fallito");
        }

        // Cambia la directory remota
        if (!ftp_chdir($conn_id, $ftp_dir)) {
            die("Impossibile cambiare la directory remota");
        }

        // Nome dell'immagine con timestamp per renderlo unico
        $imageName = time() . '_' . $_FILES["immagine"]["name"];

        // Sostituisci gli spazi nel nome dell'immagine con underscore
        $imageName = str_replace(' ', '_', $imageName);

        // Carica il file sul server FTP
        if (ftp_put($conn_id, $imageName, $_FILES["immagine"]["tmp_name"], FTP_BINARY)) {
            // Percorso completo dell'immagine per il database
            $imagePath = 'backend/works/imgPrj/' . $imageName;

            // Esegui la query per inserire il nuovo lavoro nel database
            $query = "INSERT INTO works (titolo, descrizione, immagine, category_id, data_fine) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("sssds", $titolo, $descrizione, $imagePath, $categoria_id, $data_fine);

            if ($stmt->execute()) {
                // Reindirizza alla pagina di gestione dei lavori
                header("Location: manage_works.php");
                exit;
            } else {
                $error = "Errore durante l'inserimento del lavoro nel database.";
            }
        } else {
            $error = "Errore nel caricamento dell'immagine sul server FTP.";
        }

        // Chiudi la connessione FTP
        ftp_close($conn_id);
    }
}

// Query per recuperare le categorie dal database
$query_categorie = "SELECT category_id, category_name FROM categories";
$result_categorie = $conn->query($query_categorie);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiungi Nuovo Lavoro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], textarea, select, input[type="date"], input[type="file"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Aggiungi Nuovo Lavoro</h2>
        <?php if (!empty($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <label for="titolo">Titolo:</label>
            <input type="text" id="titolo" name="titolo" required>
            <label for="descrizione">Descrizione:</label>
            <textarea id="descrizione" name="descrizione" rows="4" required></textarea>
            <label for="immagine">Immagine:</label>
            <input type="file" id="immagine" name="immagine" accept="image/*" required>
            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="" disabled selected>Scegli una categoria</option>
                <?php foreach ($categorie as $cat) : ?>
                    <option value="<?php echo $cat['category_id']; ?>"><?php echo $cat['category_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="data_fine">Data di Fine:</label>
            <input type="date" id="data_fine" name="data_fine" required>
            <input type="submit" value="Aggiungi Lavoro">
        </form>
        <p><a href="manage_works.php">Torna alla Gestione dei Lavori</a></p>
    </div>
</body>
</html>