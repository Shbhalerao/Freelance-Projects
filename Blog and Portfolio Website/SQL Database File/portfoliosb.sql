-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2020 at 03:14 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfoliosb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `aheadline` varchar(30) NOT NULL,
  `abio` varchar(500) NOT NULL,
  `aimage` varchar(60) NOT NULL DEFAULT 'comments.png',
  `addedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `aname`, `aheadline`, `abio`, `aimage`, `addedby`) VALUES
(1, 'June-19-2020 19:43:34', 'Shubham', '123456', '', '', '', '', 'Shubham'),
(2, 'June-19-2020 19:45:54', 'Guest', '1234', 'Guest Blogger', '', '', '', 'Shubham'),
(3, 'June-19-2020 19:51:09', 'Apurva', '12345', 'Apurva Bhatkhande', '', '', '', 'Shubham'),
(6, 'June-19-2020 20:41:47', 'ShubhamB', '123456', 'Shubham Bhalerao', '', '', '', 'Shubham');

-- --------------------------------------------------------

--
-- Table structure for table `algorithms`
--

CREATE TABLE `algorithms` (
  `id` int(10) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  `algoname` varchar(30) NOT NULL,
  `algodescription` varchar(100) NOT NULL,
  `algo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `algorithms`
--

INSERT INTO `algorithms` (`id`, `datetime`, `algoname`, `algodescription`, `algo`) VALUES
(1, 'June-25-2020 15:08:26', 'Algo 1', 'jsjhdudnjisioooamma bsskks', 0x45637a61722e7a6970),
(2, 'June-25-2020 15:14:16', 'Algo 2', 'Trial Algorithm Program 2', 0x526f626f746f2e7a6970),
(3, 'June-25-2020 15:14:51', 'Algo 3', 'Trial Algo file 3', 0x323531373631315f434e4f5445323436353239305f32303139303630362e7a6970),
(4, 'June-25-2020 15:15:15', 'Algo 4', 'Trial Algo file 4', 0x4a617661382d436865617453686565742d6d61737465722e7a6970);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `title`, `author`, `datetime`) VALUES
(1, 'Technology', 'Shubham', 'June-06-2020 22:33:27'),
(2, 'Education', 'Shubham', 'June-06-2020 22:34:32'),
(3, 'India', 'Shubham', 'June-06-2020 22:37:32'),
(4, 'General', 'Shubham', 'June-06-2020 22:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `approvedby` varchar(50) NOT NULL,
  `status` varchar(3) NOT NULL,
  `post_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `datetime`, `name`, `email`, `comment`, `approvedby`, `status`, `post_id`) VALUES
(4, 'June-09-2020 02:08:31', 'Shubham', 'sbashas@tuch.com', 'Trial 2', 'Shubham Bhalerao', 'ON', 15),
(5, 'June-22-2020 16:46:48', 'Apurva', 'abcd@efgh.com', 'Supreme', 'Shubham Bhalerao', 'ON', 23),
(6, 'June-22-2020 16:47:16', 'Akash', 'asas@asgags.com', 'Sundar', 'Shubham Bhalerao', 'ON', 23),
(7, 'June-22-2020 16:47:54', 'Shubham', 'sbshubham@gmail.com', 'Supernatural', 'Shubham Bhalerao', 'ON', 22),
(9, 'June-22-2020 20:23:59', 'sdasdkjah', 'jsdhsjhd2@hjdshajs.com', 'slkdjlsjdndsmsdjknaskdnas', 'Shubham Bhalerao', 'ON', 20),
(11, 'June-23-2020 03:23:26', 'Gargs', 'garg@hashs.com', 'Sahiye', 'Shubham Bhalerao', 'ON', 23),
(12, 'June-23-2020 03:26:22', 'Sakshi', 'Saksh@haha.com', 'masta', '', 'OFF', 22),
(13, 'June-23-2020 22:55:47', 'Ashton', 'kutcher@hamil.com', 'Mila kunis', '', 'OFF', 22),
(14, 'June-26-2020 00:14:32', 'Shubham', 'sbshubham09@gmail.com', 'Very nicely written', 'Shubham Bhalerao', 'ON', 26);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `filedescription` varchar(200) NOT NULL,
  `file` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `datetime`, `filename`, `filedescription`, `file`) VALUES
(6, 'June-25-2020 04:42:00', 'Trial Zip', 'Font file of Website', 0x42616e67657273202831292e7a6970),
(7, 'June-25-2020 04:42:32', 'Trial Zip 1', '2nd Fontfile for website', 0x527562696b2e7a6970),
(8, 'June-25-2020 04:42:49', 'Trial Zip 2', 'dsahdasdkjhaskjdhkajshdkjashdkbvcxvncxkvjxcjv', 0x44432050524f4752414d532e7a6970),
(9, 'June-25-2020 04:43:12', 'Trial Zip 3', 'sgfgjfgfnbicuvhcnvjfhfhvdnvkndfvfhvkjhdfvd', 0x42616e676572732e7a6970),
(10, 'June-25-2020 15:01:41', 'AlgoName', 'asklkkaklsalkklas', 0x526f626f746f2e7a6970);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `post` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `datetime`, `title`, `category`, `author`, `image`, `post`) VALUES
(15, 'June-07-2020 17:20:47', '4th Post on page', 'India', 'Shubham', 'SI_20170309_144759.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n'),
(16, 'June-09-2020 01:53:34', 'Trial Post 5', 'India', 'Shubham', 'OnePlus5officialJune2017-580x358.jpg', 'This is a trial post'),
(17, 'June-09-2020 01:54:14', 'Trial Post 6', 'General', 'Shubham', 'oneplus-carl-pei-650_650x400_41511183385.jpg', 'Carl pei in the photo trial post'),
(18, 'June-09-2020 01:54:55', 'Trial post 7', 'India', 'Shubham', 'oneplus-5t-main.jpg', 'One plus is the company of smartphones Trial post'),
(19, 'June-09-2020 01:55:24', 'Trial post 8', 'Education', 'Shubham', 'pepo bg.jpg', 'Fitnee trial post '),
(20, 'June-09-2020 01:55:59', 'Trial post 9', 'India', 'Shubham', 'AndroidLogoCSS04.png', 'Triaaallll post'),
(21, 'June-09-2020 01:56:21', 'Trial post 10', 'General', 'Shubham', 'encryption-1.jpg', 'Trial post'),
(22, 'June-09-2020 01:57:43', 'Trial post 11', 'General', 'Shubham', 'SawEuJI.jpg', 'Trial posts'),
(23, 'June-19-2020 23:18:15', 'Trial Post', 'Random', 'ShubhamB', 'Screenshot 2020-06-09 at 8.42.39 PM.png', 'haahahahhahahahahahahahhahahahahahahahhaha'),
(24, 'June-23-2020 23:01:33', 'Final trial Post', 'India', 'Shubham', 'OnePlus_logo_black_drop_fitter.jpg', 'One plus is an amazing company which has shown promising growth in past few years. But it is a Chinese company'),
(25, 'June-23-2020 23:06:47', 'Post with Hacks', 'Technology', 'Shubham', 'water.jpg', '                              <h4>Lorem ipsum dolor sit amet</h4>h, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n<img src=\"Images/comments.png\" width:\"300\" Height:\"200\"; />                        \r\n<ul>\r\n<li>1</li>\r\n<li>2</li>\r\n<li>3</li>\r\n<li>4</li>\r\n<li>5</li>\r\n<li>6</li>\r\n\r\n\r\n</ul>'),
(26, 'June-26-2020 00:11:33', 'Youtube Blog', 'Technology', 'ShubhamB', 'youtube-logo-new.jpg', 'Youtube has become a best platform to show your talent to the world. Youtube is the favourite destination for all the youngsters and elders too. You can find a food recipe, lifestyle hacks and what not on Youtube. Its an unlimited entertaining platform nowadays.\r\nPeople are migrating from youtube pretty frequently now. The another reason youtube is so popular is that you can watch all your favourite music videos on it and that too for free.\r\nBut the only problem users are facing is that youtube is unable to play content in the background. If you want to watch content on the youtube the screen must be on all the time and its pretty disappointing. However this feature is only available for youtube Red users, which is a premius subscription and it costs $10 per month.\r\n\r\nSo we are here to give you some hacks so that you can play youtube contents in the background without any Subscription or any extra firmware. This will surely make your life easy.\r\n\r\nHow to Play YouTube content in the Background and Turn-Off the screen\r\n\r\nâ€¢	Firstly, Open the YouTube app and copy the link to that video which you need to listen to in the background\r\nâ€¢	Now, Open the Google Chrome BrowserÂ on your Android Smartphone\r\nâ€¢	And, near the top right corner, youâ€™ll find three dots, tap on it\r\nâ€¢	Now a menu will pop and now Scroll down until you see the Desktop Site, Just Check it\r\nâ€¢	Your Google Chrome Browser will now load the desktop site, and youâ€™re done\r\nâ€¢	Now you can play videos in the background and also listen to it playing even when the screen is a turn-off.\r\nThis just works like the Google Chrome browser on your PC.\r\n\r\n'),
(27, 'June-29-2020 15:06:47', 'Trial Online Post', 'India', 'Shubham', 'iTunes.jpg', 'Its had resolving otherwise she contented therefore. Afford relied warmth out sir hearts sister use garden. Men day warmth formed admire former simple. Humanity declared vicinity continue supplied no an. He hastened am no property exercise of. Dissimilar comparison no terminated devonshire no literature on. Say most yet head room such just easy. \r\n\r\nIs at purse tried jokes china ready decay an. Small its shy way had woody downs power. To denoting admitted speaking learning my exercise so in. Procured shutters mr it feelings. To or three offer house begin taken am at. As dissuade cheerful overcame so of friendly he indulged unpacked. Alteration connection to so as collecting me. Difficult in delivered extensive at direction allowance. Alteration put use diminution can considered sentiments interested discretion. An seeing feebly stairs am branch income me unable. \r\n\r\nGuest it he tears aware as. Make my no cold of need. He been past in by my hard. Warmly thrown oh he common future. Otherwise concealed favourite frankness on be at dashwoods defective at. Sympathize interested simplicity at do projecting increasing terminated. As edward settle limits at in. \r\n\r\nWrote water woman of heart it total other. By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Collected breakfast estimable questions in to favourite it. Known he place worth words it as to. Spoke now noise off smart her ready. \r\n\r\nFar concluded not his something extremity. Want four we face an he gate. On he of played he ladies answer little though nature. Blessing oh do pleasure as so formerly. Took four spot soon led size you. Outlived it received he material. Him yourself joy moderate off repeated laughter outweigh screened. \r\n\r\nFrankness applauded by supported ye household. Collected favourite now for for and rapturous repulsive consulted. An seems green be wrote again. She add what own only like. Tolerably we as extremity exquisite do commanded. Doubtful offended do entrance of landlord moreover is mistress in. Nay was appear entire ladies. Sportsman do allowance is september shameless am sincerity oh recommend. Gate tell man day that who. \r\n\r\nBoth rest of know draw fond post as. It agreement defective to excellent. Feebly do engage of narrow. Extensive repulsive belonging depending if promotion be zealously as. Preference inquietude ask now are dispatched led appearance. Small meant in so doubt hopes. Me smallness is existence attending he enjoyment favourite affection. Delivered is to ye belonging enjoyment preferred. Astonished and acceptance men two discretion. Law education recommend did objection how old. \r\n\r\nBy an outlived insisted procured improved am. Paid hill fine ten now love even leaf. Supplied feelings mr of dissuade recurred no it offering honoured. Am of of in collecting devonshire favourable excellence. Her sixteen end ashamed cottage yet reached get hearing invited. Resources ourselves sweetness ye do no perfectly. Warmly warmth six one any wisdom. Family giving is pulled beauty chatty highly no. Blessing appetite domestic did mrs judgment rendered entirely. Highly indeed had garden not. \r\n\r\nWritten enquire painful ye to offices forming it. Then so does over sent dull on. Likewise offended humoured mrs fat trifling answered. On ye position greatest so desirous. So wound stood guest weeks no terms up ought. By so these am so rapid blush songs begin. Nor but mean time one over. \r\n\r\nHim boisterous invitation dispatched had connection inhabiting projection. By mutual an mr danger garret edward an. Diverted as strictly exertion addition no disposal by stanhill. This call wife do so sigh no gate felt. You and abode spite order get. Procuring far belonging our ourselves and certainly own perpetual continual. It elsewhere of sometimes or my certainty. Lain no as five or at high. Everything travelling set how law literature. \r\n\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `algorithms`
--
ALTER TABLE `algorithms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `algorithms`
--
ALTER TABLE `algorithms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Foreign_Relation` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
