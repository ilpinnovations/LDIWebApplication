-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2015 at 08:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schedulerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummytest`
--

CREATE TABLE IF NOT EXISTS `dummytest` (
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummytest`
--

INSERT INTO `dummytest` (`text`) VALUES
('mak'),
('mak'),
('mak'),
('mak'),
('mak'),
('mak'),
('mak'),
('Dr Loizos Heracleous'),
('Dr Loizos Heracleous'),
('Dr Loizos Heracleous'),
('Dr Loizos Heracleous');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
`fid` int(10) NOT NULL,
  `empid` int(10) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `speaker` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `q1` int(1) NOT NULL,
  `q2` int(1) NOT NULL,
  `q3` int(1) NOT NULL,
  `q4` int(1) NOT NULL,
  `q5` int(1) NOT NULL,
  `q6` int(1) NOT NULL,
  `q7` int(1) NOT NULL,
  `q8` int(1) NOT NULL,
  `q9` int(1) NOT NULL,
  `q10` int(1) NOT NULL,
  `q11` int(1) NOT NULL,
  `q12` int(1) NOT NULL,
  `q13` int(1) NOT NULL,
  `q14` int(1) NOT NULL,
  `q15` int(1) NOT NULL,
  `s1` varchar(2000) NOT NULL,
  `s2` varchar(2000) NOT NULL,
  `s3` varchar(2000) NOT NULL,
  `s4` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fid`, `empid`, `uid`, `speaker`, `session`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `s1`, `s2`, `s3`, `s4`) VALUES
(1, 974125, '974125Dr Joseph', 'Dr Joseph', 's', 4, 4, 4, 4, 4, 4, 4, 0, 0, 4, 4, 4, 4, 4, 4, 'a', 'b', 'c', 'd'),
(2, 974125, '974125Dr Loizos Heracleous', 'Dr Loizos Heracleous', 's', 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 'a', 'b', 'c', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`nid` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`nid`, `title`, `body`) VALUES
(1, '', ''),
(2, 'New notify', 'get this message');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE IF NOT EXISTS `schedules` (
`sid` int(10) NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`sid`, `details`) VALUES
(1, '{"schedul":[{"name":"mak","start":"02:07","end":"14:13","date":"2015-09-09","loc":"laskdjf","desc":"lkfjwe"}]}'),
(2, '{"schedule":[{"name":"mak223248","start":"02:07","end":"14:13","date":"2015-09-09","loc":"laskdjf","desc":"lkfjwe"},{"name":"jhgj","start":"03:07","end":"03:07","date":"2015-09-24","loc":"sjkchjk","desc":"jdkchjdkc"}]}'),
(4, '{"schedule":[{"name":"mak45","start":"12:00","end":"14:00","date":"2015-03-30","loc":"a3","desc":"skjfhkjf wefhwekjf"},{"name":"task2","start":"01:00","end":"03:00","date":"2015-02-02","loc":"a5","desc":"jfhskjfhkjshf jfshkjf"}]}'),
(5, '{"schedule":[{"name":"mak","start":"12:00","end":"14:00","date":"2015-03-30","loc":"a3","desc":"skjfhkjf wefhwekjf"},{"name":"task2","start":"01:00","end":"03:00","date":"2015-02-02","loc":"a5","desc":"jfhskjfhkjshf jfshkjf"},{"name":"task3","start":"14:22","end":"03:03","date":"2015-09-17","loc":"ksjfh","desc":"kjfhakf"}]}'),
(6, '{"schedule":[{"name":"mak","start":"12:00","end":"14:00","date":"2015-03-30","loc":"a3","desc":"skjfhkjf wefhwekjf"},{"name":"task2","start":"01:00","end":"03:00","date":"2015-02-02","loc":"a5","desc":"jfhskjfhkjshf jfshkjf"}]}'),
(7, '{"schedule":[{"name":"task 1","start":"09:30","end":"10:30","date":"2015-10-02","loc":"asd","desc":"asd"},{"name":"task 3","start":"11:00","end":"12:00","date":"2015-10-03","loc":"sadsadsad","desc":"sadsa"},{"name":"ajDHGKJ","start":"21:59","end":"03:00","date":"2015-10-04","loc":"SDH","desc":"SLAKJFL"}]}');

-- --------------------------------------------------------

--
-- Table structure for table `session_details`
--

CREATE TABLE IF NOT EXISTS `session_details` (
`sid` int(10) NOT NULL,
  `typ` int(1) NOT NULL,
  `title` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL,
  `stime` varchar(100) NOT NULL,
  `etime` varchar(100) NOT NULL,
  `speaker` varchar(200) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `desc` varchar(1000) DEFAULT NULL,
  `download` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session_details`
--

INSERT INTO `session_details` (`sid`, `typ`, `title`, `date`, `stime`, `etime`, `speaker`, `location`, `desc`, `download`) VALUES
(2, 1, 'Challenges of Global Strategy', '2015-10-06', '09:00', '10:15', 'Dr. Joseph', 'LDI', 'In this session we address patterns of internationalization in different types of\r\nindustries, how competing in various nations influences competitive advantage, the\r\ndifferent means of market entry, and global strategy dilemmas such as the need to\r\ngain the right balance between national responsiveness and global integration. We\r\nwill discuss examples of successful versus unsuccessful global strategies and learn\r\nthe main pitfalls that companies can encounter, even experienced ones already\r\noperating in various countries.', '/attachments/a.pdf'),
(3, 2, 'Tea/Coffee', '2015-10-06', '10:15', '10:30', '', '', '', NULL),
(4, 1, 'Case', '2015-10-09', '10:30', '11:35', 'Dr. John', 'LDI', 'ï‚· Heracleous, L. (2013). Chinese beer industry (A) â€“ Demise of foreign competitors ï‚· Heracleous, L. & Papachroni, A. (2013). Chinese beer industry (B) â€“ Renewed optimism ï‚· Heracleous, L. (2013). Towards maturity in the Chinese beer industry', NULL),
(5, 2, 'Tea/Coffee', '2015-10-06', '11:35', '11:45', '', '', '', NULL),
(6, 1, 'Workshop on global strategy', '2015-10-09', '11:45', '13:15', 'Dr. John', 'LDI', 'In this workshop, participants will select one of their lines of business, and develop\r\na plan to take it global. Participants will work in subgroups and then return in\r\nplenary sessions to share their plans with the rest of the group. The workshop aims\r\nto help participants apply the learning from the course to their own business\r\ncontext.', NULL),
(7, 2, 'lunch', '2015-10-06', '13:15', '14:00', 'none', 'none', 'none', NULL),
(8, 1, 'Ambidexterity as Competitive Advantage', '2015-10-06', '14:00', '15:15', 'Dr. Loizos Heracleous', 'LDI', 'In this session we explore how the capability of organizational ambidexterity (the\r\nability to balance competing demands such as high levels of quality and innovation\r\nat very low levels of cost) can lead to competitive advantage. We will examine how\r\nsome organizations have accomplished ambidexterity and derive lessons for how to\r\ndevelop this capability. Finally we will examine to what extent TCS is ambidextrous\r\nand what else could be done to develop this capability further.', NULL),
(9, 2, 'Tea/Coffee', '2015-10-06', '15:15', '15:30', '', '', '', NULL),
(10, 1, 'Ambidexterity as Competitive Advantage', '2015-10-06', '15:30', '17:00', 'Dr. Loizos Heracleous', 'LDI', 'In this session we explore how the capability of organizational ambidexterity (the\r\nability to balance competing demands such as high levels of quality and innovation\r\nat very low levels of cost) can lead to competitive advantage. We will examine how\r\nsome organizations have accomplished ambidexterity and derive lessons for how to\r\ndevelop this capability. Finally we will examine to what extent TCS is ambidextrous\r\nand what else could be done to develop this capability further.', NULL),
(11, 2, 'Tea/Coffee', '2015-10-06', '17:00', '17:15', '', '', '', NULL),
(12, 1, 'Ambidexterity as Competitive Advantage', '2015-10-06', '17:15', '18:30', 'Dr. Loizos Heracleous', 'LDI', 'In this session we explore how the capability of organizational ambidexterity (the\r\nability to balance competing demands such as high levels of quality and innovation\r\nat very low levels of cost) can lead to competitive advantage. We will examine how\r\nsome organizations have accomplished ambidexterity and derive lessons for how to\r\ndevelop this capability. Finally we will examine to what extent TCS is ambidextrous\r\nand what else could be done to develop this capability further.', NULL),
(13, 1, 'Strategy Execution', '2015-10-07', '09:00', '10:15', 'Dr. Loizos Heracleous', 'LDI', 'This session will allow participants to gain an appreciation of the challenges of\r\nrealizing strategy, through reflection on their particular situation and business\r\nissues. We will firstly address key execution concepts and frameworks, along with\r\ncompany examples. These include, in addition to the ESCO (Environment â€“ Strategy\r\n- Core competencies - Organization) framework discussed in earlier sessions, the 7-\r\nS model, activity maps, and value chains. We will see how successful execution is\r\nbased not only on use of analytical frameworks, but also on sound strategic\r\nleadership and on effectively configuring the organization to develop the capacity\r\nto deliver its strategy', NULL),
(14, 2, 'Tea/Coffee', '2015-10-07', '10:15', '10:30', '', '', '', NULL),
(15, 1, 'Strategy execution workshop', '2015-10-07', '10:30', '11:35', 'Dr. Loizos Heracleous', 'LDI', 'We will then carry out a workshop where participants can select one of the\r\nstrategies identified in earlier workshops, and work on an execution plan, with\r\nplenary presentations towards the end of the session.', NULL),
(16, 2, 'Tea/Coffee', '2015-10-07', '11:35', '11:45', '', '', '', NULL),
(17, 1, 'Strategy execution workshop Contd..', '2015-10-07', '11:45', '13:15', 'Dr. Loizos Heracleous', 'LDI', 'We will then carry out a workshop where participants can select one of the\r\nstrategies identified in earlier workshops, and work on an execution plan, with\r\nplenary presentations towards the end of the session.', NULL),
(18, 2, 'lunch', '2015-10-07', '13:15', '14:00', 'none', 'none', 'none', NULL),
(19, 1, 'Open Session', '2015-10-07', '14:00', '18:00', 'Dr. Loizos Heracleous', 'LDI', 'Open Session', NULL),
(20, 1, 'Strategic Alignment and Core Competencies', '2015-10-05', '09:00', '10:15', 'Dr. Loizos Heracleous', 'LDI', 'What is it that distinguishes winning companies from mediocre companies? How can\r\nstrategies be developed and implemented effectively, to deliver success in hypercompetitive environments? In this session we discuss different levels of strategy\r\n(corporate, business, functional), key strategy principles relating to strategic\r\nalignment and core competencies, as well as how to analyse industries to uncover\r\nthe level of their structural attractiveness. We will explore company examples of\r\neffective alignment as well as mis-alignment, and will see how a company can\r\ndevelop the right core competencies to support its strategy through consistent\r\npolicies and investments at the organizational level.', NULL),
(21, 2, 'Tea/Coffee', '2015-10-05', '10:15', '10:30', '', '', '', NULL),
(22, 1, 'Mini-workshop', '2015-10-05', '10:30', '11:35', 'Dr. Loizos Heracleous', 'LDI', 'Strategic misalignments at your organisation.', NULL),
(23, 2, 'Tea/Coffee', '2015-10-05', '11:35', '11:45', '', '', '', NULL),
(24, 1, 'Case ', '2015-10-05', '11:45', '13:15', 'Dr. Loizos Heracleous', 'LDI', 'Heracleous, L. 2014. Strategy and organization at Singapore Airlines: Creating a\r\nglobal champion', NULL),
(25, 2, 'lunch', '2015-10-05', '13:15', '14:00', 'none', 'none', 'none', NULL),
(26, 1, 'Strategic Leadership and Innovation', '2015-10-05', '14:00', '15:15', 'Dr. Loizos Heracleous', 'LDI', 'In this session we will go beyond the discussion of strategic alignment and core\r\ncompetencies, by examining leadership as the driving force of strategic alignment;\r\nand innovation as a crucial core competency. What is it that makes leadership\r\nstrategic, and what are the main tasks of a strategic leader? What are the right\r\ntypes of core competence for the organization to develop and how can this be\r\ndone? We will use the case of Apple Inc and the leadership of the late Steve Jobs as\r\nthe context for this discussion. After Steve Jobsâ€™ return in 1997, Apple has created\r\nbreakthrough products that redefined whole industries, creating new markets and\r\nposting record profits. These innovations took place in the face of commoditization\r\nand slim margins in the very tough industries of personal computers and consumer\r\nelectronics. We will examine the role of leadership and innovation in Appleâ€™s\r\ncompetitive success and derive broader principles of success.', NULL),
(27, 2, 'Tea/Coffee', '2015-10-05', '15:15', '15:30', '', '', '', NULL),
(28, 1, 'Case', '2015-10-05', '15:30', '17:00', 'Dr. Loizos Heracleous', 'LDI', 'Heracleous, L. & Papachroni, A. 2012. Strategic leadership and innovation at Apple\r\nInc. European Case Clearing House', NULL),
(29, 2, 'Tea/Coffee', '2015-10-05', '17:00', '17:15', '', '', '', NULL),
(30, 1, 'Workshops â€“ Applying key strategy concepts to your organisation', '2015-10-05', '17:15', '18:30', 'Dr. Loizos Heracleous', 'LDI', 'ï‚· Strategic alignment at your organisation. Prepare a strategic alignment map\r\nï‚· Strategic leadership. Evaluate strategic leadership at your organisation, as well\r\nas yourselves as leaders, from the perspective of the 6 tasks of strategic\r\nleadership\r\nï‚· Innovation. How important is innovation for your organisation to accomplish its\r\nstrategy, and if so, how innovative is it? What needs to be done to enhance\r\ninnovation?\r\nï‚· Selected plenary presentations', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `susers`
--

CREATE TABLE IF NOT EXISTS `susers` (
`uid` int(10) NOT NULL,
  `eid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `susers`
--

INSERT INTO `susers` (`uid`, `eid`, `name`, `email`, `location`) VALUES
(4, 974125, 'mk', 'mk@tcs.com', 'Trivandrum'),
(6, 577186, 'abc', 'nimmi.narayanan@tcs.com', 'Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`uid` int(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `upass` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`) VALUES
(1, 'mak', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
 ADD PRIMARY KEY (`fid`), ADD UNIQUE KEY `eid` (`uid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
 ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `session_details`
--
ALTER TABLE `session_details`
 ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `susers`
--
ALTER TABLE `susers`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `eid` (`eid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`uid`), ADD UNIQUE KEY `username` (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `nid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `session_details`
--
ALTER TABLE `session_details`
MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `susers`
--
ALTER TABLE `susers`
MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
