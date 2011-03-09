-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2011 at 05:50 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `musc_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `user_id` int(3) NOT NULL,
  `serial_app` longtext NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`user_id`, `serial_app`) VALUES
(2, 'a:19:{s:2:"id";s:1:"2";s:10:"inst_areas";a:3:{i:0;s:11:"composition";i:1;s:9:"musc_theo";i:2;s:9:"musc_perf";}s:9:"ensembles";a:2:{i:0;s:10:"aggie_band";i:1;s:10:"symph_band";}s:9:"int_minor";s:9:"Computers";s:8:"curr_gpa";s:3:"4.0";s:8:"perf_aud";s:3:"mar";s:11:"high_school";s:6:"Temple";s:10:"grad_month";s:2:"02";s:9:"grad_year";s:4:"2012";s:8:"app_tamu";s:2:"no";s:7:"sat_act";s:4:"1500";s:9:"curr_inst";s:4:"None";s:8:"curr_maj";s:4:"None";s:16:"music_background";s:14:"This is a test";s:14:"music_interest";s:10:"Do I work?";s:11:"music_goals";s:5:"Maybe";s:13:"awards_honors";s:4:"Yes?";s:12:"correct_info";s:12:"correct_info";s:10:"submit_app";s:7:"Submit!";}');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'reviewers', 'Members of Audition Committee'),
(3, 'applicants', 'Applicants'),
(4, 'recommenders', 'People making recommendations');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` mediumint(8) unsigned NOT NULL,
  `ip_address` char(16) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `remember_code`, `created_on`, `last_login`, `active`) VALUES
(1, 1, '127.0.0.1', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', NULL, NULL, 1268889823, 1299692970, 1),
(2, 3, '0.0.0.0', 'aaron eaton', '5e4a9044ee7f2bf054aa3bc36ff45d227f11495e', NULL, 'aaron.eaton@tamu.edu', NULL, NULL, NULL, 1299018892, 1299604314, 1),
(3, 4, '0.0.0.0', 'recommend me', 'c17e0903c3ad0b2ff16f47a55528dbd763006e24', NULL, 'rec@rec.com', NULL, NULL, NULL, 1299020729, 1299535556, 1),
(4, 2, '0.0.0.0', 'mister reviewer', '8a96486df690f84f31009c0e0dd0f40ff8d876ee', NULL, 'reviewer@tamu.edu', NULL, NULL, NULL, 1299020815, 1299085976, 1),
(5, 3, '0.0.0.0', 'test user', 'b385fc3308a80d1a4daaf101d4ff01e971fb104e', NULL, 'test@tester.com', NULL, NULL, NULL, 1299693028, 1299693028, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, 2, 'Aaron', 'Eaton', 'TAMU', '979-353-0928'),
(3, 3, 'Recommend', 'Me', 'School', '888-888-8888'),
(4, 4, 'Mister', 'Reviewer', 'TAMU', '888-888-8888'),
(5, 5, 'Test', 'User', 'Test', '888-888-8888');
