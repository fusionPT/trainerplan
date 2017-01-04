-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2017 at 04:07 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `athletes`
--

CREATE TABLE `athletes` (
  `a_id` int(11) NOT NULL,
  `trainerID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `a_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `athletes`
--

INSERT INTO `athletes` (`a_id`, `trainerID`, `username`, `password`, `a_name`, `email`, `a_date`) VALUES
(1, 2, 'athlete', '1234', 'Athlete 1', 'athlete1@gmail.com', '2016-12-27'),
(2, 2, 'jack', '1234', 'Jack Felicio', 'jackfelicio@gmail.com', '2016-12-27'),
(3, 1, 'john', '1234', 'John Doe', 'johndoe@gmail.com', '2016-12-26'),
(4, 1, 'ana', '1234', 'Ana Martins', 'anacata@gmail.com', '2016-12-27'),
(6, 2, 'Bruno', 'anacatarina', 'Bruno Felicio', 'gigafusion@gmail.com', '2016-12-27'),
(7, 2, 'vitinho', '1234', 'Vitor Manuel', 'vitor@email.com', '2016-12-27'),
(9, 2, 'manu', '1234', 'Manuel Hurtado', 'manuelh@gmail.com', '2016-12-27'),
(10, 2, 'lmartini', '1234', 'linda martini', 'lindamartini@gmail.com', '2016-12-27'),
(16, 1, 'carlos', '1234', 'Carlos Lopes', 'carloslopes@sportingcp.pt', '2016-12-28'),
(17, 1, 'usertest', '1234', 'User Test', 'usertest@gmail.com', '2016-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `e_id` int(11) NOT NULL,
  `athleteID` int(11) NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `e_date` varchar(20) NOT NULL,
  `done` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`e_id`, `athleteID`, `exercise`, `description`, `e_date`, `done`) VALUES
(1, 1, 'First exercise', 'This is the description of First exercise', '2016-12-27', 0),
(2, 3, 'exercise number two', 'This is the description of exercise number two', '0000-00-00', 0),
(3, 2, 'Exercise number 3', 'This is the description of exercise number 3', '2017-1-1', 0),
(5, 2, 'Easy 12k', 'This is the description of Easy 12k', '2017-1-4', 0),
(6, 2, '12 x 800', '', '2016-12-27', 0),
(7, 2, '6 x 1000 r 1\'30', '', '0000-00-00', 0),
(8, 4, '10k tempo', '', '2016-12-27', 0),
(9, 4, '5k tempo', '', '2016-12-27', 0),
(10, 7, '15 x 400 r3\' - V', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultricies feugiat enim lobortis ultricies. Cras bibendum sodales placerat. Integer tristique tortor in dui elementum blandit. Curabitur ante felis, maximus vel molestie non, blandit metus.', '2016-12-27', 0),
(11, 17, '12k soft run', '', '2016-12-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`t_id`, `t_name`, `username`, `password`, `email`, `date`) VALUES
(1, 'Ricardo Ribas 1', 'ricardo', '1234', '', '2016-12-27'),
(2, 'Pablo Villalobos 2', 'Pablo', '1234', '', '2016-12-26'),
(3, 'Brunex Felix', 'brunex', '1234', 'gigafusion@gmail.com', '2016-12-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athletes`
--
ALTER TABLE `athletes`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `trainerID` (`trainerID`);

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `athleteID` (`athleteID`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athletes`
--
ALTER TABLE `athletes`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `athletes`
--
ALTER TABLE `athletes`
  ADD CONSTRAINT `athletes_ibfk_1` FOREIGN KEY (`trainerID`) REFERENCES `trainers` (`t_id`);

--
-- Constraints for table `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`athleteID`) REFERENCES `athletes` (`a_id`);
