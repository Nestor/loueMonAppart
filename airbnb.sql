/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50634
Source Host           : localhost:3306
Source Database       : airbnb

Target Server Type    : MYSQL
Target Server Version : 50634
File Encoding         : 65001

Date: 2017-08-29 16:59:54
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `annonces`
-- ----------------------------
DROP TABLE IF EXISTS `annonces`;
CREATE TABLE `annonces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dateDispo` varchar(255) DEFAULT NULL,
  `placeDispo` varchar(255) DEFAULT NULL,
  `price` int(12) DEFAULT '0',
  `idUser` varchar(255) DEFAULT NULL,
  `accept` varchar(255) DEFAULT 'false',
  `datePosted` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `lieu` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of annonces
-- ----------------------------
INSERT INTO `annonces` VALUES ('4', 'annonce de test testeeee', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse scelerisque risus elit, eu interdum est malesuada vel. Donec quis volutpat purus. Mauris a mollis urna. Nunc tristique, augue sed eleifend bibendum, elit nibh imperdiet enim, eu dictu', '2017-08-21', '4', '300', '1', 'true', '2017-08-21', 'house', 'paris', '1 Rue du Faubourg Saint-Honoré, Paris');
INSERT INTO `annonces` VALUES ('5', 'ctesqts', 'sqjdqsjdksqdkqdsqdl', '2017-08-21', '4', '35', '1', 'true', '2017-08-21', 'house', 'perpignan', '1 Avenue du Général Guillaut, Perpignan');
INSERT INTO `annonces` VALUES ('6', 'ceci est un test', '<p>&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&nbsp;&nbsp;lorem ipsum do lorem&n', '2017-08-22', '1', '30', '1', 'true', '2017-08-22', 'appart', 'perpignan', '10 Boulevard Anatole France, Perpignan');

-- ----------------------------
-- Table structure for `commandes`
-- ----------------------------
DROP TABLE IF EXISTS `commandes`;
CREATE TABLE `commandes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `userId` int(12) DEFAULT NULL,
  `annonceId` int(12) DEFAULT NULL,
  `dateArriver` varchar(255) DEFAULT NULL,
  `dateDepart` varchar(255) DEFAULT NULL,
  `price` int(12) DEFAULT NULL,
  `datePosted` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of commandes
-- ----------------------------
INSERT INTO `commandes` VALUES ('1', '1', '4', '2017-08-29', '2017-09-03', '0', '2017-08-29');
INSERT INTO `commandes` VALUES ('2', '1', '4', '2017-08-29', '2017-09-02', '0', '2017-08-29');

-- ----------------------------
-- Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(12) NOT NULL,
  `type` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `idAnnonce` int(12) NOT NULL,
  `linkImage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('1', '1', 'uploads/86d0db9b-7a05-4a1b-ab56-7c807923b8e9.jpg');
INSERT INTO `images` VALUES ('2', '1', 'uploads/afa0fe17-902f-424e-a71a-1e4573113a75.jpg');
INSERT INTO `images` VALUES ('3', '1', 'uploads/cca7fe3c-28c9-432f-aff9-25d1132ee0b2.jpg');
INSERT INTO `images` VALUES ('4', '4', 'uploads/4578956_9_b.jpg');
INSERT INTO `images` VALUES ('5', '4', 'uploads/appartement-t2-3-avec-terrasse-51.jpg');
INSERT INTO `images` VALUES ('6', '4', 'uploads/photo-635345462351547530-1.jpg');
INSERT INTO `images` VALUES ('7', '5', 'uploads/86d0db9b-7a05-4a1b-ab56-7c807923b8e9.jpg');
INSERT INTO `images` VALUES ('8', '5', 'uploads/cca7fe3c-28c9-432f-aff9-25d1132ee0b2.jpg');
INSERT INTO `images` VALUES ('9', '6', 'uploads/photo-635345462351547530-1.jpg');
INSERT INTO `images` VALUES ('10', '7', 'uploads/desktop.png');

-- ----------------------------
-- Table structure for `images_url`
-- ----------------------------
DROP TABLE IF EXISTS `images_url`;
CREATE TABLE `images_url` (
  `id` int(12) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `link_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of images_url
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `dateInscription` varchar(255) DEFAULT NULL,
  `proprietaire` varchar(255) DEFAULT NULL,
  `demandeProprietaire` varchar(255) DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'zoukilama', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30bd033e22ae348aeb5660fc2140aec35850c4da997', 'zouki.dev@gmail.com', 'user', '18/08/2017 à 18:47', 'true', 'false');
