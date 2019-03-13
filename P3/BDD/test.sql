-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 06 mars 2019 à 07:03
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `billets`
--

DROP TABLE IF EXISTS `billets`;
CREATE TABLE IF NOT EXISTS `billets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `billets`
--

INSERT INTO `billets` (`id`, `titre`, `contenu`, `date_creation`) VALUES
(1, 'Chapitre 1 : L\'Alaska par voie maritime', 'Au départ de Skagway (mais également d\'autres villes) vous pouvez réaliser une croisière dans ce qu\'on appelle \"le passage intérieur\" (Inside Passage). Cette voie maritime côtière de l\'océan pacifique se faufile entre le sud-est de l\'Alaska et le nord-ouest de la Colombie-Britannique. Elle a été très empruntée au moment de la ruée vers l\'or par les prospecteurs. Aujourd\'hui, le tourisme est très développé sur cette voie, ce qui pose des soucis écologiques (et oui, paquebots et glaciers, ça ne fait pas bon ménage). \r\nQuoi qu\'il en soit, sachez que de quelques heures à plusieurs jours, plusieurs itinéraires sont possibles, et permettent de partir découvrir les îles, fjords et glaciers nichés dans le coin. Vous pouvez même planifier une petite semaine de traversée et descendre tranquillement jusqu\'à l\'île de Vancouver', '2010-03-25 16:28:41'),
(2, 'Chapitre 2 : Découverte de la capitale', 'Juneau a pris son envol lors de la première ruée vers l’or d’importance en Alaska. Lorsqu’on parle de capitale de l’Alaska, n’espérez pas voir de grands buildings ou de réel « centre ville ». Downtown se résume à quelques rues, tandis que le reste de la ville se découvre en grimpant des ruelles et en passant de ci de là par des escaliers. C’est une ville que je qualifierais d’originale et pittoresque. Certes, il faut avoir envie de monter et d’errer pour être étonné, mais la vue est splendide lorsqu’on prend cette hauteur. Les maisons sont colorées et l’atmosphère semble paisible dans cette petite capitale. Il n’est pas difficile de conduire et de se garer là-bas.\r\nLa ville s’active autour du travail au port et de la pêche. Le tourisme est florissant, du fait de la présence des glaciers, facilement accessibles aux alentours de Juneau. Point négatif : de nombreux paquebots déboulent chaque jour… \r\nJe n’ai pas pu découvrir la vie culturelle de la capitale, car il n’y avait pas d’événements particuliers en mars, mais il semble qu’il y ait de nombreux festivals, notamment à partir du mois d’avril. \r\nQuoi qu’il en soit, la visite de Juneau m’a laissé un très bon souvenir. Il n’y a pas énormément à faire, mais une balade s’impose dans la ville et vers les merveilles naturelles qui l’entoure. Petite info météo : préparez votre parapluie ! Personnellement, j’ai eu beaucoup de chance d’avoir du beau temps, mais cette région de l’Alaska est connue pour enchainer les averses et temps gris. Par contre, l’avantage est qu’il fait doux. Pas besoin d’être en équipement de survie !', '2010-03-27 18:31:11'),
(5, 'Chapitre 3 : Et si on allait voir les glaciers ?', 'Voilà le ponpon du voyage. J\'avais toujours rêvé de m\'approcher d\'un glacier. Sachez qu\'en réalité c\'est encore plus intense que ce qu\'on pense ! \r\n\r\nL\'avantage de Juneau, c\'est que certains glaciers sont accessibles à pied. Le plus connu et le plus touristique est sans aucun doute le Mendenhall glacier, situé à 19 km du centre ville (ou à quelques minutes de l\'aéroport). Mais il y en a beaucoup d\'autres , dont le Eagle glacier ou le Herbert glacier, accessibles après quelques heures de randonnées.\r\n\r\nSi le cœur (et le portefeuille) vous en dit, vous pouvez également survoler les alentours de Juneau dans un petit avion ou naviguer pour aller voir le Glacier Bay National Park and Preserve non loin de Juneau. Les 16 glaciers du parc sont malheureusement célèbre pour leur record mondial de fonte rapide... Alors certes, c\'est beau à photographier des énormes icebergs de 60m de hauteur qui se décrochent et plongent dans la baie mais c\'est surtout très alarmant. Lorsqu\'on sait les conséquences que ça a derrière, on réfléchit deux fois à sa petite croisière... \r\n\r\nPour notre part, nous sommes parties explorer avec nos pieds deux glaciers : le Mendenhall Glacier et l\'Herbert Glacier. Allons voir ça de plus près...', '2018-02-06 04:46:10'),
(6, 'Chapitre 4 : Dérive sur une autre rive', 'A partir de Juneau, il suffit de traverser un pont (le Juneau-Douglas Bridge) pour se rendre sur l\'autre rive, à Douglas Island. \r\n\r\nNous avons roulé sur cette île tout au nord, jusqu\'au bout de la route (North Douglas Highway). Et oui par principe, j\'aime rouler jusqu\'au bout de la route, juste pour voir comment ça fini ! C\'est sur cette rive que vous trouvez la station de ski et de belles criques. Un pur moment d\'évasion !', '2018-02-06 04:51:20'),
(7, 'Chapitre 5 : De Haines au no man\'s land de la Haines Pass', 'Notre voyage à Juneau touche à sa fin. \r\nMardi 25 mars, il est 7h du matin, et nous quittons Juneau pour nous rendre à Haines, une fois de plus par la voie maritime (Inside Passage). Cette fois-ci nous serons bien moins chanceuses : un temps grisonnant et des bourrasques de vent pas possibles nous accompagneront durant les 5 heures de trajet. Sachez que le voyage en ferry ça peut être ça aussi : le mal de mer ! \r\nEt oui on peut dire que ça a remué sec. Dans ces cas là, une solution : s\'allonger et prendre l\'air. Malgré le temps, nous nous sommes rendues sur le ponton au solarium (réchauffons nous comme nous pouvons) et avons profité des transat en mode seules au monde. Tout le monde est resté assis en bas, les visages passant du blanc au vert. \r\n\r\nUne fois allongée, le mal de mer est passé doucement et j\'ai pu profiter au chaud des bourrasques de vent et des vagues par dessus bord. On oubliera les photos pour cette fois ! (cela dit, j\'ai pris une petite vidéo bien drôle où je promets à ma mère que j\'arrêterais de voyager.... humm lol)\r\n\r\nBref après ce passage maritime tumultueux (non je ne ferais JAMAIS de croisière c\'est sur) nous revoici sur la terre ferme, toujours en Alaska, à Haines. A partir de Haines, il existe une route qui nous ramène ensuite au Yukon. Lorsqu\'on fait ce parcours expliqué dans l\'e-tin, on dit qu\'on a \"fait la boucle\". Petit retour sur ce dernier jour...', '2018-02-06 04:52:50'),
(23, 'Chapitre 7 - Un, deux, trois', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non eros rhoncus, congue leo ut, pharetra neque. Nam ultrices a libero sed auctor. Pellentesque eget rutrum velit. Suspendisse potenti. Duis elementum feugiat mi, quis imperdiet quam luctus et. Nulla id semper elit. Maecenas consectetur tortor purus, sit amet dapibus purus eleifend ac. In leo risus, varius sit amet congue ultricies, finibus sed dui. Aliquam viverra, velit in ultricies scelerisque, odio ligula finibus sapien, nec molestie lacus lacus vitae justo. Fusce semper arcu dui, nec facilisis tortor rhoncus vitae. Quisque nec dui felis. Nunc sagittis cursus eros, sit amet pharetra nisi ultrices sed. Morbi faucibus magna dictum, ornare eros at, finibus urna. Quisque ultrices risus eu erat consectetur mattis.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Vivamus ac est ut felis maximus malesuada. Fusce lobortis iaculis aliquet. Quisque at vestibulum magna, quis faucibus nunc. Etiam sit amet odio in leo viverra consequat. In tortor leo, sodales non nulla nec, varius ornare felis. Quisque posuere congue ligula, sed efficitur metus eleifend sed. Vivamus id nulla in est ultrices ultricies a et neque. Vestibulum efficitur ullamcorper elit ac porttitor. Cras ultricies ultricies auctor. Mauris consectetur pellentesque erat eu ultricies. Morbi elementum consectetur lacus. Maecenas ut massa accumsan, porta massa a, tincidunt eros. Aliquam rutrum, justo id aliquet mattis, quam libero rutrum sapien, ut feugiat felis neque sed mi. Suspendisse fringilla euismod pharetra.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Morbi egestas viverra dapibus. Etiam elementum lobortis mi vel lobortis. Cras ligula enim, suscipit accumsan massa nec, accumsan iaculis eros. Morbi et erat ut arcu suscipit volutpat non quis nunc. Donec vestibulum ullamcorper purus eget auctor. Maecenas rutrum dolor arcu. Etiam ullamcorper, tellus non semper suscipit, mi ipsum accumsan erat, non pellentesque neque libero vitae purus. Curabitur rhoncus tincidunt orci, non sodales neque tempus in. Phasellus et lectus at tortor accumsan accumsan. Proin id euismod magna. Fusce bibendum id tellus id viverra. Quisque vel iaculis sapien. Donec tristique scelerisque metus eget volutpat. Nullam malesuada condimentum velit quis eleifend.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff; text-align: left;\">In consectetur, mi at vehicula rutrum, tortor metus ullamcorper mi, sed interdum nulla elit porttitor quam. Morbi auctor lorem odio, a bibendum augue posuere in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam scelerisque ipsum sed auctor commodo. Morbi sodales dolor sit amet volutpat pharetra. Pellentesque tempus ornare fringilla. Vivamus ut eros eros. Nam dignissim lacinia mauris id facilisis. Duis in turpis quis nisi euismod sollicitudin. Etiam vestibulum scelerisque ipsum, vitae elementum metus pellentesque in. Pellentesque magna tellus, posuere a varius vel, interdum quis ipsum.</p>', '2019-02-27 06:08:57'),
(16, 'Test', '<p>Testejmlkjh5555555</p>', '2019-02-13 01:47:15'),
(24, 'Chapitre 8 - Trois, deux, un', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id eleifend elit. Ut mattis lacus vel lobortis ultrices. Nam sagittis orci vitae felis consectetur condimentum. Cras venenatis magna hendrerit leo efficitur, placerat laoreet diam lobortis. Curabitur vitae volutpat tellus. Etiam placerat vel est vitae gravida. Mauris tincidunt mi nec purus luctus elementum. Quisque ut justo fringilla, tempus diam eu, mollis est. Suspendisse aliquam, dui et elementum malesuada, nisi libero lobortis velit, non fringilla tortor tortor et ante. Aliquam erat volutpat. Nulla fermentum massa nec finibus pellentesque. Maecenas in consectetur nisl. Proin id vestibulum augue, a facilisis tellus. Vivamus orci ante, ultrices quis arcu pharetra, pellentesque consequat ipsum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Curabitur rutrum felis ac lobortis sodales. Sed interdum ligula vel lobortis sagittis. Nunc finibus ornare enim vel pharetra. Vestibulum tristique consequat nisi in facilisis. Ut a diam non ante aliquet lobortis ut quis justo. Morbi rhoncus purus et augue placerat fermentum. Cras ut libero sapien. Maecenas viverra justo id euismod ultricies. Morbi accumsan quam venenatis bibendum mollis. Phasellus quis cursus mi. Vivamus vitae arcu ut diam iaculis bibendum. Mauris non imperdiet leo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean volutpat, leo vel aliquet egestas, diam est tempus felis, quis suscipit justo libero finibus libero. Donec dui mauris, cursus at nulla a, auctor ultrices dui. Vivamus venenatis fermentum mauris, a laoreet odio imperdiet non. Donec sit amet ipsum ullamcorper, varius quam in, finibus mi. Phasellus dignissim nisl et lobortis dignissim. Nunc egestas bibendum diam, vitae rutrum turpis finibus quis. Sed accumsan erat nec malesuada feugiat. Aliquam ac efficitur risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In in sem leo. Praesent blandit nec mi ac euismod. Pellentesque libero elit, suscipit sit amet ultrices non, condimentum id odio. Vivamus ornare elementum elit, in egestas ligula tincidunt quis. Morbi pellentesque est id feugiat maximus. Etiam elementum, nunc sit amet commodo maximus, nisl neque dapibus enim, ut fermentum leo enim sit amet nibh. Sed malesuada neque neque, sed pellentesque magna ullamcorper vitae.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nulla tempor, quam vel commodo aliquam, enim diam sollicitudin dui, at dictum dolor lacus id libero. Etiam erat lacus, condimentum vel hendrerit lacinia, bibendum cursus purus. Aliquam ornare eu justo quis consequat. Pellentesque arcu elit, tincidunt non nunc vel, porta molestie nibh. Curabitur dictum sed nisi nec mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse condimentum mi odio, at maximus massa consectetur vulputate. Fusce efficitur augue quis ex ultricies vulputate. In hac habitasse platea dictumst. Mauris pulvinar rhoncus cursus. Nulla tincidunt elit nunc, nec hendrerit turpis venenatis sit amet. Integer vel urna nec odio maximus sagittis. Donec sed tempor lacus, ac lobortis lectus. Praesent efficitur justo id justo vulputate, sed mollis est pharetra.</p>', '2019-02-27 06:46:16'),
(25, 'Chapitre 9 - Neuf, huit, sept', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id eleifend elit. Ut mattis lacus vel lobortis ultrices. Nam sagittis orci vitae felis consectetur condimentum. Cras venenatis magna hendrerit leo efficitur, placerat laoreet diam lobortis. Curabitur vitae volutpat tellus. Etiam placerat vel est vitae gravida. Mauris tincidunt mi nec purus luctus elementum. Quisque ut justo fringilla, tempus diam eu, mollis est. Suspendisse aliquam, dui et elementum malesuada, nisi libero lobortis velit, non fringilla tortor tortor et ante. Aliquam erat volutpat. Nulla fermentum massa nec finibus pellentesque. Maecenas in consectetur nisl. Proin id vestibulum augue, a facilisis tellus. Vivamus orci ante, ultrices quis arcu pharetra, pellentesque consequat ipsum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Curabitur rutrum felis ac lobortis sodales. Sed interdum ligula vel lobortis sagittis. Nunc finibus ornare enim vel pharetra. Vestibulum tristique consequat nisi in facilisis. Ut a diam non ante aliquet lobortis ut quis justo. Morbi rhoncus purus et augue placerat fermentum. Cras ut libero sapien. Maecenas viverra justo id euismod ultricies. Morbi accumsan quam venenatis bibendum mollis. Phasellus quis cursus mi. Vivamus vitae arcu ut diam iaculis bibendum. Mauris non imperdiet leo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean volutpat, leo vel aliquet egestas, diam est tempus felis, quis suscipit justo libero finibus libero. Donec dui mauris, cursus at nulla a, auctor ultrices dui. Vivamus venenatis fermentum mauris, a laoreet odio imperdiet non. Donec sit amet ipsum ullamcorper, varius quam in, finibus mi. Phasellus dignissim nisl et lobortis dignissim. Nunc egestas bibendum diam, vitae rutrum turpis finibus quis. Sed accumsan erat nec malesuada feugiat. Aliquam ac efficitur risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In in sem leo. Praesent blandit nec mi ac euismod. Pellentesque libero elit, suscipit sit amet ultrices non, condimentum id odio. Vivamus ornare elementum elit, in egestas ligula tincidunt quis. Morbi pellentesque est id feugiat maximus. Etiam elementum, nunc sit amet commodo maximus, nisl neque dapibus enim, ut fermentum leo enim sit amet nibh. Sed malesuada neque neque, sed pellentesque magna ullamcorper vitae.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nulla tempor, quam vel commodo aliquam, enim diam sollicitudin dui, at dictum dolor lacus id libero. Etiam erat lacus, condimentum vel hendrerit lacinia, bibendum cursus purus. Aliquam ornare eu justo quis consequat. Pellentesque arcu elit, tincidunt non nunc vel, porta molestie nibh. Curabitur dictum sed nisi nec mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse condimentum mi odio, at maximus massa consectetur vulputate. Fusce efficitur augue quis ex ultricies vulputate. In hac habitasse platea dictumst. Mauris pulvinar rhoncus cursus. Nulla tincidunt elit nunc, nec hendrerit turpis venenatis sit amet. Integer vel urna nec odio maximus sagittis. Donec sed tempor lacus, ac lobortis lectus. Praesent efficitur justo id justo vulputate, sed mollis est pharetra.</p>', '2019-02-27 06:46:51'),
(26, 'Chapitre 10 - Encore un essai', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id eleifend elit. Ut mattis lacus vel lobortis ultrices. Nam sagittis orci vitae felis consectetur condimentum. Cras venenatis magna hendrerit leo efficitur, placerat laoreet diam lobortis. Curabitur vitae volutpat tellus. Etiam placerat vel est vitae gravida. Mauris tincidunt mi nec purus luctus elementum. Quisque ut justo fringilla, tempus diam eu, mollis est. Suspendisse aliquam, dui et elementum malesuada, nisi libero lobortis velit, non fringilla tortor tortor et ante. Aliquam erat volutpat. Nulla fermentum massa nec finibus pellentesque. Maecenas in consectetur nisl. Proin id vestibulum augue, a facilisis tellus. Vivamus orci ante, ultrices quis arcu pharetra, pellentesque consequat ipsum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Curabitur rutrum felis ac lobortis sodales. Sed interdum ligula vel lobortis sagittis. Nunc finibus ornare enim vel pharetra. Vestibulum tristique consequat nisi in facilisis. Ut a diam non ante aliquet lobortis ut quis justo. Morbi rhoncus purus et augue placerat fermentum. Cras ut libero sapien. Maecenas viverra justo id euismod ultricies. Morbi accumsan quam venenatis bibendum mollis. Phasellus quis cursus mi. Vivamus vitae arcu ut diam iaculis bibendum. Mauris non imperdiet leo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean volutpat, leo vel aliquet egestas, diam est tempus felis, quis suscipit justo libero finibus libero. Donec dui mauris, cursus at nulla a, auctor ultrices dui. Vivamus venenatis fermentum mauris, a laoreet odio imperdiet non. Donec sit amet ipsum ullamcorper, varius quam in, finibus mi. Phasellus dignissim nisl et lobortis dignissim. Nunc egestas bibendum diam, vitae rutrum turpis finibus quis. Sed accumsan erat nec malesuada feugiat. Aliquam ac efficitur risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In in sem leo. Praesent blandit nec mi ac euismod. Pellentesque libero elit, suscipit sit amet ultrices non, condimentum id odio. Vivamus ornare elementum elit, in egestas ligula tincidunt quis. Morbi pellentesque est id feugiat maximus. Etiam elementum, nunc sit amet commodo maximus, nisl neque dapibus enim, ut fermentum leo enim sit amet nibh. Sed malesuada neque neque, sed pellentesque magna ullamcorper vitae.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nulla tempor, quam vel commodo aliquam, enim diam sollicitudin dui, at dictum dolor lacus id libero. Etiam erat lacus, condimentum vel hendrerit lacinia, bibendum cursus purus. Aliquam ornare eu justo quis consequat. Pellentesque arcu elit, tincidunt non nunc vel, porta molestie nibh. Curabitur dictum sed nisi nec mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse condimentum mi odio, at maximus massa consectetur vulputate. Fusce efficitur augue quis ex ultricies vulputate. In hac habitasse platea dictumst. Mauris pulvinar rhoncus cursus. Nulla tincidunt elit nunc, nec hendrerit turpis venenatis sit amet. Integer vel urna nec odio maximus sagittis. Donec sed tempor lacus, ac lobortis lectus. Praesent efficitur justo id justo vulputate, sed mollis est pharetra.</p>', '2019-02-27 06:47:10'),
(27, 'Chapitre 11 - Pourquoi pas', '<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum id eleifend elit. Ut mattis lacus vel lobortis ultrices. Nam sagittis orci vitae felis consectetur condimentum. Cras venenatis magna hendrerit leo efficitur, placerat laoreet diam lobortis. Curabitur vitae volutpat tellus. Etiam placerat vel est vitae gravida. Mauris tincidunt mi nec purus luctus elementum. Quisque ut justo fringilla, tempus diam eu, mollis est. Suspendisse aliquam, dui et elementum malesuada, nisi libero lobortis velit, non fringilla tortor tortor et ante. Aliquam erat volutpat. Nulla fermentum massa nec finibus pellentesque. Maecenas in consectetur nisl. Proin id vestibulum augue, a facilisis tellus. Vivamus orci ante, ultrices quis arcu pharetra, pellentesque consequat ipsum.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Curabitur rutrum felis ac lobortis sodales. Sed interdum ligula vel lobortis sagittis. Nunc finibus ornare enim vel pharetra. Vestibulum tristique consequat nisi in facilisis. Ut a diam non ante aliquet lobortis ut quis justo. Morbi rhoncus purus et augue placerat fermentum. Cras ut libero sapien. Maecenas viverra justo id euismod ultricies. Morbi accumsan quam venenatis bibendum mollis. Phasellus quis cursus mi. Vivamus vitae arcu ut diam iaculis bibendum. Mauris non imperdiet leo.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Aenean volutpat, leo vel aliquet egestas, diam est tempus felis, quis suscipit justo libero finibus libero. Donec dui mauris, cursus at nulla a, auctor ultrices dui. Vivamus venenatis fermentum mauris, a laoreet odio imperdiet non. Donec sit amet ipsum ullamcorper, varius quam in, finibus mi. Phasellus dignissim nisl et lobortis dignissim. Nunc egestas bibendum diam, vitae rutrum turpis finibus quis. Sed accumsan erat nec malesuada feugiat. Aliquam ac efficitur risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In in sem leo. Praesent blandit nec mi ac euismod. Pellentesque libero elit, suscipit sit amet ultrices non, condimentum id odio. Vivamus ornare elementum elit, in egestas ligula tincidunt quis. Morbi pellentesque est id feugiat maximus. Etiam elementum, nunc sit amet commodo maximus, nisl neque dapibus enim, ut fermentum leo enim sit amet nibh. Sed malesuada neque neque, sed pellentesque magna ullamcorper vitae.</p>\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;\">Nulla tempor, quam vel commodo aliquam, enim diam sollicitudin dui, at dictum dolor lacus id libero. Etiam erat lacus, condimentum vel hendrerit lacinia, bibendum cursus purus. Aliquam ornare eu justo quis consequat. Pellentesque arcu elit, tincidunt non nunc vel, porta molestie nibh. Curabitur dictum sed nisi nec mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse condimentum mi odio, at maximus massa consectetur vulputate. Fusce efficitur augue quis ex ultricies vulputate. In hac habitasse platea dictumst. Mauris pulvinar rhoncus cursus. Nulla tincidunt elit nunc, nec hendrerit turpis venenatis sit amet. Integer vel urna nec odio maximus sagittis. Donec sed tempor lacus, ac lobortis lectus. Praesent efficitur justo id justo vulputate, sed mollis est pharetra.</p>', '2019-02-27 06:47:25');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `report` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `report`, `date_commentaire`) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', 0, '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', 0, '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', 0, '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', 0, '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', 0, '2010-03-27 22:02:13'),
(6, 2, 'Bastien', 'test', 0, '2019-01-23 18:25:07'),
(9, 7, 'Bastien', 'Tu en pense quoi toi de ce nouveau site ?', 0, '2019-02-06 07:28:29'),
(8, 1, 'Rick', 'Je sais que mon commentaire est intéressent, c\'est pourquoi j\'en profite pour le faire le plus long possible.', 1, '2019-02-06 07:00:12'),
(10, 6, 'Thomas', 'Pas mal !', 0, '2019-02-06 07:39:43'),
(11, 7, 'Arthur', 'Je l\'aime bien.', 0, '2019-02-06 07:44:06'),
(26, 16, 'Jean Forteroche', 'Un essai de plus', 0, '2019-02-27 03:16:16'),
(25, 16, 'Bat', 'Test123', 0, '2019-02-25 16:20:26'),
(30, 1, 'Jean Forteroche', 'qdaqzdadaddsdqda', 0, '2019-02-27 04:30:26'),
(29, 1, 'Jean Forteroche', 'aadadqsdqd', 0, '2019-02-27 04:30:21'),
(28, 1, 'Jean Forteroche', '25', 0, '2019-02-27 04:30:17'),
(27, 16, 'Jean Forteroche', 'Je sais pas trop', 0, '2019-02-27 03:19:20'),
(31, 1, 'Jean Forteroche', 'adadqwsdqdazdaz', 0, '2019-02-27 04:30:30'),
(32, 1, 'Jean Forteroche', 'shfhjgfjhfgjfj', 0, '2019-02-27 04:30:38'),
(33, 1, 'Jean Forteroche', 'fjfjfjfgjbdsfsfse', 0, '2019-02-27 04:30:43'),
(34, 1, 'Jean Forteroche', 'sfdfxwcghsrhshshgsfdsfz', 0, '2019-02-27 04:30:48'),
(35, 27, 'Zalene', 'afadadazrazfqfq', 0, '2019-02-27 07:11:56'),
(36, 25, 'Jean Forteroche', 'qdqdqdad', 0, '2019-02-27 07:37:24'),
(37, 25, 'Jean Forteroche', 'qdqdqzdqdqd', 0, '2019-02-27 07:37:29'),
(38, 27, 'Jean Forteroche', 'adadqsdqdqd', 0, '2019-02-27 07:39:07'),
(39, 27, 'Jean Forteroche', '123', 0, '2019-02-28 15:10:05'),
(40, 27, 'Jean Forteroche', '456', 0, '2019-02-28 15:10:10'),
(41, 27, 'Jean Forteroche', '789', 0, '2019-02-28 15:10:14'),
(42, 27, 'Jean Forteroche', '741', 0, '2019-02-28 15:10:20');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_groupe` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `id_groupe`, `pseudo`, `email`, `pass`, `date_inscription`) VALUES
(5, 2, 'Zalene', 'bastien_gau@hotmail.fr', '$2y$10$h/rK5TzgNNm1R2KxDa7cK.44YgD84hYZ/TLukJU6hf40yY1q3FBnq', '2019-02-20'),
(6, 1, 'Jean Forteroche', 'bastien.gau@gmail.com', '$2y$10$qLrTUixzZyW3Z9k5DTbWvu4IN27N1.iw4Hd2srO9DrLuzfTH59Vka', '2019-02-25'),
(4, 2, 'Baba', 'hdoj@lkhgsd.fr', '$2y$10$wayZDXSF2.VciHwvjYcdW.A52aquq.luYmeTenVZgxceqbDUZHklO', '2019-02-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
