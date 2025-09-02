-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: knihy_db
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `knihy`
--

DROP TABLE IF EXISTS `knihy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `knihy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `isbn` varchar(20) COLLATE utf8mb4_czech_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_czech_ci NOT NULL,
  `second_name` varchar(100) COLLATE utf8mb4_czech_ci NOT NULL,
  `book_name` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `book_desc` text COLLATE utf8mb4_czech_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `knihy`
--

LOCK TABLES `knihy` WRITE;
/*!40000 ALTER TABLE `knihy` DISABLE KEYS */;
INSERT INTO `knihy` VALUES (1,'978-80-7203-841-3','Karel','Čapek','Válka s Mloky','Satirický román o střetu lidstva s inteligentními mloky.'),(2,'978-80-257-2211-2','Franz','Kafka','Proměna','Slavná povídka o proměně člověka v hmyz.'),(3,'978-80-204-2537-7','Jaroslav','Hašek','Osudy dobrého vojáka Švejka','Humoristický román z první světové války.'),(4,'978-80-7473-064-3','Bohumil','Hrabal','Obsluhoval jsem anglického krále','Román o životě číšníka v různých režimech.'),(5,'978-80-242-4967-2','Milan','Kundera','Nesnesitelná lehkost bytí','Filozofický román o lásce a svobodě.'),(6,'978-80-207-1772-2','Vladislav','Vančura','Markéta Lazarová','Historický román z doby loupeživých rytířů.'),(7,'978-80-7203-990-8','Josef','Škvorecký','Zbabělci','Román o dospívání v době konce války.'),(8,'978-80-257-2212-9','Franz','Kafka','Proces','Román o absurdním soudním procesu.'),(9,'978-80-204-2538-4','Jaroslav','Hašek','Dějiny strany mírného pokroku','Satirické povídky.'),(10,'978-80-7473-065-0','Bohumil','Hrabal','Příliš hlučná samota','Román o starém lisovači papíru.'),(11,'978-80-242-4968-9','Milan','Kundera','Žert','Román o pomstě a osudu.'),(12,'978-80-207-1773-9','Vladislav','Vančura','Rozmarné léto','Humoristická novela z lázeňského města.'),(13,'978-80-7203-991-5','Josef','Škvorecký','Prima sezóna','Román o dospívání v malém městě.'),(14,'978-80-257-2213-6','Franz','Kafka','Zámek','Román o boji s byrokracií.'),(15,'978-80-204-2539-1','Jaroslav','Hašek','Můj obchod se psy','Humoristické povídky.'),(16,'978-80-7473-066-7','Bohumil','Hrabal','Slavnosti sněženek','Povídky z Kerska.'),(17,'978-80-242-4969-6','Milan','Kundera','Směšné lásky','Soubor povídek o lásce.'),(18,'978-80-207-1774-6','Vladislav','Vančura','Kubula a Kuba Kubikula','Pohádka pro děti.'),(19,'978-80-7203-992-2','Josef','Škvorecký','Tankový prapor','Satirický román z vojenského prostředí.'),(20,'978-80-257-2214-3','Franz','Kafka','Amerika','Román o cestě mladíka do Ameriky.'),(21,'123','Jan','Paček','O koních','Návod na kování koní'),(22,'123','Jan','Paček','O koních','Návod na kování koní'),(23,'123','Jan','Paček','O koních','Návod na kování koní'),(24,'458-7545-588-45','Pavel','Soukup','Na hraně','Na hraně životního rozhodnutí');
/*!40000 ALTER TABLE `knihy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-02 12:30:40
