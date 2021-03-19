-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 04:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apprenants`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id_absence` int(11) NOT NULL,
  `justifiee` tinyint(1) NOT NULL,
  `comm_abs` text COLLATE utf8_bin DEFAULT NULL,
  `fk_seance` int(11) NOT NULL,
  `fk_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `nom_ens` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom_ens` varchar(25) COLLATE utf8_bin NOT NULL,
  `email_ens` varchar(25) COLLATE utf8_bin NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_ens`, `prenom_ens`, `email_ens`, `fk_user`) VALUES
(1, 'oussama', 'oussama', 'oussama@gmail.com', 1),
(2, 'anas', 'anas', 'anas@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `CNE` int(11) NOT NULL,
  `nom_etu` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom_etu` varchar(25) COLLATE utf8_bin NOT NULL,
  `date_naiss_etu` date DEFAULT NULL,
  `adresse_etu` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ville_etu` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `email_etu` varchar(30) COLLATE utf8_bin NOT NULL,
  `phone_etu` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `CNE`, `nom_etu`, `prenom_etu`, `date_naiss_etu`, `adresse_etu`, `ville_etu`, `email_etu`, `phone_etu`, `fk_user`) VALUES
(1, 1155774466, 'hassan', 'Ali', '1990-12-16', 'Adresse de Alaoui Ali', 'Tanger', 'alaoui.ali@gmail.com', '0625143658', 3),
(2, 1254879652, 'Ali', 'ilyas', '1993-04-11', 'Adresse de MORABET ilyas', 'Tetouan', 'morabet.ilyas@gmail.com', '0658472435', 4),
(3, 88556324, 'SALHI', 'Steve', '1995-12-05', 'Adresse de Steve', 'London', 'steve.jobs@gmail.com', '0222555447', 5),
(4, 2147483647, 'ilyas', 'Fadoua', '0000-00-00', 'Adresse de Fadoua', 'Asila', 'hanafi.fadoua@gmail.com', '0655442211', 6),
(5, 217483247, 'farouk', 'farouk', '0000-00-00', 'Adressede Fadoua', 'Asila', 'farouk.fadoua@gmail.com', '0655442211', 7),
(6, 27483647, 'steve', 'steve', '0000-00-00', 'Adresse de Fadoua', 'Asila', 'hanafi.fadoua@gmail.com', '0655442211', 8),
(7, 283647, 'sara', 'sara', '0000-00-00', 'Adresse de Fadoua', 'Asila', 'sara.fadoua@gmail.com', '0655442211', 9),
(8, 667483647, 'fadoua', 'fadoua', '0000-00-00', 'Adresse de Fadoua', 'Asila', 'fadoua.fadoua@gmail.com', '0655442211', 10);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `intitule_module` varchar(30) COLLATE utf8_bin NOT NULL,
  `fk_enseigne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `intitule_module`, `fk_enseigne`) VALUES
(1, 'Developpement web', 1),
(2, 'JAVA', 2),
(3, 'Ruby', 2),
(4, 'Linux', 1),
(5, 'Docker', 2),
(6, 'NoSQL', 2),
(7, 'Javascript', 1),
(9, 'crypto', 1),
(10, 'jee', 1),
(11, 'python', 1),
(12, 'AI', 1),
(13, 'Nodejs', 1),
(14, 'Virtualisation', 2);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `note_module` int(11) NOT NULL,
  `fk_module` int(11) NOT NULL,
  `fk_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `type_seance` varchar(15) COLLATE utf8_bin NOT NULL,
  `fk_seance_module` int(11) NOT NULL,
  `fk_seance_enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id_seance`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`, `fk_seance_module`, `fk_seance_enseignant`) VALUES
(1, '2021-04-03', '13:30:00', '15:00:00', 'Cours', 13, 1),
(2, '2021-04-07', '08:30:00', '10:00:00', 'TP', 1, 1),
(3, '2021-04-11', '10:30:00', '12:00:00', 'Cours', 1, 1),
(4, '2021-04-05', '10:30:00', '12:00:00', 'Cours', 2, 2),
(5, '2021-04-07', '08:30:00', '10:00:00', 'TP', 2, 2),
(6, '2021-04-06', '13:30:00', '15:00:00', 'Cours', 3, 2),
(7, '2021-04-06', '15:30:00', '17:00:00', 'TD', 3, 2),
(8, '2021-04-01', '15:30:00', '17:00:00', 'Cours', 4, 1),
(9, '2021-04-02', '13:30:00', '15:00:00', 'Cours', 4, 1),
(10, '2021-04-02', '08:30:00', '10:00:00', 'TD', 5, 2),
(11, '2021-04-03', '10:30:00', '12:00:00', 'Cours', 5, 2),
(12, '2021-03-01', '10:30:00', '12:00:00', 'Cours', 6, 2),
(13, '2021-03-03', '08:30:00', '10:00:00', 'TP', 6, 2),
(14, '2020-05-05', '08:30:00', '10:00:00', 'TP', 7, 1),
(15, '2021-03-19', '07:32:00', '13:32:00', 'TD', 13, 1),
(16, '2022-02-02', '07:41:00', '07:41:00', 'TD', 13, 1),
(17, '2016-02-03', '11:28:00', '11:28:00', 'TP', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `access` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `access`) VALUES
(1, 'oussama', '123', 1),
(2, 'anas', '123', 1),
(3, 'hassan', '123', 0),
(4, 'Ali', '123', 0),
(5, 'SALHI', '123', 0),
(6, 'ilyas', '123', 0),
(7, 'farouk', '123', 0),
(8, 'steve', '123', 0),
(9, 'sara', '123', 0),
(10, 'fadoua', '123', 0),
(11, 'mariam', '123', 0),
(13, 'chafik', '123456789', 0),
(14, 'khadija', '123', 0),
(15, 'sir', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `FK_etudiant1` (`fk_etudiant`),
  ADD KEY `FK_seance` (`fk_seance`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`),
  ADD KEY `FK_ens` (`fk_user`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `FK_etu` (`fk_user`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `intitule_module` (`intitule_module`),
  ADD KEY `FK_Enseigne_module` (`fk_enseigne`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `FK_Etudiant2` (`fk_etudiant`),
  ADD KEY `FK_Module1` (`fk_module`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `FK__seance_enseignant` (`fk_seance_enseignant`),
  ADD KEY `FK__seance_module` (`fk_seance_module`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_etudiant1` FOREIGN KEY (`fk_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `FK_seance` FOREIGN KEY (`fk_seance`) REFERENCES `seance` (`id_seance`);

--
-- Constraints for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_ens` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etu` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `FK_Enseigne_module` FOREIGN KEY (`fk_enseigne`) REFERENCES `enseignant` (`id_enseignant`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_Etudiant2` FOREIGN KEY (`fk_etudiant`) REFERENCES `etudiant` (`id_etudiant`),
  ADD CONSTRAINT `FK_Module1` FOREIGN KEY (`fk_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK__seance_enseignant` FOREIGN KEY (`fk_seance_enseignant`) REFERENCES `enseignant` (`id_enseignant`),
  ADD CONSTRAINT `FK__seance_module` FOREIGN KEY (`fk_seance_module`) REFERENCES `module` (`id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
