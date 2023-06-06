-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 03:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `STUDENT_ID` varchar(50) NOT NULL,
  `GRADE_ID` varchar(50) NOT NULL,
  `ENROLLMENT_DATE` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`STUDENT_ID`, `GRADE_ID`, `ENROLLMENT_DATE`) VALUES
('0bBFvB0Y5R', 'GR-471604', '2023-05-25'),
('0DxFuvLlqA', 'GR-343328', '2023-05-25'),
('5ZRLAfccM6', 'GR-089088', '2023-05-25'),
('8e5mDK0dPO', 'GR-827637', '2023-05-25'),
('BMnx56dh2i', 'GR-471604', '2023-05-24'),
('BtS5MmvPoE', 'GR-835285', '2023-05-25'),
('d7VfbUR7Ib', 'GR-089088', '2023-05-25'),
('K3Cj4xUk7S', 'GR-854127', '2023-05-25'),
('kSfiokV3jO', 'GR-074561', '2023-05-25'),
('lqFu00W97i', 'GR-074561', '2023-05-25'),
('m6PP9aIFNa', 'GR-827637', '2023-05-25'),
('Mw5BjbaP8j', 'GR-921504', '2023-05-25'),
('NxnndMwCnS', 'GR-854127', '2023-05-25'),
('oubClVJsuJ', 'GR-921504', '2023-05-25'),
('rjrZMFIZbc', 'GR-835285', '2023-05-25'),
('y4EuFcElLl', 'GR-751705', '2023-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `gradelevel`
--

CREATE TABLE `gradelevel` (
  `GRADE_ID` varchar(50) NOT NULL,
  `GRADE_NAME` varchar(100) NOT NULL,
  `TEACHER_ID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradelevel`
--

INSERT INTO `gradelevel` (`GRADE_ID`, `GRADE_NAME`, `TEACHER_ID`) VALUES
('GR-074561', 'GRADE-5', '857-968-140'),
('GR-089088', 'GRADE-2', '573-836-261'),
('GR-308507', 'GRADE-6', '325-388-366'),
('GR-343328', 'GRADE-8', '796-294-707'),
('GR-471604', 'GRADE-4', '426-625-621'),
('GR-751705', 'GRADE-3', '857-796-588'),
('GR-827637', 'GRADE-7', '433-839-722'),
('GR-835285', 'GRADE-1', '743-752-632'),
('GR-854127', 'GRADE-9', '194-034-539'),
('GR-921504', 'GRADE-10', '261-896-476');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `ID` int(10) NOT NULL,
  `SCHOOL_NAME` varchar(200) NOT NULL,
  `SCHOOL_ADDRESS` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`ID`, `SCHOOL_NAME`, `SCHOOL_ADDRESS`) VALUES
(11111, 'CDLC SMART KIDS LEARNING SCHOOL', 'TAMBANGAN, STO. DOMINGO, ALBAY');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` varchar(50) NOT NULL,
  `STUDENT_FNAME` varchar(50) NOT NULL,
  `STUDENT_INIT` varchar(50) NOT NULL,
  `STUDENT_LNAME` varchar(50) NOT NULL,
  `STUDENT_GENDER` varchar(50) NOT NULL,
  `STUDENT_ADDRESS` varchar(150) NOT NULL,
  `STUDENT_DOB` date NOT NULL,
  `STUDENT_GUARDIAN` varchar(100) NOT NULL,
  `STU_GUARDIAN_CONTACT` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_ID`, `STUDENT_FNAME`, `STUDENT_INIT`, `STUDENT_LNAME`, `STUDENT_GENDER`, `STUDENT_ADDRESS`, `STUDENT_DOB`, `STUDENT_GUARDIAN`, `STU_GUARDIAN_CONTACT`) VALUES
('0bBFvB0Y5R', 'JOREN', 'M', 'ESPINOSA', 'FEMALE', 'LEGAZPI CITY', '2002-01-16', 'JOSEPHINE ESPINOSA', 9421236345),
('0DxFuvLlqA', 'JOHN MARK', 'G', 'TRILLES', 'MALE', 'ESTANZA LEGAZPI CITY', '2002-04-05', 'N/A', 9512341234),
('5ZRLAfccM6', 'ANTHONY', 'D', 'DAEN', 'MALE', 'LEGAZPI CITY', '2002-05-10', 'N/A', 9642341234),
('8e5mDK0dPO', 'DANICA', 'B', 'BANZUELA', 'FEMALE', 'STO. DOMINGO, ALBAY', '2000-04-02', 'N/A', 9534123412),
('BMnx56dh2i', 'DEXTER ALAN', 'B', 'BALDERAMA', 'MALE', 'STO. DOMINGO, ALBAY', '1998-04-15', 'ZENAIDA BALDERAMA', 9308774747),
('BtS5MmvPoE', 'JEANETTE', 'L', 'GUBOT', 'FEMALE', 'TABON TABON', '2002-12-28', 'N/A', 9512351231),
('d7VfbUR7Ib', 'MATTHEW', 'E', 'ARAOJO', 'MALE', 'LEGAZPI CITY', '2002-03-03', 'N/A', 9523412341),
('K3Cj4xUk7S', 'JOHN PAUL', 'A', 'AVELINO', 'MALE', 'LEGAZPI CITY', '2002-04-04', 'N/A', 9523123412),
('kSfiokV3jO', 'JAMES', 'B', 'RAMIREZ', 'MALE', 'RAPU RAPU', '1999-03-03', 'N/A', 9412341234),
('lqFu00W97i', 'ALEXANDER', 'D', 'GREAT', 'MALE', 'LEGAZPI CITY', '2002-07-03', 'N/A', 9534523412),
('m6PP9aIFNa', 'MERRIAM', 'Y', 'ATUN', 'FEMALE', 'LEGAZPI CITY', '1997-04-15', 'N/A', 9523123423),
('Mw5BjbaP8j', 'LESTER', 'N', 'SAPAULA', 'MALE', 'LEGAZPI CITY', '2002-10-16', 'JOSEPH SAPULA', 9425231523),
('NxnndMwCnS', 'MARIBEL', 'D', 'NAVERA', 'FEMALE', 'CAMALIG ALBAY', '2002-10-22', 'BELEN NAVERA', 9541234124),
('oubClVJsuJ', 'JHACELL', 'P', 'ZAMORA', 'FEMALE', 'TAHAO RD', '2002-02-14', 'HAZEL ZAMORA', 823662351),
('rjrZMFIZbc', 'CHERRIE ANN', 'A', 'LERON', 'FEMALE', 'ESTANZA', '2002-11-23', 'N/A', 9312351231),
('y4EuFcElLl', 'SHERWIN', 'A', 'BORDEOS', 'MALE', 'LEGAZPI CITY', '2003-04-12', 'N/A', 9524234123);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SUBJECT_ID` varchar(50) NOT NULL,
  `SUBJECT_NAME` varchar(100) NOT NULL,
  `SUBJECT_DESCRIPTION` varchar(150) NOT NULL,
  `SUBJECT_TIME` varchar(50) DEFAULT NULL,
  `GRADE_ID` varchar(50) DEFAULT NULL,
  `TEACHER_ID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SUBJECT_ID`, `SUBJECT_NAME`, `SUBJECT_DESCRIPTION`, `SUBJECT_TIME`, `GRADE_ID`, `TEACHER_ID`) VALUES
('SUB-01116', 'MATH-III', 'MATHEMATICS EDUCATION THREE', '----', 'GR-751705', '635-062-754'),
('SUB-02093', 'HIS-IV', 'HISTORY EDUCATION FOUR', '----', 'GR-921504', '194-034-539'),
('SUB-08073', 'COM-I', 'COMPUTER ONE', '----', 'GR-827637', '743-752-632'),
('SUB-08132', 'FIL-II', 'FILIPINO EDUCATION TWO', '----', 'GR-343328', '362-426-737'),
('SUB-08445', 'ENG-VI', 'ENGLISH EDUCATION SIX', '----', 'GR-308507', '417-291-275'),
('SUB-10137', 'HIS-II', 'HISTORY EDUCATION TWO', '----', 'GR-343328', '105-815-959'),
('SUB-10892', 'ENG-III', 'ENGLISH EDUCATION THREE', '----', 'GR-751705', '857-968-140'),
('SUB-12455', 'MATH-I', 'MATHEMATICS EDUCATION ONE', '----', 'GR-835285', '635-062-754'),
('SUB-20801', 'AP-III', 'ARALING PANLIPUNAN THREE', '----', 'GR-854127', '194-034-539'),
('SUB-23465', 'TLE-II', 'TECHNOLOGY AND LIVELIHOOD EDUCATION TWO', '----', 'GR-074561', '486-042-716'),
('SUB-26468', 'COM-II', 'COMPUTER TWO', '----', 'GR-343328', '446-919-515'),
('SUB-27389', 'TLE-III', 'TECHNOLOGY AND LIVELIHOOD EDUCATION TWO', '----', 'GR-308507', '486-042-716'),
('SUB-29015', 'ENG-IV', 'ENGLISH EDUCATION FOUR', '----', 'GR-471604', '897-941-297'),
('SUB-30058', 'COM-IV', 'COMPUTER FOUR', '----', 'GR-921504', '105-815-959'),
('SUB-30068', 'SCI-1', 'SCIENCE EDUCATION ONE', '----', 'GR-835285', '857-796-588'),
('SUB-30710', 'ENG-I', 'ENGLISH EDUCATION ONE', '-----', 'GR-835285', '857-968-140'),
('SUB-31381', 'ESP-I', 'EDUCATION SA PAGPAPAKATAO ONE', '----', 'GR-827637', '796-294-707'),
('SUB-33015', 'MATH-VIII', 'ADVANCE MATHEMATICS TWO', '----', 'GR-343328', '452-216-798'),
('SUB-33709', 'SCI-IV', 'SCIENCE EDUCATION FOUR', '----', 'GR-471604', '573-836-261'),
('SUB-36387', 'MATH-V', 'MATHEMATICS EDUCATION FIVE', '----', 'GR-074561', '433-839-722'),
('SUB-37213', 'MATH-VI', 'MATHEMATICS EDUCATION SIX', '-----', 'GR-308507', '433-839-722'),
('SUB-39051', 'ESP-IV', 'EDUCATION SA PAGPAPAKATAO FOUR', '----', 'GR-921504', '127-538-860'),
('SUB-40013', 'ENG-IX', 'ENGLISH EDUCATION NINE', '----', 'GR-854127', '573-836-261'),
('SUB-44156', 'ENG-V', 'ENGLISH EDUCATION FIVE', '----', 'GR-074561', '897-941-297'),
('SUB-48117', 'MATH-X', 'ADVANCE MATHEMATICS FOUR', '----', 'GR-921504', '897-941-297'),
('SUB-48402', 'FIL-IV', 'FILIPINO EDUCATION FOUR', '----', 'GR-921504', '362-426-737'),
('SUB-49290', 'ENG-X', 'ENGLISH EDUCATION TEN', '----', 'GR-921504', '573-836-261'),
('SUB-49534', 'MATH-VII', 'ADVANCE MATHEMATICS ONE', '----', 'GR-827637', '452-216-798'),
('SUB-51837', 'SCI-II', 'SCIENCE EDUCATION TWO', '----', 'GR-089088', '857-796-588'),
('SUB-54384', 'SCI-VI', 'SCIENCE EDUCATION SIX', '----', 'GR-308507', '397-144-365'),
('SUB-57925', 'FIL-III', 'FILIPINO EDUCATION THREE', '----', 'GR-854127', '362-426-737'),
('SUB-60306', 'ENG-II', 'ENGLISH EDUCATION TWO', '----', 'GR-089088', '857-968-140'),
('SUB-60498', 'HIS-III', 'HISTORY EDUCATION THREE', '----', 'GR-854127', '426-625-621'),
('SUB-60914', 'SCI-III', 'SCIENCE EDUCATION THREE', '----', 'GR-751705', '857-796-588'),
('SUB-61839', 'ESP-III', 'EDUCATION SA PAGPAPAKATAO THREE', '----', 'GR-854127', '796-294-707'),
('SUB-62244', 'PE-III', 'PHYSICAL EDUCATION THREE', '----', 'GR-854127', '261-896-476'),
('SUB-63545', 'MATH-II', 'MATHEMATICS EDUCATION TWO', '----', 'GR-089088', '635-062-754'),
('SUB-64441', 'AP-IV', 'ARALING PANLIPUNAN FOUR', '----', 'GR-921504', '325-388-366'),
('SUB-64701', 'AP-I', 'ARALING PANLIPUNAN ONE', '----', 'GR-827637', '397-144-365'),
('SUB-68071', 'SCI-V', 'SCIENCE EDUCATION FIVE', '----', 'GR-074561', '397-144-365'),
('SUB-68215', 'PE-I', 'PHYSICAL EDUCATION ONE', '----', 'GR-827637', '325-388-366'),
('SUB-69052', 'FIL-I', 'FILIPINO EDUCATION ONE', '----', 'GR-827637', '261-896-476'),
('SUB-74967', 'MATH-IX', 'ADVANCE MATHEMATICS THREE', '----', 'GR-854127', '452-216-798'),
('SUB-77975', 'ENG-VIII', 'ENGLISH EDUCATION EIGHT', '----', 'GR-343328', '417-291-275'),
('SUB-78364', 'PE-IV', 'PHYSICAL EDUCATION FOUR', '----', 'GR-921504', '261-896-476'),
('SUB-87049', 'ESP-II', 'EDUCATION SA PAGPAPAKATAO TWO', '----', 'GR-343328', '796-294-707'),
('SUB-89979', 'TLE-I', 'TECHNOLOGY AND LIVELIHOOD EDUCATION ONE', '----', 'GR-471604', '486-042-716'),
('SUB-90444', 'HIS-1', 'HISTORY EDUCATION ONE', '----', 'GR-827637', '426-625-621'),
('SUB-91105', 'MATH-IV', 'MATHEMATICS EDUCATION FOUR', '----', 'GR-471604', '433-839-722'),
('SUB-91826', 'AP-II', 'ARALING PANLIPUNAN TWO', '----', 'GR-343328', '194-034-539'),
('SUB-94118', 'PE-II', 'PHYSICAL EDUCATION TWO', '----', 'GR-343328', '325-388-366'),
('SUB-94497', 'COM-III', 'COMPUTER THREE', '----', 'GR-854127', '446-919-515'),
('SUB-96984', 'ENG-VII', 'ENGLISH EDUCATION SEVEN', '----', 'GR-827637', '417-291-275');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TEACHER_ID` varchar(50) NOT NULL,
  `TEACHER_FNAME` varchar(50) NOT NULL,
  `TEACHER_INIT` varchar(50) NOT NULL,
  `TEACHER_LNAME` varchar(50) NOT NULL,
  `TEACHER_ADDRESS` varchar(150) NOT NULL,
  `TEACHER_CONTACT` bigint(15) NOT NULL,
  `TEACHER_EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TEACHER_ID`, `TEACHER_FNAME`, `TEACHER_INIT`, `TEACHER_LNAME`, `TEACHER_ADDRESS`, `TEACHER_CONTACT`, `TEACHER_EMAIL`) VALUES
('105-815-959', 'RAPUSA', 'Y', 'SANGILO', 'BONOT, LEGAZPI CITY', 9645678424, 'rapu@gmail.com'),
('127-538-860', 'SANGYOP', 'T', 'RODRIGUEZ', 'STO. DOMINGO, ALBAY', 9864567345, 'sang@gmail.com'),
('194-034-539', 'LAURO', 'B', 'LORO', 'STO. DOMINGO, ALBAY', 9534234523, 'lauro@gmail.com'),
('261-896-476', 'KROLO', 'B', 'SANTIGBAS', 'LEGAZPI CITY', 9512983123, 'krolo@gmail.com'),
('325-388-366', 'KINGSTON', 'G', 'ROSA', 'STO. DOMINGO, ALBAY', 9534343434, 'kington@gmail.com'),
('362-426-737', 'LAURA', 'Z', 'JAMARIA', 'DARAGA, ALBAY', 9854567843, 'laura@gmail.com'),
('397-144-365', 'JUNGO', 'J', 'LALA', 'CAMALIG ALBAY', 9523424242, 'jungo@gmail.com'),
('417-291-275', 'JOSE', 'B', 'MARICHU', 'STO. DOMINGO, ALBAY', 9534523452, 'jose@gmail.com'),
('426-625-621', 'MARK', 'B', 'SAMULA', 'DARAGA, ALBAY', 9664678552, 'mark@gmail.com'),
('433-839-722', 'HOSE', 'R', 'RUWASAN', 'MANITO, ALBAY', 9534563453, 'hose@gmail.com'),
('446-919-515', 'ROSE', 'T', 'TIGBAK', 'CAMALIG ALBAY', 9534567435, 'rose@gmail.com'),
('452-216-798', 'JOJO', 'T', 'TITO', 'CAMALIG, ALBAY', 9635678535, 'jojo@gmail.com'),
('486-042-716', 'KARL', 'B', 'GALERIA', 'MATNOG, SORSOGON', 9552345634, 'karl@gmail.com'),
('573-836-261', 'JUJU', 'B', 'RABLON', 'LEGAZPI CITY', 9521215231, 'ju@gmail.com'),
('635-062-754', 'BAROROT', 'H', 'GUSA', 'STO. DOMINGO, ALBAY', 9683456786, 'baro@gmail.com'),
('743-752-632', 'JEFFREY', 'B', 'BALUNSYO', 'LEGAZPI CITY', 9312352345, 'jeff@gmail.com'),
('796-294-707', 'TIMOTHY', 'B', 'BRADLY', 'BONOT, LEGAZPI CITY', 9683456784, 'timothy@gmail.com'),
('857-796-588', 'FLORIDA', 'B', 'MASING', 'LEGAZPI CITY', 962121212, 'florida@gmail.com'),
('857-968-140', 'GOGOTA', 'B', 'RAMBUTAN', 'CAMALIG ALBAY', 9645673456, 'gogo@gmail.com'),
('897-941-297', 'JONATHAN', 'Y', 'YUAN', 'STO. DOMINGO, ALBAY', 9854567864, 'jona@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`STUDENT_ID`,`GRADE_ID`),
  ADD KEY `GRADE_ID` (`GRADE_ID`);

--
-- Indexes for table `gradelevel`
--
ALTER TABLE `gradelevel`
  ADD PRIMARY KEY (`GRADE_ID`),
  ADD KEY `TEACHER_ID` (`TEACHER_ID`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SUBJECT_ID`),
  ADD KEY `GRADE_ID` (`GRADE_ID`),
  ADD KEY `TEACHER_ID` (`TEACHER_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TEACHER_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`GRADE_ID`) REFERENCES `gradelevel` (`GRADE_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gradelevel`
--
ALTER TABLE `gradelevel`
  ADD CONSTRAINT `gradelevel_ibfk_1` FOREIGN KEY (`TEACHER_ID`) REFERENCES `teacher` (`TEACHER_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`GRADE_ID`) REFERENCES `gradelevel` (`GRADE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`TEACHER_ID`) REFERENCES `teacher` (`TEACHER_ID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
