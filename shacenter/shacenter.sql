-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 08:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shacenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`id`, `username`, `password`) VALUES
(1, 'vip sha dintal', '37123c1772eb75e41d8f1a5a265299411100f61abf678353979171a0f2bd710b'),
(2, 'sha centar', '22af88bb1fe7ae53a9b3302d676636f1fcda820d6a5f480bfbda31243211c7ba');

-- --------------------------------------------------------

--
-- Table structure for table `doctortable`
--

CREATE TABLE `doctortable` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctortable`
--

INSERT INTO `doctortable` (`id`, `name`) VALUES
(1, 'د.شارا'),
(2, 'د.سەیف'),
(3, 'د.رعد');

-- --------------------------------------------------------

--
-- Table structure for table `editsicktables`
--

CREATE TABLE `editsicktables` (
  `id` int(11) NOT NULL,
  `sickid` int(11) NOT NULL,
  `date` date NOT NULL,
  `problem` longtext NOT NULL,
  `firstmoney` varchar(255) NOT NULL,
  `lastmoney` varchar(255) NOT NULL,
  `visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editsicktables`
--

INSERT INTO `editsicktables` (`id`, `sickid`, `date`, `problem`, `firstmoney`, `lastmoney`, `visit`) VALUES
(1, 1, '2022-02-17', 'dfdfd', '1300004545', '130000hgh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `goods` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `typemoney` varchar(255) NOT NULL,
  `summoney` bigint(20) NOT NULL,
  `continued` varchar(150) NOT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `goods`, `material`, `company`, `date`, `typemoney`, `summoney`, `continued`, `notes`) VALUES
(1, 'maw', '', 'new dent', '2022-01-26', '', 123000, 'واصل', ''),
(2, 'marketyuy', '', '', '2022-01-26', '', 10000, 'واصل', ''),
(3, 'maw', '', 'drawn', '2022-01-26', '', 46, 'قەرز', ''),
(4, 'barman', '', '', '2022-01-26', '', 155000, 'واصل', ''),
(5, 'maw', '', 'ivory', '2022-01-26', '', 25000, 'واصل', ''),
(6, 'market', '', '', '2022-01-26', '', 25000, 'واصل', ''),
(7, 'ber', '', 'new dent', '2022-01-26', '', 50000, 'واصل', ''),
(10, 'oto klef', '', 'krawn dent', '2022-01-29', '', 1050, 'قەرز', 'biqe 550$'),
(11, 'mahash', '', 'danial', '2022-01-31', '', 450, 'واصل', ''),
(12, 'نان', '', 'دسد', '2022-02-15', '', 0, 'قەرز', 'sss'),
(13, 'نان', '', 'دانیال', '2022-02-17', '', 0, 'واصل', 'sss'),
(14, 'ئاف', '', 'دسدfdfdf', '2022-02-23', '', 0, 'قەرز', 'sss'),
(16, 'ئاف', '', 'دسد', '2022-02-15', '', 0, 'قەرز', 'sss'),
(17, 'ئاف', '', 'دسد', '2022-02-25', '', 0, 'واصل', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `sickname` varchar(255) NOT NULL,
  `teethtype` varchar(255) NOT NULL,
  `teethprice` varchar(255) NOT NULL,
  `allsum` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `namelab` varchar(255) NOT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `sickname`, `teethtype`, `teethprice`, `allsum`, `date`, `namelab`, `notes`) VALUES
(1, 'mansur', 'emax pawdar', '40', '1000000', '2022-01-30', 'dremsti', '');

-- --------------------------------------------------------

--
-- Table structure for table `sicktable`
--

CREATE TABLE `sicktable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `nameofdoctor` varchar(200) NOT NULL,
  `problem` longtext NOT NULL,
  `firstmoney` varchar(255) NOT NULL,
  `lastmoney` varchar(255) NOT NULL,
  `visit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sicktable`
--

INSERT INTO `sicktable` (`id`, `name`, `phone`, `date`, `nameofdoctor`, `problem`, `firstmoney`, `lastmoney`, `visit`) VALUES
(3, 'mansur', '07504453478', '2022-01-30', 'د.سەیف', 'hoolyod smail', '2200$', '700$', 1),
(4, 'dladd', '767', '2022-01-20', 'د.شارا', '67676uhhjg', '66767', '67676676', 1),
(5, 'razwan shwan', '07504762726', '2022-01-31', 'د.شارا', 'shwshtn', '25000', '25000', 1),
(6, 'sa7d', '07504568020', '2022-02-01', 'د.سەیف', '1damar bren', '130000', '130000', 1),
(7, 'sezar ', '07504262444', '2022-02-01', 'د.شارا', 'shushing', '50000', '50000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id` int(11) NOT NULL,
  `sickname` varchar(255) NOT NULL,
  `doctorname` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `cost` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `sickname`, `doctorname`, `date`, `cost`, `target`) VALUES
(1, 'dlbrin', 'د.شارا', '2022-02-13', '20000', 'sdsd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctortable`
--
ALTER TABLE `doctortable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editsicktables`
--
ALTER TABLE `editsicktables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sicktable`
--
ALTER TABLE `sicktable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctortable`
--
ALTER TABLE `doctortable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `editsicktables`
--
ALTER TABLE `editsicktables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sicktable`
--
ALTER TABLE `sicktable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
