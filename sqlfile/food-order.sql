-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 10:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(3, 'Adewale Temitope ', 'Horluwarmuyiwar', 'password1'),
(7, 'Oyegun Temitope ', 'Temitope', 'password1'),
(8, 'Ajibade Apotieri', 'Apoti wire', 'password'),
(9, 'Ogundeko Moses', 'Olurantex', 'password1'),
(20, 'ADAOBI FAVOUR', 'PHAYPHOR', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'FOOD', 'Food_Category_684.jpg', 'No', 'Yes'),
(16, 'Momo', 'Food_Category_695.jpg', 'Yes', 'Yes'),
(23, 'LONDON PIZZA', 'Food_Category_48.jpg', 'Yes', 'Yes'),
(24, 'Niger Pizza', 'Food_Category_143.jpg', 'Yes', 'Yes'),
(25, 'Fruit', 'Food_Category_237.jpg', 'Yes', 'Yes'),
(28, 'Ofada Rice', 'Food_Category_865.jpg', 'Yes', 'Yes'),
(29, 'Roasted Meat', 'Food_Category_49.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(1, 'Beans Pudding', 'savasvasvsa\r\n md nC KAD  C AXKA\r\nAAXAX AXAJBCKJXNACSC   sajnabxaxn  SCBkax AXA', '12.00', 'Food_Name_557.jpg', 16, 'Yes', 'Yes'),
(2, 'Beans', 'hjb hjxwbdxwadas scbaxsanmsx  jaxa n X mkaxjadx asc kjwdiwfns siudwdmqo ac aqsnhqqd sdxknaq ', '45.00', 'Food_Name_837.jpg', 1, 'Yes', 'Yes'),
(3, 'Pizza', 'sacnsc ckjc a casmcd Ckcaakm akadmcac sac v sx   xk s nks s sksc s scmsc,sc ', '50.00', 'Food_Name_549.jpg', 23, 'Yes', 'Yes'),
(4, 'Jolof Rice', 'Bujbs djadna dkadkan akjaadjda ajdad aka akasado sksiknsc scsijss kdadjsd kilan csod d sod akdnsc sck', '500.00', 'Food_Name_661.jpg', 1, 'Yes', 'Yes'),
(5, 'Pepper Soup', 'hgd dwhjwd bwd wjwkd swKJDM SC SJCa  kjd d sckjs  kskd scsac ssac lw d dks dN', '1222.00', 'Food_Name_592.jpg', 1, 'Yes', 'Yes'),
(6, 'Jolof Rice', 'ADCVDA JHDn aqdub djaana ajas j aaja a xajadld ba dknwdwjkbw wiwdqd akjd wawd askdbk dnwiw wdh ', '45.00', 'Food_Name_543.jpg', 1, 'Yes', 'Yes'),
(8, 'Pizza', 'hvjk  jkkb  jkn m    jnnm,k , knk , bk , blm jml     kbjbkj jkj   jjkb jjk jk  ', '58.00', 'Food_Name_813.jpg', 23, 'Yes', 'Yes'),
(10, 'Fresh Pineapple', 'ikjd d dndk wldkd x ksmkqd akddqad qkdaqma andakaqma adaqkdad ld;da d c;d;dcbf sdthew athe scid[', '500.00', 'Food_Name_121.jpg', 25, 'Yes', 'Yes'),
(12, 'Assorted Meat', 'hn  wdjndqkdq diadqmdqmd qdkqdqmqkdq dqdloqd qlqlqdm qd qadqd qd dlqdqldq dqoldqd.lqd qd qadld swldlwd ald', '500.00', 'Food_Name_839.jpg', 1, 'Yes', 'Yes'),
(13, 'Nigeria Delicacy for Swallow', 'Fresh and delicious delicacy for Nigeria swallow', '745.00', 'Food_Name_840.jpg', 1, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Jolof Rice', '150.00', 12, '1800.00', '2024-05-02 07:24:01', 'Cancelled', 'my full name', '9056487952', 'me@mydomain.com', 'full street address'),
(2, 'Jolof Rice', '150.00', 12, '1800.00', '2024-05-02 07:45:31', 'Cancelled', 'Temitope Oluwamuyiwa', '9056484578', '', 'Road 5C, MIC 3rd Building, AFUED, Ondo'),
(3, 'Jolof Rice', '150.00', 6, '900.00', '2024-05-02 07:56:21', 'Cancelled', 'Bolanle Odunayo', '80842156547', '', '108, Imoleayo Road 44, Alagbake, Akure'),
(4, 'Pepper Soup', '1222.00', 5, '6110.00', '2024-05-02 08:04:19', 'Cancelled', 'Adewale', '9056487921', 'me@mydomain.com', 'full street address hbks ksLms'),
(5, 'Fresh Pineapple', '500.00', 12, '6000.00', '2024-05-02 08:06:47', 'Delivered', 'my full name', '9056487952', 'me@mydomain.com', 'full street address'),
(6, 'Fresh Pineapple', '500.00', 13, '6500.00', '2024-05-02 08:08:06', 'Delivered', 'Lateefat Adefarati', '8025369878', 'lateefatadefarati@gmail.com', '45, Bolorundoro Street, Ondo'),
(7, 'Pizza', '50.00', 23, '1150.00', '2024-05-02 08:11:16', 'Delivered', 'Ibrahim Ajibade', '9124578695', 'ajibadeibramhim@gmial.com', 'Road 15, Fagun, Ondo'),
(8, 'Jolof Rice', '150.00', 12, '1800.00', '2024-05-02 08:13:10', 'Delivered', 'Bright Olaoluwa', '8136965478', 'bright@gmail.com', '56, Olanubi Street, Ondo'),
(9, 'Beans', '45.00', 6, '270.00', '2024-05-02 08:21:06', 'Delivered', 'Akorede Abosede', '8145782545', 'akoredeabosede@gmail.com', '24, Imoleayo Road 77, Alagbake, Akure'),
(10, 'Beans Pudding', '12.00', 6, '72.00', '2024-05-02 08:38:23', 'Delivered', 'Akorede Boluwatife', '9056487952', 'boluwatife@gmail.com', '8, Ajegunle Road 12, Oba Ile, Akure'),
(11, 'Fresh Pineapple', '500.00', 25, '12500.00', '2024-05-04 05:41:14', 'Delivered', 'Balogun Emmanuel', '9036587412', 'balogunemma@gmail.com', 'Onala Street, Ayeyemi, Ondo'),
(12, 'Assorted Meat', '500.00', 4, '2000.00', '2024-05-03 09:09:23', 'Delivered', 'Adedayo Mathew', '9058642152', 'adedeayo@gamil.com', '12, Olanubi Street, Ondo'),
(13, 'Assorted Meat', '500.00', 17, '8500.00', '2024-05-05 09:35:38', 'Delivered', 'Megbotiwon Mathew', '9058675465', 'megbotiwon@gamil.com', '12, Olanubi Street, Ondo'),
(14, 'Pizza', '50.00', 5, '250.00', '2024-05-06 02:18:18', 'Cancelled', 'Adeyemi Kolawole', '8175489657', 'adeyemi@gmail.com', 'Mis, AFUED, Ondo'),
(15, 'Pizza', '50.00', 5, '250.00', '2024-05-06 02:18:23', 'On Delivery', 'Adeyemi Kolawole', '8175489657', 'adeyemi@gmail.com', 'Mis, AFUED, Ondo'),
(16, 'Jolof Rice', '500.00', 12, '6000.00', '2024-05-06 04:35:33', 'On Delivery', 'Ibrahim Ajibade', '9124578695', 'ajibadeibramhim@gmial.com', 'Road 15, Fagun, Ondo'),
(17, 'Pizza', '50.00', 12, '600.00', '2024-05-14 01:42:50', 'On Delivery', 'Temitope Oluwamuyiwa', '9056484578', 'me@mydomain.com', 'Road 5C, MIC 3rd Building, AFUED, Ondo'),
(18, 'Pizza', '50.00', 39, '1950.00', '2024-05-16 02:31:40', 'On Delivery', 'Lateefat Adefarati', '8025369878', 'lateefatadefarati@gmail.com', '45, Bolorundoro Street, Ondo'),
(19, 'Jolof Rice', '45.00', 50, '2250.00', '2024-05-16 03:54:18', 'On Delivery', 'Fadire Timilehin Ridwan', '8156243545', 'masterdon@gmail.com', 'Room 25, Tetfund Hostel, AFUED Ondo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
