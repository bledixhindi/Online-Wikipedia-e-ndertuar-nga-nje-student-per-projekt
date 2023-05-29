-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 06:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_wikipedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `category`, `image`, `pdf`) VALUES
(1, 'Article 1', 'This is the content of Article 1.', 'Test', NULL, NULL),
(2, 'Article 2', 'This is the content of Article 2.', NULL, NULL, NULL),
(3, 'Article 3', 'This is the content of Article 3.', NULL, NULL, NULL),
(4, 'Article 4', 'This is the content of Article 4.', NULL, NULL, NULL),
(5, 'Introduction to Cryptocurrency', 'Cryptocurrency is a digital or virtual form of currency that...', NULL, NULL, NULL),
(6, 'Benefits of Blockchain Technology', 'Blockchain technology is the underlying technology...', NULL, NULL, NULL),
(7, 'Understanding Bitcoin', 'Bitcoin is the first and most well-known cryptocurrency...', NULL, NULL, NULL),
(8, 'Smart Contracts in Ethereum', 'Ethereum is a blockchain-based platform that enables...', NULL, NULL, NULL),
(9, 'Introduction to Python Programming', 'Python is a versatile and popular programming language...', NULL, NULL, NULL),
(10, 'Web Development with HTML and CSS', 'HTML and CSS are the building blocks of web development...', NULL, NULL, NULL),
(11, 'JavaScript Fundamentals', 'JavaScript is a dynamic programming language used...', NULL, NULL, NULL),
(12, 'Introduction to Object-Oriented Programming', 'Object-oriented programming (OOP) is a programming paradigm...', NULL, NULL, NULL),
(13, 'bledi', 'xhindi', NULL, NULL, NULL),
(14, 'bledi', 'aaa', NULL, '', NULL),
(15, 'asddd', 'sdaaaaaaa', NULL, '', NULL),
(16, 's', 's', NULL, 'images/cool-minimalist-7704136uwjjvm6sn.jpg', NULL),
(17, 'gg', 'gg', NULL, '', NULL),
(18, 'a', 'a', 'Category 1', NULL, NULL),
(19, 'adsads', 'aaaa', 'Category 2', NULL, NULL),
(20, 'acd', 'dsasd', 'Category 1', NULL, NULL),
(21, 'aaa', 'aaa', 'Category 1', NULL, 'uploads/6473c93337b0b.pdf'),
(22, 'bledi', 'aaa', 'Category 1', NULL, 'uploads/6473c93c5d122.pdf'),
(23, 'a', 'a', 'Category 1', NULL, 'uploads/6473c9c8de056.pdf'),
(24, 'Cryptocurrency Basics', 'Content of the article explaining the basics of cryptocurrencies and how they work.', 'Crypto', NULL, NULL),
(25, 'Introduction to Blockchain Technology', 'Content of the article providing an introduction to blockchain technology and its applications.', 'Crypto', NULL, NULL),
(26, 'Smart Contracts in Ethereum', 'Content of the article discussing smart contracts and their implementation in the Ethereum blockchain.', 'Crypto', NULL, NULL),
(27, 'Programming Languages for Blockchain Development', 'Content of the article exploring programming languages commonly used for developing blockchain applications.', 'Programming', NULL, NULL),
(28, 'Building a Decentralized Application (DApp)', 'Content of the article guiding readers on building a decentralized application using blockchain technology.', 'Programming', NULL, NULL),
(29, 'Secure Coding Practices in Cryptocurrency Development', 'Content of the article highlighting the importance of secure coding practices in cryptocurrency development.', 'Crypto', NULL, NULL),
(30, 'Introduction to Solidity Programming', 'Content of the article introducing Solidity, a programming language for developing smart contracts on the Ethereum platform.', 'Programming', NULL, NULL),
(31, 'Exploring Blockchain Use Cases in Supply Chain Management', 'Content of the article discussing the potential use cases of blockchain technology in supply chain management.', 'Crypto', NULL, NULL),
(32, 'Introduction to Cryptography', 'Content of the article providing an overview of cryptographic concepts and their applications in the crypto industry.', 'Crypto', NULL, NULL),
(33, 'Building a Cryptocurrency Trading Bot', 'Content of the article guiding readers on building a cryptocurrency trading bot.', 'Crypto', NULL, NULL),
(34, 'Transylvanian Plateau', 'The plateau lies within and takes its name from the historical region of Transylvania, and is almost entirely surrounded by the Eastern, Southern and Romanian Western branches of the Carpathian Mountains. The area includes the Transylvanian Plain.\r\n\r\nIt is improperly called a plateau, for it does not possess extensive plains, but is formed of a network of valleys of various size, ravines and canyons, united together by numerous small mountain ranges, which attain a height of 150–250 m (490–820 ft) above the altitude of the valley.\r\n\r\nThe plateau has a continental climate. Temperature varies a great deal in the course of a year, with warm summers contrasted by very cold winters. Vast forests cover parts of the plateau and the mountains. The mean elevation is 300–500 m (980–1,640 ft).', 'Category 1', NULL, 'uploads/6474bb5b5fc01.pdf'),
(35, 'Artikull test', 'Permbajtja', 'Category 1', NULL, 'uploads/6474ce86ef43f.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Crypto'),
(2, 'Category 2'),
(3, 'Category 3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'xhindi bledi', 'xhindi9@Gmail.com', 'xhindi2020'),
(2, 'xhindi bledi', 'xhindi19@Gmail.com', 'xhindi2020'),
(3, 'bledi', 'xhindi9@Gmail.com', 'xhindi2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
