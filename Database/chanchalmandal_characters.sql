-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2019 at 12:03 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chanchalmandal_characters`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `height` smallint(6) NOT NULL,
  `mass` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `hair_color` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `skin_color` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `eye_color` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `birth_year` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `homeworld_name` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `species_name` varchar(100) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `height`, `mass`, `hair_color`, `skin_color`, `eye_color`, `birth_year`, `gender`, `created`, `updated`, `homeworld_name`, `species_name`) VALUES
(1, 'Luke Skywalker', 172, '77', 'blond', 'fair', 'blue', '19BBY', 'male', '2019-07-16 11:56:43', '2019-07-16 15:09:45', 'Tatooine', 'Human'),
(2, 'C-3PO', 167, '75', 'n/a', 'gold', 'yellow', '112BBY', 'female', '2019-07-16 12:17:19', '2019-07-16 16:31:55', 'Pluto', 'Kangaroo'),
(3, 'R2-D2', 96, '32', 'n/a', 'white, blue', 'red', '33BBY', 'female', '2019-07-16 14:20:50', '2019-07-16 16:31:55', 'Venus', 'Chimpanzee'),
(4, 'Darth Vader', 202, '136', 'none', 'white', 'yellow', '41.9BBY', 'male', '2019-07-16 14:33:54', '2019-07-16 15:09:45', 'Tatooine', 'Human'),
(5, 'Leia Organa', 150, '49', 'brown', 'light', 'brown', '19BBY', 'female', '2019-07-16 14:41:25', '2019-07-16 15:09:45', 'Alderaan', 'Human'),
(6, ' Owen Lars', 178, ' 120', ' brown, grey', ' light', ' blue', ' 52BBY', ' male', '2019-07-16 14:52:16', '2019-07-16 15:09:45', ' Tatooine', ' Human'),
(7, 'Beru Whitesun lars', 165, '75', 'brown', 'light', 'blue', '47BBY', 'female', '2019-07-16 21:09:04', '2019-07-16 21:09:04', 'Tatooine', 'Human');

-- --------------------------------------------------------

--
-- Table structure for table `characterupdates`
--

CREATE TABLE `characterupdates` (
  `id` mediumint(9) NOT NULL,
  `name` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `height` smallint(6) NOT NULL,
  `mass` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `hair_color` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `skin_color` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `eye_color` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `birth_year` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8_estonian_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `homeworld_name` varchar(100) COLLATE utf8_estonian_ci NOT NULL,
  `species_name` varchar(100) COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `characterupdates`
--

INSERT INTO `characterupdates` (`id`, `name`, `height`, `mass`, `hair_color`, `skin_color`, `eye_color`, `birth_year`, `gender`, `created`, `homeworld_name`, `species_name`) VALUES
(2, 'C-3PO', 167, '75', 'n/a', 'gold', 'yellow', '112BBY', 'female', '2019-01-02 07:59:10', 'Pluto', 'Kangaroo'),
(3, 'R2-D2', 96, '32', 'n/a', 'white, blue', 'red', '33BBY', 'female', '2019-01-02 07:59:10', 'Venus', 'Chimpanzee'),
(13, 'Chewbacca', 228, 'testing!', 'brown', 'unknown', 'blue', '200BBY', 'male', '2019-01-02 07:59:40', 'Mars', 'Wombat'),
(19, 'Yoda', 66, '17', 'white', 'green', 'brown', '896BBY', 'male', '2019-01-02 07:59:40', 'Saturn', 'Elephant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `characterupdates`
--
ALTER TABLE `characterupdates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `characterupdates`
--
ALTER TABLE `characterupdates`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
