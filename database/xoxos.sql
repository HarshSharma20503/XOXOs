-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 09:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xoxos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Harsh Sharma', 'xoxosharsh', 'harsh1234', 'harsh@gmail.com'),
(2, 'Neha Mittal', 'xoxosNeha', 'Neha1234', 'Neha@gmail.com'),
(3, 'Shaily sharma', 'xoxosshaily', 'shaily6789', 'shaily@gmail.com'),
(4, 'Harshit Singh', 'xoxosharshit', 'harshit1234', 'harshit@gmail.com'),
(5, 'sarika mittal', 'xoxossharma', 'sarika1334', 'sarika@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `order_number`, `status`, `added_on`) VALUES
(1, 'Chaat & Snacks', 1, 1, '2020-06-16 12:06:33'),
(2, 'Chinese', 2, 1, '2020-06-16 12:06:41'),
(4, 'Desserts', 4, 1, '2020-06-16 12:07:18'),
(6, 'Italian', 3, 1, '2022-12-01 21:46:37'),
(12, 'North Indian', 12, 1, '2022-12-02 21:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`id`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `expired_on`, `status`, `added_on`) VALUES
(1, 'first21', 'F', 100, 500, '2023-10-12', 1, '2022-12-01 11:19:27'),
(2, '12345', 'P', 23, 700, '2022-03-12', 1, '2022-12-02 06:07:46'),
(3, 'coup3', 'F', 3, 700, '2022-12-31', 1, '2022-12-02 20:40:42'),
(4, 'coup4', 'F', 4, 300, '2022-12-31', 1, '2022-12-02 20:40:42'),
(5, 'coup5', 'P', 5, 400, '2022-12-28', 1, '2022-12-02 20:41:57'),
(6, 'coup6', 'P', 6, 300, '2022-12-31', 1, '2022-12-02 20:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dish` varchar(100) NOT NULL,
  `dish_detail` text NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `category_id`, `dish`, `dish_detail`, `price`, `status`, `added_on`) VALUES
(1, 4, 'Gulab Jamun', 'Gulab Jamun', 20, 1, '2020-06-17 10:43:59'),
(2, 1, 'Raj Kachori', 'Raj Kachori', 50, 1, '2020-06-17 10:46:06'),
(3, 2, 'Chow mein', 'Chow mein', 30, 1, '2020-06-17 10:47:26'),
(4, 1, 'Momos', 'Especially created with love and steamed with passion', 50, 1, '2022-12-01 12:09:38'),
(5, 4, 'Cookies', 'cookies are made with different types of flour , you can specify the kind you want', 600, 1, '2022-12-02 20:43:20'),
(6, 4, 'custard', 'Custard is a variety of culinary preparations based on sweetened milk, cheese, or cream cooked with egg or egg yolk to thicken it, and sometimes also flour, corn starch, or gelatin. ', 500, 1, '2022-12-02 06:09:16'),
(7, 4, 'Almond malai kulfi', 'This almond malai kulfi is like happiness condensed in a matki.', 800, 1, '2022-12-02 20:43:20'),
(8, 4, 'Lemon Tart', 'Sinful, rich and creamy, this recipe is the perfect finish to a meal.', 600, 1, '2022-12-02 20:45:59'),
(9, 4, 'Pistachio firni', 'Flavoured with elaichi and pista, take phirni to a whole new level with this exquisite recipe. Serve chilled in mitti ke kasore for a festive occasion and bask in the glory. This phirni is made of sugar and love.', 800, 1, '2022-12-02 20:45:59'),
(10, 12, 'dal tadka', 'Dal tadka or tadkewali dal is a traditional lentil-based dish originating from the northern parts of India. Although there are variations, the dish is usually prepared with toor dal (split yellow pigeon peas), garlic, ginger, onions, tomatoes, garam masala, chili peppers, ghee, cumin, coriander, turmeric, red chili powder, and fenugreek leaves.', 1000, 1, '2022-12-02 20:47:37'),
(11, 12, 'Shahi paneer', 'Originating from India\'s Moghul cuisine, shahi paneer is a cheese curry that is prepared with paneer cheese, onions, almond paste, and a rich, spicy tomato-cream sauce. The dish is typically accompanied by Indian breads such as naan, roti, or puri.', 900, 0, '2022-12-02 20:47:37'),
(12, 2, 'Dim Sum', 'Dim sum is one of the most popular Cantonese cuisine dishes. It contains a large range of small dishes, including dumplings, rolls, cakes, and meat, seafood, dessert, and vegetable preparations. There are more than one thousand dim sum dishes in existence today.', 900, 1, '2022-12-02 20:52:18'),
(13, 2, 'Dumplings', 'Dumplings are a traditional food type that is widely popular, especially in North China. Chinese dumplings consist of minced meat and/or chopped vegetables wrapped in a thin dough skin. Popular fillings are minced pork, diced shrimp, ground chicken, beef, and vegetables. Dumplings can be cooked by boiling, steaming, or frying.', 600, 1, '2022-12-02 20:52:18'),
(14, 2, 'Fried rice', 'Fried rice is a dish made from fried cooked rice and other ingredients, often including eggs, vegetables, seafood, or meat. Fried rice is one of the most common Chinese foods. It is easy to make fried rice at home using leftover rice and other meat or vegetables from the last meal.', 900, 1, '2022-12-02 20:53:42'),
(15, 1, 'Aloo Chaat', 'Once a favourite side dish of north west frontier cuisine, aloo chaat is a humble street food in Delhi and virtually all of northern India. It consists of fried pieces of parboiled potato mixed with chana and chopped onions, and is generously garnished with spices and chutney.', 400, 1, '2022-12-02 20:55:18'),
(16, 1, 'Bhelpuri', 'This is associated with the beaches of Mumbai as locals love munching on it while walking on the beach. It consists of puffed rice, sev, chopped onions, potato, papdis, and is smothered in chutney. The soggy sweet crispiness of the snack makes enjoying the beach sunset all worth it. \r\n\r\n', 300, 1, '2022-12-02 20:55:18'),
(17, 6, 'Pizza', 'Pizza. Inevitable if we speak about Italian food: pizza is a national symbol, a food that represents Italy in the world, and has been recognized by UNESCO as an Intangible Cultural Heritage of Humanity.\r\n\r\n', 500, 1, '2022-12-02 20:57:43'),
(18, 6, 'Risotto', 'Risotto is a typical northern Italian dish that can be cooked in an infinite number of ways. Creamy and rich in cheese, it is prepared with rice typical of northern areas, such as the Arborio, Carnaroli, and Vialone varieties, and cooked slowly in broth.', 800, 1, '2022-12-02 20:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `mobile`, `password`, `status`, `added_on`) VALUES
(1, 'Harshit singh', '12345654', 'harshit', 1, '2022-12-01 10:59:09'),
(2, 'Neha Mittal', '7037395770', 'Neha1234', 1, '2022-12-02 06:06:33'),
(3, 'shaily sharma', '9359395770', 'shaily3456', 1, '2022-12-02 06:49:11'),
(4, 'Harsh Sharma', '123456789', '7865', 1, '2022-12-02 21:00:41'),
(5, 'deepti jain', '936852134', '45454', 1, '2022-12-02 21:00:41'),
(6, 'sangeet sharma', '9358541234', '23232', 1, '2022-12-02 21:01:38'),
(7, 'ankit ', '987654321', '82328', 1, '2022-12-02 21:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `people` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`name`, `email`, `phone`, `date`, `time`, `people`, `message`) VALUES
('Deepti Jain', 'Deepti@gmail.com', '9114736948', '2022-12-11', '12:12:00', 3, 'prepare a flower bouquet'),
('Shaily Sharma', 'shaily@gmail.com', '1234567890', '2022-12-07', '18:13:41', 3, ''),
('Harsh Sharma', 'harshsharma20503@gmail.com', '1234567890', '2022-12-07', '18:13:41', 3, ''),
('Harsh Sharma', 'harshsharma20503@gmail.com', '1234567890', '2022-12-07', '18:13:41', 3, ''),
('Dipti Jain', 'dipti@gmail.com', '1234567890', '2022-12-12', '12:05:00', 5, ''),
('Dipti Jain', 'dipti@gmail.com', '1234567890', '2022-12-12', '12:05:00', 5, '');

--
-- Triggers `reservation`
--
DELIMITER $$
CREATE TRIGGER `insert_user` BEFORE INSERT ON `reservation` FOR EACH ROW BEGIN
DECLARE a int;
SELECT COUNT(*) into a from reservation WHERE name=new.name and email=new.email;
IF a<1 THEN
insert into user(name,email,mobile,status,added_on) VALUES(new.name,new.email,new.phone,1,CURRENT_TIMESTAMP);
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `status`, `added_on`) VALUES
(2, 'Vishal Gupta', 'vishal@gmail.com', '1234567890', 1, '2020-06-16 00:00:00'),
(3, 'Neha Mittal', 'neha@gmail.com', '1234567893', 1, '2022-12-01 10:44:36'),
(4, 'Shaily Sharma', 'shaily@gmail.com', '1234567894', 1, '2022-12-01 10:44:55'),
(5, 'Shaily Sharma', 'shaily@gmail.com', '1234567890', 1, '2022-12-03 00:11:20'),
(6, 'Harsh Sharma', 'harshsharma20503@gmail.com', '1234567890', 1, '2022-12-03 00:16:22'),
(7, 'Dipti Jain', 'dipti@gmail.com', '1234567890', 1, '2022-12-03 00:18:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
