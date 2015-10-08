-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2015 at 04:39 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Lenovo'),
(4, 'Dell'),
(5, 'Hp');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Mobiles'),
(2, 'Laptops'),
(3, 'Games');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 2, 5, 'HP Pavilion 1600', 1000, '<p>Brand New</p>', 'hplaptop.png', 'hp , laptop , Brand new'),
(2, 2, 1, 'Macbook 12 Early2015', 500, '<p>Used for 2 months</p>', 'apple_12_macbook_early_2015_.jpg', 'Apple , laptops, macbook'),
(3, 1, 1, 'iPhone6 plus ', 200, '<p>Brand New</p>', 'iphone 6 plus.jpg', 'Apple, mobiles, iPhone'),
(4, 2, 3, 'Lenovo touch u530', 400, '<p>Brand New</p>', 'lenovo-laptop-u530-touch-front-2.jpg', 'Lenovo, laptops, New'),
(5, 2, 3, 'Lenovo touch u530aa', 300, '<p>New</p>', 'lenovo-laptop-u530-touch-front-2.jpg', 'New'),
(6, 2, 3, 'Lenovo touch u530aa', 300, '<p>New</p>', 'lenovo-laptop-u530-touch-front-2.jpg', 'New'),
(7, 3, 1, 'Macbook 12 Early2015a', 200, '<p>asda</p>', 'apple_12_macbook_early_2015_.jpg', 'asda'),
(8, 3, 1, 'Macbook 12 Early2015a', 200, '<p>asda</p>', 'apple_12_macbook_early_2015_.jpg', 'asda'),
(9, 3, 1, 'Macbook 12 Early2015a', 200, '<p>asda</p>', 'apple_12_macbook_early_2015_.jpg', 'asda'),
(10, 3, 1, 'Macbook 12 Early2015a', 200, '<p>asda</p>', 'apple_12_macbook_early_2015_.jpg', 'asda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
