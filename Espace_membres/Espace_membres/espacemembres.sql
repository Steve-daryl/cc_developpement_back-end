-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 16 avr. 2025 à 12:00
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espacemembres`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_motif` timestamp NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `pseudo`, `email`, `phone`, `password`, `date_creation`, `date_motif`, `avatar`) VALUES
(8, 'azerty', 'brayanpaul858@gmail.com', '677889900', '7c222fb2927d828af22f592134e8932480637c0d', '2025-04-16 06:06:15', '2025-04-16 06:06:15', NULL),
(9, 'tsbp', 'brayanpaul858@gmail.com', '456456464546', '$2y$10$R3v2O3wZtn7V/6a8Lbk4DeWZBXDE5Yk9RzneTRyMlsXn6SFfOU.VK', '2025-04-16 07:27:30', '2025-04-16 07:27:30', NULL),
(10, 'tsbp', 'brayanpaul858@gmail.com', '456456464546', '$2y$10$6VFm9EBVlKEVa8AcCRNLNer.li52izwX/JF8CSMwKI88DdAgBV1j2', '2025-04-16 07:28:01', '2025-04-16 07:28:01', 'uploads/1642433213pexels-brian-van-den-heuvel-1313267.jpg'),
(13, 'qwerty', 'huboxyviq@mailinator.com', '+1 (798) 222', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', '2025-04-16 09:51:25', '2025-04-16 09:51:25', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
