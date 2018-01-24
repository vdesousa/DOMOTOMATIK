-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 28 déc. 2017 à 19:17
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `BDD_5e`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id` int(11) NOT NULL,
  `id_objet` int(11) NOT NULL,
  `id_utilisateur` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `date_achat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` int(11) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `alerter`
--

CREATE TABLE `alerter` (
  `id_alerte` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_administrateur` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `type_alerte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assister`
--

CREATE TABLE `assister` (
  `id_message` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_administrateur` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bilan_de_consommation`
--

CREATE TABLE `bilan_de_consommation` (
  `id_bilan` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `consommation` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_objet` int(11) NOT NULL,
  `nom_objet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id_capteur` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_cemac` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `valeur_temps_reel` float NOT NULL,
  `allume_ou_eteint` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id_capteur`, `id_utilisateur`, `id_cemac`, `id_piece`, `type`, `valeur_temps_reel`, `allume_ou_eteint`) VALUES
(1, 1, 1, 1, 'Capteur de température', 22, 0),
(2, 2, 2, 2, 'Capteur d\'humidité', 20, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cemac`
--

CREATE TABLE `cemac` (
  `id_cemac` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `communiquer`
--

CREATE TABLE `communiquer` (
  `id_communication` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `id_cemac` int(11) NOT NULL,
  `date` date NOT NULL,
  `valeur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `documents_juridiques`
--

CREATE TABLE `documents_juridiques` (
  `id_document_juridique` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_de_creation` date NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `editer`
--

CREATE TABLE `editer` (
  `id_edition` int(11) NOT NULL,
  `id_administrateur` int(11) NOT NULL,
  `id_document_juridique` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `complement` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pannes`
--

CREATE TABLE `pannes` (
  `id_panne` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `rapport_erreur` varchar(255) NOT NULL,
  `date_panne` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pannes`
--

INSERT INTO `pannes` (`id_panne`, `id_capteur`, `rapport_erreur`, `date_panne`) VALUES
(1, 1, 'Défaillance du capteur de température ', '2017-12-15 14:30:16'),
(2, 2, 'Défaillance du capteur d\'humidité', '2017-12-06 06:44:17');

-- --------------------------------------------------------

--
-- Structure de la table `parametrer`
--

CREATE TABLE `parametrer` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `valeur_souhaitee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse_postale` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `prenom`, `nom`, `adresse_postale`, `telephone`, `email`, `mot_de_passe`) VALUES
(50, 'Toan', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL,
  `nom_de_piece` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_maison`, `nom_de_piece`) VALUES
(1, 1, 'Chambre à coucher'),
(2, 1, 'Cuisine'),
(3, 2, 'Salle de bain');

-- --------------------------------------------------------

--
-- Structure de la table `transmettre`
--

CREATE TABLE `transmettre` (
  `id_alerte` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `motif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `date_sign_up` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` char(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `newsletter`, `date_sign_up`, `image`, `name`, `phone`, `password`) VALUES
(74, 0, '2017-12-28 18:23:34', '', 'Toan', 'caca', '$2y$10$auLRLzej2LbpvijJ0njQsOeUgsIHy6dpiRVnqgNrz5e/IUsrogHYW'),
(75, 0, '2017-12-28 18:37:33', '', 'Toan', '0781272999', '$2y$10$5DunYpZZwrFKJQRjRGsOfezwC/NzsI0V4WVKRW5cxneSKrUX9YD9i');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`);

--
-- Index pour la table `alerter`
--
ALTER TABLE `alerter`
  ADD PRIMARY KEY (`id_alerte`);

--
-- Index pour la table `assister`
--
ALTER TABLE `assister`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `bilan_de_consommation`
--
ALTER TABLE `bilan_de_consommation`
  ADD PRIMARY KEY (`id_bilan`);

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_objet`);

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_capteur`);

--
-- Index pour la table `cemac`
--
ALTER TABLE `cemac`
  ADD PRIMARY KEY (`id_cemac`);

--
-- Index pour la table `communiquer`
--
ALTER TABLE `communiquer`
  ADD PRIMARY KEY (`id_communication`);

--
-- Index pour la table `documents_juridiques`
--
ALTER TABLE `documents_juridiques`
  ADD PRIMARY KEY (`id_document_juridique`);

--
-- Index pour la table `editer`
--
ALTER TABLE `editer`
  ADD PRIMARY KEY (`id_edition`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`);

--
-- Index pour la table `pannes`
--
ALTER TABLE `pannes`
  ADD PRIMARY KEY (`id_panne`);

--
-- Index pour la table `parametrer`
--
ALTER TABLE `parametrer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_administrateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `alerter`
--
ALTER TABLE `alerter`
  MODIFY `id_alerte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `assister`
--
ALTER TABLE `assister`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `bilan_de_consommation`
--
ALTER TABLE `bilan_de_consommation`
  MODIFY `id_bilan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_objet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `cemac`
--
ALTER TABLE `cemac`
  MODIFY `id_cemac` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `communiquer`
--
ALTER TABLE `communiquer`
  MODIFY `id_communication` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `documents_juridiques`
--
ALTER TABLE `documents_juridiques`
  MODIFY `id_document_juridique` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `editer`
--
ALTER TABLE `editer`
  MODIFY `id_edition` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pannes`
--
ALTER TABLE `pannes`
  MODIFY `id_panne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `parametrer`
--
ALTER TABLE `parametrer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;