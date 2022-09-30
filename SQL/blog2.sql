-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 25 sep. 2022 à 16:49
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--
CREATE DATABASE IF NOT EXISTS `blog2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog2`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_ADMIN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD_ADMIN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NOM_ADMIN`, `PASSWORD_ADMIN`) VALUES
(1, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `ID_ARTICLE` int(11) NOT NULL AUTO_INCREMENT,
  `TITRE_ARTICLE` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `DATE_PUBLICATION` date NOT NULL,
  `CONTENU_ARTICLE` text COLLATE utf8_unicode_ci NOT NULL,
  `REF_IMAGE` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `RESUME_ART` text COLLATE utf8_unicode_ci NOT NULL,
  `REPONSE_ART` tinyint(1) NOT NULL,
  `COM_REPONSE` text COLLATE utf8_unicode_ci NOT NULL,
  `CODE_TYPE_ART` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `ID_ADMIN` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTICLE`),
  KEY `CODE_TYPE_ART` (`CODE_TYPE_ART`),
  KEY `ID_ADMIN` (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`ID_ARTICLE`, `TITRE_ARTICLE`, `DATE_PUBLICATION`, `CONTENU_ARTICLE`, `REF_IMAGE`, `RESUME_ART`, `REPONSE_ART`, `COM_REPONSE`, `CODE_TYPE_ART`, `ID_ADMIN`) VALUES
(1, 'Voici 7 preuves que la terre est plate !', '2018-10-07', 'Les platistes, ceux qui pensent que la Terre est plate, sont de plus en plus nombreux. Ces dernières années, ce mouvement a pris de l\'ampleur. Certainement dû aux nombreux articles qui commentent leurs nombreuses théories, selon laquelle notre planète ne serait pas une sphère mais un disque... \r\nLA COURBURE DE L\'HORIZON\r\n\r\nPour le rappeur et platiste B.o.B., le principal argument pour démontrer que la Terre est plate, reste la planéité de l\'horizon. En janvier 2016, le rappeur avait posté une photo de lui sur son compte Twitter (puis supprimé) sur laquelle on pouvait le voir poser devant un paysage. À l\'arrière-plan, il avait pris soin de surligner d\'un trait rouge l\'horizon afin de bien montrer que la ligne d\'horizon n\'était pas courbée. \r\n\r\nLE MUR DE L\'ANTARCTIQUE\r\nCertains platistes avancent l\'idée selon laquelle la Terre, en forme de disque, serait entourée d\'un énorme mur de glace afin que nous ne puissions pas tomber dans le vide une fois arrivés à la limite de la planète. Ces derniers vont encore plus loin en expliquant que les gouvernements nous cachent la vérité (à savoir que la Terre est plate) en affirmant que personne sur Terre n\'a jamais traversé tout l\'Antarctique.\r\nLA TERRE EST STATIONNAIRE\r\nSans vous en rendre compte, la Terre tourne à 1600 km/h ! Pour les platistes, si c\'est réellement le cas, pourquoi ne nous envolons pas ? Pour eux, la Terre ne tourne pas. Elle est dans un état stationnaire.\r\nTOUTES LES PHOTOS DE L\'ESPACE SONT \"PHOTOSHOPPÉES\"\r\nPour prouver aux platistes qu\'ils ont tord, le meilleur moyen reste de leur montrer des photos de la Terre depuis l\'espace. Or, pour les platistes, même face à ces preuves, qu\'est-ce qui nous prouve que ces clichés ne sont pas trafiqués ? \r\nLA MÉTHODE ZETETIQUE MADE IN PLATISTE\r\nLes platistes sont friands de la méthode zététique. Il s\'agit d\'une philosophie du XIXème siècle qui prétend que la connaissance empirique est la principale source de toute vérité. \r\nLes platistes usent de cette méthode zététique en avançant l\'idée que comme sur Terre nous avons l\'impression que la planète est plate, par conséquent la Terre est plate. CQFD.\r\nVOIR VÉNUS ET MERCURE LA NUIT\r\nLe Youtubeur et théoricien D. Marble a déjà demandé : si la Terre est ronde, alors comment se fait-il que nous pouvons voir des planètes entre la Terre et le Soleil la nuit ? Autrement dit, ce trentenaire se demande comment il est possible de voir Vénus et Mercure en pleine nuit. \r\nLES RAYONS CRÉPUSCULAIRES\r\nEnfin, l\'un des arguments avancés par ceux qui soutiennent la théorie de la Terre plate concerne les rayons du Soleil au crépuscule. Selon eux, le Soleil ne se trouve pas à 150 millions de kilomètres de chez nous. Il serait plus petit que ce que l\'on nous dit et plus proche.', 'terreplate.jpg', '', 0, '', 'SCI', 1),
(2, 'Lionel Messi met en faillite la compagnie nationale de gaz argentine', '2022-09-22', 'C’est un geste commercial qui tourne mal. En décembre 2011, la compagnie Enarsa, société nationale argentine de pétrole et de gaz, propose un curieux deal à ses usagers : réduire d’1% leur facture de gaz à chaque but de Lionel Messi. Une offre qui était à l’origine censée attirer de nouveaux clients. Mais c’est là que l’histoire tourne mal. Car le jeune footballeur argentin, qui évolue au FC Barcelone et en sélection nationale, a explosé tous les records sur l’année 2012, plongeant ainsi Enarsa dans un gouffre économique. Reportage.Le représentant de la société a ensuite étalé la mesure principale que comptait prendre son employeur : « Afin de surmonter cette crise, nous allons donc revérifier la validité de chacun des buts de Lionel Messi car certains nous paraissent pour le moins litigieux. Ceci n’est pas une remise en cause de son talent mais une simple vérification des critères présents dans le contrat que nous avons passé avec nos usagers. »\r\n\r\nUn risque inconsidéré\r\nCe qui est en train d’arriver à la compagnie Enarsa aurait pu être évité de bien des manières selon les experts économiques. Grégoire Deslandes est analyste financier dans un cabinet de consulting : « On ne propose pas une telle offre promotionnelle basée sur les performances de Messi. En plus, s’ils avaient été malins, ils auraient regardé ce qui se passe ailleurs dans le monde et ça les aurait calmés. Notamment avec ce qui s’est passé en Jamaïque avec Wooden Cross, 2e compagnie productrice de bois qui avait lancé une offre semblable basée sur chaque centième de seconde gagné par Usain Bolt et qui se retrouve aujourd’hui sur la paille.»', 'messi.jpg', '', 0, '', 'ECON', 1),
(3, 'Nu, il court après les voitures en Savoie et dit venir de la Lune', '2013-09-22', 'Étrange rencontre que celle faite par des automobilistes de Savoie, lundi vers 17h, sur la route du col de l’Épine à La Motte-Servolex. Un jeune homme a déboulé entièrement nu en s\'affairant à poursuivre les véhicules. Le voyant dans cet état, des automobilistes l\'ont conduit à la gendarmerie de La Motte-Servolex. Sur place, le jeune homme a tenu des propos totalement incohérents aux militaires. \r\n\r\nGuidé par Vénus\r\nL\'homme disait \"venir de la Lune et être guidé par Vénus\". N\'ayant aucun papier sur lui, il a confié aux gendarmes ne pas savoir qui il était. Difficile alors pour les gendarmes de connaître l\'identité de l\'intéressé. Un signalement a tout de même été diffusé auprès des gendarmeries voisines et des établissements psychiatriques du département. Aucun patient ne semble s\'être échappé. \r\n\r\nLe jeune homme a finalement été hospitalisé à Chambéry par les pompiers. Une prise de sang a été effectuée afin de savoir si ce dernier était sous l\'emprise de drogue.', 'lune.jpg', '', 1, '', 'SPORT', 1),
(4, 'Christiane Taubira a tenté de faire annuler la condamnation de son fils', '2014-03-14', 'FAVORITISME. Douze ans avant de proposer, en tant que garde des Sceaux, des peines de substitution pour les personnes condamnées à moins de cinq ans de prison, Christiane Taubira  — qui vient de réaliser la pire audience de l’émission Des paroles et des actes, sur France 2, le 5 septembre —, alors députée de Guyane, avait tenté de faire annuler purement et simplement la condamnation par le tribunal de Bourges (avec dispense de peine) d’un de ses fils pour complicité de vol. \r\nDans un document en date du 5 février 2001 que Valeurs actuelles a pu consulter, elle demande de faire procéder à une « annulation » (sic) de ladite condamnation. Motif : « À chaque fois qu’il subit un contrôle d’identité, la consultation du fichier provoque sa conduite au commissariat. » Comme en avril 1999, où un épisode analogue avait, dit-elle, conduit des passants à venir témoigner en sa faveur. On ignore si Mme Taubira avait obtenu satisfaction de Marylise Lebranchu, alors ministre de la Justice et actuellement ministre de la Réforme de l’État, de la Décentralisation et de la Fonction publique…\r\n', 'taubira.jpg', '', 0, '', 'POL', 1),
(5, 'Un cycliste amateur de calembours roule 1000 km pour faire Parla-Montcuq', '2022-09-22', 'Un cycliste parcourt 1 000 km pour relier Parla, dans la région de Madrid, et Montcuq, dans le Lot.\r\n\r\nUn consultant en informatique de 35 ans a parcouru plus de 1 000 km en sept jours en vélo entre la région de Madrid et le Lot, par amour de l\'effort .... et du calembour ! Le cycliste a décidé de faire le trajet Parla-Montcuq.\r\nIl avait \"envisagé de faire Troyes-Foix-Sète\"\r\n\r\nJean-Charles Loeb, qui réside à Houilles dans les Yvelines, indique qu\'il \"aime s\'imposer des défis\" et assume son parti pris humoristique. \"J\'ai envisagé de faire Troyes-Foix-Sète, mais je n\'ai pas trouvé de Vingt-et-Un\", a-t-il déclaré. De nombreux humoristes ont joué de longue date avec la consonance du nom de la commune du Quercy, au compte de plaisanteries grivoises.\r\n\r\n', 'cycliste.jpg', '', 1, '', 'DIV', 1),
(6, 'Blanche Gardin refuse d\'être décorée et critique le gouvernement', '2019-04-03', 'Blanche Gardin n\'a pas sa langue dans sa poche. Que ce soit sur scène ou dans « la vraie » vie. L\'humoriste l\'a prouvé en décidant de refuser d\'être nommée à l\'ordre des Arts et des Lettres. Elle aurait pu s\'arrêter là, mais elle a publié une lettre dans laquelle elle s\'adresse à Emmanuel Macron pour justifier sa décision.\r\nElle explique ne pas vouloir être célébrée par un gouvernement qui ne tient pas ses promesses vis-à-vis des SDF. « Je suis flattée. Merci. Mais je ne pourrai accepter une récompense que sous un gouvernement qui tient ses promesses et qui met tout en œuvre pour sortir les personnes sans domicile de la rue », écrit Blanche Gardin dans ce courrier destiné au président de la République, qu\'elle publie sur son compte Facebook.\r\n\r\nDans le cadre d\'une prochaine nomination, c\'est le cabinet du ministre de la Culture Franck Riester qui a demandé par courrier à la comédienne si elle était « susceptible d\'accepter » d\'être honorée.\r\n', 'blanchegardin.jpg', '', 1, '', 'POL', 1),
(7, 'Pauvre petit hamster...', '2008-09-17', '\" Après coup, craquer l’allumette a été ma grosse erreur. Mais j’essayais seulement de récupérer le hamster. \" a raconté Eric Tomaszewski aux docteurs stupéfiés du Service des Grands Brûlés de l’hôpital de Salt Lake City. Tomaszewski et son partenaire homosexuel Andrew Kiki Farnum ont été admis pour un traitement d’urgence après qu’une sodomie eut sérieusement mal tourné.\r\n\" J’ai poussé un tube en carton dans son rectum et glissé Raggot, notre hamster, à l’intérieur \", a-t-il expliqué. \" Comme d’habitude, Kiki a crié \" Armageddon! \" pour indiquer qu’il en avait assez.\r\nJ’ai essayé de récupérer Raggot mais il ne sortait pas, j’ai donc regardé dans le tube et craqué une allumette, pensant que la lumière pouvait l’attirer \".\r\nA une conférence de presse, un porte-parole de l’hôpital a décrit ce qui s’est passé ensuite: L’allumette a enflammé une poche de gaz intestinal et une flamme a jailli du tube, enflammant les cheveux de M. Tomaszewski et brûlant sévèrement sa figure. Elle a aussi mis le feu au pelage du hamster, qui, à son tour, a enflammé une poche plus grande de gaz plus loin dans l’intestin, propulsant le rongeur comme un boulet de canon.\r\nTomaszewski a été brûlé au deuxième degré et a eu le nez cassé par l’impact avec le hamster, tandis que Farnum a été brûlé au premier et au deuxième degré à l’anus et sur la partie inférieure de son intestin. ', 'hamster.jpg', '', 1, '', 'AMOUR', 1),
(8, 'Hollande ne paie plus l\'ISF', '2012-03-18', 'En 2006, lors d\'un débat télévisé, François Hollande avait affirmé un peu imprudemment qu\'il n\'aimait pas les riches. Des propos que Ségolène Royal avait payés cash quelques mois plus tard, en pleine campagne présidentielle. Le nom d\'une société civile immobilière, La Sapinière, propriétaire notamment d\'une villa à Mougins, sur les hauteurs de Cannes, avait été jeté en pâture sur la Toile. Ce qui avait permis à plusieurs élus de l\'UMP d\'accuser François Hollande et Ségolène Royal de l\'avoir constituée dans le seul but d\'échapper à l\'impôt sur la fortune. Poussé dans les cordes, le couple n\'avait eu d\'autre solution que de dévoiler son patrimoine et de révéler qu\'il payait l\'ISF (862 €).\r\nAujourd\'hui, François Hollande peut taper sur les riches sans risque de se faire tacler. Même si son mandat de député et sa présidence de Conseil général lui rapportent près de 7 000 € net par mois, il n\'est plus éligible à l\'impôt sur la fortune. Une séparation appauvrit. En quittant Ségolène Royal, le leader socialiste a vu sa fortune fondre comme une motte de beurre au soleil.\r\nÀ Paris, il est désormais locataire de l\'appartement d\'une centaine de mètres carrés, situé dans le 15e arrondissement, qu\'il occupe avec sa nouvelle compagne. Il ne possède rien en Corrèze où, depuis des années, il a pris l\'habitude de dormir dans une petite chambre aménagée à l\'intérieur de sa permanence parlementaire.\r\nVilla sécurisée\r\nCet adversaire résolu de la finance ne dispose d\'aucun portefeuille de titres ou d\'actions. Le magazine « L\'Express » a évalué son patrimoine immobilier à 1,170 million d\'euros. À Cannes, il détient des parts des SCI propriétaires des logements où vivent son frère et son père. Après sa rupture avec Ségolène Royal, il a seulement gardé la villa de Mougins, source récurrente de polémiques. Située dans un domaine résidentiel sécurisé, cette maison de vacances de 120 m², achetée en viager en 1986, n\'a rien d\'ostentatoire. Mais, entourée de 1 500 m2 de terrain, elle bénéficie d\'un atout non négligeable : une vue plongeante sur la mer.\r\nEn 2007, Ségolène Royal l\'avait estimée à 280 000 €. De quoi faire sourire les agents immobiliers du secteur habitués à vendre ce genre de produit autour de 1 million d\'euros. À l\'époque, les amis du couple avaient justifié la faible évaluation par la présence de trois villas contiguës, la proximité de la gendarmerie et l\'exiguïté de la piscine ! Désireux de couper court à toute polémique, François Hollande a revu l\'estimation à la hausse : 800 000 euros !\r\n', 'hollandeISF.jpg', '', 1, '', 'POL', 1),
(9, 'Sondage : 89% des hommes pensent que le clitoris est un modèle de Toyota', '2013-09-13', 'Zein Sawaya de l’institut de sondage a piloté cette étude qui aura pris 6 mois pour interroger plus de 2500 hommes de tous profils. Et selon elle le constat est sans appel : « Près de 9 hommes sur 10 restent persuadés qu’il s’agit d’une voiture de la marque japonaise Toyota. 7% affirment que le clitoris a un rapport avec une divinité de la mythologie égyptienne. Les 4% restants disent n’avoir jamais entendu parler d’une telle chose. » explique t-elle.\r\nJohanna Luyssen est rédactrice en chef du magazine Causette, qui a dévoilé cette étude. Pour elle, ce manque flagrant de savoir n’est pas sans raison : « C’est concrètement le résultat d’une absence totale d’éducation sexuelle auprès des plus jeunes. Et à titre personnel, je trouve ça tout simplement affligeant qu’une énorme majorité des Français de sexe masculin imagine qu’il s’agit de la Toyota Clitoris. »\r\nLe sondage de TNS-SOFRES en partenariat avec Causette a très vite suscité une vague de réactions autant amusées qu’affligées. Inna Schevchenko, chef de file du mouvement Femen en France, n’a pas tardé à faire part de son indignation concernant cette nouvelle : « C’est le signe que quelque chose doit changer dans la société française. Ici, chez les Femen, nous restons convaincues que c’est la conséquence de centaines d’années de patriarcat et de courants religieux machistes encore bien trop tolérés aujourd’hui. »\r\nLes ados directement concernés\r\nCette incapacité massive à identifier l’un des organes du sexe féminin n’est pas le premier signe de l’ignorance des hommes français en la matière. Il y a six mois, un sondage BVA commandé par le Nouvel Observateur nous apprenait que 45% des garçons de 12 à 18 ans restaient convaincus que l’utérus était le nom d’une planète de notre système solaire.\r\n', 'toyotaclito.jpg', '', 0, '', 'SOCT', 1),
(10, 'Marion Maréchal-Le Pen change de nom pour devenir Marion Maréchal-Pétain', '2018-05-23', 'C’est la valse des noms du côté du Front national, ou plutôt devrait-on dire “Rassemblement national” puisque le parti d’extrême droite doit lui aussi entériner son changement de nom dans la semaine. Alors qu’elle est officiellement en retrait de la vie politique, Marion Maréchal-Le Pen cherche à faire oublier ses liens avec la famille Le Pen en affichant le nom de Marion Maréchal-Pétain sur plusieurs de ses pages personnelles sur les réseaux sociaux. Le nom n’est d’ailleurs pas le seul changement à noter dans l’état civil de Marion Maréchal-Pétain, qui indique être née le 10 juillet 1940 à Vichy après avoir également modifié sa date et son lieu de naissance.\r\nMarion Maréchal-Pétain n’est pas la seule à succomber à cette frénésie de changement de nom dans le paysage politique français. Il n’aura fallu que quelques heures à Laurent Wauquiez pour qu’il apparaisse lui aussi en tant que Laurent Wauquiez-Pétain sur les réseaux sociaux, alors que Manuel Valls affiche maintenant le patronyme « Manuel le vengeur masqué de la laïcité » sur son compte Twitter et qu’on peut retrouver la mention « Bg-centriste-Bagnères-de-Bigorre-Club » sur celui de François Bayrou.\r\nL’ancienne députée de la troisième circonscription de Vaucluse doit également dévoiler le nom de la nouvelle académie de sciences politiques à laquelle elle est associée et dont l’ouverture est prévue à Lyon pour la rentrée. Selon l’entourage de Marion Maréchal-Pétain, deux noms sont toujours en balance : Ecole Nationale Supérieure de Formation à l’Islamophobie serait en ballottage favorable devant la « Joseph Goebbles Academy ».\r\n', 'marion.jpg', '', 0, '', 'POL', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `CODE_TYPE_ART` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `LIB_TYPE_ART` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`CODE_TYPE_ART`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`CODE_TYPE_ART`, `LIB_TYPE_ART`) VALUES
('AMOUR', 'Amour'),
('DIV', 'Divers'),
('ECON', 'Economie'),
('FINCE', 'Finance'),
('GUERRE', 'Guerre'),
('PEOPLE', 'People'),
('POL', 'Politique'),
('SCI', 'Sciences'),
('SOCT', 'Société'),
('SPORT', 'Sport'),
('TECH', 'Technologie');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `ID_COMMENTAIRE` int(11) NOT NULL AUTO_INCREMENT,
  `CONTENU_COMMENTAIRE` text COLLATE utf8_unicode_ci NOT NULL,
  `DATE_COMMENTAIRE` datetime NOT NULL,
  `ID_ARTICLE` int(11) NOT NULL,
  `PSEUDO_UTILISATEUR` int(11) NOT NULL,
  PRIMARY KEY (`ID_COMMENTAIRE`),
  KEY `ID_ARTICLE` (`ID_ARTICLE`),
  KEY `PSEUDO_UTILISATEUR` (`PSEUDO_UTILISATEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_UTILISATEUR` int(11) NOT NULL AUTO_INCREMENT,
  `PSEUDO_UTILISATEUR` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_UTILISATEUR` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ABONNE_NEWS` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_UTILISATEUR, PSEUDO_UTILISATEUR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID_VOTE` int(11) NOT NULL AUTO_INCREMENT,
  `CPT_VOTE_INTOX` int(11) DEFAULT NULL,
  `CPT_VOTE_INFO` int(11) DEFAULT NULL,
  `ID_ARTICLE` int(11) NOT NULL,
  PRIMARY KEY (`ID_VOTE`),
  KEY `ID_ARTICLE` (`ID_ARTICLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`CODE_TYPE_ART`) REFERENCES `categorie` (`CODE_TYPE_ART`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`ID_ARTICLE`) REFERENCES `article` (`ID_ARTICLE`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`PSEUDO_UTILISATEUR`) REFERENCES `utilisateur` (`PSEUDO_UTILISATEUR`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`ID_ARTICLE`) REFERENCES `article` (`ID_ARTICLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
