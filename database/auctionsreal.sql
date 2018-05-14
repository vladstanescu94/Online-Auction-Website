-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 05, 2018 at 07:24 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u_vladstanescu`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(256) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Fine Art'),
(2, 'Jewelry'),
(3, 'Collectibles');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(256) NOT NULL,
  `product_description` varchar(256) DEFAULT NULL,
  `product_image` varchar(256) DEFAULT NULL,
  `product_category` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_value` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `ProductsCategories` (`product_category`),
  KEY `Users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_image`, `product_category`, `user_id`, `product_value`) VALUES
(60, 'Inel cu diamant', '1000 K', '11328b7cc0beaa08153d6511f4f6b02254fb9b1cc42259774207466845216db8', 2, 5, 10),
(63, 'Carte Pokemon ', 'Pika', '5d61c0778a65e20222fe31c428cfde0c574c3a76c96db837700920ffc37b4fa7', 3, 5, 231),
(64, 'Mona Lisa', 'Mona Lisa, oil painting on a poplar wood panel by the Italian painter, draftsman, sculptor, architect, and engineer Leonardo da Vinci, probably the worldâ€™s most-famous painting.', 'e60e8b58e278fe5e8eea0c7c80749019d0d0d5737f52e93f739bc7b2ae71f37e', 1, 5, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_first` varchar(256) NOT NULL,
  `user_last` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_uid` varchar(256) NOT NULL,
  `user_pwd` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES
(1, 'Vlad', 'Stanescu', 'vladstanescu94@gmail.com', 'vladstanescu94', '$2y$10$Dw0CLEzNUQ6ONXW3RzeTKuUwFQiADqvio8jZsLbR4nRUbRHSRGxIS'),
(5, 'admin', 'admin', 'admin@sold.com', 'admin', '$2y$10$x8kNVq3Mx5H6N38qUf6rueihVJHfVJqGay7szWHe./GzCMWv1ieGm'),
(6, 'Diana', 'Marcu', 'diananicoleta15@gmail.com', 'diananicoleta15', '$2y$10$a7d9dkUDC6j7kZkk0G2CjuGF075JVHGFx548DmK5wMiwd7gEI8oK2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `ProductsCategories` FOREIGN KEY (`product_category`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
