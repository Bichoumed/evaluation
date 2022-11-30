-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 juil. 2022 à 13:05
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `evaluation`
--

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `codematieres` varchar(7) NOT NULL,
  `nommatieres` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`codematieres`, `nommatieres`, `module`) VALUES
('\r\nMAI22', 'Probalité et statistiques ', 'Outils mathematiques et informatiques'),
('DEV21', 'Programmation Python', 'Programmation et développement'),
('DEV22', 'Langages web', 'Programmation et développement'),
('DPR21', 'Communication', 'Développement personnel'),
('DPR22', 'Anglais', 'Développement personnel'),
('DPR23', 'PPP', 'Développement personnel'),
('DSI21/R', 'SGBD 1 (MySQL)/LAN/CMS et PAO', 'Spécialité'),
('DSI22/R', 'PI DEV/SR/Multumedia', 'Spécialité'),
('MAI21', 'Algèbre ', 'Outils mathematiques et informatiques'),
('MAI23', 'Certification PIX 2', 'Outils mathematiques et informatiques'),
('SYR21', 'Système logique', 'Systémes et réseaux'),
('SYR22', 'SE Windows Server', 'Systémes et réseaux');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`codematieres`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
