-- Gift The Code -- CreateTables.sql
-- Jody Kirton
-- Create tables for donation inventory, foreign key references included.


CREATE TABLE IF NOT EXISTS `gtc_volunteers` (
  `id_volunteer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_volunteer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `gtc_item_categories` (
  `id_item_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `img` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_item_category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `gtc_items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_item_category` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `requested` bit(1) NOT NULL DEFAULT b'0',
  `priority` varchar(6) NOT NULL DEFAULT 'Low',
  PRIMARY KEY (`id_item`),
  KEY `fk_id_item_category` (`id_item_category`),
  KEY `fk_updated_by` (`updated_by`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
