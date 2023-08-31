-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 31 août 2023 à 18:25
-- Version du serveur : 8.0.33
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mesLivres`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `name`, `description`, `price`) VALUES
(18, 'Apprenez les langages HTML5', 'Ce livre s&#039;adresse &agrave; de grands d&eacute;butants en d&eacute;veloppement informatique, qui n&#039;ont jamais programm&eacute; avec HTML5...', 20),
(19, 'Pimpez votre site web grace &agrave; CSS3', 'Con&ccedil;u pour les d&eacute;butants, cet ouvrage vous permettra de styliser vos pages con&ccedil;ues en HTML 5 gr&acirc;ce &agrave; CSS 3...', 25),
(20, 'Oh my code (JS edition)', 'Le JavaScript sert avant tout à rendre les pages web interactives et dynamiques du côté de l’utilisateur, mais il est  également de plus en plus utilisé pour...', 20),
(21, 'PHP 8 by Olivier Heurtrel', 'Ce livre sur PHP 8 (en version 8.0 au moment de l&#039;&eacute;criture) s&#039;adresse aux concepteurs et d&eacute;veloppeurs qui souhaitent utiliser PHP pour d&eacute;velopper...', 35),
(24, 'Les fondamentaux du SQL', 'Ce livre sur les fondamentaux du langage SQL s&#039;adresse aux d&eacute;veloppeurs et informaticiens d&eacute;butants appel&eacute;s &agrave; travailler avec un Syst&egrave;me de Gestion de Bases de Donn&eacute;es Relationnelles (SGBDR)...', 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
