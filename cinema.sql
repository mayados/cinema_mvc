-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.acteur : ~9 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 1),
	(2, 3),
	(4, 4),
	(3, 5),
	(5, 6),
	(6, 7),
	(17, 24),
	(21, 38),
	(22, 39);

-- Listage de la structure de table cinema. associer
CREATE TABLE IF NOT EXISTS `associer` (
  `id_genre` int DEFAULT NULL,
  `id_film` int DEFAULT NULL,
  KEY `id_genre` (`id_genre`),
  KEY `id_film` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.associer : ~7 rows (environ)
INSERT INTO `associer` (`id_genre`, `id_film`) VALUES
	(1, 1),
	(2, 2),
	(1, 3),
	(5, 19),
	(1, 21),
	(1, 4),
	(1, 19),
	(1, 74),
	(14, 74);

-- Listage de la structure de table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_role` int NOT NULL,
  `id_acteur` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_role` (`id_role`),
  KEY `id_personne` (`id_acteur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.casting : ~6 rows (environ)
INSERT INTO `casting` (`id_film`, `id_role`, `id_acteur`) VALUES
	(3, 1, 2),
	(3, 2, 3),
	(2, 3, 4),
	(1, 4, 3),
	(3, 6, 1),
	(4, 1, 6);

-- Listage de la structure de table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `id_realisateur` int NOT NULL DEFAULT '0',
  `titre` varchar(100) NOT NULL DEFAULT '',
  `duree` time NOT NULL DEFAULT '00:00:00',
  `date_sortie` date DEFAULT NULL,
  `synopsis` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `note` float DEFAULT NULL,
  `affiche` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film : ~6 rows (environ)
INSERT INTO `film` (`id_film`, `id_realisateur`, `titre`, `duree`, `date_sortie`, `synopsis`, `note`, `affiche`) VALUES
	(1, 1, 'Elephant Man', '02:29:00', '1980-10-21', 'Londres, 1884. Un homme-éléphant est exhibé dans une baraque de fête foraine. Intrigué par ses effrayantes difformités, Frederick Treves, un jeune chirurgien, parvient, moyennant finances, à l\'arracher à son manager Bytes et le conduit au London Hospital pour l\'examiner en détail. Découvrant peu à peu qu\'il s\'agit d\'un être sensible et intelligent, le jeune médecin décide de l\'emmener chez lui et de le présenter à sa femme', 4.7, 'https://fr.web.img6.acsta.net/pictures/20/02/21/16/48/4302324.jpg'),
	(2, 2, 'John Wick', '01:59:00', '2020-04-25', 'Ce qui aurait pu être le banal vol d\'une voiture de collection se transforme en une chasse à l\'homme sans merci entre un légendaire ex-tueur à gages et le fils d\'un des plus grands pontes de la mafia.', 4.8, 'https://m.media-amazon.com/images/I/4191V0QIFmL._AC_SY445_.jpg'),
	(3, 1, 'Twin Peaks', '02:32:00', '1995-02-28', 'Dans la ville calme de Twin Peaks, l\'ambiance est perturbée suite au meurtre mystérieux de Laura Palmer, une jeune lycéenne', 5, 'https://upload.wikimedia.org/wikipedia/en/e/ea/TwinPeaks_openingshotcredits.jpg'),
	(4, 1, 'Fire walk with me : Twin Peaks', '00:02:05', '2021-01-24', 'Découvrez ce qui est arrivé le soir du meurtre de Laura Palmer', 4.9, 'https://fr.web.img6.acsta.net/pictures/17/05/04/15/16/078278.jpg'),
	(19, 4, 'Dernier train pour Busan', '02:10:00', '2018-07-14', 'Seok-woo, jeune homme d\'affaires débordé, accepte de ramener sa fille Soo-an chez sa mère, dont il est séparé, à Busan. Ils embarquent dans un train, sans se douter que la ville qu\'ils s\'apprêtent à quitter vient d\'être contaminée par un dangereux virus transformant la population en mort vivants.', 4.7, 'https://fr.web.img2.acsta.net/pictures/16/06/09/15/03/093948.jpg'),
	(21, 1, 'Okja', '02:10:00', '2018-07-14', 'Pendant dix années idylliques, la jeune Mija s\'est occupée sans relâche d\'Okja, un énorme animal au grand cœur, auquel elle a tenu compagnie au beau milieu des montagnes de Corée du Sud. Mais la situation évolue quand une multinationale familiale capture Okja', 4.3, 'https://fr.web.img4.acsta.net/pictures/17/05/13/10/06/039567.jpg'),
	(74, 3, 'Pinocchio', '01:56:00', '2021-12-05', 'Cette reprise du célèbre conte de Carlo Collodi sur une marionnette en bois qui prend vie et rêve de devenir un vrai garçon se déroule dans l&#39;Italie fasciste des années 1930. Lorsque Pinocchio prend vie, il s&#39;avère qu&#39;il n&#39;est pas un gentil garçon, qui fait des bêtises et joue des mauvais tours. Mais au fond, Pinocchio est une histoire d&#39;amour et de désobéissance, alors que Pinocchio se bat pour être à la hauteur des attentes de son père.', 4, 'https://fr.web.img2.acsta.net/pictures/22/07/27/15/05/3116385.jpg');

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre : ~4 rows (environ)
INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
	(1, 'mystere'),
	(2, 'action'),
	(5, 'drame'),
	(12, 'thriller'),
	(13, 'horreur'),
	(14, 'fantastique');

-- Listage de la structure de table cinema. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '',
  `prenom` varchar(50) NOT NULL DEFAULT '',
  `sexe` varchar(10) NOT NULL DEFAULT '',
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.personne : ~8 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`) VALUES
	(1, 'Lynch', 'David', 'Homme', '1946-01-20'),
	(2, 'Leitch', 'John', 'Homme', '1985-06-23'),
	(3, 'Maclachlan', 'Kyle', 'Homme', '1961-02-15'),
	(4, 'Reeves', 'Keanu', 'Homme', '1965-05-12'),
	(5, 'Lee', 'Sheryl', 'Femme', '1967-04-22'),
	(7, 'Duchovny', 'David', 'Homme', '1963-03-15'),
	(28, 'Del Toro', 'Guillermo', 'Homme', '1968-02-08'),
	(29, 'Eastwood', 'Clint', 'Homme', '1958-05-19');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.realisateur : ~6 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 28),
	(4, 29),
	(11, 36),
	(12, 37);

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~5 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Dale Cooper'),
	(2, 'Laura Palmer'),
	(3, 'John Wick'),
	(4, 'Elepha'),
	(6, 'Old Man');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
