<?php

// Zpracování dat z formuláře
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = trim($_POST['isbn'] ?? '');
    $first_name = trim($_POST['first_name'] ?? '');
    $second_name = trim($_POST['second_name'] ?? '');
    $book_name = trim($_POST['book_name'] ?? '');
    $book_desc = trim($_POST['book_desc'] ?? '');

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

    // Kontrola povinných polí
    if ($isbn && $first_name && $second_name && $book_name) {
        $stmt = $conn->prepare("INSERT INTO knihy (isbn, first_name, second_name, book_name, book_desc) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param('sssss', $isbn, $first_name, $second_name, $book_name, $book_desc);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Kniha byla úspěšně přidána.</div>";
            } else {
                echo "<div class='alert alert-danger'>Chyba při ukládání knihy: " . htmlspecialchars($stmt->error) . "</div>";
            }
            $stmt->close();
        } else {
            echo "<div class='alert alert-danger'>Chyba při přípravě dotazu: " . htmlspecialchars($conn->error) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Vyplňte všechna povinná pole.</div>";
    }
    $conn->close();
}
