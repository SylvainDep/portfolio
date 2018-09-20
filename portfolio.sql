-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 19, 2018 at 09:53 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `mail`, `admin`, `password`) VALUES
(1, 'sylvaindepardieu78@gmail.com', 'Sylvain', '$2y$10$Fl4I60t1KMkJ4ydoDhHWeOQ81My9bGs0bdvn49cuX7oM2QNAEnDOm');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `mail`, `phone`) VALUES
(1, 'Langenfelder Damm 70, 22525 Hamburg-Stellingen', 'sylvaindepardieu78@gmail.com', '+49123456789');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `period` varchar(255) NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `topic`, `title`, `description`, `period`, `location`) VALUES
(1, 'education', 'Baccalaureat ES', 'Focus in English Language', '2007', 'Villiers St Frederic (France)'),
(2, 'education', 'Applicated language Licence', 'History, use and evolution of the English language through time and cultural background', '2007', 'Sorbonne Nouvelle - Paris 5 (France)'),
(4, 'education', '(Online-) store management degree', 'Running and managing a physical or online store on various areas (resources, stocks, marketing...)', '2011', 'Levallois-Perret (France)'),
(5, 'experience', 'Local Community Manager', 'Various pieces of communication (Blog & chat along with physical support) for a train station in Paris.', '2011', 'Paris Austerlitz (France)'),
(6, 'experience', 'Community support', 'Providing direct answers, writing & videobroadcasting help resources for the Jimdo CMS.', '2014', 'Jimdo - Hamburg (Germany)'),
(7, 'experience', 'SEO Writer Allrounder', 'Content and text optimization on french-speaking pages, both commercials and help resources', '2016', 'Jimdo - Hamburg (Germany)');

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

CREATE TABLE `expertise` (
  `id` int(11) NOT NULL,
  `picture` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `picture`, `title`, `description`) VALUES
(1, '<i class=\"fas fa-laptop\"></i>', 'Webdesign and UI', 'Find the perfect layout and do not elude any relevant information you want your customers to have.'),
(2, '<i class=\"fas fa-code\"></i>', 'Development', 'A nice AND clean sourced website will make it more accessible and easy-going than ever.'),
(3, '<i class=\"fab fa-google\"></i>', 'SE Optimization', 'Making your website optimized for Google & co will boost your visibility, and your success.');

-- --------------------------------------------------------

--
-- Table structure for table `intro_text`
--

CREATE TABLE `intro_text` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `intro_text`
--

INSERT INTO `intro_text` (`id`, `description`) VALUES
(1, 'Hello, I\'m Sylvain, freshly introduced into the world of web development. After studying foreign languages and (online-)store management, I gained my experience at Jimdo as Community Supporter. My overview of various topics of websites brought me meaningful insight and understanding of what make an online interface successful, as well as what are real needs.');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `languages` varchar(255) NOT NULL,
  `language_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `languages`, `language_level`) VALUES
(1, 'French', 'Native'),
(2, 'English', 'Fluent'),
(3, 'German', 'Conversational'),
(4, 'Spanish', 'Improving');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `skill_level` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`id`, `skill_name`, `skill_level`) VALUES
(1, 'Design', 72),
(2, 'SEO', 95),
(3, 'Development', 75),
(4, 'Communication', 43);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `link`, `category`) VALUES
(1, 'http://webagency.sylvaindepardieu.fr/', 'website'),
(2, 'http://ot-strasbourg.sylvaindepardieu.fr/', 'website'),
(3, 'http://velov.sylvaindepardieu.fr/', 'website'),
(4, 'https://fr.jimdo.com/', 'seo'),
(5, 'http://aide.jimdo.com/', 'content');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intro_text`
--
ALTER TABLE `intro_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intro_text`
--
ALTER TABLE `intro_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
