-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2021 at 02:06 AM
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
  `id_seance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `justifiee` tinyint(1) NOT NULL,
  `comm_abs` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_user` int(11) NOT NULL,
  `nom_ens` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom_ens` varchar(25) COLLATE utf8_bin NOT NULL,
  `email_ens` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table  `etudiant`
--

CREATE TABLE `etudiant` (
  `id_user` int(11) NOT NULL,
  `CNE` int(11) NOT NULL,
  `nom_etu` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom_etu` varchar(25) COLLATE utf8_bin NOT NULL,
  `date_naiss_etu` date DEFAULT NULL,
  `adresse_etu` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `ville_etu` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `email_etu` varchar(30) COLLATE utf8_bin NOT NULL,
  `phone_etu` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `intitule_module` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id_note` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `heure_debut` time DEFAULT NULL,
  `heure_fin` time DEFAULT NULL,
  `type_seance` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `type_user` varchar(20) COLLATE utf8_bin NOT NULL,
  `access` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `FK_Avoir` (`id_seance`),
  ADD KEY `FK_concerne` (`id_user`);

--
-- Indexes for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `FK_Etudiant` (`id_user`),
  ADD KEY `FK_Module` (`id_module`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `FK_Enseigne` (`id_user`),
  ADD KEY `FK_Occupe` (`id_module`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_Avoir` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `FK_concerne` FOREIGN KEY (`id_user`) REFERENCES `etudiant` (`id_user`);

--
-- Constraints for table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_Inheritance` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Inheritance_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `FK_Etudiant` FOREIGN KEY (`id_user`) REFERENCES `etudiant` (`id_user`),
  ADD CONSTRAINT `FK_Module` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `FK_Enseigne` FOREIGN KEY (`id_user`) REFERENCES `enseignant` (`id_user`),
  ADD CONSTRAINT `FK_Occupe` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
