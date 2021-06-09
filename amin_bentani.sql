-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2021 at 04:06 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amin_bentani`
--

-- --------------------------------------------------------

--
-- Table structure for table `billiets`
--

CREATE TABLE `billiets` (
  `billiets_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` text,
  `date_publication` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `billiets`
--

INSERT INTO `billiets` (`billiets_id`, `user_id`, `titre`, `contenu`, `date_publication`) VALUES
(1, NULL, 'LES ARDENTES 2021 - 4DAY PASS\r\n8 au 11 juil. 2021', 'ROCOURT - LIEGE\r\n\r\nFESTIVAL - FESTIVAL MUSIQUE\r\n\r\nArtiste : FESTIVAL LES ARDENTES , LIL MOSEY , YOUV DEE , 7 JAWS , TENGO JOHN , 47 TER , MAES , SHECK WES , NIGHT LOVELL , OCTAVIAN , 13 BLOCK , 4KEUS , DINOS , MIGOS , KALI UCHIS , BAD BUNNY , MISTER V , LETO , ICO , YUZMV , BURNA BOY , LIL TECCA , BBNOS , JOANNA , TSEW THE KID , LUIDJI , SEAN , ZOLA , MOHA LA SQUALE , NELICK , NIRO , VALD , PNL , RAE SREMMURD , SETH GUEKO , GUIZMO , CHINESE MAN , KENDRICK LAMAR , DJ SNAKE , SCH , FAKEAR , SALUT C\'EST COOL , LEFA , TYGA , NUSKY , NISKA , HAMZA , NINHO , CARDI B , PRIME , PLK , FUTURE , RILES , GUCCI MANE , MACHINE GUN KELLY , DAVODKA , OCEAN WISDOM , KAARIS', '2021-04-12 13:00:02'),
(2, NULL, 'RETRO C TROP - PASS CAMPING\r\n25 au 27 juin 2021', 'CHATEAU DE TILLOLOY - TILLOLOY\r\n\r\nFESTIVAL - FESTIVAL MUSIQUE\r\n\r\nArtiste : RETRO C TROP FESTIVAL , IGGY POP , LA RUE KETANOU , PAUL PERSONNE , SIMPLE MINDS', '2021-04-17 09:00:17'),
(3, NULL, 'FRANCIS CABREL\r\n5 au 6 juil. 2021', 'THEATRE ANTIQUE VAISON - VAISON LA ROMAINE\r\n\r\nCONCERT - VARIETE ET CHANSON FRANCAISE\r\n\r\nArtiste : FRANCIS CABREL', '2021-04-04 15:00:34'),
(4, 27, 'Mathematique', 'J\'ai pas compris cette exercice vous pouvez m\'aider?', NULL),
(5, 24, 'italien', 'je ne comprends pas cette phrase qui peur me la traduire?', '2027-04-21 10:48:08'),
(6, 24, 'italien', 'je ne comprends pas cette phrase qui peur me la traduire?', '2027-04-21 10:48:39'),
(7, 24, 'italien', 'je ne comprends pas cette phrase qui peur me la traduire?', '2027-04-21 10:49:21'),
(26, 8, 'telephone', 'qwert qwert 3245', '2027-04-21 05:47:07'),
(27, 24, 'telephone', 'qwert qwert 3245', '2027-04-21 05:47:33'),
(28, 24, 'Application', 'mon compte bug je n\'arrive plus à envoyer un message que faire?', '2027-04-21 05:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `nom`) VALUES
(1, 'RAP'),
(2, 'POP'),
(3, 'classique française'),
(3, 'b'),
(5, 'Vehicule'),
(6, 'Vehicule'),
(7, 'Snapchat');

-- --------------------------------------------------------

--
-- Table structure for table `category_billiets`
--

CREATE TABLE `category_billiets` (
  `category_id` int(11) NOT NULL,
  `billiets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_billiets`
--

INSERT INTO `category_billiets` (`category_id`, `billiets_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(30, 5),
(5, 26),
(6, 27),
(7, 28);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `commentaires_id` int(11) NOT NULL,
  `textecommentaire` mediumtext,
  `date_publication` datetime DEFAULT NULL,
  `billiets_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`commentaires_id`, `textecommentaire`, `date_publication`, `billiets_id`, `user_id`) VALUES
(8, 'sdcw t34t rwr wr tudctu', '2025-04-21 01:22:39', 2, 8),
(9, 'Salut vous allez bien?', NULL, 1, 4),
(10, 'dfghjm WDD', '2025-04-21 01:28:54', 2, 8),
(12, 'gyhujik', '2024-04-21 08:58:13', 1, 4),
(14, 'r56t879y809\'y9', NULL, 3, 27),
(15, 'r56t879y809\'y95r7f98o086f8tdt', NULL, 3, 27),
(16, 'r56t879y809\'y95r7f9eifeieifhuuefuiw8o086f8tdt', NULL, 3, 27),
(17, 'sjoifoivoijp', NULL, 1, 27),
(18, 'sjoifoivoijp', NULL, 1, 27),
(19, 'dfghjm WDD amin', '2025-04-21 01:30:58', 2, 8),
(20, 'dfghjm WDD amin', '2025-04-21 01:33:46', 2, 8),
(21, 'dfghjm WDD amin', '2025-04-21 01:34:05', 2, 8),
(22, 'dfghjm WDD amin', '2025-04-21 01:34:13', 2, 8),
(23, 'dfghjm WDD amin cv', '2025-04-21 01:34:53', 2, 8),
(24, 'dfghjm WDD amin cv', '2025-04-21 01:36:01', 2, 8),
(25, 'dfghjm WDD amin cv', '2025-04-21 01:36:29', 2, 8),
(26, 'dfghjm WDD amin cv', '2025-04-21 01:36:37', 2, 8),
(27, 'dfghjm WDD amin cv', '2025-04-21 01:37:20', 2, 8),
(28, 'ccccccccccccccccccccccc', '2025-04-21 01:37:30', 2, 8),
(29, 'ciaoooooooooooooooooo', '2025-04-21 01:38:21', 2, 8),
(30, 'salut', '2025-04-21 01:38:52', 1, 27),
(31, 'hey tu fais quoi', '2025-04-21 01:39:12', 2, 27),
(32, 'wrwrv  r wfw', '2025-04-21 02:14:38', 2, 27),
(33, 'salut cv vous allez bien !!!!', '2025-04-21 02:15:05', 2, 27),
(34, 'vous faites quoi de beaux ?', '2025-04-21 02:15:39', 2, 27),
(35, 'ferwr', '2025-04-21 02:34:48', 2, 27),
(36, 'dcdsv', '2025-04-21 02:38:25', 2, 27),
(37, 'cv', '2025-04-21 02:40:03', 2, 27),
(38, 'tfyg ggggg hhh', '2025-04-21 07:24:55', 1, 24),
(39, 'tfyg ggggg hhh', '2025-04-21 07:24:56', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `user_id` int(11) NOT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `motdepasse` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `commentaires_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`user_id`, `lastName`, `firstName`, `pseudo`, `email`, `motdepasse`, `age`, `sexe`, `commentaires_id`) VALUES
(2, NULL, NULL, NULL, 'bentani@edf', 'er6t87y9u0ioè', NULL, NULL, 1),
(3, NULL, NULL, 'gigis', 'qu9erfoet7yu7wedsrty@gmail.com', 'sfoilkdfvnsk', NULL, NULL, 3),
(4, NULL, NULL, 'gigis', 'amin.bentani@hetic.com', 'salut', NULL, NULL, 4),
(5, NULL, NULL, '', 'bentani.amin2000@gmail.com', 'salut', NULL, NULL, 5),
(6, NULL, NULL, '', 'bentani.amin2000@gmail.com', 'salut', NULL, NULL, 6),
(7, NULL, NULL, '', 'qr@gmail.com', 'qwerty', NULL, NULL, 7),
(8, NULL, NULL, 'erwan', 'erwan@gmailcom', 'qwerty', NULL, NULL, 8),
(9, NULL, NULL, '', '', '', NULL, NULL, 9),
(10, NULL, NULL, '', '', '', NULL, NULL, 10),
(11, NULL, NULL, '', '', '', NULL, NULL, 11),
(12, NULL, NULL, '', '', '', NULL, NULL, 12),
(13, NULL, NULL, '', '', '', NULL, NULL, 13),
(14, NULL, NULL, '', '', '', NULL, NULL, 14),
(15, NULL, NULL, '', '', '', NULL, NULL, 15),
(16, NULL, NULL, '', '', '', NULL, NULL, 16),
(17, NULL, NULL, '', '', '', NULL, NULL, 17),
(18, NULL, NULL, '', '', '', NULL, NULL, 18),
(19, NULL, NULL, '', '', '', NULL, NULL, 19),
(20, NULL, NULL, '', '', '', NULL, NULL, 20),
(21, NULL, NULL, '', '', '', NULL, NULL, 21),
(22, NULL, NULL, '', '', '', NULL, NULL, 22),
(23, NULL, NULL, '', 'bentani.amin2000@gmail.com', 'qwerty', NULL, NULL, 23),
(24, NULL, NULL, 'adam', 'adam@gmail.com', 'qwerty', NULL, NULL, 24),
(25, NULL, NULL, 'homer', 'simpson@gmail.com', 'qwerty', NULL, NULL, 25),
(26, NULL, NULL, 'homer', 'simpson@gmail.com', 'qwerty', NULL, NULL, 26),
(27, NULL, NULL, 'gisel', 'javar@hotmail.com', 'qwerty', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billiets`
--
ALTER TABLE `billiets`
  ADD PRIMARY KEY (`billiets_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category_billiets`
--
ALTER TABLE `category_billiets`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `billiets_id` (`billiets_id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`commentaires_id`),
  ADD KEY `billiets_id` (`billiets_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billiets`
--
ALTER TABLE `billiets`
  ADD CONSTRAINT `billiets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `profil` (`user_id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_billiets` (`category_id`);

--
-- Constraints for table `category_billiets`
--
ALTER TABLE `category_billiets`
  ADD CONSTRAINT `category_billiets_ibfk_1` FOREIGN KEY (`billiets_id`) REFERENCES `billiets` (`billiets_id`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`billiets_id`) REFERENCES `billiets` (`billiets_id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `profil` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
