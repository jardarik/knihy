<?php

// Vzorový konfigurační soubor pro připojení k databázi
// Zkopírujte tento soubor jako dbConnParam.php a vyplňte skutečné hodnoty

return [
    'host' => 'localhost',           // Adresa MySQL serveru
    'dbname' => 'your_database',     // Název databáze
    'user' => 'your_username',       // Uživatelské jméno
    'password' => 'your_password'    // Heslo - NIKDY nedávejte do GIT!
];

/*
Pokyny k nastavení:
1. Zkopírujte tento soubor jako dbConnParam.php
2. Vyplňte správné hodnoty pro vaše prostředí
3. Soubor dbConnParam.php je v .gitignore a nebude verzován

Příklad pro lokální vývoj:
'host' => 'localhost',
'dbname' => 'knihy_db',
'user' => 'knihy_user',
'password' => 'vase_heslo'

Příklad pro produkci:
'host' => 'sql.example.com',
'dbname' => 'knihy_production',
'user' => 'prod_user',
'password' => 'silne_heslo_123'
*/
