-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2022 at 09:08 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aussiemi_nnlifestyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `attachment1`, `display_order`, `img_url`, `timeStamp`) VALUES
(6, 'NN Bumper', 'http://localhost:8080/nnlifestyle.com.np/uploads/medium/Pana-3.jpg', 1, '', '2020-09-26 04:29:16'),
(7, 'NN Bumper', 'http://nnlifestyle.com.np/uploads/medium/Pana-2.jpg', 2, '', '2018-08-21 14:20:04'),
(8, 'NN Bumper', 'http://nnlifestyle.com.np/uploads/medium/Pana-3.jpg', 3, '', '2018-08-21 14:28:24'),
(9, 'NN Bumper', 'http://nnlifestyle.com.np/uploads/medium/Pana-4.jpg', 4, '', '2018-08-21 14:30:03'),
(10, 'NN Bumper', 'http://nnlifestyle.com.np/uploads/medium/Pana-5.jpg', 5, '', '2018-08-21 14:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `display_in_home` enum('No','Yes') NOT NULL,
  `shortdesc` longtext NOT NULL,
  `tags` enum('Men','Women','Bags') NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `display_order`, `attachment1`, `display_in_home`, `shortdesc`, `tags`, `permalink`, `timeStamp`) VALUES
(1, 'Jackets', 1, 'http://localhost:8080/nnlifestyle.com.np/uploads/medium/IMG_3133.JPG', 'Yes', '<p>hello</p>\r\n', 'Men', 'jackets', '2020-10-07 15:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `page_type` varchar(100) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `type` enum('inactive','active') NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `page_type`, `page_title`, `description`, `attachment1`, `type`, `timeStamp`) VALUES
(1, 'About Us', 'Our Story', '<p>NN Lifestyle is&nbsp; a New Concept company</p>\r\n', 'http://nnlifestyle.com.np/uploads/medium/Logo.jpg', 'active', '2018-08-15 10:27:23'),
(2, 'Contact Us', 'Contact Us Caption', '<p>Thank you for visiting our website. If you would like to get into contact with us simply fill out the nifty form below. Cheers!</p>\r\n', '', 'inactive', '2018-07-27 08:51:11'),
(3, 'Home Page Offer Section', 'SALE OFF UP TO 50%', '<p>New Arriaval</p>\r\n', 'http://nnlifestyle.com.np/uploads/medium/midbg.jpg', 'active', '2018-08-21 14:40:09'),
(4, 'Chef Appointment', 'Chef Appointment', '<p>Our chefs are constantly conjuring new ideas for cake design and innovation with new cakes. We try to be topical and up to date with our design ideas. However if you want your personal touch and we can make a tailor made cake just for you.</p>\r\n', '', 'inactive', '2018-02-05 04:36:31'),
(5, 'Discount Left', '30% Discount', '<p>30 % discount on selected Pastries ffff</p>\r\n', '', 'inactive', '2018-02-13 09:47:59'),
(6, 'Discount Right', 'Flat 15 %Discount', '<p>Lunch Box is available with discount</p>\r\n', '', 'inactive', '2018-02-05 12:01:40'),
(7, 'Free Delivery', 'Free Delivery', '<p>Free Delivery above 10 pounds only, others condition applies</p>\r\n', '', 'inactive', '2018-02-05 12:08:23'),
(8, 'Gift Wrap', 'Gift Wrap', '<p>We offer fresh FREE birthday candles on every delivery.</p>\r\n', '', 'inactive', '2018-02-05 12:15:50'),
(13, 'Customer Service', 'Customer Service', '<p>customer service details goes here</p>\r\n', '', 'inactive', '2018-02-04 12:28:08'),
(14, 'Delivery Policy', 'Delivery Policy', '<p>NYP</p>\r\n', '', 'active', '2018-07-30 13:43:35'),
(15, 'Orders and Returns', 'Orders and Returns', '<p>your orders and returns details goes here</p>\r\n', '', 'inactive', '2018-02-04 12:28:56'),
(16, 'Terms & Conditions', 'Terms & Conditions', '<p>your terms &amp; conditions goes here</p>\r\n', '', 'active', '2018-07-27 04:11:28'),
(17, 'Footer Text', 'Footer Text', '<p>Sara Bakery is a sister organization of himalayan beanz coffee, Kathmandu, Nepal. Sara Bakery started as in-house bakery operation for<br />\r\nhimalayan beanz coffee, with good feedback and accolades from our regular customers we have ventured outside and now Sara Bakery is known for.</p>\r\n', '', 'inactive', '2018-02-04 12:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `coupon_token` varchar(256) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `title`, `coupon_token`, `discount`, `status`, `timeStamp`) VALUES
(1, 'Festival Offer', 'G5M9CPQS', '30', 'active', '2018-02-18 14:07:25'),
(2, 'Christmas Offer', 'CW6TXR03', '10', 'active', '2018-07-27 06:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_show_password` varchar(500) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dateofbirth` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email_verification_key` varchar(500) NOT NULL,
  `email_varified` tinyint(1) NOT NULL,
  `country` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `address` varchar(200) NOT NULL,
  `zipcode` varchar(250) NOT NULL,
  `pcode` varchar(250) NOT NULL,
  `shipping` enum('no','yes') NOT NULL,
  `shipping_fname` varchar(250) NOT NULL,
  `shipping_lname` varchar(250) NOT NULL,
  `shipping_full_name` varchar(500) NOT NULL,
  `shipping_phone_number` varchar(250) NOT NULL,
  `shipping_country` varchar(250) NOT NULL,
  `shipping_state` varchar(250) NOT NULL,
  `shipping_city` varchar(250) NOT NULL,
  `shipping_address` varchar(500) NOT NULL,
  `shipping_zipcode` varchar(250) NOT NULL,
  `shipping_pcode` varchar(250) NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `attachment1`, `user_email`, `user_password`, `user_show_password`, `full_name`, `last_name`, `gender`, `dateofbirth`, `phone`, `email_verification_key`, `email_varified`, `country`, `state`, `city`, `address`, `zipcode`, `pcode`, `shipping`, `shipping_fname`, `shipping_lname`, `shipping_full_name`, `shipping_phone_number`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_address`, `shipping_zipcode`, `shipping_pcode`, `user_registered`, `status`) VALUES
(20, '', 'rocky@gmail.com', 'c5fe25896e49ddfe996db7508cf00534', '55555', 'Rocky', 'Johnson', '', '0000-00-00', '9803141438', '', 0, 'Nepal', 'No State', 'Dhankuta', 'Dhankuta', '', '', 'yes', '', '', '', '', '', '', '', '', '', '', '2018-07-03 05:20:24', 'active'),
(21, '', 'wfybiz100@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Rick Lee', 'Lee', 'Female', '2020-09-23', '9803141438', '', 0, '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '2018-07-25 11:10:47', 'active'),
(22, '', 'wfybiz5000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Rick Lee', 'Lee', '', '0000-00-00', '5555555555', '', 0, '', '', '', '777', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '2018-07-27 08:58:39', 'active'),
(23, '', 'nirojshresthar@gmail.com', '438bd88a7df3b1f48cbc27246a5e606e', 'm@9851069917', 'Niroj', 'Shrestha', '', '0000-00-00', '9851069917', '', 0, '', '', '', 'Kathmanandu', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '2018-08-15 10:59:32', 'active'),
(24, '', 'nnlifestyle11@gmail.com', '415f59fa781e2b43114efa5df34ef9d5', 'm@9851089635', 'Niyam', 'Subedi', '', '0000-00-00', '9851089635', '', 0, '', '', '', 'Kathmandu', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '2018-08-15 15:44:36', 'active'),
(25, '', 'abhinavmdhr5@gmail.com', '720e9733f722a756dec6a53fa6c71549', '9813740025', 'Trubo', 'Manandhar', '', '0000-00-00', '9813740025', '', 0, '', '', '', 'Balaju', '', '', 'no', '', '', '', '', '', '', '', '', '', '', '2020-06-09 08:31:41', 'active'),
(28, '', 'sunil@gmail.com', '0016eef2827ac2424d9e96fc40ffc5fb', 'Sunil@123', 'Sunil Sharma', '', '', '0000-00-00', '9806612346', '', 0, '', '', '', '', '', '', 'no', '', '', 'Sunil Shrestha', '9802222222', 'Nepal', '', 'Kathmandu', 'Rani Phokhari', '', '', '2020-10-04 16:46:42', 'active'),
(31, '', 'anjayshrestha89@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'abc', 'Anjay Shrestha', '', '', '0000-00-00', '', '', 0, '', '', '', '', '', '', 'no', '', '', 'Anjay Shrestha', '9754888542', 'Nepal', '', 'Kathmandu', 'Banasthali', '', '', '2021-03-21 06:26:24', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(250) NOT NULL,
  `items` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `discount` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Pending','Approved','Cancel') NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(250) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `permalink` varchar(100) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `pinfo` enum('no','yes') NOT NULL,
  `delivery_first_name` varchar(100) NOT NULL,
  `delivery_last_name` varchar(100) NOT NULL,
  `delivery_full_name` varchar(250) NOT NULL,
  `delivery_phone` varchar(250) NOT NULL,
  `delivery_country` varchar(250) NOT NULL,
  `delivery_state` varchar(250) NOT NULL,
  `delivery_city` varchar(250) NOT NULL,
  `delivery_address` varchar(250) NOT NULL,
  `delivery_zipcode` varchar(250) NOT NULL,
  `delivery_pcode` varchar(250) NOT NULL,
  `perkm` int(11) NOT NULL,
  `perkm_amt` int(11) NOT NULL,
  `totaldistance` varchar(250) NOT NULL,
  `delivery_charge` enum('no','yes') NOT NULL,
  `tax` varchar(100) NOT NULL,
  `shipping` enum('no','yes') NOT NULL,
  `user_session_id` varchar(250) NOT NULL,
  `user_type` enum('member','guest') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_no`, `items`, `price`, `coupon`, `discount`, `qty`, `total`, `status`, `prod_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `color`, `size`, `permalink`, `pcode`, `method`, `pinfo`, `delivery_first_name`, `delivery_last_name`, `delivery_full_name`, `delivery_phone`, `delivery_country`, `delivery_state`, `delivery_city`, `delivery_address`, `delivery_zipcode`, `delivery_pcode`, `perkm`, `perkm_amt`, `totaldistance`, `delivery_charge`, `tax`, `shipping`, `user_session_id`, `user_type`, `order_date`) VALUES
(1, '#PU18030603I1', ' Finger Ring', '800', '', '0', 1, 800, 'Pending', 19, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-07 18:03:13'),
(2, '#PU18030603I1', 'Ear Ring', '1600', '', '0', 1, 1600, 'Pending', 17, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-07 18:03:13'),
(3, '#PU18490603I2', 'Necklace', '1600', '', '0', 1, 1600, 'Pending', 20, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Jawalakhel Chowk, Patan, Nepal', '', '', 1, 250, '0.3 km', 'no', '13', '', '1', 'member', '2018-06-07 18:04:01'),
(4, '#PU18100640I3', 'Birthday Boy Cake', '600', '', '', 1, 600, 'Pending', 0, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Dhulikhel, Nepal', '', '', 1, 250, '28.4 km', 'yes', '', '', '1', 'member', '2018-06-07 18:40:41'),
(5, '#PU18110651I4', 'Silver Necklace', '1600', '', '0', 1, 1600, 'Pending', 12, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-14 13:51:40'),
(6, '#PU18110651I4', 'Cell Phone Cover', '1000', '', '0', 1, 1000, 'Pending', 7, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-14 13:51:40'),
(7, '#PU18110651I4', 'Cell Phone Cover', '1000', '', '0', 1, 1000, 'Pending', 7, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-14 13:51:40'),
(8, '#PU18590638I5', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:39:16'),
(9, '#PU18590638I5', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:39:16'),
(10, '#PU18590638I5', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:39:16'),
(11, '#PU18300640I6', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Western Development Region, Nepal', '', '', 1, 250, '213 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:40:54'),
(12, '#PU18300640I6', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Western Development Region, Nepal', '', '', 1, 250, '213 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:40:54'),
(13, '#PU18300640I6', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Western Development Region, Nepal', '', '', 1, 250, '213 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:40:54'),
(14, '#PU18520641I7', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Phewa Lake, Pokhara, Nepal', '', '', 1, 250, '204 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:42:04'),
(15, '#PU18520641I7', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Phewa Lake, Pokhara, Nepal', '', '', 1, 250, '204 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:42:05'),
(16, '#PU18520641I7', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Phewa Lake, Pokhara, Nepal', '', '', 1, 250, '204 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:42:05'),
(17, '#PU18530644I8', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:45:24'),
(18, '#PU18530644I8', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:45:24'),
(19, '#PU18530644I8', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:45:24'),
(20, '#PU18050651I9', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:51:22'),
(21, '#PU18050651I9', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:51:22'),
(22, '#PU18050651I9', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:51:22'),
(23, '#PU18250654I10', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:54:36'),
(24, '#PU18250654I10', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:54:36'),
(25, '#PU18250654I10', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:54:36'),
(26, '#PU18010656I11', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:56:09'),
(27, '#PU18010656I11', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:56:09'),
(28, '#PU18010656I11', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'East - West Highway, Kawasoti, Nepal', '', '', 1, 250, '176 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:56:09'),
(29, '#PU18380656I12', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Phewa Lake, Pokhara, Nepal', '', '', 1, 250, '204 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:56:51'),
(30, '#PU18380656I12', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Phewa Lake, Pokhara, Nepal', '', '', 1, 250, '204 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:56:51'),
(31, '#PU18380656I12', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Phewa Lake, Pokhara, Nepal', '', '', 1, 250, '204 km', 'yes', '13', '', '1', 'member', '2018-06-15 05:56:51'),
(32, '#PU18150621I13', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:21:28'),
(33, '#PU18150621I13', 'Necklace', '2000', '', '0', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:21:28'),
(34, '#PU18150621I13', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:21:28'),
(35, '#PU18280638I14', 'Ear Ring', '600', '', '0', 1, 600, 'Pending', 16, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:38:55'),
(36, '#PU18280638I14', 'Finger Ring', '400', '', '0', 1, 400, 'Pending', 11, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:38:55'),
(37, '#PU18280638I14', 'Samsung J7', '21,000', '', '0', 1, 21, 'Pending', 8, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:38:55'),
(38, '#PU18280638I14', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 06:38:55'),
(39, '#PU18240607I15', 'Finger Ring', '400', '', '0', 1, 400, 'Pending', 11, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 09:08:05'),
(40, '#PU18240607I15', 'product3', '6000', '', '0', 1, 6000, 'Pending', 3, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 09:08:06'),
(41, '#PU18240607I15', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '0', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'no', 'John', 'Smith', '', '', '', '', '', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 250, '8.9 km', 'yes', '13', '', '1', 'member', '2018-06-15 09:08:06'),
(42, '#PU18190620I16', 'Finger Ring', '400', 'G5M9CPQS', '30', 1, 400, 'Pending', 11, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', '', '', '', 'Babar Mahal, Kathmandu, Nepal', '', '', 1, 250, '3.8 km', 'yes', '13', '', '1', 'member', '2018-06-18 09:20:42'),
(43, '#PU18190620I16', 'Necklace', '2000', 'G5M9CPQS', '30', 1, 2000, 'Pending', 13, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', '', '', '', 'Babar Mahal, Kathmandu, Nepal', '', '', 1, 250, '3.8 km', 'yes', '13', '', '1', 'member', '2018-06-18 09:20:42'),
(44, '#PU18190620I16', 'product3', '6000', 'G5M9CPQS', '30', 1, 6000, 'Pending', 3, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', '', '', '', 'Babar Mahal, Kathmandu, Nepal', '', '', 1, 250, '3.8 km', 'yes', '13', '', '1', 'member', '2018-06-18 09:20:42'),
(45, '#PU18190620I16', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', 'G5M9CPQS', '30', 1, 100, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', '', '', '', 'Babar Mahal, Kathmandu, Nepal', '', '', 1, 250, '3.8 km', 'yes', '13', '', '1', 'member', '2018-06-18 09:20:42'),
(46, '#PU18550605I17', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Ram', 'Charan', '', '', 'Nepal', 'No State', 'Birgunj', 'Butwal, Nepal', '222', '12578', 1, 250, '265 km', 'yes', '13', 'yes', '1', 'member', '2018-06-21 05:06:42'),
(47, '#PU18430610I18', 'Finger Ring', '400', '', '', 1, 400, 'Pending', 11, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', 'Nepal', 'No State', 'Kathmandu', 'Chabahil, Kathmandu, Nepal', '222', '89979', 1, 250, '7.9 km', 'yes', '13', 'yes', '1', 'member', '2018-06-21 05:11:04'),
(48, '#PU18430610I18', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', 'Nepal', 'No State', 'Kathmandu', 'Chabahil, Kathmandu, Nepal', '222', '89979', 1, 250, '7.9 km', 'yes', '13', 'yes', '1', 'member', '2018-06-21 05:11:04'),
(49, '#PU18030615I19', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Rick Lee Lama', 'wfybiz@gmail.com', '980123456789', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rick Lee', 'Lama', '', '', 'United States', 'Illinois', 'Albany', 'Begnas Lake, Lekhnath, Nepal', '222', '12578', 1, 250, '190 km', 'yes', '13', 'no', 'guest', 'guest', '2018-06-21 10:15:37'),
(50, '#PU18170631I20', 'product3', '6000', '', '', 1, 6000, 'Pending', 3, 'John Smith', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', 'Nepal', 'No State', 'Kathmandu', 'Chabahil Chowk, Ring Road, Kathmandu, Nepal', '222', '89979', 1, 250, '7.7 km', 'yes', '13', 'yes', '1', 'member', '2018-06-21 10:31:35'),
(51, '#PU18520632I21', 'product3', '6000', '', '', 1, 12000, 'Pending', 3, 'Ram Charan', 'ramcharan@gmail.com', '123568879', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Ram', 'Charan', '', '', 'India', 'Madhya Pradesh', 'Chakra', 'Bis Hazari Lake, Bharatpur, Nepal', '222', '4649', 1, 250, '157 km', 'yes', '13', 'no', 'guest', 'guest', '2018-06-21 10:33:33'),
(52, '#PU18360645I22', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', 'Nepal', 'No State', 'Kathmandu', 'Kavre Nitya Chandeshwor, Nepal', '222', '89979', 1, 250, '34.2 km', 'yes', '13', 'yes', '1', 'member', '2018-06-26 03:46:10'),
(53, '#PU18140608I23', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '', 'Nepal', 'No State', 'Kathmandu', 'Zero Kilo, Panchkhal, Nepal', '222', '89979', 1, 250, '45.5 km', 'yes', '13', 'yes', '1', 'member', '2018-06-26 04:16:49'),
(54, '#PU18120750I24', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Cyam', 'Gurung', '', '8888888888', 'Nepal', 'No State', 'Charikot', 'Charikot Bazar, Bhimeshwor Municipality, Nepal', '222', '578', 1, 250, '130 km', 'yes', '13', 'no', '1', 'member', '2018-07-01 04:50:46'),
(55, '#PU18030702I25', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Ayan', 'Lama', '', '5555555', 'Nepal', 'No State', 'Kathmandu', 'Boudhanath, Kathmandu, Nepal', '02356', '578', 1, 100, '8.9 km', 'yes', '13', 'no', '1', 'member', '2018-07-01 05:02:42'),
(56, '#PU18300703I26', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Aaron', 'Lama', '', '99999999', 'Nepal', 'No State', 'Bhadrapur', 'Bhadrapur, Nepal', '02356', '8', 1, 300, '455 km', 'yes', '13', 'no', '1', 'member', '2018-07-01 05:04:09'),
(57, '#PU18030717I27', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Rick Lee Lama', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rick Lee', 'Lama', '', '9803141438', 'Nepal', 'No State', 'Kathmandu', 'Boudhanath, Kathmandu, Nepal', '', '', 1, 100, '8.9 km', 'yes', '13', 'no', 'guest', 'guest', '2018-07-02 10:17:28'),
(58, '#PU18220735I28', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Rick Lee Lama', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rick Lee', 'Lama', '', '9803141438', 'Nepal', 'No State', 'Chandrapur', 'Chandrapur, Nepal', '', '', 1, 300, '150 km', 'yes', '13', 'no', 'guest', 'guest', '2018-07-02 10:36:20'),
(59, '#PU18170738I29', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Rick Lee Lama', 'wfybiz@gmail.com', '9803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rick Lee', 'Lama', '', '9803141438', 'Nepal', 'No State', 'Chandrapur', 'Chandrapur, Nepal', '', '', 1, 300, '150 km', 'yes', '13', 'no', 'guest', 'guest', '2018-07-02 10:38:43'),
(60, '#PU18180752I30', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Rick Lee Lama', 'wfybiz@gmail.com', '+9779803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rick Lee', 'Lama', '', '+9779803141438', 'Nepal', 'No State', 'Charikot', 'Charikot, Bhimeshwor Municipality, Nepal', '', '', 1, 300, '131 km', 'yes', '13', 'no', 'guest', 'guest', '2018-07-02 10:52:47'),
(61, '#PU18150701I31', 'product3', '6000', '', '', 1, 6000, 'Pending', 3, 'John Smith', 'wfybiz@gmail.com', '+9779803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rohit', 'Lama', '', '+9779803141439', 'Nepal', 'No State', 'Biratchowk', 'Biratchowk, Koshi Haraicha, Nepal', '', '', 1, 300, '373 km', 'yes', '13', 'no', '1', 'member', '2018-07-02 11:01:55'),
(62, '#PU18570725I32', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Rocky Johnson', 'rocky@gmail.com', '+9779803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Rocky', 'Johnson', '', '+9779803141438', 'Nepal', 'No State', 'Dhankuta', 'Dhankuta, Nepal', '', '', 1, 300, '426 km', 'yes', '13', 'yes', '20', 'member', '2018-07-03 05:26:36'),
(63, '#PU18040733I33', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'Allu Arjun', 'allu@gmail.com', '+977980123456', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Allu', 'Arjun', '', '+977980123456', 'Nepal', 'No State', 'Chandrapur', 'Chandrapur, Nepal', '', '', 1, 300, '150 km', 'yes', '13', 'no', 'guest', 'guest', '2018-07-03 05:33:49'),
(64, '#PU18570739I34', 'product3', '6000', '', '', 1, 6000, 'Pending', 3, 'Ram Poninenit', 'ramp@gmail.com', '+91123456789', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'Ram', 'Poninenit', '', '+91123456789', 'India', 'Maharashtra', 'Bandra', 'Bandipur, Nepal', '', '', 1, 300, '146 km', 'yes', '13', 'no', 'guest', 'guest', '2018-07-03 05:41:09'),
(65, '#PU18090752I35', 'Lenovo K8 (3GB RAM, 32GB) hello', '100', '', '', 1, 500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '+9779803141438', '', NULL, NULL, '', '', 'Himalayan Bank', 'yes', 'John', 'Smith', '', '+9779803141438', 'Nepal', 'No State', 'Kathmandu', 'Dhulikhel Hospital, Dhulikhel, Nepal', '', '', 1, 150, '28.0 km', 'yes', '13', 'yes', '1', 'member', '2018-07-05 03:52:20'),
(66, '#PU18210715I36', 'Trouser', '800', 'CW6TXR03', '10', 2, 1600, 'Pending', 2, 'John Smith', 'wfybiz@gmail.com', '9803141438', 'Boudhanath, Kathmandu, Nepal', 'blue', 'M', 'trouser', 'nspc#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '1', 'member', '2018-07-27 08:15:27'),
(67, '#PU18210715I36', 'Rainy Jacket', '1500', 'CW6TXR03', '10', 1, 1500, 'Pending', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', 'Boudhanath, Kathmandu, Nepal', 'red', 'S', 'rainy-jacket', 'nspc#1', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '1', 'member', '2018-07-27 08:15:27'),
(68, '#PU18160733I37', 'Rainy Jacket', '1500', '', '0', 1, 1500, 'Approved', 1, 'John Smith', 'wfybiz@gmail.com', '9803141438', 'Boudhanath, Kathmandu, Nepal', 'red', 'S', 'rainy-jacket', 'nspc#1', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '1', 'member', '2018-07-27 08:33:18'),
(69, '#PU18330800I38', 'NN Bumper', '1500', '', '0', 2, 3000, 'Approved', 6, 'Niroj Shrestha', 'nirojshresthar@gmail.com', '9851069917', 'Kathmanandu', 'Red', 'L', 'nn-bumper', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '23', 'member', '2018-08-15 11:00:48'),
(70, '#PU18010847I39', 'NN Bumper', '1500', '', '0', 2, 3000, 'Pending', 6, 'Niyam Subedi', 'nnlifestyle11@gmail.com', '9851089635', 'Kathmandu', 'WB Mix', 'L', 'nn-bumper', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '24', 'member', '2018-08-15 15:47:04'),
(71, '#PU18290807I40', 'NN Bumper', '1500', '', '0', 1, 1500, 'Pending', 6, 'Niroj Shrestha', 'nirojshresthar@gmail.com', '9851069917', 'Kathmanandu', ' Blue', 'L', 'nn-bumper', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '23', 'member', '2018-08-16 11:07:32'),
(72, '#PU20550633I41', 'NN Bumper NP', '1500', '', '0', 3, 4500, 'Pending', 6, 'Trubo Manandhar', 'abhinavmdhr5@gmail.com', '9813740025', 'Balaju', 'WB Mix', 'L', 'nn-bumper-np', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '25', 'member', '2020-06-09 08:34:03'),
(73, '#PU20550633I41', 'NN Bumper NP', '1500', '', '0', 2, 3000, 'Pending', 6, 'Trubo Manandhar', 'abhinavmdhr5@gmail.com', '9813740025', 'Balaju', 'WB Mix', 'L', 'nn-bumper-np', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '25', 'member', '2020-06-09 08:34:03'),
(74, '#PU20341016I42', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, ' ', 'sunil@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '28', 'member', '2020-10-08 06:16:42'),
(75, '#PU20261017I43', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, ' ', 'sunil@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', '', '', '', '', '', '', '', '', 0, 0, '', 'no', '13', 'no', '28', 'member', '2020-10-08 06:17:28'),
(76, '#PU20201056I44', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, 'Sunil', 'sunil@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', 'Sunil Sherma', '9801111111', 'Nepal', '', 'Pokhara', 'fewa lake', '', '', 0, 0, '', 'no', '13', 'no', '28', 'member', '2020-10-08 07:56:23'),
(77, '#PU20431009I45', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, 'Sunil', 'sunil@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', 'Sunil Sherma', '9801111111', 'Nepal', '', 'Pokhara', 'fewa lake', '', '', 0, 0, '', 'no', '13', 'no', '28', 'member', '2020-10-08 08:09:50'),
(78, '#PU20191016I46', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, 'Sunil', 'sunil@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', 'Sunil Shrestha', '9802222222', 'Nepal', '', 'Kathmandu', 'Rani Phokhari', '', '', 0, 0, '', 'no', '13', 'no', '28', 'member', '2020-10-08 08:16:22'),
(79, '#PU20191016I46', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, 'Sunil', 'sunil@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', 'Sunil Shrestha', '9802222222', 'Nepal', '', 'Kathmandu', 'Rani Phokhari', '', '', 0, 0, '', 'no', '13', 'no', '28', 'member', '2020-10-08 08:16:26'),
(80, '#PU21190329I47', 'NN Bumper NP', '1500', '', '0', 1, 1500, 'Pending', 6, 'Anjay Shrestha', 'anjayshrestha89@gmail.com', '', '', 'Pink', 'S', 'nn-bumper-np', '#2', '', 'no', '', '', 'Anjay Shrestha', '9754888542', 'Nepal', '', 'Kathmandu', 'Banasthali', '', '', 0, 0, '', 'no', '13', 'no', '31', 'member', '2021-03-21 06:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `attachment1`, `display_order`, `designation`, `description`, `timeStamp`) VALUES
(1, 'Steve Malone', 'http://megaweblink.com.np/kanaan/uploads/medium/slider5.jpeg', 1, 'Manager', '<p>Strip steak swine nisi sunt porchetta. Cillum shoulder<br />\r\ncommodo frankfurter exercitation cupidatat est et sunt velit<br />\r\nchicken aute pork. Tail excepteur brisket duis qui.</p>\r\n', '2017-11-14 09:13:20'),
(2, 'Steve Malone', 'http://megaweblink.com.np/kanaan/uploads/medium/user2-160x160.jpg', 2, 'Manager', '<p>Strip steak swine nisi sunt porchetta. Cillum shoulder<br />\r\ncommodo frankfurter exercitation cupidatat est et sunt velit<br />\r\nchicken aute pork. Tail excepteur brisket duis qui.</p>\r\n', '2017-11-14 09:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(100) NOT NULL,
  `colors` longtext NOT NULL,
  `psize` longtext NOT NULL,
  `best_selling` enum('No','Yes') NOT NULL,
  `feature` enum('No','Yes') NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_slug` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `permalink` varchar(100) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pcode`, `title`, `attachment1`, `display_order`, `description`, `price`, `colors`, `psize`, `best_selling`, `feature`, `cat_id`, `cat_slug`, `category`, `tags`, `permalink`, `timeStamp`) VALUES
(6, '#2', 'NN Bumper NP', 'http://nnlifestyle.com.np/uploads/medium/IMG_3128.JPG', 2, '', 1500, 'Pink, Blue, Mix, Combat,Combat Lite,WB Mix', 'S,M,L', 'Yes', 'Yes', 1, 'jackets', 'Jackets', 'Men', 'nn-bumper-np', '2020-10-04 15:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `attachment2` varchar(100) NOT NULL,
  `attachment3` varchar(100) NOT NULL,
  `attachment4` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `attachment1`, `attachment2`, `attachment3`, `attachment4`, `color`, `prod_id`, `timeStamp`) VALUES
(1, 'http://nnlifestyle.com.np/uploads/medium/bag.png', 'http://nnlifestyle.com.np/uploads/medium/shirt.png', '', '', 'red', 1, '2018-07-18 03:37:43'),
(2, '', '', '', '', 'white', 1, '2018-07-18 03:47:59'),
(3, '', '', '', '', 'blue', 1, '2018-07-18 03:48:26'),
(4, '', '', '', '', 'green', 1, '2018-07-18 04:51:21'),
(5, '', '', '', '', 'pink', 2, '2018-07-18 04:53:45'),
(6, '', '', '', '', 'black', 2, '2018-07-19 05:50:10'),
(7, '', '', '', '', 'black', 3, '2018-07-24 05:28:36'),
(8, '', '', '', '', 'grey', 2, '2018-07-24 05:31:47'),
(9, '', '', '', '', 'black', 5, '2018-08-15 08:35:39'),
(10, '', '', '', '', 'Red', 6, '2018-08-15 08:36:59'),
(11, 'http://nnlifestyle.com.np/uploads/medium/IMG_3136.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3137.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3138.JPG', '', ' Blue', 6, '2018-08-15 08:37:48'),
(12, 'http://nnlifestyle.com.np/uploads/medium/IMG_3140.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3141.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3142.JPG', '', ' Combat', 6, '2018-08-15 08:41:49'),
(13, 'http://nnlifestyle.com.np/uploads/medium/IMG_3105.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3107.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3108.JPG', '', ' Mix', 6, '2018-08-15 08:49:58'),
(14, 'http://nnlifestyle.com.np/uploads/medium/IMG_3146.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3147.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3149.JPG', '', 'Combat Lite', 6, '2018-08-15 09:00:51'),
(15, 'http://nnlifestyle.com.np/uploads/medium/IMG_3094.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3098.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3099.JPG', 'http://nnlifestyle.com.np/uploads/medium/IMG_3097.JPG', 'WB Mix', 6, '2018-08-15 09:55:32'),
(16, 'http://nnlifestyle.com.np/uploads/medium/7.png', 'http://nnlifestyle.com.np/uploads/medium/8.png', 'http://nnlifestyle.com.np/uploads/medium/9.png', '', 'Pink', 7, '2018-09-11 03:01:58'),
(17, 'http://localhost:8080/nnlifestyle.com.np/uploads/medium/IMG_3118.JPG', 'http://localhost:8080/nnlifestyle.com.np/uploads/medium/IMG_3115.JPG', 'http://localhost:8080/nnlifestyle.com.np/uploads/medium/IMG_3116.JPG', '', 'Pink', 6, '2019-12-31 03:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sub_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `email`, `sub_date`) VALUES
(1, 'wfybiz@gmail.com', '2017-11-14 08:31:04'),
(2, 'wfybiz1986@gmail.com', '2017-11-14 08:32:44'),
(3, 'wfybiz19866@gmail.com', '2017-11-14 08:33:54'),
(4, 'wfybiz19886@gmail.com', '2017-11-14 08:38:10'),
(5, 'wfybiz1000@gmail.com', '2018-07-27 05:39:50'),
(6, 'wfybiz2000@gmail.com', '2018-07-27 05:42:24');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `id` int(11) NOT NULL,
  `items` varchar(100) NOT NULL,
  `price` varchar(60) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `discount` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `permalink` varchar(100) NOT NULL,
  `pcode` varchar(100) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `temp_session_id` varchar(100) NOT NULL,
  `session_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_cart`
--

INSERT INTO `temp_cart` (`id`, `items`, `price`, `coupon`, `discount`, `qty`, `color`, `size`, `permalink`, `pcode`, `prod_id`, `temp_session_id`, `session_id`, `post_date`) VALUES
(2, 'NN Bumper', '1500', '', 0, 1, 'Red', 'S', 'nn-bumper', '#2', 6, 'zE4JAmes05pb3FtcZigfq!h8njdSaL', 0, '2018-08-15 11:10:14'),
(3, 'NN Bumper', '1500', '', 0, 1, 'WB Mix', 'L', 'nn-bumper', '#2', 6, 'pYhvMGyHmtoTWPBxI%OiFgfnqN25ac', 0, '2018-08-17 06:24:48'),
(4, 'NN Bumper', '1500', '', 0, 1, 'Combat Lite', 'L', 'nn-bumper', '#2', 6, 'JNkE@veBz7t1C!4fILVslmT%U3X5hn', 0, '2018-11-12 13:17:25'),
(5, 'NN Bumper', '1500', '', 0, 1, ' Blue', 'L', 'nn-bumper', '#2', 6, 'C7m1M@ZUa82XARYQE$BdtLu4gi9Jy%', 0, '2018-12-24 08:59:27'),
(6, 'NN Bumper', '1500', '', 0, 1, 'Red', 'M', 'nn-bumper', '#2', 6, 'CbMIT3RZhs@82ucLqWSekaf1i6NHrA', 0, '2019-05-04 05:16:13'),
(7, 'NN Bumper', '1500', '', 0, 1, 'WB Mix', 'L', 'nn-bumper', '#2', 6, 'QciMY4J5I6V3HyWsBxzoXNT$2!eSbK', 0, '2019-06-23 08:36:44'),
(8, 'NN Bumper NP', '1500', '', 0, 1, 'Pink', 'S', 'nn-bumper-np', '#2', 6, '39zg1JC2ujAnaLYQ7oc!ei4ZUkHN5$', 28, '2020-10-09 11:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `display_order` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `status` enum('Pending','Approved') NOT NULL,
  `timeStamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `attachment1`, `display_order`, `fname`, `email`, `address`, `phone`, `message`, `status`, `timeStamp`) VALUES
(1, 'http://localhost/niroz/sarabakery/uploads/medium/footer.jpg', 1, 'Rohit Lama', 'wfybiz@gmail.com', 'Boudha, Nayabasti', '9803141438', '<p>Plus, having a testimonial page serves as yet another indexed page on your website containing content covering product features, pain points, and keywords you&#39;re trying to rank for. Download our full collection of website homepage examples here to inspire your own homepage design.</p>\r\n', 'Pending', '2018-02-18 05:52:39'),
(2, '', 2, 'Ram Charan', 'waitingfuru@hotmail.com', 'Delhi, India', '98012345678', '<p>Download our full collection of website homepage examples here to inspire your own homepage design. Plus, having a testimonial page serves as yet another indexed page on your website containing content covering product features, pain points, and keywords you&#39;re trying to rank for.</p>\r\n', 'Approved', '2018-02-18 10:31:29'),
(3, '', 2, 'Allu Arjun', 'test@gmail.com', 'Hongkong, China', '12345678', '<p>dkdkkddkk fafawfwaf</p>\r\n', 'Pending', '2018-02-18 05:52:53'),
(4, 'http://localhost/niroz/sarabakery/uploads/medium/mid.jpg', 3, 'John Smith', 'roy@hotmail.com', 'Pokhara', '555666999', '<p>eeeeee</p>\r\n', 'Approved', '2018-02-18 10:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `wp_admin`
--

CREATE TABLE `wp_admin` (
  `id` int(11) NOT NULL,
  `attachment1` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `second_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `show_password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `delivery_amount` int(11) NOT NULL,
  `delivery_distance` int(11) NOT NULL,
  `viber` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `opening_hours` varchar(50) NOT NULL,
  `user_type` enum('Super Admin','Admin','User') NOT NULL,
  `status` enum('Active','Suspend') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `wp_admin`
--

INSERT INTO `wp_admin` (`id`, `attachment1`, `username`, `fullname`, `email`, `second_email`, `password`, `show_password`, `address`, `phone`, `delivery_amount`, `delivery_distance`, `viber`, `whatsapp`, `facebook`, `youtube`, `instagram`, `opening_hours`, `user_type`, `status`, `timestamp`) VALUES
(1, 'http://nnlifestyle.com.np/uploads/medium/Logo.jpg', 'nnstyle', 'NN Life Style', 'info@nnlifestyle.com.np', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'password', '<p>Chhetrapati, Kathmandu, Nepal</p>\r\n', '+977-9813210405 & 98', 250, 1, '+977-9813210405', '+977-9813210405', 'https://www.facebook.com/NNLifestyles', 'youtube', 'instagram', 'Sun - Fri : 10 AM - 6 PM', 'Super Admin', 'Active', '2018-08-21 14:38:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_admin`
--
ALTER TABLE `wp_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wp_admin`
--
ALTER TABLE `wp_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
