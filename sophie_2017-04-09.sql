# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.83.137 (MySQL 5.6.33-0ubuntu0.14.04.1)
# Database: sophie
# Generation Time: 2017-04-09 10:10:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table soph_banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_banners`;

CREATE TABLE `soph_banners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(255) DEFAULT NULL,
  `url` text,
  `display` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_categories`;

CREATE TABLE `soph_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_countries`;

CREATE TABLE `soph_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `soph_countries` WRITE;
/*!40000 ALTER TABLE `soph_countries` DISABLE KEYS */;

INSERT INTO `soph_countries` (`id`, `code`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `flag`)
VALUES
	(1,'AF','Afghanistan',NULL,NULL,NULL,NULL,NULL),
	(2,'AL','Albania',NULL,NULL,NULL,NULL,NULL),
	(3,'DZ','Algeria',NULL,NULL,NULL,NULL,NULL),
	(4,'DS','American Samoa',NULL,NULL,NULL,NULL,NULL),
	(5,'AD','Andorra',NULL,NULL,NULL,NULL,NULL),
	(6,'AO','Angola',NULL,NULL,NULL,NULL,NULL),
	(7,'AI','Anguilla',NULL,NULL,NULL,NULL,NULL),
	(8,'AQ','Antarctica',NULL,NULL,NULL,NULL,NULL),
	(9,'AG','Antigua and Barbuda',NULL,NULL,NULL,NULL,NULL),
	(10,'AR','Argentina',NULL,NULL,NULL,NULL,NULL),
	(11,'AM','Armenia',NULL,NULL,NULL,NULL,NULL),
	(12,'AW','Aruba',NULL,NULL,NULL,NULL,NULL),
	(13,'AU','Australia',NULL,NULL,NULL,NULL,NULL),
	(14,'AT','Austria',NULL,NULL,NULL,NULL,NULL),
	(15,'AZ','Azerbaijan',NULL,NULL,NULL,NULL,NULL),
	(16,'BS','Bahamas',NULL,NULL,NULL,NULL,NULL),
	(17,'BH','Bahrain',NULL,NULL,NULL,NULL,NULL),
	(18,'BD','Bangladesh',NULL,NULL,NULL,NULL,NULL),
	(19,'BB','Barbados',NULL,NULL,NULL,NULL,NULL),
	(20,'BY','Belarus',NULL,NULL,NULL,NULL,NULL),
	(21,'BE','Belgium',NULL,NULL,NULL,NULL,NULL),
	(22,'BZ','Belize',NULL,NULL,NULL,NULL,NULL),
	(23,'BJ','Benin',NULL,NULL,NULL,NULL,NULL),
	(24,'BM','Bermuda',NULL,NULL,NULL,NULL,NULL),
	(25,'BT','Bhutan',NULL,NULL,NULL,NULL,NULL),
	(26,'BO','Bolivia',NULL,NULL,NULL,NULL,NULL),
	(27,'BA','Bosnia and Herzegovina',NULL,NULL,NULL,NULL,NULL),
	(28,'BW','Botswana',NULL,NULL,NULL,NULL,NULL),
	(29,'BV','Bouvet Island',NULL,NULL,NULL,NULL,NULL),
	(30,'BR','Brazil',NULL,NULL,NULL,NULL,NULL),
	(31,'IO','British Indian Ocean Territory',NULL,NULL,NULL,NULL,NULL),
	(32,'BN','Brunei Darussalam',NULL,NULL,NULL,NULL,NULL),
	(33,'BG','Bulgaria',NULL,NULL,NULL,NULL,NULL),
	(34,'BF','Burkina Faso',NULL,NULL,NULL,NULL,NULL),
	(35,'BI','Burundi',NULL,NULL,NULL,NULL,NULL),
	(36,'KH','Cambodia',NULL,NULL,NULL,NULL,NULL),
	(37,'CM','Cameroon',NULL,NULL,NULL,NULL,NULL),
	(38,'CA','Canada',NULL,NULL,NULL,NULL,NULL),
	(39,'CV','Cape Verde',NULL,NULL,NULL,NULL,NULL),
	(40,'KY','Cayman Islands',NULL,NULL,NULL,NULL,NULL),
	(41,'CF','Central African Republic',NULL,NULL,NULL,NULL,NULL),
	(42,'TD','Chad',NULL,NULL,NULL,NULL,NULL),
	(43,'CL','Chile',NULL,NULL,NULL,NULL,NULL),
	(44,'CN','China',NULL,NULL,NULL,NULL,NULL),
	(45,'CX','Christmas Island',NULL,NULL,NULL,NULL,NULL),
	(46,'CC','Cocos (Keeling) Islands',NULL,NULL,NULL,NULL,NULL),
	(47,'CO','Colombia',NULL,NULL,NULL,NULL,NULL),
	(48,'KM','Comoros',NULL,NULL,NULL,NULL,NULL),
	(49,'CG','Congo',NULL,NULL,NULL,NULL,NULL),
	(50,'CK','Cook Islands',NULL,NULL,NULL,NULL,NULL),
	(51,'CR','Costa Rica',NULL,NULL,NULL,NULL,NULL),
	(52,'HR','Croatia (Hrvatska)',NULL,NULL,NULL,NULL,NULL),
	(53,'CU','Cuba',NULL,NULL,NULL,NULL,NULL),
	(54,'CY','Cyprus',NULL,NULL,NULL,NULL,NULL),
	(55,'CZ','Czech Republic',NULL,NULL,NULL,NULL,NULL),
	(56,'DK','Denmark',NULL,NULL,NULL,NULL,NULL),
	(57,'DJ','Djibouti',NULL,NULL,NULL,NULL,NULL),
	(58,'DM','Dominica',NULL,NULL,NULL,NULL,NULL),
	(59,'DO','Dominican Republic',NULL,NULL,NULL,NULL,NULL),
	(60,'TP','East Timor',NULL,NULL,NULL,NULL,NULL),
	(61,'EC','Ecuador',NULL,NULL,NULL,NULL,NULL),
	(62,'EG','Egypt',NULL,NULL,NULL,NULL,NULL),
	(63,'SV','El Salvador',NULL,NULL,NULL,NULL,NULL),
	(64,'GQ','Equatorial Guinea',NULL,NULL,NULL,NULL,NULL),
	(65,'ER','Eritrea',NULL,NULL,NULL,NULL,NULL),
	(66,'EE','Estonia',NULL,NULL,NULL,NULL,NULL),
	(67,'ET','Ethiopia',NULL,NULL,NULL,NULL,NULL),
	(68,'FK','Falkland Islands (Malvinas)',NULL,NULL,NULL,NULL,NULL),
	(69,'FO','Faroe Islands',NULL,NULL,NULL,NULL,NULL),
	(70,'FJ','Fiji',NULL,NULL,NULL,NULL,NULL),
	(71,'FI','Finland',NULL,NULL,NULL,NULL,NULL),
	(72,'FR','France',NULL,NULL,NULL,NULL,NULL),
	(73,'FX','France, Metropolitan',NULL,NULL,NULL,NULL,NULL),
	(74,'GF','French Guiana',NULL,NULL,NULL,NULL,NULL),
	(75,'PF','French Polynesia',NULL,NULL,NULL,NULL,NULL),
	(76,'TF','French Southern Territories',NULL,NULL,NULL,NULL,NULL),
	(77,'GA','Gabon',NULL,NULL,NULL,NULL,NULL),
	(78,'GM','Gambia',NULL,NULL,NULL,NULL,NULL),
	(79,'GE','Georgia',NULL,NULL,NULL,NULL,NULL),
	(80,'DE','Germany',NULL,NULL,NULL,NULL,NULL),
	(81,'GH','Ghana',NULL,NULL,NULL,NULL,NULL),
	(82,'GI','Gibraltar',NULL,NULL,NULL,NULL,NULL),
	(83,'GK','Guernsey',NULL,NULL,NULL,NULL,NULL),
	(84,'GR','Greece',NULL,NULL,NULL,NULL,NULL),
	(85,'GL','Greenland',NULL,NULL,NULL,NULL,NULL),
	(86,'GD','Grenada',NULL,NULL,NULL,NULL,NULL),
	(87,'GP','Guadeloupe',NULL,NULL,NULL,NULL,NULL),
	(88,'GU','Guam',NULL,NULL,NULL,NULL,NULL),
	(89,'GT','Guatemala',NULL,NULL,NULL,NULL,NULL),
	(90,'GN','Guinea',NULL,NULL,NULL,NULL,NULL),
	(91,'GW','Guinea-Bissau',NULL,NULL,NULL,NULL,NULL),
	(92,'GY','Guyana',NULL,NULL,NULL,NULL,NULL),
	(93,'HT','Haiti',NULL,NULL,NULL,NULL,NULL),
	(94,'HM','Heard and Mc Donald Islands',NULL,NULL,NULL,NULL,NULL),
	(95,'HN','Honduras',NULL,NULL,NULL,NULL,NULL),
	(96,'HK','Hong Kong',NULL,NULL,NULL,NULL,NULL),
	(97,'HU','Hungary',NULL,NULL,NULL,NULL,NULL),
	(98,'IS','Iceland',NULL,NULL,NULL,NULL,NULL),
	(99,'IN','India',NULL,NULL,NULL,NULL,NULL),
	(100,'IM','Isle of Man',NULL,NULL,NULL,NULL,NULL),
	(101,'ID','Indonesia',NULL,NULL,NULL,NULL,NULL),
	(102,'IR','Iran (Islamic Republic of)',NULL,NULL,NULL,NULL,NULL),
	(103,'IQ','Iraq',NULL,NULL,NULL,NULL,NULL),
	(104,'IE','Ireland',NULL,NULL,NULL,NULL,NULL),
	(105,'IL','Israel',NULL,NULL,NULL,NULL,NULL),
	(106,'IT','Italy',NULL,NULL,NULL,NULL,NULL),
	(107,'CI','Ivory Coast',NULL,NULL,NULL,NULL,NULL),
	(108,'JE','Jersey',NULL,NULL,NULL,NULL,NULL),
	(109,'JM','Jamaica',NULL,NULL,NULL,NULL,NULL),
	(110,'JP','Japan',NULL,NULL,NULL,NULL,NULL),
	(111,'JO','Jordan',NULL,NULL,NULL,NULL,NULL),
	(112,'KZ','Kazakhstan',NULL,NULL,NULL,NULL,NULL),
	(113,'KE','Kenya',NULL,NULL,NULL,NULL,NULL),
	(114,'KI','Kiribati',NULL,NULL,NULL,NULL,NULL),
	(115,'KP','Korea, Democratic People\'s Republic of',NULL,NULL,NULL,NULL,NULL),
	(116,'KR','Korea, Republic of',NULL,NULL,NULL,NULL,NULL),
	(117,'XK','Kosovo',NULL,NULL,NULL,NULL,NULL),
	(118,'KW','Kuwait',NULL,NULL,NULL,NULL,NULL),
	(119,'KG','Kyrgyzstan',NULL,NULL,NULL,NULL,NULL),
	(120,'LA','Lao People\'s Democratic Republic',NULL,NULL,NULL,NULL,NULL),
	(121,'LV','Latvia',NULL,NULL,NULL,NULL,NULL),
	(122,'LB','Lebanon',NULL,NULL,NULL,NULL,NULL),
	(123,'LS','Lesotho',NULL,NULL,NULL,NULL,NULL),
	(124,'LR','Liberia',NULL,NULL,NULL,NULL,NULL),
	(125,'LY','Libyan Arab Jamahiriya',NULL,NULL,NULL,NULL,NULL),
	(126,'LI','Liechtenstein',NULL,NULL,NULL,NULL,NULL),
	(127,'LT','Lithuania',NULL,NULL,NULL,NULL,NULL),
	(128,'LU','Luxembourg',NULL,NULL,NULL,NULL,NULL),
	(129,'MO','Macau',NULL,NULL,NULL,NULL,NULL),
	(130,'MK','Macedonia',NULL,NULL,NULL,NULL,NULL),
	(131,'MG','Madagascar',NULL,NULL,NULL,NULL,NULL),
	(132,'MW','Malawi',NULL,NULL,NULL,NULL,NULL),
	(133,'MY','Malaysia',NULL,NULL,NULL,NULL,NULL),
	(134,'MV','Maldives',NULL,NULL,NULL,NULL,NULL),
	(135,'ML','Mali',NULL,NULL,NULL,NULL,NULL),
	(136,'MT','Malta',NULL,NULL,NULL,NULL,NULL),
	(137,'MH','Marshall Islands',NULL,NULL,NULL,NULL,NULL),
	(138,'MQ','Martinique',NULL,NULL,NULL,NULL,NULL),
	(139,'MR','Mauritania',NULL,NULL,NULL,NULL,NULL),
	(140,'MU','Mauritius',NULL,NULL,NULL,NULL,NULL),
	(141,'TY','Mayotte',NULL,NULL,NULL,NULL,NULL),
	(142,'MX','Mexico',NULL,NULL,NULL,NULL,NULL),
	(143,'FM','Micronesia, Federated States of',NULL,NULL,NULL,NULL,NULL),
	(144,'MD','Moldova, Republic of',NULL,NULL,NULL,NULL,NULL),
	(145,'MC','Monaco',NULL,NULL,NULL,NULL,NULL),
	(146,'MN','Mongolia',NULL,NULL,NULL,NULL,NULL),
	(147,'ME','Montenegro',NULL,NULL,NULL,NULL,NULL),
	(148,'MS','Montserrat',NULL,NULL,NULL,NULL,NULL),
	(149,'MA','Morocco',NULL,NULL,NULL,NULL,NULL),
	(150,'MZ','Mozambique',NULL,NULL,NULL,NULL,NULL),
	(151,'MM','Myanmar',NULL,NULL,NULL,NULL,NULL),
	(152,'NA','Namibia',NULL,NULL,NULL,NULL,NULL),
	(153,'NR','Nauru',NULL,NULL,NULL,NULL,NULL),
	(154,'NP','Nepal',NULL,NULL,NULL,NULL,NULL),
	(155,'NL','Netherlands',NULL,NULL,NULL,NULL,NULL),
	(156,'AN','Netherlands Antilles',NULL,NULL,NULL,NULL,NULL),
	(157,'NC','New Caledonia',NULL,NULL,NULL,NULL,NULL),
	(158,'NZ','New Zealand',NULL,NULL,NULL,NULL,NULL),
	(159,'NI','Nicaragua',NULL,NULL,NULL,NULL,NULL),
	(160,'NE','Niger',NULL,NULL,NULL,NULL,NULL),
	(161,'NG','Nigeria',NULL,NULL,NULL,NULL,NULL),
	(162,'NU','Niue',NULL,NULL,NULL,NULL,NULL),
	(163,'NF','Norfolk Island',NULL,NULL,NULL,NULL,NULL),
	(164,'MP','Northern Mariana Islands',NULL,NULL,NULL,NULL,NULL),
	(165,'NO','Norway',NULL,NULL,NULL,NULL,NULL),
	(166,'OM','Oman',NULL,NULL,NULL,NULL,NULL),
	(167,'PK','Pakistan',NULL,NULL,NULL,NULL,NULL),
	(168,'PW','Palau',NULL,NULL,NULL,NULL,NULL),
	(169,'PS','Palestine',NULL,NULL,NULL,NULL,NULL),
	(170,'PA','Panama',NULL,NULL,NULL,NULL,NULL),
	(171,'PG','Papua New Guinea',NULL,NULL,NULL,NULL,NULL),
	(172,'PY','Paraguay',NULL,NULL,NULL,NULL,NULL),
	(173,'PE','Peru',NULL,NULL,NULL,NULL,NULL),
	(174,'PH','Philippines',NULL,NULL,NULL,NULL,NULL),
	(175,'PN','Pitcairn',NULL,NULL,NULL,NULL,NULL),
	(176,'PL','Poland',NULL,NULL,NULL,NULL,NULL),
	(177,'PT','Portugal',NULL,NULL,NULL,NULL,NULL),
	(178,'PR','Puerto Rico',NULL,NULL,NULL,NULL,NULL),
	(179,'QA','Qatar',NULL,NULL,NULL,NULL,NULL),
	(180,'RE','Reunion',NULL,NULL,NULL,NULL,NULL),
	(181,'RO','Romania',NULL,NULL,NULL,NULL,NULL),
	(182,'RU','Russian Federation',NULL,NULL,NULL,NULL,NULL),
	(183,'RW','Rwanda',NULL,NULL,NULL,NULL,NULL),
	(184,'KN','Saint Kitts and Nevis',NULL,NULL,NULL,NULL,NULL),
	(185,'LC','Saint Lucia',NULL,NULL,NULL,NULL,NULL),
	(186,'VC','Saint Vincent and the Grenadines',NULL,NULL,NULL,NULL,NULL),
	(187,'WS','Samoa',NULL,NULL,NULL,NULL,NULL),
	(188,'SM','San Marino',NULL,NULL,NULL,NULL,NULL),
	(189,'ST','Sao Tome and Principe',NULL,NULL,NULL,NULL,NULL),
	(190,'SA','Saudi Arabia',NULL,NULL,NULL,NULL,NULL),
	(191,'SN','Senegal',NULL,NULL,NULL,NULL,NULL),
	(192,'RS','Serbia',NULL,NULL,NULL,NULL,NULL),
	(193,'SC','Seychelles',NULL,NULL,NULL,NULL,NULL),
	(194,'SL','Sierra Leone',NULL,NULL,NULL,NULL,NULL),
	(195,'SG','Singapore',NULL,NULL,NULL,NULL,NULL),
	(196,'SK','Slovakia',NULL,NULL,NULL,NULL,NULL),
	(197,'SI','Slovenia',NULL,NULL,NULL,NULL,NULL),
	(198,'SB','Solomon Islands',NULL,NULL,NULL,NULL,NULL),
	(199,'SO','Somalia',NULL,NULL,NULL,NULL,NULL),
	(200,'ZA','South Africa',NULL,NULL,NULL,NULL,NULL),
	(201,'GS','South Georgia South Sandwich Islands',NULL,NULL,NULL,NULL,NULL),
	(202,'ES','Spain',NULL,NULL,NULL,NULL,NULL),
	(203,'LK','Sri Lanka',NULL,NULL,NULL,NULL,NULL),
	(204,'SH','St. Helena',NULL,NULL,NULL,NULL,NULL),
	(205,'PM','St. Pierre and Miquelon',NULL,NULL,NULL,NULL,NULL),
	(206,'SD','Sudan',NULL,NULL,NULL,NULL,NULL),
	(207,'SR','Suriname',NULL,NULL,NULL,NULL,NULL),
	(208,'SJ','Svalbard and Jan Mayen Islands',NULL,NULL,NULL,NULL,NULL),
	(209,'SZ','Swaziland',NULL,NULL,NULL,NULL,NULL),
	(210,'SE','Sweden',NULL,NULL,NULL,NULL,NULL),
	(211,'CH','Switzerland',NULL,NULL,NULL,NULL,NULL),
	(212,'SY','Syrian Arab Republic',NULL,NULL,NULL,NULL,NULL),
	(213,'TW','Taiwan',NULL,NULL,NULL,NULL,NULL),
	(214,'TJ','Tajikistan',NULL,NULL,NULL,NULL,NULL),
	(215,'TZ','Tanzania, United Republic of',NULL,NULL,NULL,NULL,NULL),
	(216,'TH','Thailand',NULL,NULL,NULL,NULL,NULL),
	(217,'TG','Togo',NULL,NULL,NULL,NULL,NULL),
	(218,'TK','Tokelau',NULL,NULL,NULL,NULL,NULL),
	(219,'TO','Tonga',NULL,NULL,NULL,NULL,NULL),
	(220,'TT','Trinidad and Tobago',NULL,NULL,NULL,NULL,NULL),
	(221,'TN','Tunisia',NULL,NULL,NULL,NULL,NULL),
	(222,'TR','Turkey',NULL,NULL,NULL,NULL,NULL),
	(223,'TM','Turkmenistan',NULL,NULL,NULL,NULL,NULL),
	(224,'TC','Turks and Caicos Islands',NULL,NULL,NULL,NULL,NULL),
	(225,'TV','Tuvalu',NULL,NULL,NULL,NULL,NULL),
	(226,'UG','Uganda',NULL,NULL,NULL,NULL,NULL),
	(227,'UA','Ukraine',NULL,NULL,NULL,NULL,NULL),
	(228,'AE','United Arab Emirates',NULL,NULL,NULL,NULL,NULL),
	(229,'GB','United Kingdom',NULL,NULL,NULL,NULL,NULL),
	(230,'US','United States',NULL,NULL,NULL,NULL,NULL),
	(231,'UM','United States minor outlying islands',NULL,NULL,NULL,NULL,NULL),
	(232,'UY','Uruguay',NULL,NULL,NULL,NULL,NULL),
	(233,'UZ','Uzbekistan',NULL,NULL,NULL,NULL,NULL),
	(234,'VU','Vanuatu',NULL,NULL,NULL,NULL,NULL),
	(235,'VA','Vatican City State',NULL,NULL,NULL,NULL,NULL),
	(236,'VE','Venezuela',NULL,NULL,NULL,NULL,NULL),
	(237,'VN','Vietnam',NULL,NULL,NULL,NULL,NULL),
	(238,'VG','Virgin Islands (British)',NULL,NULL,NULL,NULL,NULL),
	(239,'VI','Virgin Islands (U.S.)',NULL,NULL,NULL,NULL,NULL),
	(240,'WF','Wallis and Futuna Islands',NULL,NULL,NULL,NULL,NULL),
	(241,'EH','Western Sahara',NULL,NULL,NULL,NULL,NULL),
	(242,'YE','Yemen',NULL,NULL,NULL,NULL,NULL),
	(243,'ZR','Zaire',NULL,NULL,NULL,NULL,NULL),
	(244,'ZM','Zambia',NULL,NULL,NULL,NULL,NULL),
	(245,'ZW','Zimbabwe',NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `soph_countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table soph_img
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_img`;

CREATE TABLE `soph_img` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `param_img` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `base_id` int(11) DEFAULT NULL,
  `img_path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_param
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_param`;

CREATE TABLE `soph_param` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_products`;

CREATE TABLE `soph_products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `descriptions` text,
  `subcategories` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `discount_percentage` decimal(10,2) DEFAULT NULL,
  `sales_price` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `display` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_promocode
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_promocode`;

CREATE TABLE `soph_promocode` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `promo_code` varchar(255) DEFAULT NULL,
  `params` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_shipconf
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_shipconf`;

CREATE TABLE `soph_shipconf` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `countries_id` int(11) DEFAULT NULL,
  `min_purchase` decimal(10,2) DEFAULT NULL,
  `min_quantity` int(11) DEFAULT NULL,
  `normal_fees` decimal(10,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_sku
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_sku`;

CREATE TABLE `soph_sku` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `sku_serial` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_subcategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_subcategories`;

CREATE TABLE `soph_subcategories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_supplier
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_supplier`;

CREATE TABLE `soph_supplier` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table soph_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `soph_users`;

CREATE TABLE `soph_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `param_usertype` int(11) DEFAULT NULL,
  `avatar_path` text,
  `password` text,
  `remember_token` text,
  `password_reset_token` text,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `auth_key` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `soph_users` WRITE;
/*!40000 ALTER TABLE `soph_users` DISABLE KEYS */;

INSERT INTO `soph_users` (`id`, `name`, `email`, `param_usertype`, `avatar_path`, `password`, `remember_token`, `password_reset_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `flag`, `auth_key`)
VALUES
	(1,'Hanafi','hanafi@gmail.com',7,'/img/avatar/default-avatar.jpg','$2y$13$554Wo1DDuN5nHHelFgnCPuiK9ICJQ/U5glCt8.q3M.OB28BvjwrzO',NULL,NULL,0,NULL,NULL,'2017-03-03 23:05:50','2017-03-03 23:05:50',0,'XHQuiAzt7P7nYYxPlOqZUSpmspubPgBH');

/*!40000 ALTER TABLE `soph_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sph_brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sph_brands`;

CREATE TABLE `sph_brands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
