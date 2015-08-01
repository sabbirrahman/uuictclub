-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2014 at 08:40 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uuictclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `Event_ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `TimeNDate` datetime NOT NULL,
  `Venue` varchar(100) NOT NULL,
  `Rules` text,
  `LinkName` varchar(100) DEFAULT NULL,
  `Link` text,
  `Description` text NOT NULL,
  `Image` varchar(100) NOT NULL DEFAULT 'img/evntimg.jpg',
  `FirstPlace` varchar(120) DEFAULT NULL,
  `SecondPlace` varchar(120) DEFAULT NULL,
  `ThirdPlace` varchar(120) DEFAULT NULL,
  `EventCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Event_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_ID`, `Title`, `TimeNDate`, `Venue`, `Rules`, `LinkName`, `Link`, `Description`, `Image`, `FirstPlace`, `SecondPlace`, `ThirdPlace`, `EventCreated`) VALUES
(1, 'Wall Magazine', '2012-10-12 15:00:00', 'Building-2, Uttara University', '', 'Photo Galary', '', 'UU ICT Club published their first Wall Magazine on 12th October, 2012. Many student have written Poems, Rhymes, Short Story &amp; Jokes and some of them have shown their talent in painting.', 'events/evt1_qSkWkZsIeT.jpg', '', '', '', '2014-05-02 18:00:00'),
(2, 'Quiz Contes', '2013-04-29 12:10:00', 'CSE Lab-1', 'Number of Questions: 50<br />\r\nTime to Answer Within: 60 Min', 'Photo Galary', 'https://www.facebook.com/media/set/?set=oa.452695938141123&amp;type=1', '50 Questions were given to solve withing 60 Min on a web application based quiz contest.', 'events/evt2_0sjjwqP6RK.jpg', 'UIC-006', 'Tahmina Jui', 'Tamanna Akter', '2014-05-03 18:00:00'),
(3, 'Inter Department Gaming Contest', '2013-04-29 14:30:00', 'CSE Lab-1', '', 'Photo Galary', 'https://www.facebook.com/media/set/?set=oa.449101748500542&amp;type=1', 'The Game was Need for Speed - Mostwanted. It is the best ever racing game ever developed my Electronic Arts. The contest was very interesting and the student enjoyed it a lot.', 'events/evt3_aBFuaIqT8e.jpg', 'Safin Kadri Apurba', 'Shaik Sayed Amir', 'UIC-004', '2014-05-03 18:00:00'),
(4, 'Inter Department Programming Contest', '2013-04-30 11:45:00', 'CSE Lab-1', 'Number of Problems: 6<br />\r\nTime to Solve within: 3 Hours', 'Photo Galary', 'https://www.facebook.com/media/set/?set=oa.453378021406248&amp;type=1', 'This was the first programming contest arrange by Department of Computer Science &amp; Engineering of Uttara University. Five teams with three members in each team competed in the game of logic &amp; algorithms.', 'events/evt4_Hh2Hd0kfbT.jpg', 'Mostwanted, UIC-004, UIC-001, UIC-008', 'Team 3D, UIC-006, UIC-007, UIC-002', 'Team ROS, UIC-022, UIC-015, Md. Shahidullah', '2014-05-03 18:00:00'),
(5, 'Inter Department Photography Contest', '2013-04-30 15:30:00', 'Room No 403, Building-2', '', 'Photo Galary', 'https://www.facebook.com/media/set/?set=oa.452697881474262&amp;type=1', 'The photography contest was judged by: Md. Didarul Islam<br />\r\nCoordinator, Department of EEE<br />\r\nChairman, UU Photographic Society<br />\r\nAbout 18 Photos were submitted.', 'events/evt5_LjHCiNGLcf.jpg', 'UIC-005', 'Md. Hasib', 'UIC-001', '2014-05-03 18:00:00'),
(6, 'Prize Giving Ceremony for UU ICT CLUB Foundation Festival-13', '2013-04-30 16:00:00', 'Room No 403, Building-2', '', 'Photo Galary', 'https://www.facebook.com/media/set/?set=oa.453387288071988&amp;type=1', 'Prizes were given to inspire the winners of:<br />\r\nQuiz Contest<br />\r\nInter Department Photography Contest<br />\r\nInter Department Gaming Contest<br />\r\nInter Department Programming Contest', 'events/evt6_NUolZxRrN4.jpg', '', '', '', '2014-05-03 18:00:00'),
(7, 'Inter Dept. Indoor Gaming Contest - Carom', '2013-10-07 10:00:00', 'Room No 403, Building-2', '', '', '', 'Carom is a joy full game. Thats why UU ICT CLUB have organized a carom competition as a part of the Inter Department Indoor Gaming Contest-2013.', 'events/evt7_S1AmQRCHcv.jpg', '', '', '', '2014-07-29 18:52:16'),
(8, 'Inter Dept. Indoor Gaming Contest - Chess', '2013-10-07 10:00:00', 'CSE Lab-1', '', '', '', 'Chess is the battle of mind. It helps us to increase our concentration power. As a part of the Inter Department Indoor Gaming Contest we have organized Chess competition.', 'events/evt8_Z8fqOTRAFI.jpg', '', '', '', '2014-07-29 19:02:14'),
(9, 'Inter Dept. Indoor Gaming Contest - Table Tennis', '2013-10-08 14:00:00', 'Room No 501, Building-2', '', '', '', 'One of the best indoor games is table tennis. It is loved by both students and teachers. So, we had organized a Table Tennis competition as a part of the Inter Department Indoor Gaming Contest-2013', 'events/evt9_rQifB1YRDc.jpg', '', '', '', '2014-07-29 19:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `gamingcontest`
--

CREATE TABLE IF NOT EXISTS `gamingcontest` (
  `GamerID` int(10) NOT NULL AUTO_INCREMENT,
  `Game` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `StudentID` varchar(12) NOT NULL,
  `Batch` varchar(5) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`GamerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gamingcontest_archive`
--

CREATE TABLE IF NOT EXISTS `gamingcontest_archive` (
  `GamerID` int(10) NOT NULL,
  `Game` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `StudentID` varchar(12) NOT NULL,
  `Batch` varchar(5) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`GamerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamingcontest_archive`
--

INSERT INTO `gamingcontest_archive` (`GamerID`, `Game`, `Name`, `StudentID`, `Batch`, `Department`, `ContactNo`, `eMail`, `RegistrationDate`) VALUES
(1, 'QUIZ', 'Nur Mohammad', 'M21132111015', '25th', 'CSE', '01715377377', 'nurmohammadcse@yahoo.com\n', '2013-02-08 18:00:00'),
(2, 'QUIZ', 'Shaika Sayed Marzia', 'F21132111004', '25th', 'CSE', '01677104084', 'marziashaika@gmail.com', '2013-02-08 18:00:00'),
(3, 'QUIZ', 'Yasna Kadri Emu', 'F21132111012', '25th', 'CSE', '01687249200', 'yasnakadri@yahoo.com', '2013-02-08 18:00:00'),
(4, 'QUIZ', 'Tanzia Rahman', 'F21112111013', '23rd', 'CSE', '01684635656', 'tanziarock1@yahoo.com', '2013-02-08 18:00:00'),
(5, 'QUIZ', 'Eti Akter', 'F21212111007', '26th', 'CSE', '01811111123', 'etiakter33@yahoo.com', '2013-03-20 18:00:00'),
(6, 'QUIZ', 'Tahmina Jui', 'F21212111008', '26th', 'CSE', '01716882196', 'juitahmina@yahoo.com\n', '2013-03-20 18:00:00'),
(7, 'QUIZ', 'Samsad Nahar', 'F21212111004', '26th', 'CSE', '01684911877', 'samsadshama@yahoo.com\n', '2013-03-20 18:00:00'),
(8, 'QUIZ', 'Md. Shadekul Islam', 'M21212111019', '26th', 'CSE', '01727031256', 'shamim.snsn@gmail.com', '2013-03-22 18:00:00'),
(9, 'QUIZ', 'Tamanna Akter', 'F21032111013', '22nd', 'CSE', '01377777777', 'unknown1@unknown.com', '2013-03-28 18:00:00'),
(10, 'NFSM', 'Tanzia Rahman', 'F21112111013', '23th', 'CSE', '01684635656', 'tanziarock1@yahoo.com', '2013-02-08 18:00:00'),
(11, 'NFSM', 'Md. Joynal Abedin', 'M21132111009', '25th', 'CSE', '01682088034', 'joynal3483@gmail.com', '2013-02-28 18:00:00'),
(12, 'NFSM', 'Md. Sabbir Rahman', 'M21132111002', '25th', 'CSE', '01677518969', 'sabbir.jassim@gmail.com', '2013-03-13 18:00:00'),
(13, 'NFSM', 'Md. Saddam Hossain', 'M21212111016', '26th', 'CSE', '01676690930', 'saddam_1333@yahoo.com', '2013-03-20 18:00:00'),
(14, 'NFSM', 'Noor-e-Alam', 'M21312111011', '29th', 'CSE', '01678713587', 'noorealamonik@ymail.com', '2013-03-24 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `panelmembers`
--

CREATE TABLE IF NOT EXISTS `panelmembers` (
  `UID` varchar(10) NOT NULL,
  `Responsibility` varchar(15) NOT NULL,
  `session_from` int(4) NOT NULL,
  `session_to` int(4) NOT NULL,
  `session_group` int(4) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmingcontest`
--

CREATE TABLE IF NOT EXISTS `programmingcontest` (
  `TeamName` varchar(20) NOT NULL,
  `Name1` varchar(30) NOT NULL,
  `ID1` varchar(15) NOT NULL,
  `Phone1` varchar(20) NOT NULL,
  `eMail1` varchar(30) NOT NULL,
  `Name2` varchar(30) NOT NULL,
  `ID2` varchar(15) NOT NULL,
  `Phone2` varchar(20) NOT NULL,
  `eMail2` varchar(30) NOT NULL,
  `Name3` varchar(30) NOT NULL,
  `ID3` varchar(15) NOT NULL,
  `Phone3` varchar(20) NOT NULL,
  `eMail3` varchar(30) NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TeamName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programmingcontest_archive`
--

CREATE TABLE IF NOT EXISTS `programmingcontest_archive` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamName` varchar(20) NOT NULL,
  `Name1` varchar(30) NOT NULL,
  `ID1` varchar(15) NOT NULL,
  `Phone1` varchar(20) NOT NULL,
  `eMail1` varchar(30) NOT NULL,
  `Name2` varchar(30) NOT NULL,
  `ID2` varchar(15) NOT NULL,
  `Phone2` varchar(20) NOT NULL,
  `eMail2` varchar(30) NOT NULL,
  `Name3` varchar(30) NOT NULL,
  `ID3` varchar(15) NOT NULL,
  `Phone3` varchar(20) NOT NULL,
  `eMail3` varchar(30) NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `programmingcontest_archive`
--

INSERT INTO `programmingcontest_archive` (`ID`, `TeamName`, `Name1`, `ID1`, `Phone1`, `eMail1`, `Name2`, `ID2`, `Phone2`, `eMail2`, `Name3`, `ID3`, `Phone3`, `eMail3`, `RegistrationDate`) VALUES
(1, 'Mostwanted', 'Md. Joynal Abedin', 'M21132111009', '01682088034', 'joynal3483@gmail.com', 'Md. Joynal Abedin', 'M21132111002', '01677518969', 'sabbir.jassim@gmail.com', 'Tasnim Tanura', 'F21122111001', '01918940190', 'tasnimcse92@gmail.com', '2013-03-13 18:00:00'),
(2, 'Team AMN', 'Aklima Akhtar', 'F21032111005', '01377777777', 'ak_limacse10@yahoo.com\n', 'Aklima Akhtar', 'M21122111004', '01916059008', 'mrinalhaque99@gmail.com\n', 'Nur Mohammad', 'M21132111015', '01715377377', 'nur.mohammad_cse_uu@yahoo.com', '2013-03-19 18:00:00'),
(3, 'STM Spark', 'Tanzia Rahman', 'F21112111013', '01684635656', 'tanziarock1@yahoo.com', 'Tanzia Rahman', 'F21112111002', '01732540445', 'mondalsweety109@gmail.com\n', 'Md. Masud Rana', 'M21112111010', '01677053457', 'masudranauu@gmail.com\n', '2013-03-19 18:00:00'),
(4, 'Team ROS', 'Md. Rejaul Karim', 'M21312111010', '01761813650', 'nk.reja@yahoo.com', 'Md. Rejaul Karim', 'M21312111011', '01678713587', 'noorealamonik@ymail.com', 'Md. Shahidullah', 'M21312111006', '01925381853', 'cseuu29@gmail.com\n', '2013-03-19 18:00:00'),
(5, 'Team 3D', 'Md. Asif Adnan', 'M21212111018', '01682294139', 'asifadnan843@gmail.com', 'Md. Asif Adnan', 'M21212111016', '01676690930', 'saddam_1333@yahoo.com', 'Eti Aktar', 'F21212111007', '01811111123', 'etiakter33@yahoo.com', '2013-03-22 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userids`
--

CREATE TABLE IF NOT EXISTS `userids` (
  `UID` varchar(7) NOT NULL,
  `PWD` varchar(20) NOT NULL,
  `StudentID` varchar(12) NOT NULL,
  `NamePrefix` varchar(15) DEFAULT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `NickName` varchar(20) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `eMail` varchar(30) NOT NULL,
  `Facebook` varchar(200) DEFAULT NULL,
  `Image` varchar(150) NOT NULL,
  `Responsibility` varchar(15) NOT NULL DEFAULT 'Member',
  `JoiningDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `StudentID` (`StudentID`),
  UNIQUE KEY `eMail` (`eMail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userids`
--

INSERT INTO `userids` (`UID`, `PWD`, `StudentID`, `NamePrefix`, `FirstName`, `LastName`, `NickName`, `dateOfBirth`, `ContactNo`, `eMail`, `Facebook`, `Image`, `Responsibility`, `JoiningDate`) VALUES
('UIC-000', '678', 'N/A', 'UU', 'ICT', 'Club', NULL, '2012-10-03', 'N/A', 'uuictclub@gmail.com', NULL, 'members/UIC-000.jpg', 'Member', '2012-10-02 18:00:00'),
('UIC-001', '678', 'M21132111002', 'Md.', 'Sabbir', 'Rahman', '', '1993-01-14', '+8801677518969', 'sabbir.jassim@gmail.com', 'https://www.facebook.com/blackheartadhar', 'members/UIC-001.jpg', 'Pres', '2012-10-09 18:00:00'),
('UIC-002', '678', 'M21212111016', 'Md.', 'Saddam', 'Hossain', NULL, '1993-01-01', '+8801676690930', 'saddam_1333@yahoo.com', NULL, 'members/UIC-002.jpg', 'VP', '2012-10-09 18:00:00'),
('UIC-003', 'MWlsPBts', 'M21212111009', 'Md.', 'Shamim', 'Hasan', NULL, '1994-12-05', '+8801681310278', 'mshasans@yahoo.co.uk', NULL, 'members/UIC-003.jpg', 'GS', '2012-10-17 18:00:00'),
('UIC-004', 'IZ3Hs9sf', 'M21132111009', 'Md.', 'Joynal', 'Abedin', '', '1993-12-16', '+8801682088024', 'joynal3483@gmail.com', 'https://www.facebook.com/joynal.abd', 'members/UIC-004.jpg', 'ConICT', '2012-10-14 18:00:00'),
('UIC-005', 'eTqPD93O', 'F21132111004', '', 'Shaika', 'Sayed', 'Marzia', '1993-01-01', '+8801682220548', 'marziashaika@gmail.com', 'https://www.facebook.com/shaikamarzia', 'members/UIC-005.jpg', 'ConCulture', '2012-10-11 18:00:00'),
('UIC-006', 'vqN33mSd', 'F21212111007', NULL, 'Eti', 'Akter', NULL, '1992-01-21', '+8801718485432', 'etiakter33@yahoo.com', NULL, 'members/UIC-006.jpg', 'Member', '2013-02-08 18:00:00'),
('UIC-007', 'r1LpHvOT', 'M21212111018', 'Md.', 'Asif', 'Adnan', NULL, '1994-05-06', '+8801682294139', 'asifadnan843@gmail.com', NULL, 'members/UIC-007.jpg', 'ConGnS', '2012-10-09 18:00:00'),
('UIC-008', '523mF6T2', 'F21122111001', NULL, 'Tasnim', 'Tanura', NULL, '1990-12-22', '+8801672434378', 'tasnimcse92@gmail.com', NULL, 'members/UIC-008.jpg', 'SM1', '2012-10-09 18:00:00'),
('UIC-009', 'zMC5BhSg', 'F21112111013', NULL, 'Tanzia', 'Rahman', NULL, '1992-01-21', '+8801684635656', 'tanziarock1@yahoo.com', NULL, 'members/UIC-009.jpg', 'SM2', '2012-10-09 18:00:00'),
('UIC-010', '8hZrfevj', 'F21132111012', NULL, 'Yasna', 'Kadri', 'Emu', '1993-05-06', '+8801681996414', 'yasnakadri@yahoo.com', NULL, 'members/UIC-010.jpg', 'SM3', '2012-10-11 18:00:00'),
('UIC-011', 'DyY6lRwM', 'F21132111001', NULL, 'Mir', 'Sadnoon', NULL, '1992-10-29', '+8801682101555', 'mirsadnoon@yahoo.com', NULL, 'members/UIC-011.jpg', 'SM4', '2012-10-11 18:00:00'),
('UIC-012', 'XgUU39w1', 'M21132111010', NULL, 'Dolon', 'Mahmud', NULL, '1992-12-30', '+8801553430117', 'hm.dolon@gmail.com', NULL, 'members/UIC-012.jpg', 'Member', '2012-12-21 18:00:00'),
('UIC-013', 'wSbBjzcQ', 'F21122111005', NULL, 'Jasmin', 'Akter', NULL, '1993-02-27', '+8801681765449', 'jasmincse@gmail.com', NULL, 'members/UIC-013.jpg', 'Member', '2012-10-16 18:00:00'),
('UIC-014', 'mI4cFk39', 'F21212111003', NULL, 'Samsun', 'Nahar', 'Shikha', '1994-05-02', '+8801712892951', 'shikha.naher017@gmail.com', NULL, 'members/UIC-014.jpg', 'Member', '2012-10-17 18:00:00'),
('UIC-015', 'ryp7mJ8R', 'M21312111011', NULL, 'Noor-E', 'Alam', NULL, '1991-07-11', '+8801678713587', 'noorealamonik@ymail.com', NULL, 'members/UIC-015.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-016', 'aRDR6QGF', 'M21212111019', 'Md.', 'Shadekul', 'Islam', 'Shamim', '1993-01-04', '+8801727031256', 'shamim.snsn@gmail.com', NULL, 'members/UIC-016.jpg', 'Member', '2012-10-17 18:00:00'),
('UIC-017', 'UjRsR31y', 'M21222111007', 'Md.', 'Abdullah', 'Al-Mamun', '', '1981-12-11', '+8801939545515', 'temp1@tempemail.com', NULL, 'members/UIC-017.jpg', 'Member', '2012-10-17 18:00:00'),
('UIC-018', 'cRqJOroq', 'F21222111002', NULL, 'Sharmile', 'Setu', NULL, '1992-06-15', '+8801835526516', 'sharmilesetu@gmail.com', NULL, 'members/UIC-018.jpg', 'Member', '2012-10-17 18:00:00'),
('UIC-019', 'nw2dVQc7', 'F21222111005', NULL, 'Rabeya', 'Basri', 'Brishty', '1993-01-14', '+8801834916615', 'raj_brishti_2@gmail.com', NULL, 'members/UIC-019.jpg', 'Member', '2012-10-17 18:00:00'),
('UIC-020', 'wcF6NzDE', 'M21132111015', NULL, 'Nur', 'Mohammed', NULL, '1992-08-25', '+8801715377377', 'nur.mohammad_cse_uu@yahoo.com', NULL, 'members/UIC-020.jpg', 'Member', '2012-11-14 18:00:00'),
('UIC-021', 'PUpiM3sd', 'M21132111013', 'Md.', 'Zakir', 'Hasan', NULL, '1991-05-25', '+8801913949850', 'zakirthevirus@yahoo.com', NULL, 'members/UIC-021.jpg', 'Member', '2012-11-20 18:00:00'),
('UIC-022', 'NDUsVgdl', 'M21312111010', 'Md.', 'Rejaul', 'Karim', NULL, '1991-04-25', '+8801761813650', 'nk.reja@yahoo.com', NULL, 'members/UIC-022.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-023', 'ZaWbKbOw', 'M21312111007', 'Md.', 'Nura', 'Alam', NULL, '1994-09-28', '+8801916151543', 'alom.tmkm@yahoo.com', NULL, 'members/UIC-023.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-024', '6Fid3Rcx', 'M21312111017', 'Md.', 'Safiul', 'Islam', 'Bejoy', '1994-08-11', '+8801765247694', 'bejoycse@gmail.com', NULL, 'members/UIC-024.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-025', '80Z2M5Na', 'M21312111004', NULL, 'Bijoy', 'Krisna', 'Paul', '1995-12-16', '+8801833920216', 'bijoypaul175@yahoo.com', NULL, 'members/UIC-025.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-026', 'SXvpuoFp', 'M21312111002', 'Md.', 'Asadul', 'Islam', NULL, '1994-11-10', '+8801681372182', 'asadnobi@gmail.com', NULL, 'members/UIC-026.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-027', 'mQAeXJ7k', 'M21312111014', 'Md.', 'Asiqur', 'Rahman', NULL, '1991-11-07', '+8801811010135', 'sami.ashik@gmail.com', NULL, 'members/UIC-027.jpg', 'Member', '2013-02-12 18:00:00'),
('UIC-028', 'BGENSVzg', 'M21312111024', 'Md.', 'Shihab', 'Shahriar', NULL, '1994-05-17', '+8801764784484', 'zumman29@yahoo.com', NULL, 'members/UIC-028.jpg', 'Member', '2013-02-13 18:00:00'),
('UIC-029', 'SZP7aDJY', 'M21312111029', NULL, 'Jannat', 'Ara', 'Juthe', '1994-05-15', '+8801829022001', 'temp2@tempemail.com', NULL, 'members/UIC-029.jpg', 'Member', '2013-02-18 18:00:00'),
('UIC-030', 'H1pPDuW8', 'M21312111016', NULL, 'Mursheda', 'Akter', NULL, '1994-10-25', '+8801833224839', 'mursheda.bd99@yahoo.com', NULL, 'members/UIC-030.jpg', 'Member', '2013-02-18 18:00:00'),
('UIC-031', 'vOa8DZg0', 'F21312111019', NULL, 'Ferdousi', 'Akter', 'Eva', '1992-04-26', '+8801747110629', 'temp3@tempemail.com', NULL, 'members/UIC-031.jpg', 'Member', '2013-03-15 18:00:00'),
('UIC-032', 'N6F129JO', 'F21312111038', NULL, 'Bithi', 'Akter', NULL, '1994-12-15', '+8801921384258', 'bithi194@gmail.com', NULL, 'members/UIC-032.jpg', 'Member', '2013-04-02 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userids_temp`
--

CREATE TABLE IF NOT EXISTS `userids_temp` (
  `UID` int(10) NOT NULL AUTO_INCREMENT,
  `StudentID` varchar(12) NOT NULL,
  `FirstName` varchar(15) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `eMail` varchar(30) NOT NULL,
  `Image` varchar(150) NOT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `eMail` (`eMail`),
  UNIQUE KEY `StudentID` (`StudentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
