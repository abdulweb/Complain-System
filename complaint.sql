-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 12:20 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- DATABASE: `complain`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`username`, `password`, `category`, `flag`) VALUES
('YUNUS', '1234', 'Admin', 1),
('council', '1234', 'Grieviance', 1),
('1310310022', '1234', 'student', 1),
('ss', '1234', 'Inequality', 1),
('kb', '1234', 'Grieviance', 1),
('day', '1234', 'Grieviance', 1),
('kjart', '1234', 'Inequality', 1),
('stop', '1234', 'Grieviance', 1),
('1310310064', '1234', 'student', 1),
('1310310142', '1234', 'student', 1),
('1310310037', '1234', 'student', 1),
('sarki', '1234', 'General', 1),
('1210310010', '1234', 'student', 1),
('lawal', '1234', 'Suggestion', 1),
('khadijah', '1234', 'Suggestion', 1),
('1310310040', '1234', 'student', 1),
('1310310125', '1234', 'student', 1),
('12344555', '1234', 'student', 1),
('7588484884', '1234', 'student', 1),
('674893939332', '1234', 'student', 1),
('643738383', '1234', 'student', 1),
('8588585885', '1234', 'student', 1),
('6898090', '1234', 'student', 1),
('58679899', '1234', 'student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
  `admission_number` varchar(30) NOT NULL,
  `complaint_id` varchar(20) NOT NULL,
  `complaint_title` varchar(200) NOT NULL,
  `complaint_category` varchar(20) NOT NULL,
  `complaint_body` varchar(1000) NOT NULL,
  `complaint_decision` varchar(500) DEFAULT NULL,
  `priority` int(2) DEFAULT NULL,
  `flag` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`admission_number`, `complaint_id`, `complaint_title`, `complaint_category`, `complaint_body`, `complaint_decision`, `priority`, `flag`) VALUES
('1310310022', 'C0', 'Racial Profiling', 'Inequality', 'testing', '', NULL, 0),
('1310310022', 'C1', 'chwwww', 'Inequality', 'dfdfddf', 'Issue resolved', NULL, 1),
('1310310022', 'C2', 'gfhdjsjs', 'Grieviance', 'nsnssssssssssss', '', NULL, 1),
('SAMA', 'C3', 'dress', 'Inequality', 'eweeeeeeeeeeeeeeeeeeeeeeeeee', 'The dressing in this school is to be taking seriously..we do not condo unreasonable and low esteemed dressing.Therefore, the management has agreed to forward this complaint for quick assessment. Thank you', NULL, 1),
('1310310022', 'C4', 'bad behaviour', 'Grieviance', 'people are just bad', '', NULL, 1),
('1310310022', 'C5', 'bad behaviour', 'Accomodation', 'people are just bad', 'it will be answered shortly', 1, 1),
('1310310022', 'C6', 'dirty hostels', 'Accomodation', 'there has been reported cases of hostels being extremely dirty especially the girls hostels...the bathrooms are not left out and there gutters are filled up with litters and they smell so bad..i hope ', 'we have looked into the matter..we will make sure that the hostels are now kept clean and the cleaners will be \r\nsanctioned...thank you very much for making this complaint because we have been able to factor out some things. Thank you!				', 1, 1),
('1310310064', 'C7', 'cultism', 'Admin', 'there has been some rumors in school about student involving in cultism. as we know that this school is the most peaceful university in Nigeria, i am sad to say that this is turning not to be true.please help us!', '							', NULL, 1),
('1310310142', 'C8', 'dress code', 'Inequality', 'dressing should be allowed', 'it will be looked into', NULL, 1),
('1310310142', 'C9', 'cultism', 'Accomodation', 'cultism is a developing act in the university.', 'the university management has given the guardian and counseling division to look into the matter. Thank You!', 1, 1),
('1310310022', 'C10', 'LIGHT', 'Accomodation', 'THERE IS NO LIGHT IN THE HOSTEL..PLEASE FIX IT FOR US AS SOON AS POSSIBLE', 'YOUR PROBLEM WILL BE LOOKED INTO. THANK YOU', 1, 1),
('1310310022', 'C11', 'DRESSING', 'Results', 'i am having problem with my result', 'THANK YOU', 2, 1),
('1310310022', 'C12', 'hostel vacation', 'Results', 'we are still writing our projects and some of us are having our teaching practice right in the school and we were told by the school to vacate the hostel..please we want the school management to look into this matter for us as the students don''t have anywhere to got o', '', 2, 0),
('1310310064', 'C13', 'violation', 'General', 'this is to report to the school authorities about students violating the school properties in the hostel..we hope the school will report to this urgently', 'thank you for posting this', NULL, 1),
('1310310064', 'C14', 'testing', 'Admin', 'testing this app', 'will be looked into', NULL, 1),
('1310310142', 'C15', 'test', 'Results', 'just testing', '', 2, 0),
('1310310064', 'C16', 'teaching rights', 'Inequality', 'malam issa is not teaching us very well..he is being hard during his exams and test and we students are finding it difficult to cpe. please help us!', 'sister dont worry..we will deal with him', NULL, 1),
('1210310010', 'C17', 'Asuu', 'Suggestion', 'let the school student finish their project before you people go on strike', '', NULL, 0),
('1310310064', 'C18', 'money', 'Results', 'give me money', 'we will look into it					', 2, 1),
('1310310064', 'C19', 'test', 'Results', 'okay', 'thank you				', 2, 1),
('1310310064', 'C20', 'udsjjjjj', 'Results', 'thank you', 'thanks			', 2, 1),
('1310310064', 'C21', 'tuvs', 'Grieviance', 'sfdgfhg', 'olryt', NULL, 1),
('1310310064', 'C22', 'khhhhhhhhh', 'Accomodation', 'fhhhhhhhhhhh', '', 1, 0),
('1310310064', 'C23', 'ghhhhhhh', 'Accomodation', 'ghfgggggggggg', 'nkkmkmmlkml', 1, 1),
('1310310064', 'C24', 'nsjnnnnnnnn', 'Accomodation', 'sjxxssssss', 'nice one', 1, 1),
('1310310064', 'C25', 'nsjnnnnnnnn', 'Grieviance', 'sjxxssssss', 'lovely		', NULL, 1),
('1310310064', 'C26', 'ksja,,,,,,,j', 'Grieviance', 'cnnnnxxxxx', 'olryt		', NULL, 1),
('1310310064', 'C27', 'ndnsns', 'Grieviance', 'nsnnnnnnnnn', 'stay alive for me dearie', NULL, 1),
('1310310064', 'C28', 'nsnnnnnnnnn', 'Grieviance', 'nsssssssssssssss', 'qwert all things			', NULL, 1),
('1310310064', 'C29', 'hurt', 'Grieviance', 'serious', 'thsnk you				', NULL, 1),
('1310310064', 'C30', 'nmsnn', 'Grieviance', 'fffffffffffffffffffffffffffffffffffk', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff_reg`
--

CREATE TABLE IF NOT EXISTS `staff_reg` (
  `staff_id` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_reg`
--

INSERT INTO `staff_reg` (`staff_id`, `name`, `category`, `phone`, `flag`) VALUES
('YUNUS', 'YUNUSA ', 'Admin', '08035576184', 1),
('council', 'some one', 'Grieviance', '09088877889', 1),
('ss', 'Sam''aila Bala', 'Inequality', '221111109', 1),
('kb', 'kubra', 'Grieviance', '07098456467', 1),
('seta', 'seta', 'General', '08037372822', 1),
('day', 'day', 'Grieviance', '09056789653', 1),
('kjart', 'khadijat', 'Inequality', '08094567812', 1),
('stop', 'stop', 'Grieviance', '09023456516', 1),
('sarki', 'yunus', 'General', '07035679189', 1),
('lawal', 'Yusuf', 'Suggestion', '08065211361', 1),
('khadijah', 'kjart', 'Suggestion', '08166264425', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE IF NOT EXISTS `student_reg` (
  `admission_number` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` varchar(15) NOT NULL,
  `faculty` varchar(15) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `flag` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`admission_number`, `name`, `level`, `faculty`, `phone_no`, `email`, `flag`) VALUES
('1310310022', 'Samaila Bala', '200', 'Science', '08035576184', 'sama@gmail.com', 1),
('1310310064', 'Khadijat', '400', 'Science', '07032628419', 'yusufkjart@gmail.com', 1),
('1310310142', 'BASHIR', '300', 'Science', '09032456210', 'bashir@gmail.com', 1),
('1310310037', 'Rafiat suleiman', '200', 'Science', '07023456719', 'rafeee@gmail.com', 1),
('1210310010', 'Adamu Hussain', '300', 'Art', '08031108616', 'adams@gmail.com', 1),
('1310310040', '123444444', '400', 'Law', 'dndnndndd', 'gh@bdnnd.com', 1),
('1310310125', '3848895945', '100', 'Science', '08075492314', 'vmv@kdkd', 1),
('12344555', 'mdmdmdmd446565464', '100', 'Science', '8809878', 'ddkd@keke', 1),
('7588484884', '748859', '100', 'Science', '122345555', 'ryrhr@hdhd.cocm', 1),
('674893939332', '383948u49', '100', 'Science', '1829390303', 'jkddkdk@kdld', 1),
('643738383', '123456677', '100', 'Science', '7888089655', 'ddjdbdd@jdjd.cic', 1),
('8588585885', 'ddddddd', '100', 'Science', '84767839', 'djdkdk@jdjd.coc', 1),
('6898090', '8988889', '100', 'Science', '798009788', 'hbjb@jjkk.com', 1),
('58679899', '8-9976556787', '100', 'Science', '8808757676', 'ghhgf@fghj.bjhh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `staff_reg`
--
ALTER TABLE `staff_reg`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`admission_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
