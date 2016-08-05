-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2015 at 11:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `talhub1`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `job_skills` varchar(200) DEFAULT NULL,
  `job_desc` varchar(1000) NOT NULL,
  `cand_sel` varchar(100) DEFAULT NULL,
  `job_status` varchar(200) NOT NULL,
  `loc_pref` varchar(50) NOT NULL,
  `exp_req` varchar(15) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `comp_id`, `post_date`, `job_name`, `job_skills`, `job_desc`, `cand_sel`, `job_status`, `loc_pref`, `exp_req`) VALUES
(25, 'comp1', '2015-06-06', 'Web Developer', 'Mobile Development', 'Required Web Developer skilled in PHP and SQL', NULL, 'Open', 'washington', '1-2 yrs'),
(26, 'comp1', '2015-06-06', 'Stack Dev', 'UX/UI Design', 'Job Specification', NULL, 'Open', 'New York', '5yrs'),
(27, 'comp1', '2015-06-06', 'Android Developer', 'Mobile Development', 'Required Android Developer', NULL, 'Open', 'washington', '1-2 yrs'),
(28, 'comp1', '2015-06-06', 'Stack Dev1', 'Front End Development', 'HTML Developer', NULL, 'Open', 'Seattle', '5yrs'),
(29, 'comp1', '2015-06-06', 'sdfdsf', 'Front End Development', 'fsdfsf', NULL, 'Open', 'sdfds', 'sdfs'),
(30, 'comp1', '2015-06-06', 'Android Developer', 'Mobile Development', 'dsfdsf', NULL, 'Open', 'sdfsd', '1-2 yrs'),
(31, 'comp1', '2015-06-06', 'Web Programmer', 'Front End Development', 'Web Programmer', NULL, 'Open', 'New York', '3-4yrs'),
(32, 'comp1', '2015-06-06', 'Stack Dev', 'Cloud Computing', 'hello', NULL, 'Open', 'washington', '5yrs'),
(33, 'comp1', '2015-06-06', 'Android Developer', 'Cloud Computing', 'sdfsf', NULL, 'Open', 'Seattle', '1-2 yrs'),
(34, 'comp1', '2015-06-06', 'Stack Dev', 'Front End Development', 'sdfdsf', NULL, 'Open', 'asdfds', '1-2 yrs'),
(35, 'comp1', '2015-06-06', 'Web Programmer', 'Cloud Computing', 'sdfds', NULL, 'Open', 'sdfds', '1-2 yrs');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_table`
--

CREATE TABLE IF NOT EXISTS `quiz_table` (
  `ques_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `c_id` varchar(50) NOT NULL,
  `q_date` date NOT NULL,
  `q_time` time NOT NULL,
  `quiz_name` varchar(25) DEFAULT NULL,
  `ques_topic` varchar(25) DEFAULT NULL,
  `questions` varchar(500) NOT NULL,
  `choice1` varchar(100) NOT NULL,
  `choice2` varchar(100) NOT NULL,
  `choice3` varchar(100) NOT NULL,
  `choice4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`ques_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quiz_table`
--

INSERT INTO `quiz_table` (`ques_id`, `c_id`, `q_date`, `q_time`, `quiz_name`, `ques_topic`, `questions`, `choice1`, `choice2`, `choice3`, `choice4`, `answer`) VALUES
(2, 'comp1', '0000-00-00', '00:00:00', '', 'SQL', 'Which of the following SQL clauses is used to select data from 2 or more tables?', 'HAVING', 'WHERE', 'JOIN', 'AND', 'JOIN'),
(3, 'comp1', '0000-00-00', '00:00:00', NULL, 'SQL', 'Which SQL statement selects all rows from a table called Products and orders the result set by ProductID column?', 'SELECT * FROM Products ORDERED BY ProductID', 'SELECT ProductID FROM Products', 'SELECT * FROM Products WHERE ProductID > 200', 'SELECT * FROM Products ORDER BY ProductID', 'SELECT * FROM Products ORDER BY ProductID'),
(4, 'comp1', '0000-00-00', '00:00:00', NULL, 'SQL', 'The HAVING clause can be used only with ...', 'DELETE clause', 'JOIN clause', 'INSERT clause', 'SELECT clause', 'SELECT clause'),
(5, 'comp1', '0000-00-00', '00:00:00', NULL, 'SQL', 'What does the SQL FROM clause do?', 'Specifies a search condition.', 'Specifies the columns we are retrieving', 'Specifies the tables to retrieve rows from.', 'Specifies the tables to retrieve rows from', 'Specifies the tables to retrieve rows from');

-- --------------------------------------------------------

--
-- Table structure for table `qui_register`
--

CREATE TABLE IF NOT EXISTS `qui_register` (
  `s_email` varchar(255) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tal_comp`
--

CREATE TABLE IF NOT EXISTS `tal_comp` (
  `comp_id` varchar(25) NOT NULL,
  `c_loc` varchar(50) NOT NULL,
  `c_phone` bigint(50) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `comp_pass` varchar(25) NOT NULL,
  `comp_desc` varchar(500) NOT NULL,
  `comp_level` varchar(20) NOT NULL,
  `c_email` varchar(25) NOT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tal_comp`
--

INSERT INTO `tal_comp` (`comp_id`, `c_loc`, `c_phone`, `comp_name`, `comp_pass`, `comp_desc`, `comp_level`, `c_email`) VALUES
('comp1', 'Seattle', 4089096789, 'company', 'hello', 'comp1 was started in 1990..', '', 'kmuthu@scu.edu');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `c_id` varchar(25) NOT NULL,
  `job_id` int(11) NOT NULL,
  `cut_off` int(11) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `start_date`, `start_time`, `c_id`, `job_id`, `cut_off`) VALUES
(34, '2015-06-17', '01:01:00', 'comp1', 25, 100),
(35, '2015-06-15', '13:01:00', 'comp1', 26, 100),
(36, '2015-06-06', '10:10:00', 'comp1', 27, 20),
(37, '2015-06-07', '01:01:00', 'comp1', 28, 20),
(38, '2015-06-17', '09:13:00', 'comp1', 29, 70),
(39, '2015-06-16', '01:01:00', 'comp1', 30, 100),
(40, '2015-06-30', '05:07:00', 'comp1', 31, 10),
(41, '2015-06-08', '01:01:00', 'comp1', 32, 100),
(42, '2015-06-08', '01:01:00', 'comp1', 33, 10),
(43, '2015-06-09', '08:01:00', 'comp1', 34, 15),
(44, '2015-06-16', '01:01:00', 'comp1', 35, 10);

-- --------------------------------------------------------

--
-- Table structure for table `testtaken`
--

CREATE TABLE IF NOT EXISTS `testtaken` (
  `s_email` varchar(255) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `skillset` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `skillset`) VALUES
('sharadha7290@gmail.com', 'thenu', 'Mobile Development,Front End Development,PHP'),
('govindananusha@gmail.com', 'anusha', 'Cloud Computing,Front End Development,PHP'),
('kavithamuthu14@gmail.com', 'kavitha', 'Cloud Computing,Front End Development,Mobile Development');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phoneno` varchar(255) DEFAULT NULL,
  `skillset` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`firstname`, `lastname`, `email`, `password`, `phoneno`, `skillset`) VALUES
('sramaswamy', 'sramaswamy', 'sharadha7290@gmail.com', 'Thenu@7290', '4082073327', 'Front End Development,PHP');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
