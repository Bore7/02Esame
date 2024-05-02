<?php
session_start();

// Connessione al database
require_once "../database.php";

// Verifica se l'utente è autenticato, altrimenti reindirizza al login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// Verifica se è stato fornito un ID utente valido
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "ID utente non valido.";
    exit;
}

$user_id = $_GET["id"];

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati inviati dal form
    $username = $_POST["username"];
    $email = $_POST["email"];

    // Esegui la query per aggiornare le informazioni dell'utente nel database
    $query = "UPDATE users SET username = ?, email = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $username, $email, $user_id);
    $stmt->execute();

    // Reindirizza alla pagina di gestione degli utenti dopo l'aggiornamento
    header("Location: manage_users.php");
    exit;
}

// Esegui la query per ottenere le informazioni dell'utente dal database
$query = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se l'utente esiste nel database
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $username = $row["username"];
    $email = $row["email"];
} else {
    echo "Utente non trovato.";
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
    <link rel="stylesheet" type="text/css" href="styleusers.css">
    <title>Modifica Utente</title>
</head>
<body>
    <h2>Modifica Utente</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $user_id; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
        <input type="submit" value="Salva Modifiche">
    </form>
</body>
</html>