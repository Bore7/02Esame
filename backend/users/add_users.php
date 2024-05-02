<?php
session_start();

// Verifica se il form è stato inviato
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recupera i dati inviati dal form
    $input_username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Verifica che i campi obbligatori siano stati compilati
    if (empty($input_username) || empty($password) || empty($email)) {
        $error = "Tutti i campi sono obbligatori";
    } else {
        // Connessione al database
        require_once "../database.php"; // Assicurati di includere il file di connessione corretto

        // Query per inserire un nuovo utente nel database
        $query = "INSERT INTO users (username, password, email, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $conn->prepare($query);
        
        // Cripta la password prima di salvarla nel database
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $input_username, $password_hashed, $email);

        if ($stmt->execute()) {
            $success = "Utente aggiunto con successo!";
        } else {
            $error = "Errore durante l'inserimento dell'utente";
        }

        // Chiudi lo statement e la connessione
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleusers.css">
    <title>Aggiungi Utente</title>
</head>
<body>
    <h2>Aggiungi Utente</h2>
    <?php if (!empty($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    <?php if (!empty($success)) { ?>
        <p style="color: green;"><?php echo $success; ?></p>
    <?php } ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" value="Aggiungi">
    </form>
    <br>
    <a href="manage_users.php">Torna alla Dashboard</a>
</body>
</html>