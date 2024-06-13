-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 01:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indokash`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_us` text NOT NULL,
  `location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_us`, `location`) VALUES
(2, '<p><strong>ABOUT US</strong></p><p><strong>IndoKash</strong> is a prominent horticulture company specializing in orchard development and management. With a wealth of expertise and a deep-rooted passion for agriculture, Indo Kash is committed to cultivating and nurturing orchards to their fullest potential.</p><p>The company focuses on creating sustainable and profitable orchard projects by leveraging advanced horticultural practices and cutting-edge technologies. Their team of skilled professionals possesses extensive knowledge in various aspects of horticulture, including soil analysis, irrigation systems, crop selection, pest control, and post-harvest management.</p><p>Indo Kash takes a comprehensive approach to orchard development, considering factors such as climate, soil conditions, market demand, and long-term viability. They collaborate closely with clients, providing customized solutions tailored to their specific goals and requirements. Whether it\'s establishing new orchards or rejuvenating existing ones, Indo Kash aims to optimize productivity and maximize returns for their clients.</p><p>The company\'s commitment to sustainable agriculture extends beyond orchard development. They prioritize environmentally friendly practices, employing methods that conserve water, reduce chemical usage, and promote biodiversity. Indo Kash understands the importance of preserving natural resources and strives to create orchards that are not only economically viable but also ecologically responsible.</p><p>Indo Kash\'s dedication to excellence and customer satisfaction has earned them a reputable position in the horticulture industry. They have successfully executed numerous orchard projects, working with both individual growers and large-scale agricultural enterprises. By delivering exceptional results and fostering long-term partnerships, Indo Kash has become a trusted name in orchard development and management.</p><p>Overall, Indo Kash stands as a leading horticulture company, combining expertise, innovation, and a deep understanding of orchard cultivation to help clients achieve their agricultural goals while embracing sustainability.</p><p><strong>Our objective</strong> is to establish a sustainable farming system that ensures access to safe and nutritious food for all while safeguarding the environment and supporting rural communities. We aim to take the lead in developing innovative and efficient agricultural and horticultural practices that enhance productivity and profitability while minimizing negative environmental impacts. Our mission is to promote the health and well-being of people and the planet through the cultivation and distribution of diverse, healthy crops.</p><p><br>&nbsp;</p><p>To achieve these goals, we will implement the following strategies and practices:</p><p><strong>Embrace organic and regenerative farming:</strong><br>We will prioritize organic and regenerative farming practices that focus on nurturing healthy soil, promoting biodiversity, and reducing reliance on synthetic fertilizers and pesticides. By doing so, we will enhance soil fertility, minimize water and air pollution, and maximize the ecosystem services provided by our farms.<br><strong>Foster crop diversity and rotation:</strong><br>Our farming systems will emphasize diversity by cultivating a wide range of crops and implementing rotational practices. This approach reduces the risk of pests and diseases, improves soil health, and supports biodiversity. By maintaining long-term productivity and reducing the need for chemical inputs, we ensure sustainable farming practices.<br><strong>Incorporate agroforestry and perennial crops:</strong><br>We will integrate agroforestry practices that combine trees and shrubs with agricultural crops. This approach offers numerous benefits, including improved soil fertility, increased biodiversity, carbon sequestration for climate change mitigation, and diversified income sources for farmers. Furthermore, promoting the cultivation of perennial crops minimizes soil erosion, enhances water retention, and reduces the necessity for annual tilling.<br><strong>Implement efficient water management:</strong><br>Our farms will adopt water-efficient irrigation techniques such as drip irrigation or precision sprinklers to minimize water waste and enhance overall water-use efficiency. Additionally, we will prioritize water harvesting and conservation methods, such as rainwater collection, to optimize water resources and reduce reliance on external water sources.<br>By implementing these strategies and practices, we will establish a sustainable farming system that not only ensures food security but also protects the environment, supports rural communities, and promotes the well-being of both people and the planet.</p>', 'home_page');

-- --------------------------------------------------------

--
-- Table structure for table `completed_projects`
--

CREATE TABLE `completed_projects` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `feedback` text DEFAULT NULL,
  `client_contact` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed_projects`
--

INSERT INTO `completed_projects` (`id`, `owner_name`, `place`, `description`, `feedback`, `client_contact`, `created_at`, `updated_at`) VALUES
(254, 'sahil', 'Dachinpora', '25 kanals of land', 'good work', '7006177645', '2024-04-14 13:35:48', '2024-04-14 13:35:48'),
(255, 'amin', 'kahn', 'jkbnjnb', 'kjkjk', '099786', '2024-04-14 13:35:48', '2024-04-14 13:35:48'),
(256, 'jabeen', 'naranag', 'aman', 'cchaman', '900000', '2024-04-14 13:35:48', '2024-04-14 13:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`name`, `email`, `subject`, `message`, `isDeleted`, `message_id`) VALUES
('sahil', 'rampal@gmail.com', 'rampal ka bhag', 'dil garden garden krna hai', 0, 2),
('sahil dar', 'rampal@gmail.com', 'rampal ka bhag', 'dil garden garden krna hai hota hai g', 0, 3),
('sahil dar', 'rampal@gmail.com', 'rampal ka bhag', 'dil garden garden krna hai hota hai g', 0, 4),
('', '', '', '', 0, 5),
('Sahil', 'sahil@gmail.com', 'checking db configs', 'checking db connection settings', 0, 6),
('sss', 'sa@a.com', 'ccc', 'mmmmm', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `img_id` int(11) NOT NULL,
  `img_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`img_id`, `img_link`) VALUES
(1, '../img/gallery/66694f535814f2.08352304.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_name`, `password`) VALUES
('admin', 'pass@1234');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` int(11) NOT NULL DEFAULT 0,
  `image_link` text NOT NULL,
  `title` text NOT NULL,
  `designation` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `image_link`, `title`, `designation`, `description`) VALUES
(0, '../img/our_management/5856.jpg', 'Imran Rasool Dar', 'Director of Operations', 'Imran Rasool Dar serves as our Director of Operations, overseeing the efficient functioning of our day-to-day activities. With his expertise in landscape design and implementation, Imran ensures that our projects are executed flawlessly. His keen eye for aesthetics and environmental considerations result in breathtaking outdoor spaces that captivate our customers.'),
(0, '../img/our_management/5856.jpg', 'Aadil Hussain Padder', 'Consultant', 'As our esteemed consultant, Aadil Hussain Padder plays a vital role in shaping our horticultural offerings. With extensive knowledge of plant genetics and breeding, Aadil guides us in developing innovative and high-yielding plant varieties. His expertise and commitment to sustainable practices make him an invaluable asset to our team.'),
(0, '../img/our_management/5856.jpg', 'Farzana Hassan', 'Director of Finance and Compliance', 'As our Director of Finance and Compliance, Farzana Hassan ensures the financial stability and regulatory compliance of our company.Farzana brings a deep understanding of the industry to her role. Her meticulous attention to detail and strategic financial planning contribute to the success and growth of Indokash Horticulture Company.'),
(0, '../img/our_management/5856.jpg', 'Rizwan Nawaz', 'Director of Marketing and Business', 'Rizwan Nawaz leads our marketing and business strategies as the Director of Marketing and Business. With his exceptional marketing skills and business acumen, Rizwan creates and implements effective campaigns that elevate our brand presence. His dedication to delivering exceptional customer experiences and fostering strong partnerships drives our company\'s success.');

-- --------------------------------------------------------

--
-- Table structure for table `project_media`
--

CREATE TABLE `project_media` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `media_type` enum('image','video') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quality_control`
--

CREATE TABLE `quality_control` (
  `id` int(11) NOT NULL,
  `image_link` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quality_control`
--

INSERT INTO `quality_control` (`id`, `image_link`, `title`, `description`) VALUES
(68, '../img/quality_control_images/65e8afd327d9b6.63637882.png', 'Variety selection', 'Choose high-quality and disease-resistant varieties that are well-suited to the specific growing conditions of your horticultural operation. Consider factors such as flavor, appearance, yield potential, and shelf life when selecting varieties.\r\n'),
(69, '../img/quality_control_images/65e8afd3283278.61268691.png', 'Soil management', 'Maintain optimal soil fertility and structure through regular soil testing, nutrient management, and organic matter additions. Proper soil management ensures that plants have access to essential nutrients, which can contribute to the overall quality of horticultural products.'),
(70, '../img/quality_control_images/65e8afd3288408.48362007.png', 'Irrigation and water management', 'Provide appropriate and consistent irrigation to meet the specific water needs of different horticultural crops. Avoid under or over-watering, as both can negatively impact product quality. Implement water management strategies such as drip irrigation or mulching to optimize water usage and reduce water stress on plants.'),
(71, '../img/quality_control_images/65e8afd328d902.47141114.png', 'Crop nutrition', 'Implement a balanced fertilization program tailored to the specific nutrient requirements of horticultural crops. Monitor and adjust nutrient levels based on plant needs throughout the growing season. Proper nutrition contributes to the development of high-quality, flavorful, and nutrient-rich horticultural products'),
(72, '../img/quality_control_images/65e8afd32945d9.52578238.png', 'Integrated pest management (IPM)', 'Employ IPM practices to effectively manage pests and diseases while minimizing the use of chemical pesticides. Regular monitoring, early detection, and the use of biological controls, cultural practices, and targeted pesticide applications can help ensure that horticultural products remain free from harmful pests and diseases.'),
(73, '../img/quality_control_images/65e8afd329db41.46808420.png', 'Harvesting at optimal maturity', 'Harvest crops at their peak maturity to ensure the best flavor, texture, and nutritional value. Each crop has specific indicators of maturity, such as color, size, or firmness, which can be used as guidelines for determining the optimal harvest time.'),
(74, '../img/quality_control_images/65e8afd32ac984.57202329.png', 'Post-harvest handling and storage', 'Proper handling and storage after harvest are crucial to maintaining the quality and shelf life of horticultural products. Minimize damage during harvest, promptly cool the harvested produce, and provide appropriate storage conditions, including temperature and humidity control, to extend shelf life and preserve product quality.'),
(75, '../img/quality_control_images/65e8afd32b3234.21564554.png', 'Quality control and traceability', 'Establish quality control measures at various stages of production, including post-harvest processing, packing, and distribution. Implement systems to track and trace horticultural products, ensuring transparency and accountability throughout the supply chain.'),
(76, '../img/quality_control_images/65e8afd32c1852.94068446.png', 'Training and education', 'Provide ongoing training and education to farmers and workers involved in horticulture to enhance their knowledge and skills in producing high-quality products. This includes proper harvesting techniques, post-harvest handling, and adherence to quality standards.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `image_link` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image_link`, `title`, `description`) VALUES
(81, '../img/service_images/65f085d63670e8.56291942.jpg', 'Plant Care', 'Indokash Plant Care Services offers comprehensive plant care solutions to help your greenery thrive. From watering and fertilizing to pruning and pest control, we ensure your plants receive the attention they need to flourish. Our expert advice on plant selection and placement guarantees optimal growth and health for your indoor and outdoor plants.'),
(82, '../img/service_images/65f085d637a615.81855469.jpg', 'Hailnet', 'Indokash\'s Hailnet Protection Service provides a reliable solution to protect your plants from hail damage. Our high-quality hailnet products are designed to withstand harsh weather conditions, keeping your plants safe and secure. With our hailnet service, you can ensure the continued growth and health of your valuable plants.'),
(83, '../img/service_images/65f085d6384591.22086541.jpg', 'Plant Trimming', 'Indokash\'s Plant Trimming Service offers professional pruning and trimming solutions to maintain the health and appearance of your plants. Our experienced team carefully trims away dead or overgrown branches, promoting new growth and improving the overall aesthetics of your plants. With our plant trimming service, you can enhance the beauty of your green spaces and ensure your plants remain healthy and vibrant.'),
(84, '../img/service_images/65f085d638ae67.30352833.jpg', 'Orchard Development', 'Indokash specializes in Orchard Development, offering comprehensive solutions for establishing and maintaining orchards of various sizes. From site selection and soil preparation to tree planting and maintenance, we handle every aspect of orchard development with expertise and care. Whether you\'re starting a new orchard or rejuvenating an existing one, our team ensures your orchard thrives and produces high-quality fruits for years to come.');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `service_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`service_id`, `service_name`, `service_price`) VALUES
(1, 'Orchard Dev Basic', 1001),
(2, 'Orchard Dev Premium', 1002),
(3, 'Orchard Dev Premium Plus', 1003),
(4, 'Nutrition Basic', 1004),
(5, 'Nutrition Premium', 1005),
(6, 'Nutrition Premium Plus', 1006),
(7, 'Pruning', 1007),
(8, 'Anti Hail Net', 1008);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isDeleted`) VALUES
(1, 'admin@indokash.com', 'password', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_projects`
--
ALTER TABLE `completed_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `project_media`
--
ALTER TABLE `project_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `quality_control`
--
ALTER TABLE `quality_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `completed_projects`
--
ALTER TABLE `completed_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_media`
--
ALTER TABLE `project_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quality_control`
--
ALTER TABLE `quality_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_media`
--
ALTER TABLE `project_media`
  ADD CONSTRAINT `project_media_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `completed_projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
