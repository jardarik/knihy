<?php

// Zpracování dat z formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = trim($_POST['isbn'] ?? '');
    $first_name = trim($_POST['first_name'] ?? '');
    $second_name = trim($_POST['second_name'] ?? '');
    $book_name = trim($_POST['book_name'] ?? '');
    $book_desc = trim($_POST['book_desc'] ?? '');

    //kontrola zadaných vstupů do formuláře, alespoň jedna hodnota povinná
    if ($isbn || $first_name || $second_name || $book_name || $book_desc) {
        // if (true) {

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

        $sql = "SELECT * FROM knihy";
        if ($conditions) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $conn->prepare($sql);
        if ($params) {
            $stmt->bind_param($types, ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        // Výpis výsledků
        if ($result->num_rows > 0) {
            echo "<table class='table table-striped table-bordered'><thead class='table-dark'><tr>
                <th>ISBN</th>
                <th>Autor</th>
                <th>Název knihy</th>
                <th>Popis knihy</th>
            </tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . htmlspecialchars($row['isbn']) . "</td>
                <td>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['second_name']) . "</td>
                <td>" . htmlspecialchars($row['book_name']) . "</td>
                <td>" . htmlspecialchars($row['book_desc']) . "</td>
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
