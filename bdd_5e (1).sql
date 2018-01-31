-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2018 at 06:26 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd_5e`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
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
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id_administrateur` int(11) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `disponibilite`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alerter`
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
-- Table structure for table `assister`
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
-- Table structure for table `bilan_de_consommation`
--

CREATE TABLE `bilan_de_consommation` (
  `id_bilan` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `consommation` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `boutique`
--

CREATE TABLE `boutique` (
  `id_objet` int(11) NOT NULL,
  `nom_objet` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prix` float NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boutique`
--

INSERT INTO `boutique` (`id_objet`, `nom_objet`, `type`, `prix`, `description`, `photo`) VALUES
(1, 'temp', 'capteur', 12, '12312132113', '');

-- --------------------------------------------------------

--
-- Table structure for table `capteur`
--

CREATE TABLE `capteur` (
  `id_capteur` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_cemac` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `valeur_temps_reel` float NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `capteur`
--

INSERT INTO `capteur` (`id_capteur`, `id_utilisateur`, `id_cemac`, `id_piece`, `type`, `valeur_temps_reel`, `etat`) VALUES
(1, 1, 153, 1, 'Température', 23, 1),
(2, 1, 153, 1, 'Luminosité', 3, 1),
(3, 1, 153, 1, 'Présence', 0, 1),
(4, 1, 152, 1, 'Volets', 1, 1),
(5, 2, 178, 52, 'Température', 27, 1),
(6, 1, 152, 2, 'Alarme', 1, 1),
(10, 1, 153, 1, 'Caméra', 1, 1),
(11, 1, 153, 1, 'Porte', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cemac`
--

CREATE TABLE `cemac` (
  `id_cemac` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL,
  `id_appareil_1` int(11) DEFAULT NULL,
  `id_appareil_2` int(11) DEFAULT NULL,
  `id_appareil_3` int(11) DEFAULT NULL,
  `id_appareil_4` int(11) DEFAULT NULL,
  `id_appareil_5` int(11) DEFAULT NULL,
  `id_appareil_6` int(11) DEFAULT NULL,
  `id_appareil_7` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cemac`
--

INSERT INTO `cemac` (`id_cemac`, `id_maison`, `id_appareil_1`, `id_appareil_2`, `id_appareil_3`, `id_appareil_4`, `id_appareil_5`, `id_appareil_6`, `id_appareil_7`) VALUES
(152, 27, 4, 6, NULL, NULL, NULL, NULL, NULL),
(153, 27, 1, 2, 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `communiquer`
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
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`id`, `email`, `code`) VALUES
(1, 'vacs96@hotmail.com', '123456'),
(2, 'zdfzezfd@hotmail.com', '123456'),
(3, 'vacs96@gmail.com', '31743'),
(5, 'azerty@uiop.fr', '979036');

-- --------------------------------------------------------

--
-- Table structure for table `documents_juridiques`
--

CREATE TABLE `documents_juridiques` (
  `id_document_juridique` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_de_creation` date NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents_juridiques`
--

INSERT INTO `documents_juridiques` (`id_document_juridique`, `nom`, `date_de_creation`, `contenu`) VALUES
(1, 'CGU', '2018-01-02', 'ARTICLE 1 : Objet\r\nLes présentes « conditions générales d\'utilisation » ont pour objet l\'encadrement juridique des modalités de mise à disposition des services du site [Nom du site] et leur utilisation par « l\'Utilisateur ».\r\nLes conditions générales d\'utilisation doivent être acceptées par tout Utilisateur souhaitant accéder au site. Elles constituent le contrat entre le site et l\'Utilisateur. L’accès au site par l’Utilisateur signifie son acceptation des présentes conditions générales d’utilisation.\r\nÉventuellement :\r\nEn cas de non-acceptation des conditions générales d\'utilisation stipulées dans le présent contrat, l\'Utilisateur se doit de renoncer à l\'accès des services proposés par le site.\r\n[Nom du site] se réserve le droit de modifier unilatéralement et à tout moment le contenu des présentes conditions générales d\'utilisation.\r\nARTICLE 2 : Mentions légales\r\nL\'édition du site [Nom du site] est assurée par la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\n[Le Directeur / La Directrice] de la publication est [Madame / Monsieur] [Nom & Prénom].\r\nÉventuellement :\r\n[Nom de la société] est une société du groupe [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\nL\'hébergeur du site [Nom du site] est la Société [Nom de la société] [SAS / SA / SARL, etc.] au capital de [montant en euros] € dont le siège social est situé au [adresse du siège social].\r\nARTICLE 3 : Définitions\r\nLa présente clause a pour objet de définir les différents termes essentiels du contrat :\r\nUtilisateur : ce terme désigne toute personne qui utilise le site ou l\'un des services proposés par le site.\r\nContenu utilisateur : ce sont les données transmises par l\'Utilisateur au sein du site.\r\nMembre : l\'Utilisateur devient membre lorsqu\'il est identifié sur le site.\r\nIdentifiant et mot de passe : c\'est l\'ensemble des informations nécessaires à l\'identification d\'un Utilisateur sur le site. L\'identifiant et le mot de passe permettent à l\'Utilisateur d\'accéder à des services réservés aux membres du site. Le mot de passe est confidentiel.\r\nARTICLE 4 : accès aux services\r\nLe site permet à l\'Utilisateur un accès gratuit aux services suivants :\r\n[articles d’information] ;\r\n[annonces classées] ;\r\n[mise en relation de personnes] ;\r\n[publication de commentaires / d’œuvres personnelles] ;\r\n[…].\r\nLe site est accessible gratuitement en tout lieu à tout Utilisateur ayant un accès à Internet. Tous les frais supportés par l\'Utilisateur pour accéder au service (matériel informatique, logiciels, connexion Internet, etc.) sont à sa charge.\r\nSelon le cas :\r\nL’Utilisateur non membre n\'a pas accès aux services réservés aux membres. Pour cela, il doit s\'identifier à l\'aide de son identifiant et de son mot de passe.\r\nLe site met en œuvre tous les moyens mis à sa disposition pour assurer un accès de qualité à ses services. L\'obligation étant de moyens, le site ne s\'engage pas à atteindre ce résultat.\r\nTout événement dû à un cas de force majeure ayant pour conséquence un dysfonctionnement du réseau ou du serveur n\'engage pas la responsabilité de [Nom du site].\r\nL\'accès aux services du site peut à tout moment faire l\'objet d\'une interruption, d\'une suspension, d\'une modification sans préavis pour une maintenance ou pour tout autre cas. L\'Utilisateur s\'oblige à ne réclamer aucune indemnisation suite à l\'interruption, à la suspension ou à la modification du présent contrat.\r\nL\'Utilisateur a la possibilité de contacter le site par messagerie électronique à l’adresse [contact@nomdusite.com].\r\nARTICLE 5 : Propriété intellectuelle\r\nLes marques, logos, signes et tout autre contenu du site font l\'objet d\'une protection par le Code de la propriété intellectuelle et plus particulièrement par le droit d\'auteur.\r\nL\'Utilisateur sollicite l\'autorisation préalable du site pour toute reproduction, publication, copie des différents contenus.\r\nL\'Utilisateur s\'engage à une utilisation des contenus du site dans un cadre strictement privé. Une utilisation des contenus à des fins commerciales est strictement interdite.\r\nTout contenu mis en ligne par l\'Utilisateur est de sa seule responsabilité. L\'Utilisateur s\'engage à ne pas mettre en ligne de contenus pouvant porter atteinte aux intérêts de tierces personnes. Tout recours en justice engagé par un tiers lésé contre le site sera pris en charge par l\'Utilisateur.\r\nLe contenu de l\'Utilisateur peut être à tout moment et pour n\'importe quelle raison supprimé ou modifié par le site. L\'Utilisateur ne reçoit aucune justification et notification préalablement à la suppression ou à la modification du contenu Utilisateur.\r\nARTICLE 6 : Données personnelles\r\nLes informations demandées à l’inscription au site sont nécessaires et obligatoires pour la création du compte de l\'Utilisateur. En particulier, l\'adresse électronique pourra être utilisée par le site pour l\'administration, la gestion et l\'animation du service.\r\nLe site assure à l\'Utilisateur une collecte et un traitement d\'informations personnelles dans le respect de la vie privée conformément à la loi n°78-17 du 6 janvier 1978 relative à l\'informatique, aux fichiers et aux libertés. Le site est déclaré à la CNIL sous le numéro [numéro].\r\nEn vertu des articles 39 et 40 de la loi en date du 6 janvier 1978, l\'Utilisateur dispose d\'un droit d\'accès, de rectification, de suppression et d\'opposition de ses données personnelles. L\'Utilisateur exerce ce droit via :\r\nson espace personnel ;\r\nun formulaire de contact ;\r\npar mail à [adresse mail] ;\r\npar voie postale au [adresse].\r\nARTICLE 7 : Responsabilité et force majeure\r\nLes sources des informations diffusées sur le site sont réputées fiables. Toutefois, le site se réserve la faculté d\'une non-garantie de la fiabilité des sources. Les informations données sur le site le sont à titre purement informatif. Ainsi, l\'Utilisateur assume seul l\'entière responsabilité de l\'utilisation des informations et contenus du présent site.\r\nL\'Utilisateur s\'assure de garder son mot de passe secret. Toute divulgation du mot de passe, quelle que soit sa forme, est interdite.\r\nL\'Utilisateur assume les risques liés à l\'utilisation de son identifiant et mot de passe. Le site décline toute responsabilité.\r\nTout usage du service par l\'Utilisateur ayant directement ou indirectement pour conséquence des dommages doit faire l\'objet d\'une indemnisation au profit du site.\r\nUne garantie optimale de la sécurité et de la confidentialité des données transmises n\'est pas assurée par le site. Toutefois, le site s\'engage à mettre en œuvre tous les moyens nécessaires afin de garantir au mieux la sécurité et la confidentialité des données.\r\nLa responsabilité du site ne peut être engagée en cas de force majeure ou du fait imprévisible et insurmontable d\'un tiers.\r\nARTICLE 8 : Liens hypertextes\r\nDe nombreux liens hypertextes sortants sont présents sur le site, cependant les pages web où mènent ces liens n\'engagent en rien la responsabilité de [Nom du site] qui n\'a pas le contrôle de ces liens.\r\nL\'Utilisateur s\'interdit donc à engager la responsabilité du site concernant le contenu et les ressources relatives à ces liens hypertextes sortants.\r\nARTICLE 9 : Évolution du contrat\r\nLe site se réserve à tout moment le droit de modifier les clauses stipulées dans le présent contrat.\r\nARTICLE 10 : Durée\r\nLa durée du présent contrat est indéterminée. Le contrat produit ses effets à l\'égard de l\'Utilisateur à compter de l\'utilisation du service.\r\nARTICLE 11 : Droit applicable et juridiction compétente\r\nLa législation française s\'applique au présent contrat. En cas d\'absence de résolution amiable d\'un litige né entre les parties, seuls les tribunaux [du ressort de la Cour d\'appel de / de la ville de] [Ville] sont compétents.\r\nÉventuellement\r\nARTICLE 12 : Publication par l’Utilisateur\r\nLe site permet aux membres de publier [des commentaires / des œuvres personnelles].\r\nDans ses publications, le membre s’engage à respecter les règles de la Netiquette et les règles de droit en vigueur.\r\nLe site exerce une modération [a priori / a posteriori] sur les publications et se réserve le droit de refuser leur mise en ligne, sans avoir à s’en justifier auprès du membre.\r\nLe membre reste titulaire de l’intégralité de ses droits de propriété intellectuelle. Mais en publiant une publication sur le site, il cède à la société éditrice le droit non exclusif et gratuit de représenter, reproduire, adapter, modifier, diffuser et distribuer sa publication, directement ou par un tiers autorisé, dans le monde entier, sur tout support (numérique ou physique), pour la durée de la propriété intellectuelle. Le Membre cède notamment le droit d\'utiliser sa publication sur internet et sur les réseaux de téléphonie mobile.\r\nLa société éditrice s\'engage à faire figurer le nom du membre à proximité de chaque utilisation de sa publication.'),
(2, 'mention_legale', '2018-01-02', 'Nos mentions légales\r\n\r\nMerci de lire attentivement les présentes modalités d\'utilisation du présent site avant de le parcourir. En vous connectant sur ce site, vous acceptez sans réserve les présentes modalités.\r\n\r\nEditeur du site\r\n\r\nSite Internet Qualité\r\npar Natural-net\r\n49 boulevard Antoine Gautier\r\n33000 Bordeaux\r\nFrance\r\nTél. : + 33 (0)6 62 79 25 55\r\nFax : + 33 (0)5 40 00 02 66\r\nhttps://www.site-internet-qualite.fr\r\n\r\nNatural-net est une EURL au capital de 3500€\r\nRCS B 497 553 71 - Siret : 49755371900020 - APE : 6201Z\r\nN° déclaration CNIL : 1522193\r\n\r\nConditions d\'utilisation\r\n\r\nLe site accessible par les url suivants : www.site-internet-qualite.fr est exploité dans le respect de la législation française. L\'utilisation de ce site est régie par les présentes conditions générales. En utilisant le site, vous reconnaissez avoir pris connaissance de ces conditions et les avoir acceptées. Celles-ci pourront êtres modifiées à tout moment et sans préavis par la société Natural-net.\r\nNatural-net ne saurait être tenu pour responsable en aucune manière d’une mauvaise utilisation du service.\r\nResponsable éditorial\r\n\r\nEric Emery\r\nSite Internet Qualité\r\npar Natural-net\r\n49 boulevard Antoine Gautier\r\n33000 Bordeaux\r\nFrance\r\nTél. : + 33 (0)6 62 79 25 55\r\nFax : + 33 (0)5 40 00 02 66\r\nhttp://www.site-internet-qualite.fr\r\n\r\nLimitation de responsabilité\r\n\r\nLes informations contenues sur ce site sont aussi précises que possibles et le site est périodiquement remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email en décrivant le problème de la manière la plus précise possible (page posant problème, action déclenchante, type d’ordinateur et de navigateur utilisé, …).\r\n\r\nTout contenu téléchargé se fait aux risques et périls de l\'utilisateur et sous sa seule responsabilité. En conséquence, Natural-net ne saurait être tenu responsable d\'un quelconque dommage subi par l\'ordinateur de l\'utilisateur ou d\'une quelconque perte de données consécutives au téléchargement.   \r\n\r\nLes photos sont non contractuelles.\r\n\r\nLes liens hypertextes mis en place dans le cadre du présent site internet en direction d\'autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de Natural-net.\r\nLitiges\r\n\r\nLes présentes conditions sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l\'interprétation ou de l\'exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société Natural-net. La langue de référence, pour le règlement de contentieux éventuels, est le français.\r\nDéclaration à la CNIL\r\n\r\nConformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l\'égard des traitements de données à caractère personnel) relative à l\'informatique, aux fichiers et aux libertés, le site a fait l\'objet d\'une déclaration auprès de la Commission nationale de l\'informatique et des libertés (www.cnil.fr). \r\nDroit d\'accès\r\n\r\nEn application de cette loi, les internautes disposent d’un droit d’accès, de rectification, de modification et de suppression concernant les données qui les concernent personnellement. Ce droit peut être exercé par voie postale auprès de Natural-net 49 Boulevard Antoine Gautier 33000 Bordeaux ou par voie électronique à l’adresse email suivante : contact@natural-net.fr.\r\nLes informations personnelles collectées ne sont en aucun cas confiées à des tiers hormis pour l’éventuelle bonne exécution de la prestation commandée par l’internaute.\r\nConfidentialité\r\n\r\nVos données personnelles sont confidentielles et ne seront en aucun cas communiquées à des tiers hormis pour la bonne exécution de la prestation.\r\n\r\nPropriété intellectuelle\r\n\r\nTout le contenu du présent site, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société Natural-net à l\'exception des marques, logos ou contenus appartenant à d\'autres sociétés partenaires ou auteurs.\r\nToute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l\'accord exprès par écrit de Natural-net. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.3335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre.\r\n\r\nNatural-net est identiquement propriétaire des \"droits des producteurs de bases de données\" visés au Livre III, Titre IV, du Code de la Propriété Intellectuelle (loi n° 98-536 du 1er juillet 1998) relative aux droits d\'auteur et aux bases de données. \r\n\r\nLes utilisateurs et visiteurs du site internet peuvent mettre en place un hyperlien en direction de ce site, mais uniquement en direction de la page d’accueil, accessible à l’URL suivante : www.site-internet-qualite.fr, à condition que ce lien s’ouvre dans une nouvelle fenêtre. En particulier un lien vers une sous page (« lien profond ») est interdit, ainsi que l’ouverture du présent site au sein d’un cadre (« framing »), sauf l\'autorisation expresse et préalable de Natural-net.\r\n\r\nPour toute demande d\'autorisation ou d\'information, veuillez nous contacter par email : contact@natural-net.fr. Des conditions spécifiques sont prévues pour la presse.\r\n\r\nPar ailleurs, la mise en forme de ce site a nécessité le recours à des sources externes dont nous avons acquis les droits ou dont les droits d\'utilisation sont ouverts : Pioneer - Multi-Purpose HTML 5 / CSS 3 Corporate Template.   \r\n\r\n \r\nCréé le : 24/05/2016\r\nAuteur : Dankov\r\nE-mail de l\'auteur : dankov.theme@gmail.com\r\nHébergeur\r\n\r\nKiubi\r\nPlateforme de gestion et création de sites internet\r\nwww.kiubi.com\r\ncontact@kiubi.com\r\n\r\nConditions de service\r\n\r\nCe site est proposé en langages HTML5 et CSS3, pour un meilleur confort d\'utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme Safari, Firefox, Chrome,...\r\nInformations et exclusion\r\n\r\nNatural-net met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L\'internaute devra donc s\'assurer de l\'exactitude des informations auprès de Natural-net, et signaler toutes modifications du site qu\'il jugerait utile. Natural-net n\'est en aucun cas responsable de l\'utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.\r\nCookies\r\n\r\nPour des besoins de statistiques et d\'affichage, le présent site utilise des cookies. Il s\'agit de petits fichiers textes stockés sur votre disque dur afin d\'enregistrer des données techniques sur votre navigation. Certaines parties de ce site ne peuvent être fonctionnelle sans l’acceptation de cookies.\r\nLiens hypertextes\r\n\r\nLes sites internet de Natural-net peuvent offrir des liens vers d’autres sites internet ou d’autres ressources disponibles sur Internet.\r\n\r\nNatural-net ne dispose d\'aucun moyen pour contrôler les sites en connexion avec ses sites internet. Natural-net ne répond pas de la disponibilité de tels sites et sources externes, ni ne la garantit. Elle ne peut être tenue pour responsable de tout dommage, de quelque nature que ce soit, résultant du contenu de ces sites ou sources externes, et notamment des informations, produits ou services qu’ils proposent, ou de tout usage qui peut être fait de ces éléments. Les risques liés à cette utilisation incombent pleinement à l\'internaute, qui doit se conformer à leurs conditions d\'utilisation.\r\n\r\nLes utilisateurs, les abonnés et les visiteurs des sites internet de Natural-net ne peuvent mettre en place un hyperlien en direction de ce site sans l\'autorisation expresse et préalable de Natural-net.\r\n\r\nDans l\'hypothèse où un utilisateur ou visiteur souhaiterait mettre en place un hyperlien en direction d’un des sites internet de Natural-net, il lui appartiendra d\'adresser un email accessible sur le site afin de formuler sa demande de mise en place d\'un hyperlien. Natural-net se réserve le droit d’accepter ou de refuser un hyperlien sans avoir à en justifier sa décision.\r\n\r\nRecherche\r\n\r\nEn outre, le renvoi sur un site internet pour compléter une information recherchée ne signifie en aucune façon que Natural-net reconnaît ou accepte quelque responsabilité quant à la teneur ou à l\'utilisation dudit site.\r\n\r\nPrécautions d\'usage\r\n\r\nIl vous incombe par conséquent de prendre les précautions d\'usage nécessaires pour vous assurer que ce que vous choisissez d\'utiliser ne soit pas entaché d\'erreurs voire d\'éléments de nature destructrice tels que virus, trojans, etc....\r\n\r\nResponsabilité\r\n\r\nAucune autre garantie n\'est accordée au client, auquel incombe l\'obligation de formuler clairement ses besoins et le devoir de s\'informer. Si des informations fournies par Natural-net apparaissent inexactes, il appartiendra au client de procéder lui-même à toutes vérifications de la cohérence ou de la vraisemblance des résultats obtenus. Natural-net ne sera en aucune façon responsable vis à vis des tiers de l\'utilisation par le client des informations ou de leur absence contenues dans ses produits y compris un de ses sites Internet.');

-- --------------------------------------------------------

--
-- Table structure for table `editer`
--

CREATE TABLE `editer` (
  `id_edition` int(11) NOT NULL,
  `id_administrateur` int(11) NOT NULL,
  `id_document_juridique` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `complement` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `acces_rapide1` int(11) DEFAULT NULL,
  `acces_rapide2` int(11) DEFAULT NULL,
  `acces_rapide3` int(11) DEFAULT NULL,
  `acces_rapide4` int(11) DEFAULT NULL,
  `acces_rapide5` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maison`
--

INSERT INTO `maison` (`id_maison`, `id_utilisateur`, `numero`, `rue`, `complement`, `code_postal`, `ville`, `pays`, `acces_rapide1`, `acces_rapide2`, `acces_rapide3`, `acces_rapide4`, `acces_rapide5`) VALUES
(27, 2, 100, 'avenue du Maine', 'Résidence Phoenix', 75000, 'Paris', 'France', NULL, NULL, NULL, NULL, NULL),
(28, 2, 18, 'rue de la Paix', '', 28400, 'Nogent-le-Rotrou', 'France', NULL, NULL, NULL, NULL, NULL),
(29, 2, 145, 'boulevard malesherbes', '', 75000, 'Paris', 'France', NULL, NULL, NULL, NULL, NULL),
(32, 2, 123, 'rue to', '', 92130, 'ISSY LES MOULINEAUX', 'France', NULL, NULL, NULL, NULL, NULL),
(34, 2, 84, 'rue de vanves', '', 92130, 'ISSY LES MOULINEAUX', 'France', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pannes`
--

CREATE TABLE `pannes` (
  `id_panne` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `rapport_erreur` varchar(255) NOT NULL,
  `date_panne` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pannes`
--

INSERT INTO `pannes` (`id_panne`, `id_capteur`, `rapport_erreur`, `date_panne`) VALUES
(1, 1, 'Défaillance du capteur de température ', '2017-12-15 14:30:16'),
(2, 2, 'Défaillance du capteur d\'humidité', '2017-12-06 06:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `parametrer`
--

CREATE TABLE `parametrer` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `valeur_souhaitee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parametrer`
--

INSERT INTO `parametrer` (`id`, `id_utilisateur`, `id_capteur`, `heure_debut`, `heure_fin`, `valeur_souhaitee`) VALUES
(1, 1, 1, '07:00:00', '10:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id_personne`, `prenom`, `nom`, `telephone`, `email`, `mot_de_passe`) VALUES
(1, 'azerty', 'uiop', '0606060606', 'azerty@uiop.fr', 'azerty'),
(2, 'Merlin', 'Rousseau', '0601020304', 'pierremartin@mail.com', 'azertyuiop'),
(6, 'Virgilio', 'de Sousa', '0761111139', 'vacs96@hotmail.com', '$2y$10$Xq42bIL/xeXUzV7aResQMu/4BF0DuLN66PS1doRZ13cdFkyJlcHPu');

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL,
  `nom_de_piece` varchar(255) NOT NULL,
  `complement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_maison`, `nom_de_piece`, `complement`) VALUES
(1, 27, 'Salon', ''),
(2, 27, 'Cuisine', ''),
(3, 27, 'Chambre', 'parents'),
(4, 27, 'Chambre', 'enfants'),
(5, 20, 'Salon', ''),
(6, 20, 'Cuisine', ''),
(17, 27, 'Auditorium', ''),
(21, 27, 'Véranda', '');

-- --------------------------------------------------------

--
-- Table structure for table `transmettre`
--

CREATE TABLE `transmettre` (
  `id_alerte` int(11) NOT NULL,
  `id_capteur` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `motif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `type_capteur`
--

CREATE TABLE `type_capteur` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_capteur`
--

INSERT INTO `type_capteur` (`id`, `type`) VALUES
(1, 'Température'),
(2, 'Humidité'),
(3, 'Présence'),
(4, 'Luminosité'),
(5, 'Fenêtre'),
(6, 'Volets'),
(7, 'Porte'),
(8, 'Alarme'),
(9, 'Caméra'),
(10, 'Détecteur de gaz');

-- --------------------------------------------------------

--
-- Table structure for table `type_piece`
--

CREATE TABLE `type_piece` (
  `id` int(11) NOT NULL,
  `nom_piece` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_piece`
--

INSERT INTO `type_piece` (`id`, `nom_piece`) VALUES
(1, 'Hall d\'entrée'),
(2, 'Cuisine'),
(3, 'Buanderie'),
(4, 'Cave'),
(5, 'Bureau'),
(6, 'Salle à manger'),
(7, 'Salon'),
(8, 'Auditorium'),
(9, 'Chambre'),
(10, 'Chambre parentale'),
(11, 'Chambre d\'enfants'),
(12, 'Salle de bain'),
(13, 'Dressing'),
(14, 'Salle d\'eau'),
(15, 'Toilettes'),
(16, 'Garage'),
(17, 'Couloir'),
(19, 'Véranda'),
(20, 'Balcon'),
(21, 'Salle de jeux'),
(22, 'Piscine'),
(23, 'Salle de cinéma'),
(24, 'Serre'),
(25, 'Autre');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `date_adhesion` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `numero` text NOT NULL,
  `rue` text NOT NULL,
  `complement` text NOT NULL,
  `code_postal` text NOT NULL,
  `ville` text NOT NULL,
  `pays` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `id_personne`, `newsletter`, `date_adhesion`, `photo`, `numero`, `rue`, `complement`, `code_postal`, `ville`, `pays`) VALUES
(3, 6, 0, '2018-01-26', '', '59', 'AVENUE DANIELLE CASANOVA', '', '94200', 'IVRY SUR SEINE', 'France');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id_administrateur`);

--
-- Indexes for table `alerter`
--
ALTER TABLE `alerter`
  ADD PRIMARY KEY (`id_alerte`);

--
-- Indexes for table `assister`
--
ALTER TABLE `assister`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `bilan_de_consommation`
--
ALTER TABLE `bilan_de_consommation`
  ADD PRIMARY KEY (`id_bilan`);

--
-- Indexes for table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_objet`);

--
-- Indexes for table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id_capteur`);

--
-- Indexes for table `cemac`
--
ALTER TABLE `cemac`
  ADD PRIMARY KEY (`id_cemac`);

--
-- Indexes for table `communiquer`
--
ALTER TABLE `communiquer`
  ADD PRIMARY KEY (`id_communication`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents_juridiques`
--
ALTER TABLE `documents_juridiques`
  ADD PRIMARY KEY (`id_document_juridique`);

--
-- Indexes for table `editer`
--
ALTER TABLE `editer`
  ADD PRIMARY KEY (`id_edition`);

--
-- Indexes for table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`);

--
-- Indexes for table `pannes`
--
ALTER TABLE `pannes`
  ADD PRIMARY KEY (`id_panne`);

--
-- Indexes for table `parametrer`
--
ALTER TABLE `parametrer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`);

--
-- Indexes for table `type_capteur`
--
ALTER TABLE `type_capteur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_piece`
--
ALTER TABLE `type_piece`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id_administrateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `alerter`
--
ALTER TABLE `alerter`
  MODIFY `id_alerte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assister`
--
ALTER TABLE `assister`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bilan_de_consommation`
--
ALTER TABLE `bilan_de_consommation`
  MODIFY `id_bilan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_objet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `cemac`
--
ALTER TABLE `cemac`
  MODIFY `id_cemac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `communiquer`
--
ALTER TABLE `communiquer`
  MODIFY `id_communication` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `documents_juridiques`
--
ALTER TABLE `documents_juridiques`
  MODIFY `id_document_juridique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `editer`
--
ALTER TABLE `editer`
  MODIFY `id_edition` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pannes`
--
ALTER TABLE `pannes`
  MODIFY `id_panne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parametrer`
--
ALTER TABLE `parametrer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `type_capteur`
--
ALTER TABLE `type_capteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `type_piece`
--
ALTER TABLE `type_piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
