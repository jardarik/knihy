<?php

// Zpracování dat z formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = trim($_POST['isbn'] ?? '');
    $first_name = trim($_POST['author_first'] ?? '');
    $second_name = trim($_POST['author_last'] ?? '');
    $book_name = trim($_POST['title'] ?? '');
    $book_desc = trim($_POST['description'] ?? '');

    //kontrola zadaných vstupů do formuláře, alespoň jedna hodnota povinná
    if ($isbn || $first_name || $second_name || $book_name || $book_desc) {

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

        // Sestavení SQL dotazu podle zadaných hodnot
        $conditions = [];
        $params = [];
        $types = '';

        if ($isbn) {
            $conditions[] = "isbn LIKE ?";
            $params[] = "%$isbn%";
            $types .= 's';
        }
        if ($first_name) {
            $conditions[] = "first_name LIKE ?";
            $params[] = "%$first_name%";
            $types .= 's';
        }
        if ($second_name) {
            $conditions[] = "second_name LIKE ?";
            $params[] = "%$second_name%";
            $types .= 's';
        }
        if ($book_name) {
            $conditions[] = "book_name LIKE ?";
            $params[] = "%$book_name%";
            $types .= 's';
        }
        if ($book_desc) {
            $conditions[] = "book_desc LIKE ?";
            $params[] = "%$book_desc%";
            $types .= 's';
        }

        $sql = "SELECT * FROM knihy WHERE " . implode(" AND ", $conditions);

        $stmt = $conn->prepare($sql);
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        // Výpis výsledků
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'><thead class='table-dark'><tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Autor</th>
                <th>Název</th>
                <th>Popis</th>
            </tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . htmlspecialchars($row['id']) . "</td>
                <td>" . htmlspecialchars($row['isbn']) . "</td>
                <td>" . htmlspecialchars($row['author_first']) . " " . htmlspecialchars($row['author_last']) . "</td>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
            </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>Žádné knihy nebyly nalezeny.</p>";
        }

        $stmt->close();
        $conn->close();
    } else {
        // Informujte uživatele, že je potřeba vyplnit alespoň jedno pole
        echo "<p style='color:red;'>Vyplňte prosím alespoň jedno pole pro vyhledávání.</p>";
    }
}
