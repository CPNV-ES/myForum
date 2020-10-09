CREATE DATABASE  IF NOT EXISTS `myForum` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `myForum`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: myForum
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `opinions`
--

DROP TABLE IF EXISTS `opinions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opinions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opinions_topics1_idx` (`topic_id`),
  KEY `fk_opinions_users1_idx` (`user_id`),
  CONSTRAINT `fk_opinions_topics1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_opinions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opinions`
--

LOCK TABLES `opinions` WRITE;
/*!40000 ALTER TABLE `opinions` DISABLE KEYS */;
INSERT INTO `opinions` VALUES (1,'C\'est important !',4,4),(2,'Ed est évidemment supérieur à tout les autres éditeurs',5,5),(3,'Enfin un document sur la GP qui peut se lire en moins d\'une heure !!!!',4,1),(4,'C\'est indispensable pour bien gérer ses projets',4,7),(5,'Pouvez vous être plus précis dans votre topic? A quel système de base de données souhaitez-vous vous connecter ?\nMysql ? MariaDB ? PostgreSQL ? MangoDB ?\n\n<a href=\"https://www.arangodb.com\"> ArangoDB ?</a>',1,5),(6,'mmm ce n\'est pas ouf d\'indenter son code, ça prendre de la place sur le disque ! ',3,4),(7,'C\'est pour faciliter la lisibilité!',3,7),(8,'Rien à voir ici ... <script>alert(\"mmmhhh\")</script>',3,5),(9,'Il faut faire un max de projet personnel et découvrir les différentes technologies qui sont sur la place du marché.',9,3),(10,'Il faut travailler dur!',9,7),(11,'Windows + R -> cmd -> ping 127.0.0.1',11,7),(12,'Je pense que JQuery a été quasi vital un temps, mais que les évolutions de JS l\'ont maintenant (2020) rendu caduc',10,1),(13,'il y a toujours une place ici (voir référence) pour ceux qui utilise du jQuerry en 2020',10,14),(14,'Il faut capturer le handshake. Et si besoin deauth les clients',11,4),(15,'Il faut brancher la prise d\'alimentation!',16,7),(16,'Personnelement j\'aime bien et je me suis déjà créé des habitudes.',10,9),(17,'Il faut utiliser la commande : aircrack-ng -w password.lst -b 00:14:6C:7E:40:80 psk*.cap',14,4),(18,'Je pense qu\'il faudrait que tu contacte un technicien ',16,14),(19,'C\'est pas bien compliquer il te suffit de metttre en place un vpn ou d\'utiliser un vpn gratuit comme protonVPN cela marche surper bien dans les écoles notamment ou en entreprise',15,7),(20,'Je ne sais pas si on peut mais je t\'invite à regarder cette vidéo',17,3),(21,'Tout dépend de la nature de la panne. Si c\'est hardware, pas le choix il faut réparer/remplacer. Mais si c\'est logiciel (OS), c\'est l\'occasion de questionner le choix de son OS et de se renseigner sur des alternative peut-être plus fiables',16,1),(22,'Je pense que sass est utile est inutile à la fois car la plupart du temps css peut faire pareil',18,6),(23,'J\'espère que les modérateurs de ce site supprimeront ce sujet qui est à l\'évidence une provocation gratuite',6,1),(24,'Je dirais même: \"Est-ce que CSS est vraiment utile?\".',18,2),(25,'Atom est un bon éditeur de texte, que j\'utilise et qui ne contient pas un surplus d\'information dès le démarage. On peut peu à peu rajouter des packages afin de répondre à nos besoins, ainsi que modifer ceux déjà présent.',5,9),(26,'Alors bien évidamment que oui, cela te permet de crée de multiple élément avec des boucles sans devoir tous écrire à la main en plus de permettre l\'inclusion de plusieurs fichier dans un seul et même fichier ce qui permet une certaine modularité',18,3),(27,'Je pense qu\'il faut plus avoir un jeu facile d\'utilisation que beau graphiquement.',7,6),(28,'VisualStudio est à mon opinion le meilleur éditeur de texte. Je l\'utilise pour tout, même pour faire ma liste de courses ! Le fait qu\'il prenne 3 minutes pour se lancer n\'est juste qu\'un tout petit inconvenient.',5,2),(29,'A mes yeux, de nos jours, les graphismes ansi que le gameplay sont les deux choses les plus importantes pour créer un jeu vidéo',7,15),(30,'J\'adore Scrum !!',4,13);
/*!40000 ALTER TABLE `opinions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opinions_has_references`
--

DROP TABLE IF EXISTS `opinions_has_references`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opinions_has_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_id` int(11) NOT NULL,
  `opinion_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UniqueReference` (`reference_id`,`opinion_id`),
  KEY `fk_references_has_opinions_opinions1_idx` (`opinion_id`),
  KEY `fk_references_has_opinions_references1_idx` (`reference_id`),
  CONSTRAINT `fk_references_has_opinions_opinions1` FOREIGN KEY (`opinion_id`) REFERENCES `opinions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_references_has_opinions_references1` FOREIGN KEY (`reference_id`) REFERENCES `references` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opinions_has_references`
--

LOCK TABLES `opinions_has_references` WRITE;
/*!40000 ALTER TABLE `opinions_has_references` DISABLE KEYS */;
INSERT INTO `opinions_has_references` VALUES (1,4,9),(2,7,13),(3,8,12),(4,9,19),(5,10,20);
/*!40000 ALTER TABLE `opinions_has_references` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `references`
--

DROP TABLE IF EXISTS `references`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `url` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `references`
--

LOCK TABLES `references` WRITE;
/*!40000 ALTER TABLE `references` DISABLE KEYS */;
INSERT INTO `references` VALUES (1,'Scrum guide','https://www.scrum.org/resources/scrum-guide'),(2,'Juice it or lose it','https://www.youtube.com/watch?v=Fy0aCDmgnxg'),(3,'Documentation php','https://www.php.net/'),(4,'Livre de développement','https://www.humblebundle.com/books/learn-to-code-the-fun-way-no-starch-press-books?hmb_source=humble_home&hmb_medium=product_tile&hmb_campaign=mosaic_section_2_layout_index_2_layout_type_twos_tile_index_1_c_codingbookshelfnostarchpress_bookbundle'),(5,'Hak5','https://www.youtube.com/user/Hak5Darren'),(6,'Talk sur les index SQL','https://youtu.be/HubezKbFL7E'),(7,'Trash racoon','https://mdc.mo.gov/sites/default/files/Raccoon%20garbage_08RGB.jpg'),(8,'Article','https://www.ma-no.org/en/programming/javascript/is-jquery-going-to-die-in-2019'),(9,'ProtonVPN','https://protonvpn.com/fr/'),(10,'TempleOS linus tech tips','https://www.youtube.com/watch?v=LtlyeDAJR7A');
/*!40000 ALTER TABLE `references` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Prof'),(2,'Stud');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (4,'Censuré'),(3,'Clos'),(1,'En discussion'),(5,'Proposé'),(2,'Publié');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'Agilité'),(8,'API'),(3,'Conventions de codage'),(11,'CSS'),(7,'Distribution Linux'),(4,'Éditeur de texte'),(2,'Environnement de travail'),(14,'Game design'),(10,'Javascript'),(13,'Linkedin'),(12,'Opensource'),(9,'Python'),(15,'SASS'),(6,'Système d\'exploitation'),(5,'TempleOS');
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_topics_themes_idx` (`theme_id`),
  KEY `fk_topics_states1_idx` (`state_id`),
  KEY `fk_topics_users1_idx` (`user_id`),
  CONSTRAINT `fk_topics_states1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_topics_themes` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_topics_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'Connexion à une base de donnée',3,1,4),(2,'Ed est le meilleur éditeur de texte',4,1,5),(3,'Pourquoi indenter son code?',3,1,2),(4,'Scrum guide',1,2,4),(5,'Quel est le meilleure éditeur de texte ?',4,1,3),(6,'Comment installer IE9 sur debian ?',7,4,5),(7,'Quels sont les aspects importants sur lequel se concentrer quand l\'on crée un jeu vidéo ?',14,3,3),(8,'Utilité dans l\'évolution d\'une carrière professionnelle',13,5,1),(9,'Comment devenir un bon technicien spécialiser en développement d\'application web',3,5,3),(10,'Utilisation de JQuery',10,1,9),(11,'Test de pénétration réseau',7,4,4),(12,'Google MAP API',8,4,1),(13,'Programmable Web (https://www.programmableweb.com)',8,4,1),(14,'Brutforce avec aircrack',6,4,4),(15,'Contourner les restrictions d\'un firewall',6,1,4),(16,'Mon pc ne démarre pas que faire?',6,1,7),(17,'Comment se connecter à internet sur TempleOS?',5,1,2),(18,'Est-ce que sass est vraiment utile ?',15,5,2);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `pseudo` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo_UNIQUE` (`pseudo`),
  KEY `fk_users_roles1_idx` (`role_id`),
  CONSTRAINT `fk_users_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Xavier','Carrel','XCL',1),(2,'Dimitri','Imfeld','DID',2),(3,'Quentin','Aellen','a-que-duc',2),(4,'Gabriel','Rossier','GRR',2),(5,'Alexandre','Philibert','alexandre',2),(6,'Cyril','Goldenschue','CGE',2),(7,'Dylan','Oliveira Ramos','DOS',2),(8,'Sou','Sam','SSH',2),(9,'Andi','Santos Oliveira','ASO',2),(11,'Sou','Sam','SS',2),(13,'Mathieu','Burnat','MBU',2),(14,'Dark','Sasuké','1450',2),(15,'William','Hausmann','WHN',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_comment_opinions`
--

DROP TABLE IF EXISTS `users_comment_opinions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_comment_opinions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `opinion_id` int(11) NOT NULL,
  `comment` varchar(5000) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_users_has_opinions_opinions1_idx` (`opinion_id`),
  KEY `fk_users_has_opinions_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_opinions_opinions1` FOREIGN KEY (`opinion_id`) REFERENCES `opinions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_opinions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_comment_opinions`
--

LOCK TABLES `users_comment_opinions` WRITE;
/*!40000 ALTER TABLE `users_comment_opinions` DISABLE KEYS */;
INSERT INTO `users_comment_opinions` VALUES (1,1,1,'Je dirais même qu\'il est essentiel !',1),(2,2,7,'Personnellement, je trouve le code plus lisible quand tout est sur une seule ligne...',-1),(3,5,6,'Tout à fait d\'accord, un disque dur coût tout de même entre 50-100 Euro',1),(4,5,12,'JQuery est en effet devenu inutile de nos jours, il est malheuresement encore présent dans beaucoup de site',1),(5,4,14,'On peut utiliser airodump pour capturer le handshake',0),(6,4,17,'Attention d\'avoir une liste de mot de passe suffisament ciblée pour pas que ça prenne des années ;D',0),(7,7,18,'Merci de m\'avoir aidé!',1),(8,7,3,'C\'est faux! J\'ai pris 2 heures pour le lire...',-1),(9,7,2,'Je suis d\'accord, il est super puissant!',1),(10,9,18,'Je suis d\'accord.',1),(11,1,11,'Qu\'est-ce que ça a à voir avec le sujet ???',-1),(12,1,19,'Juste. GhostVPN est une bonne alternative sur OSX',1),(13,6,23,'Je suis bien d\'accord et je ne pense pas que ce soit possible dans tout les cas',1),(14,2,20,'Merci mais je n\'aime pas les vidéos de Linus Tech Tips car il est Canadien.',-1),(15,9,7,'Totalement d\'accord. La compréhension du code est grandement améliorée.',1),(16,7,11,'Désolé j\'ai mal compris',1),(17,11,15,'Bon début',-1),(18,6,25,'J\'approuve ce choix',1),(19,15,28,'Je suis totalement d\'accord avec toi !',1);
/*!40000 ALTER TABLE `users_comment_opinions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-02  9:08:09
