# Vytvoření databáze

```mysql

CREATE DATABASE IF NOT EXISTS knihy_db CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci;
USE knihy_db;

CREATE TABLE IF NOT EXISTS knihy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    isbn VARCHAR(20) NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    second_name VARCHAR(100) NOT NULL,
    book_name VARCHAR(255) NOT NULL,
    book_desc TEXT
);
```

# Vytvoření uživate

```
CREATE USER 'knihy_user'@'localhost' IDENTIFIED BY 'heslo';
GRANT SELECT, INSERT, UPDATE, DELETE ON knihy_db.knihy TO 'knihy_user'@'localhost';
FLUSH PRIVILEGES;
```

# Naplnění tabulky

```
INSERT INTO knihy (isbn, first_name, second_name, book_name, book_desc) VALUES
('978-80-7203-841-3', 'Karel', 'Čapek', 'Válka s Mloky', 'Satirický román o střetu lidstva s inteligentními mloky.'),
('978-80-257-2211-2', 'Franz', 'Kafka', 'Proměna', 'Slavná povídka o proměně člověka v hmyz.'),
('978-80-204-2537-7', 'Jaroslav', 'Hašek', 'Osudy dobrého vojáka Švejka', 'Humoristický román z první světové války.'),
('978-80-7473-064-3', 'Bohumil', 'Hrabal', 'Obsluhoval jsem anglického krále', 'Román o životě číšníka v různých režimech.'),
('978-80-242-4967-2', 'Milan', 'Kundera', 'Nesnesitelná lehkost bytí', 'Filozofický román o lásce a svobodě.'),
('978-80-207-1772-2', 'Vladislav', 'Vančura', 'Markéta Lazarová', 'Historický román z doby loupeživých rytířů.'),
('978-80-7203-990-8', 'Josef', 'Škvorecký', 'Zbabělci', 'Román o dospívání v době konce války.'),
('978-80-257-2212-9', 'Franz', 'Kafka', 'Proces', 'Román o absurdním soudním procesu.'),
('978-80-204-2538-4', 'Jaroslav', 'Hašek', 'Dějiny strany mírného pokroku', 'Satirické povídky.'),
('978-80-7473-065-0', 'Bohumil', 'Hrabal', 'Příliš hlučná samota', 'Román o starém lisovači papíru.'),
('978-80-242-4968-9', 'Milan', 'Kundera', 'Žert', 'Román o pomstě a osudu.'),
('978-80-207-1773-9', 'Vladislav', 'Vančura', 'Rozmarné léto', 'Humoristická novela z lázeňského města.'),
('978-80-7203-991-5', 'Josef', 'Škvorecký', 'Prima sezóna', 'Román o dospívání v malém městě.'),
('978-80-257-2213-6', 'Franz', 'Kafka', 'Zámek', 'Román o boji s byrokracií.'),
('978-80-204-2539-1', 'Jaroslav', 'Hašek', 'Můj obchod se psy', 'Humoristické povídky.'),
('978-80-7473-066-7', 'Bohumil', 'Hrabal', 'Slavnosti sněženek', 'Povídky z Kerska.'),
('978-80-242-4969-6', 'Milan', 'Kundera', 'Směšné lásky', 'Soubor povídek o lásce.'),
('978-80-207-1774-6', 'Vladislav', 'Vančura', 'Kubula a Kuba Kubikula', 'Pohádka pro děti.'),
('978-80-7203-992-2', 'Josef', 'Škvorecký', 'Tankový prapor', 'Satirický román z vojenského prostředí.'),
('978-80-257-2214-3', 'Franz', 'Kafka', 'Amerika', 'Román o cestě mladíka do Ameriky.');
```
