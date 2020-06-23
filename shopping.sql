-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 09:20 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pimg` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `cat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `pname`, `pimg`, `price`, `cat`) VALUES
(1, 'Flare Black Dress', 'd1.PNG', 1500, 'cloth'),
(2, 'Grey Trousers', 'd2.PNG', 1000, 'cloth'),
(3, 'Formal Blue Shirt', 'd3.PNG', 800, 'cloth'),
(6, 'Pink Dress', 'd4.PNG', 1200, 'cloth'),
(8, 'Yellow Kurti', 'd5.PNG', 1300, 'cloth'),
(9, 'Blue Kurta', 'd6.PNG', 1200, 'cloth'),
(10, 'Black Boots', 'sh1.PNG', 1200, 'shoe'),
(11, 'Pump Heels', 'sh2.PNG', 600, 'shoe'),
(12, 'Blue Loafers', 'sh3.PNG', 700, 'shoe'),
(13, 'Casual Shoes', 'sh4.PNG', 800, 'shoe'),
(14, 'Black Formal Shoes', 'sh5.PNG', 900, 'shoe'),
(15, 'Pencil Heels', 'sh6.PNG', 1500, 'shoe'),
(16, 'Wrist-watch', 'a1.PNG', 800, 'acc'),
(18, 'Floral Earring', 'a2.PNG', 230, 'acc'),
(19, 'Shoulder Bag', 'a3.PNG', 300, 'acc'),
(20, 'Bracelet', 'a4.PNG', 175, 'acc'),
(21, 'Leaf Neckpiece', 'a5.PNG', 300, 'acc'),
(22, 'Crown Ring', 'a6.PNG', 100, 'acc');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `s_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`s_id`, `u_id`, `p_id`, `quant`, `date`) VALUES
(31, 1, 19, 2, '2020-06-06'),
(32, 1, 18, 1, '2020-06-06'),
(33, 1, 15, 1, '2020-06-06'),
(34, 1, 19, 2, '2020-06-06'),
(35, 1, 18, 1, '2020-06-06'),
(36, 1, 15, 1, '2020-06-06'),
(37, 1, 12, 2, '2020-06-06'),
(38, 1, 12, 2, '2020-06-06'),
(39, 1, 1, 1, '2020-06-06'),
(47, 5, 11, 2, '2020-06-06'),
(48, 5, 1, 2, '2020-06-06'),
(49, 5, 22, 5, '2020-06-06'),
(50, 5, 2, 1, '2020-06-06'),
(51, 1, 1, 2, '2020-06-06'),
(52, 1, 9, 1, '2020-06-06'),
(53, 1, 13, 1, '2020-06-06'),
(54, 1, 21, 2, '2020-06-06'),
(55, 1, 1, 2, '2020-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `hno` varchar(3) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `uname`, `email`, `phone`, `pass`, `hno`, `city`, `state`) VALUES
(1, 'Madhurima ', 'madhu.chakraborty97@', '9873238991', 'abcd@1234', 'Hno', 'Gurugram', 'Haryana'),
(2, 'xyz', 'abc@xyz.com', '8956231474', '1234@abcd', '123', 'Ahmedabad', 'Gujrat'),
(3, 'lily', 'hhss@kkjj.com', '9999999999', 'aaaa@1111', 'za', 'dd', 'mm'),
(4, 'Admin', 'admin@shopping.com', '9999988888', 'admin@1234', '123', 'pune', 'maharashtra'),
(5, 'Jane Doe', 'jane.doe@domain.com', '8116707670', 'jane@123456', 'str', 'some city', 'state');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk_pro` (`p_id`),
  ADD KEY `fk_cus` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_cus` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `fk_pro` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
