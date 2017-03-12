-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Dim 12 Mars 2017 à 14:56
-- Version du serveur :  5.6.34
-- Version de PHP :  7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `inventory_dtb`
--

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `logs`
--

INSERT INTO `logs` (`id`, `name`, `type`, `picture`, `date`) VALUES
(17, 'Joseph Quercia', 'edit', 'La nuit étoilée', '2017-03-12 09:42:25'),
(23, 'Joseph Quercia', 'edit', 'La nuit étoilée', '2017-03-12 09:42:32'),
(25, 'Joseph Quercia', 'add', 'Le Fils de l\'homme', '2017-03-12 09:42:38'),
(27, 'Joseph Quercia', 'delete', 'Le Fils de l\'homme', '2017-03-12 09:42:45'),
(52, 'Joseph Quercia', 'edit', 'Nighthawks', '2017-03-12 08:43:02'),
(54, 'Joseph Quercia', 'add_user', 'Léna Mari', '2017-03-12 09:43:59'),
(55, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 09:44:37'),
(56, 'Léna Mari', 'add', 'Le Baiser', '2017-03-12 09:46:47'),
(57, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 11:19:28'),
(58, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 11:39:56'),
(59, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 11:49:41'),
(60, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 11:51:07'),
(61, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 11:56:45'),
(62, 'Léna Mari', 'edit', 'La nuit étoilée', '2017-03-12 11:56:50'),
(63, 'Joseph Quercia', 'add', 'La naissance de Vénus', '2017-03-12 13:52:40'),
(64, 'Joseph Quercia', 'edit', 'Impression, soleil levant', '2017-03-12 13:52:56'),
(65, 'Léna Mari', 'add_user', 'Antoine Mouës', '2017-03-12 13:54:07');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `numberAvailable` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `name`, `artist`, `description`, `img`, `price`, `numberAvailable`, `date`) VALUES
(56, 'La nuit étoilée', 'Vincent Van Gogh', 'La Nuit étoilée est une peinture de l\'artiste peintre post-impressionniste néerlandais Vincent van Gogh. Le tableau représente ce que Van Gogh pouvait voir de la chambre qu\'il occupait dans l\'asile du monastère Saint-Paul-de-Mausole à Saint-Rémy-de-Provence en mai 1889. Souvent présenté comme son grand œuvre, le tableau a été reproduit à de très nombreuses reprises. Il est conservé au Museum of Modern Art (MoMA) à New York depuis 19411.', '1920px-Van_Gogh_-_Starry_Night_-_Google_Art_Project.jpg', 12, 12, '2017-03-05 15:08:16'),
(57, 'La Joconde', 'Léonard de Vinci', 'La Joconde, ou Portrait de Mona Lisa, est un tableau de l\'artiste italien Léonard de Vinci, réalisé entre 1503 et 1506, qui représente un portrait mi-corps, probablement celui de la florentine Lisa Gherardini, épouse de Francesco del Giocondo', 'Mona_Lisa,_by_Leonardo_da_Vinci,_from_C2RMF_retouched.jpg', 122789, 12, '2017-03-05 15:12:01'),
(58, 'La Cène', 'Léonard de Vinci', 'La Cène (en italien : L\'Ultima Cena, soit « le Dernier Repas ») de Léonard de Vinci est une peinture murale à la détrempe (tempera) de 460 × 880 cm, réalisée de 1494 à 1498 pour le réfectoire du couvent dominicain de Santa Maria delle Grazie à Milan, qui était considérée jusqu\'au milieu du xixe siècle comme son chef-d\'œuvre.', '19231841ec79407b50f27ace00b3e477.jpg', 1789, 18, '2017-03-05 16:42:25'),
(59, 'Nighthawks', 'Edward Hopper', 'Nighthawks est un tableau peint en 1942 par Edward Hopper.', 'nighthawks.jpg', 67890, 9, '2017-03-05 16:43:34'),
(60, 'Le Cri', 'Edvard Munch', 'Le Cri (en norvégien : Skrik) est une œuvre expressionniste de l\'artiste norvégien Edvard Munch dont il existe cinq versions (trois peintures, un pastel et une lithographie) réalisées entre 1893 et 1917. Symbolisant l\'homme moderne emporté par une crise d\'angoisse existentielle, elle est considérée comme l\'œuvre la plus importante de l\'artiste. Le paysage en arrière-plan est le fjord d\'Oslo, vu d\'Ekeberg. L\'une des cinq versions a été vendue par Sotheby\'s à New York pour un montant de 119,9 millions de dollars. Elle détient ainsi, le 2 mai 2012, le record de vente d\'une peinture aux enchères1.', 'The_Scream.jpg', 9997, 23, '2017-03-05 16:44:46'),
(61, 'La Grande Vague de Kanagawa', 'Hokusai', 'La Grande Vague de Kanagawa (神奈川沖浪裏, Kanagawa-oki nami-ura?, littéralement Sous la vague au large de Kanagawa), plus connue sous le nom de La Vague2, est une célèbre estampe japonaise du peintre japonais spécialiste de l\'ukiyo-e, Hokusai, publiée en 18303 ou en 1831Note 1 pendant l\'époque d\'Edo.', 'laGrandeVague.jpg', 67890, 34, '2017-03-05 16:46:20'),
(62, 'Le Fils de l\'homme', 'Magritte', 'Le Fils de l\'homme est une toile de René Magritte qui date de 1964. On y voit un homme debout devant un mur et un paysage marin ayant une pomme devant le visage, seul son œil gauche apparait.', 'le-fils-de-lhomme-thumb.jpg', 5678, 67, '2017-03-11 16:39:30'),
(64, 'Impression, soleil levant', 'Claude Monet', 'Impression, soleil levant est un tableau de Claude Monet conservé au musée Marmottan à Paris, dont le titre donné pour l\'exposition d\'avril 1874 a donné son nom au courant impressionniste.', 'claudeMonetImpressions.jpg', 10892, 1234, '2017-03-11 18:35:07'),
(73, 'Le Baiser', 'Gustave Klimt', 'Le Baiser est un tableau du peintre autrichien Gustav Klimt réalisé de 1908 à 1909. Huile sur toile recouverte de feuilles d\'or, elle est conservée au palais du Belvédère à Vienne', 'klimt_lebaiser.jpeg', 56789, 23, '2017-03-12 09:46:47'),
(74, 'La naissance de Vénus', 'Sandro Botticelli', 'La Naissance de Vénus est un tableau majeur de Sandro Botticelli, peint vers 1485 et conservé à la Galerie des Offices. Il a été peint selon la technique de la tempera.', '200761_1436266153_botticelli-venus-sipa-web.jpg', 68578, 34, '2017-03-12 13:52:40');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `contributions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `picture`, `contributions`) VALUES
(2, 'joseph.q@me.com', '28e5db6023f3f830251c1361767bd13fddf125e9b64593d1ddfa70e1d3768b68', 'Joseph Quercia', 'server/files/joseph-quercia.jpg', 44),
(89, 'lena.mari@gmail.com', '52c891e46fd603b4bd9f53f209d4a03a2b7a7bf54a5a5a35b30335e09842a6a6', 'Léna Mari', 'server/files/15235472_1437876129557660_305052000474605242_o.jpg', 8),
(90, 'antoine2@moues.fr', '75735ec8785e4c5f7c8064ea2133c742b73360b39eab265de4a0a4bb639d346b', 'Antoine Mouës', 'server/files/14681655_1118594374842662_6584283876361373278_n.jpg', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT pour la table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
