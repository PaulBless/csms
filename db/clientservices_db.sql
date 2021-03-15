-- Written By: Paul Eshun
-- Role: Web & Software Developer
-- Email: eshunbless1@gmail.com
-- Linkedin: https://linkedin.com/in/paul-eshun


-- Description: Database Script for Client Service Management System
-- Client: MMDA's
-- Case Study: Upper West Akim District Assembly, Adeiso


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientservices_db`
--

-- --------------------------------------------------------
-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users`(
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;


-- Table structure for table `client`
--
CREATE TABLE IF NOT EXISTS `clients`(
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `location_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

-- Table structure for table `locations`
--
CREATE TABLE IF NOT EXISTS `locations`(
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `loc_name` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------------------


-- Table structure for table `enquiry_types`
--
CREATE TABLE IF NOT EXISTS `enquiry_type`(
  `etid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  PRIMARY KEY (`etid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------


-- Table structure for table `enquiries`
--
CREATE TABLE IF NOT EXISTS `enquiries` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `et_id` int(11) NOT NULL, -- enquiry_type id foreign_key
  `dept_id` int(11) NOT NULL, -- dept_id foreign key
  `client_id` int(11) NOT NULL, -- client_id foreign key
  `user_id` int(11) NOT NULL, -- user_id foreign key
  -- `enquiryType` varchar(50) NOT NULL,
  `reason` varchar(1500) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------

-- Table structure for table `departments`
--
CREATE TABLE IF NOT EXISTS `departments`(
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `description` varchar(60) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- -----------------------------------------------------------

-- Table structure for table `admin`
--
CREATE TABLE IF NOT EXISTS `sub_category`(
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL, -- dept_id foreign key
  `sub_dept_name` varchar(60) NOT NULL,
  PRIMARY KEY (`scid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------------------------------------------

-- Table structure for table `settings`
--
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `logo` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------

