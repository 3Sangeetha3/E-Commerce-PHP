-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2024 at 03:33 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koza_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'abc', 'abc@gmail.com', 'hello nice work', '2024-11-06 14:33:35'),
(2, 'abc', 'abc@gmail.com', 'nice work.', '2024-11-07 03:40:03'),
(3, 'abc', 'abcde@gmail.com', 'nassghjm', '2024-11-07 16:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `payment_method`, `order_date`, `status`) VALUES
(1, 8, 0.00, 'razorpay', '2024-11-08 00:48:27', 'Pending'),
(2, 11, 0.00, 'cod', '2024-11-08 01:33:31', 'Pending'),
(3, 6, 0.00, 'razorpay', '2024-11-08 01:35:02', 'Pending'),
(4, 6, 0.00, 'razorpay', '2024-11-08 01:36:13', 'Pending'),
(5, 6, 0.00, 'razorpay', '2024-11-08 01:37:38', 'Pending'),
(6, 6, 0.00, 'cod', '2024-11-08 01:43:31', 'Pending'),
(7, 6, 0.00, 'razorpay', '2024-11-08 01:59:45', 'Pending'),
(8, 6, 0.00, 'cod', '2024-11-08 01:59:58', 'Pending'),
(9, 8, 0.00, 'cod', '2024-11-08 03:07:28', 'Pending'),
(10, 8, 0.00, 'razorpay', '2024-11-08 03:20:28', 'Pending'),
(11, 8, 0.00, 'cod', '2024-11-08 03:28:53', 'Pending'),
(12, 12, 0.00, 'cod', '2024-11-08 03:31:44', 'Pending'),
(13, 13, 0.00, 'cod', '2024-11-08 10:39:25', 'Pending'),
(14, 14, 0.00, 'cod', '2024-11-10 02:45:53', 'Pending'),
(15, 13, 0.00, 'cod', '2024-11-10 19:30:13', 'Pending'),
(16, 12, 0.00, 'cod', '2024-11-10 19:47:03', 'Pending'),
(17, 12, 0.00, 'cod', '2024-11-11 17:40:46', 'Pending'),
(18, 12, 0.00, 'cod', '2024-11-11 17:42:19', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `created_at`) VALUES
(11, 'The Maverick Leather Biker Jacket', 'Embrace the rebellious spirit with The Maverick, crafted from rugged yet supple cowhide leather. This jacket offers a bold silhouette with its asymmetric zip closure and deep side pockets. The detailed stitching along the sleeves adds a touch of toughness, while the quilted lining ensures comfort on every ride. Whether you\'re cruising through the streets or rocking a casual look, The Maverick is your ultimate companion.', 5999.00, 'brown-leather-jacket-men-motorcycle.png', '2024-11-07 21:28:06'),
(12, 'The Titan Leather Bomber Jacket', 'A tribute to vintage aviator style, The Titan Bomber Jacket is made from premium lambskin leather, providing a soft yet durable finish. Featuring ribbed cuffs and a high collar, this jacket exudes timeless cool while keeping you warm in the chill. With multiple pockets for convenience and a sleek zip closure, The Titan is all about effortless style and functionality.', 8999.00, 'Khaki_aiopeson-solid-color-bomber-jacket-men.png', '2024-11-07 21:30:20'),
(13, 'The Nomad Leather Field Jacket', 'Inspired by the open road and wide landscapes, The Nomad Leather Field Jacket combines practicality with rugged elegance. Crafted from premium, full-grain leather, it offers a durable, weather-resistant exterior with functional chest and waist pockets. The adjustable waist and cuffs provide a tailored fit, while the soft cotton lining adds comfort for long days outdoors.', 9999.00, 'The Nomad Leather Field Jacket.jpg', '2024-11-07 21:32:01'),
(14, 'The Pioneer Leather Rider Jacket', 'A blend of vintage charm and modern functionality, The Pioneer Leather Rider Jacket is made from carefully selected, aged cowhide leather. With reinforced stitching along the shoulders and elbows, it offers durability and strength. The zippered cuffs and classic snap collar enhance its biker appeal, making it perfect for your next adventure.', 8499.00, 'The Pioneer Leather Rider Jacket.png', '2024-11-07 21:34:01'),
(15, 'Men\'s Cow Leather Crossbody Shoulder Bag', 'Luxurious Full-Grain Leather: Crafted from premium full-grain leather, this bag offers a soft, supple texture that only gets better with age. The rich, natural grain and distinctive finish make each bag unique, while its durability ensures long-lasting beauty and performance.', 5999.00, '2024-08-30_11.20.19.png', '2024-11-15 08:50:27'),
(16, 'Mens Crossbody Shoulder Pouch', 'Modern Crossbody Design: Featuring an adjustable, padded shoulder strap, this bag provides a comfortable, hands-free carrying experience. The design ensures easy access and balanced weight distribution, making it perfect for commuting, travel, or casual outings.', 3999.00, 'shoulder-bag-leather-shoulder-bag-sandel-hobart-33291433705622_1600x.png', '2024-11-15 08:56:07'),
(17, 'Call It Spring Men\'s Messenger Bag', 'Product Details\r\n\r\n    26 CM\r\n    11 CM\r\n    Wipe with clean, dry cloth\r\n    Faux Leather', 2999.00, '-473Wx593H-700278819-brown-MODEL2.png', '2024-11-15 09:04:16'),
(18, 'Leather bag sales for school', 'A premium Leather bag sales for school', 3999.00, 'classic-brown-leather-backpack-for-work-college-or-school-2_600x.png', '2024-11-15 09:12:27'),
(19, 'Leather belt', 'A premium leather belt', 1399.00, 'communityIcon_cd169seotird1.jpeg', '2024-11-15 09:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0,
  `role` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `is_admin`, `role`) VALUES
(6, 'abc', 'abcde@gmail.com', '$2y$10$zX3qjhBvvpXxCArjgomTlubISy5mXEsnqpxTfAKYW9p2B6fnzaDAC', '2024-11-06 18:56:25', 1, 'admin'),
(8, 'test', 'test@gmail.com', '$2y$10$henDxW2CW49fVrCwYTWXjuZAF0mJP7VWYuYj5a9txGabN8g9nKuQ.', '2024-11-07 18:04:45', 0, 'user'),
(11, 'riya', 'riyaa@gmail.com', '$2y$10$ouLMKttCloI07tV8WzGil.HnV4R57yTDLuruQJ3jKjN6m7S2DDIjq', '2024-11-07 19:53:53', 0, 'user'),
(12, 'user', 'user@gmail.com', '$2y$10$xA/qgElRgOfy1Q2h4eT0sO4C6ZCJjGu9cfBKCaE0xMsPnrozk6wY.', '2024-11-07 21:59:57', 0, 'user'),
(13, 'admin', 'admin@gmail.com', '$2y$10$IkEcQyWCErC1UOinqhYs6.z5Rnx3/FtQhAjyEB0UzzRRkpfGnXZJW', '2024-11-07 22:03:12', 1, 'admin'),
(14, 'admin1', 'admin1@gmail.com', '$2y$10$Mr4lgLCqIZDX136MyfTNyukRa0u4esLt5bwMRMjfciSiaWh9rzBy.', '2024-11-08 06:10:20', 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
