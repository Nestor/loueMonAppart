/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50634
Source Host           : localhost:3306
Source Database       : airbnb

Target Server Type    : MYSQL
Target Server Version : 50634
File Encoding         : 65001

Date: 2017-08-13 10:44:35
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of annonces
-- ----------------------------
INSERT INTO `annonces` VALUES ('1', 'Perpignan Parc des Expositions', 'Venez découvrir cette incroyable maison en plein Perpignan centre', '03/08/2017', '4', '50', null, 'false');
INSERT INTO `annonces` VALUES ('6', 'Paris sparc des expositions', 'Venez visiter Paris est sa tour Eiffel', '04/08/2017', '4', '1000', null, 'false');
INSERT INTO `annonces` VALUES ('7', 'test', 'Aucune description', '00/00/0000', '9999', '120', null, 'false');
INSERT INTO `annonces` VALUES ('8', 'ici pas loin', 'ici pas loin', '2017-08-10', '4', '30', null, 'false');
INSERT INTO `annonces` VALUES ('9', 'ici pas loin', 'ici pas loin', '2017-08-10', '4', '30', null, 'false');
INSERT INTO `annonces` VALUES ('10', 'zoukilamar', 'zoukilamar', '2017-08-10', '4', '250', null, 'false');
INSERT INTO `annonces` VALUES ('11', 'zoukilamar', 'zoukilamar', '2017-08-10', '4', '250', '8', 'true');
INSERT INTO `annonces` VALUES ('12', 'zoukilamar', 'zoukilamar', '2017-08-10', '4', '250', '8', 'true');

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
  `locataire` varchar(255) DEFAULT NULL,
  `proprietaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('8', 'zoukilama', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30bd033e22ae348aeb5660fc2140aec35850c4da997', 'zouki.dev@gmail.com', 'owner', '04/08/2017 à 12:05', 'true', 'true');
INSERT INTO `users` VALUES ('9', 'zoukislama', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30bd033e22ae348aeb5660fc2140aec35850c4da997', 'zouki.dev@gmail.com', 'owner', '04/08/2017 à 12:21', null, null);
INSERT INTO `users` VALUES ('11', 'test', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30ba94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@gmail.com', 'user', '04/08/2017 à 14:30', null, null);
INSERT INTO `users` VALUES ('12', 'testt', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30b3221f00db852d718fe22d5d6d1794b8e09b2e67b', 'test@gmail.com', 'user', '04/08/2017 à 14:31', null, null);
INSERT INTO `users` VALUES ('13', 'testts', '353d196605b2bb5890bfb1b3aa0c3cccfdddd30b2b617f41aab0f6a641b5345bb07ce8a27a5b2d01', 'test@gmail.com', 'user', '04/08/2017 à 14:31', null, null);
