-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 17 Novembre 2017 à 17:14
-- Version du serveur :  5.6.26
-- Version de PHP :  5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ficheserverdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `name`, `sequence`) VALUES
(1, 'formation', 'training', 1),
(2, 'formateur', 'trainer', 2),
(3, 'logistique', 'logistic', 3),
(4, 'general', 'global', 4);

-- --------------------------------------------------------

--
-- Structure de la table `champs`
--

CREATE TABLE IF NOT EXISTS `champs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `champs`
--

INSERT INTO `champs` (`id`, `nom`, `name`, `category_id`, `sequence`) VALUES
(1, 'equilibre theorie / pratique', 'balance of lecture / pratical', 1, 1),
(2, 'duree de la formation', 'training schedules', 1, 2),
(3, 'duree des pauses', 'length of breakes', 1, 3),
(4, 'apport d''elements nouveaux', 'contribution of the new elements', 1, 4),
(5, 'materiel utilises', 'use of equipments', 1, 5),
(6, 'fascicule remis ou envoye', 'manual provided or send', 1, 6),
(7, 'Expression', 'Expression', 2, 1),
(8, 'Explications claires', 'Clear explanations', 2, 2),
(9, 'Connaissances', 'Knowledge', 2, 3),
(11, 'Organisation', 'Setting up', 2, 4),
(12, 'Disponibilite', 'Availability', 2, 5),
(13, 'Etat et proprete des Infrastructures', 'Infrastructure''s cleanness & state', 3, 1),
(14, 'Accueil', 'Welcome', 3, 2),
(15, 'Repas de midi', 'Lunch', 3, 3),
(16, 'Qu''evez-vous pense de la formation dans sa globalite ?', 'What did you think about the training as a whole ?', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `champs_fiches`
--

CREATE TABLE IF NOT EXISTS `champs_fiches` (
  `id` int(11) NOT NULL,
  `fich_id` int(11) NOT NULL,
  `champ_id` int(11) NOT NULL,
  `tmc` tinyint(1) NOT NULL DEFAULT '0',
  `mc` tinyint(1) NOT NULL DEFAULT '0',
  `sat` tinyint(1) NOT NULL DEFAULT '0',
  `tsat` tinyint(1) NOT NULL DEFAULT '0',
  `commentaire` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `code`, `nom`, `telephone`, `email`, `adresse`) VALUES
(1, '001', 'CFAO', '+229875363636', '', '-'),
(2, '002', 'TOTAL E&P', '+23767345555', '', '-'),
(3, '003', 'DIETSMANN', '+237673839978', '', ''),
(4, '004', 'SERVTEC', '+23756474839', '', ''),
(5, '005', 'SODEXO', '+241045678948', '', ''),
(6, '006', 'PREZIOSO', '+23783938377', '', ''),
(7, '007', 'CAROIL', '+242067895645', '', ''),
(8, '008', 'SCHLUMBERGER', '+242067895645', '', ''),
(9, '009', 'TPSMI', '+242839383777', '', ''),
(10, '010', 'MBTP', '+23783938377', '', ''),
(11, '011', 'VANTAGE', '+242839383777', '', ''),
(12, '012', 'SNPC', '+24206647828', '', ''),
(13, '013', 'DARON', '+2420937837', '', ''),
(14, '014', 'SGS', '+24283938377', '', ''),
(15, '015', 'INTERIM 2000', '+2420937837', '', ''),
(16, '016', 'ICS', '+24205667436', '', ''),
(17, '017', 'SAM', '+2420678956', '', ''),
(18, '018', 'BASIS', '+24283938377', '', ''),
(19, '019', 'BORETS', '+2378393837', '', ''),
(20, '020', 'INDT', '+229875368', '', ''),
(21, '021', 'KHABOR', '+24206789564', '', ''),
(22, '022', 'MAERSK', '+242067895645', '', ''),
(23, '023', 'TECHNIP FMC', '+22987536363', '', ''),
(24, '024', 'ANOTECH', '+22987536363', '', ''),
(25, '025', 'ATIS NEBEST', '+2298753636', '', ''),
(26, '026', 'ATLANTICA', '+2420678956', '', ''),
(27, '027', 'BM TECHNOLOGIE', '+2420678956', '', ''),
(28, '028', 'CLO SERVICES', '+22987536363', '', ''),
(29, '029', 'EAT MAURO', '+23767383997', '', ''),
(30, '030', 'EUROFILIALES', '+23767383997', '', ''),
(31, '031', 'FRIEDLANDER', '+24206789563', '', ''),
(32, '032', 'GLOBAL COOPORATION COMPANY', '+24206789563', '', ''),
(33, '033', 'LOXEA', '+2420678956', '', ''),
(34, '034', 'MI SWAGO', '+2420937837', '', ''),
(35, '035', 'RINA SERVICE', '+2420937837', '', ''),
(36, '036', 'PRETECO', '+2420937837', '', ''),
(37, '037', 'SCAFALL', '+2378393837', '', ''),
(38, '038', 'SNEP CONGO', '+2420678956', '', ''),
(39, '039', 'SOCOTRANS', '+24205667436', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `clients_sessions`
--

CREATE TABLE IF NOT EXISTS `clients_sessions` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients_sessions`
--

INSERT INTO `clients_sessions` (`id`, `client_id`, `session_id`, `nombre`) VALUES
(1, 3, 9, 9),
(2, 13, 9, 3),
(3, 8, 9, 5),
(4, 13, 10, 3),
(5, 31, 10, 4),
(6, 13, 11, 3),
(7, 31, 11, 4);

-- --------------------------------------------------------

--
-- Structure de la table `fiches`
--

CREATE TABLE IF NOT EXISTS `fiches` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `session_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `observations` text NOT NULL,
  `statut` smallint(1) NOT NULL DEFAULT '0',
  `verrou` smallint(1) NOT NULL DEFAULT '0',
  `downloaded` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fiches`
--

INSERT INTO `fiches` (`id`, `code`, `session_id`, `client_id`, `observations`, `statut`, `verrou`, `downloaded`) VALUES
(1, '02303201', 1, 2, '', 1, 0, 0),
(2, '02303202', 1, 1, '', 0, 1, 1),
(3, '02303203', 1, 1, '', 1, 1, 0),
(4, '02303204', 1, 1, '', 0, 1, 1),
(5, '02303205', 1, 2, '', 1, 1, 0),
(6, '02303206', 1, 1, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

CREATE TABLE IF NOT EXISTS `formateurs` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formateurs`
--

INSERT INTO `formateurs` (`id`, `code`, `nom`, `prenom`, `telephone`, `email`, `adresse`) VALUES
(1, '456', 'BANTSIELISSI', 'B.', '+22987536363', 'exss@test.com', 'hvjknln'),
(2, '459', 'BOUNDA', 'C.', '+237673839984', 'cbounda@gmail.com', 'Coraf'),
(3, '568', 'NGOUMA', 'D.', '+242839383777', 'dngouma@gmail.com', 'TSE-TSE'),
(4, '634', 'DOMBO', 'E.', '+2420678956', 'exss@test.com', '-'),
(5, '654', 'MADINGOU', 'F.', '+2378393837', '', ''),
(6, '532', 'SAYA', 'H.', '', '', ''),
(7, '431', 'ATIENZA', 'J.', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `intitule` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `code`, `intitule`, `name`) VALUES
(1, '001', 'UTILISATION D''EXTINCTEURS', 'FIRE EXTINGUISHERS USE'),
(2, '002', 'H2S', 'H2S'),
(3, '003', 'VERIFICATEUR ECHAFAUDAGE', 'SCAFFOLDING CHECKING'),
(4, '004', 'SIS', 'SIS'),
(5, '005', 'BOSIET', 'BOSIET'),
(6, '006', 'EXTENSION ENI CD', 'ENI CD EXTENSION'),
(7, '007', 'EPI', 'EPI'),
(8, '008', 'RC1', 'RC1'),
(9, '009', 'CPVL', 'CPVL'),
(10, '010', 'FOET', 'FOET'),
(11, '011', 'MONTAGE & DEMONTAGE ECHAFAUDAGE', 'MOUNTING & UMOUNTING OF SCAFFOLDINGS'),
(12, '012', 'ESPACE CONFINE', 'CONFINED AREA'),
(13, '013', 'ENIA', 'ENIA'),
(14, '014', 'SST', 'SST'),
(15, '015', 'ENI CD', 'ENI CD'),
(16, '016', 'H0B0', 'H0B0'),
(17, '017', 'GESTES ET POSTURES', 'GESTURES AND POSTURES'),
(18, '018', 'HUET', 'HUET');

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE IF NOT EXISTS `parametres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `siteweb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `dt_debut` date NOT NULL,
  `dt_fin` date NOT NULL,
  `formateur_id` int(11) NOT NULL,
  `formation_id` int(11) NOT NULL,
  `nb_participants` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `statut` smallint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `code`, `dt_debut`, `dt_fin`, `formateur_id`, `formation_id`, `nb_participants`, `created`, `user_id`, `statut`) VALUES
(1, '45466', '2017-10-11', '2017-10-11', 1, 1, 10, '2017-10-11 14:48:37', 1, 1),
(2, '6789', '2017-10-18', '2017-10-26', 1, 2, 56, '2017-10-12 19:28:32', 0, 1),
(3, '34678', '2017-10-03', '2017-10-21', 3, 1, 17, '2017-10-12 19:33:01', 1, 1),
(4, '634', '2017-10-11', '2017-10-13', 3, 6, 46, '2017-10-12 19:58:56', 1, 1),
(5, '589', '2017-10-25', '2017-10-29', 2, 4, 34, '2017-10-12 19:59:40', 1, 1),
(6, '123', '2017-10-24', '2017-10-27', 2, 4, 34, '2017-10-12 20:25:42', 1, 1),
(7, '4546', '2017-10-12', '2017-10-28', 0, 6, 56, '2017-10-12 20:26:13', 1, 1),
(8, '698', '2017-10-03', '2017-10-27', 3, 2, 68, '2017-10-12 20:26:59', 1, 1),
(9, '202', '0000-00-00', '0000-00-00', 5, 4, 0, '2017-10-30 14:40:42', 0, 1),
(10, '203', '0000-00-00', '0000-00-00', 4, 13, 0, '2017-10-30 15:27:27', 1, 1),
(11, '203', '2017-10-10', '2017-10-30', 4, 13, 0, '2017-10-30 15:30:08', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'haisen', '$2y$10$20WfJ.qoVy8cjMH86TdNUO/b.bJ/8m9XLkIb91sqFoSKLcfrrCuOC', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `champs`
--
ALTER TABLE `champs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `champs_fiches`
--
ALTER TABLE `champs_fiches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients_sessions`
--
ALTER TABLE `clients_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiches`
--
ALTER TABLE `fiches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `champs`
--
ALTER TABLE `champs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `champs_fiches`
--
ALTER TABLE `champs_fiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT pour la table `clients_sessions`
--
ALTER TABLE `clients_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `fiches`
--
ALTER TABLE `fiches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `parametres`
--
ALTER TABLE `parametres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
