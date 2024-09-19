-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 sep. 2024 à 11:54
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `form_visites`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `nom_utilisateur` varchar(30) NOT NULL,
  `services` varchar(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `mot_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`nom_utilisateur`, `services`, `roles`, `mot_passe`) VALUES
('brunelle', 'qhse', 'personne_a_visiter', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `agent_securite`
--

CREATE TABLE `agent_securite` (
  `nom_utilisateur` varchar(30) NOT NULL,
  `services` varchar(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `mot_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `agent_securite`
--

INSERT INTO `agent_securite` (`nom_utilisateur`, `services`, `roles`, `mot_passe`) VALUES
('memphis', 'ctp', 'agent_securite', 'memphis/');

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `nom_utilisateur` varchar(30) NOT NULL,
  `services` varchar(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `mot_passe` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`nom_utilisateur`, `services`, `roles`, `mot_passe`) VALUES
('loica', 'qhse', 'agent_securite', '$2y$10$7');

-- --------------------------------------------------------

--
-- Structure de la table `personne_a_visiter`
--

CREATE TABLE `personne_a_visiter` (
  `nom_utilisateur` varchar(30) NOT NULL,
  `services` varchar(30) NOT NULL,
  `roles` varchar(30) NOT NULL,
  `mot_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne_a_visiter`
--

INSERT INTO `personne_a_visiter` (`nom_utilisateur`, `services`, `roles`, `mot_passe`) VALUES
('merveille', 'si', 'personne_a_visiter', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `visites`
--

CREATE TABLE `visites` (
  `heure_arrivee` time DEFAULT NULL,
  `date_jour` date DEFAULT NULL,
  `nom_utilisateur` varchar(50) NOT NULL,
  `n_cni` varchar(20) DEFAULT NULL,
  `societe` varchar(100) DEFAULT NULL,
  `objet` text DEFAULT NULL,
  `personne_a_visiter` varchar(100) DEFAULT NULL,
  `numero_du_visiteur` varchar(20) DEFAULT NULL,
  `agent_securite` varchar(50) DEFAULT NULL,
  `heure_sortie` time DEFAULT NULL,
  `statut` enum('approuvee','patientee','rejetee') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visites`
--

INSERT INTO `visites` (`heure_arrivee`, `date_jour`, `nom_utilisateur`, `n_cni`, `societe`, `objet`, `personne_a_visiter`, `numero_du_visiteur`, `agent_securite`, `heure_sortie`, `statut`) VALUES
('18:16:00', '2024-09-12', 'helokitty', 'n_cni', 'societe', 'objet', 'merveille', '65745672', 'flex', '00:00:00', 'patientee');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

CREATE TABLE `visiteur` (
  `Noms` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero_telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`Noms`, `email`, `numero_telephone`) VALUES
('merveille', 'merveille@gmail.com', 0),
('moi', 'mervy@gmail.com', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`nom_utilisateur`);

--
-- Index pour la table `agent_securite`
--
ALTER TABLE `agent_securite`
  ADD PRIMARY KEY (`nom_utilisateur`),
  ADD UNIQUE KEY `mot_passe` (`mot_passe`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`nom_utilisateur`);

--
-- Index pour la table `personne_a_visiter`
--
ALTER TABLE `personne_a_visiter`
  ADD PRIMARY KEY (`mot_passe`);

--
-- Index pour la table `visites`
--
ALTER TABLE `visites`
  ADD PRIMARY KEY (`nom_utilisateur`);

--
-- Index pour la table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
