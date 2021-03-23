-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2021 at 02:23 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HomeControl`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `categoria_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`categoria_id`, `name`) VALUES
(1, 'Кухонные устройства'),
(2, 'Дом');

-- --------------------------------------------------------

--
-- Table structure for table `Chats`
--

CREATE TABLE `Chats` (
  `chat_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Devices`
--

CREATE TABLE `Devices` (
  `device_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Devices`
--

INSERT INTO `Devices` (`device_id`, `categoria_id`, `name`, `type`, `count`, `price`, `description`) VALUES
(1, 1, 'Лампочка', 'освещение', 5, 100, 'lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `Devices_sets`
--

CREATE TABLE `Devices_sets` (
  `device_id` int(11) NOT NULL,
  `set_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Discounts`
--

CREATE TABLE `Discounts` (
  `discount_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Functions`
--

CREATE TABLE `Functions` (
  `function_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Functions`
--

INSERT INTO `Functions` (`function_id`, `device_id`, `name`) VALUES
(1, 1, 'Включить'),
(2, 1, 'Выключить');

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `message_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `time_send` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `order_date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Order_devices`
--

CREATE TABLE `Order_devices` (
  `order_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`role_id`, `name`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `Scripts`
--

CREATE TABLE `Scripts` (
  `script_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Scripts`
--

INSERT INTO `Scripts` (`script_id`, `user_id`, `name`) VALUES
(1, 5, 'Вечер');

-- --------------------------------------------------------

--
-- Table structure for table `Sets`
--

CREATE TABLE `Sets` (
  `set_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Settings`
--

CREATE TABLE `Settings` (
  `setting_id` int(11) NOT NULL,
  `script_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL,
  `user_device_id` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Settings`
--

INSERT INTO `Settings` (`setting_id`, `script_id`, `function_id`, `user_device_id`, `start_time`, `end_time`) VALUES
(1, 1, 1, 1, '12:00', '12:01'),
(2, 1, 2, 1, '13:00', '13:01');

-- --------------------------------------------------------

--
-- Table structure for table `Subscriptions`
--

CREATE TABLE `Subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Subscriptions`
--

INSERT INTO `Subscriptions` (`subscription_id`, `name`, `type`) VALUES
(1, 'На один месяц', 'Месячная');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `fullname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `birthday` date DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_active_subscription` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `role_id`, `subscription_id`, `fullname`, `name`, `patronymic`, `number`, `address`, `email`, `birthday`, `login`, `password`, `registration_date`, `is_active`, `is_active_subscription`) VALUES
(5, 2, NULL, 'Korobeinyk', 'artem', 'Sergeevich', '+3809872337982', 'Kharkiv', 'svitlana.sizonova@nure.ua', '2021-03-12', 'art22', '27531af92e8cb5f8e895317251fec1d7', '2021-03-18', 1, NULL),
(6, 2, NULL, 'sssss', 'sssss', 'sssss', 'ssss', 'ssssss', 'ssssss@gmail.com', '2021-04-01', 'sss123', '2ec5c9e08e50a626de4b1ea3218a7f7d', '2021-03-18', 1, NULL),
(7, 2, 1, 'Коробейник', 'Владимир', 'Сергеевич', '+380943345', 'Харьков', 'korobeinyk2001@gmail.com', '2000-09-12', 'vk222', '12344', '2001-09-12', 1, 1),
(8, 2, NULL, 'vvvvvv', 'vvvvvv', 'vvvvvv', '+3809878237982', 'vvvvvv', 'vvvv@gmail.com', '2021-03-04', 'vvv123', '2ec5c9e08e50a626de4b1ea3218a7f7d', '2021-03-21', 1, NULL),
(9, 2, NULL, 'Коробейник', 'Владимир', NULL, NULL, NULL, 'vovakorobeinyk2001@gmail.com', NULL, 'mNCks7BaRm', 'a93f7261a9acff5e50386d355cbd9e30', '2021-03-21', 1, NULL),
(10, 2, NULL, 'nure', 'Nure', 'nure', '+3809878237982', 'nure', 'volodymyr.korobeinyk@nure.ua', '2021-03-04', 'nure', 'c6018d5fbc2694a9301f5f4d9acd64a9', '2021-03-21', 1, NULL),
(11, 2, NULL, 'asdasd', 'asdasd', 'a', 'a', 'aaaa', 'asdasdadsa@asdsss.asdasd', '2021-03-10', '111', 'bb28f51af44b0f99e5e2b743fb4e892d', '2021-03-23', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users_chats`
--

CREATE TABLE `Users_chats` (
  `user_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users_devices`
--

CREATE TABLE `Users_devices` (
  `user_device_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `activate_date` date NOT NULL,
  `activation_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users_devices`
--

INSERT INTO `Users_devices` (`user_device_id`, `user_id`, `device_id`, `name`, `is_activated`, `activate_date`, `activation_key`) VALUES
(1, 5, 1, 'Лампа 1', 1, '2020-03-21', 'asdasf2342fqwfqw431231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indexes for table `Chats`
--
ALTER TABLE `Chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `Devices`
--
ALTER TABLE `Devices`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `Devices_sets`
--
ALTER TABLE `Devices_sets`
  ADD KEY `device_id` (`device_id`),
  ADD KEY `set_id` (`set_id`);

--
-- Indexes for table `Discounts`
--
ALTER TABLE `Discounts`
  ADD PRIMARY KEY (`discount_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Functions`
--
ALTER TABLE `Functions`
  ADD PRIMARY KEY (`function_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `Order_devices`
--
ALTER TABLE `Order_devices`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `Scripts`
--
ALTER TABLE `Scripts`
  ADD PRIMARY KEY (`script_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Sets`
--
ALTER TABLE `Sets`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `Settings`
--
ALTER TABLE `Settings`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `script_id` (`script_id`),
  ADD KEY `function_id` (`function_id`),
  ADD KEY `user_device_id` (`user_device_id`) USING BTREE;

--
-- Indexes for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `subscription_id` (`subscription_id`);

--
-- Indexes for table `Users_chats`
--
ALTER TABLE `Users_chats`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `chat_id` (`chat_id`);

--
-- Indexes for table `Users_devices`
--
ALTER TABLE `Users_devices`
  ADD PRIMARY KEY (`user_device_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `device_id` (`device_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Chats`
--
ALTER TABLE `Chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Devices`
--
ALTER TABLE `Devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Discounts`
--
ALTER TABLE `Discounts`
  MODIFY `discount_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Functions`
--
ALTER TABLE `Functions`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Scripts`
--
ALTER TABLE `Scripts`
  MODIFY `script_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Sets`
--
ALTER TABLE `Sets`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Settings`
--
ALTER TABLE `Settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Subscriptions`
--
ALTER TABLE `Subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Users_devices`
--
ALTER TABLE `Users_devices`
  MODIFY `user_device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Devices`
--
ALTER TABLE `Devices`
  ADD CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `Categories` (`categoria_id`) ON DELETE CASCADE;

--
-- Constraints for table `Devices_sets`
--
ALTER TABLE `Devices_sets`
  ADD CONSTRAINT `devices_sets_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `Devices` (`device_id`),
  ADD CONSTRAINT `devices_sets_ibfk_2` FOREIGN KEY (`set_id`) REFERENCES `Sets` (`set_id`) ON DELETE CASCADE;

--
-- Constraints for table `Discounts`
--
ALTER TABLE `Discounts`
  ADD CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `Functions`
--
ALTER TABLE `Functions`
  ADD CONSTRAINT `functions_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `Devices` (`device_id`) ON DELETE CASCADE;

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `Chats` (`chat_id`) ON DELETE CASCADE;

--
-- Constraints for table `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `Order_devices`
--
ALTER TABLE `Order_devices`
  ADD CONSTRAINT `order_devices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_devices_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `Devices` (`device_id`);

--
-- Constraints for table `Scripts`
--
ALTER TABLE `Scripts`
  ADD CONSTRAINT `scripts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `Settings`
--
ALTER TABLE `Settings`
  ADD CONSTRAINT `settings_ibfk_1` FOREIGN KEY (`script_id`) REFERENCES `Scripts` (`script_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `settings_ibfk_2` FOREIGN KEY (`function_id`) REFERENCES `Functions` (`function_id`),
  ADD CONSTRAINT `settings_ibfk_3` FOREIGN KEY (`user_device_id`) REFERENCES `Users_devices` (`user_device_id`) ON DELETE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`subscription_id`) REFERENCES `Subscriptions` (`subscription_id`);

--
-- Constraints for table `Users_chats`
--
ALTER TABLE `Users_chats`
  ADD CONSTRAINT `users_chats_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_chats_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `Chats` (`chat_id`) ON DELETE CASCADE;

--
-- Constraints for table `Users_devices`
--
ALTER TABLE `Users_devices`
  ADD CONSTRAINT `users_devices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_devices_ibfk_2` FOREIGN KEY (`device_id`) REFERENCES `Devices` (`device_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
