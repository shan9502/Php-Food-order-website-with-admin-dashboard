-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.20-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for food-order
CREATE DATABASE IF NOT EXISTS `food-order` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `food-order`;

-- Dumping structure for table food-order.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table food-order.tbl_admin: ~3 rows (approximately)
INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
	(9, 'Sasha Mendez', 'goxemyde', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
	(10, 'Vijay Thapa', 'vijaythapa', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
	(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- Dumping structure for table food-order.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table food-order.tbl_category: ~3 rows (approximately)
INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
	(4, 'Pizza', 'Food_Category_790.jpg', 'Yes', 'Yes'),
	(5, 'Burger', 'Food_Category_344.jpg', 'Yes', 'Yes'),
	(6, 'MoMo', 'Food_Category_77.jpg', 'Yes', 'Yes'),
	(8, 'Quia est ipsum id id', 'Food_Category_929.jpg', 'No', 'Yes');

-- Dumping structure for table food-order.tbl_food
CREATE TABLE IF NOT EXISTS `tbl_food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumping data for table food-order.tbl_food: ~8 rows (approximately)
INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
	(3, 'Dumplings Specials', 'Chicken Dumpling with herbs from Mountains', 5.00, 'Food-Name-3649.jpg', 6, 'Yes', 'Yes'),
	(4, 'Best Burger', 'Burger with Ham, Pineapple and lots of Cheese.', 4.00, 'Food-Name-6340.jpg', 5, 'Yes', 'Yes'),
	(5, 'Smoky BBQ Pizza', 'Best Firewood Pizza in Town.', 59.00, 'Food-Name-8298.jpg', 4, 'No', 'Yes'),
	(6, 'Sadeko Momo', 'Best Spicy Momo for Winter', 6.00, 'Food-Name-7387.jpg', 6, 'Yes', 'Yes'),
	(7, 'Mixed Pizza', 'Pizza with chicken, Ham, Buff, Mushroom and Vegetables', 10.00, 'Food-Name-7833.jpg', 4, 'Yes', 'Yes'),
	(8, 'Sed ipsum cillum in', 'Sed aut officiis qui', 52.00, '', 5, 'No', 'Yes'),
	(10, 'CreamCake', 'asdfcdsf', 12.00, 'Food-Name-1412.jpg', 8, 'Yes', 'Yes'),
	(11, 'Naan Burger', 'sdfgsdg', 50.00, 'Food-Name-5919.jpg', 5, 'Yes', 'Yes');

-- Dumping structure for table food-order.tbl_order
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table food-order.tbl_order: ~3 rows (approximately)
INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
	(1, 'Sadeko Momo', 6.00, 3, 18.00, '2020-11-30 03:49:48', 'Cancelled', 'Bradley Farrell', '+1 (576) 504-4657', 'zuhafiq@mailinator.com', 'Duis aliqua Qui lor'),
	(2, 'Best Burger', 4.00, 4, 16.00, '2020-11-30 03:52:43', 'Delivered', 'Kelly Dillard', '+1 (908) 914-3106', 'fexekihor@mailinator.com', 'Incidunt ipsum ad d'),
	(3, 'Mixed Pizza', 10.00, 2, 20.00, '2020-11-30 04:07:17', 'Delivered', 'Jana Bush', '+1 (562) 101-2028', 'tydujy@mailinator.com', 'Minima iure ducimus');

-- Dumping structure for table food-order.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `numbers` varchar(250) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(500) NOT NULL,
  `pincode` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`numbers`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id` (`numbers`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table food-order.tbl_user: ~1 rows (approximately)
INSERT INTO `tbl_user` (`id`, `name`, `numbers`, `email`, `address`, `pincode`, `password`) VALUES
	(10, 'shan', '8262559865', 'sanoobarshan22@gamil.com', '1341', 123123, '4297f44b13955235245b2497399d7a93'),
	(9, 'Sanoobar shan', '9400519502', 'sea@asd.com', 'alung(h),randathani po,676510', 676514, '4297f44b13955235245b2497399d7a93');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
