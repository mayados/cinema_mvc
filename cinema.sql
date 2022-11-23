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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.acteur : ~11 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(1, 1),
	(2, 3),
	(4, 4),
	(3, 5),
	(5, 6),
	(6, 7),
	(17, 24),
	(21, 38),
	(22, 39),
	(25, 44),
	(26, 45);

-- Listage de la structure de table cinema. associer
CREATE TABLE IF NOT EXISTS `associer` (
  `id_genre` int DEFAULT NULL,
  `id_film` int DEFAULT NULL,
  KEY `id_genre` (`id_genre`),
  KEY `id_film` (`id_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.associer : ~11 rows (environ)
INSERT INTO `associer` (`id_genre`, `id_film`) VALUES
	(1, 1),
	(2, 2),
	(1, 3),
	(5, 19),
	(1, 21),
	(1, 4),
	(1, 19),
	(1, 74),
	(14, 74),
	(2, 76),
	(14, 76);

-- Listage de la structure de table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_role` int NOT NULL,
  `id_acteur` int NOT NULL,
  KEY `id_film` (`id_film`),
  KEY `id_role` (`id_role`),
  KEY `id_personne` (`id_acteur`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.casting : ~10 rows (environ)
INSERT INTO `casting` (`id_film`, `id_role`, `id_acteur`) VALUES
	(3, 1, 2),
	(3, 2, 3),
	(2, 3, 4),
	(1, 4, 3),
	(3, 6, 1),
	(4, 1, 6),
	(1, 6, 6),
	(21, 9, 1),
	(76, 7, 25),
	(76, 13, 26);

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
  `nombreLike` int DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.film : ~8 rows (environ)
INSERT INTO `film` (`id_film`, `id_realisateur`, `titre`, `duree`, `date_sortie`, `synopsis`, `note`, `affiche`, `nombreLike`) VALUES
	(1, 1, 'Elephant Man', '02:29:00', '1980-10-21', 'Londres, 1884. Un homme-éléphant est exhibé dans une baraque de fête foraine. Intrigué par ses effrayantes difformités, Frederick Treves, un jeune chirurgien, parvient, moyennant finances, à l\'arracher à son manager Bytes et le conduit au London Hospital pour l\'examiner en détail. Découvrant peu à peu qu\'il s\'agit d\'un être sensible et intelligent, le jeune médecin décide de l\'emmener chez lui et de le présenter à sa femme', 4.7, 'https://fr.web.img6.acsta.net/pictures/20/02/21/16/48/4302324.jpg', 17),
	(2, 2, 'John Wick', '01:59:00', '2020-04-25', 'Ce qui aurait pu être le banal vol d\'une voiture de collection se transforme en une chasse à l\'homme sans merci entre un légendaire ex-tueur à gages et le fils d\'un des plus grands pontes de la mafia.', 4.8, 'https://m.media-amazon.com/images/I/4191V0QIFmL._AC_SY445_.jpg', 11),
	(3, 1, 'Twin Peaks', '02:32:00', '1995-02-28', 'Dans la ville calme de Twin Peaks, l\'ambiance est perturbée suite au meurtre mystérieux de Laura Palmer, une jeune lycéenne', 5, 'https://i0.wp.com/cinedweller.com/wp-content/uploads/2020/02/twin-peaks-saison-3-affiche-981538.jpg?fit=700%2C1000&ssl=1', 0),
	(4, 1, 'Fire walk with me : Twin Peaks', '00:02:05', '2021-01-24', 'Découvrez ce qui est arrivé le soir du meurtre de Laura Palmer', 4.9, 'https://fr.web.img6.acsta.net/pictures/17/05/04/15/16/078278.jpg', 2),
	(19, 4, 'Dernier train pour Busan', '02:10:00', '2018-07-14', 'Seok-woo, jeune homme d\'affaires débordé, accepte de ramener sa fille Soo-an chez sa mère, dont il est séparé, à Busan. Ils embarquent dans un train, sans se douter que la ville qu\'ils s\'apprêtent à quitter vient d\'être contaminée par un dangereux virus transformant la population en mort vivants.', 4.7, 'https://fr.web.img2.acsta.net/pictures/16/06/09/15/03/093948.jpg', 0),
	(21, 1, 'Okja', '02:10:00', '2018-07-14', 'Pendant dix années idylliques, la jeune Mija s\'est occupée sans relâche d\'Okja, un énorme animal au grand cœur, auquel elle a tenu compagnie au beau milieu des montagnes de Corée du Sud. Mais la situation évolue quand une multinationale familiale capture Okja', 4.3, 'https://fr.web.img4.acsta.net/pictures/17/05/13/10/06/039567.jpg', 10),
	(74, 3, 'Pinocchio', '01:56:00', '2021-12-05', 'Cette reprise du célèbre conte de Carlo Collodi sur une marionnette en bois qui prend vie et rêve de devenir un vrai garçon se déroule dans l&#39;Italie fasciste des années 1930. Lorsque Pinocchio prend vie, il s&#39;avère qu&#39;il n&#39;est pas un gentil garçon, qui fait des bêtises et joue des mauvais tours. Mais au fond, Pinocchio est une histoire d&#39;amour et de désobéissance, alors que Pinocchio se bat pour être à la hauteur des attentes de son père.', 4, 'https://fr.web.img2.acsta.net/pictures/22/07/27/15/05/3116385.jpg', 19),
	(76, 14, 'Retour vers le futur', '01:47:00', '1985-10-30', 'Le jeune Marty McFly mène une existence anonyme, auprès de sa petite amie Jennifer, seulement troublée par sa famille en crise et un proviseur qui serait ravi de l&#39;expulser du lycée. Ami de l&#39;excentrique professeur Emmett Brown, il l&#39;accompagne tester sa nouvelle expérience : le voyage dans le temps via une DeLorean modifiée. La démonstration tourne mal : des trafiquants d&#39;armes débarquent et assassinent le scientifique.', 5, 'https://fr.web.img2.acsta.net/pictures/22/07/22/15/00/2862661.jpg', NULL);

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.genre : ~6 rows (environ)
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
  `photo` varchar(500) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.personne : ~11 rows (environ)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`, `photo`) VALUES
	(1, 'Lynch', 'David', 'Homme', '1946-01-20', 'https://fr.web.img6.acsta.net/pictures/15/08/07/11/31/530483.jpg'),
	(2, 'Leitch', 'David', 'Homme', '1985-06-23', 'https://upload.wikimedia.org/wikipedia/commons/e/ef/David_Leitch_by_Gage_Skidmore.jpg'),
	(3, 'Maclachlan', 'Kyle', 'Homme', '1961-02-15', 'https://upload.wikimedia.org/wikipedia/commons/6/69/Kyle_McLachlan_Cannes_2017_2.jpg'),
	(4, 'Reeves', 'Keanu', 'Homme', '1965-05-12', 'https://fr.web.img6.acsta.net/pictures/17/02/06/17/01/343859.jpg'),
	(5, 'Lee', 'Sheryl', 'Femme', '1967-04-22', 'https://upload.wikimedia.org/wikipedia/commons/c/cb/Sheryl_Lee_01_%2814948055197%29.jpg'),
	(7, 'Duchovny', 'David', 'Homme', '1963-03-15', 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/David_Duchovny_by_Gage_Skidmore.jpg/1200px-David_Duchovny_by_Gage_Skidmore.jpg'),
	(28, 'Del Toro', 'Guillermo', 'Homme', '1968-02-08', 'https://fr.web.img2.acsta.net/c_310_420/pictures/17/09/12/11/39/3915389.jpg'),
	(29, 'Eastwood', 'Clint', 'Homme', '1958-05-19', 'https://fr.web.img2.acsta.net/pictures/15/10/15/16/51/136406.jpg'),
	(43, 'Zemeckis', 'Robert', 'Homme', '1952-05-14', 'https://fr.web.img6.acsta.net/pictures/16/11/10/15/18/427241.jpg'),
	(44, 'J.Fox', 'Michael', 'Homme', '1961-06-09', 'https://upload.wikimedia.org/wikipedia/commons/2/20/Michael_J_Fox_2020.jpg'),
	(45, 'Lloyd', 'Christopher', 'Homme', '1938-10-22', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cf/ChristopherLloyd2022.jpg/1200px-ChristopherLloyd2022.jpg');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `id_personne` int DEFAULT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.realisateur : ~7 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 28),
	(4, 29),
	(11, 36),
	(12, 37),
	(14, 43);

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom_role` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table cinema.role : ~7 rows (environ)
INSERT INTO `role` (`id_role`, `nom_role`) VALUES
	(1, 'Dale Cooper'),
	(2, 'Laura Palmer'),
	(3, 'John Wick'),
	(4, 'Elepha'),
	(6, 'Old Man'),
	(7, 'Marty McFly'),
	(13, 'Dr Emett Brown');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
