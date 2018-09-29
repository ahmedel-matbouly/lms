-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 05:22 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_books`
--

CREATE TABLE `add_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_image` varchar(500) NOT NULL,
  `book_author_name` varchar(50) NOT NULL,
  `book_publication_name` varchar(50) NOT NULL,
  `book_purchase_date` varchar(50) NOT NULL,
  `book_price` varchar(50) NOT NULL,
  `book_quan` varchar(50) NOT NULL,
  `available_quan` varchar(50) NOT NULL,
  `librarian_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_books`
--

INSERT INTO `add_books` (`id`, `book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_quan`, `available_quan`, `librarian_username`) VALUES
(55, 'java', 'upload/36594d82cc5c7a706ba3128ff156f1a1download.jpg', 'rakha', 'hgf', '30/11/2020', '500', '10', '2', 'osmansoliman');

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(5) NOT NULL,
  `student_enrollment` varchar(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `student_sem` varchar(50) NOT NULL,
  `student-contact` varchar(50) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_issue_date` varchar(50) NOT NULL,
  `book_return_date` varchar(50) NOT NULL,
  `student_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `student_enrollment`, `student_name`, `student_sem`, `student-contact`, `student_email`, `book_name`, `book_issue_date`, `book_return_date`, `student_username`) VALUES
(27, ' 136464', 'ahmed ali', '47', '0100489851', 'ahmedali@gmail.com', 'PHP', '25 - Sep - 2018', '', 'ahmedali'),
(28, ' 100200', 'Elsayed Hasseb', '29', '01005487699', 'elsayedyassin@gmail.com', 'Ruby', '25 - Sep - 2018', '', 'elsayedyassin'),
(29, ' 1258', 'ahmed rakha', '12', '01004591695', 'arakha70@gmail.com', 'PHP', '25 - Sep - 2018', '', 'arakha10'),
(30, ' 1258', 'ahmed rakha', '12', '01004591695', 'arakha70@gmail.com', 'java', '28 - Sep - 2018', '', 'arakha10');

-- --------------------------------------------------------

--
-- Table structure for table `librarian_registeration`
--

CREATE TABLE `librarian_registeration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian_registeration`
--

INSERT INTO `librarian_registeration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES
(1, 'ahmed', 'belal', 'ahmedbelal10', 'A7medbelal10', 'ahmedbelal@gmail.com', '01067853100'),
(2, 'osman', 'soliman', 'osmansoliman', 'osmansoliman', 'osmansolimangmail.com', '01004598748');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(5) NOT NULL,
  `librarian` varchar(255) NOT NULL,
  `sUsername` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `reading` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `librarian`, `sUsername`, `title`, `msg`, `reading`) VALUES
(4, 'ahmedbelal10', 'arakha10', 'warning', 'activate your account', 'y'),
(5, 'ahmedbelal10', 'elsayedyassin', 'pourchase', 'please purchase your account', 'y'),
(6, 'osmansoliman', 'khaledbelal', 'hello', 'welcome to our library', 'y'),
(7, 'osmansoliman', 'ahmedali', 'Welcom', 'Welcome ahmed ali to our library \r\nwe hope to be happy with us ', 'y'),
(8, 'ahmedbelal10', 'khaledbelal', 'Message 02', 'Welcome khaled , we are very happy to be with us ', 'y'),
(9, 'osmansoliman', 'khaledbelal', 'hello', 'we have added to books to you ', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `student_registeration`
--

CREATE TABLE `student_registeration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `enrollmentno` varchar(255) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_registeration`
--

INSERT INTO `student_registeration` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `sem`, `enrollmentno`, `status`) VALUES
(1, 'ahmed', 'rakha', 'arakha10', 'A7med7amed', 'arakha70@gmail.com', '01004591695', '12', '1258', 'yes'),
(3, 'ahmed', 'ali', 'ahmedali', 'ahmedali14', 'ahmedali@gmail.com', '0100489851', '47', '136464', 'yes'),
(4, 'khaled', 'belal', 'khaledbelal', 'khaledbelal10', 'khaledbelal@gmail.com', '0100458736', '14', '125987', 'yes'),
(5, 'Elsayed', 'Hasseb', 'elsayedyassin', 'elsayedyassin10', 'elsayedyassin@gmail.com', '01005487699', '29', '100200', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_books`
--
ALTER TABLE `add_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian_registeration`
--
ALTER TABLE `librarian_registeration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registeration`
--
ALTER TABLE `student_registeration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_books`
--
ALTER TABLE `add_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `librarian_registeration`
--
ALTER TABLE `librarian_registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_registeration`
--
ALTER TABLE `student_registeration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
