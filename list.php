<?php
// Načtení parametrů z dbConnParam.php
$db_param = require __DIR__ . '/dbConnParam.php';
$dbHost = $db_param['host'];
$dbName = $db_param['dbname'];
$dbUser = $db_param['user'];
$dbPass = $db_param['password'];

// Připojení k MySQL databázi pomocí mysqli
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Kontrola úspěšnosti připojení
if ($conn->connect_error) {
    die("Chyba připojení: " . $conn->connect_error);
}

// Nastavení kódování na UTF-8
$conn->set_charset('utf8');

// SQL dotaz na výběr požadovaných sloupců
$sql = "SELECT id, isbn, first_name, second_name, book_name, book_desc FROM knihy";
$result = $conn->query($sql);

// Výpis tabulky s knihami
if ($result && $result->num_rows > 0) { ?>
            <table class='table table-striped table-bordered'>
            <thead class='table-dark'><tr><th>ID</th><th>ISBN</th><th>Jméno</th><th>Příjmení</th><th>Název knihy</th><th>Popis knihy</th></tr></thead><tbody> 
            <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["isbn"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["second_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["book_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["book_desc"]) . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<div class='alert alert-warning'>Žádné knihy nebyly nalezeny.</div>";
}

$conn->close();

?>