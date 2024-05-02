<?php
// Avvia la sessione
session_start();

// Verifica se l'utente non è autenticato, reindirizza alla pagina di login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// Logout dell'utente
if (isset($_POST["logout"])) {
    // Termina la sessione
    session_unset();
    session_destroy();
    
    // Reindirizza alla pagina di login
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styledashboard.css">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #333;
            overflow: hidden;
            text-align: center; /* Centra i link nel menu di navigazione */
        }

        nav a {
            display: inline-block; /* Mostra i link come blocchi inline */
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            margin: 0 10px; /* Aggiunge spazio tra i link */
        }

        nav a:hover {
            background-color: #111;
        }

        form {
            display: inline-block; /* Mostra il form come blocco inline */
            vertical-align: middle; /* Allinea verticalmente il form con i link */
            margin-top: 14px;
            margin-right: 20px;
        }

        button[name="logout"] {
            background-color: #333;
            color: white;
            border: none;
            padding: 14px 20px;
            cursor: pointer;
        }

        button[name="logout"]:hover {
            background-color: #111;
        }

        .content {
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Dashboard</h1>
</header>

<nav>
    <a href="dashboard.php">Home</a>
    <a href="users/manage_users.php">Gestione Utenti</a>
    <a href="categories/manage_categories.php">Gestione Categorie</a>
    <a href="works/manage_works.php">Gestione Lavori</a>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <button type="submit" name="logout">Logout</button>
    </form>
</nav>

<div class="content">
    <p>Benvenuto nella dashboard. Da qui puoi gestire varie funzionalità del backend.</p>
</div>

<footer>
    <p>Copyright © 2024. Tutti i diritti riservati.</p>
</footer>

</body>
</html>