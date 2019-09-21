create database aics_product;

use aics_product;

CREATE TABLE `products` (
  `id` int(255) NOT NULL auto_increment,
  `pname` varchar(100) NOT NULL,
  `pdescription` varchar(255) NOT NULL,
  `pprice` int(255) NOT NULL,
  `pquantity` int(255) NOT NULL,
  PRIMARY KEY  (`id`)
);