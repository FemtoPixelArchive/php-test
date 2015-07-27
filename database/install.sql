CREATE USER 'exam'@'%' IDENTIFIED BY 'exam';
GRANT USAGE ON *.* TO 'exam'@'%' IDENTIFIED BY 'exam' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
CREATE DATABASE IF NOT EXISTS `exam`;
GRANT SELECT ON *.* TO 'exam'@'%'WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
USE exam;
-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(10) DEFAULT NULL,
  `niveau` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id_classe`, `libelle`, `niveau`) VALUES
(1, '2nd B', 1),
(2, '1ere A', 2),
(3, 'Ter A', 3);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(54) DEFAULT NULL,
  `nom` varchar(54) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `id_classe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_etudiant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `prenom`, `nom`, `date_naissance`, `id_classe`) VALUES
(1, 'Romain', 'Lassieta', '1999-10-13', 1),
(2, 'Jules', 'Boucher', '1997-04-11', 3),
(3, 'Marie', 'Dupond', '1998-02-16', 2),
(4, 'Antoine', 'Tralant', '1997-11-25', 3),
(5, 'Chloe', 'Goulaud', '1998-05-14', 1),
(6, 'Malek', 'El bermi', '1997-08-12', 1),
(7, 'Elodie', 'Demoingeot', '1999-05-24', 1),
(8, 'Mathieu', 'Ormesson', '1998-06-22', 2),
(9, 'Jules', 'X', '1997-12-21', 2),
(10, 'Mathis', 'Dupond', '1997-02-28', 3),
(11, 'Mathilde', 'Le Brun', '1999-08-15', 3),
(12, 'Katia', 'Boudade', '1998-03-03', 3),
(13, 'Adrien', 'Pons', '1999-05-14', 2);

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE IF NOT EXISTS `jours` (
  `id_jour` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_fr` varchar(54) DEFAULT NULL,
  `libelle_en` varchar(54) DEFAULT NULL,
  `ordre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jour`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `jours`
--

INSERT INTO `jours` (`id_jour`, `libelle_fr`, `libelle_en`, `ordre`) VALUES
(1, 'Lundi', NULL, 1),
(2, 'Mardi', NULL, 2),
(3, 'Mercredi', NULL, 3),
(4, 'Jeudi', NULL, 4),
(5, 'Vendredi', NULL, 5),
(6, 'Samedi', NULL, 6),
(7, 'Dimanche', NULL, 7);

-- --------------------------------------------------------

--
-- Structure de la table `liens_professeurs_matieres`
--

CREATE TABLE IF NOT EXISTS `liens_professeurs_matieres` (
  `id_liens_prof_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `id_professeur` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  PRIMARY KEY (`id_liens_prof_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `liens_professeurs_matieres`
--

INSERT INTO `liens_professeurs_matieres` (`id_liens_prof_matiere`, `id_professeur`, `id_matiere`) VALUES
(1, 1, 2),
(2, 1, 5),
(3, 1, 9),
(4, 2, 2),
(5, 2, 8),
(6, 3, 1),
(7, 3, 4),
(8, 3, 6),
(9, 4, 6),
(10, 4, 8),
(11, 4, 10),
(12, 5, 3),
(13, 5, 6),
(14, 5, 9),
(15, 6, 1),
(16, 6, 5),
(17, 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(54) DEFAULT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `libelle`) VALUES
(1, 'Français'),
(2, 'Mathématiques'),
(3, 'Histoire'),
(4, 'Géographie'),
(5, 'EPS'),
(6, 'SVT'),
(7, 'Informatique'),
(8, 'Comptabilité'),
(9, 'Economie'),
(10, 'Littérature');

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE IF NOT EXISTS `planning` (
  `id_planning` int(11) NOT NULL,
  `id_professeur` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_jour` int(11) NOT NULL,
  `heure_debut` float NOT NULL COMMENT 'ex : 10.30 = 10h30',
  `heure_fin` float NOT NULL COMMENT 'ex : 10.30 = 10h30',
  `duree` int(11) NOT NULL COMMENT 'exprimee en minutes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `planning`
--

INSERT INTO `planning` (`id_planning`, `id_professeur`, `id_matiere`, `id_classe`, `id_salle`, `id_jour`, `heure_debut`, `heure_fin`, `duree`) VALUES
(1, 1, 2, 1, 1, 1, 10, 12, 2),
(2, 6, 1, 2, 2, 1, 14, 17, 3),
(3, 4, 6, 1, 3, 2, 8, 12, 4),
(4, 2, 2, 2, 4, 5, 10, 12, 2),
(5, 1, 2, 2, 5, 3, 16, 18, 2),
(6, 6, 5, 3, 6, 2, 14, 17, 3),
(7, 7, 5, 3, 7, 4, 13, 17, 4),
(8, 4, 8, 1, 8, 2, 9, 12, 3),
(9, 5, 3, 3, 9, 4, 9, 11, 2),
(10, 2, 8, 2, 10, 1, 10, 12, 2),
(11, 1, 5, 1, 9, 5, 8, 12, 4),
(12, 3, 4, 3, 8, 2, 14, 15, 1),
(13, 3, 6, 2, 7, 3, 14, 17, 3),
(14, 5, 6, 2, 6, 3, 10, 12, 2),
(15, 6, 5, 2, 5, 5, 15, 17, 2),
(16, 4, 10, 1, 4, 1, 14, 18, 4),
(17, 2, 8, 1, 3, 2, 10, 12, 2),
(18, 6, 1, 3, 2, 4, 15, 17, 2),
(19, 1, 9, 3, 1, 4, 10, 12, 2),
(20, 7, 5, 1, 2, 3, 8, 11, 3),
(21, 3, 1, 1, 3, 2, 9, 13, 4),
(22, 5, 9, 2, 4, 4, 10, 12, 2),
(23, 3, 6, 1, 7, 1, 9, 11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(54) DEFAULT NULL,
  `nom` varchar(54) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id_professeur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`id_professeur`, `prenom`, `nom`, `date_naissance`) VALUES
(1, 'Jean', 'Dupond', '1980-12-14'),
(2, 'Pascaline', 'Toussaint', '1975-06-23'),
(3, 'Bernard', 'Y', '1975-11-25'),
(4, 'Huguette', 'Givry', '1971-05-09'),
(5, 'Robert', 'Plait', '1968-08-17'),
(6, 'Georges', 'Abadi', '1958-04-22'),
(7, 'Paulette', 'Morel', '1985-05-25');

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE IF NOT EXISTS `salles` (
  `id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(54) DEFAULT NULL,
  `etage` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `nb_chaises` int(11) DEFAULT NULL,
  `nb_tables` int(11) DEFAULT NULL,
  `video_projecteur` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`id_salle`, `libelle`, `etage`, `numero`, `nb_chaises`, `nb_tables`, `video_projecteur`) VALUES
(1, 'Salle de cours 1 (101)', 1, 101, 25, 20, 0),
(2, 'Salle de cours 2 (102)', 1, 102, 30, 20, 0),
(3, 'Salle de technologie (201)', 2, 201, 29, 20, 0),
(4, 'Salle de cours 3 (103)', 1, 103, 30, 22, 0),
(5, 'Salle de science (202)', 2, 202, 30, 21, 1),
(6, 'Salle de cours 6 (203)', 2, 203, 25, 15, 1),
(7, 'Salle de cours 4 (104)', 1, 104, 26, 20, 0),
(8, 'Salle de cours 5 (105)', 1, 105, 33, 20, 0),
(9, 'Salle de cours 7 (204)', 2, 204, 31, 26, 0),
(10, 'Salle de cours 8 (205)', 2, 205, 29, 24, 1);

