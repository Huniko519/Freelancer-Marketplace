-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 12:18 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updates_wave`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_info`
--

CREATE TABLE `about_info` (
  `id` int(255) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `year` varchar(300) NOT NULL,
  `company` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_info`
--

INSERT INTO `about_info` (`id`, `userid`, `year`, `company`, `title`, `description`, `type`) VALUES
(1, '434155361070', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(2, '434155361070', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(3, '324036228471', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(4, '324036228471', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(5, '228145236254', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(6, '228145236254', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(7, '305378125552', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(8, '305378125552', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(9, '199476311866', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(10, '199476311866', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(11, '296482705384', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(12, '296482705384', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(13, '645447357569', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(14, '645447357569', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(15, '715478889450', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(16, '715478889450', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(17, '753678237313', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(18, '753678237313', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(19, '233802410288', '2012-2014', 'Degree', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 2),
(20, '233802410288', '2014-2016', 'TheMashaBrand', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra est turpis, vitae consequat ligula elementum eget. Nunc turpis dolor, dictum eu suscipit tristique, euismod ac est. Curabitur sit amet nisi ut purus fermentum viverra. Proin enim felis, venenatis vel pellentesque facilisis, mattis vitae metus. Donec eget risus massa. Nunc aliquam iaculis tristique. Ut id purus aliquet, gravida odio ac, ullamcorper quam. ', 1),
(22, '212335505903', '2010 - 2014', 'TheMashaBrand ff', 'Simple Freelance Marketplace System', 'Simple Freelance Marketplace System', 1),
(25, '212335505903', '2010 - 2014', 'Degree', 'Computer Science test', 'Computer Science', 2);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `adminid` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` text NOT NULL,
  `imagelocation` text NOT NULL,
  `tokencode` text NOT NULL,
  `joined` datetime NOT NULL,
  `user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminid`, `username`, `password`, `name`, `email`, `imagelocation`, `tokencode`, `joined`, `user_type`) VALUES
(1, '1471436678', 'Admin', '$2y$10$Tz5tVh1u604jPZ.qpcrpqOhF6VEF64/bsVa6lQSTXt5bIVxkq1siy', 'Alex Grantte', 'admin@wave.com', 'EJxBQbStvXjl6y.png', '', '2016-08-17 14:24:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `imagelocation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `imagelocation`) VALUES
(11, 'Graphics & Design', '20.04.01.20.51-1585763468.5681-50389283.jpg'),
(13, 'Cartoons', '20.04.01.21.09-1585764578.065-25463524.jpg'),
(14, 'Flyers & Brochures', '20.04.01.21.19-1585765185.1772-93217780.jpg'),
(15, 'Illustration', '20.04.01.21.20-1585765202.1782-13476439.jpg'),
(16, 'Logo Design', '20.04.01.17.13-1585750404.0959-16377233.jpg'),
(18, 'Social Media Graphics', '20.04.01.17.17-1585750658.0977-43573089.jpg'),
(19, 'T-Shirts', '20.04.01.17.25-1585751131.1424-36513699.jpg'),
(20, 'Writing & Translation', '20.04.01.21.22-1585765369.2506-41511326.jpg'),
(21, 'Article & Blog Writing', '20.04.01.21.39-1585766386.8775-11710497.jpg'),
(22, 'Proofreading & Editing', '20.04.01.21.41-1585766488.4738-82360820.jpg'),
(23, 'SEO Keyword Optimization', '20.04.01.17.29-1585751385.3591-4301472.jpg'),
(26, 'Web Design & UI/ UX', '20.04.01.21.59-1585767567.0906-72197022.jpg'),
(27, 'Website Builders', '20.04.01.21.44-1585766680.7013-73868479.jpg'),
(28, 'Wordpress Themes & Plugins', '20.04.01.17.31-1585751480.0487-23479651.jpg'),
(29, 'Mobile App Development', '20.04.01.22.22-1585768954.092-33336671.jpg'),
(30, 'Animation & 3D', '20.04.01.17.36-1585751794.604-85159541.jpg'),
(31, 'Management & Finance', '20.04.01.22.15-1585768549.4929-397067.jpg'),
(32, 'Sales & Marketing', '20.04.01.22.01-1585767672.8635-1741850.jpg'),
(33, 'Web, Mobile & Software Development', '20.04.01.22.13-1585768421.2383-84879572.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `id` int(255) NOT NULL,
  `cid` varchar(300) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`id`, `cid`, `projectid`, `freelancerid`, `clientid`, `date_added`) VALUES
(1, '0vxSqcCa0T', 'bVbRUo36To', '715478889450', '296594131506', '2019-11-21 14:16:55'),
(2, '5UpuwAIti2', 'uJCOYwXrdO', '233802410288', '329616019298', '2019-11-21 14:16:55'),
(3, 'FxzwgxrbYs', 'PZgr7p7EeB', '753678237313', '981686315672', '2019-11-21 14:16:55'),
(4, 'YnBTwy2eFD', 'GhkalwKELF', '645447357569', '321267804911', '2019-11-21 14:16:55'),
(5, 'SHLn1hQctH', 'uJCOYwXrdO', '305378125552', '329616019298', '2019-11-21 14:16:55'),
(6, '5wEUCSLl8V', 'fi47zFrW8s', '228145236254', '969406884108', '2019-11-21 12:50:28'),
(7, 'vri2xrbG9X', 'WQjrwtmy7Q', '324036228471', '199513386617', '2019-11-21 12:50:28'),
(8, 'tpoMMHWVBC', 'e2qj4OYYIs', '199476311866', '188158648562', '2019-11-21 12:50:28'),
(10, 'z7Jfwz4l71', 'Wm0W6YvzLr', '715478889450', '431974897102', '2019-11-21 12:50:28'),
(11, 'L69bRrC2gL', 'GhkalwKELF', '434155361070', '321267804911', '2019-11-21 12:50:28'),
(12, 'mOHdEkq1LD', 'GhkalwKELF', '233802410288', '321267804911', '2019-11-21 12:50:28'),
(13, 'TrfOS6qMkb', '44ndkrA0am', '753678237313', '108278049269', '2019-11-21 12:50:28'),
(14, 'IMuITt77dx', 'eUSPl8YeQh', '228145236254', '981686315672', '2019-11-21 12:50:28'),
(15, 'anlel0IC6P', 'bVbRUo36To', '434155361070', '296594131506', '2019-11-21 12:50:28'),
(16, 'vwDtJR3X1m', 'W6nOQzaagZ', '233802410288', '156958966286', '2019-11-21 12:50:28'),
(17, 'M0jgj6y6wtNeBD', '44ndkrA0am', '233802410288', '108278049269', '2019-11-25 17:47:29'),
(18, '7R8cG47W1UV3kG', 'iBVQfiepeG6qeV', '233802410288', '108278049269', '2019-11-27 13:21:31'),
(19, 'o6mMF7DI3KnSd8', 'iBVQfiepeG6qeV', '753678237313', '108278049269', '2019-11-27 15:21:47'),
(21, 'IMh5eZQQQ14fwK', 'zMiBJlVhKk', '645447357569', '981686315672', '2019-11-28 20:33:02'),
(22, 'OX0xXjDwA5Srvl', 'zMiBJlVhKk', '715478889450', '981686315672', '2019-12-01 15:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_reply`
--

CREATE TABLE `conversation_reply` (
  `id` int(255) NOT NULL,
  `cid` varchar(300) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `nid` varchar(300) NOT NULL,
  `user_sending` varchar(300) NOT NULL,
  `reply` longtext NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_reply`
--

INSERT INTO `conversation_reply` (`id`, `cid`, `projectid`, `nid`, `user_sending`, `reply`, `read_status`, `date_added`) VALUES
(1, '0vxSqcCa0T', 'bVbRUo36To', '2', '715478889450', 'Hey I can do the work.', 1, '2019-11-21 12:50:28'),
(2, '0vxSqcCa0T', 'bVbRUo36To', '3', '296594131506', 'YesI will hire you.', 1, '2019-11-21 12:50:28'),
(3, '5UpuwAIti2', 'uJCOYwXrdO', '5', '233802410288', 'Hi Kevin, I can build the custom webpages at $100. I am a hard worker with great focus on great design.\r\nThank you. ', 1, '2019-11-21 12:50:28'),
(4, 'FxzwgxrbYs', 'PZgr7p7EeB', '7', '753678237313', 'Hi Gerald Myers.\r\n\r\nI am willing to do the transcribing work.\r\n\r\nI can do the work in 1 weeks time.', 1, '2019-11-21 12:50:28'),
(5, 'YnBTwy2eFD', 'GhkalwKELF', '9', '645447357569', 'Hi Margaret,\r\n\r\nI am good at Craft CMS, look at my work on my profile.\r\n\r\nI will be willing to work your project.\r\n\r\nThank you.', 1, '2019-11-21 12:50:28'),
(6, 'SHLn1hQctH', 'uJCOYwXrdO', '12', '305378125552', 'I am qualified Frontend Developer working for Duuuunk.com.\r\n\r\nI can do the work and produce high quality work.', 1, '2019-11-21 12:50:28'),
(7, '5wEUCSLl8V', 'fi47zFrW8s', '14', '228145236254', 'Hi Patricia,\r\n\r\nI can do the SEO for your website.\r\n\r\nWhich website is that?', 1, '2019-11-21 12:50:28'),
(8, 'vri2xrbG9X', 'WQjrwtmy7Q', '16', '324036228471', 'For online profiling and video/track tagging youtube it needs alot of work that\'s why I have posted my budget at $100.\r\n\r\nThank you.', 1, '2019-11-21 12:50:28'),
(9, 'tpoMMHWVBC', 'e2qj4OYYIs', '19', '188158648562', 'Hi Hellen,\r\n\r\ni have seen your profile and I am impressed.\r\n\r\nWould you want to this work of Quickbooks for me?\r\n\r\nYour reply will be much appreciated.\r\n\r\nThank you.', 1, '2019-11-21 12:50:28'),
(11, 'z7Jfwz4l71', 'Wm0W6YvzLr', '23', '431974897102', 'Hey Charles, are you willing to do this project for me?\r\n\r\nThank you.', 1, '2019-11-21 12:50:28'),
(12, 'L69bRrC2gL', 'GhkalwKELF', '25', '321267804911', 'Hi Dexter,\r\n\r\nI have seen on your profile that you are a Mobile Apps Developer.\r\n\r\nI am wondering if you know how to develop using Craft CMS?', 1, '2019-11-21 12:50:28'),
(13, 'mOHdEkq1LD', 'GhkalwKELF', '27', '321267804911', 'Hey Anthony Fisher,\r\n\r\nAre you able to work with Craft CMS, or are you just a frontend developer.', 1, '2019-11-21 12:50:28'),
(14, 'TrfOS6qMkb', '44ndkrA0am', '29', '108278049269', 'Hi Julia,\r\n\r\nAre you able to do this work?', 0, '2019-11-21 12:50:28'),
(15, 'z7Jfwz4l71', 'Wm0W6YvzLr', '31', '715478889450', 'Yes I will work on it.', 1, '2019-11-21 12:50:28'),
(16, 'IMuITt77dx', 'eUSPl8YeQh', '33', '981686315672', 'Hey do you want to work on this project?', 0, '2019-11-21 12:50:28'),
(17, 'IMuITt77dx', 'eUSPl8YeQh', '35', '228145236254', 'Yes I can do the work.', 1, '2019-11-21 12:50:28'),
(18, 'tpoMMHWVBC', 'e2qj4OYYIs', '39', '199476311866', 'Yes I can do the work, thank you.', 0, '2019-11-21 12:50:28'),
(19, 'z7Jfwz4l71', 'Wm0W6YvzLr', '42', '431974897102', 'Hi, I have hired you.\n\nI am sending you the files need so you can start to work.', 1, '2019-11-21 12:50:28'),
(20, 'z7Jfwz4l71', 'Wm0W6YvzLr', '45', '715478889450', 'Jesse, I have already finished your logo and uploaded the file. Please check to confirm if it\'s what you wanted.', 1, '2019-11-21 12:50:28'),
(21, 'YnBTwy2eFD', 'GhkalwKELF', '49', '321267804911', 'Hey I have hired you and posted a file. Can you start today?', 1, '2019-11-21 13:19:40'),
(22, 'SHLn1hQctH', 'uJCOYwXrdO', '52', '329616019298', 'Hi, I am going to hire you. and send the files today.', 1, '2019-11-21 13:19:40'),
(23, 'SHLn1hQctH', 'uJCOYwXrdO', '56', '305378125552', 'I have finished the work.', 0, '2019-11-21 13:19:40'),
(24, 'anlel0IC6P', 'bVbRUo36To', '66', '296594131506', 'Hey would like to work for me on this project?', 1, '2019-11-21 13:19:40'),
(25, 'anlel0IC6P', 'bVbRUo36To', '68', '434155361070', 'Yes, I would gladly do the job.', 1, '2019-11-21 13:19:40'),
(26, 'anlel0IC6P', 'bVbRUo36To', '70', '296594131506', 'I am sending the files right now.', 1, '2019-11-21 13:19:40'),
(27, 'anlel0IC6P', 'bVbRUo36To', '72', '296594131506', 'Can you build something like that on the file?', 1, '2019-11-21 13:19:40'),
(28, 'anlel0IC6P', 'bVbRUo36To', '74', '434155361070', 'I have finished the design and its PHP', 0, '2019-11-21 13:19:40'),
(29, 'vri2xrbG9X', 'WQjrwtmy7Q', '79', '199513386617', 'I have paid, now start the work. I expect it today.', 1, '2019-11-21 13:19:40'),
(30, 'vwDtJR3X1m', 'W6nOQzaagZ', '88', '156958966286', 'Hi Anthony, do you know how to use Salesforce?', 0, '2019-11-21 13:19:40'),
(31, 'vwDtJR3X1m', 'W6nOQzaagZ', '92', '233802410288', 'I would love to work on this Project. Yes I know salesforce.', 0, '2019-11-21 13:19:40'),
(33, 'M0jgj6y6wtNeBD', '44ndkrA0am', '104', '233802410288', 'Nice', 1, '2019-11-25 20:23:39'),
(35, 'M0jgj6y6wtNeBD', '44ndkrA0am', '107', '108278049269', 'working', 1, '2019-11-26 16:07:13'),
(36, 'M0jgj6y6wtNeBD', '44ndkrA0am', '108', '108278049269', 'Test', 1, '2019-11-26 17:05:29'),
(37, 'M0jgj6y6wtNeBD', '44ndkrA0am', '109', '233802410288', 'test', 1, '2019-11-26 21:14:08'),
(38, 'TrfOS6qMkb', '44ndkrA0am', '111', '753678237313', 'test', 0, '2019-11-27 06:24:06'),
(39, 'M0jgj6y6wtNeBD', '44ndkrA0am', '112', '108278049269', 'test', 1, '2019-11-27 06:48:48'),
(40, '7R8cG47W1UV3kG', 'iBVQfiepeG6qeV', '114', '108278049269', 'can you work on this', 1, '2019-11-27 13:21:31'),
(41, '7R8cG47W1UV3kG', 'iBVQfiepeG6qeV', '115', '233802410288', 'Yes I can', 1, '2019-11-27 13:23:31'),
(42, '7R8cG47W1UV3kG', 'iBVQfiepeG6qeV', '117', '233802410288', 'yes i can', 1, '2019-11-27 15:11:26'),
(43, 'o6mMF7DI3KnSd8', 'iBVQfiepeG6qeV', '119', '108278049269', 'hey', 0, '2019-11-27 15:21:47'),
(44, 'bfkBchX9Dkc5ko', 'zMiBJlVhKk', '125', '212335505903', 'I would love to the work.', 0, '2019-11-28 20:23:28'),
(45, 'IMh5eZQQQ14fwK', 'zMiBJlVhKk', '127', '645447357569', 'Test', 1, '2019-11-28 20:33:02'),
(46, 'OX0xXjDwA5Srvl', 'zMiBJlVhKk', '145', '715478889450', 'I can do this for $70.\r\n\r\nThanks.', 0, '2019-12-01 15:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(255) NOT NULL,
  `currency_code` varchar(300) NOT NULL,
  `currency_name` varchar(300) NOT NULL,
  `currency_symbol` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency_code`, `currency_name`, `currency_symbol`) VALUES
(1, 'USD', 'US Dollar', '$'),
(2, 'AUD', 'Australian dollar', '$'),
(3, 'BRL', 'Brazilian real', 'R$'),
(5, 'CAD', 'Canadian dollar', '$'),
(6, 'CLP', 'Chilean peso', '$'),
(7, 'CNY', 'Chinese yuan', 'Â¥'),
(8, 'DKK', 'Danish krone', 'kr'),
(9, 'EUR', 'Euro', 'â‚¬'),
(10, 'HKD', 'Hong Kong dollar', '$'),
(11, 'INR', 'Indian rupee', 'â‚¹'),
(12, 'IDR', 'Indonesian rupiah', 'Rp'),
(13, 'ILS', 'Israeli new shekel', 'â‚ª'),
(14, 'JPY', 'Japanese yen', 'Â¥'),
(15, 'KES', 'Kenyan shilling', 'Ksh'),
(16, 'KPW', 'North Korean won', 'â‚©'),
(17, 'KRW', 'South Korean won', 'â‚©'),
(18, 'MYR', 'Malaysian ringgit', 'RM'),
(19, 'MXN', 'Mexican peso', '$'),
(20, 'NZD', 'New Zealand dollar', '$'),
(21, 'NOK', 'Norwegian krone', 'kr'),
(22, 'PKR', 'Pakistani rupee', 'â‚¨'),
(23, 'PLN', 'Polish zÅ‚oty', 'zÅ‚'),
(24, 'PHP', 'Philippine peso', 'â‚±'),
(25, 'RUB', 'Russian ruble', 'â‚½'),
(26, 'SGD', 'Singapore dollar', '$'),
(27, 'ZAR', 'South African rand', 'R'),
(28, 'SEK', 'Swedish krona', 'kr'),
(29, 'CHF', 'Swiss franc', 'Fr'),
(30, 'TWD', 'New Taiwan dollar', '$'),
(31, 'TRY', 'Turkish lira', 'â‚º'),
(32, 'AED', 'United Arab Emirates dirham', 'Ø¯.Ø¥'),
(39, 'GG', 'GG', '('),
(40, 'GG', 'Mexican', '*'),
(41, 'GG', 'GG', '6');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `quote` mediumtext NOT NULL,
  `imagelocation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `title`, `quote`, `imagelocation`) VALUES
(1, 'Ella Lucas', 'Founder of Capital YTS LLC', 'We were looking for a freelancer with high skills to build our website, and we found them here. We couldn\'t be more happy.', '20.04.09.12.23-1586424213.6829-47091951.jpg'),
(2, 'Jerry Neal', 'Lead Marketer', 'Thanks to the freelancers we have hired over the years have helped our Growth tremendously. ', '20.04.09.12.25-1586424339.589-86496106.jpg'),
(3, 'Lillian Elliott', 'Frontend Developer', 'I have been a freelancer on this website since 2011, I have been able to raise a family with the clients & revenue I have received.', '20.04.09.12.27-1586424458.8071-36372182.jpg'),
(4, 'Cory Russell', 'Founder of Wave Inc', 'Grateful for all of our freelancers, who work tirelessly to fulfill all of our clients needs in the projects they have posted. ', '20.04.09.12.30-1586424604.1183-37810002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dispute_conversation`
--

CREATE TABLE `dispute_conversation` (
  `id` int(255) NOT NULL,
  `cid` varchar(300) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `adminid` varchar(300) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispute_conversation`
--

INSERT INTO `dispute_conversation` (`id`, `cid`, `projectid`, `freelancerid`, `clientid`, `adminid`, `action`, `date_added`) VALUES
(1, 'a2ehmqNvOs', 'GhkalwKELF', '645447357569', '321267804911', '1471436678', 2, '2019-11-21 13:36:58'),
(2, 'unmJ6WO4yk', 'fi47zFrW8s', '228145236254', '969406884108', '1471436678', 1, '2019-11-21 13:36:58'),
(3, 'hX39ssaxMyAASs', '44ndkrA0am', '233802410288', '108278049269', '1471436678', 2, '2019-12-01 14:23:42'),
(4, 'dX1bs5YyTZPllH', 'e2qj4OYYIs', '199476311866', '188158648562', '1471436678', 1, '2019-12-01 20:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `dispute_conversation_reply`
--

CREATE TABLE `dispute_conversation_reply` (
  `id` int(255) NOT NULL,
  `cid` varchar(300) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `user_sending` varchar(300) NOT NULL,
  `reply` longtext NOT NULL,
  `read_status_freelancer` tinyint(4) NOT NULL,
  `read_status_client` tinyint(4) NOT NULL,
  `read_status_admin` tinyint(4) NOT NULL,
  `is_admin` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispute_conversation_reply`
--

INSERT INTO `dispute_conversation_reply` (`id`, `cid`, `projectid`, `user_sending`, `reply`, `read_status_freelancer`, `read_status_client`, `read_status_admin`, `is_admin`, `date_added`) VALUES
(1, 'a2ehmqNvOs', 'GhkalwKELF', '321267804911', 'The Freelancer seems to not know Craft CMS, please return my money back. Thank you.', 1, 1, 1, 0, '2019-11-21 13:36:58'),
(2, 'a2ehmqNvOs', 'GhkalwKELF', '1471436678', 'What did the Freelancer do?', 1, 1, 1, 1, '2019-11-21 13:40:20'),
(3, 'a2ehmqNvOs', 'GhkalwKELF', '321267804911', 'She just sent the file exactly as I had sent her.', 1, 1, 1, 0, '2019-11-21 13:40:20'),
(4, 'a2ehmqNvOs', 'GhkalwKELF', '645447357569', 'Hi Admin, I fixed an error on the file. The Client got the file she wanted now she doesn\'t want to hire me. ', 1, 1, 1, 0, '2019-11-21 13:40:20'),
(5, 'a2ehmqNvOs', 'GhkalwKELF', '321267804911', 'No the file is exactly as I sent.', 0, 1, 1, 0, '2019-11-21 13:40:20'),
(6, 'a2ehmqNvOs', 'GhkalwKELF', '1471436678', 'I have seen the file, its exactly as the Client posted. So I would have to return the money to the Client.', 0, 1, 1, 1, '2019-11-21 13:40:20'),
(7, 'unmJ6WO4yk', 'fi47zFrW8s', '228145236254', 'The Client is not willing to release the funds and I have already finished the project.', 1, 1, 1, 0, '2019-11-21 13:40:20'),
(8, 'unmJ6WO4yk', 'fi47zFrW8s', '1471436678', 'Hey Patricia, I have seen Sharon the freelancer has finished the work. I will have to award the freelancer the money.', 1, 1, 1, 1, '2019-11-21 13:40:20'),
(9, 'unmJ6WO4yk', 'fi47zFrW8s', '969406884108', 'test', 0, 1, 1, 0, '2019-11-30 14:38:58'),
(10, 'hX39ssaxMyAASs', '44ndkrA0am', '108278049269', 'The freelancer isn\'t replying to my messages.', 1, 1, 1, 0, '2019-12-01 14:23:42'),
(12, 'hX39ssaxMyAASs', '44ndkrA0am', '233802410288', 'test', 1, 1, 1, 0, '2019-12-01 16:42:31'),
(13, 'dX1bs5YyTZPllH', 'e2qj4OYYIs', '199476311866', 'The client has refused to released the money.', 1, 0, 1, 0, '2019-12-01 20:40:08'),
(19, 'dX1bs5YyTZPllH', 'e2qj4OYYIs', '1471436678', 'Lets wait for the client to reply the dispute. Thanks.', 0, 0, 1, 1, '2019-12-02 15:24:53'),
(20, 'hX39ssaxMyAASs', '44ndkrA0am', '1471436678', 'Just a test', 1, 1, 1, 1, '2019-12-02 16:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `escrow`
--

CREATE TABLE `escrow` (
  `id` int(255) NOT NULL,
  `proposalid` varchar(300) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `nid` int(70) NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escrow`
--

INSERT INTO `escrow` (`id`, `proposalid`, `projectid`, `freelancerid`, `clientid`, `nid`, `budget`, `action`, `read_status`, `date_added`) VALUES
(1, '11', 'eUSPl8YeQh', '228145236254', '981686315672', 36, '100.00', 2, 1, '2019-11-21 10:38:02'),
(2, '12', 'e2qj4OYYIs', '199476311866', '188158648562', 40, '100.00', 2, 1, '2019-11-21 10:38:02'),
(3, '10', 'Wm0W6YvzLr', '715478889450', '431974897102', 41, '70.00', 2, 1, '2019-11-21 10:38:02'),
(4, '4', 'GhkalwKELF', '645447357569', '321267804911', 47, '150.00', 4, 0, '2019-11-21 10:38:02'),
(5, '6', 'uJCOYwXrdO', '305378125552', '329616019298', 53, '100.00', 2, 1, '2019-11-21 10:38:02'),
(6, '13', 'bVbRUo36To', '434155361070', '296594131506', 69, '450.00', 2, 1, '2019-11-21 10:38:02'),
(7, '8', 'WQjrwtmy7Q', '324036228471', '199513386617', 78, '60.00', 2, 0, '2019-11-21 10:38:02'),
(8, '7', 'fi47zFrW8s', '228145236254', '969406884108', 83, '150.00', 2, 1, '2019-11-21 10:38:02'),
(9, '14', 'W6nOQzaagZ', '233802410288', '156958966286', 93, '100.00', 2, 1, '2019-11-21 10:38:02'),
(13, '3', 'PZgr7p7EeB', '753678237313', '981686315672', 123, '70.00', 2, 1, '2019-11-28 17:34:14'),
(14, '19', '44ndkrA0am', '233802410288', '108278049269', 142, '100.00', 4, 1, '2019-11-30 17:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(255) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` longtext NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `date_added`) VALUES
(6, 'What is Wave?', '<p>Wave is a Powerful Freelance Marketplace System.\r\n</p><p>It has the ability to change the users (Freelancers &amp; Clients).</p><p>Start a Freelance Marketplace Business with no hustle.<br></p>', '2019-11-12 12:50:45'),
(7, 'How does Wave generate revenue?', '<p>Wave makes money by taking 30% of payments paid to Freelancers. </p><p>You will change the percentage on the Admin Section.</p>', '2019-11-12 12:51:26'),
(8, 'How does Wave Pay Freelancers?', '<p>You as admin you pay the freelancers to their PayPal Emails.</p><p>Then you go to the \"Withdrawals Section\" and click Paid.<br></p><p>The date to pay the freelancers is 4 days after they request.</p>', '2019-11-12 12:52:01'),
(9, 'How does Wave handle Disputes?', '<p>When a project is under dispute, the Admin will be notified. </p><p>Then the Admin, Client and the Freelancer will start a dispute conversation in order to determine party at fault.</p><p> If the Party at fault is the Client, then the money will be awarded to the Freelancer. </p><p>If the Party at fault is the Freelancer, then the money will be returned to the Client.</p>', '2019-11-12 12:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(255) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `user_sending` varchar(300) NOT NULL,
  `user_receiving` varchar(300) NOT NULL,
  `nid` varchar(300) NOT NULL,
  `fileupload` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `extension` varchar(300) NOT NULL,
  `size` varchar(300) NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `projectid`, `user_sending`, `user_receiving`, `nid`, `fileupload`, `type`, `extension`, `size`, `read_status`, `date_added`) VALUES
(1, 'eUSPl8YeQh', '228145236254', '981686315672', '37', '1ywL15JJUgimg_3.jpg', 'image/jpeg', 'jpg', '32.578125', 1, '2019-11-21 10:38:02'),
(2, 'Wm0W6YvzLr', '431974897102', '715478889450', '43', 'euxmlRR6VWlogo.svg', 'image/svg+xml', 'svg', '5.4638671875', 1, '2019-11-21 10:38:02'),
(3, 'Wm0W6YvzLr', '715478889450', '431974897102', '44', 'tAONCakoYjlogo-mini.svg', 'image/svg+xml', 'svg', '1.9599609375', 1, '2019-11-21 10:38:02'),
(6, 'uJCOYwXrdO', '329616019298', '305378125552', '54', 'svLZVKb3hIindex.html', 'text/html', 'html', '5.59765625', 1, '2019-11-21 10:38:02'),
(7, 'uJCOYwXrdO', '305378125552', '329616019298', '55', 'Ps6kWNMcM9index.html', 'text/html', 'html', '5.59765625', 1, '2019-11-21 10:38:02'),
(8, 'bVbRUo36To', '296594131506', '434155361070', '71', 'wrr45XlIov1.png', 'image/png', 'png', '339.392578125', 1, '2019-11-21 10:38:02'),
(9, 'bVbRUo36To', '434155361070', '296594131506', '73', 'MssmvGuFaAindex.html', 'text/html', 'html', '4.9736328125', 0, '2019-11-21 10:38:02'),
(10, 'fi47zFrW8s', '969406884108', '228145236254', '84', 'vdTmHvR5P51.jpg', 'image/jpeg', 'jpg', '52.9609375', 1, '2019-11-21 10:38:02'),
(13, 'eUSPl8YeQh', '981686315672', '228145236254', '128', 'SO3kMxokWOBx1W.png', 'image/png', 'png', '9.3388671875', 1, '2019-11-29 07:13:19'),
(16, 'eUSPl8YeQh', '981686315672', '228145236254', '131', 'zUH8WMpiEasGdd.jpg', 'image/jpeg', 'jpg', '54.375', 1, '2019-11-29 11:40:05'),
(18, 'eUSPl8YeQh', '228145236254', '981686315672', '133', 'KF8FHt06l1jqI7.png', 'image/png', 'png', '6.234375', 1, '2019-11-29 12:04:07'),
(19, 'e2qj4OYYIs', '199476311866', '188158648562', '147', 'ceddull0TMKCNg.jpg', 'image/jpeg', 'jpg', '26.0009765625', 0, '2019-12-02 13:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` int(255) NOT NULL,
  `paymentid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_fee` decimal(15,2) NOT NULL,
  `complete` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funds`
--

INSERT INTO `funds` (`id`, `paymentid`, `clientid`, `type`, `amount`, `transaction_fee`, `complete`, `date_added`) VALUES
(1, 'F8q4isS1a2', '321267804911', 'PayPal', '150.00', '2.30', 1, '2019-11-21 10:38:02'),
(2, 'MFHqoN1aiK', '981686315672', 'PayPal', '100.00', '2.30', 1, '2019-11-21 10:38:02'),
(3, 'hrUApfWRpM', '431974897102', 'Stripe', '100.00', '2.30', 1, '2019-11-21 10:38:02'),
(4, 'QPFWRI9u27', '188158648562', 'Stripe', '100.00', '2.30', 1, '2019-11-21 10:38:02'),
(5, 'icBgUkhxFf', '329616019298', 'PayPal', '100.00', '2.30', 1, '2019-11-21 10:38:02'),
(6, 'HiKIJbp2cp', '296594131506', 'Stripe', '450.00', '2.30', 1, '2019-11-21 10:38:02'),
(7, 'MofcuCigg3', '199513386617', 'PayPal', '75.00', '2.30', 1, '2019-04-26 14:58:49'),
(8, 'Xu35k96EDe', '969406884108', 'Stripe', '150.00', '2.30', 1, '2019-04-29 10:48:38'),
(9, 'G4RkmLphMe', '156958966286', 'PayPal', '100.00', '2.30', 1, '2019-04-29 11:07:37'),
(12, 'OCevJvAdOa', '981686315672', 'Stripe', '30.00', '2.30', 1, '2019-10-23 10:44:38'),
(13, 'reUV5m5KvV', '981686315672', 'PayPal', '30.00', '2.30', 1, '2019-10-24 05:01:42'),
(14, 'PCZ2IGnQgH', '981686315672', 'Stripe', '30.00', '2.30', 1, '2019-10-24 05:02:37'),
(15, 'YH09B1MI4V', '981686315672', 'Stripe', '10.00', '2.30', 1, '2019-10-24 21:17:36'),
(16, 'u0djenoyLM', '981686315672', 'Razorpay', '70.00', '2.30', 0, '2019-11-26 15:52:35'),
(17, 'm5qDjDAk5uushk', '981686315672', 'PayPal', '10.00', '2.50', 1, '2019-11-27 21:52:21'),
(18, 'rIbQwmM63lU2tY', '981686315672', 'Stripe', '10.00', '2.50', 1, '2019-11-28 14:32:48'),
(19, 'YWmBKGp1tOD6nU', '981686315672', 'Razorpay', '10.00', '2.50', 1, '2019-11-28 14:49:32'),
(20, 'VwSSdPMNSIeqrr', '981686315672', 'PayStack', '10.00', '2.50', 1, '2019-11-28 14:55:06'),
(21, 'ZrXLIN4z1yLUqg', '108278049269', 'Stripe', '100.00', '2.50', 1, '2019-11-30 17:34:37'),
(22, 'Kjep436', '981686315672', 'Bank Transfer', '10.00', '2.50', 2, '2020-04-11 11:35:34'),
(23, 'jerfgt32', '981686315672', 'Bank Transfer', '10.00', '2.50', 1, '2020-04-11 12:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE `how_it_works` (
  `id` int(255) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `imagelocation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `title`, `description`, `imagelocation`) VALUES
(1, 'Create an Account', 'Then post a project, our top freelancers will quickly post their counter offers on the project. Select and hire.', '20.04.08.17.34-1586356476.3597-59576804.png'),
(2, 'Search Jobs', 'Quickly find great jobs posted by our clients. You will post your bid and get hired.', '20.04.08.17.36-1586356599.7975-11605768.png'),
(3, 'Save & Apply', 'With the high quality jobs posted here, it wouldn\'t miss a job befitting your skills.', '20.04.08.17.38-1586356687.4243-27621647.png');

-- --------------------------------------------------------

--
-- Table structure for table `invite`
--

CREATE TABLE `invite` (
  `id` int(255) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `nid` varchar(300) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_declined` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invite`
--

INSERT INTO `invite` (`id`, `projectid`, `freelancerid`, `clientid`, `nid`, `action`, `read_status`, `date_declined`, `date_added`) VALUES
(1, 'e2qj4OYYIs', '199476311866', '188158648562', '18', 1, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(3, 'Wm0W6YvzLr', '715478889450', '431974897102', '22', 1, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(4, 'GhkalwKELF', '434155361070', '321267804911', '24', 3, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(5, 'GhkalwKELF', '233802410288', '321267804911', '26', 2, 1, '2019-11-21 10:42:02', '2019-11-21 10:38:02'),
(6, '44ndkrA0am', '753678237313', '108278049269', '28', 1, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(7, 'eUSPl8YeQh', '228145236254', '981686315672', '32', 1, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(8, 'bVbRUo36To', '434155361070', '296594131506', '65', 1, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(9, 'W6nOQzaagZ', '233802410288', '156958966286', '87', 1, 1, '0000-00-00 00:00:00', '2019-11-21 10:38:02'),
(10, 'iBVQfiepeG6qeV', '233802410288', '108278049269', '113', 1, 1, '2019-11-27 15:11:26', '2019-11-27 13:21:31'),
(11, 'iBVQfiepeG6qeV', '753678237313', '108278049269', '118', 2, 1, '2019-11-27 15:34:40', '2019-11-27 15:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `user_sending` varchar(300) NOT NULL,
  `user_receiving` varchar(300) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `projectid`, `user_sending`, `user_receiving`, `type`, `read_status`, `date_added`) VALUES
(1, 'bVbRUo36To', '715478889450', '296594131506', 1, 1, '2019-11-21 10:38:02'),
(2, 'bVbRUo36To', '715478889450', '296594131506', 2, 1, '2019-11-21 10:38:02'),
(3, 'bVbRUo36To', '296594131506', '715478889450', 2, 1, '2019-11-21 10:38:02'),
(4, 'uJCOYwXrdO', '233802410288', '329616019298', 1, 1, '2019-11-21 10:38:02'),
(5, 'uJCOYwXrdO', '233802410288', '329616019298', 2, 1, '2019-11-21 10:38:02'),
(6, 'PZgr7p7EeB', '753678237313', '981686315672', 1, 1, '2019-11-21 10:38:02'),
(7, 'PZgr7p7EeB', '753678237313', '981686315672', 2, 1, '2019-11-21 10:38:02'),
(8, 'GhkalwKELF', '645447357569', '321267804911', 1, 1, '2019-11-21 10:38:02'),
(9, 'GhkalwKELF', '645447357569', '321267804911', 2, 1, '2019-11-21 10:38:02'),
(10, 'eUSPl8YeQh', '199476311866', '981686315672', 1, 1, '2019-11-21 10:38:02'),
(11, 'uJCOYwXrdO', '305378125552', '329616019298', 1, 1, '2019-11-21 10:38:02'),
(12, 'uJCOYwXrdO', '305378125552', '329616019298', 2, 1, '2019-11-21 10:38:02'),
(13, 'fi47zFrW8s', '228145236254', '969406884108', 1, 0, '2019-11-21 10:38:02'),
(14, 'fi47zFrW8s', '228145236254', '969406884108', 2, 0, '2019-11-21 10:38:02'),
(15, 'WQjrwtmy7Q', '324036228471', '199513386617', 1, 0, '2019-11-21 10:38:02'),
(16, 'WQjrwtmy7Q', '324036228471', '199513386617', 2, 0, '2019-11-21 10:38:02'),
(17, 'W6nOQzaagZ', '434155361070', '156958966286', 1, 1, '2019-11-21 10:38:02'),
(18, 'e2qj4OYYIs', '188158648562', '199476311866', 3, 1, '2019-11-21 10:38:02'),
(19, 'e2qj4OYYIs', '188158648562', '199476311866', 2, 1, '2019-11-21 10:38:02'),
(22, 'Wm0W6YvzLr', '431974897102', '715478889450', 3, 1, '2019-11-21 10:38:02'),
(23, 'Wm0W6YvzLr', '431974897102', '715478889450', 2, 1, '2019-11-21 10:38:02'),
(24, 'GhkalwKELF', '321267804911', '434155361070', 3, 1, '2019-11-21 10:38:02'),
(25, 'GhkalwKELF', '321267804911', '434155361070', 2, 1, '2019-11-21 10:38:02'),
(26, 'GhkalwKELF', '321267804911', '233802410288', 3, 1, '2019-11-21 10:38:02'),
(27, 'GhkalwKELF', '321267804911', '233802410288', 2, 1, '2019-11-21 10:38:02'),
(28, '44ndkrA0am', '108278049269', '753678237313', 3, 1, '2019-11-21 10:38:02'),
(29, '44ndkrA0am', '108278049269', '753678237313', 2, 1, '2019-11-21 10:38:02'),
(30, 'Wm0W6YvzLr', '715478889450', '431974897102', 1, 1, '2019-11-21 10:38:02'),
(31, 'Wm0W6YvzLr', '715478889450', '431974897102', 2, 1, '2019-11-21 10:38:02'),
(32, 'eUSPl8YeQh', '981686315672', '228145236254', 3, 1, '2019-11-21 10:38:02'),
(33, 'eUSPl8YeQh', '981686315672', '228145236254', 2, 1, '2019-11-21 10:38:02'),
(34, 'eUSPl8YeQh', '228145236254', '981686315672', 1, 1, '2019-11-21 10:38:02'),
(35, 'eUSPl8YeQh', '228145236254', '981686315672', 2, 1, '2019-11-21 10:38:02'),
(36, 'eUSPl8YeQh', '981686315672', '228145236254', 4, 1, '2019-11-21 10:38:02'),
(37, 'eUSPl8YeQh', '228145236254', '981686315672', 5, 1, '2019-11-21 10:38:02'),
(38, 'e2qj4OYYIs', '199476311866', '188158648562', 1, 0, '2019-11-21 10:38:02'),
(39, 'e2qj4OYYIs', '199476311866', '188158648562', 2, 0, '2019-11-21 10:38:02'),
(40, 'e2qj4OYYIs', '188158648562', '199476311866', 4, 1, '2019-11-21 10:38:02'),
(41, 'Wm0W6YvzLr', '431974897102', '715478889450', 4, 1, '2019-11-21 10:38:02'),
(42, 'Wm0W6YvzLr', '431974897102', '715478889450', 2, 1, '2019-11-21 10:38:02'),
(43, 'Wm0W6YvzLr', '431974897102', '715478889450', 5, 1, '2019-11-21 10:38:02'),
(44, 'Wm0W6YvzLr', '715478889450', '431974897102', 5, 1, '2019-11-21 10:38:02'),
(45, 'Wm0W6YvzLr', '715478889450', '431974897102', 2, 1, '2019-11-21 10:38:02'),
(46, 'Wm0W6YvzLr', '431974897102', '715478889450', 7, 1, '2019-11-21 10:38:02'),
(47, 'GhkalwKELF', '321267804911', '645447357569', 4, 1, '2019-11-21 10:38:02'),
(48, 'GhkalwKELF', '321267804911', '645447357569', 5, 1, '2019-11-21 10:38:02'),
(49, 'GhkalwKELF', '321267804911', '645447357569', 2, 1, '2019-11-21 10:38:02'),
(50, 'GhkalwKELF', '645447357569', '321267804911', 5, 1, '2019-11-21 10:38:02'),
(51, 'GhkalwKELF', '321267804911', '645447357569', 6, 0, '2019-11-21 10:38:02'),
(52, 'uJCOYwXrdO', '329616019298', '305378125552', 2, 1, '2019-11-21 10:38:02'),
(53, 'uJCOYwXrdO', '329616019298', '305378125552', 4, 1, '2019-11-21 10:38:02'),
(54, 'uJCOYwXrdO', '329616019298', '305378125552', 5, 1, '2019-11-21 10:38:02'),
(55, 'uJCOYwXrdO', '305378125552', '329616019298', 5, 1, '2019-11-21 10:38:02'),
(56, 'uJCOYwXrdO', '305378125552', '329616019298', 2, 1, '2019-11-21 10:38:02'),
(57, 'uJCOYwXrdO', '329616019298', '305378125552', 7, 0, '2019-11-21 10:38:02'),
(58, 'uJCOYwXrdO', '305378125552', '329616019298', 8, 1, '2019-11-21 10:38:02'),
(59, 'uJCOYwXrdO', '329616019298', '305378125552', 8, 0, '2019-11-21 10:38:02'),
(60, 'eUSPl8YeQh', '981686315672', '228145236254', 7, 1, '2019-11-21 10:38:02'),
(61, 'eUSPl8YeQh', '981686315672', '228145236254', 8, 1, '2019-11-21 10:38:02'),
(62, 'eUSPl8YeQh', '228145236254', '981686315672', 8, 1, '2019-11-21 10:38:02'),
(63, 'Wm0W6YvzLr', '715478889450', '431974897102', 8, 1, '2019-11-21 10:38:02'),
(64, 'Wm0W6YvzLr', '431974897102', '715478889450', 8, 0, '2019-11-21 10:38:02'),
(65, 'bVbRUo36To', '296594131506', '434155361070', 3, 1, '2019-11-21 10:38:02'),
(66, 'bVbRUo36To', '296594131506', '434155361070', 2, 1, '2019-11-21 10:38:02'),
(67, 'bVbRUo36To', '434155361070', '296594131506', 1, 1, '2019-11-21 10:38:02'),
(68, 'bVbRUo36To', '434155361070', '296594131506', 2, 1, '2019-11-21 10:38:02'),
(69, 'bVbRUo36To', '296594131506', '434155361070', 4, 1, '2019-11-21 10:38:02'),
(70, 'bVbRUo36To', '296594131506', '434155361070', 2, 1, '2019-11-21 10:38:02'),
(71, 'bVbRUo36To', '296594131506', '434155361070', 5, 1, '2019-11-21 10:38:02'),
(72, 'bVbRUo36To', '296594131506', '434155361070', 2, 1, '2019-11-21 10:38:02'),
(73, 'bVbRUo36To', '434155361070', '296594131506', 5, 0, '2019-11-21 10:38:02'),
(74, 'bVbRUo36To', '434155361070', '296594131506', 2, 0, '2019-11-21 10:38:02'),
(75, 'bVbRUo36To', '296594131506', '434155361070', 7, 0, '2019-11-21 10:38:02'),
(76, 'bVbRUo36To', '296594131506', '434155361070', 8, 0, '2019-11-21 10:38:02'),
(77, 'bVbRUo36To', '434155361070', '296594131506', 8, 0, '2019-11-21 10:38:02'),
(78, 'WQjrwtmy7Q', '199513386617', '324036228471', 4, 1, '2019-11-21 10:38:02'),
(79, 'WQjrwtmy7Q', '199513386617', '324036228471', 2, 1, '2019-11-21 10:38:02'),
(80, 'WQjrwtmy7Q', '199513386617', '324036228471', 7, 1, '2019-11-21 10:38:02'),
(81, 'WQjrwtmy7Q', '199513386617', '324036228471', 8, 1, '2019-11-21 10:38:02'),
(82, 'WQjrwtmy7Q', '324036228471', '199513386617', 8, 0, '2019-11-21 10:38:02'),
(83, 'fi47zFrW8s', '969406884108', '228145236254', 4, 1, '2019-11-21 10:38:02'),
(84, 'fi47zFrW8s', '969406884108', '228145236254', 5, 1, '2019-11-21 10:38:02'),
(85, 'fi47zFrW8s', '228145236254', '969406884108', 6, 0, '2019-11-21 10:38:02'),
(86, 'fi47zFrW8s', '969406884108', '228145236254', 7, 1, '2019-11-21 10:38:02'),
(87, 'W6nOQzaagZ', '156958966286', '233802410288', 3, 1, '2019-11-21 10:38:02'),
(88, 'W6nOQzaagZ', '156958966286', '233802410288', 2, 1, '2019-11-21 10:38:02'),
(89, 'fi47zFrW8s', '228145236254', '969406884108', 8, 0, '2019-11-21 10:38:02'),
(90, 'fi47zFrW8s', '969406884108', '228145236254', 8, 1, '2019-11-21 10:38:02'),
(91, 'W6nOQzaagZ', '233802410288', '156958966286', 1, 0, '2019-11-21 10:38:02'),
(92, 'W6nOQzaagZ', '233802410288', '156958966286', 2, 0, '2019-11-21 10:38:02'),
(93, 'W6nOQzaagZ', '156958966286', '233802410288', 4, 1, '2019-11-21 10:38:02'),
(94, 'W6nOQzaagZ', '156958966286', '233802410288', 7, 1, '2019-11-21 10:38:02'),
(95, 'W6nOQzaagZ', '156958966286', '233802410288', 8, 1, '2019-11-21 10:38:02'),
(103, '44ndkrA0am', '233802410288', '108278049269', 1, 1, '2019-11-25 20:23:38'),
(107, '44ndkrA0am', '108278049269', '233802410288', 2, 1, '2019-11-26 16:07:13'),
(108, '44ndkrA0am', '108278049269', '233802410288', 2, 1, '2019-11-26 17:05:29'),
(109, '44ndkrA0am', '233802410288', '108278049269', 2, 1, '2019-11-26 21:14:08'),
(110, '44ndkrA0am', '753678237313', '108278049269', 1, 1, '2019-11-27 06:24:06'),
(111, '44ndkrA0am', '753678237313', '108278049269', 2, 1, '2019-11-27 06:24:06'),
(112, '44ndkrA0am', '108278049269', '233802410288', 2, 1, '2019-11-27 06:48:48'),
(113, 'iBVQfiepeG6qeV', '108278049269', '233802410288', 3, 1, '2019-11-27 13:21:31'),
(114, 'iBVQfiepeG6qeV', '108278049269', '233802410288', 2, 1, '2019-11-27 13:21:31'),
(115, 'iBVQfiepeG6qeV', '233802410288', '108278049269', 2, 1, '2019-11-27 13:23:31'),
(117, 'iBVQfiepeG6qeV', '233802410288', '108278049269', 2, 1, '2019-11-27 15:11:26'),
(118, 'iBVQfiepeG6qeV', '108278049269', '753678237313', 3, 1, '2019-11-27 15:21:47'),
(119, 'iBVQfiepeG6qeV', '108278049269', '753678237313', 2, 1, '2019-11-27 15:21:47'),
(123, 'PZgr7p7EeB', '981686315672', '753678237313', 4, 1, '2019-11-28 17:34:14'),
(124, 'zMiBJlVhKk', '212335505903', '981686315672', 1, 1, '2019-11-28 20:23:28'),
(125, 'zMiBJlVhKk', '212335505903', '981686315672', 2, 1, '2019-11-28 20:23:28'),
(126, 'zMiBJlVhKk', '645447357569', '981686315672', 1, 1, '2019-11-28 20:33:02'),
(127, 'zMiBJlVhKk', '645447357569', '981686315672', 2, 1, '2019-11-28 20:33:02'),
(128, 'eUSPl8YeQh', '981686315672', '228145236254', 5, 1, '2019-11-29 07:13:19'),
(131, 'eUSPl8YeQh', '981686315672', '228145236254', 5, 1, '2019-11-29 11:40:05'),
(133, 'eUSPl8YeQh', '228145236254', '981686315672', 5, 1, '2019-11-29 12:04:07'),
(135, 'PZgr7p7EeB', '981686315672', '753678237313', 7, 1, '2019-11-29 15:14:31'),
(137, 'PZgr7p7EeB', '981686315672', '753678237313', 8, 0, '2019-11-29 21:25:50'),
(139, 'W6nOQzaagZ', '233802410288', '156958966286', 8, 0, '2019-11-30 06:10:15'),
(142, '44ndkrA0am', '108278049269', '233802410288', 4, 1, '2019-11-30 17:35:07'),
(143, '44ndkrA0am', '108278049269', '233802410288', 6, 1, '2019-12-01 14:23:42'),
(144, 'zMiBJlVhKk', '715478889450', '981686315672', 1, 0, '2019-12-01 15:09:40'),
(145, 'zMiBJlVhKk', '715478889450', '981686315672', 2, 0, '2019-12-01 15:09:40'),
(146, 'e2qj4OYYIs', '199476311866', '188158648562', 6, 0, '2019-12-01 20:40:09'),
(147, 'e2qj4OYYIs', '199476311866', '188158648562', 5, 0, '2019-12-02 13:18:50'),
(148, 'e2qj4OYYIs', '188158648562', '199476311866', 7, 1, '2019-12-02 16:15:24'),
(149, '44ndkrA0am', '108278049269', '233802410288', 5, 0, '2019-12-02 17:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(255) NOT NULL,
  `escrow_id` varchar(300) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `nid` varchar(300) NOT NULL,
  `client_money` decimal(15,2) NOT NULL,
  `freelancer_money` decimal(15,2) NOT NULL,
  `company_money` decimal(15,2) NOT NULL,
  `complete` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `escrow_id`, `projectid`, `freelancerid`, `clientid`, `nid`, `client_money`, `freelancer_money`, `company_money`, `complete`, `date_added`) VALUES
(1, '3', 'Wm0W6YvzLr', '715478889450', '431974897102', '46', '70.00', '49.00', '21.00', 1, '2019-11-21 10:38:02'),
(2, '5', 'uJCOYwXrdO', '305378125552', '329616019298', '57', '100.00', '70.00', '30.00', 1, '2019-11-21 10:38:02'),
(3, '1', 'eUSPl8YeQh', '228145236254', '981686315672', '60', '100.00', '70.00', '30.00', 1, '2019-11-21 10:38:02'),
(4, '6', 'bVbRUo36To', '434155361070', '296594131506', '75', '450.00', '315.00', '135.00', 1, '2019-11-21 10:38:02'),
(5, '7', 'WQjrwtmy7Q', '324036228471', '199513386617', '80', '60.00', '42.00', '18.00', 1, '2019-11-21 10:38:02'),
(6, '8', 'fi47zFrW8s', '228145236254', '969406884108', '86', '150.00', '105.00', '45.00', 1, '2019-11-21 10:54:54'),
(7, '9', 'W6nOQzaagZ', '233802410288', '156958966286', '94', '100.00', '70.00', '30.00', 1, '2019-11-21 10:54:54'),
(9, '13', 'PZgr7p7EeB', '753678237313', '981686315672', '135', '70.00', '49.00', '21.00', 1, '2019-11-29 15:14:31'),
(10, '2', 'e2qj4OYYIs', '199476311866', '188158648562', '148', '100.00', '70.00', '30.00', 1, '2019-12-02 16:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(255) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `imagelocation` varchar(300) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `userid`, `description`, `imagelocation`, `date_added`) VALUES
(1, '233802410288', 'I made this for a company.', '4gcPsskgtW4.png', '2019-11-21 10:54:54'),
(2, '753678237313', 'Here is one of my blog post.', 'VdviNU3uGe4.png', '2019-11-21 10:54:54'),
(3, '715478889450', 'Pop Culture Screen Prints', '1556120225n-believe-05-550x354.jpg', '2019-11-21 10:54:54'),
(4, '645447357569', 'I developed this with my team for a company.', 'R75wqWd4n8preview_image.png', '2019-11-21 10:54:54'),
(5, '296482705384', 'Great branding for a company.', 'aZznXhhomoday_9_player_2x.png', '2019-11-21 10:54:54'),
(6, '199476311866', 'A powerful presentation we did for our company.', 'K9v8ppFM1Ggivey.png', '2019-11-21 10:54:54'),
(7, '305378125552', 'This is a social network my team and I were developing.', 'A3Ou3krbqqydzk.png', '2019-11-21 10:54:54'),
(8, '228145236254', 'A perfect example of my work.', 'hiBHEinqxzsearch_engine_optimization.jpg', '2019-11-21 10:54:54'),
(9, '324036228471', 'A short film we created with my team.', '1556105574n-believe-18-550x354.jpg', '2019-11-21 10:54:54'),
(10, '434155361070', 'Just perfect!!', '1556106203dribbble_1.png', '2019-11-21 10:54:54'),
(13, '715478889450', 'Just Perfect', '1556120202aa1-9e36-4791-b848-5f5a8813e7aa_2x.jpeg', '2019-11-21 10:54:54'),
(14, '233802410288', 'Success is not an accident', 'ApRweeMEpJnatoni_2x.png', '2019-11-21 10:54:54'),
(17, '233802410288', 'test', 'bsdm4UtXZhbSwS.jpg', '2019-11-21 14:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(255) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `slug` mediumtext NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `category` varchar(300) NOT NULL,
  `skills` mediumtext NOT NULL,
  `description` longtext NOT NULL,
  `closed` int(70) NOT NULL,
  `complete` tinyint(4) NOT NULL,
  `complete_date` datetime NOT NULL,
  `hired_date` datetime NOT NULL,
  `disputed_date` datetime NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectid`, `userid`, `freelancerid`, `title`, `slug`, `budget`, `category`, `skills`, `description`, `closed`, `complete`, `complete_date`, `hired_date`, `disputed_date`, `date_added`) VALUES
(1, 'PZgr7p7EeB', '981686315672', '753678237313', 'Transcriber required to transcribe 2 audio files', 'transcriber-required-to-transcribe-2-audio-files', '100.00', 'Writing & Translation', 'Transcription', '<p>Transcriber required for transcribing x2 audio files.\r\n\r\nWe are Mac users, so if it can be transcribed into pages that would be good. If not, Word is fine.\r\n\r\n</p><p>We will have a further requirement for this in the future, so it would be great to find someone we can have an ongoing relationship with.</p><p>The idea is to edit a â€œuser manualâ€ based on the transcripts.\r\n\r\nThe files are around 1h and 15 mins each.\r\n\r\nThank you and please let me know if you have any questions.</p>', 1, 1, '2019-11-29 15:14:31', '2019-11-28 17:34:14', '0000-00-00 00:00:00', '2019-11-21 10:54:54'),
(2, 'e2qj4OYYIs', '188158648562', '199476311866', 'I need a Quickbooks certified bookkeeper to work with my clients', 'i-need-a-quickbooks-certified-bookkeeper-to-work-with-my-clients', '200.00', 'Management & Finance', 'Sage Peachtree Complete Accounting ,Financial Accounting ,Certified Public Accountant (CPA) ', '<p>We are a new bookeeping and accountancy practice based in the UK.\r\n</p><p>I require an experienced bookkeeper who is Quickbooks certified to work remotely with a number of my clients.\r\n</p><p>Although there will be a small amount of work initially, I expect the volume to increase over time.\r\n</p><p>You must have excellent attention to detail and good communication skills.</p>', 1, 1, '2019-12-02 16:15:24', '0000-00-00 00:00:00', '2019-12-01 20:40:09', '2019-11-21 10:54:54'),
(3, 'Wm0W6YvzLr', '431974897102', '715478889450', 'Logo re draw and also possible redesign', 'logo-re-draw-and-also-possible-redesign', '50.00', 'Logo Design', 'Logo Design ,Adobe Muse ', '<p>We want to have our rough logo re designed/drawn and submitted to us in the various formats, we require vector, jpeg and png etc plus a Favicon, - we would also be interested in having a Facebook, twitter page designed but most important thing is the logo.\r\n\r\n</p><p>We will try to up load the current thoughts on design - but we are still open to a clear and good idea if the designer have a knock out design to put forward.\r\n</p><p>\r\nPricing is a guide\r\n\r\n\r\nWhilst we have a good idea of the design this is formed from an online self generated system and we are also open to any obvious or clear design improvements or suggestions. </p>', 1, 1, '2019-04-26 12:51:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 10:54:54'),
(4, 'GhkalwKELF', '321267804911', '', 'Craft CMS - translation and payment integration', 'craft-cms-translation-and-payment-integration', '150.00', 'Web, Mobile & Software Development', 'Craft CMS', '<p>I am looking for a developer to work with on an ongoing basis. </p><p>The first two elements involve Craft CMS specifically translating two pages and integrating a new payment method. </p>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 10:54:54'),
(5, 'uJCOYwXrdO', '329616019298', '305378125552', 'Individual Custom Webpages', 'individual-custom-webpages', '120.00', 'Web, Mobile & Software Development', 'Bootstrap,PHP ,HTML5 ,HTML ,CSS3 ', '<p>We are looking for a talented designer who can design 5 custom pages for the hosting side of our business.\r\n\r\n</p><p>The page names would be\r\nBusiness Hosting\r\nWebsite Hosting\r\nWordPress Hosting\r\nWordPress Premium Credits.\r\n\r\n</p><p>The subjects are not the most interesting and thatâ€™s why we need someone with a bit of imagination to design 4 super pages.\r\n\r\n</p><p>We would supply all the copy and images\r\n\r\nThe pages would need to be written in php, as they need to be converted into custom pages for WHMCS\r\n</p><p>Please see\r\nhttps://www.inmotionhosting.com/support/edu/whmcs/how-to-create-a-custom-page-for-whmcs.</p><p>\r\n\r\nWe already have rough ideas of what the pages should be like, but want someone to spice them up!</p>', 1, 1, '2019-04-26 14:09:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 10:54:54'),
(6, '44ndkrA0am', '108278049269', '', 'Accounting and book keeping outsourcing', 'accounting-and-book-keeping-outsourcing', '70.00', 'Management & Finance', 'Certified Public Accountant (CPA) ', '<p>I run my own small accounting firm I want to outsource some of the \r\nservices would you send me more information about you and the way you do\r\n the outsourcing, the N.D.A , the agreement and other related details.</p>', 0, 0, '0000-00-00 00:00:00', '2019-11-30 17:35:07', '2019-12-01 16:54:07', '2019-11-21 11:54:54'),
(7, 'bVbRUo36To', '296594131506', '434155361070', 'Full Time Developer needed Urgent', 'full-time-developer-needed-urgent', '450.00', 'Web, Mobile & Software Development', 'PHP ,MySQL Programming ,jQuery ,JavaScript ,Instagram API ', '<p>We are a company called Kustom Design Printing Ltd. Weâ€™re looking for a \r\nfull stack web developer to work with us full-time on a long-term \r\nfreelance basis, This role would involve remote working from your \r\nlocation.<br>\r\n<br>\r\nSince being founded in 2007, weâ€™ve become one of the fastest growing \r\nbespoke label and sticker printing companies in the UK. We have four \r\nbranded websites, and therefore require full-time web development \r\nexpertise to grow our large online presence.<br>\r\n<br>\r\nWe already have a full stack freelancer who works with us full-time on a\r\n remote basis, so you would work alongside this person to:<br>\r\n<br>\r\nâ€¢	Rebuild our existing websites and build other new websites<br>\r\nâ€¢	Maintain and improve our existing sites and systems<br>\r\nâ€¢	Collaborate with third party agencies where required<br>\r\nâ€¢	Collaborate with our in-house marketing/CRO consultant<br>\r\nâ€¢	Create bespoke back-end systems as well as front-end UX<br>\r\nâ€¢	Create web apps and e-commerce based systems<br>\r\n<br>\r\nAn example of one of our websites is here: https://www.discountstickerprinting.co.uk/<br>\r\n<br>\r\nAs an example of a web app, one of the core features is our order \r\ncalculator: https://www.discountstickerprinting.co.uk/quote/shape/<br>\r\n<br>\r\nWhile this current site is ASP.NET, one of your first roles would be to help re-create this site, and others, in PHP.<br>\r\nSkills required would be:<br>\r\n<br>\r\nâ€¢	PHP<br>\r\nâ€¢	MYSQL<br>\r\nâ€¢	JavaScript<br>\r\nâ€¢	JQUERY<br>\r\nâ€¢	APIs<br>\r\nâ€¢	HTML<br>\r\nâ€¢	CSS<br>\r\nâ€¢	Bootstrap<br>\r\n<br>\r\nThis would be a full-time role, mainly during UK office hours, but with a\r\n degree of flexibility providing that weekly hours are fulfilled. Youâ€™d \r\nbe able to work from any location, and all communication would be online\r\n based via Slack.<br>\r\n<br>\r\nIf you are interested in this role, please let me know and we can discuss further.</p>', 1, 1, '2019-11-28 11:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(8, 'WQjrwtmy7Q', '199513386617', '324036228471', 'Online profiling and video/track tagging you tube', 'online-profiling-and-video-track-tagging-you-tube', '50.00', 'Proofreading & Editing', 'Video editing,Video Conversion', '<p>Hi! Iâ€™m a classical violinist and  Iâ€™m looking for help to help my \r\nonline profile and to tag my name in you tube tracks so they come up \r\nwhen my make is googled plus adding a google profile and adding tracks I\r\n am playing on. </p><p>I can send you links to all the tracks on you tube and Spotify Iâ€™m playing on. <br>\r\nThanks!!</p>', 1, 1, '2019-11-28 11:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(9, 'fi47zFrW8s', '969406884108', '228145236254', 'Title Tag and META Tag work + SEO for whole website', 'title-tag-and-meta-tag-work-seo-for-whole-website', '200.00', 'SEO Keyword Optimization', 'SEO Keyword Research ,SEO Backlinking,Search Engine Optimization (SEO) ', '<p>I am looking for someone who can help me improve my current SEO and how \r\nmy page appears on google\'s search. I want to improve my SEO and \r\ntargeting to get my brand to the top of google search. Are you able to \r\nhelp with this?<br>\r\n<br>\r\nThank you.</p>', 1, 1, '2019-11-26 10:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(10, 'W6nOQzaagZ', '156958966286', '233802410288', 'Develop and support with Salesforce', 'develop-and-support-with-salesforce', '120.00', 'Website Builders', 'Salesforce.com ,Salesforce App Development ,Salesforce Apex ', '<p>We have Salesforce implemented but we would like to develop it a bit further and to have training/explanation on how to use it. <br>\r\nIs that something you can help with?<br>\r\nMany thanks.</p>', 1, 1, '2019-11-25 11:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(11, 'eUSPl8YeQh', '981686315672', '228145236254', 'Facebook and Instagram Marketing Campaign', 'facebook-and-instagram-marketing-campaign', '100.00', 'Sales & Marketing', 'Social Media Marketing,Instagram Marketing ,Facebook Marketing ', '<p>We\'re searching for an experienced Facebook marketer to work on Facebook\r\n &amp; Instagram ad campaigns for our niche product. We sell \r\npersonalised posters through our website that are aimed at memorable \r\noccasions: i.e. wedding anniversaries, child births, birthdays, etc. Due\r\n to the nature of the product (posters) we believe Facebook and \r\nInstagram ads should play a key role in our marketing strategy. <br>\r\n<br>\r\nWe\'re looking for an experienced freelancer with proven track record in \r\nsuccessfully launching and managing Facebook and Instagram ad campaigns.\r\n <br>\r\n<br>\r\nWe will provide all creative materials and will assist you during the \r\nprocess to help you understand the market and product better.<br>\r\n<br>\r\nYour tasks will consist of launching and managing Facebook campaigns \r\ninitially only in the UK and sending a weekly report with the campaign \r\nperformance.</p>', 1, 1, '2019-11-26 11:54:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(12, 'zMiBJlVhKk', '981686315672', '', 'I Need Android and IOS App', 'i-need-android-and-ios-app', '200.00', 'Mobile App Development', 'Mobile UI Design ,Mobile Programming ,Mobile App Development ', '<p>I am looking someone who will be expert me the Magento backend mobile app projects.<br>\r\nWe need to create a mobile ( IOS and Android  ) https://shopappy.com for\r\n this project. we need similar functionality that is the current \r\nwebsite.         </p>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(13, 'jzGyWMvUjX', '431974897102', '', 'Seo, link building ', 'seo-link-building', '200.00', 'SEO Keyword Optimization', 'SEO Keyword Research ,SEO Backlinking,Search Engine Optimization (SEO) ', '<p>Please write * Done * in the top of the bid <br>\r\n<br>\r\nWe would like to hire someone to help us improve the ranking of our website for 3 keywords <br>\r\n<br>\r\nThis is the url of the website: https://navnehalskÃ¦de.com/<br>\r\nThe 3 keywords are: <br>\r\n1) navnehalskÃ¦de <br>\r\n2) navne halskÃ¦de <br>\r\n3) halskÃ¦de med navn <br>\r\n<br>\r\nPlease have a look at the website before you bid and let us know nearly \r\nhow many months it will take and what the price is gonne be pr month. <br>\r\n<br>\r\nWe are gonne make 3 month seo first to se the result and take it from there <br>\r\n<br>\r\nOnly white hat seo according to the google guidelines <br>\r\n<br>\r\nLooking forward to start the project <br>\r\n<br>\r\nBest Regards        </p>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(14, 'MB72dOMuMX', '156958966286', '', 'New website built', 'new-website-built', '150.00', 'Web, Mobile & Software Development', 'Bootstrap,PHP ,Laravel Framework ,CSS3 ', '<p>I\'m looking for a freelancer who can build a website and offer support on an ongoing basis.<br>\r\n<br>\r\nThe site will have 3 levels - public access/ free subscription access / upsell (which requires multiple selections)</p>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 11:54:54'),
(15, '3QVIGXavUgxGq2', '188158648562', '', 'Diet Website', 'diet-website', '850.00', 'Graphics & Design', 'Zope,Zoomla', '<p>test</p><p>&lt;script&gt;alert(\'Nice\');&lt;/script&gt;<br></p><p><br></p>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-21 14:52:36'),
(16, 'iBVQfiepeG6qeV', '108278049269', '', 'Facebook Campaign Management', 'facebook-campaign-management', '100.00', 'Social Media Graphics', 'Facebook Marketing ', '<p>Hi, i\'m seeking Facebook campaign management and setup with some ad \r\ndesign included for a new well engineering company. Please provide a \r\nquote based on this information and let me know if further is required. I\r\n look forward to discussing. Thanks.<br></p>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2019-11-27 06:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(255) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `clientid` varchar(300) NOT NULL,
  `nid` varchar(300) NOT NULL,
  `budget` decimal(15,2) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `projectid`, `freelancerid`, `clientid`, `nid`, `budget`, `action`, `date_added`) VALUES
(1, 'bVbRUo36To', '715478889450', '296594131506', '1', '400.00', 3, '2019-11-21 11:54:54'),
(2, 'uJCOYwXrdO', '233802410288', '329616019298', '4', '100.00', 3, '2019-11-21 11:54:54'),
(3, 'PZgr7p7EeB', '753678237313', '981686315672', '6', '70.00', 2, '2019-11-21 11:54:54'),
(4, 'GhkalwKELF', '645447357569', '321267804911', '8', '150.00', 1, '2019-11-21 11:54:54'),
(5, 'eUSPl8YeQh', '199476311866', '981686315672', '10', '200.00', 3, '2019-11-21 11:54:54'),
(6, 'uJCOYwXrdO', '305378125552', '329616019298', '11', '100.00', 2, '2019-11-21 11:54:54'),
(7, 'fi47zFrW8s', '228145236254', '969406884108', '13', '150.00', 2, '2019-11-21 11:54:54'),
(8, 'WQjrwtmy7Q', '324036228471', '199513386617', '15', '60.00', 2, '2019-11-21 11:54:54'),
(9, 'W6nOQzaagZ', '434155361070', '156958966286', '17', '120.00', 3, '2019-11-21 11:54:54'),
(10, 'Wm0W6YvzLr', '715478889450', '431974897102', '30', '70.00', 2, '2019-11-21 11:54:54'),
(11, 'eUSPl8YeQh', '228145236254', '981686315672', '34', '100.00', 2, '2019-11-21 11:54:54'),
(12, 'e2qj4OYYIs', '199476311866', '188158648562', '38', '100.00', 2, '2019-11-21 11:54:54'),
(13, 'bVbRUo36To', '434155361070', '296594131506', '67', '450.00', 2, '2019-11-21 11:54:54'),
(14, 'W6nOQzaagZ', '233802410288', '156958966286', '91', '100.00', 2, '2019-11-21 11:54:54'),
(19, '44ndkrA0am', '233802410288', '108278049269', '103', '100.00', 1, '2019-11-25 20:23:39'),
(20, '44ndkrA0am', '753678237313', '108278049269', '110', '100.66', 1, '2019-11-27 06:24:06'),
(23, 'zMiBJlVhKk', '645447357569', '981686315672', '126', '60.00', 1, '2019-11-28 20:33:02'),
(24, 'zMiBJlVhKk', '715478889450', '981686315672', '144', '70.00', 1, '2019-12-01 15:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(255) NOT NULL,
  `projectid` varchar(300) NOT NULL,
  `user_sending` varchar(300) NOT NULL,
  `user_receiving` varchar(300) NOT NULL,
  `nid` varchar(300) NOT NULL,
  `rate` int(250) NOT NULL,
  `description` mediumtext NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `projectid`, `user_sending`, `user_receiving`, `nid`, `rate`, `description`, `read_status`, `date_added`) VALUES
(1, 'uJCOYwXrdO', '305378125552', '329616019298', '58', 5, 'He is a phenomenon Client to work with.', 1, '2019-11-21 11:54:54'),
(2, 'uJCOYwXrdO', '329616019298', '305378125552', '59', 5, 'Great Freelancer to work with. ', 0, '2019-11-21 11:54:54'),
(3, 'eUSPl8YeQh', '981686315672', '228145236254', '61', 4, 'The Freelancer tried to her ability, but I was expecting more results from the Facebook and Instagram Campaign.', 1, '2019-11-21 11:54:54'),
(4, 'eUSPl8YeQh', '228145236254', '981686315672', '62', 5, 'Great Client to work with, I will work hard to improve on the Campaigns next time.', 1, '2019-11-21 11:54:54'),
(5, 'Wm0W6YvzLr', '715478889450', '431974897102', '63', 5, 'The work description was great. I had fun doing the work.', 1, '2019-11-21 11:54:54'),
(6, 'Wm0W6YvzLr', '431974897102', '715478889450', '64', 5, 'He delivered the logo as I wanted.', 0, '2019-11-21 11:54:54'),
(7, 'bVbRUo36To', '296594131506', '434155361070', '76', 5, 'Just a Perfect Developer.', 0, '2019-11-21 11:54:54'),
(8, 'bVbRUo36To', '434155361070', '296594131506', '77', 5, 'Great Client to work with.', 0, '2019-11-21 11:54:54'),
(9, 'WQjrwtmy7Q', '199513386617', '324036228471', '81', 3, 'The freelancer was not co-operative.', 1, '2019-11-21 11:54:54'),
(10, 'WQjrwtmy7Q', '324036228471', '199513386617', '82', 3, 'The Client was not co-operative also.', 1, '2019-11-21 11:54:54'),
(11, 'fi47zFrW8s', '228145236254', '969406884108', '89', 4, 'Great Client to work with.', 1, '2019-11-21 11:54:54'),
(12, 'fi47zFrW8s', '969406884108', '228145236254', '90', 2, 'The Freelancer did not perform the work as I wanted.', 0, '2019-11-21 11:54:54'),
(13, 'W6nOQzaagZ', '156958966286', '233802410288', '95', 4, 'Great person to work with.', 1, '2019-11-21 11:54:54'),
(15, 'PZgr7p7EeB', '981686315672', '753678237313', '137', 3, 'Test', 0, '2019-11-29 21:25:50'),
(17, 'W6nOQzaagZ', '233802410288', '156958966286', '139', 4, 'Nice', 0, '2019-11-30 06:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(255) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `number` varchar(300) NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `userid`, `number`, `read_status`, `date_added`) VALUES
(1, '233802410288', '518-935-0966', 1, '2019-11-21 11:54:54'),
(2, '645447357569', '518-340-1163', 1, '2019-11-21 11:54:54'),
(3, '324036228471', '518-340-1163', 1, '2019-11-21 11:54:54'),
(4, '228145236254', '518-935-0966', 1, '2019-11-21 11:54:54'),
(5, '296482705384', '518-935-0966', 1, '2019-11-21 11:54:54'),
(6, '329616019298', '518-340-1163', 1, '2019-11-21 11:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `language` varchar(50) CHARACTER SET utf8 NOT NULL,
  `theme` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sitename` varchar(300) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 NOT NULL,
  `analytics` varchar(200) CHARACTER SET utf8 NOT NULL,
  `timezone` varchar(300) CHARACTER SET utf8 NOT NULL,
  `logo` varchar(300) CHARACTER SET utf8 NOT NULL,
  `favicon` varchar(300) CHARACTER SET utf8 NOT NULL,
  `contact_email` varchar(300) CHARACTER SET utf8 NOT NULL,
  `contact_phone` varchar(300) CHARACTER SET utf8 NOT NULL,
  `contact_location` varchar(300) CHARACTER SET utf8 NOT NULL,
  `facebook` varchar(200) CHARACTER SET utf8 NOT NULL,
  `instagram` varchar(200) CHARACTER SET utf8 NOT NULL,
  `twitter` varchar(200) CHARACTER SET utf8 NOT NULL,
  `smtp_host` varchar(300) CHARACTER SET utf8 NOT NULL,
  `smtp_username` varchar(300) CHARACTER SET utf8 NOT NULL,
  `smtp_password` varchar(300) CHARACTER SET utf8 NOT NULL,
  `smtp_encryption` varchar(300) CHARACTER SET utf8 NOT NULL,
  `smtp_port` varchar(300) CHARACTER SET utf8 NOT NULL,
  `currency` int(50) NOT NULL,
  `paypal_active` tinyint(4) NOT NULL,
  `sandbox` tinyint(4) NOT NULL,
  `paypal_email` varchar(300) CHARACTER SET utf8 NOT NULL,
  `stripe_active` tinyint(4) NOT NULL,
  `stripe_secret_key` varchar(300) CHARACTER SET utf8 NOT NULL,
  `stripe_public_key` varchar(300) CHARACTER SET utf8 NOT NULL,
  `razorpay_active` tinyint(4) NOT NULL,
  `razorpay_key_id` varchar(300) CHARACTER SET utf8 NOT NULL,
  `bank_active` tinyint(4) NOT NULL,
  `bank_description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `how_client` longtext CHARACTER SET utf8 NOT NULL,
  `how_freelancer` longtext CHARACTER SET utf8 NOT NULL,
  `how_client_image` varchar(200) CHARACTER SET utf8 NOT NULL,
  `how_freelancer_image` varchar(200) CHARACTER SET utf8 NOT NULL,
  `refund_policy` longtext CHARACTER SET utf8 NOT NULL,
  `terms` longtext CHARACTER SET utf8 NOT NULL,
  `privacy_policy` longtext CHARACTER SET utf8 NOT NULL,
  `revenue` int(200) NOT NULL,
  `transaction_fee` decimal(15,2) NOT NULL,
  `pay_freelancers` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `withdrawal_limit` decimal(15,2) NOT NULL,
  `paystack_active` tinyint(4) NOT NULL,
  `paystack_key` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `about_title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `about_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `about_company` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `about_image` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language`, `theme`, `sitename`, `title`, `description`, `keywords`, `analytics`, `timezone`, `logo`, `favicon`, `contact_email`, `contact_phone`, `contact_location`, `facebook`, `instagram`, `twitter`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_encryption`, `smtp_port`, `currency`, `paypal_active`, `sandbox`, `paypal_email`, `stripe_active`, `stripe_secret_key`, `stripe_public_key`, `razorpay_active`, `razorpay_key_id`, `bank_active`, `bank_description`, `how_client`, `how_freelancer`, `how_client_image`, `how_freelancer_image`, `refund_policy`, `terms`, `privacy_policy`, `revenue`, `transaction_fee`, `pay_freelancers`, `withdrawal_limit`, `paystack_active`, `paystack_key`, `about_title`, `about_description`, `about_company`, `about_image`) VALUES
(1, 'english', 'boxplace', 'Wave', 'Powerful Freelance Marketplace System with ability to change the Users (Freelancers & Clients)', 'Powerful Freelance Marketplace System with ability to change the Users (Freelancers & Clients)', 'Powerful Freelance Marketplace System with ability to change the Users (Freelancers & Clients)', 'UA-79656468-7', 'Africa/Nairobi', 'ud8OZIUbHCiO2S.png', 'OLvX1TzjWpHTN8.png', 'themashabrand@gmail.com', '+4433556677', 'United States', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', 'mail.host.com', 'username', 'password', 'tls', '465', 1, 2, 1, 'themashabrandbusiness@gmail.com', 2, 'sk_test_IMq9XsThe0AEDUNEdYwwZdxS', 'pk_test_0sPQBhDwhX7x4kn3azVd0Jnn', 2, 'rzp_test_dfBtLvDuaRMdkR', 2, '<p>Payment via account number:<br>Card Number: 4221 2135 001 1324<br>Card Name: Wave<br>Bank Name: Kenya Commercial Bank<br>Swift Code: ASCBVNVX<br></p>', '<p><b>Posting Projects</b><br></p><p>After registration, you will be \r\nable to login in your account where you can post a project.</p><p><b>Hiring Freelancers<br></b></p><p>After\r\n posting your project, you will receive proposals from interested \r\nfreelancers. You can look at their profiles and even send them messages \r\nfor more discussions.</p><p>After you are satisfied you have found the right Freelancer, go a head and hire him/her.</p><p><b>Adding Funds<br></b></p><p>You\r\n will not be able to hire a Freelancer if your Funds Account is $0.00 on\r\n your dashboard. </p><p>So what you do is go to the Funds section and add some \r\nmoney through either PayPal, Stripe, PayStack or Razorpay.</p><p><b>Escrow<br></b></p><p>Escrow\r\n is where the money will be held until the project is complete. </p><p>When you\r\n hire a Freelancer, the money will not be sent to the Freelancer\'s \r\naccount, instead it will be held by the Wave Company. </p><p><b>Disputes<br></b></p><p>If\r\n at any time you have a problem with the Freelancer, you can start a \r\nDispute in which Wave Company will have a dispute conversations between \r\nyou and the Freelancer.</p><p>The Wave Company will decide if the the money from Escrow should be Returned to the Client or Awarded to the Freelancer.<br></p><p> </p>', '<p><b>Looking for Projects</b><br></p><p>You can look for projects in \r\nwhich you seem fit with your skills. Then post a proposal where you will\r\n get a response from the Client.<br></p><p><b>Invited to Projects<br></b></p><p>At times a Client may invite you to do a project for him/her, you will get a notification concerning the Invite.<br></p><p><b>Building your Portfolio<br></b></p><p>Clients\r\n before they hire anyone, they always check their Portfolio, Work \r\nExperience, Education Experience and even About yourself. So remember to\r\n build your Portfolio.<br></p><p><b>Escrow<br></b></p><p>Escrow\r\n is where the money will be held until the project is complete. </p><p>When you get hired , the money will not be sent to the your \r\naccount, instead it will be held by the Wave Company. </p><p><b>Disputes<br></b></p><p>If\r\n at any time you have a problem with the Client, you can start a \r\nDispute in which Wave Company will have a dispute conversations between \r\nyou and the Client.</p><p>The Wave Company will decide if the the money from Escrow should be Returned to the Client or Awarded to the Freelancer.<br></p>', 'A1xp2l2j0JdqgI.jpg', 'aTrW7aAurd9xBY.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Massa tempor\r\n nec feugiat nisl pretium. Mauris sit amet massa vitae tortor \r\ncondimentum lacinia. Amet commodo nulla facilisi nullam vehicula. \r\nImperdiet sed euismod nisi porta lorem mollis aliquam. </p><p>Tempor nec \r\nfeugiat nisl pretium fusce id velit ut. Sed lectus vestibulum mattis \r\nullamcorper. Id venenatis a condimentum vitae sapien pellentesque \r\nhabitant. Laoreet sit amet cursus sit amet dictum sit amet justo. \r\nTincidunt arcu non sodales neque sodales ut. Tincidunt nunc pulvinar \r\nsapien et ligula ullamcorper malesuada. Sit amet nulla facilisi morbi \r\ntempus iaculis urna id volutpat. Enim diam vulputate ut pharetra.</p><p>\r\nAt erat pellentesque adipiscing commodo elit at imperdiet dui \r\naccumsan. Netus et malesuada fames ac turpis egestas integer eget \r\naliquet. Mi proin sed libero enim sed faucibus turpis in. Mauris a diam \r\nmaecenas sed enim ut sem. Condimentum id venenatis a condimentum vitae \r\nsapien pellentesque habitant morbi.<br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Massa tempor\r\n nec feugiat nisl pretium. Mauris sit amet massa vitae tortor \r\ncondimentum lacinia. Amet commodo nulla facilisi nullam vehicula. \r\nImperdiet sed euismod nisi porta lorem mollis aliquam. </p><p>Tempor nec \r\nfeugiat nisl pretium fusce id velit ut. Sed lectus vestibulum mattis \r\nullamcorper. Id venenatis a condimentum vitae sapien pellentesque \r\nhabitant. Laoreet sit amet cursus sit amet dictum sit amet justo. \r\nTincidunt arcu non sodales neque sodales ut. Tincidunt nunc pulvinar \r\nsapien et ligula ullamcorper malesuada. Sit amet nulla facilisi morbi \r\ntempus iaculis urna id volutpat. Enim diam vulputate ut pharetra.</p><p>\r\nAt erat pellentesque adipiscing commodo elit at imperdiet dui \r\naccumsan. Netus et malesuada fames ac turpis egestas integer eget \r\naliquet. Mi proin sed libero enim sed faucibus turpis in. Mauris a diam \r\nmaecenas sed enim ut sem. Condimentum id venenatis a condimentum vitae \r\nsapien pellentesque habitant morbi.<br></p>', '<br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Massa tempor\r\n nec feugiat nisl pretium. Mauris sit amet massa vitae tortor \r\ncondimentum lacinia. Amet commodo nulla facilisi nullam vehicula. \r\nImperdiet sed euismod nisi porta lorem mollis aliquam. </p><p>Tempor nec \r\nfeugiat nisl pretium fusce id velit ut. Sed lectus vestibulum mattis \r\nullamcorper. Id venenatis a condimentum vitae sapien pellentesque \r\nhabitant. Laoreet sit amet cursus sit amet dictum sit amet justo. \r\nTincidunt arcu non sodales neque sodales ut. Tincidunt nunc pulvinar \r\nsapien et ligula ullamcorper malesuada. Sit amet nulla facilisi morbi \r\ntempus iaculis urna id volutpat. Enim diam vulputate ut pharetra.</p><p>\r\nAt erat pellentesque adipiscing commodo elit at imperdiet dui \r\naccumsan. Netus et malesuada fames ac turpis egestas integer eget \r\naliquet. Mi proin sed libero enim sed faucibus turpis in. Mauris a diam \r\nmaecenas sed enim ut sem. Condimentum id venenatis a condimentum vitae \r\nsapien pellentesque habitant morbi.<br></p>', 30, '2.50', '4', '20.00', 2, 'pk_test_f70f1e66c2dfd5385acf7ef2ef30361e6427ebd5', 'Who We Are', '<div class=\"o-flex-container__item\">\r\n                        <p>\r\n                            Wave is an expression of our beliefs that we hold close to our hearts. It\'s one thing to\r\n                            simply provide a platform where Employers and Freelancers can work\r\n                            together. It\'s another to do it in our own unique way.\r\n                        </p>\r\n                        <p>\r\n                            We strive to be the premier platform where professionals go to connect, collaborate, and get\r\n                            work done. We believe that the best work is done in a flexible and\r\n                            secure environment. With transparency comes trust, and with a community that\'s built on\r\n                            meritocracy, people are eager to set aside differences in geography,\r\n                            politics and religion to share and profit from economic opportunities.\r\n                        </p>\r\n\r\n                        \r\n                    </div>', 'Wave Inc', '20.04.09.20.35-1586453723.0544-4510086.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(255) NOT NULL,
  `name` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Zurb Foundation'),
(2, 'Zope'),
(3, 'Zoomla'),
(4, 'Zoho CRM'),
(5, 'Zoho Creator'),
(6, 'ZK'),
(7, 'Zimbra Development'),
(8, 'Zimbra Administration'),
(9, 'Zimbra Marketing'),
(10, 'Zennolab ZennoPoster'),
(11, 'Zendesk API Development '),
(12, 'Zendesk'),
(13, 'Zend Studio'),
(14, 'Zend Framework'),
(15, 'Zen Cart'),
(16, 'Zaxwerks'),
(17, 'zapier'),
(18, 'Zabbix'),
(19, 'YUI Library '),
(20, 'YouTube Marketing'),
(21, 'YouTube Development '),
(22, 'Yola '),
(23, 'Yoga'),
(24, 'Yii'),
(25, 'Yandex MatrixNet'),
(26, 'Yandex API '),
(27, 'YAML'),
(28, 'Yahoo! Store'),
(29, 'Yahoo! Search Marketing'),
(30, 'Yahoo! Query Language'),
(31, 'Yahoo! Messenger '),
(32, 'Yahoo! Merchant Solutions '),
(33, 'Yahoo Developer Skills'),
(34, 'Yahoo! Advertising Solutions'),
(35, 'XUL'),
(36, 'XSLT'),
(37, 'XSL'),
(38, 'XSD'),
(39, 'XRumer'),
(40, 'XQuery '),
(41, 'XPath'),
(42, 'XOOPS'),
(43, 'XMPP'),
(44, 'xml web services'),
(45, 'XML-RPC'),
(46, 'XML'),
(47, 'Xlinesoft PHPRunner'),
(48, 'Xilinx'),
(49, 'XHTML'),
(50, 'Xero'),
(51, 'XenForo'),
(52, 'Xen Hypervisor'),
(53, 'Xen Cloud Platform'),
(54, 'SAP Xcelsius'),
(55, 'Xbox'),
(56, 'Xara Xtreme'),
(57, 'XAMPP'),
(58, 'XAML'),
(59, 'Xamarin'),
(60, 'Xactimate'),
(61, 'X86 assembly language'),
(62, 'X-Cart'),
(63, 'WxWidgets'),
(64, 'Wu'),
(65, 'Slang-style Writing'),
(66, 'Writing'),
(67, 'Wrap Advertising'),
(68, 'Windows Presentation Foundation (WPF) '),
(69, 'WordPress e-Commerce'),
(70, 'Wowza Media Server'),
(71, 'Worldspan'),
(72, 'Worldbuilding'),
(73, 'Workshop Facilities'),
(74, 'Workforce Management'),
(75, 'Worketc'),
(76, 'Wordpress Plugin'),
(77, 'WordPress'),
(78, 'Wordperfect'),
(79, 'Wordfast'),
(80, 'Word processing'),
(81, 'Word-of-Mouth'),
(82, 'Woocommerce'),
(83, 'WML Script '),
(84, 'WiX'),
(85, 'Wireless Security'),
(86, 'Wireless Network Implementation'),
(87, 'Wireframing'),
(88, 'Winsock'),
(89, 'WinRunner'),
(90, 'Windows XP Administration'),
(91, 'Microsoft Windows Workflow Foundation'),
(92, 'Windows Vista'),
(93, 'Microsoft Windows Template Library'),
(94, 'Microsoft Windows Phone 7 App Development '),
(95, 'Windows Phone'),
(96, 'Windows NT Administration '),
(97, 'Microsoft Windows Movie Maker'),
(98, 'Windows Mobile'),
(99, 'microsoft windows media connect'),
(100, 'Windows Forms Development'),
(101, 'Microsoft Windows Azure'),
(102, 'Windows App Development'),
(103, 'Windows Administration'),
(104, 'Windows 8 App Development '),
(105, 'Windows 8 Administration '),
(106, 'Windows 7 Administration'),
(107, 'WinDev Mobile'),
(108, 'WinDev '),
(109, 'Wind Power Consulting'),
(110, 'WinAutomation'),
(111, 'Win32 App Development'),
(112, 'WiMAX'),
(113, 'Wilcom EmbroideryStudio'),
(114, 'Wilcom Embroidery Digitization'),
(115, 'Wikipedia'),
(116, 'Wiki'),
(117, 'Wicket'),
(118, 'Wi-Fi'),
(119, 'WHMCS Development'),
(120, 'WebHost Manager (WHM) '),
(121, 'Whiteboard Animation'),
(122, 'White Paper Writing'),
(123, 'Westlaw'),
(124, 'Welsh'),
(125, 'Welding'),
(126, 'Weka'),
(127, 'Weebly'),
(128, 'Website Wireframing'),
(129, 'Website Prototyping'),
(130, 'Website Development'),
(131, 'Website Baker'),
(132, 'Website Analytics'),
(133, 'WebRTC'),
(134, 'Oracle WebLogic'),
(135, 'Webisode Production'),
(136, 'Webisode Presentation'),
(137, 'WebGL'),
(138, 'Webflow'),
(139, 'webERP'),
(140, 'webeeh'),
(141, 'WebApp Pentesting'),
(142, 'Web Testing'),
(143, 'Web Services Development'),
(144, 'Web Services'),
(145, 'Web scraping'),
(146, 'Web Programming'),
(147, 'Palm webOS Application Development'),
(148, 'Web Hosting'),
(149, 'Web Host Manager'),
(150, 'Web design'),
(151, 'Web Crawler'),
(152, 'Content Management'),
(153, 'Web Analytics'),
(154, 'Windows Communication Foundation (WCF)'),
(155, 'Wave Accounting'),
(156, 'Watercolor Painting'),
(157, 'Wardrobe Styling'),
(158, 'WAN Optimization'),
(159, 'WAN'),
(160, 'WAMP'),
(161, 'W3C Widget API'),
(162, 'VxWorks'),
(163, 'Vulnerability assessment'),
(164, 'Vugen Scripting'),
(165, 'VTK'),
(166, 'vtiger Development'),
(167, 'vtiger Adminstration'),
(168, 'VSS'),
(169, 'Virtual storage access method (VSAM)'),
(170, 'V-Ray'),
(171, 'VPN'),
(172, 'volusion'),
(173, 'Volleyball'),
(174, 'Voldemort'),
(175, 'VOIP Software'),
(176, 'VOIP Administration'),
(177, 'VoiceXML'),
(178, 'Voice Talent'),
(179, 'Voice Over '),
(180, 'VMware ESX Server'),
(181, 'VMware Administration'),
(182, 'VLSI'),
(183, 'VLookup Tables'),
(184, 'VKontakte API'),
(185, 'Vizrt'),
(186, 'Visualization'),
(187, 'visualforce'),
(188, 'Visual Merchandising'),
(189, 'Visual FoxPro'),
(190, 'Visual Dataflex'),
(191, 'Visual Basic'),
(192, 'Visual Arts'),
(193, 'virus removal'),
(194, 'Virtuoso'),
(195, 'VirtueMart'),
(196, 'Virtualization'),
(197, 'Virtual Private Server (VPS)'),
(198, 'Virtual Machine'),
(199, 'Virtual Currency'),
(200, 'Virtual Assistant'),
(201, 'Viral marketing'),
(202, 'Violin Performance'),
(203, 'Violin Composition'),
(204, 'Vim'),
(205, 'Vietnamese'),
(206, 'VIDVOX VDMX'),
(207, 'Videography'),
(208, 'Video Upload'),
(209, 'Video Streaming'),
(210, 'Video Sales Letter'),
(211, 'Video Ripping'),
(212, 'Video Publishing'),
(213, 'Video production'),
(214, 'Video Post Editing'),
(215, 'Video editing'),
(216, 'Video Conversion'),
(217, 'vicidial'),
(218, 'VHDL'),
(219, 'VFX Design'),
(220, 'VFX Animation'),
(221, 'Vertica'),
(222, 'Version Control'),
(223, 'Verilog / VHDL'),
(224, 'Venture Capital Consulting'),
(225, 'Vendor Management Systems'),
(226, 'Velocity Template Engine'),
(227, 'Veeam'),
(228, 'VectorWorks'),
(229, 'vCita'),
(230, 'VBulletin'),
(231, 'vbseo'),
(232, 'VBScript'),
(233, 'VBA'),
(234, 'VB.NET'),
(235, 'Varnish Cache'),
(236, 'Valgrind'),
(237, 'Vagrant'),
(238, 'Vaadin Framework'),
(239, 'UV Mapping'),
(240, 'Users Guide Writing'),
(241, 'User Experience Design'),
(242, 'User acceptance testing'),
(243, 'USB Electronics'),
(244, 'Usability testing'),
(245, 'Urdu'),
(246, 'Urban Design'),
(247, 'UnrealScript'),
(248, 'Unreal Engine'),
(249, 'Unix System Administration'),
(250, 'Unix shell'),
(251, 'Unix'),
(252, 'Unity'),
(253, 'Unit Testing'),
(254, 'Unify Corporation'),
(255, 'Unify SQLBase'),
(256, 'Unify'),
(257, 'Unified Threat Management'),
(258, 'Underwriting'),
(259, 'unbounce'),
(260, 'UML'),
(261, 'Umbraco'),
(262, 'Ulead VideoStudio'),
(263, 'Ulead COOL 3D'),
(264, 'Ukrainian'),
(265, 'User interface design'),
(266, 'Ubuntu'),
(267, 'Ubercart'),
(268, 'U.S. Culture'),
(269, 'Typography'),
(270, 'TYPO3'),
(271, 'Typing'),
(272, 'Typesetting'),
(273, 'TypePad'),
(274, 'Twitter Marketing'),
(275, 'Bootstrap'),
(276, 'twitter api'),
(277, 'Twilio API'),
(278, 'Twig'),
(279, 'TV Broadcasting'),
(280, 'Turkish'),
(281, 'Turbo C'),
(282, 'Tumblr'),
(283, 'TSR'),
(284, 'TSM Administration'),
(285, 'Trusts Estates and Wills'),
(286, 'Tropo'),
(287, 'Trixbox'),
(288, 'Triakis VSIL'),
(289, 'Travel Writing'),
(290, 'Travel Planning'),
(291, 'Travel Agent'),
(292, 'Translation Yiddish English'),
(293, 'Translation Welsh English'),
(294, 'Translation Vietnamese English'),
(295, 'Translation Urdu English'),
(296, 'Translation Ukrainian English'),
(297, 'Translation Turkish English'),
(298, 'Translation Thai English'),
(299, 'Translation Telugu English'),
(300, 'Translation Tamil English'),
(301, 'Translation Tagalog English '),
(302, 'Translation Swedish English'),
(303, 'Translation Swahili English'),
(304, 'Translation Spanish French'),
(305, 'Translation Spanish English'),
(306, 'Translation Slovenian English'),
(307, 'Translation Slovak English'),
(308, 'Translation Serbian English'),
(309, 'Translation Russian English'),
(310, 'Translation Romanian English'),
(311, 'Translation Portuguese English'),
(312, 'Translation Polish German'),
(313, 'Translation Polish English'),
(314, 'Translation Persian English'),
(315, 'Translation Norwegian English'),
(316, 'Translation Mandarin English'),
(317, 'Translation Maltese English'),
(318, 'Translation Malay English'),
(319, 'Translation Macedonian English'),
(320, 'Translation Lithuanian English'),
(321, 'Translation Latvian English'),
(322, 'Translation Latin English'),
(323, 'Translation Korean English'),
(324, 'Translation Kannada English'),
(325, 'Translation Japanese English'),
(326, 'Translation Italian English'),
(327, 'Translation Irish English'),
(328, 'Translation Indonesian English'),
(329, 'Translation Icelandic English'),
(330, 'Translation Hungarian English'),
(331, 'Translation Hindi English'),
(332, 'Translation Hebrew English'),
(333, 'Translation Haitian Creole English'),
(334, 'Translation Gujarati English'),
(335, 'Translation Greek English'),
(336, 'Translation German Polish'),
(337, 'Translation German French'),
(338, 'Translation German English'),
(339, 'Translation Georgian English'),
(340, 'Translation Galician English'),
(341, 'Translation French Spanish'),
(342, 'Translation French German'),
(343, 'Translation French English'),
(344, 'Translation Finnish English'),
(345, 'Translation Filipino English'),
(346, 'Translation Estonian English'),
(347, 'Translation English Yiddish'),
(348, 'Translation English Welsh'),
(349, 'Translation English Vietnamese'),
(350, 'Translation English Urdu'),
(351, 'Translation English Ukrainian'),
(352, 'Translation English Turkish'),
(353, 'Translation English Thai'),
(354, 'Translation English Telugu'),
(355, 'Translation English Tamil'),
(356, 'Translation English Tagalog'),
(357, 'Translation English Swedish'),
(358, 'Translation English Swahili'),
(359, 'Translation English Spanish'),
(360, 'Translation English Slovenian'),
(361, 'Translation English Slovak'),
(362, 'Translation English Serbian'),
(363, 'Translation English Russian'),
(364, 'Translation English Romanian'),
(365, 'Translation English Portuguese'),
(366, 'Translation English Polish'),
(367, 'Translation English Persian'),
(368, 'Translation English Norwegian'),
(369, 'Translation English Mandarin'),
(370, 'Translation English Maltese'),
(371, 'Translation English Malay'),
(372, 'Translation English Macedonian'),
(373, 'Translation English Lithuanian'),
(374, 'Translation English Latvian'),
(375, 'Translation English Latin'),
(376, 'Translation English Kyrgyz'),
(377, 'Translation English Korean'),
(378, 'Translation English Kannada'),
(379, 'Translation English Japanese'),
(380, 'Translation English Italian'),
(381, 'Translation English Irish'),
(382, 'Translation English Indonesian'),
(383, 'Translation English Icelandic'),
(384, 'Translation English Hungarian'),
(385, 'Translation English Hindi'),
(386, 'Translation English Hebrew'),
(387, 'Translation English Haitian Creole'),
(388, 'Translation English Gujarati'),
(389, 'Translation English Greek'),
(390, 'Translation English German'),
(391, 'Translation English Georgian'),
(392, 'Translation English Galician'),
(393, 'Translation English French'),
(394, 'Translation English Finnish'),
(395, 'Translation English Filipino'),
(396, 'Translation English Estonian'),
(397, 'Translation English Dutch'),
(398, 'Translation English Danish'),
(399, 'Translation English Czech'),
(400, 'Translation English Croatian'),
(401, 'Translation English Chinese'),
(402, 'Translation English Catalan'),
(403, 'Translation English Bulgarian'),
(404, 'Translation English Brazilian Portuguese'),
(405, 'Translation English Bengali'),
(406, 'Translation English Belariusan'),
(407, 'Translation English Armenian'),
(408, 'Translation English Arabic'),
(409, 'Translation English Albanian'),
(410, 'Translation English Afrikaans'),
(411, 'Translation Dutch English'),
(412, 'Translation Danish English'),
(413, 'Translation Czech English'),
(414, 'Translation Croatian English'),
(415, 'Translation Chinese English'),
(416, 'Translation Catalan English'),
(417, 'Translation Bulgarian English'),
(418, 'Translation Brazilian Portuguese English'),
(419, 'Translation Bengali English'),
(420, 'Translation Belarusian English'),
(421, 'Translation Armenian English'),
(422, 'Translation Arabic English'),
(423, 'Translation Albanian English'),
(424, 'Translation Afrikaans English'),
(425, 'Translation'),
(426, 'Transcription'),
(427, 'Transcreation'),
(428, 'Transaction Processing'),
(429, 'traffic geyser'),
(430, 'Trademark Consulting'),
(431, 'trade2bharat'),
(432, 'Trade Show Exhibition Design'),
(433, 'Trade marketing'),
(434, 'Trade Law'),
(435, 'Trac'),
(436, 'TQM'),
(437, 'Tourism'),
(438, 'Tortoise SVN'),
(439, 'Torque Game Engine'),
(440, 'Tornado'),
(441, 'Toon Boom Studio'),
(442, 'Toon Boom Harmony'),
(443, 'Toktumi'),
(444, 'Tk'),
(445, 'Tizen'),
(446, 'Time Management'),
(447, 'TIBCO ActiveMatrix BusinessWorks'),
(448, 'Theology'),
(449, 'The Pixel Farm PFTrack'),
(450, 'The Foundry NUKE'),
(451, 'Thai'),
(452, 'Team Foundation Server'),
(453, 'Texture Artist'),
(454, 'Textpattern '),
(455, 'Textile Engineering'),
(456, 'Testopia'),
(457, 'Testing Framework'),
(458, 'TestLodge'),
(459, 'TestLink'),
(460, 'TestComplete'),
(461, 'Test Driven Development'),
(462, 'Test Case Design'),
(463, 'Test Automation'),
(464, 'Tesseract'),
(465, 'Teradata'),
(466, 'Templates'),
(467, 'Telugu'),
(468, 'Telerik'),
(469, 'Telephone Handling'),
(470, 'Telemarketing'),
(471, 'Telecommunications Engineering'),
(472, 'Tekla Structures'),
(473, 'Technical writing'),
(474, 'Technical Translation '),
(475, 'Technical Support '),
(476, 'Technical Recruiter '),
(477, 'Technical Editing'),
(478, 'Technical Documentation '),
(479, 'technical analysis'),
(480, 'TeamViewer'),
(481, 'Tealeaf cxImpact'),
(482, 'Teaching Physics'),
(483, 'Teaching Mathematics'),
(484, 'Teaching English'),
(485, 'Teaching Algebra'),
(486, 'TCP/IP'),
(487, 'Tcl/Tk'),
(488, 'Taxonomy'),
(489, 'Tax preparation'),
(490, 'Tax Law'),
(491, 'Tastypie'),
(492, 'TAPI'),
(493, 'Tapestry'),
(494, 'Tamil'),
(495, 'Tally .ERP'),
(496, 'Tally Shoper'),
(497, 'Talend Open Studio'),
(498, 'Tagalog'),
(499, 'Tableau Software'),
(500, 'Transact-SQL'),
(501, 'T-Shirt Design'),
(502, 'Systems Development'),
(503, 'System Programming'),
(504, 'System Automation'),
(505, 'System Analysis'),
(506, 'System Administration'),
(507, 'Synthetic Aperture Color Finesse'),
(508, 'Synopsis Writing'),
(509, 'Syncsort'),
(510, 'Symfony'),
(511, 'Symbian Development'),
(512, 'Sybase Programming'),
(513, 'SWT'),
(514, 'SWiSH Max'),
(515, 'Swing'),
(516, 'Swift'),
(517, 'Swedish'),
(518, 'Software Configuration Management '),
(519, 'Apache Subversion (SVN) '),
(520, 'Sustainable Energy '),
(521, 'SurveyMonkey'),
(522, 'Survey Design '),
(523, 'Supply chain management '),
(524, 'supervisory skills'),
(525, 'Supervised learning '),
(526, 'SunGard '),
(527, 'SugarCRM Development '),
(528, 'Subversion'),
(529, 'Subtitling '),
(530, 'Style Guide Development '),
(531, 'Structured Cabling'),
(532, 'Structural Engineering '),
(533, 'Structural Analysis '),
(534, 'StrongMail '),
(535, 'Stripe '),
(536, 'Stress Management '),
(537, 'Stream Processing '),
(538, 'Strategic planning '),
(539, 'Stratasys '),
(540, 'Storyboarding '),
(541, 'Stored Procedure Development '),
(542, 'Stock Management '),
(543, 'Standard Template Library (STL) '),
(544, 'Still Life Painting '),
(545, 'Sticker Design '),
(546, 'Stereoscopy '),
(547, 'stenography '),
(548, 'Steinberg WaveLab '),
(549, 'Steinberg Cubase '),
(550, 'Statpoint Statgraphics '),
(551, 'Statistics '),
(552, 'Statistical Computing '),
(553, 'Stationery Design '),
(554, 'Stata '),
(555, 'Startup Consulting '),
(556, 'Stakeholder Management '),
(557, 'STAAD '),
(558, 'SSL '),
(559, 'SQL Server Integration Services (SSIS) '),
(560, 'SSI '),
(561, 'SSH '),
(562, 'Squid '),
(563, 'SquareSpace '),
(564, 'SQR '),
(565, 'Sqoop '),
(566, 'SQLite Programming '),
(567, 'SQLite Administration '),
(568, 'SQL Programming '),
(569, 'SQL CLR '),
(570, 'SQL Azure '),
(571, 'SQL'),
(572, 'SQA'),
(573, 'Spring Security '),
(574, 'Spring Framework '),
(575, 'Spree '),
(576, 'Spreadsheets '),
(577, 'Sports Writing '),
(578, 'Special Purpose Machines Design '),
(579, 'Splunk '),
(580, 'Spiral Graphics Genetica '),
(581, 'Spine JS'),
(582, 'Sphinx '),
(583, 'Speech Writing '),
(584, 'Sparx Systems Enterprise Architect '),
(585, 'Spanish '),
(586, 'SpamAssassin '),
(587, 'Spacewalk '),
(588, 'Soundtrack Pro'),
(589, 'Sound Forge '),
(590, 'Sound Effects'),
(591, 'sound editing'),
(592, 'Sound Design'),
(593, 'Sony Vegas'),
(594, 'ACID Pro'),
(595, 'SolidWorks '),
(596, 'Solid Edge '),
(597, 'Solaris Administration '),
(598, 'Software Testing '),
(599, 'Software QA Testing '),
(600, 'Software Licensing '),
(601, 'Software Documentation '),
(602, 'Software Defined Networking (SDN) '),
(603, 'Software Debugging '),
(604, 'Socket Programming'),
(605, 'SocialEngine'),
(606, 'Social Networking Development '),
(607, 'Social Network Administration '),
(608, 'Social Media Optimization (SMO) '),
(609, 'Social Media Marketing'),
(610, 'Social Media Management '),
(611, 'Social bookmarking '),
(612, 'soapUI'),
(613, 'SOAP'),
(614, 'Snort '),
(615, 'SNMP'),
(616, 'SnagIt '),
(617, 'SMTP '),
(618, 'SMS Gateway '),
(619, 'SMS '),
(620, 'SMPP '),
(621, 'SMO'),
(622, 'Smarty'),
(623, 'SmartFoxServer'),
(624, 'Smalltalk '),
(625, 'Slovenian'),
(626, 'Slovakian'),
(627, 'Slogans '),
(628, 'skype development'),
(629, 'Skype'),
(630, 'Sketching'),
(631, 'Sketch'),
(632, 'Skeleton '),
(633, 'SkaDate'),
(634, 'Six Sigma'),
(635, 'SiteScope'),
(636, 'Telerik Sitefinity CMS '),
(637, 'Sitecore'),
(638, 'SiteBuildIt '),
(639, 'SIP '),
(640, 'Sinhala '),
(641, 'Singing'),
(642, 'Sinatra Framework '),
(643, 'Simulink'),
(644, 'Simplified Chinese'),
(645, 'SimpleDB'),
(646, 'Simple DirectMedia Layer'),
(647, 'SilverStripe'),
(648, 'Silex Framework '),
(649, 'SigmaPlot '),
(650, 'Siemens NX '),
(651, 'Sibelius'),
(652, 'SHOUTcast '),
(653, 'Short Story Writing '),
(654, 'Shopify Templates '),
(655, 'Shopify'),
(656, 'ShiVa3D '),
(657, 'Microsoft SharePoint Designer '),
(658, 'Session Description Protocol '),
(659, 'Servoy '),
(660, 'Servlet '),
(661, 'Service Level Management'),
(662, 'Service Cloud Development'),
(663, 'Service Cloud Administration '),
(664, 'Sermon'),
(665, 'Serialization '),
(666, 'Serial Port Interfacing '),
(667, 'Serenic Navigator '),
(668, 'Serbian'),
(669, 'Sequential Art '),
(670, 'SEOMoz '),
(671, 'SEO Writing '),
(672, 'SEO Keyword Research '),
(673, 'SEO Backlinking'),
(674, 'SEO Audit '),
(675, 'Search Engine Optimization (SEO) '),
(676, 'SENuke X '),
(677, 'Sentiment analysis '),
(678, 'sensable claytrix '),
(679, 'Sendmail '),
(680, 'Sencha GXT '),
(681, 'Sencha Touch '),
(682, 'Semiconductor '),
(683, 'Search engine marketing (SEM)'),
(684, 'Selling '),
(685, 'Selenium WebDriver '),
(686, 'Selenium '),
(687, 'Security Infrastructure'),
(688, 'Security Engineering '),
(689, 'Security Analysis '),
(690, 'Internet Security '),
(691, 'Section 508 Compliance '),
(692, 'SDLX '),
(693, 'SDL Trados '),
(694, 'SDL Passolo'),
(695, 'Sculpture'),
(696, 'Sculpting '),
(697, 'ScrumWorks '),
(698, 'Scrum'),
(699, 'Scripts & Utilities'),
(700, 'Scripting '),
(701, 'Script.aculo.us '),
(702, 'Screenwriting '),
(703, 'Scrapy '),
(704, 'scrapebox '),
(705, 'SCORM'),
(706, 'Scientific Writing '),
(707, 'Scientific Research '),
(708, 'Scientific Computation'),
(709, 'Scheme '),
(710, 'Scenario Planning'),
(711, 'Scalr '),
(712, 'Scale Modeling '),
(713, 'Scalable transaction processing '),
(714, 'Scala'),
(715, 'SCADA'),
(716, 'Savant3 '),
(717, 'Satire '),
(718, 'sassie mystery shopping'),
(719, 'Sass'),
(720, 'SAS'),
(721, 'SilverStripe'),
(722, 'SAP Warehouse Management'),
(723, 'SAP Web Dynpro'),
(724, 'SAP Sybase Adaptive Server Enterprise '),
(725, 'SAP Solution Manager '),
(726, 'SAP SD'),
(727, 'SAP Programming'),
(728, 'SAP NetWeaver'),
(729, 'SAP Materials Management'),
(730, 'SAP Manufacturing Execution '),
(731, 'SAP Logistics Execution '),
(732, 'SAP Hana'),
(733, 'SAP AG'),
(734, 'SAP ERP HCM '),
(735, 'SAP ERP'),
(736, 'SAP CRM'),
(737, 'SAP BusinessOne'),
(738, 'SAP Business Objects'),
(739, 'SAP BSP'),
(740, 'SAP BASIS '),
(741, 'SAP Analysis'),
(742, 'SAP ABAP '),
(743, 'SAP2000 '),
(744, 'SAP'),
(745, 'Samba'),
(746, 'Salesgenie.com '),
(747, 'Salesforce.com '),
(748, 'Salesforce App Development '),
(749, 'Salesforce Apex '),
(750, 'Sales Writing '),
(751, 'Sales Promotion '),
(752, 'Sales management '),
(753, 'Sales Letters '),
(754, 'Sales '),
(755, 'Salary Surveys '),
(756, 'SAI '),
(757, 'Sage Peachtree Complete Accounting '),
(758, 'Sage ERP Accpac '),
(759, 'Sabre '),
(760, 'Sassu '),
(761, 'SaaS '),
(762, 'S '),
(763, 'Russian Language '),
(764, 'Rational Unified Process (RUP) '),
(765, 'Ruby on Rails '),
(766, 'Ruby '),
(767, 'RTOS '),
(768, 'RTML '),
(769, 'RTLinux '),
(770, 'RTL '),
(771, 'RSS '),
(772, 'RSpec '),
(773, 'RPG Writing '),
(774, 'RPG (OS/400) '),
(775, 'RPG Development '),
(776, 'Rotoscoping '),
(777, 'Robotscope '),
(778, 'Root Cause Analysis '),
(779, 'Roomorama API '),
(780, 'Romanian '),
(781, 'Robotics '),
(782, 'Robot Framework '),
(783, 'Java Remote Method Invocation (Java RMI) '),
(784, 'Risk management '),
(785, 'RightScale '),
(786, 'Richfaces '),
(787, 'Rhodes Framework '),
(788, 'Rhino Service Bus '),
(789, 'RhinoScript '),
(790, 'Rhinoceros 3D '),
(791, 'Red Hat Enterprise Linux (RHEL) '),
(792, 'Red Hat Certified Engineer (RHCE) '),
(793, 'RFID '),
(794, 'Autodesk Revit Architecture '),
(795, 'Reviews '),
(796, 'Reverse engineering '),
(797, 'RETS '),
(798, 'Retail Ops Management '),
(799, 'Retail Merchandising '),
(800, 'Resume Writing '),
(801, 'REST '),
(802, 'Responsys Marketing '),
(803, 'Responsys Development '),
(804, 'Responsys Administration '),
(805, 'Responsive Web Design '),
(806, 'Resource Description Framework (RDF) '),
(807, 'Resin '),
(808, 'Research Papers '),
(809, 'Research '),
(810, 'Requirements analysis '),
(811, 'Requirement Management '),
(812, 'Reputation Management '),
(813, 'RepRap '),
(814, 'report writing '),
(815, 'Remoting '),
(816, 'Remote Sensing '),
(817, 'Relationship Management '),
(818, 'Relational Databases '),
(819, 'Regular Expressions '),
(820, 'Regression testing '),
(821, 'Refinery CMS '),
(822, 'Redmine '),
(823, 'Redis '),
(824, 'Red Hat Administration '),
(825, 'Red5 '),
(826, 'Recruiting '),
(827, 'Records Management '),
(828, 'Recommender Systems '),
(829, 'Recipe Writing '),
(830, 'Receptionist Skills '),
(831, 'Receipt Parsing '),
(832, 'Realist Painting '),
(833, 'Realbasic '),
(834, 'Real time stream processing '),
(835, 'Real Estate Management '),
(836, 'Real Estate Law '),
(837, 'Real Estate IDX '),
(838, 'Real Estate Appraisal '),
(839, 'Razor Template Engine '),
(840, 'IBM Rational Rose '),
(841, 'Retail Sales Management '),
(842, 'Raspberry Pi '),
(843, 'RapidWorks '),
(844, 'Rapid Prototyping '),
(845, 'Rapid Miner '),
(846, 'Raphael JS '),
(847, 'RAID Administration '),
(848, 'RADIUS '),
(849, 'Radio personality '),
(850, 'Radio Broadcasting '),
(851, 'Radiant Zemax '),
(852, 'Radiant CMS '),
(853, 'Rackspace Cloud Servers '),
(854, 'Rackspace '),
(855, 'RabbitMQ '),
(856, 'R-Hadoop '),
(857, 'R '),
(858, 'QuickFIX '),
(859, 'quick sales system '),
(860, 'Quartz Composer '),
(861, 'quartz '),
(862, 'Quark Xpress '),
(863, 'Quantity Surveying '),
(864, 'Quantitative Analysis '),
(865, 'Qualitative Research '),
(866, 'Qt '),
(867, 'QS Cad '),
(868, 'Qooxdoo '),
(869, 'QNX '),
(870, 'Qmail '),
(871, 'QlikTech QlikView '),
(872, 'qhse '),
(873, 'QGIS '),
(874, 'Qcodo '),
(875, 'QA Management '),
(876, 'QA Engineering '),
(877, 'Quality of Service (Q-oS) '),
(878, 'Q '),
(879, 'Python SciPy '),
(880, 'Python Numpy '),
(881, 'Python '),
(882, 'pyro '),
(883, 'PyQt '),
(884, 'Pylons '),
(885, 'Pyjamas '),
(886, 'Pure Data '),
(887, 'Purchasing Management '),
(888, 'Puppet Administration '),
(889, 'Punjabi '),
(890, 'punching '),
(891, 'Punch Home Design Studio Pro '),
(892, 'Publishing Fundamentals '),
(893, 'Public speaking '),
(894, 'Public Relations '),
(895, 'PTGui '),
(896, 'PTC Creo Elements/Pro '),
(897, 'Psychometric Examination '),
(898, 'PSPICE '),
(899, 'PSD2CMS '),
(900, 'PSD to XHTML '),
(901, 'PSD to Wordpress '),
(902, 'PSD to MailChimp '),
(903, 'psd to html '),
(904, 'Prototype Javascript Framework '),
(905, 'Protoshare '),
(906, 'ProTools '),
(907, 'Proposal Writing '),
(908, 'Property Tax '),
(909, 'Property Management '),
(910, 'Property Development '),
(911, 'Propellerhead Reason '),
(912, 'Proofreading '),
(913, 'Prolog '),
(914, 'Project Scheduling '),
(915, 'Project Planning '),
(916, 'Project Management professional '),
(917, 'Project management '),
(918, 'Program Management '),
(919, 'Pro-E '),
(920, 'Product management '),
(921, 'Product Liability '),
(922, 'Product Development '),
(923, 'Product Design '),
(924, 'Product Descriptions '),
(925, 'Processing '),
(926, 'Process improvement '),
(927, 'Process architecture '),
(928, 'Private Clouds '),
(929, 'Privacy '),
(930, 'Print Layout Design '),
(931, 'Print design '),
(932, 'Print Advertising '),
(933, 'PrimeFaces '),
(934, 'Oracle Primavera '),
(935, 'Prezi '),
(936, 'PrestaShop '),
(937, 'Press Release Writing '),
(938, 'Press Advertising '),
(939, 'PreSonus Studio One '),
(940, 'Presentations '),
(941, 'Presentation Design '),
(942, 'Predictive Analytics '),
(943, 'Prepress '),
(944, 'PRADO PHP Framework '),
(945, 'Pay Per Click Advertising '),
(946, 'Windows PowerShell '),
(947, 'Power Builder '),
(948, 'PostScript '),
(949, 'PostgreSQL Programming '),
(950, 'PostgreSQL Administration '),
(951, 'Postfix SMTP Server '),
(952, 'Posterous '),
(953, 'Poster Design '),
(954, 'Poser '),
(955, 'POS Terminal Development '),
(956, 'Portuguese '),
(957, 'Portlets '),
(958, 'Portfolio Performance Modeling '),
(959, 'Portrait Painting '),
(960, 'Pomodoro Technique '),
(961, 'Polymer Clay Sculpting '),
(962, 'Polish '),
(963, 'Policy Writing '),
(964, 'Poetry '),
(965, 'Podio '),
(966, 'Pocket PC '),
(967, 'PMDS '),
(968, 'Plumbing '),
(969, 'Plone '),
(970, 'Plivo '),
(971, 'Pligg '),
(972, 'Plesk '),
(973, 'PLC Programming '),
(974, 'PLC & SCADA '),
(975, 'Play Framework '),
(976, 'Platform Migration '),
(977, 'Pixologic Zbrush '),
(978, 'Pinterest Marketing '),
(979, 'Pinnacle Studio '),
(980, 'Pig '),
(981, 'Piano Performance '),
(982, 'Piano Composition '),
(983, 'Physics '),
(984, 'Physical Fitness '),
(985, 'PHP-Nuke '),
(986, 'phpMyDirectory '),
(987, 'phpMyAdmin '),
(988, 'phpfox '),
(989, 'PhpBB '),
(990, 'PHP '),
(991, 'PhotoScape '),
(992, 'Photography '),
(993, 'Photograph Color Correction '),
(994, 'Photo Retouching '),
(995, 'Photo Manipulation '),
(996, 'Photo Editing '),
(997, 'PhoneGap '),
(998, 'Phone Support '),
(999, 'Phing '),
(1000, 'PfSense '),
(1001, 'Petroleum Engineering '),
(1002, 'PESTEL '),
(1003, 'Pervasive Software '),
(1004, 'Personal Development '),
(1005, 'Persian '),
(1006, 'PerlDancer '),
(1007, 'Perl Mojolicious '),
(1008, 'Perl Catalyst '),
(1009, 'Perl '),
(1010, 'Performing arts '),
(1011, 'Performance Tuning '),
(1012, 'Performance testing '),
(1013, 'Perforce '),
(1014, 'Oracle Peoplesoft Development '),
(1015, 'Oracle Peoplesoft Administration '),
(1016, 'PeopleCode '),
(1017, 'Pentaho '),
(1018, 'Penetration Testing '),
(1019, 'PEAR '),
(1020, 'Peachtree Accounting '),
(1021, 'PDF Conversion '),
(1022, 'PCI Compliance '),
(1023, 'PCB Design '),
(1024, 'PCAP '),
(1025, 'PBworks Development '),
(1026, 'PBwiki '),
(1027, 'Payroll Processing '),
(1028, 'Paypal Integration '),
(1029, 'PayPal Development '),
(1030, 'Payment Processing '),
(1031, 'Payment Gateway Integration '),
(1032, 'Pay per click '),
(1033, 'Pattern recognition '),
(1034, 'Patent Law '),
(1035, 'Pashto '),
(1036, 'Pascal '),
(1037, 'ParticleIllusion '),
(1038, 'Parse Mobile App Platform '),
(1039, 'Pardot Marketing '),
(1040, 'Pardot Development '),
(1041, 'Pardot Development '),
(1042, 'Pardot Administration '),
(1043, 'Parallels Virtual Desktop '),
(1044, 'Paralegal Services '),
(1045, 'Papervision3D '),
(1046, 'Papercraft '),
(1047, 'Panoramic Stitching '),
(1048, 'Palm App Development '),
(1049, 'Palm'),
(1050, 'Paint.NET '),
(1051, 'Packaging Design '),
(1052, 'P-CAD '),
(1053, 'Outbound Sales '),
(1054, 'OSPF '),
(1055, 'OSGi '),
(1056, 'OsCommerce '),
(1057, 'osclass '),
(1058, 'OS/2 '),
(1059, 'ORMLite '),
(1060, 'ORM '),
(1061, 'Organizational Development '),
(1062, 'Organizational Behavior '),
(1063, 'Order processing '),
(1064, 'Order Entry '),
(1065, 'Orchard CMS '),
(1066, 'OrCAD '),
(1067, 'OrangeCRM '),
(1068, 'Oracle User Productivity Kit '),
(1069, 'Oracle Upgrade '),
(1070, 'Oracle Unified Method '),
(1071, 'Oracle Universal Content Management '),
(1072, 'Oracle Transportation Management '),
(1073, 'Oracle Team Productivity Center '),
(1074, 'Oracle Taleo '),
(1075, 'Oracle Sun Ray '),
(1076, 'Oracle SOA Suite '),
(1077, 'Oracle Siebel '),
(1078, 'Oracle RightNow '),
(1079, 'Oracle Reports '),
(1080, 'Oracle Real Application Clusters (RAC) '),
(1081, 'Oracle Programming '),
(1082, 'Oracle Primavera '),
(1083, 'Oracle Policy Automation'),
(1084, 'Oracle PLSQL '),
(1085, 'Oracle PL/SQL '),
(1086, 'oracle performance tuning '),
(1087, 'Oracle Patching '),
(1088, 'Orace OBIEE Plus '),
(1089, 'Oracle Java EE '),
(1090, 'Oracle Hyperion Planning '),
(1091, 'Oracle Global Trade Management '),
(1092, 'Oracle Fusion Middleware '),
(1093, 'Oracle Fusion Applications '),
(1094, 'Oracle Forms '),
(1095, 'Oracle Financials Applications '),
(1096, 'Oracle Enterprise Service Bus'),
(1097, 'Oracle Endeca '),
(1098, 'Oracle E-Business Suite '),
(1099, 'Oracle Demantra '),
(1100, 'Oracle Database Administration '),
(1101, 'Oracle database '),
(1102, 'Oracle Data Guard '),
(1103, 'Oracle CRM On Demand '),
(1104, 'Oracle Complex Events Processing '),
(1105, 'Oracle BRM '),
(1106, 'Oracle ATG Web Commerce '),
(1107, 'Oracle Application Server '),
(1108, 'Oracle Application Framework '),
(1109, 'Oracle APEX '),
(1110, 'Oracle Agile '),
(1111, 'Oracle Administration '),
(1112, 'Optimizepress '),
(1113, 'Optimizely '),
(1114, 'Operations Research '),
(1115, 'Operations Management '),
(1116, 'Operating Systems Development '),
(1117, 'OpenX '),
(1118, 'OpenWrt '),
(1119, 'OpenVZ '),
(1120, 'OpenVPN '),
(1121, 'OpenVMS '),
(1122, 'OpenVBX '),
(1123, 'OpenType '),
(1124, 'OpenTok Development '),
(1125, 'opentext '),
(1126, 'openSUSE '),
(1127, 'OpenStack '),
(1128, 'OpenSocial '),
(1129, 'OpenSIPS '),
(1130, 'OpenLayers '),
(1131, 'OpenGL ES '),
(1132, 'OpenGL '),
(1133, 'Openflow '),
(1134, 'OpenERP Development '),
(1135, 'OpenERP Administration '),
(1136, 'openemm '),
(1137, 'OpenCV '),
(1138, 'OpenCL '),
(1139, 'OpenCart '),
(1140, 'OpenBSD '),
(1141, 'OpenBravo PoS '),
(1142, 'OpenACS '),
(1143, 'OpenOffice '),
(1144, 'ooVoo Development '),
(1145, 'OOPS '),
(1146, 'Object Oriented Programming (OOP) '),
(1147, 'Online Writing '),
(1148, 'Online Help '),
(1149, 'Online Community Management '),
(1150, 'On-Page Optimization '),
(1151, 'OmniGraffle '),
(1152, 'Online Transaction Processing (OLTP) '),
(1153, 'OLE Automation '),
(1154, 'OLAP '),
(1155, 'Oil painting '),
(1156, 'OGRE '),
(1157, 'Office Administration '),
(1158, 'Off-page Optimization '),
(1159, 'Odoo '),
(1160, 'odesk api '),
(1161, 'ODBC '),
(1162, 'OCX '),
(1163, 'GNU Octave '),
(1164, 'OCR Tesseract '),
(1165, 'OCR algorithms '),
(1166, 'Occupational Health '),
(1167, 'OCaml '),
(1168, 'Objective-J '),
(1169, 'Objective-C '),
(1170, 'Object Pascal '),
(1171, 'Object Oriented PHP '),
(1172, 'Object oriented design '),
(1173, 'OAuth '),
(1174, 'NVIDIA Mental Ray '),
(1175, 'Nutrition '),
(1176, 'Nursing '),
(1177, 'NUKE '),
(1178, 'Nuendo '),
(1179, 'nservicebus '),
(1180, 'Novell NetWare '),
(1181, 'Notary public '),
(1182, 'NoSQL '),
(1183, 'Norwegian '),
(1184, 'NopCommerce '),
(1185, 'Non-linear editing system '),
(1186, 'Non-Fiction Writing '),
(1187, 'Non-disclosure Agreements '),
(1188, 'Node.js '),
(1189, 'Ning Marketing '),
(1190, 'Ning Development '),
(1191, 'NI Multisim '),
(1192, 'NHibernate '),
(1193, 'Nginx '),
(1194, 'ngcore '),
(1195, 'NFS Implementation '),
(1196, 'NFS Administration '),
(1197, 'Nextengine '),
(1198, 'Next Limit RealFlow'),
(1199, 'Next Limit Maxwell Render '),
(1200, 'Nexmo '),
(1201, 'Newsletter Writing '),
(1202, 'News Writing Style '),
(1203, 'Neuro-linguistic programming '),
(1204, 'Network Security '),
(1205, 'Network Programming '),
(1206, 'Network Planning '),
(1207, 'Network Pentesting '),
(1208, 'Network Monitoring '),
(1209, 'Network Engineering '),
(1210, 'Network Design '),
(1211, 'Network Analysis '),
(1212, 'Network Administration '),
(1213, 'NetSuite Development '),
(1214, 'NetSuite Administration '),
(1215, 'Netfabb '),
(1216, 'Netezza '),
(1217, 'NetBSD '),
(1218, 'NetBeans '),
(1219, 'Neo4j '),
(1220, 'Negotiation '),
(1221, 'Navigation System Implementation '),
(1222, 'Navigation System Design'),
(1223, 'Natural language processing '),
(1224, 'Narration '),
(1225, 'Nanotechnology '),
(1226, 'Nagios '),
(1227, 'n2cms '),
(1228, 'MySQL Programming '),
(1229, 'MySQL Administration '),
(1230, 'Myspace Marketing '),
(1231, 'MySpace API '),
(1232, 'MYOB Administration '),
(1233, 'MXML '),
(1234, 'Model View ViewModel (MVVT) '),
(1235, 'MVC Framework '),
(1236, 'Music Producing '),
(1237, 'Music engraving '),
(1238, 'Music Dubbing '),
(1239, 'Musical composition '),
(1240, 'Music Arrangement '),
(1241, 'Music'),
(1242, 'Murals '),
(1243, 'Munin '),
(1244, 'Multithreaded Programming '),
(1245, 'Multi-touch Hardware Programming '),
(1246, 'Multi-touch Hardware Development '),
(1247, 'Multi Level Marketing (MLM) '),
(1248, 'mtek '),
(1249, 'Microsoft adCenter '),
(1250, 'Microsoft Visual Studio LightSwitch '),
(1251, 'MS Office 365 '),
(1252, 'MS-DOS Administration '),
(1253, 'Multi Router Traffic Grapher (MRTG) '),
(1254, 'MQL 4'),
(1255, 'Multiprotocol Label Switching (MPLS) '),
(1256, 'MPD '),
(1257, 'Mozenda Scraper '),
(1258, 'MovableType '),
(1259, 'Motivational Speaking '),
(1260, 'Motion graphics '),
(1261, 'Microsoft Office SharePoint Server '),
(1262, 'morae '),
(1263, 'Mootools '),
(1264, 'MoonScript '),
(1265, 'Moonfruit SiteMaker '),
(1266, 'Moodle '),
(1267, 'Mono '),
(1268, 'Mongrel '),
(1269, 'MongoDB '),
(1270, 'Molecule Editors '),
(1271, 'MODx '),
(1272, 'Modul8 '),
(1273, 'Model Sheet Drawing '),
(1274, 'Model Sheet Design '),
(1275, 'Mockito '),
(1276, 'Mocha '),
(1277, 'Mobile UI Design '),
(1278, 'Mobile Programming '),
(1279, 'Mobile Development Framework '),
(1280, 'Mobile App Testing '),
(1281, 'Mobile App Development '),
(1282, 'Mobile Advertising '),
(1283, 'mobi '),
(1284, 'MLS Consulting '),
(1285, 'Mixpanel '),
(1286, 'Miva Merchant '),
(1287, 'Minitab '),
(1288, 'Mining Engineering '),
(1289, 'Minecraft '),
(1290, 'MindTouch '),
(1291, 'Mind Mapping '),
(1292, 'Mikrotik RouterOS '),
(1293, 'Mikrotik RouterBOARD '),
(1294, 'MIDI '),
(1295, 'MicroStrategy '),
(1296, 'Microstock Photography '),
(1297, 'Microstration v8 '),
(1298, 'Microsoft Word '),
(1299, 'Microsoft Windows Server '),
(1300, 'Microsoft Windows Powershell '),
(1301, 'Microsoft Visual Studio '),
(1302, 'Microsoft Visual C++ '),
(1303, 'Visual Basic '),
(1304, 'Microsoft Visio '),
(1305, 'Microsoft Virtual Server '),
(1306, 'Microsoft Transaction Server (MTS) '),
(1307, 'Microsoft SQL SSRS '),
(1308, 'Microsoft SQL SSAS '),
(1309, 'Microsoft SQL Server Service Broker '),
(1310, 'Microsoft SQL Server Notification Services '),
(1311, 'Microsoft SQL Server Programming '),
(1312, 'Microsoft SQL Server Administration '),
(1313, 'Microsoft SQL CE '),
(1314, 'Microsoft Small Business Server Administration '),
(1315, 'Microsoft Silverlight '),
(1316, 'Microsoft SharePoint Development '),
(1317, 'Microsoft SharePoint Administration '),
(1318, 'Microsoft Server '),
(1319, 'Microsoft SCVMM '),
(1320, 'Microsoft SCCM '),
(1321, 'Microsoft Publisher '),
(1322, 'Microsoft Project '),
(1323, 'Microsoft PowerPoint '),
(1324, 'Microsoft Outlook Development '),
(1325, 'Microsoft Outlook '),
(1326, 'Microsoft OneNote '),
(1327, 'Microsoft Office '),
(1328, 'Microsoft Message Queue Server (MMSQ) '),
(1329, 'Microsoft MapPoint '),
(1330, 'Microsoft Lync Server '),
(1331, 'Microsoft Kinect Development '),
(1332, 'Microsoft Infopath '),
(1333, 'Microsoft Hyper-V Server '),
(1334, 'Microsoft Hyper V '),
(1335, 'Microsoft Dynamics GP '),
(1336, 'Microsoft Expression Studio '),
(1337, 'Microsoft Exchange Server '),
(1338, 'Microsoft Excel PowerPivot '),
(1339, 'Microsoft Excel '),
(1340, 'Microsoft Entity Framework '),
(1341, 'Microsoft Dynamics ERP '),
(1342, 'Microsoft Dynamics Development '),
(1343, 'Microsoft Dynamics CRM '),
(1344, 'Microsoft Dynamics Administration '),
(1345, 'Windows Media Connect '),
(1346, 'Microsoft Commerce Server '),
(1347, 'Microsoft Certified Information Technology Professional (MCITP) '),
(1348, 'Microsoft Business Intelligence Studio '),
(1349, 'Microsoft Active Directory '),
(1350, 'Microsoft Access Programming '),
(1351, 'Microsoft Access Administration '),
(1352, 'Microcontroller Programming '),
(1353, 'Microcontroller Design '),
(1354, 'Microsoft Foundation Classes (MFC) '),
(1355, 'Methods Engineering '),
(1356, 'Meteor '),
(1357, 'MetaTrader 4 (MT4) '),
(1358, 'Merise '),
(1359, 'Mercurial '),
(1360, 'MerchantRun GlobalLink '),
(1361, 'MerchantRun '),
(1362, 'Menu Design '),
(1363, 'Memcached '),
(1364, 'Meego Development '),
(1365, 'Medical Writing '),
(1366, 'Medical Translation '),
(1367, 'Medical transcription '),
(1368, 'Medical Records Research '),
(1369, 'Medical Law '),
(1370, 'Medical Informatics '),
(1371, 'Medical Imaging '),
(1372, 'Medical Illustration '),
(1373, 'Medical Billing and Coding '),
(1374, 'MediaWiki '),
(1375, 'Media relations '),
(1376, 'Media buying '),
(1377, 'Mechatronics '),
(1378, 'Mechanical Engineering '),
(1379, 'Mechanical Design '),
(1380, 'MCP '),
(1381, 'Multi-Criteria Decision Analysis '),
(1382, 'McAfee VirusScan '),
(1383, 'McAfee SAAS '),
(1384, 'McAfee ePolicy Orchestrator '),
(1385, 'Maxon Cinema 4D '),
(1386, 'Maxon BodyPaint 3D '),
(1387, 'Max '),
(1388, 'Apache Maven '),
(1389, 'MATLAB'),
(1390, 'Mathematics '),
(1391, 'Mathematica '),
(1392, 'MathCad '),
(1393, 'Materials Engineering '),
(1394, 'Mastercam '),
(1395, 'Master Production Schedule '),
(1396, 'Martial Arts '),
(1397, 'Marriage Counseling '),
(1398, 'Marketo '),
(1399, 'Marketing strategy '),
(1400, 'Marketing Cloud Marketing '),
(1401, 'Marketing Cloud Development '),
(1402, 'Marketing Cloud Administration '),
(1403, 'Marketing Automation '),
(1404, 'Market research '),
(1405, 'Marathi '),
(1406, 'MapReduce '),
(1407, 'Mapr '),
(1408, 'Maple '),
(1409, 'Mapinfo '),
(1410, 'MAPI '),
(1411, 'Manufacturing Design '),
(1412, 'Manufacturing '),
(1413, 'Manual Test Execution '),
(1414, 'Mantis '),
(1415, 'Manga '),
(1416, 'Mandarin '),
(1417, 'Management Skills '),
(1418, 'Management Development '),
(1419, 'Management Consulting '),
(1420, 'ManageEngine '),
(1421, 'Mambo '),
(1422, 'Malware '),
(1423, 'Malayalam '),
(1424, 'Malay '),
(1425, 'Makerbot '),
(1426, 'Make Build Script '),
(1427, 'MailEnable '),
(1428, 'mailchimp '),
(1429, 'Mail Server Implementation '),
(1430, 'Mail Merge '),
(1431, 'Magic Tricks '),
(1432, 'Magic Bullet Looks '),
(1433, 'Magic Bullet Colorista '),
(1434, 'Magento '),
(1435, 'Magazine Layout '),
(1436, 'Maemo '),
(1437, 'MadCap Software '),
(1438, 'Machine learning '),
(1439, 'Machine Design '),
(1440, 'Macedonian '),
(1441, 'Macaw '),
(1442, 'Mac OSX Administration '),
(1443, 'Mac OS App Development '),
(1444, 'm0n0wall '),
(1445, 'Lyrics Writing '),
(1446, 'Lucene Search '),
(1447, 'Lua '),
(1448, 'Loyalty Marketing '),
(1449, 'Lotus Notes '),
(1450, 'IBM Lotus Domino '),
(1451, 'Lotus Approach '),
(1452, 'Logo Design '),
(1453, 'LogMeIn Rescue '),
(1454, 'LogMeIn Hamachi '),
(1455, 'LogiXML '),
(1456, 'Logistics & Shipping '),
(1457, 'Logic Pro '),
(1458, 'Log4j '),
(1459, 'Localization '),
(1460, 'LoadRunner '),
(1461, 'Load testing '),
(1462, 'Load Balancing '),
(1463, 'Learning Management System (LMS) '),
(1464, 'LivePerson '),
(1465, 'Live Chat Software '),
(1466, 'Live Chat Operator '),
(1467, 'Litigation '),
(1468, 'Lithuanian '),
(1469, 'Lithium Framework '),
(1470, 'Literature Review '),
(1471, 'Lisp '),
(1472, 'LiquidPlanner '),
(1473, 'Linux System Administration '),
(1474, 'Slackware Linux '),
(1475, 'linq to sql '),
(1476, 'linq to entities '),
(1477, 'LINQ '),
(1478, 'Linkvana '),
(1479, 'LinkedIn Recruiting '),
(1480, 'LinkedIn Development '),
(1481, 'Link Wheel '),
(1482, 'Link Building '),
(1483, 'Linguistics '),
(1484, 'lingo '),
(1485, 'Linear Programming '),
(1486, 'LimeSurvey '),
(1487, 'LimeJS '),
(1488, 'Lightworks '),
(1489, 'Lightwave 3d '),
(1490, 'Lighttpd '),
(1491, 'Lighting Design '),
(1492, 'Liferay '),
(1493, 'Licensing '),
(1494, 'LibreOffice '),
(1495, 'libGDX '),
(1496, 'libcurl '),
(1497, 'LexisNexis Practice Advisor '),
(1498, 'LexisNexis Accurint '),
(1499, 'Level Design '),
(1500, 'Lettering '),
(1501, 'Letter Writing '),
(1502, 'Lesson Plan Writing '),
(1503, 'LESS '),
(1504, 'Leptonica '),
(1505, 'LemonStand '),
(1506, 'Legal writing '),
(1507, 'Legal Translation '),
(1508, 'Legal Transcription '),
(1509, 'Legal research '),
(1510, 'Legal Consulting '),
(1511, 'Lectora '),
(1512, 'Lean Consulting '),
(1513, 'Lead generation '),
(1514, 'LDAP '),
(1515, 'Latvian '),
(1516, 'LaTeX '),
(1517, 'Lasso '),
(1518, 'laser engraving '),
(1519, 'Laravel Framework '),
(1520, 'Filipino - Visayan Dialect '),
(1521, 'Landscape design '),
(1522, 'Landing Pages '),
(1523, 'LANDesk '),
(1524, 'LAN Implementation '),
(1525, 'LAN Administration '),
(1526, 'LAMP Administration '),
(1527, 'LabWindows/CVI '),
(1528, 'LabVIEW '),
(1529, 'Label and Package Design '),
(1530, 'Kyrgyz '),
(1531, 'KVM Virtualization '),
(1532, 'KVM Switches '),
(1533, 'KVM '),
(1534, 'Korn shell '),
(1535, 'Korean '),
(1536, 'Kohana '),
(1537, 'KnockoutJS '),
(1538, 'KiXtart '),
(1539, 'KitchenDraw '),
(1540, 'KISSMetrics '),
(1541, 'Kindle Fire Apps '),
(1542, 'Kindle Fire '),
(1543, 'Kindle App Development '),
(1544, 'Kickstarter Marketing '),
(1545, 'Keynote '),
(1546, 'Keyboarding '),
(1547, 'Key/Value Stores '),
(1548, 'Kernel '),
(1549, 'Kerkythea '),
(1550, 'Kerberos '),
(1551, 'Kentico CMS '),
(1552, 'Kendo UI '),
(1553, 'Kannada '),
(1554, 'Kaltura '),
(1555, 'Kajabi '),
(1556, 'Kaizen '),
(1557, 'Junos '),
(1558, 'JUnit '),
(1559, 'Juniper Routers '),
(1560, 'JSTL '),
(1561, 'JSP '),
(1562, 'json '),
(1563, 'Jsharp '),
(1564, 'JavaServer Faces (JSF) '),
(1565, 'JQuery Mobile '),
(1566, 'jQuery '),
(1567, 'JPA '),
(1568, 'Joomla Migration '),
(1569, 'Joomla Fabrik '),
(1570, 'Joomla! '),
(1571, 'JOnAS '),
(1572, 'JomSocial Development '),
(1573, 'Job Description Writing '),
(1574, 'Job Definition Format (JDF) '),
(1575, 'Job Costing '),
(1576, 'JNDI '),
(1577, 'JNCIA-Junos '),
(1578, 'JMS '),
(1579, 'JMeter '),
(1580, 'Jinja2 '),
(1581, 'Jingle Program Production '),
(1582, 'Jimdo '),
(1583, 'Jig and Fixture Design '),
(1584, 'JFC '),
(1585, 'Jewish Theology '),
(1586, 'Jewelry Design '),
(1587, 'JetPack '),
(1588, 'Jenkins '),
(1589, 'JDeveloper '),
(1590, 'JDBC '),
(1591, 'Oracle JD Edwards EnterpriseOne '),
(1592, 'JCL '),
(1593, 'JBPM '),
(1594, 'JBoss Seam '),
(1595, 'JBoss '),
(1596, 'JAXB '),
(1597, 'JavaScript '),
(1598, 'Javanese '),
(1599, 'JavaFX '),
(1600, 'Java Servlets Development '),
(1601, 'Java ME '),
(1602, 'Java EE '),
(1603, 'Java '),
(1604, 'JasperReports '),
(1605, 'Japanese '),
(1606, 'J2SE '),
(1607, 'J2ME '),
(1608, 'J2EE '),
(1609, 'IT Service Management '),
(1610, 'ITK '),
(1611, 'ITIL '),
(1612, 'iTextSharp '),
(1613, 'Italian '),
(1614, 'IT Management '),
(1615, 'Issue Tracking Systems '),
(1616, 'ISO 9001 '),
(1617, 'ISO 9000 '),
(1618, 'Islamic theology '),
(1619, 'Islamic Banking '),
(1620, 'ISEB '),
(1621, 'ISA Server '),
(1622, 'IRM Income Tax Audits '),
(1623, 'IronPython '),
(1624, 'ireport '),
(1625, 'IRC Server Administration '),
(1626, 'Iptables '),
(1627, 'IPsec '),
(1628, 'IPMI '),
(1629, 'iPhone UI Design '),
(1630, 'iPhone App Development '),
(1631, 'iPad UI Design '),
(1632, 'iPad App Development '),
(1633, 'iOS Development '),
(1634, 'Ionic Framework '),
(1635, 'Invoicing '),
(1636, 'Invitation Design '),
(1637, 'Investment Research '),
(1638, 'Investigative Reporting '),
(1639, 'Inventory Management '),
(1640, 'Intuit Quicken '),
(1641, 'Intuit QuickBooks '),
(1642, 'Intuit Lacerte Tax '),
(1643, 'Intranet Implementation '),
(1644, 'Intranet Architecture '),
(1645, 'Interviewing '),
(1646, 'Intersystems Cache '),
(1647, 'interspire '),
(1648, 'Interprise Suite ERP '),
(1649, 'internet surveys '),
(1650, 'Internet Security '),
(1651, 'Internet research '),
(1652, 'Internet Marketing '),
(1653, 'International taxation '),
(1654, 'International Law '),
(1655, 'Internal Auditing '),
(1656, 'Interior design '),
(1657, 'InterBase '),
(1658, 'Interactive Voice Response '),
(1659, 'Interaction design '),
(1660, 'IntelliJ IDEA '),
(1661, 'IntelliCred '),
(1662, 'Intellectual Property Law '),
(1663, 'Integrated Circuits '),
(1664, 'Insurance Consulting '),
(1665, 'Instrumentation '),
(1666, 'Instructional design '),
(1667, 'InstallShield '),
(1668, 'Installer Development '),
(1669, 'Instagram Marketing '),
(1670, 'Instagram API '),
(1671, 'Inno Setup '),
(1672, 'Inkscape '),
(1673, 'ingress filtering '),
(1674, 'Ingress '),
(1675, 'InfusionSoft Marketing '),
(1676, 'Infusionsoft Development '),
(1677, 'Infusionsoft Administration '),
(1678, 'Infragistics '),
(1679, 'Informix Programming '),
(1680, 'Informix Administration '),
(1681, 'informatique '),
(1682, 'Information Security '),
(1683, 'Information Management '),
(1684, 'Information design '),
(1685, 'Information Builders WebFOCUS '),
(1686, 'Information Architecture '),
(1687, 'Informatica '),
(1688, 'Infographics '),
(1689, 'Industrial Engineering '),
(1690, 'Industrial design '),
(1691, 'Indonesian '),
(1692, 'Indexing '),
(1693, 'Inbound marketing '),
(1694, 'In-Game Advertising '),
(1695, 'IMS '),
(1696, 'Immigration Law '),
(1697, 'Imaging '),
(1698, 'Image Processing'),
(1699, 'Image Editing '),
(1700, 'IMacros'),
(1701, 'Illustration'),
(1702, 'Internet Information Services (IIS) '),
(1703, 'ifbyphone API Development '),
(1704, 'ifbyphone Administration '),
(1705, 'IDRISI '),
(1706, 'IdeaBlade DevForce '),
(1707, 'IContact '),
(1708, 'Icon Design '),
(1709, 'IClone '),
(1710, 'Icefaces '),
(1711, 'ICD Coding '),
(1712, 'IBM z/VM Administration '),
(1713, 'IBM System x '),
(1714, 'IBM WebSphere '),
(1715, 'IBM Watson '),
(1716, 'IBM Tivoli Framework '),
(1717, 'IBM System Storage '),
(1718, 'IBM SPSS '),
(1719, 'IBM SmartCloud '),
(1720, 'IBM SameTime '),
(1721, 'IBM System p '),
(1722, 'IBM PowerPC Programming '),
(1723, 'IBM Lotus Symphony '),
(1724, 'IBM Lotus Notes Traveler '),
(1725, 'IBM DB2 Programming '),
(1726, 'IBM DB2 Administration '),
(1727, 'IBATIS '),
(1728, 'Hypnosis '),
(1729, 'Hybris '),
(1730, 'Hardware Prototyping '),
(1731, 'HVAC System Design '),
(1732, 'Hungarian '),
(1733, 'Humor Writing '),
(1734, 'Human Sciences '),
(1735, 'Human Resource Management '),
(1736, 'HubSpot '),
(1737, 'HTML5 '),
(1738, 'HTML '),
(1739, 'HRM '),
(1740, 'Human Resource Information Systems '),
(1741, 'HR Benefits '),
(1742, 'HP-UX Administration '),
(1743, 'HP-UX '),
(1744, 'HP Quality Center '),
(1745, 'HP QuickTest Professional (HPQTP) '),
(1746, 'HP Network Management Center (HPNMC) '),
(1747, 'HP Cloud '),
(1748, 'Houdini '),
(1749, 'HotDog '),
(1750, 'Hospitality '),
(1751, 'HootSuite '),
(1752, 'Home Design '),
(1753, 'Home Automation '),
(1754, 'History '),
(1755, 'Hindi '),
(1756, 'Highcharts '),
(1757, 'Hibernate '),
(1758, 'hi5 '),
(1759, 'Heroku '),
(1760, 'Helpdesk '),
(1761, 'Hebrew '),
(1762, 'Health Level 7 '),
(1763, 'headus UVLayout '),
(1764, 'HBase '),
(1765, 'HaXe '),
(1766, 'Haitian Creole '),
(1767, 'Haskell '),
(1768, 'Hardware Troubleshooting '),
(1769, 'haproxy '),
(1770, 'HAML '),
(1771, 'Hadoop '),
(1772, 'Fuzzing '),
(1773, 'Fusebox '),
(1774, 'Fundraising '),
(1775, 'Functional testing '),
(1776, 'Full-text Search Engines '),
(1777, 'fuel cms '),
(1778, 'FTP '),
(1779, 'Microsoft FrontPage '),
(1780, 'Frontend Development '),
(1781, 'Friendster '),
(1782, 'French '),
(1783, 'Freeswitch '),
(1784, 'FreePBX '),
(1785, 'FreeMarker '),
(1786, 'Freelance Marketing '),
(1787, 'FreeBSD '),
(1788, 'Fraud Mitigation '),
(1789, 'Fraud Analysis '),
(1790, 'Franchise Consulting '),
(1791, 'Field-Programmable Gate Array (FPGA) '),
(1792, 'FoxPro Programming '),
(1793, 'FoxPro Administration '),
(1794, 'FourSquare Development '),
(1795, 'Forum Posting '),
(1796, 'Forum Moderation '),
(1797, 'Forum Development '),
(1798, 'Fortran '),
(1799, 'Format & Layout '),
(1800, 'Form-Z '),
(1801, 'Foreign Exchange Trading '),
(1802, 'FontForge '),
(1803, 'Font Development '),
(1804, 'Flyer Design '),
(1805, 'Flowcharts '),
(1806, 'Flask '),
(1807, 'Flash 3D '),
(1808, 'FL Studio '),
(1809, 'Five9 '),
(1810, 'First aid '),
(1811, 'Firewall '),
(1812, 'Firefox Plugin Development '),
(1813, 'Firebird '),
(1814, 'Fire Protection Engineering '),
(1815, 'Fire OS Development '),
(1816, 'Finnish '),
(1817, 'Finite Element Analysis '),
(1818, 'Financial Writing '),
(1819, 'Financial Reporting '),
(1820, 'Financial Prospectus Writing '),
(1821, 'Financial modeling '),
(1822, 'Financial Management '),
(1823, 'Financial Forecasting '),
(1824, 'Financial analysis '),
(1825, 'Financial Accounting '),
(1826, 'Finale '),
(1827, 'Final Draft '),
(1828, 'Final Cut Pro X '),
(1829, 'Final Cut Pro '),
(1830, 'Film Production '),
(1831, 'Film Dubbing '),
(1832, 'Film Direction '),
(1833, 'Film criticism '),
(1834, 'Filipino '),
(1835, 'Filing '),
(1836, 'FileMaker '),
(1837, 'Field-Map '),
(1838, 'Fiction Writing '),
(1839, 'Fiber Optics '),
(1840, 'FFmpeg '),
(1841, 'Fetchmail '),
(1842, 'Fedora '),
(1843, 'Federal Acquisition Regulations '),
(1844, 'Feature Writing '),
(1845, 'FBML '),
(1846, 'Facebook Javascript (FBJS) '),
(1847, 'Fax '),
(1848, 'Fashion Modeling '),
(1849, 'Fashion design '),
(1850, 'Family Law '),
(1851, 'Fact Checking '),
(1852, 'Facelets '),
(1853, 'Facebook Marketing '),
(1854, 'facebook games development '),
(1855, 'Facebook Development '),
(1856, 'FAAC '),
(1857, 'F# '),
(1858, 'eZ Publish '),
(1859, 'Eyeon Fusion '),
(1860, 'Ext JS '),
(1861, 'Expression Engine '),
(1862, 'Express Scribe '),
(1863, 'Exim '),
(1864, 'Excel VBA '),
(1865, 'ExactTarget '),
(1866, 'evolus pencil '),
(1867, 'EViews '),
(1868, 'Event planning '),
(1869, 'Event Management '),
(1870, 'Eucalyptus Cloud '),
(1871, 'Etsy Administration '),
(1872, '\"Extract, Transform and Load (ETL)\" '),
(1873, 'ETABS '),
(1874, 'Essbase '),
(1875, 'Essay Writing '),
(1876, 'ESL Teaching '),
(1877, 'Erwin '),
(1878, 'Enterprise Resource Planning (ERP) '),
(1879, 'Erotica Writing '),
(1880, 'Erlang '),
(1881, 'ERDAS IMAGINE '),
(1882, 'Environmental science '),
(1883, 'Environmental Law '),
(1884, 'Entrepreneurship '),
(1885, 'Entity Framework '),
(1886, 'ADO.NET Entity Framework '),
(1887, 'english tutoring '),
(1888, 'English Spelling '),
(1889, 'English Punctuation '),
(1890, 'English Proofreading '),
(1891, 'English Grammar '),
(1892, 'English '),
(1893, 'Engineering drawing '),
(1894, 'Engineering Design '),
(1895, 'Energy Engineering '),
(1896, 'Employment Law '),
(1897, 'EMC Symmetrix '),
(1898, 'embroidery digitization '),
(1899, 'Embroidery '),
(1900, 'Ember.js '),
(1901, 'Embedded Systems '),
(1902, 'Embedded Linux '),
(1903, 'Embedded C '),
(1904, 'Email Technical Support '),
(1905, 'Email Marketing '),
(1906, 'Email Handling '),
(1907, 'Email Etiquette '),
(1908, 'Email Deliverability '),
(1909, 'Eloqua '),
(1910, 'Elliptic Curve Cryptography (ECC) '),
(1911, 'Elgg '),
(1912, 'Electronics '),
(1913, 'Electronic Workbench '),
(1914, 'Electronic funds transfer '),
(1915, 'Electronic Design '),
(1916, 'Electrical engineering '),
(1917, 'Electrical Drawing '),
(1918, 'Elastix '),
(1919, 'Elasticsearch '),
(1920, 'Elance '),
(1921, 'Ektron '),
(1922, 'Ekiga '),
(1923, 'Enterprise JavaBeans (EJB) '),
(1924, 'Edufire '),
(1925, 'Education Technology '),
(1926, 'Edius '),
(1927, 'Editorial Writing '),
(1928, 'Editing '),
(1929, 'Electronic data interchange (EDI) '),
(1930, 'EDGE '),
(1931, 'Economics '),
(1932, 'Economic Analysis '),
(1933, 'Econometrics '),
(1934, 'Ecommerce Platform Development '),
(1935, 'ECMAScript '),
(1936, 'Eclipse '),
(1937, 'eBooks '),
(1938, 'ebook Writing '),
(1939, 'eBook Design '),
(1940, 'eBay Web Services '),
(1941, 'eBay Motors '),
(1942, 'eBay Marketing '),
(1943, 'eBay Listing/Writing '),
(1944, 'eBay API '),
(1945, 'Eagle '),
(1946, 'E4X '),
(1947, 'ePub '),
(1948, 'eLearning '),
(1949, 'EHealth '),
(1950, 'Dwolla API '),
(1951, 'DVD Studio Pro '),
(1952, 'dvd mastering '),
(1953, 'Dutch '),
(1954, 'Dundas Chart Controls '),
(1955, 'DTS '),
(1956, 'DSL Troubleshooting '),
(1957, 'Drupal '),
(1958, 'Drums '),
(1959, 'Dropbox API '),
(1960, 'Drop Shipping '),
(1961, 'Drones '),
(1962, 'Driving '),
(1963, 'Device Driver Development '),
(1964, 'Drawing '),
(1965, 'Drafting '),
(1966, 'DotNetNuke '),
(1967, 'DOS '),
(1968, 'Domain Migration '),
(1969, 'Dojo Toolkit '),
(1970, 'Document review '),
(1971, 'Document Object Model '),
(1972, 'Document Conversion '),
(1973, 'Document Control '),
(1974, 'Doctrine ORM '),
(1975, 'Docker '),
(1976, 'DocBook '),
(1977, 'DNSsec '),
(1978, 'DNS '),
(1979, 'dmaic '),
(1980, 'Django '),
(1981, 'DJing '),
(1982, 'Distributed computing '),
(1983, 'Distance Education '),
(1984, 'Display Ads '),
(1985, 'Disaster recovery '),
(1986, 'DirectX '),
(1987, 'DirectShow '),
(1988, 'Directory Submission '),
(1989, 'Direct marketing '),
(1990, 'Dinamica Ego '),
(1991, 'Dimdim Development '),
(1992, 'Digital Signal Processing '),
(1993, 'Digital Sculpting '),
(1994, 'Digital scrapbooking '),
(1995, 'Digital Photography '),
(1996, 'Digital painting '),
(1997, 'Digital Ocean '),
(1998, 'Digital Mapping ');
INSERT INTO `skills` (`id`, `name`) VALUES
(1999, 'Digital Engineering '),
(2000, 'Digital Electronics '),
(2001, 'Digital Access Pass '),
(2002, 'Diffbot '),
(2003, 'Dietetics '),
(2004, 'Dialux '),
(2005, 'DHTML '),
(2006, 'DHCP '),
(2007, 'DevOps '),
(2008, 'DevExpress '),
(2009, 'DevExpress Reporting '),
(2010, 'Desktop Support '),
(2011, 'Desktop Publishing '),
(2012, 'Desktop Applications '),
(2013, 'Desk.com Development '),
(2014, 'Desk.com Administration '),
(2015, 'Derivatives '),
(2016, 'Dental Technology '),
(2017, 'Demandware '),
(2018, 'Delphi '),
(2019, 'DELFTship '),
(2020, 'Deja Vu '),
(2021, 'Defect Tracking '),
(2022, 'Debian OS '),
(2023, 'DCOM '),
(2024, 'DBMS '),
(2025, 'dBase Programming '),
(2026, 'dBase Administration '),
(2027, 'IBM InfoSphere DataStage '),
(2028, 'DataLife Engine '),
(2029, 'Database testing '),
(2030, 'database programming '),
(2031, 'Database Modeling '),
(2032, 'database management '),
(2033, 'Database design '),
(2034, 'Database Cataloguing '),
(2035, 'Database Caching '),
(2036, 'Database Administration '),
(2037, 'Data Warehousing '),
(2038, 'Data Visualization '),
(2039, 'Data Sufficiency '),
(2040, 'Data Structures '),
(2041, 'Data Sheet Writing '),
(2042, 'Data scraping '),
(2043, 'Data Science '),
(2044, 'Data Recovery '),
(2045, 'Data Protection '),
(2046, 'Data Modeling '),
(2047, 'Data mining '),
(2048, 'Data Logistics '),
(2049, 'Data Interpretation '),
(2050, 'Data Ingestion '),
(2051, 'Data Entry '),
(2052, 'Data Engineering '),
(2053, 'Data Encoding '),
(2054, 'Data Cleansing '),
(2055, 'Data Center Operations '),
(2056, 'Data Backup '),
(2057, 'Data Analytics '),
(2058, 'DART '),
(2059, 'Danish '),
(2060, 'Dancing '),
(2061, 'DaVinci Resolve '),
(2062, 'd3.js '),
(2063, 'D Programming Language '),
(2064, 'Czech '),
(2065, 'CVS '),
(2066, 'Customer support '),
(2067, 'Customer service '),
(2068, 'Custom CMS '),
(2069, 'Curriculum Development '),
(2070, 'CURL '),
(2071, 'CUDA '),
(2072, 'Cucumber '),
(2073, 'Cubecart '),
(2074, 'CSU/DSU '),
(2075, 'CSS3 '),
(2076, 'CSS'),
(2077, 'CS-Cart '),
(2078, 'SAP Crystal Reports '),
(2079, 'Cryptography '),
(2080, 'Crowdfunding '),
(2081, 'Croatian '),
(2082, 'CRM '),
(2083, 'Criminal Law '),
(2084, 'CRE Loaded '),
(2085, 'Creative writing '),
(2086, 'Creative & Talent '),
(2087, 'Web Crawling '),
(2088, 'CPU Design '),
(2089, 'CppUnit '),
(2090, 'CPanel '),
(2091, 'Covers & Packaging '),
(2092, 'Cover Letter Writing '),
(2093, 'Cover Design '),
(2094, 'Counseling Psychology '),
(2095, 'CouchDB '),
(2096, 'Cost accounting '),
(2097, 'Cosmos OS '),
(2098, 'COSMO-RS Chemical Engineering '),
(2099, 'Corporate Taxes '),
(2100, 'Corporate Strategy '),
(2101, 'Corporate Law '),
(2102, 'Corporate Finance '),
(2103, 'Corporate Brand Identity '),
(2104, 'Corona '),
(2105, 'Corel Ventura '),
(2106, 'Corel Painter '),
(2107, 'Corel Paint Shop Pro '),
(2108, 'CorelDRAW '),
(2109, 'Core Java '),
(2110, 'CORBA '),
(2111, 'Copywriting '),
(2112, 'Copyright '),
(2113, 'Copy editing '),
(2114, 'Cooking '),
(2115, 'Conversion Rate Optimization '),
(2116, 'Contract Manufacturing '),
(2117, 'Contract Law '),
(2118, 'Contract Drafting '),
(2119, 'Continuous Integration '),
(2120, 'Content Writing '),
(2121, 'Content Moderation '),
(2122, 'Content Management System '),
(2123, 'Contao CMS '),
(2124, 'Consumer Protection '),
(2125, 'Construction Monitoring '),
(2126, 'Construction '),
(2127, 'Constant Contact '),
(2128, 'Conflict Resolution '),
(2129, 'Concrete5 CMS '),
(2130, 'ConceptShare Development '),
(2131, 'Concept Software InPage '),
(2132, 'Concept Design '),
(2133, 'Concept Artistry '),
(2134, 'COMSOL Multiphysics '),
(2135, 'comsat '),
(2136, 'Computer vision '),
(2137, 'Computer Skills '),
(2138, 'Computer Repair '),
(2139, 'Computer Networking '),
(2140, 'Comptuer Maintenance '),
(2141, 'Computer Hardware Installation '),
(2142, 'Computer Hardware Design '),
(2143, 'Computer Graphics '),
(2144, 'Computer Engineering '),
(2145, 'Computer Assembly '),
(2146, 'Computer Aided Manufacturing (CAM) '),
(2147, 'Computational Linguistics '),
(2148, 'Computational Fluid Dynamics (CFD) '),
(2149, 'Compositing '),
(2150, 'Compliance '),
(2151, 'Complaint Management '),
(2152, 'Compiler '),
(2153, 'Compensation '),
(2154, 'Communications '),
(2155, 'Common Language Runtime '),
(2156, 'Commercials '),
(2157, 'Commercial Lending '),
(2158, 'Comic Writing '),
(2159, 'Comic Art '),
(2160, 'Comet '),
(2161, 'Comedy Writing '),
(2162, 'Component Object Model (Microsoft COM) '),
(2163, 'Collection Agencies '),
(2164, 'Collaborative filtering '),
(2165, 'CollabNet TeamForge '),
(2166, 'ColdFusion '),
(2167, 'Cold calling '),
(2168, 'Cognos '),
(2169, 'CoffeeScript '),
(2170, 'CodeWarrior '),
(2171, 'CoDeSys '),
(2172, 'CodeIgniter '),
(2173, 'Code Refactoring '),
(2174, 'Cocos2d '),
(2175, 'Cocoa Touch '),
(2176, 'Cocoa '),
(2177, 'COBOL '),
(2178, 'CNC Programming '),
(2179, 'CMS Development '),
(2180, 'Cluster Computing '),
(2181, 'CloudForge '),
(2182, 'Cloudera '),
(2183, 'Cloud Security Framework '),
(2184, 'Clojure '),
(2185, 'Clipping Path '),
(2186, 'Climate Sciences '),
(2187, 'ClickBank'),
(2188, 'clerical skills '),
(2189, 'ClearQuest '),
(2190, 'Clear Books '),
(2191, 'Clean Technology '),
(2192, 'Classifieds Posting '),
(2193, 'ClamAV '),
(2194, 'Civil Law '),
(2195, 'Civil Engineering '),
(2196, 'CiviCRM '),
(2197, 'Citrix XenServer '),
(2198, 'Citrix NetScaler '),
(2199, 'Cisco CallManager '),
(2200, 'cisco routers '),
(2201, 'Cisco PIX '),
(2202, 'Cisco IOS '),
(2203, 'Cisco Certified Network Associate (CCNA) '),
(2204, 'Cisco Certified Internetwork Expert (CCIE) '),
(2205, 'Cisco Certified Entry Networking Technician (CCENT) '),
(2206, 'Cisco Certified Design Professional (CCDP) '),
(2207, 'Cisco Certified Design Expert (CCDE) '),
(2208, 'Cisco Certified Design Associate (CCDA) '),
(2209, 'Cisco ASA '),
(2210, 'Circuit Design '),
(2211, 'Cinematography '),
(2212, 'Customer Information Control System (CICS) '),
(2213, 'Chrome OS '),
(2214, 'Chrome Extension '),
(2215, 'Chroma key '),
(2216, 'Christian theology '),
(2217, 'Chinese '),
(2218, 'Childrens Writing '),
(2219, 'Child Counseling '),
(2220, 'Chicago Manual of Style '),
(2221, 'Chemistry '),
(2222, 'Chemical Engineering '),
(2223, 'Check Point '),
(2224, 'chat support '),
(2225, 'Chart.js '),
(2226, 'Character Design '),
(2227, 'Chaos Group V-Ray '),
(2228, 'Change Management '),
(2229, 'CGI '),
(2230, 'CG Artwork '),
(2231, 'Certified Public Accountant (CPA) '),
(2232, 'Certified Information Systems Security Professional (CISSP) '),
(2233, 'Centreon '),
(2234, 'Central Reservation Systems '),
(2235, 'Central Desktop Development '),
(2236, 'CentOS '),
(2237, 'Violoncello '),
(2238, 'Celemony Melodyne '),
(2239, 'CDMA '),
(2240, 'Cisco Certified Network Professional (CCNP) '),
(2241, 'Cavium OCTEON Plus MIPS64 '),
(2242, 'Cavium Octeon Fusion '),
(2243, 'CATIA '),
(2244, 'Catholic Theology '),
(2245, 'Catch Phrases '),
(2246, 'Catalan '),
(2247, 'Apache Cassandra '),
(2248, 'Caspio Programming '),
(2249, 'Caspio Administration '),
(2250, 'Cartooning '),
(2251, 'Cartography & Maps '),
(2252, 'Caricature Drawing '),
(2253, 'Carbide.c++ '),
(2254, 'Capture NX2 '),
(2255, 'Capistrano '),
(2256, 'Cantonese '),
(2257, 'Camtasia '),
(2258, 'Calligraphy '),
(2259, 'Call Handling '),
(2260, 'Call Center Management '),
(2261, 'Calendar Management '),
(2262, 'Calculus '),
(2263, 'Cakewalk Sonar '),
(2264, 'CakePHP '),
(2265, 'Cairngorm '),
(2266, 'Cadence Platform '),
(2267, 'Computer-Aided Design '),
(2268, 'Cache Management '),
(2269, 'C Shell '),
(2270, 'C++ '),
(2271, 'C# '),
(2272, 'C '),
(2273, 'Business Writing '),
(2274, 'Business valuation '),
(2275, 'Business Scenario Development '),
(2276, 'Business Proposal Writing '),
(2277, 'Business Process Reengineering '),
(2278, 'Business Process Modeling '),
(2279, 'Business Planning '),
(2280, 'Business Modeling '),
(2281, 'Business Mathematics '),
(2282, 'Business Management '),
(2283, 'Business IT Alignment '),
(2284, 'Business intelligence '),
(2285, 'Business Development '),
(2286, 'Business Continuity Planning '),
(2287, 'Business Coaching '),
(2288, 'Business Card Design '),
(2289, 'Business Analysis '),
(2290, 'Bulk Marketing '),
(2291, 'Bulgarian '),
(2292, 'Buildium '),
(2293, 'Building Regulations '),
(2294, 'Building Estimation '),
(2295, 'Bugzilla '),
(2296, 'Budgeting & Forecasting '),
(2297, 'BuddyPress '),
(2298, 'Brochure Design '),
(2299, 'BroadVision QuickSilver '),
(2300, 'BroadVision ClearVale '),
(2301, 'Broadcast Engineering '),
(2302, 'Broadcast Advertising '),
(2303, 'BREW '),
(2304, 'Brand Ambassador '),
(2305, 'Brand Management '),
(2306, 'Brand Licensing '),
(2307, 'Brand Consulting '),
(2308, 'BPO IT services '),
(2309, 'BPO Call Center '),
(2310, 'Business Process Execution Language (BPEL) '),
(2311, 'BPCS '),
(2312, 'Box2D '),
(2313, 'Box.net Development '),
(2314, 'Bosnian '),
(2315, 'Borland SilkTest '),
(2316, 'Borland C++ Builder '),
(2317, 'Bootstrap '),
(2318, 'Boost '),
(2319, 'BoonEx Dolphin '),
(2320, 'Bookkeeping '),
(2321, 'Book Writing '),
(2322, 'Book Cover Design '),
(2323, 'BuildMyRank Writing '),
(2324, 'Bluetooth '),
(2325, 'blue.box '),
(2326, 'Blog Writing '),
(2327, 'Blog Development '),
(2328, 'Blog Commenting '),
(2329, 'Blitz BASIC '),
(2330, 'Blender3D '),
(2331, 'BlazeDS '),
(2332, 'Blackboard '),
(2333, 'BlackBerry JDE '),
(2334, 'Blackberry app development '),
(2335, 'Black Box Testing '),
(2336, 'BizTalk Server '),
(2337, 'BitRock Installbuilder '),
(2338, 'Bitrix Intranet '),
(2339, 'Bitrix '),
(2340, 'Bitcoin '),
(2341, 'BIRT '),
(2342, 'Biotechnology '),
(2343, 'Biostatistics '),
(2344, 'Biology '),
(2345, 'Biography Writing '),
(2346, 'Bioinformatics '),
(2347, 'Bing Ads '),
(2348, 'BigCommerce '),
(2349, 'Big Data '),
(2350, 'Border Gateway Protocol '),
(2351, 'BGL Simple Fund '),
(2352, 'Betfair '),
(2353, 'BeOS '),
(2354, 'Bentley Microstation '),
(2355, 'Bengali '),
(2356, 'Benefits Law '),
(2357, 'Belle Nuit Subtitler '),
(2358, 'Behavioral Event Interviewing '),
(2359, 'Behavior Driven Development (BDD) '),
(2360, 'bbPress '),
(2361, 'Bassoon '),
(2362, 'Basque '),
(2363, 'Basic '),
(2364, 'Bash shell scripting '),
(2365, 'Bash '),
(2366, 'Basecamp '),
(2367, 'Business Activity Monitoring '),
(2368, 'Bartending '),
(2369, 'Banner Ad Design '),
(2370, 'Banner Ads '),
(2371, 'Bankruptcy '),
(2372, 'Bank Reconciliation '),
(2373, 'Balsamiq '),
(2374, 'Baking '),
(2375, 'Bada '),
(2376, 'Bacula '),
(2377, 'Backbone.js '),
(2378, 'B2B Marketing '),
(2379, 'Axure RP '),
(2380, 'Axiom Productivity Tools '),
(2381, 'Axiom MicroStation Productivity Toolkit '),
(2382, 'Axiis '),
(2383, 'Axapta '),
(2384, 'Abstract Window Toolkit (AWT) '),
(2385, 'Awk '),
(2386, 'aWeber '),
(2387, 'Away3D '),
(2388, 'Avid Pro Tools '),
(2389, 'Avid '),
(2390, 'Aviation '),
(2391, 'AVEVA PDMS '),
(2392, 'Avaya '),
(2393, 'Avactis '),
(2394, 'Automotive Engineering '),
(2395, 'Automation '),
(2396, 'Automated Testing '),
(2397, 'Automated Call Distribution '),
(2398, 'AutoLISP '),
(2399, 'Autoit '),
(2400, 'AutoHotKey '),
(2401, 'Autodys AcceliCAD '),
(2402, 'Autodesk Softimage '),
(2403, 'Autodesk Sketchbook Pro '),
(2404, 'Autodesk Revit '),
(2405, 'Autodesk Navisworks '),
(2406, 'Autodesk Mudbox '),
(2407, 'Autodesk Maya '),
(2408, 'Autodesk Inventor '),
(2409, 'Autodesk Autocad Civil3D '),
(2410, 'Autodesk 3D Studio Max '),
(2411, 'Autodesk '),
(2412, 'AutoCAD '),
(2413, 'Authorize.Net Development '),
(2414, 'Author-It '),
(2415, 'Augmented Reality '),
(2416, 'Autodesk Architecture '),
(2417, 'Auditing '),
(2418, 'Audio Restoration '),
(2419, 'Audio Production '),
(2420, 'Audio Postediting '),
(2421, 'Audio Post Production '),
(2422, 'Audio Mixing '),
(2423, 'Audio Mastering '),
(2424, 'Audio Engineering '),
(2425, 'Audio Editing '),
(2426, 'Audio Design '),
(2427, 'Audacity '),
(2428, 'Auctiva '),
(2429, 'Atom '),
(2430, 'Atmel AVR '),
(2431, 'ATM Implementation '),
(2432, 'Atlassian JIRA '),
(2433, 'Atlassian GreenHopper '),
(2434, 'Atlassian Confluence '),
(2435, 'Atlas '),
(2436, 'ATL '),
(2437, 'Asynchronous I/O '),
(2438, 'Astrophysics '),
(2439, 'Astrology '),
(2440, 'Asterisk '),
(2441, 'Assembly Language '),
(2442, 'Assembla '),
(2443, 'Aspen HYSYS '),
(2444, 'AspectJS '),
(2445, 'AspDotNetStorefront '),
(2446, 'ASP.NET MVC '),
(2447, 'ASP.NET '),
(2448, 'ASP '),
(2449, 'ASIO '),
(2450, 'IBM AS/400 Control Language '),
(2451, 'Arts & Crafts '),
(2452, 'ArtRage '),
(2453, 'Artlantis Studio '),
(2454, 'Artlantis Render '),
(2455, 'Artisteer '),
(2456, 'ArtiosCAD '),
(2457, 'Artificial Neural Networks '),
(2458, 'Artificial Intelligence '),
(2459, 'Articulate Studio '),
(2460, 'Articulate Storyline '),
(2461, 'Articulate Presenter '),
(2462, 'Articulate Engage '),
(2463, 'Articulate '),
(2464, 'Article Writing '),
(2465, 'Article Submission '),
(2466, 'Article Spinning '),
(2467, 'Article Rewriting '),
(2468, 'Article curation '),
(2469, 'Art Direction '),
(2470, 'Art curation '),
(2471, 'ARM '),
(2472, 'Arduino '),
(2473, 'ARCserve '),
(2474, 'ArcScene '),
(2475, 'Architectural Rendering '),
(2476, 'Architecture '),
(2477, 'ArchiCAD '),
(2478, 'ArcGIS '),
(2479, 'Arbitration '),
(2480, 'Arabic '),
(2481, 'Appointment Setting '),
(2482, 'Application Server '),
(2483, 'Application Programming '),
(2484, 'Application Lifecycle Management '),
(2485, 'Applicant Tracking Systems '),
(2486, 'AppleScript '),
(2487, 'Apple Xcode '),
(2488, 'Apple WebObjects '),
(2489, 'Apple UIKit Framework '),
(2490, 'Apple Motion '),
(2491, 'Apple iWork '),
(2492, 'Apple iWeb '),
(2493, 'iOS Jailbreaking '),
(2494, 'Apple iMovie '),
(2495, 'Apple iBooks '),
(2496, 'Appian BPM Suite '),
(2497, 'Appian '),
(2498, 'AppFuse '),
(2499, 'Appcelerator Titanium '),
(2500, 'App Usability Analysis '),
(2501, 'App Store '),
(2502, 'Apollo '),
(2503, 'API Documentation '),
(2504, 'API Development '),
(2505, 'Apache Tomcat '),
(2506, 'Apache Tiles '),
(2507, 'Apache Thrift '),
(2508, 'Apache Struts '),
(2509, 'Apache Spark '),
(2510, 'Apache Solr '),
(2511, 'Apache Shirol '),
(2512, 'Apache Jakarta POI '),
(2513, 'Apache OFBiz '),
(2514, 'Apache Nutch '),
(2515, 'Apache Mahout '),
(2516, 'Apache Kafka '),
(2517, 'Apache Hive '),
(2518, 'Apache Flume '),
(2519, 'Apache CXF '),
(2520, 'Apache Cordova '),
(2521, 'Apache Cocoon '),
(2522, 'Apache CloudStack '),
(2523, 'Apache Click '),
(2524, 'Apache Camel '),
(2525, 'Apache Avro '),
(2526, 'Apache Ant '),
(2527, 'Apache administration '),
(2528, 'AP Style Writing '),
(2529, 'Antitrust '),
(2530, 'Antispam and Antivirus '),
(2531, 'Antenna Design '),
(2532, 'ANSYS '),
(2533, 'ANSI C '),
(2534, 'Anime Studio '),
(2535, 'Animation '),
(2536, 'AngularJS '),
(2537, 'Android SDK '),
(2538, 'Android App Development '),
(2539, 'Android '),
(2540, 'Analytics '),
(2541, 'Analog Electronics '),
(2542, 'AMQP '),
(2543, 'Amplifiers and Filters '),
(2544, 'American Sign Language '),
(2545, 'aMember '),
(2546, 'Amazon Webstore '),
(2547, 'Amazon Web Services '),
(2548, 'Amazon S3 '),
(2549, 'Amazon Relational Database Service '),
(2550, 'Amazon MWS '),
(2551, 'Mechanical Turk API '),
(2552, 'Amazon EC2 '),
(2553, 'Amazon Appstore '),
(2554, 'Amanda Backup '),
(2555, 'Amadeus '),
(2556, 'Altium Designer '),
(2557, 'Alternative Dispute Resolution '),
(2558, 'Alternative3D '),
(2559, 'Alpha '),
(2560, 'Alibre Design '),
(2561, 'Algorithms '),
(2562, 'Algorithm Development '),
(2563, 'Alfresco user '),
(2564, 'Alfresco development '),
(2565, 'Album Cover Design '),
(2566, 'Albanian '),
(2567, 'Akka '),
(2568, 'AJAX '),
(2569, 'AIX '),
(2570, 'Amharic Language '),
(2571, 'Agriculture '),
(2572, 'Agile software developmennt '),
(2573, 'Afrikaans '),
(2574, 'Affiliate Marketing '),
(2575, 'Advertising '),
(2576, 'Advanced Business Application Programming (ABAP) '),
(2577, 'ADVA '),
(2578, 'Adobe Wallaby '),
(2579, 'Adobe Soundbooth '),
(2580, 'Adobe RoboHelp '),
(2581, 'Adobe Premiere Pro '),
(2582, 'Adobe Premiere Elements '),
(2583, 'Adobe Premiere '),
(2584, 'Adobe Photoshop Lightroom '),
(2585, 'Adobe Photoshop '),
(2586, 'Adobe PDF '),
(2587, 'Adobe PageMaker '),
(2588, 'Adobe Muse '),
(2589, 'Adobe LiveCycle Designer '),
(2590, 'Adobe Photoshop Lightroom '),
(2591, 'Adobe Insight '),
(2592, 'Adobe InDesign '),
(2593, 'Adobe InCopy '),
(2594, 'Adobe Imageready '),
(2595, 'Adobe Illustrator '),
(2596, 'AGAL '),
(2597, 'Adobe GoLive '),
(2598, 'Adobe FreeHand '),
(2599, 'Adobe Framemaker '),
(2600, 'Adobe Flex '),
(2601, 'Adobe Flash '),
(2602, 'Adobe Fireworks '),
(2603, 'Adobe Encore '),
(2604, 'Adobe eLearning Suite '),
(2605, 'Adobe Dreamweaver '),
(2606, 'Adobe Director '),
(2607, 'Adobe Digital Marketing Suite '),
(2608, 'Adobe Creative Suite '),
(2609, 'Adobe Contribute '),
(2610, 'Adobe Content Server '),
(2611, 'Adobe Captivate '),
(2612, 'Adobe Business Catalyst '),
(2613, 'Adobe Audition '),
(2614, 'Adobe Analytics '),
(2615, 'Adobe AIR '),
(2616, 'Adobe After Effects '),
(2617, 'Adobe Acrobat '),
(2618, 'ADO.NET '),
(2619, 'ActiveX Data Objects (ADO) '),
(2620, 'Administrative Support '),
(2621, 'ADK '),
(2622, 'Adaptive Algorithms '),
(2623, 'Adaco '),
(2624, 'Ada '),
(2625, 'Ad Servers '),
(2626, 'Ad Posting '),
(2627, 'Ad Planning & Buying '),
(2628, 'ActiveX '),
(2629, 'ActiveCollab '),
(2630, 'Active Listening '),
(2631, 'Active Directory '),
(2632, 'ActionScript 3 '),
(2633, 'ActionScript '),
(2634, 'Actian '),
(2635, 'ACT! '),
(2636, 'Acrylic Painting '),
(2637, 'Acronis '),
(2638, 'Acquisitions '),
(2639, 'ACPI '),
(2640, 'ACDSee '),
(2641, 'Accounts Receivable Management '),
(2642, 'Accounts Payable Management '),
(2643, 'AccountMate '),
(2644, 'Accounting '),
(2645, 'Account Management '),
(2646, 'Academic Writing '),
(2647, 'Absynth '),
(2648, 'Ableton Live '),
(2649, 'AbleCommerce '),
(2650, 'Abaqus '),
(2651, 'A/B Testing '),
(2652, 'Ab Initio '),
(2653, 'A2Billing '),
(2654, '3ds Max '),
(2655, '3D Systems '),
(2656, '3D Scanning '),
(2657, '3D Rigging '),
(2658, '3D Rendering '),
(2659, '3D Printing '),
(2660, '3D Modeling '),
(2661, '3D Design '),
(2662, '3D Animation '),
(2663, '2D Design '),
(2664, '2D Animation '),
(2665, '1ShoppingCart '),
(2666, '.NET Remoting '),
(2667, '.NET Framework '),
(2668, 'NET Compact Framework '),
(2670, 'Craft CMS'),
(2671, 'Salesforce'),
(2672, 'tets');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `twitter` varchar(300) NOT NULL,
  `instagram` varchar(300) NOT NULL,
  `imagelocation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `title`, `facebook`, `twitter`, `instagram`, `imagelocation`) VALUES
(1, 'Mike Perolli', 'Founder of Wave Inc', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', '20.04.09.21.33-1586457209.1433-2394464.jpg'),
(2, 'Danna Dibbs', 'Co Founder of Wave Inc', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', '20.04.09.21.35-1586457328.3773-10380900.jpg'),
(3, 'Angelica Heart', 'CFO', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', '20.04.09.21.37-1586457420.8607-92500523.jpg'),
(4, 'Jennifer Winston', 'Frontend Developer', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', '20.04.09.21.36-1586457410.2602-2084103.jpg'),
(5, 'Jimmy Rosenthal', 'Backend Developer', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', '20.04.09.21.38-1586457482.6827-18957621.jpg'),
(6, 'Craig Stevens', 'Frontend Developer', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.instagram.com', '20.04.09.21.38-1586457508.5282-63279391.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `sub_title` varchar(300) NOT NULL,
  `project_search` varchar(300) NOT NULL,
  `freelancer_search` varchar(300) NOT NULL,
  `categories_title` varchar(300) NOT NULL,
  `portfolio_title` varchar(300) NOT NULL,
  `how_it_works_title` varchar(300) NOT NULL,
  `customers_title` varchar(300) NOT NULL,
  `join_us_title` varchar(300) NOT NULL,
  `bg_image_one` varchar(300) NOT NULL,
  `bg_image_two` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`, `title`, `sub_title`, `project_search`, `freelancer_search`, `categories_title`, `portfolio_title`, `how_it_works_title`, `customers_title`, `join_us_title`, `bg_image_one`, `bg_image_two`) VALUES
(1, 'boxplace', 'Hire Great Freelancers, Fast.', 'Wave helps you hire elite freelancers at a moment\'s notice.', 'What Project are you looking for?', 'Are you looking for Freelancers?', 'Popular Categories', 'Logos, websites, book covers & more!', 'How It Works', 'Few Words from our Valuable Customers', 'Millions of small businesses use Wave to turn their ideas into reality.', 'YAHkqCeJmGpEpx.jpg', 'n9qieurUEU1ivl.jpg'),
(2, 'boxsale', 'Build an Outstanding Digital Marketplace', '', '', '', '', '', '', '', '', 'ZyoQE4Vlbf4Qee.jpg', 'Mft0pamEteN23T.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `userid` varchar(300) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(300) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `email` text NOT NULL,
  `credit_account` decimal(15,2) NOT NULL,
  `paypal_email` varchar(300) NOT NULL,
  `imagelocation` text NOT NULL,
  `bg_imagelocation` text NOT NULL,
  `tokencode` text NOT NULL,
  `joined` datetime NOT NULL,
  `user_type` int(11) NOT NULL,
  `registercode` varchar(300) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `email_verified` tinyint(4) NOT NULL,
  `title` varchar(300) NOT NULL,
  `website` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `categories` mediumtext NOT NULL,
  `skills` mediumtext NOT NULL,
  `about` longtext NOT NULL,
  `email_settings` tinyint(4) NOT NULL,
  `jobs_notifications` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `password`, `name`, `slug`, `email`, `credit_account`, `paypal_email`, `imagelocation`, `bg_imagelocation`, `tokencode`, `joined`, `user_type`, `registercode`, `verified`, `email_verified`, `title`, `website`, `country`, `categories`, `skills`, `about`, `email_settings`, `jobs_notifications`) VALUES
(334, '233802410288', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Anthony E Fisher', 'anthony-e-fisher', 'freelancer_1@gmail.com', '70.00', 'freelancer_1@gmail.com', '81jAndpLWkLqe7.jpg', 'wave.jpg', '', '2019-10-23 13:33:29', 1, '17597e4818f98be29b9e34de3e28cf0b', 1, 0, 'Frontend Developer', '', 'Seattle, Washington', 'SEO Keyword Optimization,Web Design & UI/ UX,Wordpress Themes & Plugins', 'Twitter Marketing,Bootstrap,twitter api,TV Broadcasting', 'I am a hardworking and respectful developer. I will do the work to my ability.', 1, 1),
(335, '753678237313', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Julia D Mosley', 'julia-d-mosley', 'freelancer_2@gmail.com', '19.00', 'freelancer_2@gmail.com', '1556026913.jpg', 'wave.jpg', '', '2019-10-23 15:41:16', 1, '8c7d6b464dad8f56a1b1281528dd622b', 0, 0, 'Article & Blog Writer', '', 'Pittsburgh, Pennsylvania', 'Writing & Translation,Article & Blog Writing', 'Writing,English Proofreading ', 'I have my own books published on Amazon which have great reviews.', 1, 1),
(336, '715478889450', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Charles J Linton', 'charles-j-linton', 'freelancer_3@gmail.com', '49.00', 'freelancer_3_paypal@gmail.com', '15561367847.jpg', 'wave.jpg', '', '2019-10-23 15:45:42', 1, 'effc137fb91168e8040ced1f81086fa0', 0, 0, 'Graphics Designer', '', 'Flint, Michigan', 'Graphics & Design,Cartoons,Flyers & Brochures,Logo Design,Social Media Graphics,T-Shirts', 'Adobe Photoshop ,Adobe Muse ,Adobe Illustrator ', 'I love to create beautiful stuff.', 1, 1),
(337, '645447357569', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Gilda Cheng', 'gilda-cheng', 'freelancer_4@gmail.com', '0.00', '', '15560276393.jpg', 'wave.jpg', '', '2019-10-23 15:51:34', 1, 'f2213a3e0b7db0950845c84b38e1649b', 1, 0, 'Web Developer', '', 'Beijing, China', 'Web Design & UI/ UX,Website Builders,Wordpress Themes & Plugins', 'Yii,XSL,PHP ,Laravel Framework ,CakePHP ', 'I am an experienced Web Developer of over 10yrs.', 1, 1),
(338, '296482705384', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Michael C McFarland', 'michael-c-mcfarland', 'freelancer_5@gmail.com', '0.00', '', '1556027944.jpg', 'wave.jpg', '', '2019-10-23 15:58:10', 1, '6b31969ec66a8a5564488640bd98a652', 1, 0, 'Creative Director of Branding', '', 'Arcadia, Florida', 'Flyers & Brochures,Logo Design,Social Media Graphics', 'Word-of-Mouth,Corporate Brand Identity ,Brand Management ', 'I am an outdoor man who can sell our business', 1, 1),
(339, '199476311866', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Helen W Ward', 'helen-w-ward', 'freelancer_6@gmail.com', '70.00', '', '1556035682.jpg', 'wave.jpg', '', '2019-10-23 18:07:27', 1, 'f21189ac9d9f552d6fd1e9d3abd59ef4', 0, 0, 'Business & Stategy Analyst', '', 'New York, USA', 'Graphics & Design', 'Infographics ', 'I am great at Infographics', 1, 1),
(340, '305378125552', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Robert C Cox', 'robert-c-cox', 'freelancer_7@gmail.com', '70.00', '', '1556035968.jpg', 'wave.jpg', '', '2019-10-23 18:12:06', 1, '424990132950b95ab2fa25565b769e3d', 0, 0, 'Frontend Developer', '', 'Irvine, California', 'Web Design & UI/ UX', 'Website Prototyping,HTML5 ,CSS3 ', 'I love to build great websites.', 1, 1),
(341, '228145236254', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Sharon M Watson', 'sharon-m-watson', 'freelancer_8@gmail.com', '25.00', 'freelancer_8_paypal@gmail.com', '1556036413.jpg', 'wave.jpg', '', '2019-10-23 18:19:32', 1, 'fea426e2bab45c57ccb52bc3d7334ca6', 1, 0, 'SEO Expert', '', 'Johnston City, Illinois', 'Writing & Translation,Article & Blog Writing,Proofreading & Editing', 'SEO Writing ,SEO Keyword Research ,SEO Audit ', 'I can fix your website SEO and you will get more traffic!!', 1, 1),
(342, '324036228471', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Samatha H Rios', 'samatha-h-rios', 'freelancer_9@gmail.com', '42.00', '', '1556036692.jpg', 'wave.jpg', '', '2019-10-23 18:24:15', 1, '6f1156b92e11b8d1a313e3c30971cffe', 1, 0, 'Animator', '', 'Waukesha, Wisconsin', 'Animation & 3D', 'Animation ,3D Modeling ,3D Design ,3D Animation ,2D Animation ', 'I am an expert in 3D Animation.', 1, 1),
(343, '434155361070', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Dexter S Nugent', 'dexter-s-nugent', 'freelancer_10@gmail.com', '15.00', 'freelancer_10_paypal@gmail.com', '1556036987.jpg', 'wave.jpg', '', '2019-10-23 18:29:17', 1, 'e9911c604fb2228a3132119f58b7698e', 0, 0, 'Mobile App Developer', '', 'Houston, Texas', 'Mobile App Development', 'Mobile Programming ,Mobile Development Framework ,Mobile App Development ', 'I can build your company a great mobile app.', 1, 1),
(344, '981686315672', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Gerald K Myers', 'gerald-k-myers', 'client_1@gmail.com', '80.00', '', '1556107560.jpg', 'wave.jpg', '', '2019-10-24 14:04:51', 2, '05b78ae5e88fb580459810789ae70c90', 0, 0, 'Founder of Gerald Inc Company', 'https://www.themashabrand.com', 'Charlotte, North Carolina', '', '', '', 1, 1),
(345, '188158648562', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Rose M Milewski', 'rose-m-milewski', 'client_2@gmail.com', '0.00', '', '15561077470.jpg', 'wave.jpg', '', '2019-10-24 14:08:42', 2, '8ac64bb88d89907f1a8179655f99f9d6', 0, 0, 'Founder of Rose Inc Company', 'https://www.themashabrand.com', 'Montgomery, Alabama', '', '', '', 1, 1),
(346, '431974897102', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Jesse A Williams', 'jesse-a-williams', 'client_3@gmail.com', '30.00', '', '15561082675.jpg', 'wave.jpg', '', '2019-10-24 14:17:19', 2, '8bfea85b3171c37870d45bc781966ffb', 0, 0, 'Founder of Jesse Inc Company', 'https://www.themashabrand.com', 'Clarksburg, West Virginia', '', '', '', 1, 1),
(347, '321267804911', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Margaret H Nilsen', 'margaret-h-nilsen', 'client_4@gmail.com', '150.00', '', '15561120981.jpg', 'wave.jpg', '', '2019-10-24 15:21:01', 2, '40b2447874b018cd62ee6f448f3bba58', 0, 0, 'Founder of Margaret Inc Company', 'https://www.themashabrand.com', 'Brisbane, California', '', '', '', 1, 1),
(348, '329616019298', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Kevin S Gonzalez', 'kevin-s-gonzalez', 'client_5@gmail.com', '0.00', '', '1556112221.jpg', 'wave.jpg', '', '2019-10-24 15:23:16', 2, 'a354a4a619b309605643da85d727987f', 2, 0, 'Founder of Gonzalez Inc Company', 'https://www.themashabrand.com', 'Millbrae, California', '', '', '', 1, 1),
(349, '108278049269', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Marian J Speer', 'marian-j-speer', 'client_6@gmail.com', '100.00', '', '15561123320.jpg', 'wave.jpg', '', '2019-10-24 15:25:01', 2, '4cf76aa5f7509a94dd983166a0272e37', 0, 0, 'Founder of Speer Inc Company', 'https://www.themashabrand.com', 'New York, New York', '', '', '', 1, 1),
(350, '296594131506', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Tyler S Gallaway', 'tyler-s-gallaway', 'client_7@gmail.com', '0.00', '', '15561124681.jpg', 'wave.jpg', '', '2019-10-24 15:27:12', 2, '3d2a85fb66fa9bc690df9150fc332339', 0, 0, 'Founder of Gallaway Inc Company', 'https://www.themashabrand.com', 'Boca Raton, Florida', '', '', '', 1, 1),
(351, '199513386617', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Kirstin R Paiz', 'kirstin-r-paiz', 'client_8@gmail.com', '15.00', '', '15561126756.jpg', 'wave.jpg', '', '2019-10-24 15:29:59', 2, '209dcb959142ca5db922ca821de84e15', 0, 0, 'Founder of Paiz Inc Company', 'https://www.themashabrand.com', 'Arlington, Tennessee', '', '', '', 1, 1),
(352, '969406884108', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Patricia T Granger', 'patricia-t-granger', 'client_9@gmail.com', '0.00', '', '1556112884.jpg', 'wave.jpg', '', '2019-10-24 15:34:03', 2, '1b30e490b473e8cc9a7b658085992a56', 0, 0, 'Founder of Granger Inc Company', 'https://www.themashabrand.com', 'Boston, Massachusetts', '', '', '', 1, 1),
(353, '156958966286', '$2y$10$rFJ3dK8Whkv22QKz8TOxXu3pDkElkBvSKaR6AeNQLAW.p.I..Vgh2', 'Jon M Mullins', 'jon-m-mullins', 'client_10@gmail.com', '0.00', '', '1556113043.jpg', 'wave.jpg', '', '2019-10-24 15:36:16', 2, 'e1fc076eae8aecbe6a98e8e8072789ab', 0, 0, 'Founder of Mullins Inc Company', 'https://www.themashabrand.com', 'Albany, New York', '', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `user_id` varchar(300) NOT NULL,
  `hash` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(255) NOT NULL,
  `code` varchar(300) NOT NULL,
  `freelancerid` varchar(300) NOT NULL,
  `paypal_email` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_fee` decimal(15,2) NOT NULL,
  `freelancer_receive` decimal(15,2) NOT NULL,
  `action` tinyint(4) NOT NULL,
  `read_status` tinyint(4) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_to_be_paid` datetime NOT NULL,
  `date_paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `code`, `freelancerid`, `paypal_email`, `type`, `amount`, `transaction_fee`, `freelancer_receive`, `action`, `read_status`, `date_added`, `date_to_be_paid`, `date_paid`) VALUES
(1, 'lgXBwzGWxq', '228145236254', 'freelancer_8_paypal@gmail.com', 'PayPal', '50.00', '2.30', '47.70', 2, 1, '2019-11-26 14:20:16', '2019-12-01 14:20:16', '2019-12-01 14:24:20'),
(2, 'wYCa2FGfzt', '434155361070', 'freelancer_10_paypal@gmail.com', 'PayPal', '300.00', '2.30', '297.70', 2, 1, '2019-11-26 14:57:10', '2019-12-01 14:57:10', '2019-12-01 10:53:19'),
(3, 'KCDzeKhxW1', '228145236254', 'freelancer_8_paypal@gmail.com', 'PayPal', '100.00', '2.30', '97.70', 2, 1, '2019-11-29 10:55:44', '2019-12-03 10:55:44', '2019-12-03 16:17:15'),
(5, 'ygrd0zZBTyC3Lc', '753678237313', 'freelancer_2@gmail.com', 'PayPal', '30.00', '2.50', '27.50', 1, 1, '2019-12-03 15:17:58', '2019-12-07 15:17:58', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_info`
--
ALTER TABLE `about_info`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispute_conversation`
--
ALTER TABLE `dispute_conversation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispute_conversation_reply`
--
ALTER TABLE `dispute_conversation_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escrow`
--
ALTER TABLE `escrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `how_it_works`
--
ALTER TABLE `how_it_works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite`
--
ALTER TABLE `invite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_info`
--
ALTER TABLE `about_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `conversation_reply`
--
ALTER TABLE `conversation_reply`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dispute_conversation`
--
ALTER TABLE `dispute_conversation`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dispute_conversation_reply`
--
ALTER TABLE `dispute_conversation_reply`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `escrow`
--
ALTER TABLE `escrow`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `how_it_works`
--
ALTER TABLE `how_it_works`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invite`
--
ALTER TABLE `invite`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2673;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
