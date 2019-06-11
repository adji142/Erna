-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 11:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `towo.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_menu`
--

CREATE TABLE `app_menu` (
  `RowID` char(50) NOT NULL,
  `id` int(3) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Logo` varchar(35) NOT NULL,
  `Link` varchar(30) NOT NULL,
  `level` int(2) NOT NULL,
  `level2` int(2) NOT NULL,
  `active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_menu`
--

INSERT INTO `app_menu` (`RowID`, `id`, `Name`, `Logo`, `Link`, `level`, `level2`, `active`) VALUES
('050019c6-2697-11e8-a1e3-00ff40563bbb', 1, 'Dashboard', 'fa-dashboard', 'back/dashboard/', 1, 2, b'1'),
('076b0b6d-2697-11e8-a1e3-00ff40563bbb', 2, 'Profile', 'fa-user', 'back/dashboard/profile', 1, 2, b'1'),
('0a428fc3-2697-11e8-a1e3-00ff40563bbb', 3, 'Feedback', 'fa-feed', '', 1, 1, b'0'),
('0bbfeef2-2697-11e8-a1e3-00ff40563bbb', 4, 'Store performance', 'fa-thumbs-o-up', '', 1, 1, b'0'),
('0d64798d-2697-11e8-a1e3-00ff40563bbb', 5, 'Store Promo', 'fa-cart-plus', 'back/dashboard/post', 1, 1, b'0'),
('188dcdba-2697-11e8-a1e3-00ff40563bbb', 6, 'Promo', 'fa-cart-arrow-down', 'back/dashboard/ongoing', 1, 1, b'1'),
('1d1537d3-2697-11e8-a1e3-00ff40563bbb', 9, 'Change Password', 'fa-lock', 'login/reset', 1, 2, b'1'),
('1e8a645b-2697-11e8-a1e3-00ff40563bbb', 10, 'Towo Feedback', 'fa-feed', '', 2, 2, b'1'),
('2051e6b3-2697-11e8-a1e3-00ff40563bbb', 11, 'Towo Perform', 'fa-thumbs-o-up', '', 2, 2, b'1'),
('21802a2f-2697-11e8-a1e3-00ff40563bbb', 12, 'Towo User ', 'fa-users', '', 2, 2, b'1'),
('228cd07d-2697-11e8-a1e3-00ff40563bbb', 13, 'Towo User Block', 'fa-user-times', '', 2, 2, b'1'),
('23a6bc44-2697-11e8-a1e3-00ff40563bbb', 14, 'Towo Report', 'fa-bar-chart', '', 2, 2, b'1'),
('24c94ac2-2697-11e8-a1e3-00ff40563bbb', 15, 'Towo Menu', 'fa-bars', '', 2, 2, b'1'),
('25f54c5a-2697-11e8-a1e3-00ff40563bbb', 16, 'Towo Event', 'fa-tv', '', 2, 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_post`
--

CREATE TABLE `app_post` (
  `id_post` int(15) NOT NULL,
  `id_reg` varchar(50) NOT NULL,
  `promo_title` varchar(25) NOT NULL,
  `description` varchar(360) NOT NULL,
  `post_date` datetime NOT NULL,
  `start_period` date NOT NULL,
  `end_period` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `tag` varchar(360) NOT NULL,
  `pic1` varchar(360) NOT NULL,
  `pic2` varchar(360) NOT NULL,
  `pic3` varchar(360) NOT NULL,
  `pic4` varchar(360) NOT NULL,
  `pic5` varchar(360) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_post`
--

INSERT INTO `app_post` (`id_post`, `id_reg`, `promo_title`, `description`, `post_date`, `start_period`, `end_period`, `status`, `tag`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`) VALUES
(21948, '781066894', 'test', 'test', '2018-03-21 10:28:35', '2018-03-20', '2018-12-31', 'running', '', 'img_post/781066894/15200572287083.jpg', 'img_post/781066894/empty', 'img_post/781066894/empty', 'img_post/781066894/empty', 'img_post/781066894/empty');

-- --------------------------------------------------------

--
-- Table structure for table `app_profile`
--

CREATE TABLE `app_profile` (
  `id_reg` varchar(50) NOT NULL,
  `id_profile` varchar(15) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `bidangusaha` varchar(25) NOT NULL,
  `company_name` varchar(25) NOT NULL,
  `since` int(4) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `phone2` varchar(25) NOT NULL,
  `birtday` date NOT NULL,
  `photo` varchar(150) NOT NULL,
  `store_desc` varchar(360) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_profile`
--

INSERT INTO `app_profile` (`id_reg`, `id_profile`, `firstname`, `lastname`, `Gender`, `email`, `bidangusaha`, `company_name`, `since`, `address`, `phone`, `phone2`, `birtday`, `photo`, `store_desc`) VALUES
('1662624513748373', 'PR61410461', '', '', '', '', '', '', 0, '', '', '', '0000-00-00', 'https://graph.facebook.com/1662624513748373/picture?width=50', ''),
('433746337', 'PR73470996', '', '', '', 'finance15008@centro.co.id', '', '', 0, '', '', '', '0000-00-00', 'img_profile/images21.png', ''),
('450378417', 'PR18420391', 'Prasetyo Aji', 'Wibowo', 'Male', 'it15008@centro.co.id', 'Departement store', 'Centro', 2011, 'solo', '(+62) 813-2505-8258', '(0271) 789-0200', '1996-02-29', 'img_profile/images-13.jpeg', 'toko terbaek nomer 4'),
('589263916', 'PR18905620', '', '', '', 'adjia7x@gmail.com', '', '', 0, '', '', '', '0000-00-00', 'img_profile/profile.jpg', ''),
('711029052', 'PR44314531', '', '', '', 'jos@jos.jos', '', '', 0, '', '', '', '0000-00-00', 'img_profile/blank.png', ''),
('781066894', 'PR96899318', '', '', '', 'gas@gas.com', 'Distro', 'solo', 0, 'Bibis Luhur, Nusukan, Kota Surakarta, Jawa Tengah, Indonesia', '', '', '0000-00-00', 'img_profile/images-15.jpeg', ''),
('809051513', 'PR17300397', '', '', '', 'asd@asd.asd', '', '', 0, '', '', '', '0000-00-00', 'img_profile/profile.jpg', ''),
('836608886', 'PR55413763', '', '', '', 'shoesbag15008@centro.co.id', '', '', 0, '', '', '', '0000-00-00', 'img_profile/profile.jpg', ''),
('91064453', 'PR86248693', '', '', '', 'prasetyoajiw@gmail.com', '', '', 0, '', '', '', '0000-00-00', 'img_profile/blank.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `app_seting`
--

CREATE TABLE `app_seting` (
  `RowID` char(50) NOT NULL,
  `RowRelation` char(50) DEFAULT NULL,
  `Value` varchar(250) DEFAULT NULL,
  `Desccription` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_seting`
--

INSERT INTO `app_seting` (`RowID`, `RowRelation`, `Value`, `Desccription`) VALUES
('f39bdff9-269c-11e8-a1e3-00ff40563bbb', '050019c6-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('f936602d-269c-11e8-a1e3-00ff40563bbb', '076b0b6d-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('fd96a7b8-269c-11e8-a1e3-00ff40563bbb', '0a428fc3-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('00ecbb30-269d-11e8-a1e3-00ff40563bbb', '0bbfeef2-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('04c9cf89-269d-11e8-a1e3-00ff40563bbb', '0d64798d-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('0abbda40-269d-11e8-a1e3-00ff40563bbb', '188dcdba-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('17ab7e36-269d-11e8-a1e3-00ff40563bbb', '1d1537d3-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('1951e982-269d-11e8-a1e3-00ff40563bbb', '1e8a645b-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('1c51edda-269d-11e8-a1e3-00ff40563bbb', '2051e6b3-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('1e08ea1e-269d-11e8-a1e3-00ff40563bbb', '21802a2f-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('2010acdb-269d-11e8-a1e3-00ff40563bbb', '228cd07d-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('257e43ce-269d-11e8-a1e3-00ff40563bbb', '23a6bc44-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('26bb442f-269d-11e8-a1e3-00ff40563bbb', '24c94ac2-2697-11e8-a1e3-00ff40563bbb', '1', 'menu'),
('281b1408-269d-11e8-a1e3-00ff40563bbb', '25f54c5a-2697-11e8-a1e3-00ff40563bbb', '1', 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` char(50) NOT NULL,
  `id_post` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `browser` varchar(250) NOT NULL,
  `device_name` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `feedback_date` datetime NOT NULL,
  `feedback_owner` varchar(500) NOT NULL,
  `feedback_owner_date` datetime NOT NULL,
  `read_for_owner` bit(1) NOT NULL,
  `block` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_reg` varchar(50) NOT NULL,
  `id_post` int(15) NOT NULL,
  `nama_foto` varchar(360) NOT NULL,
  `token` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_reg`, `id_post`, `nama_foto`, `token`) VALUES
('781066894', 68518, 'images2.jpg', '0.5234119911355501'),
('781066894', 64208, 'Desert.jpg', '0.42197549433938564'),
('781066894', 64208, 'Chrysanthemum.jpg', '0.0204358727182421'),
('781066894', 61453, 'Jellyfish.jpg', '0.6364624757289039'),
('781066894', 61453, 'Hydrangeas.jpg', '0.1989691511806555'),
('781066894', 61453, 'Koala.jpg', '0.22075911857499464'),
('781066894', 61453, 'Lighthouse.jpg', '0.2717842800427277'),
('781066894', 61453, 'Penguins.jpg', '0.5172960127781916'),
('781066894', 93637, 'Tulips.jpg', '0.5281590071878284'),
('781066894', 93637, 'P_20170807_173528_BF.jpg', '0.23342318953422492'),
('781066894', 93637, 'images3.png', '0.13822991515824867'),
('781066894', 62860, '27314_-_Dark_Blue_Velvet_Retro_(M,L)_-_Cheongsam_N', '0.38262710206305317'),
('781066894', 62860, '27314_-_Dark_Blue_Velvet_Retro_(M,L)_-_Cheongsam_N', '0.020053313141469298'),
('781066894', 62860, '27314_-_Dark_Blue_Velvet_Retro_(M,L)_-_Cheongsam_N', '0.9286743031545819'),
('781066894', 62860, '27314_-_Dark_Blue_Velvet_Retro_(M,L)_-_Cheongsam_N', '0.25100312050167695'),
('781066894', 6765, '27321_-_Gray_Knitted_Retro_-_Sweater_-_175_000,Woo', '0.9245434163845074'),
('781066894', 6765, '27321_-_Gray_Knitted_Retro_-_Sweater_-_175_000,Woo', '0.7479850831748964'),
('781066894', 6765, '27321_-_Gray_Knitted_Retro_-_Sweater_-_175_000,Woo', '0.3232699050709045'),
('781066894', 6765, '27321_-_Gray_Knitted_Retro_-_Sweater_-_175_000,Woo', '0.26913855000183884'),
('781066894', 42709, 'Tulips1.jpg', '0.4149769756612691'),
('781066894', 26077, 'profile.png', '0.3143348557728658'),
('781066894', 26077, 'images5.png', '0.05579502554110949'),
('781066894', 62167, 'Hydrangeas1.jpg', '0.4772081979114424'),
('781066894', 71728, 'Hydrangeas2.jpg', '0.7511159851680151'),
('781066894', 71728, 'Desert1.jpg', '0.8006154467592255'),
('781066894', 71728, 'Koala1.jpg', '0.7147230075574538'),
('781066894', 71728, 'Jellyfish2.jpg', '0.5361801914594484'),
('781066894', 71728, 'Lighthouse1.jpg', '0.6565434327387725'),
('781066894', 46804, 'Desert2.jpg', '0.0038464594702456445'),
('781066894', 46804, 'Chrysanthemum1.jpg', '0.7238484486621188'),
('781066894', 46804, 'Hydrangeas3.jpg', '0.19325949081985305'),
('781066894', 46804, 'Jellyfish3.jpg', '0.3257451933915456'),
('781066894', 46804, 'Koala2.jpg', '0.07696197459423693'),
('781066894', 58233, 'Tulips3.jpg', '0.7879444094387975'),
('781066894', 26077, '203120714.png', '0.437147731000344'),
('781066894', 83865, '203120715.png', '0.5099665102858233'),
('781066894', 42843, 'Chrysanthemum2.jpg', '0.21841647403017372'),
('781066894', 83660, 'Lighthouse2.jpg', '0.9353638389982499'),
('781066894', 48840, 'Koala3.jpg', '0.47647593992223136'),
('781066894', 74261, '175.jpg', '0.7490754007723082'),
('781066894', 77896, '1053223_556492854412802_1644052625_o.jpg', '0.17507612825313323'),
('781066894', 8355, 'Screenshot_2017-04-16-11-11-11.png', '0.7009596145759858'),
('781066894', 37460, 'Screenshot_2017-04-16-11-11-111.png', '0.8680629829000404'),
('781066894', 23565, 'images-3.png', '0.1678800811143113'),
('781066894', 65707, '1048260_556478281080926_271228267_o.jpg', '0.6050118875033743'),
('781066894', 65707, '1015763_556478261080928_250115770_o.jpg', '0.819758100583801'),
('781066894', 65707, '1052296_556492607746160_1080880065_o.jpg', '0.7107971962203687'),
('781066894', 65707, '1053223_556492854412802_1644052625_o1.jpg', '0.43987787882038476'),
('781066894', 65707, '1072150_556492004412887_592277851_o.jpg', '0.030785271169157857'),
('781066894', 30789, 'IMG_5397.JPG', '0.1277583442155017'),
('781066894', 85916, 'AIS_Logo_polos.png', '0.8833226374250793'),
('781066894', 83248, 'TTD_Pak_Hariyadi_-_Copy.jpg', '0.8604291888945166'),
('781066894', 25866, 'POMP.png', '0.6449818470754045'),
('781066894', 58963, '1520057228708.jpg', '0.4426513709310944'),
('781066894', 58804, '15200572287081.jpg', '0.05764336641188983'),
('781066894', 75329, '15200572287082.jpg', '0.3959995150115969'),
('781066894', 21948, '15200572287083.jpg', '0.8029151802504015');

-- --------------------------------------------------------

--
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `id_reg` int(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `browser` varchar(150) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `IP` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`id_reg`, `datetime`, `browser`, `OS`, `IP`) VALUES
(450378417, '0000-00-00 00:00:00', '', '', ''),
(450378417, '2017-09-16 16:31:11', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-16 16:36:00', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-16 17:29:14', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-16 17:30:23', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-16 17:30:56', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-16 17:36:33', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-16 17:54:41', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-17 05:30:52', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-17 05:38:26', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-17 05:41:00', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-17 11:35:43', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-17 11:55:44', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-17 11:56:05', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-18 05:17:12', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(433746337, '2017-09-18 10:09:19', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-19 04:05:19', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-19 07:43:46', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-19 11:13:14', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-19 15:21:56', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-19 15:24:27', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
(450378417, '2017-09-19 15:49:31', 'Chrome 61.0.3163.91', 'Windows 7', '::1'),
(433746337, '2017-09-19 15:58:00', 'Chrome 61.0.3163.91', 'Windows 7', '::1'),
(450378417, '2017-09-20 06:25:37', 'Chrome 61.0.3163.91', 'Windows 7', '::1'),
(450378417, '2017-09-22 05:44:21', 'Chrome 61.0.3163.91', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:06:57', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:07:11', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(433746337, '2017-09-23 17:09:45', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(433746337, '2017-09-23 17:09:55', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:21:07', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(2147483647, '2017-09-23 17:23:43', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:25:59', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:27:12', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:27:36', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:27:56', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-23 17:29:23', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(2147483647, '2017-09-23 18:27:12', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-26 04:42:08', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-26 06:26:24', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-26 06:29:45', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-26 06:36:07', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-26 08:14:16', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-27 03:59:47', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-27 04:26:11', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-28 07:01:23', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-09-28 08:42:39', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-10-03 15:17:22', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-10-04 12:49:23', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(589263916, '2017-10-04 13:49:36', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-04 14:20:08', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-05 05:51:36', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-10-05 05:58:48', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-05 05:59:06', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(836608886, '2017-10-05 06:08:46', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-10-05 06:09:14', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-05 06:34:08', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-10-05 07:26:52', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-05 14:35:41', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(450378417, '2017-10-06 04:38:13', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-06 06:32:44', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-06 16:58:04', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-07 06:47:53', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-07 13:51:57', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-08 12:48:14', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-09 09:09:34', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-09 09:45:14', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-09 09:56:04', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-10 14:39:58', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-11 05:44:19', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-11 12:23:25', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-11 15:06:42', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-12 07:58:30', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-12 13:41:18', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-13 06:15:41', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-13 11:49:55', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-17 13:59:30', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-18 05:21:45', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-18 08:13:26', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-18 15:36:28', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-19 12:40:58', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-20 04:05:42', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-20 08:54:25', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-22 07:55:02', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-23 07:01:18', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-25 14:48:47', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-26 06:17:09', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-26 14:13:15', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-26 14:31:57', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
(781066894, '2017-10-30 07:51:47', 'Chrome 34.0.1847.116', 'Windows 8.1', '::1'),
(781066894, '2017-10-30 23:22:25', 'Chrome 34.0.1847.116', 'Windows 8.1', '::1'),
(781066894, '2017-11-04 17:01:46', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-06 03:42:44', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-07 12:13:25', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-08 03:43:19', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-09 04:22:56', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-09 08:52:27', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-09 12:49:25', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-09 13:11:54', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-09 13:16:05', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(450378417, '2017-11-10 12:33:14', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(433746337, '2017-11-10 12:33:49', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-10 13:11:33', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-10 13:20:19', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(450378417, '2017-11-10 13:23:55', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-10 13:58:44', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-12 12:01:49', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-12 12:46:14', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-12 14:32:02', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-12 15:03:13', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-13 12:51:48', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-13 14:14:40', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-13 15:34:32', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-13 15:35:09', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-13 16:17:29', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 03:31:59', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 05:01:00', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 05:18:52', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 06:07:19', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 06:38:40', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 06:54:14', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 06:54:45', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-14 07:00:51', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 12:29:51', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 12:50:34', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 12:56:31', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:01:34', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:04:56', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:08:42', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:12:26', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:15:12', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:16:42', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:35:39', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:37:10', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 13:54:24', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 14:02:50', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 14:15:19', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 14:49:34', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 14:49:49', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 14:51:47', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 15:01:43', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-17 15:02:55', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 04:50:15', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:04:37', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:19:26', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:20:35', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:22:42', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:23:58', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:25:10', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:35:18', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-18 05:56:59', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
(781066894, '2017-11-19 12:57:21', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-19 13:30:08', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-21 04:31:11', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-21 07:31:58', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-21 07:46:29', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 01:27:42', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 01:35:06', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 01:45:05', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 01:59:29', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 02:17:54', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 16:29:55', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-22 16:42:35', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-23 01:25:03', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-23 11:28:17', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-24 14:31:26', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-24 14:35:22', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-26 04:07:09', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-29 12:29:13', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-29 13:42:50', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(781066894, '2017-11-30 05:12:21', 'Chrome 62.0.3202.94', 'Windows 10', '::1'),
(433746337, '2017-12-16 08:39:19', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(450378417, '2017-12-16 08:39:44', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(809051513, '2017-12-16 08:40:01', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-16 08:41:14', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-18 14:05:17', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-20 04:13:42', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-20 05:54:09', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-22 16:07:42', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-26 14:32:09', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(433746337, '2017-12-26 16:57:31', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2017-12-26 16:58:18', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2018-01-04 06:02:41', 'Chrome 63.0.3239.84', 'Windows 10', '::1'),
(781066894, '2018-01-24 15:44:18', 'Chrome 63.0.3239.132', 'Windows 10', '::1'),
(781066894, '2018-02-05 12:28:07', 'Chrome 63.0.3239.132', 'Windows 10', '::1'),
(781066894, '2018-02-08 13:36:17', 'Chrome 63.0.3239.132', 'Windows 10', '::1'),
(781066894, '2018-03-13 08:53:16', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
(781066894, '2018-03-16 09:20:11', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
(781066894, '2018-03-19 02:30:24', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
(781066894, '2018-03-19 05:19:05', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
(781066894, '2018-03-20 07:53:34', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
(91064453, '2018-03-20 08:55:36', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
(781066894, '2018-03-21 10:22:12', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `log_login_view`
-- (See below for the actual view)
--
CREATE TABLE `log_login_view` (
`id_reg` int(50)
,`datetime` datetime
,`browser` varchar(150)
,`OS` varchar(50)
,`IP` varchar(16)
,`user` varchar(50)
,`email` varchar(35)
);

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `id` char(35) NOT NULL,
  `id_post` varchar(35) NOT NULL,
  `ratFlag` bit(1) NOT NULL,
  `Ratting` int(5) NOT NULL,
  `user_ID` varchar(25) NOT NULL,
  `lastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id_reg` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `datetime_reg` datetime NOT NULL,
  `browser` varchar(25) NOT NULL,
  `OS` varchar(50) NOT NULL,
  `IP` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id_reg`, `user`, `email`, `pass`, `datetime_reg`, `browser`, `OS`, `IP`) VALUES
('1662624513748373', 'Prasetya Aji Wibowo Wibowo', '', '', '2017-11-14 05:17:36', 'Chrome 61.0.3163.100', 'Windows 10', '::1'),
('433746337', 'finance', 'finance15008@centro.co.id', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00 00:00:00', '', '', ''),
('450378417', 'prasetyo Aji', 'it15008@centro.co.id', 'e10adc3949ba59abbe56e057f20f883e', '2017-09-15 15:10:11', 'Chrome 60.0.3112.113', 'Windows 7', '::1'),
('589263916', 'tampan', 'adjia7x@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-04 13:46:16', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
('711029052', 'jos', 'jos@jos.jos', '7815696ecbf1c96e6894b779456d330e', '2018-03-20 08:58:04', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1'),
('781066894', 'GAS', 'gas@gas.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-04 14:16:36', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
('809051513', 'asfdkhj', 'asd@asd.asd', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-04 14:06:00', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
('836608886', 'hoes', 'shoesbag15008@centro.co.id', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-04 13:56:34', 'Chrome 61.0.3163.100', 'Windows 7', '::1'),
('91064453', 'aji', 'prasetyoajiw@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2018-03-20 08:54:44', 'Chrome 64.0.3282.186', 'Windows 8.1', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_reg` int(11) NOT NULL,
  `language` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_user`
--

CREATE TABLE `social_user` (
  `id_reg` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loggedin` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `social_user`
--

INSERT INTO `social_user` (`id_reg`, `oauth_provider`, `oauth_uid`, `name`, `picture_url`, `profile_url`, `loggedin`) VALUES
('781066894', 'Google+', '114260555341601691695', 'PrasetyoAji', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', 'https://plus.google.com/114260555341601691695', '1'),
('781066894', 'Instagram', '1585439475', '_ajiwibowo', 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/15624046_665829973587794_1450641804272599040_a.jpg', 'https://www.instagram.com/_ajiwibowo', '1'),
('781066894', 'facebook', '1662624513748373', 'Prasetya Aji Wibowo Wibowo', 'https://graph.facebook.com/1662624513748373/picture?width=50', 'https://www.facebook.com/1662624513748373', '1');

-- --------------------------------------------------------

--
-- Table structure for table `storetype`
--

CREATE TABLE `storetype` (
  `id` int(3) NOT NULL,
  `storetype` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `parent` varchar(3) NOT NULL,
  `active` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storetype`
--

INSERT INTO `storetype` (`id`, `storetype`, `class`, `parent`, `active`) VALUES
(1, 'None', 'fa fa-pie-chart', 'non', b'0'),
(2, 'Departement store', 'fa fa-bank', 'dep', b'0'),
(3, 'Customer good', 'fa fa-wheelchair', 'cus', b'0'),
(4, 'Minimarket', 'fa fa-shield', 'min', b'0'),
(5, 'Whole Sale', 'fa fa-home', 'whl', b'0'),
(6, 'Supermarket', 'fa fa-shield', 'spr', b'0'),
(7, 'Factory Outlet', 'fa fa-asterisk', 'fot', b'0'),
(8, 'Distro', 'glyphicon glyphicon-gift', 'dis', b'1'),
(9, 'food and beverage', 'fa fa-coffee', 'foo', b'1'),
(10, 'Hotels', 'fa fa-hotel', 'htl', b'0'),
(11, 'Travel', 'fa fa-suitcase', 'tra', b'0'),
(12, 'Electronic', 'fa fa-desktop', 'ele', b'0'),
(13, 'Book and office', 'fa fa-book', 'bof', b'0'),
(14, 'Education', 'fa fa-bookmark-o', 'edu', b'0'),
(15, 'Butiq', 'fa fa-cut', 'but', b'1'),
(16, 'Online Shop', 'fa fa-circle-o', 'oll', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(11) NOT NULL,
  `storetype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tag`, `storetype`) VALUES
(1, '0', 'Departement store'),
(2, '0', 'Departement store'),
(3, '0', 'Departement store'),
(4, '0', 'Departement store'),
(5, '0', 'Departement store'),
(6, '0', 'Departement store'),
(7, '0', 'Departement store'),
(8, '0', 'Departement store'),
(9, 'test', 'Departement store'),
(10, 'tag', 'Departement store'),
(11, 'population', 'Education'),
(12, 'test', ''),
(13, 'second', ''),
(14, 'population', ''),
(15, 'view', ''),
(16, 'tag', 'Education'),
(17, 'population', 'Education'),
(18, 'view', ''),
(19, 'asd', ''),
(20, 'GO', ''),
(21, 'test', 'Education'),
(22, 'faceboook', 'Education'),
(23, 'asd', 'Education');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tag_count`
-- (See below for the actual view)
--
CREATE TABLE `tag_count` (
`tag` varchar(11)
,`ct` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_reg` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `level` int(2) NOT NULL COMMENT '1. user,2. admin',
  `status` varchar(15) NOT NULL,
  `condition` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_reg`, `email`, `pass`, `level`, `status`, `condition`) VALUES
('1662624513748373', '', '', 1, 'Activated', 'offline'),
('433746337', 'finance15008@centro.co.id', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'offline'),
('450378417', 'it15008@centro.co.id', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'offline'),
('589263916', 'adjia7x@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'offline'),
('711029052', 'jos@jos.jos', '7815696ecbf1c96e6894b779456d330e', 1, 'Activated', ''),
('781066894', 'gas@gas.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'online'),
('809051513', 'asd@asd.asd', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'offline'),
('836608886', 'shoesbag15008@centro.co.id', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'offline'),
('91064453', 'prasetyoajiw@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'Activated', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `uservisit`
--

CREATE TABLE `uservisit` (
  `id` char(35) DEFAULT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `mac` varchar(50) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `Host_Name` varchar(50) DEFAULT NULL,
  `lastupdatetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uservisit`
--

INSERT INTO `uservisit` (`id`, `ip`, `mac`, `browser`, `Host_Name`, `lastupdatetime`) VALUES
('4813a7f9-2725-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-14 02:16:09'),
('6332f9e2-27ec-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-15 02:01:22'),
('71b009ef-28c6-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 04:02:14'),
('10407895-28ed-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 08:38:41'),
('a1558463-28ee-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 08:49:54'),
('44d85131-28ef-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 08:54:28'),
('8849f758-28ef-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 08:56:21'),
('a12ea74d-28ef-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 08:57:03'),
('ec097e5c-28ef-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 08:59:09'),
('38b9f60e-28f2-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 09:15:36'),
('d11bcb45-28f2-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-16 09:19:52'),
('b1b8e647-2b14-11e8-a1e3-00ff40563bb', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-19 02:27:22'),
('85d379f0-2c07-11e8-bd6f-00ffd5add8e', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-20 07:25:43'),
('8a8558dc-2c07-11e8-bd6f-00ffd5add8e', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-20 07:25:51'),
('64359432-2c0b-11e8-bd6f-00ffd5add8e', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-20 07:53:25'),
('5aa49547-2c14-11e8-bd6f-00ffd5add8e', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-20 08:57:34'),
('a6173282-2caa-11e8-bd6f-00ffd5add8e', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-21 02:53:23'),
('26ad99ce-2cea-11e8-bd6f-00ffd5add8e', '::1', '0', 'Chrome 64.0.3282.186', '0', '2018-03-21 10:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_pwd`
--

CREATE TABLE `user_pwd` (
  `name` char(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `pass` char(32) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user_pwd`
--

INSERT INTO `user_pwd` (`name`, `pass`) VALUES
('xampp', 'wampp');

-- --------------------------------------------------------

--
-- Table structure for table `ver_code`
--

CREATE TABLE `ver_code` (
  `ver_code` int(15) NOT NULL,
  `email` varchar(35) NOT NULL,
  `id_reg` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ver_code`
--

INSERT INTO `ver_code` (`ver_code`, `email`, `id_reg`, `status`) VALUES
(28381, 'adjia7x@gmail.com', '589263916', 'Activated'),
(120788, '', '1662624513748373', 'Activated'),
(624237, 'it15008@centro.co.id', '450378417', 'Activated'),
(677764, 'prasetyoajiw@gmail.com', '91064453', 'Activated'),
(701965, 'finance15008@centro.co.id', '433746337', 'Activated'),
(703979, 'asd@asd.asd', '809051513', 'Activated'),
(707031, 'jos@jos.jos', '711029052', 'Activated'),
(856781, 'gas@gas.com', '781066894', 'Activated'),
(973358, 'shoesbag15008@centro.co.id', '836608886', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `view_like_post`
--

CREATE TABLE `view_like_post` (
  `id` char(35) NOT NULL,
  `id_reg` varchar(50) NOT NULL,
  `id_post` int(15) NOT NULL,
  `view` int(11) NOT NULL,
  `like` int(11) NOT NULL,
  `user_ID` varchar(25) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_like_post`
--

INSERT INTO `view_like_post` (`id`, `id_reg`, `id_post`, `view`, `like`, `user_ID`, `date_time`) VALUES
('024b6347-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:49:35'),
('039b0b16-2b15-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-19 02:29:39'),
('1266a24b-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:56:01'),
('15b236fb-2ceb-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:34:38'),
('1a8de90f-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:50:16'),
('1e70ae19-2ceb-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:34:53'),
('25d1aae4-28c7-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:07:16'),
('33ea7e71-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:50:59'),
('3f45a406-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:51:18'),
('4311', '', 26077, 1, 0, '0', '2018-03-14 09:25:30'),
('43ac86f3-28f4-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 09:30:14'),
('494ae54e-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:57:33'),
('49d06d71-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:51:35'),
('4cb7faf1-2cea-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:29:01'),
('4de1fa2a-2ceb-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:36:12'),
('531c3c59-28c7-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:08:32'),
('53f84ebb-28f4-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 09:30:41'),
('547cc3a5-276e-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:59:03'),
('5571cdc4-2ceb-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:36:25'),
('57e8ca3e-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:51:59'),
('5b73938a-28cb-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:37:24'),
('62b12639-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:58:16'),
('6a3d0563-28cb-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:37:49'),
('70dbe483-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:58:39'),
('74976282-276e-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:59:57'),
('7761292f-28c7-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:09:33'),
('78f7b827-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:44:34'),
('7b7ba1bd-2ced-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:51:48'),
('7da941ac-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:59:01'),
('816a4cdb-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:44:48'),
('828546de-276e-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 11:00:20'),
('84306ee4-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:59:12'),
('85f7b390-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:53:16'),
('86b7c5c7-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:44:57'),
('8b7a6468-28c7-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:10:07'),
('8ca889db-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:45:07'),
('903e4363-276e-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 11:00:43'),
('92120ace-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:59:35'),
('97f1d492-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:53:46'),
('98032f70-276e-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 11:00:56'),
('99c5298f-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:59:48'),
('9fbc7342-276e-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 11:01:09'),
('a2aeafb2-276c-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:46:55'),
('ab109c14-276c-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:47:09'),
('b379aacc-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:46:12'),
('baebca5d-2ceb-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:39:15'),
('c0ff460b-2761-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 09:29:01'),
('c16173c8-28c7-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:11:37'),
('c28dd30a-28c6-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-16 04:04:30'),
('cef50a77-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:46:58'),
('d2fc46da-2ced-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:54:14'),
('d8362867-2cee-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 11:01:33'),
('e4a99015-276c-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:48:46'),
('ea3ecc05-276d-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:56:04'),
('eae47322-2ced-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:54:55'),
('f3d10858-276c-11e8-a1e3-00ff40563bb', '', 26077, 1, 0, '0', '2018-03-14 10:49:11'),
('f49279d4-2cea-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:33:42'),
('f79b5662-2ceb-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:40:57'),
('fa7627c2-2cec-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:48:11'),
('fdf4bd87-2ced-11e8-bd6f-00ffd5add8e', '', 21948, 1, 0, '0', '2018-03-21 10:55:27');

-- --------------------------------------------------------

--
-- Stand-in structure for view `_viewcount`
-- (See below for the actual view)
--
CREATE TABLE `_viewcount` (
`id_post` int(15)
,`view` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `log_login_view`
--
DROP TABLE IF EXISTS `log_login_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `log_login_view`  AS  select `log_login`.`id_reg` AS `id_reg`,`log_login`.`datetime` AS `datetime`,`log_login`.`browser` AS `browser`,`log_login`.`OS` AS `OS`,`log_login`.`IP` AS `IP`,`registration`.`user` AS `user`,`registration`.`email` AS `email` from (`log_login` join `registration`) where (`log_login`.`id_reg` = `registration`.`id_reg`) ;

-- --------------------------------------------------------

--
-- Structure for view `tag_count`
--
DROP TABLE IF EXISTS `tag_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tag_count`  AS  select `tag`.`tag` AS `tag`,count(0) AS `ct` from `tag` group by `tag`.`tag` ;

-- --------------------------------------------------------

--
-- Structure for view `_viewcount`
--
DROP TABLE IF EXISTS `_viewcount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `_viewcount`  AS  select `view_like_post`.`id_post` AS `id_post`,sum(`view_like_post`.`view`) AS `view` from `view_like_post` group by `view_like_post`.`id_post` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_menu`
--
ALTER TABLE `app_menu`
  ADD PRIMARY KEY (`RowID`);

--
-- Indexes for table `app_post`
--
ALTER TABLE `app_post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `app_profile`
--
ALTER TABLE `app_profile`
  ADD PRIMARY KEY (`id_reg`),
  ADD UNIQUE KEY `id_profile` (`id_profile`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `social_user`
--
ALTER TABLE `social_user`
  ADD PRIMARY KEY (`oauth_uid`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `user_pwd`
--
ALTER TABLE `user_pwd`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ver_code`
--
ALTER TABLE `ver_code`
  ADD PRIMARY KEY (`ver_code`);

--
-- Indexes for table `view_like_post`
--
ALTER TABLE `view_like_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
