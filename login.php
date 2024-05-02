<?php
session_start();

// Connessione al database
$servername = "89.46.111.220"; // Indirizzo IP del server MySQL
$username = "Sql1784935"; // Nome utente del database MySQL
$password = "D3v0F4rl017.!2"; // Password del database MySQL
$database = "Sql1784935_1"; // Nome del database


// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $database);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Verifica se l'utente è già autenticato
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query per verificare le credenziali dell'utente nel database
    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se l'utente esiste nel database e confronta le credenziali
    if ($result->num_rows == 1) {
        // Imposta la sessione per l'utente autenticato e reindirizza alla dashboard
        $row = $result->fetch_assoc();
        $_SESSION["user_id"] = $row["user_id"];
        header("Location: dashboard.php");
        exit;
    } else {
        // Messaggio di errore se le credenziali non sono valide
        $error = "Credenziali non valide. Riprova.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>