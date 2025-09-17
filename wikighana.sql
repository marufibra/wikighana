-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2025 at 05:00 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikighana`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `chat_message` varchar(1000) NOT NULL,
  `timestamp` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `reply_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `user_id_from`, `user_id_to`, `chat_message`, `timestamp`, `status`, `reply_id`) VALUES
(309, 14, 20, 'g', '2025-03-08 16:54:36', 4, 0),
(310, 14, 20, 'w', '2025-03-08 16:55:28', 4, 0),
(311, 14, 20, 'd', '2025-03-08 16:58:22', 4, 0),
(312, 14, 20, 'd', '2025-03-08 16:58:48', 4, 0),
(305, 14, 20, 'Hi', '2025-03-08 16:47:53', 4, 0),
(304, 14, 20, 'GI', '2025-03-05 22:33:12', 4, 0),
(303, 14, 20, 'ALL IS WELL', '2025-03-05 22:32:52', 4, 0),
(302, 20, 14, '/img/profile-photo/20/39327.jpg', '2025-03-05 22:31:42', 4, 0),
(296, 14, 20, 's', '2025-03-05 22:25:06', 4, 0),
(297, 14, 20, 'g', '2025-03-05 22:26:22', 4, 0),
(298, 20, 14, 's', '2025-03-05 22:28:03', 4, 0),
(299, 14, 20, 'f', '2025-03-05 22:28:41', 4, 0),
(300, 14, 20, 'How are you doing?', '2025-03-05 22:29:37', 4, 0),
(301, 20, 14, 'HELP ME GOD', '2025-03-05 22:30:22', 4, 0),
(308, 14, 20, 't', '2025-03-08 16:51:34', 4, 0),
(307, 14, 20, '5', '2025-03-08 16:51:03', 4, 0),
(306, 14, 20, '/img/profile-photo/14/4938.jpg', '2025-03-08 16:48:44', 4, 0),
(295, 14, 20, 'a', '2025-03-05 22:21:55', 4, 0),
(294, 14, 20, 'd', '2025-03-03 08:46:21', 4, 0),
(293, 20, 14, 'hi', '2025-03-01 21:08:01', 4, 0),
(292, 14, 20, 'ALL IS GOODðŸ˜‰', '2025-03-01 21:00:14', 4, 290),
(291, 14, 20, 'HELP GOD', '2025-03-01 20:59:20', 4, 0),
(290, 14, 20, '/img/profile-photo/14/15084.jpg', '2025-03-01 15:18:15', 4, 0),
(275, 14, 20, 'd', '2025-03-01 10:05:01', 4, 0),
(276, 14, 20, '333', '2025-02-20 12:26:07', 4, 0),
(277, 14, 20, 'abcd', '2025-02-20 12:26:07', 4, 0),
(278, 14, 20, '', '2025-03-01 10:16:49', 4, 0),
(279, 14, 20, '/img/profile-photo/14/53632.jpg', '2025-03-01 10:17:31', 4, 0),
(280, 14, 20, '/img/profile-photo/14/11358.jpg', '2025-03-01 10:20:53', 4, 0),
(281, 14, 20, '/img/profile-photo/14/24135.jpg', '2025-03-01 13:39:34', 4, 0),
(282, 14, 20, '/img/profile-photo/14/8398.jpg', '2025-03-01 13:41:30', 4, 0),
(283, 14, 20, '/img/profile-photo/14/51678.jpg', '2025-03-01 13:46:02', 4, 0),
(284, 14, 20, 'd', '2025-03-01 13:50:05', 4, 0),
(285, 14, 20, '/img/profile-photo/14/87640.jpg', '2025-03-01 13:50:12', 4, 0),
(286, 14, 20, '/img/profile-photo/14/8514.jpg', '2025-03-01 13:51:09', 4, 0),
(287, 14, 20, 'hi', '2025-03-01 14:05:12', 4, 286),
(288, 20, 14, 'hey man', '2025-03-01 15:04:55', 4, 0),
(289, 14, 20, '566', '2025-03-01 15:18:07', 4, 286),
(313, 14, 20, 'd', '2025-03-08 16:59:00', 4, 0),
(314, 14, 20, '/img/profile-photo/14/9038.jpg', '2025-03-08 17:01:57', 4, 0),
(315, 14, 20, '/img/profile-photo/14/32657.jpg', '2025-03-08 17:02:32', 4, 0),
(316, 14, 20, '/img/profile-photo/14/41574.jpg', '2025-03-08 17:05:04', 4, 0),
(317, 14, 20, '/img/profile-photo/14/34721.jpg', '2025-03-08 17:06:01', 4, 0),
(318, 14, 20, '5', '2025-03-08 17:14:01', 4, 0),
(319, 14, 20, '/img/profile-photo/14/73415.jpg', '2025-03-08 17:14:09', 4, 0),
(320, 14, 20, 'img/profile-photo/14/81747.jpg', '2025-03-08 20:16:09', 4, 0),
(321, 14, 20, 'f', '2025-03-08 20:20:35', 4, 0),
(322, 14, 20, 'img/profile-photo/14/21480.jpg', '2025-03-08 20:21:13', 4, 0),
(323, 14, 20, 'd', '2025-03-08 20:22:22', 4, 0),
(324, 14, 20, 's', '2025-03-08 20:27:24', 4, 0),
(325, 14, 20, 's', '2025-03-08 20:28:22', 4, 322),
(326, 14, 20, 'd', '2025-03-08 20:29:22', 4, 0),
(327, 14, 20, 'd', '2025-03-08 20:31:20', 4, 322),
(328, 14, 20, 'd', '2025-03-09 15:05:30', 4, 0),
(329, 14, 20, 's', '2025-03-09 15:06:54', 4, 0),
(330, 14, 20, 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2025-03-09 15:07:15', 4, 0),
(331, 14, 20, 's', '2025-03-09 15:09:14', 4, 0),
(332, 14, 20, 's', '2025-03-09 15:09:39', 4, 0),
(333, 14, 20, 'e', '2025-03-09 15:12:27', 4, 0),
(334, 14, 20, 'dfdðŸ˜¯fvðŸ˜©', '2025-03-09 16:11:47', 4, 0),
(335, 20, 14, 'd', '2025-03-09 16:39:54', 4, 334),
(336, 14, 20, 'h', '2025-03-09 16:40:47', 4, 0),
(337, 20, 14, '2', '2025-03-09 16:41:06', 4, 0),
(338, 14, 20, '3', '2025-03-09 16:41:16', 4, 0),
(339, 14, 20, 'hello', '2025-03-09 16:42:05', 4, 0),
(340, 20, 14, 'hi', '2025-03-09 16:42:13', 4, 0),
(341, 20, 14, 'how r u', '2025-03-09 16:42:25', 4, 0),
(342, 14, 20, 'hi', '2025-03-09 16:43:56', 4, 0),
(343, 20, 14, 'hey', '2025-03-09 16:44:05', 4, 0),
(344, 14, 20, 'hy', '2025-03-09 16:44:14', 4, 0),
(345, 20, 14, 'hi', '2025-03-09 16:44:25', 4, 0),
(346, 14, 20, 'hi', '2025-03-09 16:44:38', 4, 0),
(347, 14, 20, 'go', '2025-03-09 16:44:52', 4, 0),
(348, 20, 14, '3', '2025-03-09 16:45:08', 4, 0),
(349, 20, 14, 'whats up', '2025-03-09 16:45:27', 4, 0),
(350, 14, 20, 'hi', '2025-03-09 16:48:56', 4, 0),
(351, 20, 14, 'h', '2025-03-09 16:49:19', 4, 0),
(352, 14, 20, 'v', '2025-03-09 16:49:28', 4, 0),
(353, 20, 14, 't', '2025-03-09 16:50:08', 4, 0),
(354, 14, 20, 'w', '2025-03-09 16:50:24', 4, 0),
(355, 14, 20, 'e', '2025-03-09 16:50:34', 4, 0),
(356, 20, 14, 'r', '2025-03-09 16:50:48', 4, 0),
(357, 20, 14, 't', '2025-03-09 16:50:59', 4, 0),
(358, 20, 14, 'u', '2025-03-09 16:51:17', 4, 0),
(359, 14, 20, 'e', '2025-03-09 16:51:27', 4, 0),
(360, 14, 20, 'ok', '2025-03-09 16:51:46', 4, 0),
(361, 20, 14, 'h', '2025-03-09 16:52:15', 4, 0),
(362, 20, 14, 'm', '2025-03-09 16:52:40', 4, 0),
(363, 20, 14, '4', '2025-03-09 16:54:08', 4, 0),
(364, 20, 14, 'i', '2025-03-09 16:58:31', 4, 0),
(365, 14, 20, '2', '2025-03-09 16:58:44', 4, 0),
(366, 20, 14, '2', '2025-03-09 16:59:01', 4, 0),
(367, 20, 14, 'hi', '2025-03-09 17:00:22', 4, 0),
(368, 14, 20, 'g', '2025-03-09 17:00:36', 4, 0),
(369, 20, 14, 't', '2025-03-09 17:01:04', 4, 0),
(370, 20, 14, '2', '2025-03-09 17:08:45', 4, 0),
(371, 14, 20, 'hi', '2025-03-09 17:17:14', 4, 0),
(372, 20, 14, 'he', '2025-03-09 17:24:11', 4, 0),
(373, 20, 14, 'k', '2025-03-09 17:34:38', 4, 0),
(374, 20, 14, 'ppppppppppppppppppppppppppppppppppppppppppppppppppppp', '2025-03-09 17:34:58', 4, 0),
(375, 14, 20, 'd', '2025-03-09 19:50:41', 4, 0),
(376, 20, 14, '1', '2025-03-09 20:06:56', 4, 0),
(377, 20, 14, '2', '2025-03-09 20:07:12', 4, 0),
(378, 20, 14, '9', '2025-03-09 20:09:54', 4, 0),
(379, 20, 14, '5', '2025-03-09 20:11:53', 4, 0),
(380, 20, 14, 'pppp', '2025-03-09 20:12:13', 4, 0),
(381, 20, 14, 'lll', '2025-03-09 20:12:59', 4, 0),
(382, 20, 14, 'rt', '2025-03-09 20:17:13', 4, 0),
(383, 20, 14, 'y', '2025-03-09 20:18:59', 4, 0),
(384, 20, 14, 'd', '2025-03-09 20:23:36', 4, 0),
(385, 20, 14, 's', '2025-03-09 20:23:48', 4, 0),
(386, 14, 20, 'g', '2025-03-09 20:24:01', 4, 0),
(387, 20, 14, 'h', '2025-03-09 20:25:38', 4, 0),
(388, 20, 14, '5', '2025-03-09 20:37:39', 4, 0),
(389, 20, 14, '4', '2025-03-09 20:40:34', 4, 0),
(390, 20, 14, '9', '2025-03-09 20:40:52', 4, 0),
(391, 20, 14, 's', '2025-03-09 20:41:46', 4, 0),
(392, 20, 14, 'y', '2025-03-09 20:44:12', 4, 0),
(393, 20, 14, 't', '2025-03-09 20:44:19', 4, 392),
(394, 20, 14, '9', '2025-03-09 20:45:37', 4, 0),
(395, 14, 20, 'f', '2025-03-09 20:45:51', 4, 0),
(396, 20, 14, 'Hello world', '2025-03-09 21:07:28', 4, 0),
(397, 14, 20, 'hi', '2025-03-09 21:09:25', 4, 0),
(398, 20, 14, 'hj', '2025-03-09 21:13:41', 4, 0),
(399, 14, 20, 'h', '2025-03-09 21:14:10', 4, 0),
(400, 20, 14, 'f', '2025-03-09 21:19:09', 4, 0),
(401, 14, 20, 'gh', '2025-03-09 21:19:23', 4, 0),
(402, 20, 14, 'y', '2025-03-09 21:26:42', 4, 0),
(403, 14, 20, 'k', '2025-03-09 21:26:54', 4, 0),
(404, 20, 14, 't', '2025-03-09 21:28:49', 4, 0),
(405, 20, 14, 'r', '2025-03-09 21:31:30', 4, 0),
(406, 14, 20, 'f', '2025-03-09 21:36:10', 4, 0),
(407, 14, 20, 't', '2025-03-09 21:36:43', 4, 0),
(408, 20, 14, 't', '2025-03-09 21:37:05', 4, 0),
(409, 20, 14, 't', '2025-03-09 21:39:27', 4, 0),
(410, 20, 14, 'h', '2025-03-09 21:39:59', 4, 0),
(411, 20, 14, 'iop', '2025-03-09 21:40:57', 4, 0),
(412, 20, 14, 'uj', '2025-03-09 21:41:19', 4, 0),
(413, 14, 20, 'rt', '2025-03-09 21:42:00', 4, 0),
(414, 20, 14, '6', '2025-03-09 21:42:59', 4, 0),
(415, 20, 14, 'j', '2025-03-09 21:45:55', 4, 0),
(416, 20, 14, 'k', '2025-03-09 21:46:00', 4, 0),
(417, 14, 20, 'io', '2025-03-09 21:46:10', 4, 0),
(418, 14, 20, 'po', '2025-03-09 21:46:20', 4, 0),
(419, 20, 14, 't', '2025-03-10 10:44:39', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comment_reaction`
--

CREATE TABLE `comment_reaction` (
  `reaction_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_reaction`
--

INSERT INTO `comment_reaction` (`reaction_id`, `comment_id`, `user_id`, `type`, `content_id`) VALUES
(210, 234, 10, 1, 116),
(136, 233, 10, 1, 116),
(209, 239, 9, 1, 116),
(165, 235, 10, 2, 116),
(52, 233, 9, 2, 116),
(213, 238, 10, 2, 116),
(208, 239, 10, 2, 116),
(123, 234, 9, 1, 116),
(193, 236, 10, 1, 116),
(116, 235, 9, 1, 116),
(211, 237, 10, 2, 116),
(214, 222, 10, 1, 116),
(212, 237, 9, 2, 116);

-- --------------------------------------------------------

--
-- Table structure for table `content_reaction`
--

CREATE TABLE `content_reaction` (
  `reaction_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_reaction`
--

INSERT INTO `content_reaction` (`reaction_id`, `content_id`, `user_id`, `type`) VALUES
(2, 116, 4, 1),
(3, 116, 2, 1),
(4, 116, 7, 1),
(117, 116, 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dating_images`
--

CREATE TABLE `dating_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  `is_profile` int(1) DEFAULT NULL,
  `is_cover` int(1) DEFAULT NULL,
  `uploaded_date_time` datetime NOT NULL,
  `updated_date_time_profile` datetime NOT NULL,
  `updated_date_time_cover` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dating_images`
--

INSERT INTO `dating_images` (`id`, `user_id`, `img_path`, `is_profile`, `is_cover`, `uploaded_date_time`, `updated_date_time_profile`, `updated_date_time_cover`) VALUES
(11, 14, '/img/profile-photo/14/rawlings and zenator.jpg', 1, 0, '2025-02-09 10:30:50', '2025-02-09 12:09:12', '2025-02-09 11:51:57'),
(35, 14, 'https://wikighana.com/img/profile-photo/14/39653.jpg', 0, 0, '2025-03-17 12:53:49', '2025-03-17 12:53:49', '2025-03-17 12:53:49'),
(30, 14, '/img/profile-photo/14/55812.jpg', 0, 1, '2025-03-01 20:54:37', '2025-03-01 20:54:37', '2025-03-06 21:20:04'),
(33, 14, '/img/profile-photo/14/60638.jpg', 0, 0, '2025-03-11 06:12:38', '2025-03-11 06:12:38', '2025-03-11 06:12:38'),
(15, 20, '/img/profile-photo/20/1.jpg', 1, 0, '2025-02-09 10:30:50', '2025-02-09 12:09:12', '2025-02-09 11:51:57'),
(16, 6, '/img/profile-photo/6/1.jpg', 1, 0, '2025-02-09 10:30:50', '2025-02-09 12:09:12', '2025-02-09 11:51:57'),
(17, 11, '/img/profile-photo/11/1.jpg', 1, 0, '2025-02-09 10:30:50', '2025-02-09 12:09:12', '2025-02-09 11:51:57'),
(29, 14, '/img/profile-photo/14/74814.jpg', 0, 1, '2025-03-01 20:54:25', '2025-03-01 20:54:25', '2025-03-06 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `fcm_token`
--

CREATE TABLE `fcm_token` (
  `id` int(11) NOT NULL,
  `token` varchar(1000) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcm_token`
--

INSERT INTO `fcm_token` (`id`, `token`, `registration_date`) VALUES
(7, 'fcKSKtHEW81Jj6qyh3sZUi:APA91bFBPBMXO5NiVIaf-plcCPM2NkrdM80egFK7lT1LlRcTUGeFwHrLc44Durjw265OsojKs6zNYT1wIz-T8zdCgE7Bsd3HfDFLBrPh58IBGhmDdYtKvBw', '2025-03-04 17:17:38'),
(6, 'f4CqqNIqqhoXRFSTqboRdR:APA91bEkXQvUTDI5DFCYp-6mmDJjxihyHMsmTd2dKRhK8g_FUklNsh7MQHDdKGiEm5Bayhkf7mQ-Dm_W1F5LUA7Uz_Exff1lJ9UbR5xS72SaEYFO6A5PBu8', '2024-12-13 11:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES
(1, 14, '2025-04-16 08:26:00'),
(2, 6, '2025-02-19 17:32:49'),
(3, 11, '2025-02-18 14:52:49'),
(4, 20, '2025-03-24 21:57:27'),
(5, 23, '2025-03-06 14:26:59'),
(6, 43, '2025-03-08 11:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `display_order` int(100) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `icon` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`category_id`, `category_name`, `display_order`, `url`, `icon`) VALUES
(1, 'Home', 1, '', '<i class="bi bi-house-door"></i>'),
(2, 'News', 2, 'news.php', '<i class="bi bi-megaphone"></i>'),
(3, 'Politics', 3, 'politics.php', '<i class="bi bi-bank"></i>'),
(4, 'World', 9, 'world.php', '<i class=\'bi bi-globe\'></i>'),
(5, 'Videos', 8, 'trending-videos.php', '<i class=\'bi bi-play-circle\'></i>'),
(6, 'Entertainment', 6, 'entertainment.php', '<i class=\'bi bi-music-note-beamed\'></i>'),
(7, 'Sports', 7, 'sports.php', '<i class=\'fa fa-futbol-o\' aria-hidden=\'true\'></i>'),
(20, 'Education', 10, 'education.php', '<i class="bi bi-book"></i>'),
(21, 'Equality/Human Rights', 9, 'equality-human-right.php', NULL),
(10, 'Social Issues', 5, 'social-issues.php', '<i class="bi bi-hospital"></i>'),
(11, 'Romantic Relationship', 11, 'romantic-relationship.php', NULL),
(12, 'Family/Friends', 12, 'family-friends.php', NULL),
(13, 'Recreation/Hobbies', 13, 'recreation-hobbies.php', NULL),
(14, 'Work/Labour', 13, 'work.php', NULL),
(15, 'Identity/Appearance', 15, 'identity-appearance.php', NULL),
(16, 'Food', 16, 'food.php', NULL),
(17, 'Environmental Issue', 16, 'environment-issue.php', NULL),
(18, 'History', 17, 'history.php', NULL),
(19, 'Health', 19, 'health.php', NULL),
(8, 'Shop', 9, 'shop.php', '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'),
(9, 'Dating', 10, 'dating.php', '<i class=\'bi bi-heart-fill\'></i>'),
(24, 'Business', 5, 'business.php', '<i class="bi bi-building"></i>'),
(25, 'People And Places', 24, 'people-places.php', '<i class="bi bi-people"></i>'),
(26, 'Opinion', 5, 'opinion.php', '<i class="bi bi-tropical-storm"></i>'),
(28, 'Crime', 4, 'crime.php', '<i class="bi bi-emoji-tear"></i>'),
(29, 'Science/Technology', 5, 'science-technology.php', '<i class="bi bi-airplane"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `news_comment`
--

CREATE TABLE `news_comment` (
  `comment_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `comment` varchar(3000) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment_sender_name` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_comment`
--

INSERT INTO `news_comment` (`comment_id`, `content_id`, `comment`, `parent_comment_id`, `comment_sender_name`, `date_time`, `user_id`) VALUES
(236, 116, 'Hello', 0, 'Emmanuel', '2024-11-13 15:30:41', 9),
(226, 116, 'Hello world', 0, 'Hello', '2024-11-12 08:58:30', 0),
(235, 116, 'ss', 0, 'Emmanuel', '2024-11-12 16:53:47', 9),
(234, 116, 'Hello', 0, 'Ama', '2024-11-12 09:36:44', 0),
(224, 116, 'hello', 223, 'Hi', '2024-11-12 08:54:04', 0),
(225, 116, 'Hello world', 0, 'Hello', '2024-11-12 08:58:26', 0),
(223, 116, 'Hi', 0, 'Hi', '2024-11-12 08:53:01', 0),
(222, 116, 'hi man', 0, 'Hello world', '2024-11-10 20:50:17', 0),
(248, 134, 'HELP OH GOD', 245, 'kofi23', '2025-02-22 20:16:13', 23),
(237, 116, 'hi', 235, 'Emmanuel', '2024-11-13 15:41:22', 9),
(227, 116, 'hi', 0, 'hi', '2024-11-12 09:03:04', 0),
(228, 116, 'hi', 0, 'hi', '2024-11-12 09:03:06', 0),
(229, 116, 'hello', 0, 'Hi', '2024-11-12 09:15:07', 0),
(230, 116, 'd', 0, 'Hi', '2024-11-12 09:31:58', 0),
(231, 116, 'd', 0, 'Hi', '2024-11-12 09:31:59', 0),
(232, 116, 'd', 0, 'Hi', '2024-11-12 09:32:00', 0),
(233, 116, 'd', 0, 'Hi', '2024-11-12 09:33:44', 0),
(246, 134, 'Hey Maruf_Visitor', 245, 'Musah523', '2025-02-22 19:01:04', 20),
(247, 134, 'not signed in', 245, 'Joyce', '2025-02-22 19:10:03', 0),
(245, 134, 'Hello world', 0, 'Maruf_Visitor', '2025-02-22 19:00:26', 14),
(244, 124, 'God is Good', 0, 'hello', '2024-11-19 12:39:57', 0),
(243, 116, 'Hello Chris', 242, 'patrick', '2024-11-15 08:07:58', 11),
(242, 116, 'hi', 241, 'chris24', '2024-11-14 18:59:10', 10),
(241, 116, 'hi', 239, 'Emmanuel', '2024-11-14 16:47:36', 9),
(239, 116, 'God help me', 0, 'chris24', '2024-11-14 11:04:17', 10),
(240, 116, 'hi', 237, 'chris24', '2024-11-14 16:05:07', 10),
(238, 116, 'Hello world', 0, 'chris24', '2024-11-14 11:03:41', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news_content`
--

CREATE TABLE `news_content` (
  `content_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `content` varchar(20000) NOT NULL,
  `status` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `written_date_time` datetime NOT NULL,
  `submit_date_time` datetime DEFAULT NULL,
  `publish_date_time` datetime DEFAULT NULL,
  `last_update` datetime DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `headline` tinyint(1) DEFAULT NULL,
  `news_or_article` int(1) DEFAULT NULL,
  `top_story` int(1) DEFAULT NULL,
  `img_id` int(11) DEFAULT NULL,
  `category_headline` int(1) DEFAULT NULL,
  `category_top_story` int(1) DEFAULT NULL,
  `is_video_attached` int(1) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_content`
--

INSERT INTO `news_content` (`content_id`, `category_id`, `subject`, `content`, `status`, `user_id`, `written_date_time`, `submit_date_time`, `publish_date_time`, `last_update`, `source`, `headline`, `news_or_article`, `top_story`, `img_id`, `category_headline`, `category_top_story`, `is_video_attached`, `keywords`, `author`) VALUES
(132, 6, 'Hello World', 'This webpage requires data that you entered earlier in order to be properly displayed. You can send this data again, but by doing so you will repeat any action this page previously performed.\r\nPress the reload button to resubmit the data needed to load the page.\r\nERR_CACHE_MISS\r\n\r\nThis webpage requires data that you entered earlier in order to be properly displayed. You can send this data again, but by doing so you will repeat any action this page previously performed.\r\nPress the reload button to resubmit the data needed to load the page.\r\nERR_CACHE_MISS\r\n\r\n<a href="https://3news.com/wp-content/uploads/2024/11/Wanderlust.jpg"><img src="https://3news.com/wp-content/uploads/2024/11/Wanderlust.jpg"></a>\r\n\r\nThis webpage requires data that you entered earlier in order to be properly displayed. You can send this data again, but by doing so you will repeat any action this page previously performed.\r\nPress the reload button to resubmit the data needed to load the page.\r\nERR_CACHE_MISS\r\n\r\nThis webpage requires data that you entered earlier in order to be properly displayed. You can send this data again, but by doing so you will repeat any action this page previously performed.\r\nPress the reload button to resubmit the data needed to load the page.\r\nERR_CACHE_MISS', 1, 43, '2024-11-29 12:25:45', NULL, '2024-11-29 12:48:51', '2024-11-29 12:25:45', '', 0, 1, 0, 23, 0, 1, 0, '', NULL),
(133, 3, 'famaa', 'dmdkf', 1, 43, '2024-11-29 16:33:29', NULL, '2024-11-29 16:33:33', '2024-11-29 16:33:29', '', 0, 1, 0, 0, 0, 1, 0, '', NULL),
(134, 3, 'fdvf', 'Click here to activate your account or copy and paste the link below into your address bar.\r\nhttp://wikighana.com/login.php?id=4&pass_code=DfXvndtbUcSisIPJEBhgH3CZMzOkpkGLoem5V6RwQ2Y1x9F8TaK4yWu0NlrAg7\r\nThank you\r\nClick here to activate your account or copy and paste the link below into your address bar.\r\nhttp://wikighana.com/login.php?id=4&pass_code=DfXvndtbUcSisIPJEBhgH3CZMzOkpkGLoem5V6RwQ2Y1x9F8TaK4yWu0NlrAg7\r\nThank you\r\n\r\n<iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fweb.facebook.com%2Fmethtical07%2Fvideos%2F969879831629934%2F&show_text=false&width=314&t=0" width="314" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>\r\n\r\nClick here to activate your account or copy and paste the link below into your address bar.\r\nhttp://wikighana.com/login.php?id=4&pass_code=DfXvndtbUcSisIPJEBhgH3CZMzOkpkGLoem5V6RwQ2Y1x9F8TaK4yWu0NlrAg7\r\nThank youClick here to activate your account or copy and paste the link below into your address bar.\r\nhttp://wikighana.com/login.php?id=4&pass_code=DfXvndtbUcSisIPJEBhgH3CZMzOkpkGLoem5V6RwQ2Y1x9F8TaK4yWu0NlrAg7\r\nThank you\r\n\r\n<a href="https://3news.com/wp-content/uploads/2024/11/WhatsApp-Image-2024-11-29-at-09.29.43.jpeg"><img src="https://3news.com/wp-content/uploads/2024/11/WhatsApp-Image-2024-11-29-at-09.29.43.jpeg"></a>\r\n\r\nClick here to activate your account or copy and paste the link below into your address bar.\r\nhttp://wikighana.com/login.php?id=4&pass_code=DfXvndtbUcSisIPJEBhgH3CZMzOkpkGLoem5V6RwQ2Y1x9F8TaK4yWu0NlrAg7\r\nThank you', 1, 43, '2024-11-29 19:26:45', NULL, '2024-11-30 18:27:47', '2024-11-30 18:27:26', '', 0, 1, 0, 24, 0, 1, 1, '', NULL),
(135, 26, 'fdf', 'dfff', 1, 43, '2024-11-30 21:16:24', NULL, '2024-11-30 21:16:26', '2024-11-30 21:16:24', '', 0, 0, 0, 0, 1, 1, 0, '', NULL),
(136, 26, 'dfcv', 'ccc', 1, 43, '2024-11-30 21:35:43', NULL, '2024-11-30 21:35:47', '2024-11-30 21:35:43', '', 0, 1, 0, 0, 0, 1, 0, '', NULL),
(126, 27, 'This is general news', 'content general news', 1, 43, '2024-11-28 08:44:10', NULL, '2024-11-28 08:44:12', '2024-11-28 08:44:10', 'Unknown', 0, 1, 1, 21, 1, 1, 0, '', NULL),
(127, 27, 'Category top story', 'abc', 1, 43, '2024-11-28 09:55:15', NULL, '2024-11-28 10:47:23', '2024-11-28 09:55:15', '', 0, 1, 0, 0, 0, 1, 0, '', NULL),
(128, 3, 'sdas', 'sdsd', 1, 43, '2024-11-28 11:06:51', NULL, '2024-11-28 11:06:55', '2024-11-28 11:06:51', '', 0, 1, 0, 0, 1, 1, 0, '', NULL),
(129, 27, 'Hello', 'Hello world', 1, 43, '2024-11-28 13:22:29', NULL, '2024-11-28 19:24:10', '2024-11-28 13:22:29', '', 0, 1, 1, 0, 1, 1, 1, '', NULL),
(130, 27, 'abced', 'hello world', 1, 43, '2024-11-28 19:19:51', NULL, '2024-11-28 19:19:53', '2024-11-28 19:19:51', '', 1, 1, 1, 0, 1, 1, 1, '', NULL),
(131, 27, 'ldkifm', 'kddf', 1, 43, '2024-11-28 19:21:39', NULL, '2024-11-28 19:21:57', '2024-11-28 19:21:39', '', 0, 1, 1, 0, 1, 1, 1, '', NULL),
(117, 25, 'tyfg', '5fvff dd <a href=\'hello\'>m</a>', 1, 35, '2024-11-10 14:38:33', NULL, '2024-11-16 17:31:42', '2024-11-10 19:23:09', '', 1, 1, 0, 0, 0, 0, 0, 'a,b,c', NULL),
(121, 3, 'fgv', 'dvxff', 1, 35, '2024-11-19 08:25:32', NULL, '2024-11-19 08:26:18', '2024-11-19 08:25:32', '', 0, 1, 1, 0, 0, 0, 0, '', NULL),
(122, 3, 's', 'sds', 1, 35, '2024-11-19 08:27:34', NULL, '2024-11-19 08:27:37', '2024-11-19 08:27:34', '', 1, 1, 0, 0, 1, 1, 0, '', NULL),
(123, 3, 'dfs', 'dfscc', 2, 35, '2024-11-19 08:28:39', NULL, '2024-11-19 08:28:41', '2024-11-19 08:28:39', '', 1, 1, 1, 0, 1, 1, 0, '', NULL),
(124, 7, 'fdd', 'fdcc', 1, 35, '2024-11-19 09:45:25', NULL, '2024-11-19 09:45:27', '2024-11-19 09:45:25', '', 0, 1, 1, 0, 1, 1, 0, '', NULL),
(125, 3, 'Even if you are a flagbearer and your are appointed EC chair, you canâ€™t do anything â€“ Bossman Asare', 'A Deputy Commissioner at the Electoral Commission (EC) in charge of corporate services, Dr Bossman Asare, has allayed fears that the election results will be tampered with by the officials of the commission who are perceived to be politically exposed.\r\n\r\n<img src="http://localhost/img/43/DrBossman.jpeg">\r\n\r\nHe argues that given the structures at the commission and how the electoral system works, no one can interfere with the process.\r\n\r\nA Deputy Commissioner at the Electoral Commission (EC) in charge of corporate services, Dr Bossman Asare, has allayed fears that the election results will be tampered with by the officials of the commission who are perceived to be politically exposed.\r\n\r\nHe argues that given the structures at the commission and how the electoral system works, no one can interfere with the process.\r\n\r\nâ€œEven if you are a flagbearer, and you are appointed chair there is nothing you can do,â€ he said in an interview on TV3 on Monday, November 25.\r\n\r\n<strong>Hello World</strong>\r\n\r\nHe explained that â€œall the electoral processes, we go through them with the parties, the parties are expected, by law to bring their agents at the polling centres. During the compilation of the register, all the parties were required to send their agents there.\r\n\r\nâ€œCounting of the ballot is also done in the full glare of the media and everyone and so there is nothing anyone can do to influence the outcome of the elections, the parties know this.â€\r\n\r\nRegarding the special voting, Dr Bossman Asare told all persons partaking in the exercise to endeavour to do so on the designated date because their names will not appear on the voter register during the main elections on December 7.\r\n\r\nHe reminded them that the Special Voting, which forms part of the conduct of the 2024 general elections, will be held on December 2.\r\n\r\n<iframe width="100%" height="500px" src="https://www.youtube.com/embed/vMLk_T0PPbk?si=SoBwh5B6CYmb0RhQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>\r\n\r\nHe says 328 voting centres have been designated for this exercise.\r\n\r\nDr Bossman Asare said no constituency will have more than 750 people. Centres with more than that figure have been divided.\r\n\r\nâ€œSpecial voting will take place on December 2 at 328 centres,â€ he stressed.\r\n\r\nHe added â€œIf you are a special voter, go and vote on December 2, if you donâ€™t vote on that day, your name will not be on the register on December 7,â€ he said.\r\n\r\nThe special voting arrangement is intended to accommodate voters who will be performing election-related duties on the main polling day.\r\n\r\nIt includes personnel from the Ghana Armed Forces, National Intelligence Bureau (NIB), National Security, Ghana Immigration Service, Ghana National Fire Service, and Information Services Department.\r\n\r\nAdditionally, it includes members of the National Ambulance Service, Customs Division of the Ghana Revenue Authority, Prisons Service, Ghana Journalists Association, Ghana Police Service, and the National Media Commission.\r\n\r\nThis early voting ensures that these individuals can exercise their right to vote without conflicting with their professional responsibilities during the elections.', 3, 43, '2024-11-25 11:34:54', NULL, '2024-11-29 09:28:19', '2024-11-29 09:50:45', '3news.com', 0, 1, 0, 21, 1, 1, 1, '', NULL),
(119, 25, 'mn', '5fvff dd <a href=\'/2024/11/tyfg-116.php\'>m</a>', 1, 35, '2024-11-10 14:38:33', NULL, '2024-11-19 08:08:12', '2024-11-10 22:06:23', '', 1, 1, 0, 0, 0, 0, 0, 'a,b,c', NULL),
(116, 25, 'tyfg', '5fvff', 1, 35, '2024-11-10 14:38:33', NULL, '2024-11-19 08:08:55', '2024-11-10 22:01:40', '', 0, 1, 1, 0, 0, 0, 0, 'm ,n', NULL),
(120, 6, 'abcde <a href="abcd"></a>', 'how are you doing.\r\ngood', 1, 35, '2024-11-10 23:19:59', NULL, '2024-11-19 08:01:22', '2024-11-10 23:21:59', 'abcde <a href="abcd"></a>', 0, 1, 1, 0, 0, 0, 0, 'abcde <a href="abcd"></a>', NULL),
(137, 24, 'dfs', 'dfs', 1, 43, '2024-12-01 09:37:41', NULL, '2024-12-01 09:37:43', '2024-12-01 09:37:41', '', 0, 1, 0, 0, 1, 1, 0, '', NULL),
(138, 24, 'vc', 'xczz', 1, 43, '2024-12-01 09:40:18', NULL, '2024-12-01 09:40:20', '2024-12-01 09:40:18', '', 0, 1, 0, 0, 1, 1, 0, '', NULL),
(139, 28, 'ere', 'tyrrr', 1, 43, '2024-12-01 09:55:37', NULL, '2024-12-01 09:55:39', '2024-12-01 09:55:37', '', 0, 1, 0, 0, 1, 1, 0, '', NULL),
(140, 28, 'dfgv', '<blockquote>"Ut nonummy habent soluta claritas veniam. Typi nunc soluta hendrerit mutationem sollemnes. Quis lius dolore et insitam vel. Aliquip consequat futurum claram ut mazim. Facilisi accumsan dolore ii imperdiet consequat. Claritatem aliquip quod putamus vulputate iusto. Doming minim typi zzril lius usus. In clari mutationem autem non sit. Qui augue mirum dynamicus gothica ut. Demonstraverunt processus soluta sequitur autem demonstraverunt."</blockquote>', 1, 43, '2024-12-01 09:58:57', NULL, '2024-12-01 11:25:37', '2024-12-01 11:25:33', '', 0, 1, 0, 0, 0, 0, 0, '', NULL),
(141, 28, 'dfddf', '123456789012345~1~21~1~67890123456789', 3, 43, '2024-12-01 15:11:27', NULL, '2024-12-01 15:39:36', '2024-12-01 18:45:06', '', 0, 1, 0, 0, 0, 1, 0, '', NULL),
(142, 28, 'dd', '012345678901234~1~5~2~67890123456789156789.15|15|8|~1~5~2~6', 3, 43, '2024-12-01 18:49:54', NULL, NULL, '2024-12-01 19:04:59', '', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL),
(143, 29, 'ddd', 'dfd', 1, 43, '2024-12-03 12:35:18', NULL, '2024-12-03 13:32:40', '2024-12-03 12:35:18', '', 0, 1, 0, 0, 0, 1, 0, '', NULL),
(144, 29, 'wqw', 'ere', 1, 43, '2024-12-03 12:35:56', NULL, '2024-12-03 13:32:29', '2024-12-03 12:35:56', '', 0, 1, 0, 0, 1, 1, 0, '', NULL),
(145, 19, 'subject', 'content', 1, 43, '2024-12-05 10:57:54', NULL, '2024-12-05 10:58:55', '2024-12-05 10:57:54', 'd', 1, 1, 1, 0, 0, 1, 0, '', 'Author'),
(146, 8, 'ddf', 'ff', 1, 43, '2024-12-05 11:28:35', NULL, '2024-12-05 11:28:40', '2024-12-05 11:28:35', 'ghf', 0, 1, 0, 0, 0, 0, 0, '', 'Author2'),
(147, 10, 'sdsa', 'erw', 2, 43, '2024-12-06 09:25:52', '2024-12-06 09:27:31', NULL, '2024-12-06 09:25:52', 'ew', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'gff'),
(148, 20, 'fg', 'rte', 3, 43, '2024-12-06 10:41:44', NULL, NULL, '2024-12-06 10:41:44', 'wes', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'rtf'),
(149, 17, 'fdss', 'ds', 1, 44, '2024-12-06 12:05:36', NULL, '2024-12-06 12:05:50', '2024-12-06 12:05:36', 'ds', 0, 1, 0, 0, 0, 1, 0, '', 's'),
(150, 10, 'ds', 'ss', 1, 43, '2024-12-06 20:02:11', NULL, '2024-12-06 20:02:13', '2024-12-06 20:02:11', 's', 0, 1, 0, 0, 1, 1, 0, '', 's'),
(151, 6, 'Arrest all officials at the Lands Commission, they are behind the \'state capture\' - Ansa-Asare to Mahama', '<p id=\'article-123\'>Legal luminary and statesman, Kwaku Ansa-Asare, has called on President-elect <a target=\'_blank\' href=\'/GhanaHomePage/people/person.php?ID=1349\'>John Dramani Mahama</a> to prosecute officials of the Lands Commission when he assumes office.<br />\r\n<br />\r\nAccording to him, the officials of the Lands Commission are the main people behind what he described as the looting and capturing of state\'s lands and properties.<br />\r\n<br />\r\nSpeaking during a panel discussion on Onua TV on Tuesday, December 10, 2024, Ansa-Asare accused officials of the Lands Commission of being corrupt and illegally selling lands belonging to people.<br />\r\n<br />\r\nâ€œNana Addo alone cannot be blamed for some of the bad things happening in the country. Iâ€™m going to single out one agency, which is the Lands Commission, and Iâ€™m going to mention names.<br />\r\n<br />\r\nâ€œAs the new president is coming, the people Nana Addo appointed to the Lands Commission, including the National Chairman, who is a lawyer at President Akufo-Addo\'s chambers, Alex Quaynor; Executive Secretary Arthur; Greater Accra Regional Chairperson, Surveyor Odanu Sowa; they should all be arrested. The BNI should arrest all of them,â€ he said in Twi.<br />\r\n<br />\r\nHe added, â€œ... the state capture we have been talking about is from the Lands Commission. I want to let everybody know that persons whose lands were given to the government from the 1950s have been sold. This is why Iâ€™m saying they should all be arrested.â€<br />\r\n<br />\r\nAnsa-Asare, a former Director of the Ghana School of Law, said that he himself has been a victim of the commission.<br />\r\n<br />\r\nHe said that the commission sold land belonging to his family and all attempts to get it back have proven futile.<br />\r\n<br />\r\nâ€œI have complained on several occasions, but because Nana Addo appointed the chairman, nothing has been done. I have even petitioned the minister to interdict them but nothing happened. So Iâ€™m pleading with Mahama, if he comes to office, the first thing he should do is to arrest them.â€<br />\r\n<br />\r\n<b>Listen to his remarks in the video below:</b><br />\r\n<br />\r\n<blockquote class="twitter-tweet" data-media-max-width="560"><p lang="en" dir="ltr">Kweku Ansa-Asare argues that President-elect Mahama should arrest all Nana Akuof-Addo appointments at the Lands Commission, and he explains why. He is speaking on State Capture.<a href="https://twitter.com/hashtag/OnuaAbato%C9%94Asoe%C9%9B?src=hash&ref_src=twsrc%5Etfw">#OnuaAbatoÉ”AsoeÉ›</a> <a href="https://twitter.com/hashtag/ElectionCommandCentre?src=hash&ref_src=twsrc%5Etfw">#ElectionCommandCentre</a> <a href="https://t.co/peHSZgOIn8">pic.twitter.com/peHSZgOIn8</a></p>â€” #OnuaTV (@OnuaTV) <a href="https://twitter.com/OnuaTV/status/1866472213207200096?ref_src=twsrc%5Etfw">December 10, 2024</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script><br />\r\n<br />', 1, 43, '2024-12-11 17:53:55', NULL, '2024-12-11 17:58:14', '2024-12-11 17:58:11', 's', 0, 1, 0, 0, 0, 0, 0, '', 's'),
(152, 24, 'â€™helloâ€™world,,,,â€™helloâ€™', '"ddd" \'hello\' world', 3, 43, '2024-12-11 18:36:02', NULL, '2024-12-12 14:56:35', '2024-12-12 15:27:54', 'rf', 0, 1, 0, 0, 0, 0, 0, '', 'f'),
(153, 28, 'test', 'The leadership of the <a target=\'_blank\' href=\'/GhanaHomePage/people/person.php?ID=3181\'>National Democratic Congress</a> (NDC) in Nkwanta South in the Oti region has apologised for an assault orchestrated by the youth of the party on Catholic missionaries.<br />\r\nAccording to the party, the attacks are condemnable and go against the fabric of society.<br />\r\nIn a press statement dated December 12, 2024, Constituency Secretary Prince Succeed Fiagadzi stated, â€œThe leadership of NDC in Nkwanta South is deeply appalled and saddened by the attacks on the persons whose identities are revealed to be Catholic missionaries by some youths in Nkwanta in the early hours of yesterday. This heinous act is unacceptable and goes against the very fabric of our society.<br />\r\nâ€œWe strongly condemn this violence and apologize for the harm, trauma, and distress inflicted upon you. Your selfless dedication to serving humanity and spreading the message of love and compassion deserves utmost respect and gratitude.<br />\r\nâ€œWe recognize that your presence in our various communities has been a beacon of hope, peace, and development. Your tireless efforts in educating, healing, and empowering our people have not gone unnoticed.â€<br />\r\nThe letter added, â€œOur preliminary investigation establishes the following facts:<br />\r\nâ€œ1. The assaulted men are Catholic priests.<br />\r\nâ€œ2. They did not steal the machines and equipment which were the matter in contention.<br />\r\nâ€œ3. They were not adorned in their priestly regalia because they were on their way to the project site.<br />\r\nâ€œThe leadership of the party in Nkwanta has since visited the victims to ascertain their well-being and offered an apology to them.<br />\r\nâ€œAs much as we seek an amicable solution to this incident, it is important we raise our disappointment in the individuals within the Nkwanta South Municipal Assembly who undermine unity, stability, and development.â€<br />\r\nMeanwhile, the police are investigating the said assault on a group of Catholic missionaries of the Jasikan Diocese in the Oti Region.<br />\r\nThey were manhandled by some supporters of the NDC in the Nkwanta South Municipality over some machines for the District Road Improvement Project.<br />\r\nThe victims, whose names were given as Reverend Fathers Henry, Martin, and Rubenson, were assaulted after they were suspected of moving the DRIP machines from their original location.<br />\r\nReports indicate that the missionaries were undertaking infrastructure projects in the region, including Nkwanta South and North, before falling into the hands of the thugs.<br />\r\nThe Catholic missionaries had acquired land from the chiefs and elders of Chaiso in the Nkwanta South Municipality and needed the equipment to clear the land for the commencement of work.<br />\r\nThey sought the approval of the Nkwanta South Municipal Assembly to use the DRIP machines in clearing the land.<br />\r\nThe missionaries, however, paid GHÂ¢9,700 to the Nkwanta South Municipal Assembly before having access to the machines.<br />\r\nReverend Father Henry is currently receiving treatment at the St. Joseph Catholic Hospital.<br />\r\nAssistant Superintendent of Police (ASP) Lawrence Wiafe, the Nkwanta South Municipal Crime Officer, said the police are investigating the matter.<br />', 3, 43, '2024-12-13 08:57:49', NULL, NULL, '2024-12-13 09:05:46', 'a', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'a'),
(154, 26, 'd', 'ss', 1, 43, '2024-12-13 17:06:45', NULL, '2024-12-13 17:06:47', '2024-12-13 17:06:45', 'a', 1, 1, 1, 0, 1, 1, 0, '', 'a'),
(155, 3, 'ss', 'ss', 1, 43, '2024-12-16 10:38:26', NULL, '2024-12-16 10:38:29', '2024-12-16 10:38:26', 'w', 1, 1, 1, 0, 1, 1, 0, '', 'w'),
(156, 29, 'sc n tech', 'd', 1, 43, '2024-12-16 10:42:56', NULL, '2024-12-16 10:43:02', '2024-12-16 10:42:56', 'a', 0, 1, 1, 0, 0, 1, 0, '', 'aa'),
(157, 6, 'A', 'Accra, Dec. 16, GNA â€“ A judge has urged banks and financial institutions to be more vigilant and stay ahead of criminals using Information and Communication Technology (ICT) to steal money from customersâ€™ accounts.  \r\n\r\nMr. Isaac Addo emphasized the need for these institutions to enhance their ICT systems and provide regular training for staff, especially tellers, to thoroughly scrutinize cheques and other financial instruments before making payments.Â \r\n\r\nThe court stressed that protecting the interests of shareholders and depositors was crucial for maintaining public trust.Â \r\n\r\nThe advice came as the court sentenced Jessica Oforiwa, a 35-year-old caterer and hairdresser, to five years in prison for stealing a total of GHC81,060 from customers of GCB Bank using cloned cheques in 2022.Â Â \r\n\r\nOforiwa was convicted on seven charges, including abetment of crime, and stealing, with the sentences running concurrently.Â \r\n\r\nHer accomplices, Dawda Sawdido, Mohammed Muktar, Fuseini Saeed Ibrahim, Felix Mensah, Lawrence Quarshie, and Philip Ansah, remain at large.Â \r\n\r\nIn sentencing Oforiwa, a mother of two and a first-time offender, the court acknowledged her young age but emphasized that her actions were premeditated.Â Â \r\n\r\nOforiwa had played a significant role in assisting the other fugitives to misappropriate funds from the bank.Â \r\n\r\nAssistant Superintendent of Police (ASP) Seth Frimpong, who led the prosecution, urged the court to consider the growing trend of such crimes, which he said were harming financial institutions and sabotaging the economy.Â Â \r\n\r\nHe called for a â€œfairer deterrent sentenceâ€ to combat the issue effectively.Â \r\n\r\nThe prosecution informed the court that the complainant, Daniel Boakye, is a Security Coordinator at GCB Bank Ghana Limited, High Street, Accra, and that Jessica Oforiwaa resides in Kasoa, in the Central Region.Â \r\n\r\nLast year, the prosecution revealed, GCB Bank discovered that some individuals had cloned about eight cheques from the bankâ€™s customers, successfully withdrawing a total of GHC81,060 from their accounts.Â Â \r\n\r\nOne of the victims, Rejoice Emekor Senezah, a customer at the Kantamanto branch, had GHC12,000 withdrawn from her account on January 10, 2022.Â Â \r\n\r\nAnother victim, Felcon Electrical Enterprise, had GHC47,460 withdrawn from their account on April 13, 2022.Â \r\n\r\nThe prosecution added that the complainant submitted the cloned cheques to Camelot Company Limited, the producers of the cheques, for investigation.Â Â \r\n\r\nCamelot determined that all the cloned cheques were from a cheque book issued to Oforiwaaâ€™s account, Jesnat Cook Company.Â Â \r\n\r\nIt was found that Oforiwaa and her accomplices had chemically erased the account details and signatures of the original customers, making the cheques appear genuine to the bank.Â \r\n\r\nInvestigations revealed that Oforiwaaâ€™s accomplices withdrew significant sums of money from the accounts.Â Â \r\n\r\nDawda Sawdido, for example, withdrew GHC4,700.Â Â \r\n\r\nMohammed Muktar made two withdrawals, taking GHC4,900 and GHC4,800 on February 10, 2022.Â Â \r\n\r\nFuseini Saeed Ibrahim withdrew GHC5,000 on January 10, 2022.Â \r\n\r\nFelix Mensah withdrew GHC47,460 on April 13, 2022. Lawrence Quarshie withdrew GHC5,000 and GHC4,700 from the Tantra Hill and Achimota branches, respectively, on April 13, 2022.Â Â \r\n\r\nPhilip Ansah also withdrew GHC4,700 on August 1, 2022, through Livingston Ankomah, a convict now incarcerated at Nsawam.Â \r\n\r\nIn total, Oforiwaa and her accomplices managed to withdraw GHC81,060.Â Â \r\n\r\nThe prosecution said that on August 1, 2022, Philip Ansah and Livingston Ankomah went to the Kaneshie Branch of GCB Bank with a cloned cheque worth GHC4,700 and successfully withdrew the money.Â Â \r\n\r\nThey then proceeded to the Kwame Nkrumah Circle branch of the bank, where they attempted to withdraw another GHC3,000 from the same account.Â Â \r\n\r\nTheir suspicious actions led to their arrest after intelligence was gathered.Â \r\n\r\nAnkomah, after his arrest, confessed to the crime, stating that the cheques were given to him by Philip Ansah and that he handed over the withdrawn cash to Ansah.Â Â \r\n\r\nAnkomah was later jailed for his involvement in the crime.Â \r\n\r\nOn December 24, 2022, Oforiwaa was arrested by the Kwahu Nkwatia Police.Â Â \r\n\r\nDuring interrogation, she admitted to using the Jesnat Cook cheques to fraudulently withdraw the total sum of GHC81,060 from the affected accounts.Â Â \r\n\r\nOforiwaa also suggested that her boyfriend, Samuel Gyane Nyanteh, might have been involved, as he was the only person living with her at the time.', 1, 43, '2024-12-17 09:05:13', NULL, '2024-12-17 09:11:25', '2024-12-17 09:11:10', 'S', 0, 1, 0, 0, 0, 0, 0, '', 'A'),
(158, 3, 's', 'sdd', 1, 43, '2024-12-18 10:59:09', NULL, '2024-12-18 10:59:11', '2024-12-18 10:59:09', 's', 0, 1, 0, 0, 0, 1, 0, '', 's'),
(159, 3, 'TT', 'TT', 1, 43, '2024-12-18 11:39:34', NULL, '2024-12-18 11:39:36', '2024-12-18 11:39:34', 'T', 0, 1, 0, 0, 1, 1, 0, '', 'T'),
(160, 3, 'ww', 'ww', 1, 43, '2024-12-18 11:41:59', NULL, '2024-12-18 11:42:01', '2024-12-18 11:41:59', 'w', 1, 1, 1, 0, 1, 1, 0, '', 'w'),
(161, 3, 'qq', 'qq', 1, 43, '2024-12-18 11:46:28', NULL, '2024-12-18 11:46:31', '2024-12-18 11:46:28', 'qw', 0, 1, 1, 0, 0, 1, 0, '', 'qw'),
(162, 28, 'gg', 'gg', 1, 43, '2024-12-18 13:42:39', NULL, '2024-12-18 13:42:43', '2024-12-18 13:42:39', 'qw', 0, 1, 0, 0, 1, 1, 0, '', 'qw'),
(163, 6, 'tr', 'tr', 1, 43, '2024-12-18 13:47:54', NULL, '2024-12-18 13:47:57', '2024-12-18 13:47:54', 'w', 0, 1, 0, 0, 1, 1, 0, '', 'w'),
(164, 25, 'ui', 'ui', 1, 43, '2024-12-18 13:54:21', NULL, '2024-12-18 13:54:24', '2024-12-18 13:54:21', 't', 0, 1, 0, 0, 1, 1, 0, '', 't'),
(165, 4, 's', 's', 2, 43, '2024-12-18 14:02:09', NULL, '2024-12-18 14:02:12', '2024-12-18 14:02:09', 'w', 0, 1, 0, 0, 1, 1, 0, '', 'w'),
(166, 6, 's', 'Former Communications Director of the New Patriotic Party</a> (NPP), Yaw Adomako Baafi, who was also a member of the party\'s flagbearer, Dr. Mahamudu Bawumia</a>â€™s team during the 2024 presidential elections, has lamented the neglect of party communicators in the lead-up to the general elections.<br />\r\nAccording to him, party communicators were sidelined, and the allowances due them were withheld.<br />\r\nSpeaking in an interview on Okay FM on December 23, 2024, Adomako Baafi referenced Dr. Bawumiaâ€™s post-election statement that some media houses were not supportive of the party, contributing to their defeat.<br />\r\nHe argued that the blame should also be directed at some party leaders who were responsible for managing the media and the communication team.<br />\r\nAdomako Baafi alleged that while the National Democratic Congress (NDC) flagbearer, John Dramani Mahama, was paying his media team as much as GHÂ¢1,000, the NPPâ€™s communication budget was mismanaged.<br />\r\nHe specifically mentioned Miracles Aboagye, the communication director of Dr. Bawumiaâ€™s campaign, accusing him of failing to address the concerns of party communicators or provide their due allowances.<br />\r\nâ€œHow much were our people being paid? And was the money even given to them?<br />\r\nâ€œSome small boys who were not even part of... Nana Akufo-Addo is a communication person, and his budget for communication is something that has never happened before, but who was in charge of the money?<br />\r\nâ€œBawumia was also a communication person, but the person in charge of the budget... I am not sure Bawumia was briefed about what was happening because he was working with a good heart. He believed everybody, but I am sure all the sixteen regions will put together a report about how much each person received for the campaign,â€ he said.<br />\r\nAdomako Baafi suggested that a comprehensive report on the allocation of campaign funds across all 16 regions should be compiled to understand how resources were distributed.<br />\r\nâ€œI met Bawumia in Kumasi, and he gave me something for me to campaign, but the party communication that we were under him... Miracles: who was supposed to tell us how much we were to get? Ask if someone called him for him to even pick up his call before.<br />\r\nâ€œWas the communication a team or a one-man show? It has never happened before. When I was working under Akomeah, he was one of the celebrated leaders.<br />\r\nâ€œHe delegates authority and never takes proceedings for himself. The little amount of money you give to Akomeah, he will share for everybody to get his/her share. If we are to go somewhe', 3, 43, '2024-12-24 09:11:29', NULL, NULL, '2024-12-24 09:32:28', 'a', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'a'),
(167, 24, 'a', '<a href="https://www.myjoyonline.com/wp-content/uploads/2024/12/Abigail-and-Adeboye.jpg"><img src="https://www.myjoyonline.com/wp-content/uploads/2024/12/Abigail-and-Adeboye.jpg"></a><span class="img">Esther and Adeboye upon their arrest</span>', 2, 43, '2024-12-25 09:09:23', NULL, '2024-12-26 18:21:36', '2024-12-26 18:21:34', 'a', 0, 1, 0, 29, 0, 0, 0, '', 'a'),
(171, 6, 'a', 'd', 1, 43, '2024-12-27 09:55:56', NULL, '2025-01-12 21:31:54', '2024-12-27 10:18:17', '', 0, 1, 0, 0, 0, 0, 0, '', 'deee'),
(172, 6, 'gg', 'grrr', 1, 43, '2024-12-27 10:19:22', NULL, '2025-01-12 21:34:22', '2024-12-27 10:29:17', '', 0, 1, 0, 0, 0, 0, 0, '', 'g'),
(178, 26, 'a', 's', 1, 43, '2025-01-13 14:19:43', NULL, '2025-01-13 14:19:45', '2025-01-13 14:19:43', '', 0, 1, 1, 1, 0, 0, 0, '', 's'),
(177, 26, 's', 's', 3, 46, '2025-01-12 21:21:42', '2025-01-15 11:05:12', '2025-01-12 21:34:33', '2025-01-12 21:21:42', '', 0, 1, 0, 1, 0, 0, 0, '', 's'),
(179, 26, 'fffff sdscvf fcv bnb fffff sdscvf fcv bnbfffff sdscvf fcv bnb fffff sdscvf fcv bnb fffff sdscvf fcv bnb fffff sdscvf fcv bnb fffff sdscvf fcv bnb fffff sdscvf fcv bnbfffff', 's', 1, 43, '2025-01-13 19:23:15', NULL, '2025-01-13 19:25:12', '2025-01-13 19:25:10', '', 0, 1, 1, 1, 0, 0, 0, '', 'z'),
(180, 3, 'Hello World 280125', 'Thank you. Bye!', 3, 46, '2025-01-28 12:29:30', '2025-01-28 12:30:04', NULL, '2025-01-28 12:33:40', '', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'w'),
(181, 26, 'fgd', 'dfd\r\n<iframe width="700" height="514" src="https://www.youtube.com/embed/xZzcyHj9CUg" title="LIVE STREAM: Oliver Barker-Vormawor Appears Before Appointment Committee | 29th January, 2025" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>', 3, 43, '2025-01-29 10:56:55', NULL, NULL, '2025-01-29 10:57:19', '', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'er'),
(182, 24, 'Hell World', 'ndfn dfndif', 1, 43, '2025-03-07 11:39:09', NULL, '2025-03-07 11:39:12', '2025-03-07 11:39:09', '', 0, 1, 1, 47, 0, 1, 1, '', 'ghanaweb'),
(183, 6, 'HELP ME GOD', 'DMFFND', 1, 43, '2025-03-07 11:44:55', NULL, '2025-03-07 11:44:59', '2025-03-07 11:44:55', '', 0, 1, 1, 47, 0, 1, 1, '', 'myjoyonline'),
(184, 24, 'hello', 'hello world', 1, 43, '2025-03-16 10:57:34', NULL, '2025-03-16 10:57:40', '2025-03-16 10:57:34', '', 1, 1, 1, 0, 1, 1, 0, '', 'ghanaweb'),
(185, 24, 'Hello world', 'All is well', 1, 43, '2025-05-09 20:36:21', NULL, '2025-05-09 20:36:24', '2025-05-09 20:36:21', '', 1, 1, 1, 0, 1, 1, 0, '', 'All is well'),
(186, 6, 'Hello World ...', 'All is well...', 1, 43, '2025-05-09 20:38:25', NULL, '2025-05-09 20:38:28', '2025-05-09 20:38:25', '', 1, 1, 1, 0, 1, 1, 0, '', 'Thank you'),
(168, 24, 'a', 'The Okaikwei Central parliamentary candidate of the <a target=\'_blank\' href=\'/GhanaHomePage/people/person.php?ID=3181\'>National Democratic Congress</a> (NDC), Baba Sadiq Abdulai, has stated that all seats won by the NDC will be taken up by the party in the 9th Parliament.<br />\r\nSpeaking in a viral video, Baba Sadiq is heard issuing a warning that nothing can prevent the NDC MPs, who won their seats and were later overturned by a re-collation exercise by the EC, from being sworn in.<br />\r\nAccording to him, the EC Chairperson, Jean Mensa, cannot subvert the will of the people.<br />\r\n"On December 6 or 5, not even the IGP, the CDS, not even Nana Addo, if Jean Mensa is minded, she herself will step down in Parliament on the 6th. We won the elections credibly. On behalf of myself, on behalf of Dome Kwabenya, Ablekuma North, Tema Central, and Obuasi East. This is a strong warning to them.<br />\r\n"To Afenyo Markin, if this is what you wanted to achieve, to be retained as a minority leader, you failed. You will not be retained. We are not cowards in this country. We were not born to be cowards. The blood that runs through our veins in the NDC is the blood of revolution. That revolution starts on January 5," he said.<br />\r\nHe continued, "We are not afraid of the state of emergency. Nobody, I repeat, nobody can scare us with a certain state of emergency. Nana Akufo-Addo is going, he\'s the outgoing President of the country. <br />\r\n"Dr. Bawumia has lost, the IGP doesn\'t have any locus. Jean Mensa cannot choose for Ghanaians who they want to be their MP. We worked hard to be voted for. Every single seat that we won will be sworn into Parliament," he added.<br />\r\nThe controversial re-collation held at the Greater Accra Regional Office of the Electoral Commission (EC) on Saturday, December 21, saw four seats, which were initially declared for the NDC, namely Obuasi East, Okaikwei Central, Tema Central, and Techiman South, re-declared in favour of the NPP.<br />\r\nThe Obuasi East seat, which was initially declared for NDC\'s Samuel Aboagye, was re-declared for NPP\'s Patrick Boakye-Yiadom; the Tema Central seat, which was declared for NDC\'s Ebi Bright, was re-declared for NPP\'s Charles Forson.<br />\r\nAlso, the Techiman South seat was re-declared for NPP\'s Martin Adjei-Mensah Korsah after it had been initially declared for Christopher Beyere Baasongti, and the Okaikwei Central seat was re-declared for NPP\'s Dr. Patrick Boamah after it was initially declared for NDC\'s Baba Sadiq.<br />\r\nThe Nsawam Adoagyiri, Ahafo Ano South West, and Ahafo Ano North constituencies, which were initially incomplete, were also declared in favour of the NPP\'s Frank Annoh-Dompreh, Eric Nana Agyeman-Prempeh, and Elvis Osei Mensah Dapaah, respectively.<br />\r\nTwo constituencies - Ablekuma North and Dome Kwabenya - are, however, yet to be determined.<br />\r\nFor the Ablekuma North Constituency, NDC\'s Ewurabena Aubynn was declared the winner of the constituency\'s seat without the results of 62 polling stations.<br />\r\nThe NPP\'s candidate for the constituency is Nana Akua Owusu Afriyieh, a former MP and the current Deputy Chief Executive of the Coastal Development Authority.<br />\r\nFor Dome Kwabenya, NDC\'s Elikplim Akurugu was declared the winner of the constituency\'s seat, beating NPP\'s Mike Oquaye Jnr.<br />\r\nAll other factors being equal, the NDC would now have 181 seats in the 9th Parliament, with independent candidates holding 4 seats.<br />\r\n<blockquote class= "twitter-tweet" data-media-max-width= "560"><p lang=" en" dir=" ltr">Baba Sadiq\'s brave response to the bizarre re-collation exercise of the Jean Mensah led EC <a href= "https://t.co/YRvRnqwRBh">pic.twitter.com/YRvRnqwRBh</a></p>â€” Radio Gold 90.5FM (@radiogold905fm) <a href= "https://twitter.com/radiogold905fm/status/1871452301346603295?ref_src=twsrc%5Etfw"> December 24, 2024</a></blockquote> <script async src= "https://platform.twitter.com/widgets.js" charset= "utf-8"></script><br />', 3, 43, '2024-12-25 09:09:23', NULL, NULL, '2024-12-25 09:09:23', 'a', NULL, NULL, NULL, 0, NULL, NULL, NULL, '', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `img_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_path` varchar(1000) NOT NULL,
  `caption` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`img_id`, `user_id`, `img_path`, `caption`) VALUES
(15, 2, 'img/2/Nuhu-Bayorbo-Mahama.jpg', 'ddd'),
(16, 2, 'img/2/pumpkins-8350480_1280.jpg', 'title_here'),
(9, 2, 'img/2/logo_Original.jpg', 'fdfc'),
(10, 2, 'img/2/AddItem.JPG', 'fgdcc'),
(13, 2, 'img/2/OIP-2.jpeg', 'abc dimf dmfid'),
(19, 35, 'img/35/Screenshot 2024-10-29 171139.png', 'Hello World'),
(18, 2, 'https://cdn.pixabay.com/photo/2023/11/07/06/52/forest-8371211_1280.jpg', 'hello'),
(20, 35, 'img/35/Screenshot 2024-10-29 172849.png', 'Another One'),
(21, 43, 'img/43/DrBossman.jpeg', 'Dr Eric Bossman Asare'),
(22, 43, 'https://3news.com/wp-content/uploads/2024/11/WhatsApp-Image-2024-11-28-at-11.26.41.jpeg', 'Kojo Antwi'),
(23, 43, 'https://3news.com/wp-content/uploads/2024/11/Wanderlust.jpg', 'hello'),
(24, 43, 'https://3news.com/wp-content/uploads/2024/11/Wanderlust.jpg', 'klofkdo klofkdo  klofkdo klofkdo fvgfv'),
(25, 43, '/img/43/TheDeathClock2.jpg', 'dddd'),
(26, 43, '/img/43/468485101_1132339734926699_1295538687152998206_n.jpg', 'fdff'),
(43, 14, '/img/14/rawlings and zenator.jpg', 'kkk'),
(41, 14, '/img/14/wikighana.jpg', 'kkk'),
(42, 14, '/img/14/newages-logo.jpg', 'kkkdd'),
(29, 43, 'http://localhost/img/43/468485101_1132339734926699_1295538687152998206_n.jpg', 'FF'),
(30, 43, '/img/43/Maham and Bawumia.jpg', 'Mahama and Bawumia'),
(44, 14, '/img/14/DefaultItemImage.jpg', ''),
(45, 14, '/img/14/DefaultItemImage.jpg', ''),
(46, 14, '/img/profile-photo/14/DefaultItemImage.jpg', ''),
(47, 14, '/img/profile-photo/14/rawlings and zenator.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop_full_name` varchar(100) NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `whatsapp_no` varchar(100) NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `logo_url` varchar(500) DEFAULT NULL,
  `cover_url` varchar(1000) NOT NULL,
  `short_name` varchar(7) NOT NULL,
  `is_approved` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_full_name`, `slogan`, `address`, `whatsapp_no`, `mobile_no`, `logo_url`, `cover_url`, `short_name`, `is_approved`) VALUES
(1, 'Our Time Trendz', 'Shop the Best, Forget the Rest.', 'Dansoman, Accra', '233246331520', '+233246331520', '/img/shop/sneaker.png', '/img/shop/shoes.jpg', 'Trendz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_brand`
--

CREATE TABLE `shop_brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_brand`
--

INSERT INTO `shop_brand` (`id`, `brand`, `category_id`) VALUES
(1, 'Adidas', 1),
(2, 'Louis Vuitton', 1),
(3, 'Dior', 1),
(4, 'Gucci', 1),
(5, 'Armani', 1),
(6, 'Nike', 1),
(7, 'Puma', 1),
(8, 'Calvin Klein', 1),
(9, 'Dolce & Gabbana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE `shop_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `icon_url` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`id`, `category_name`, `icon_url`) VALUES
(1, 'Fashion', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="m240-522-40 22q-14 8-30 4t-24-18L66-654q-8-14-4-30t18-24l230-132h70q9 0 14.5 5.5T400-820v20q0 33 23.5 56.5T480-720q33 0 56.5-23.5T560-800v-20q0-9 5.5-14.5T580-840h70l230 132q14 8 18 24t-4 30l-80 140q-8 14-23.5 17.5T760-501l-40-20v361q0 17-11.5 28.5T680-120H280q-17 0-28.5-11.5T240-160v-362Zm80-134v456h320v-456l124 68 42-70-172-100q-15 51-56.5 84.5T480-640q-56 0-97.5-33.5T326-758L154-658l42 70 124-68Zm160 177Z"/></svg>'),
(2, 'Vehicles', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M240-160q-50 0-85-35t-35-85H40v-440q0-33 23.5-56.5T120-800h560v160h120l120 160v200h-80q0 50-35 85t-85 35q-50 0-85-35t-35-85H360q0 50-35 85t-85 35Zm0-80q17 0 28.5-11.5T280-280q0-17-11.5-28.5T240-320q-17 0-28.5 11.5T200-280q0 17 11.5 28.5T240-240ZM120-360h32q17-18 39-29t49-11q27 0 49 11t39 29h272v-360H120v360Zm600 120q17 0 28.5-11.5T760-280q0-17-11.5-28.5T720-320q-17 0-28.5 11.5T680-280q0 17 11.5 28.5T720-240Zm-40-200h170l-90-120h-80v120ZM360-540Z"/></svg>'),
(3, 'Home, Furniture<br>Appliances', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M320-80q-33 0-56.5-23.5T240-160v-40q0-47 20.5-87t53.5-67l-25-166h-89q-33 0-56.5-23.5T120-600v-160q0-33 23.5-56.5T200-840h200v-40h160v40h159l-73 486q33 27 53.5 67t20.5 87v40q0 33-23.5 56.5T640-80H320Zm-43-520-24-160h-53v160h77Zm203 400q17 0 28.5-11.5T520-240q0-17-11.5-28.5T480-280q-17 0-28.5 11.5T440-240q0 17 11.5 28.5T480-200Zm-92-200h184l54-360H334l54 360Zm-68 240h320v-40q0-50-35-85t-85-35h-80q-50 0-85 35t-35 85v40Zm160-80Z"/></svg>'),
(4, 'Health & Beauty', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M200-80 40-520l200-120v-240h160v240l200 120L440-80H200Zm480 0q-17 0-28.5-11.5T640-120q0-17 11.5-28.5T680-160h120v-80H680q-17 0-28.5-11.5T640-280q0-17 11.5-28.5T680-320h120v-80H680q-17 0-28.5-11.5T640-440q0-17 11.5-28.5T680-480h120v-80H680q-17 0-28.5-11.5T640-600q0-17 11.5-28.5T680-640h120v-80H680q-17 0-28.5-11.5T640-760q0-17 11.5-28.5T680-800h160q33 0 56.5 23.5T920-720v560q0 33-23.5 56.5T840-80H680Zm-424-80h128l118-326-124-74H262l-124 74 118 326Zm64-200Z"/></svg>'),
(5, 'Babies & Mother<br>Care', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M120-80v-400l63-185q8-26 30-40.5t47-14.5q8 0 16 1.5t16 5.5l166 73h102v80H440l-108-47-52 157v370H120Zm240-120v-80h480v80H360Zm420-120q-25 0-42.5-17.5T720-380q0-25 17.5-42.5T780-440q25 0 42.5 17.5T840-380q0 25-17.5 42.5T780-320Zm-260 0q-33 0-56.5-23.5T440-400v-40h-80v-80h120q17 0 28.5 11.5T520-480v40h80v-80h80v120q0 33-23.5 56.5T600-320h-80ZM320-760q-33 0-56.5-23.5T240-840q0-33 23.5-56.5T320-920q33 0 56.5 23.5T400-840q0 33-23.5 56.5T320-760Z"/></svg>'),
(6, 'Groceries', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M640-80q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170T640-80Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm-480 0q-33 0-56.5-23.5T80-240v-304q0-8 1.5-16t4.5-16l80-184h-6q-17 0-28.5-11.5T120-800v-40q0-17 11.5-28.5T160-880h280q17 0 28.5 11.5T480-840v40q0 17-11.5 28.5T440-760h-6l66 152q-19 10-36 21t-32 25l-84-198h-96l-92 216v304h170q5 21 13.5 41.5T364-160H160Zm480-440q-42 0-71-29t-29-71q0-42 29-71t71-29v200q0-42 29-71t71-29q42 0 71 29t29 71H640Z"/></svg>'),
(7, 'Mobile Phones<br>Computer', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-200v120h400v-120H280Zm200 100q17 0 28.5-11.5T520-180q0-17-11.5-28.5T480-220q-17 0-28.5 11.5T440-180q0 17 11.5 28.5T480-140ZM280-320h400v-400H280v400Zm0-480h400v-40H280v40Zm0 560v120-120Zm0-560v-40 40Z"/></svg>'),
(8, 'Building<br>Construction', '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M756-120 537-339l84-84 219 219-84 84Zm-552 0-84-84 276-276-68-68-28 28-51-51v82l-28 28-121-121 28-28h82l-50-50 142-142q20-20 43-29t47-9q24 0 47 9t43 29l-92 92 50 50-28 28 68 68 90-90q-4-11-6.5-23t-2.5-24q0-59 40.5-99.5T701-841q15 0 28.5 3t27.5 9l-99 99 72 72 99-99q7 14 9.5 27.5T841-701q0 59-40.5 99.5T701-561q-12 0-24-2t-23-7L204-120Z"/></svg>');

-- --------------------------------------------------------

--
-- Table structure for table `shop_customer`
--

CREATE TABLE `shop_customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(200) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `op_balance_credit` int(11) DEFAULT '0',
  `op_balance_debit` int(11) DEFAULT '0',
  `email` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shop_item`
--

CREATE TABLE `shop_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` varchar(1000) DEFAULT NULL,
  `notes_to_customers` varchar(5000) DEFAULT NULL,
  `price` float NOT NULL,
  `is_negotiable` int(1) NOT NULL,
  `is_instock` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `maincategory_id` int(11) NOT NULL,
  `subcategory1_id` int(11) NOT NULL,
  `subcategory2_id` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `item_condition` int(11) NOT NULL,
  `gender` int(11) NOT NULL,
  `entry_date_time` datetime NOT NULL,
  `img_1` varchar(2500) DEFAULT NULL,
  `img_2` varchar(2500) DEFAULT NULL,
  `img_3` varchar(2500) DEFAULT NULL,
  `img_4` varchar(2500) DEFAULT NULL,
  `img_5` varchar(2500) DEFAULT NULL,
  `is_published` int(1) NOT NULL DEFAULT '0',
  `file_path` varchar(2000) DEFAULT NULL,
  `cost_price` float DEFAULT NULL,
  `op_stock_quantity` float DEFAULT NULL,
  `uom` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_item`
--

INSERT INTO `shop_item` (`id`, `item_name`, `item_description`, `notes_to_customers`, `price`, `is_negotiable`, `is_instock`, `user_id`, `shop_id`, `maincategory_id`, `subcategory1_id`, `subcategory2_id`, `brand`, `item_condition`, `gender`, `entry_date_time`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `is_published`, `file_path`, `cost_price`, `op_stock_quantity`, `uom`) VALUES
(48, 'Loverly13', '', '', 190, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:28:54', '/img/shop/43/79869.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly13-48.php', 0, 0, NULL),
(37, 'Star3', '', 'notes to customers', 8100, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:24:34', '/img/shop/43/9054.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/star3-37.php', 0, 0, NULL),
(38, 'Loverly', 'item description', '', 530, 2, 1, 43, 1, 1, 1, 8, 1, 0, 2, '2025-04-21 11:25:02', '/img/shop/43/88091.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly-38.php', 0, 0, NULL),
(39, 'sneaker', '', '', 660, 2, 1, 43, 1, 1, 1, 8, 1, 1, 0, '2025-04-21 11:25:25', '/img/shop/43/16584.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-39.php', 0, 0, NULL),
(40, 'sneaker', '', '', 550, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:25:50', '/img/shop/43/14020.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-40.php', 0, 0, NULL),
(26, 'Sleek', '', '', 400, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:16:46', '/img/shop/43/28983.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sleek-26.php', 0, 0, NULL),
(27, 'blazer', '', '', 400, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:17:44', '/img/shop/43/12200.png', '/img/shop/43/94000.png', '/img/shop/43/58077.png', '/img/shop/43/12044.png', '/img/shop/43/94094.png', 1, 'wiki-shops/fashion/shoes/sneakers/blazer-27.php', 0, 0, NULL),
(28, 'crater', '', '', 400, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:18:28', '/img/shop/43/83847.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/crater-28.php', 0, 0, NULL),
(29, 'air 2', '', '', 450, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:18:48', '/img/shop/43/28535.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/air-2-29.php', 0, 0, NULL),
(30, 'blazer 2', '', '', 460, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:19:16', '/img/shop/43/64327.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/blazer-2-30.php', 0, 0, NULL),
(53, 'Ring 5', '', '', 1200, 2, 1, 43, 1, 1, 4, 1, 8, 0, 0, '2025-04-23 12:08:20', '/img/shop/43/55994.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/rings/ring-5-53.php', 0, 0, NULL),
(54, 'Necklace', '', '', 150, 2, 1, 43, 1, 1, 4, 2, 1, 0, 0, '2025-04-23 12:08:57', '/img/shop/43/64372.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/necklaces/necklace-54.php', 0, 0, NULL),
(45, 'Loverly9', '', '', 580, 2, 1, 43, 1, 1, 1, 8, 4, 0, 0, '2025-04-21 11:27:56', '/img/shop/43/5523.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly9-45.php', 0, 0, NULL),
(46, 'Loverly11', '', '', 470, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:28:14', '/img/shop/43/37318.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly11-46.php', 0, 0, NULL),
(36, 'Star2', '', '', 620, 2, 1, 43, 1, 1, 1, 8, 1, 0, 1, '2025-04-21 11:24:11', '/img/shop/43/50245.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/star2-36.php', 0, 0, NULL),
(47, 'Loverly12', '', '', 550, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:28:38', '/img/shop/43/25404.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly12-47.php', 0, 0, NULL),
(31, 'hippie', '', '', 380, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:19:45', '/img/shop/43/11084.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/hippie-31.php', 0, 0, NULL),
(32, 'hippie 2', '', '', 360, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:20:11', '/img/shop/43/54555.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/hippie-2-32.php', 0, 0, NULL),
(33, 'jordan', '', '', 420, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:20:36', '/img/shop/43/18947.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/jordan-33.php', 0, 0, NULL),
(34, 'jordan 2', '', '', 440, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-17 15:21:03', '/img/shop/43/15831.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/jordan-2-34.php', 0, 0, NULL),
(41, 'Loverly', '', '', 690, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:26:24', '/img/shop/43/97143.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly-41.php', 0, 0, NULL),
(42, 'Loverly5', '', '', 480, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:26:54', '/img/shop/43/27623.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly5-42.php', 0, 0, NULL),
(43, 'Loverly6', '', '', 630, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:27:12', '/img/shop/43/84527.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly6-43.php', 0, 0, NULL),
(44, 'Loverly7', '', '', 712, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:27:32', '/img/shop/43/91713.png', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/loverly7-44.php', 0, 0, NULL),
(35, 'Star1', '', '', 350, 2, 1, 43, 1, 1, 1, 8, 6, 0, 0, '2025-04-21 11:23:45', '/img/shop/43/49864.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/star1-35.php', 0, 0, NULL),
(49, 'sneaker', '', '', 480, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:29:11', '/img/shop/43/23639.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-49.php', 0, 0, NULL),
(50, 'Sneaker', '', '', 540, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:38:03', '/img/shop/43/70958.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-50.php', 0, 0, NULL),
(51, 'Sneaker', '', '', 410, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:42:33', '/img/shop/43/70019.jpg', '', 'http://127.0.0.1/img/shop/43/25404.jpg', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-51.php', 0, 0, NULL),
(52, 'Sneaker', '', '', 152, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-21 11:43:25', '/img/shop/43/17941.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-52.php', 0, 0, NULL),
(55, 'Ring 3', '', '', 158, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-04-23 12:09:25', '/img/shop/43/34864.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/rings/ring-3-55.php', 0, 0, NULL),
(56, 'Necklace 1', '', '', 452, 2, 1, 43, 1, 1, 4, 2, 1, 0, 0, '2025-04-23 12:09:48', '/img/shop/43/1197.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/necklaces/necklace-1-56.php', 0, 0, NULL),
(57, 'Necklace 2', '', '', 562, 2, 1, 43, 1, 1, 4, 2, 1, 0, 0, '2025-04-23 12:10:12', '/img/shop/43/94930.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/necklaces/necklace-2-57.php', 0, 0, NULL),
(58, 'Necklace 3', '', '', 325, 2, 1, 43, 1, 1, 4, 2, 1, 0, 0, '2025-04-23 12:10:44', '/img/shop/43/64485.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/necklaces/necklace-3-58.php', 0, 0, NULL),
(59, 'Necklace 4', '', '', 452, 2, 1, 43, 1, 1, 4, 3, 1, 0, 0, '2025-04-23 12:11:15', '/img/shop/43/45483.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/bracelets/necklace-4-59.php', 0, 0, NULL),
(61, 'Chains', '', '', 185, 2, 1, 43, 1, 1, 4, 7, 1, 0, 0, '2025-04-23 12:12:23', '/img/shop/43/1892.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/breaded jewelry/chains-61.php', 0, 0, NULL),
(62, 'Earrings', '', '', 196, 2, 1, 43, 1, 1, 4, 5, 1, 0, 0, '2025-04-23 12:12:48', '/img/shop/43/59476.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/earrings/earrings-62.php', 0, 0, NULL),
(63, 'Rings 5', '', '', 236, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-04-23 12:13:09', '/img/shop/43/64552.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/rings/rings-5-63.php', 0, 0, NULL),
(64, 'Rings 6', '', '', 562, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-04-23 12:13:26', '/img/shop/43/49787.jpg', '', '', '', '', 1, 'wiki-shops/fashion/jewelry/rings/rings-6-64.php', 0, 0, NULL),
(65, 'Sneaker9', '', '', 200, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-24 08:28:03', '/img/shop/43/19255.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker9-65.php', 0, 0, NULL),
(67, 'Ring', '', '', 120, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-04-27 19:12:32', '/img/shop/43/80762.jpg', '', '', '', '', 0, '', 0, 0, NULL),
(69, 'Sneaker', '', '', 189, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-27 20:48:55', '/img/shop/43/31419.jpg', '', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-69.php', 0, 0, NULL),
(70, 'Sneaker', '', '', 196, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-04-30 21:11:07', '/img/shop/43/82152.png', 'http://localhost/img/shop/43/74302.jpg', '', '', '', 1, 'wiki-shops/fashion/shoes/sneakers/sneaker-70.php', 0, 0, NULL),
(71, 'All is well', '', 'blah blah blah blah blah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahblah blahvblah blahblah blahblah blah', 156, 2, 1, 43, 1, 1, 1, 13, 1, 0, 0, '2025-05-03 15:17:00', '/img/shop/43/39913.jpg', '', 'http://localhost/img/shop/43/82152.png', '', 'http://localhost/img/shop/43/19255.jpg', 0, '', 0, 0, NULL),
(78, 'ss', '', '', 1, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-05-12 08:05:50', '/img/shop/43/97301.jpg', '', '', '', '', 0, NULL, 0, 0, NULL),
(79, 'ss', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-12 08:27:43', '/img/shop/43/50918.jpg', '', '', '', '', 0, NULL, 0, 0, NULL),
(80, 'fff', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-12 08:35:48', '/img/shop/43/49714.jpg', '', '', '', '', 0, NULL, 0, 0, NULL),
(81, 'sneaker', 's', '', 200, 2, 1, 43, 1, 1, 1, 8, 1, 0, 0, '2025-05-14 08:39:24', '/img/shop/43/68314.jpg', '', '', '', '', 0, NULL, 150, 300, 2),
(82, 'd', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-14 12:24:17', '/img/shop/43/91893.jpg', '', '', '', '', 0, NULL, 1, 4, 2),
(83, 's', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-14 12:25:44', '/img/shop/43/96832.jpg', '', '', '', '', 0, NULL, 2, 1, 0),
(84, 'ss', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-14 12:28:19', '/img/shop/43/40659.jpg', '', '', '', '', 0, NULL, 0, 1, 0),
(85, 'rf', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-14 12:30:08', '/img/shop/43/54644.jpg', '', '', '', '', 0, NULL, 0, 0, 0),
(86, 'yuh', '', '', 125, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-14 12:33:57', '/img/shop/43/75662.jpg', '', '', '', '', 0, NULL, 0, 20, 1),
(87, 'fg', '', '', 1, 2, 1, 43, 1, 1, 4, 1, 1, 0, 0, '2025-05-14 12:36:16', '/img/shop/43/57467.jpg', '', '', '', '', 0, NULL, 0, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_item_uom`
--

CREATE TABLE `shop_item_uom` (
  `id` int(11) NOT NULL,
  `uom` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_item_uom`
--

INSERT INTO `shop_item_uom` (`id`, `uom`) VALUES
(1, 'pcs'),
(2, 'pairs');

-- --------------------------------------------------------

--
-- Table structure for table `shop_stock_ledger`
--

CREATE TABLE `shop_stock_ledger` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_out` float NOT NULL,
  `item_in` float NOT NULL,
  `document_date` date NOT NULL,
  `document_source` int(11) NOT NULL,
  `document_no` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `cost_price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_stock_ledger`
--

INSERT INTO `shop_stock_ledger` (`id`, `item_id`, `item_out`, `item_in`, `document_date`, `document_source`, `document_no`, `selling_price`, `cost_price`) VALUES
(1, 1, 1, 3, '2025-05-14', 1, 1, 1, 2),
(2, 86, 0, 20, '2025-05-14', 1, 86, 125, 0),
(3, 87, 0, 20, '2025-05-14', 1, 87, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_subcategory1`
--

CREATE TABLE `shop_subcategory1` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_subcategory1`
--

INSERT INTO `shop_subcategory1` (`id`, `category_id`, `subcategory_name`) VALUES
(5, 1, 'Bags'),
(2, 1, 'Clothing'),
(3, 1, 'Clothing Accessories'),
(4, 1, 'Jewelry'),
(1, 1, 'Shoes'),
(6, 1, 'Watches'),
(7, 1, 'Wedding Wear & Accessories'),
(9, 2, 'Cars'),
(10, 2, 'Vehicle Parts & Accessories'),
(11, 2, 'Motorcycles & Scooters'),
(12, 2, 'Buses'),
(13, 2, 'Trucks & Trailers'),
(14, 2, 'Heavy Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `shop_subcategory2`
--

CREATE TABLE `shop_subcategory2` (
  `id` int(11) NOT NULL,
  `subcategory1_id` int(11) NOT NULL,
  `subcategory_name` varchar(200) NOT NULL,
  `img_url` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_subcategory2`
--

INSERT INTO `shop_subcategory2` (`id`, `subcategory1_id`, `subcategory_name`, `img_url`) VALUES
(1, 4, 'Rings', 'rings.png'),
(2, 4, 'Necklaces', 'necklesses.png'),
(3, 4, 'Bracelets', 'bracelets.png'),
(4, 4, 'Jewellery Sets', 'sets.png'),
(5, 4, 'Earrings', 'earrings.png'),
(6, 4, 'Chains', 'chains.png'),
(7, 4, 'Breaded Jewelry', 'beaded-jewelry.png'),
(8, 1, 'Sneakers', 'sneakers.png'),
(9, 1, 'Slippers', 'slippers.png'),
(10, 1, 'Loafers', 'loafers.png'),
(11, 1, 'Boots', 'boots.png'),
(12, 1, 'Sandals', 'sandals.png'),
(13, 1, 'Half Shoes', 'half-shoes.png'),
(14, 1, 'Flat Shoes', 'flat-shoes.png');

-- --------------------------------------------------------

--
-- Table structure for table `wiki_dating_profile`
--

CREATE TABLE `wiki_dating_profile` (
  `id` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `no_of_children` int(11) DEFAULT NULL,
  `is_smoke` int(11) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `region` int(2) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `about_me` varchar(1000) DEFAULT NULL,
  `about_my_partner` varchar(1000) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_disabled` int(11) DEFAULT NULL,
  `describe_disability` varchar(500) DEFAULT NULL,
  `highestedu` int(11) DEFAULT NULL,
  `profession` int(2) DEFAULT NULL,
  `monthly_net_income` float DEFAULT NULL,
  `religion` int(11) DEFAULT NULL,
  `religious_nature` int(11) DEFAULT NULL,
  `ethnicity` int(11) DEFAULT NULL,
  `specify_other` varchar(100) DEFAULT NULL,
  `hometown` varchar(50) DEFAULT NULL,
  `employedin` int(1) DEFAULT NULL,
  `skin_complexion_type` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki_dating_profile`
--

INSERT INTO `wiki_dating_profile` (`id`, `reg_date`, `fname`, `lname`, `mname`, `gender`, `date_of_birth`, `marital_status`, `no_of_children`, `is_smoke`, `languages`, `country`, `region`, `mobile_no`, `about_me`, `about_my_partner`, `height`, `weight`, `is_disabled`, `describe_disability`, `highestedu`, `profession`, `monthly_net_income`, `religion`, `religious_nature`, `ethnicity`, `specify_other`, `hometown`, `employedin`, `skin_complexion_type`) VALUES
(14, '1985-02-02', 'Kofiwsssddfe', 'Worlds', 'middle name', 1, '1985-02-06', 1, 3, 2, 'Twi, English, Hausa', 63, 5, '653', 'about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about', 'about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me about me abou', 160, 84, 1, 'describe desability', 7, 99, 210, 15, 1, 16, 'Specify ethnicity', 'Kumasi', 2, 2),
(44, '2025-02-02', 'f', 'h', '', 1, '1900-01-01', 0, 0, 0, '', 63, 0, '', '', '', 0, 0, 0, '', 0, 2, 0, 0, 0, 0, '', '', NULL, NULL),
(20, '2025-02-02', 'yaw', 'brogya', NULL, 2, NULL, NULL, NULL, 1, NULL, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(11, '2025-02-02', 'ama', 'portia', NULL, 2, NULL, NULL, NULL, NULL, NULL, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2025-02-02', 'razak', 'sumaila', NULL, 2, NULL, NULL, NULL, NULL, NULL, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '2025-02-02', 'patience', 'kuma', NULL, 2, NULL, NULL, NULL, NULL, NULL, 171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wiki_friends`
--

CREATE TABLE `wiki_friends` (
  `id` int(11) NOT NULL,
  `user_id_from` int(11) NOT NULL,
  `user_id_to` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `action_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki_friends`
--

INSERT INTO `wiki_friends` (`id`, `user_id_from`, `user_id_to`, `status`, `action_by`) VALUES
(31, 14, 20, 2, NULL),
(7, 5, 7, 1, NULL),
(19, 14, 6, 1, NULL),
(17, 11, 6, 2, NULL),
(18, 20, 11, 2, NULL),
(32, 20, 19, 2, NULL),
(33, 23, 20, 2, NULL),
(34, 14, 23, 2, NULL),
(35, 14, 19, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wiki_notification`
--

CREATE TABLE `wiki_notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(500) NOT NULL,
  `is_seen` int(1) NOT NULL,
  `is_read` int(1) NOT NULL,
  `msg_type` int(2) NOT NULL,
  `notification_date_time` datetime NOT NULL,
  `source_id` int(11) DEFAULT NULL,
  `sender_username` varchar(50) DEFAULT NULL,
  `is_sender_user` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki_notification`
--

INSERT INTO `wiki_notification` (`notification_id`, `user_id`, `url`, `is_seen`, `is_read`, `msg_type`, `notification_date_time`, `source_id`, `sender_username`, `is_sender_user`) VALUES
(161, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(160, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(159, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(158, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(156, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(196, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(155, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(154, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(153, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(144, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(148, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(149, 20, '14', 1, 1, 2, '2025-02-23 08:58:32', 57, 'Kofiwsssddfe Worlds', 1),
(150, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(151, 20, '14', 1, 1, 2, '2025-02-23 08:59:14', 59, 'Kofiwsssddfe Worlds', 1),
(147, 20, '14', 1, 1, 2, '2025-02-23 08:56:26', 55, 'Kofiwsssddfe Worlds', 1),
(140, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(141, 20, '14', 1, 1, 2, '2025-02-22 15:22:12', 52, 'Kofiwsssddfe Worlds', 1),
(136, 29, '14', 0, 0, 4, '2025-02-22 14:24:13', 0, 'N/A', 1),
(152, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(142, 20, '14', 1, 1, 2, '2025-02-22 16:02:35', 53, 'Kofiwsssddfe Worlds', 1),
(162, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(163, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(164, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(165, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(166, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(167, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(168, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(169, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(170, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(171, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(172, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(173, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(174, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(175, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(176, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(177, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(178, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(179, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(180, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(181, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(182, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(183, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(184, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(185, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(186, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(187, 20, '14', 1, 1, 2, '2025-02-23 08:58:32', 57, 'Kofiwsssddfe Worlds', 1),
(188, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(189, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(190, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(191, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(192, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(193, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(194, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(195, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(197, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(198, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(199, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(200, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(201, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(202, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(203, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(204, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(205, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(206, 20, '14', 1, 1, 2, '2025-02-23 08:58:32', 57, 'Kofiwsssddfe Worlds', 1),
(207, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(208, 20, '14', 1, 1, 2, '2025-02-23 08:59:14', 59, 'Kofiwsssddfe Worlds', 1),
(209, 20, '14', 1, 1, 2, '2025-02-23 08:56:26', 55, 'Kofiwsssddfe Worlds', 1),
(210, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(211, 20, '14', 1, 1, 2, '2025-02-22 15:22:12', 52, 'Kofiwsssddfe Worlds', 1),
(212, 29, '14', 0, 0, 4, '2025-02-22 14:24:13', 0, 'N/A', 1),
(213, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(214, 20, '14', 1, 1, 2, '2025-02-22 16:02:35', 53, 'Kofiwsssddfe Worlds', 1),
(215, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(216, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(217, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(218, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(219, 14, '/2025/01/a-178.php', 1, 1, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(220, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(221, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(222, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(223, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(224, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(225, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(226, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(227, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(228, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(229, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(230, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(231, 14, '20', 1, 1, 2, '2025-02-23 08:57:27', 56, 'yaw brogya', 1),
(232, 20, '14', 1, 1, 2, '2025-02-23 08:58:32', 57, 'Kofiwsssddfe Worlds', 1),
(233, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(234, 20, '14', 1, 1, 2, '2025-02-23 08:59:14', 59, 'Kofiwsssddfe Worlds', 1),
(235, 20, '14', 1, 1, 2, '2025-02-23 08:56:26', 55, 'Kofiwsssddfe Worlds', 1),
(236, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(237, 20, '14', 1, 1, 2, '2025-02-22 15:22:12', 52, 'Kofiwsssddfe Worlds', 1),
(238, 29, '14', 0, 0, 4, '2025-02-22 14:24:13', 0, 'N/A', 1),
(239, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(240, 20, '14', 1, 1, 2, '2025-02-22 16:02:35', 53, 'Kofiwsssddfe Worlds', 1),
(241, 14, '20', 1, 0, 4, '2025-02-22 15:21:21', 0, 'N/A', 1),
(242, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(243, 14, '20', 1, 1, 2, '2025-02-23 08:58:57', 58, 'yaw brogya', 1),
(245, 14, '/2025/01/a-178.php', 1, 0, 1, '2025-02-22 19:01:04', 246, 'Musah523', 1),
(247, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 63, 'Kofiwsssddfe Worlds', 1),
(246, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 62, 'Kofiwsssddfe Worlds', 1),
(248, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 64, 'Kofiwsssddfe Worlds', 1),
(249, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 65, 'Kofiwsssddfe Worlds', 1),
(250, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 66, 'Kofiwsssddfe Worlds', 1),
(251, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 67, 'Kofiwsssddfe Worlds', 1),
(252, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 68, 'Kofiwsssddfe Worlds', 1),
(253, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 69, 'Kofiwsssddfe Worlds', 1),
(254, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 70, 'Kofiwsssddfe Worlds', 1),
(255, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 71, 'Kofiwsssddfe Worlds', 1),
(256, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 72, 'Kofiwsssddfe Worlds', 1),
(257, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 73, 'Kofiwsssddfe Worlds', 1),
(258, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 74, 'Kofiwsssddfe Worlds', 1),
(259, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 75, 'Kofiwsssddfe Worlds', 1),
(260, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 76, 'Kofiwsssddfe Worlds', 1),
(261, 20, '14', 1, 1, 2, '2025-02-25 16:58:37', 77, 'Kofiwsssddfe Worlds', 1),
(262, 14, '20', 1, 1, 2, '2025-02-25 17:00:00', 78, 'yaw brogya', 1),
(263, 14, '20', 1, 1, 2, '2025-02-25 18:04:33', 81, 'yaw brogya', 1),
(264, 14, '20', 1, 1, 2, '2025-02-25 18:06:29', 82, 'yaw brogya', 1),
(265, 14, '20', 1, 1, 2, '2025-02-25 18:07:54', 83, 'yaw brogya', 1),
(266, 14, '20', 1, 1, 2, '2025-02-25 18:10:42', 86, 'yaw brogya', 1),
(267, 14, '20', 1, 1, 2, '2025-02-25 18:13:27', 88, 'yaw brogya', 1),
(268, 14, '20', 1, 1, 2, '2025-02-25 18:40:10', 94, 'yaw brogya', 1),
(269, 14, '20', 1, 1, 2, '2025-02-25 18:40:36', 96, 'yaw brogya', 1),
(270, 14, '20', 1, 1, 2, '2025-02-25 18:41:56', 99, 'yaw brogya', 1),
(277, 20, '14', 1, 1, 2, '2025-02-25 19:08:16', 112, 'Kofiwsssddfe Worlds', 1),
(278, 20, '14', 1, 1, 2, '2025-02-25 19:11:31', 113, 'Kofiwsssddfe Worlds', 1),
(271, 14, '20', 1, 1, 2, '2025-02-25 18:43:26', 102, 'yaw brogya', 1),
(276, 20, '14', 1, 1, 2, '2025-02-25 19:07:46', 111, 'Kofiwsssddfe Worlds', 1),
(272, 14, '20', 1, 1, 2, '2025-02-25 18:52:51', 107, 'yaw brogya', 1),
(273, 20, '14', 1, 1, 2, '2025-02-25 18:54:26', 108, 'Kofiwsssddfe Worlds', 1),
(274, 14, '20', 1, 1, 2, '2025-02-25 18:58:07', 109, 'yaw brogya', 1),
(275, 20, '14', 1, 1, 2, '2025-02-25 18:58:46', 110, 'Kofiwsssddfe Worlds', 1),
(279, 20, '14', 1, 1, 2, '2025-02-25 19:12:06', 114, 'Kofiwsssddfe Worlds', 1),
(280, 14, '20', 1, 1, 2, '2025-02-25 19:17:42', 117, 'yaw brogya', 1),
(281, 14, '20', 1, 1, 2, '2025-02-25 19:18:55', 119, 'yaw brogya', 1),
(282, 20, '14', 1, 1, 2, '2025-02-26 10:32:55', 121, 'Kofiwsssddfe Worlds', 1),
(283, 20, '14', 1, 1, 2, '2025-02-26 10:33:55', 122, 'Kofiwsssddfe Worlds', 1),
(284, 20, '14', 1, 1, 2, '2025-02-26 10:37:55', 123, 'Kofiwsssddfe Worlds', 1),
(285, 20, '14', 1, 1, 2, '2025-02-26 10:39:55', 124, 'Kofiwsssddfe Worlds', 1),
(286, 20, '14', 1, 1, 2, '2025-02-26 10:41:55', 125, 'Kofiwsssddfe Worlds', 1),
(287, 20, '14', 1, 1, 2, '2025-02-26 10:41:55', 126, 'Kofiwsssddfe Worlds', 1),
(288, 20, '14', 1, 1, 2, '2025-02-26 10:44:24', 127, 'Kofiwsssddfe Worlds', 1),
(289, 20, '14', 1, 1, 2, '2025-02-26 10:49:19', 128, 'Kofiwsssddfe Worlds', 1),
(290, 20, '14', 1, 1, 2, '2025-02-26 10:50:29', 129, 'Kofiwsssddfe Worlds', 1),
(291, 20, '14', 1, 1, 2, '2025-02-26 10:51:04', 130, 'Kofiwsssddfe Worlds', 1),
(292, 20, '14', 1, 1, 2, '2025-02-26 10:52:54', 131, 'Kofiwsssddfe Worlds', 1),
(293, 20, '14', 1, 1, 2, '2025-02-26 10:55:44', 132, 'Kofiwsssddfe Worlds', 1),
(294, 20, '14', 1, 1, 2, '2025-02-26 10:57:34', 133, 'Kofiwsssddfe Worlds', 1),
(295, 20, '14', 1, 1, 2, '2025-02-26 11:00:04', 134, 'Kofiwsssddfe Worlds', 1),
(296, 14, '20', 1, 1, 2, '2025-02-26 12:41:26', 137, 'yaw brogya', 1),
(297, 14, '20', 1, 1, 2, '2025-02-26 13:41:26', 141, 'yaw brogya', 1),
(298, 14, '20', 1, 1, 2, '2025-02-26 13:43:40', 142, 'yaw brogya', 1),
(299, 14, '20', 1, 1, 2, '2025-02-26 13:54:34', 143, 'yaw brogya', 1),
(300, 14, '20', 1, 1, 2, '2025-02-26 13:57:55', 144, 'yaw brogya', 1),
(301, 20, '14', 1, 1, 2, '2025-02-26 13:59:42', 145, 'Kofiwsssddfe Worlds', 1),
(302, 20, '14', 1, 1, 2, '2025-02-26 14:00:22', 148, 'Kofiwsssddfe Worlds', 1),
(303, 20, '14', 1, 1, 2, '2025-02-26 14:00:55', 152, 'Kofiwsssddfe Worlds', 1),
(304, 20, '14', 1, 1, 2, '2025-02-26 14:00:55', 151, 'Kofiwsssddfe Worlds', 1),
(305, 20, '14', 1, 1, 2, '2025-02-26 14:00:55', 150, 'Kofiwsssddfe Worlds', 1),
(306, 20, '14', 1, 1, 2, '2025-02-26 14:00:55', 149, 'Kofiwsssddfe Worlds', 1),
(307, 20, '14', 1, 1, 2, '2025-02-26 14:01:50', 154, 'Kofiwsssddfe Worlds', 1),
(308, 20, '14', 1, 1, 2, '2025-02-26 14:01:50', 153, 'Kofiwsssddfe Worlds', 1),
(309, 14, '20', 1, 1, 2, '2025-02-26 14:03:19', 155, 'yaw brogya', 1),
(310, 14, '20', 1, 1, 2, '2025-02-26 14:07:49', 157, 'yaw brogya', 1),
(311, 14, '20', 1, 1, 2, '2025-02-26 14:12:40', 158, 'yaw brogya', 1),
(312, 14, '20', 1, 1, 2, '2025-02-26 14:13:09', 159, 'yaw brogya', 1),
(313, 14, '20', 1, 1, 2, '2025-02-26 14:13:19', 160, 'yaw brogya', 1),
(314, 14, '20', 1, 1, 2, '2025-02-26 14:13:24', 161, 'yaw brogya', 1),
(326, 14, '20', 1, 1, 2, '2025-02-26 17:07:01', 173, 'yaw brogya', 1),
(316, 14, '20', 1, 1, 2, '2025-02-26 14:17:24', 163, 'yaw brogya', 1),
(317, 20, '14', 1, 1, 2, '2025-02-26 14:18:41', 164, 'Kofiwsssddfe Worlds', 1),
(318, 14, '20', 1, 1, 2, '2025-02-26 14:21:49', 165, 'yaw brogya', 1),
(319, 20, '14', 1, 1, 2, '2025-02-26 14:22:27', 166, 'Kofiwsssddfe Worlds', 1),
(320, 20, '14', 1, 1, 2, '2025-02-26 15:59:53', 167, 'Kofiwsssddfe Worlds', 1),
(321, 20, '14', 1, 1, 2, '2025-02-26 16:08:18', 168, 'Kofiwsssddfe Worlds', 1),
(322, 20, '14', 1, 1, 2, '2025-02-26 16:09:08', 169, 'Kofiwsssddfe Worlds', 1),
(323, 20, '14', 1, 1, 2, '2025-02-26 16:09:58', 170, 'Kofiwsssddfe Worlds', 1),
(324, 20, '14', 1, 1, 2, '2025-02-26 16:14:23', 171, 'Kofiwsssddfe Worlds', 1),
(325, 14, '20', 1, 1, 2, '2025-02-26 16:17:20', 172, 'yaw brogya', 1),
(327, 14, '20', 1, 1, 2, '2025-02-26 17:15:33', 174, 'yaw brogya', 1),
(328, 14, '20', 1, 1, 2, '2025-02-26 19:49:15', 175, 'yaw brogya', 1),
(329, 14, '20', 1, 1, 2, '2025-02-26 19:49:48', 176, 'yaw brogya', 1),
(330, 14, '20', 1, 1, 2, '2025-02-26 19:56:55', 177, 'yaw brogya', 1),
(331, 20, '14', 1, 1, 2, '2025-02-26 22:50:33', 178, 'Kofiwsssddfe Worlds', 1),
(332, 20, '14', 1, 1, 2, '2025-02-26 23:14:21', 179, 'Kofiwsssddfe Worlds', 1),
(333, 20, '14', 1, 1, 2, '2025-02-27 10:25:55', 180, 'Kofiwsssddfe Worlds', 1),
(334, 20, '14', 1, 1, 2, '2025-02-27 10:47:35', 181, 'Kofiwsssddfe Worlds', 1),
(335, 14, '20', 1, 1, 2, '2025-02-28 08:18:50', 182, 'yaw brogya', 1),
(336, 14, '20', 1, 1, 2, '2025-02-28 08:19:50', 183, 'yaw brogya', 1),
(337, 20, '14', 1, 1, 2, '2025-02-28 08:21:52', 184, 'Kofiwsssddfe Worlds', 1),
(338, 20, '14', 1, 1, 2, '2025-02-28 08:22:40', 185, 'Kofiwsssddfe Worlds', 1),
(339, 14, '20', 1, 1, 2, '2025-02-28 08:54:19', 186, 'yaw brogya', 1),
(340, 14, '20', 1, 1, 2, '2025-02-28 08:56:30', 187, 'yaw brogya', 1),
(341, 20, '14', 1, 1, 2, '2025-02-28 09:18:42', 188, 'Kofiwsssddfe Worlds', 1),
(342, 20, '14', 1, 1, 2, '2025-02-28 09:19:02', 189, 'Kofiwsssddfe Worlds', 1),
(343, 20, '14', 1, 1, 2, '2025-02-28 09:19:47', 190, 'Kofiwsssddfe Worlds', 1),
(344, 20, '14', 1, 1, 2, '2025-02-28 09:20:17', 191, 'Kofiwsssddfe Worlds', 1),
(345, 20, '14', 1, 1, 2, '2025-02-28 09:21:07', 192, 'Kofiwsssddfe Worlds', 1),
(346, 20, '14', 1, 1, 2, '2025-02-28 09:21:42', 193, 'Kofiwsssddfe Worlds', 1),
(347, 20, '14', 1, 1, 2, '2025-02-28 10:26:07', 194, 'Kofiwsssddfe Worlds', 1),
(348, 20, '14', 1, 1, 2, '2025-02-28 10:29:47', 195, 'Kofiwsssddfe Worlds', 1),
(349, 20, '14', 1, 1, 2, '2025-02-28 10:29:57', 196, 'Kofiwsssddfe Worlds', 1),
(350, 20, '14', 1, 1, 2, '2025-02-28 10:30:07', 197, 'Kofiwsssddfe Worlds', 1),
(351, 20, '14', 1, 1, 2, '2025-02-28 10:39:42', 198, 'Kofiwsssddfe Worlds', 1),
(352, 20, '14', 1, 1, 2, '2025-02-28 10:39:57', 199, 'Kofiwsssddfe Worlds', 1),
(353, 20, '14', 1, 1, 2, '2025-02-28 10:41:02', 200, 'Kofiwsssddfe Worlds', 1),
(354, 20, '14', 1, 1, 2, '2025-02-28 11:42:12', 201, 'Kofiwsssddfe Worlds', 1),
(355, 20, '14', 1, 1, 2, '2025-02-28 11:45:02', 202, 'Kofiwsssddfe Worlds', 1),
(356, 20, '14', 1, 1, 2, '2025-02-28 11:46:12', 203, 'Kofiwsssddfe Worlds', 1),
(357, 20, '14', 1, 1, 2, '2025-02-28 11:48:37', 204, 'Kofiwsssddfe Worlds', 1),
(358, 20, '14', 1, 1, 2, '2025-02-28 11:49:42', 205, 'Kofiwsssddfe Worlds', 1),
(359, 20, '14', 1, 1, 2, '2025-02-28 11:52:57', 206, 'Kofiwsssddfe Worlds', 1),
(360, 20, '14', 1, 1, 2, '2025-02-28 11:53:02', 207, 'Kofiwsssddfe Worlds', 1),
(361, 20, '14', 1, 1, 2, '2025-02-28 11:53:12', 208, 'Kofiwsssddfe Worlds', 1),
(362, 20, '14', 1, 1, 2, '2025-02-28 11:53:22', 209, 'Kofiwsssddfe Worlds', 1),
(363, 20, '14', 1, 1, 2, '2025-02-28 11:55:27', 210, 'Kofiwsssddfe Worlds', 1),
(364, 20, '14', 1, 1, 2, '2025-02-28 12:00:02', 211, 'Kofiwsssddfe Worlds', 1),
(365, 20, '14', 1, 1, 2, '2025-02-28 12:07:37', 212, 'Kofiwsssddfe Worlds', 1),
(366, 20, '14', 1, 1, 2, '2025-02-28 12:09:27', 213, 'Kofiwsssddfe Worlds', 1),
(367, 20, '14', 1, 1, 2, '2025-02-28 12:10:27', 214, 'Kofiwsssddfe Worlds', 1),
(368, 20, '14', 1, 1, 2, '2025-02-28 12:11:02', 215, 'Kofiwsssddfe Worlds', 1),
(369, 20, '14', 1, 1, 2, '2025-02-28 12:11:42', 216, 'Kofiwsssddfe Worlds', 1),
(370, 20, '14', 1, 1, 2, '2025-02-28 12:12:52', 217, 'Kofiwsssddfe Worlds', 1),
(371, 20, '14', 1, 1, 2, '2025-02-28 12:14:32', 218, 'Kofiwsssddfe Worlds', 1),
(372, 20, '14', 1, 1, 2, '2025-02-28 12:17:32', 219, 'Kofiwsssddfe Worlds', 1),
(373, 20, '14', 1, 1, 2, '2025-02-28 12:18:22', 220, 'Kofiwsssddfe Worlds', 1),
(374, 20, '14', 1, 1, 2, '2025-02-28 12:18:52', 221, 'Kofiwsssddfe Worlds', 1),
(375, 20, '14', 1, 1, 2, '2025-02-28 12:19:52', 222, 'Kofiwsssddfe Worlds', 1),
(376, 20, '14', 1, 1, 2, '2025-02-28 12:36:22', 223, 'Kofiwsssddfe Worlds', 1),
(377, 20, '14', 1, 1, 2, '2025-02-28 12:37:57', 224, 'Kofiwsssddfe Worlds', 1),
(378, 20, '14', 1, 1, 2, '2025-02-28 12:39:17', 225, 'Kofiwsssddfe Worlds', 1),
(379, 20, '14', 1, 1, 2, '2025-02-28 12:40:47', 226, 'Kofiwsssddfe Worlds', 1),
(380, 20, '14', 1, 1, 2, '2025-02-28 12:42:12', 227, 'Kofiwsssddfe Worlds', 1),
(381, 14, '20', 1, 1, 2, '2025-02-28 12:44:13', 228, 'yaw brogya', 1),
(382, 20, '14', 1, 1, 2, '2025-02-28 12:45:38', 229, 'Kofiwsssddfe Worlds', 1),
(383, 20, '14', 1, 1, 2, '2025-02-28 12:46:27', 230, 'Kofiwsssddfe Worlds', 1),
(384, 20, '14', 1, 1, 2, '2025-02-28 12:47:15', 231, 'Kofiwsssddfe Worlds', 1),
(385, 20, '14', 1, 1, 2, '2025-02-28 12:48:49', 232, 'Kofiwsssddfe Worlds', 1),
(386, 20, '14', 1, 1, 2, '2025-02-28 12:50:39', 233, 'Kofiwsssddfe Worlds', 1),
(387, 20, '14', 1, 1, 2, '2025-02-28 12:53:13', 234, 'Kofiwsssddfe Worlds', 1),
(388, 20, '14', 1, 1, 2, '2025-02-28 12:53:55', 235, 'Kofiwsssddfe Worlds', 1),
(389, 20, '14', 1, 1, 2, '2025-02-28 12:54:23', 236, 'Kofiwsssddfe Worlds', 1),
(390, 20, '14', 1, 1, 2, '2025-02-28 12:55:26', 237, 'Kofiwsssddfe Worlds', 1),
(391, 20, '14', 1, 1, 2, '2025-02-28 12:56:24', 238, 'Kofiwsssddfe Worlds', 1),
(392, 20, '14', 1, 1, 2, '2025-02-28 13:00:55', 239, 'Kofiwsssddfe Worlds', 1),
(393, 20, '14', 1, 1, 2, '2025-02-28 13:07:13', 240, 'Kofiwsssddfe Worlds', 1),
(394, 20, '14', 1, 1, 2, '2025-02-28 13:10:15', 241, 'Kofiwsssddfe Worlds', 1),
(395, 20, '14', 1, 1, 2, '2025-02-28 13:16:51', 242, 'Kofiwsssddfe Worlds', 1),
(396, 20, '14', 1, 1, 2, '2025-02-28 13:21:38', 243, 'Kofiwsssddfe Worlds', 1),
(397, 14, '20', 1, 1, 2, '2025-02-28 13:22:20', 244, 'yaw brogya', 1),
(398, 20, '14', 1, 1, 2, '2025-02-28 13:23:16', 245, 'Kofiwsssddfe Worlds', 1),
(399, 20, '14', 1, 1, 2, '2025-02-28 13:24:26', 246, 'Kofiwsssddfe Worlds', 1),
(400, 20, '14', 1, 1, 2, '2025-02-28 13:24:47', 247, 'Kofiwsssddfe Worlds', 1),
(401, 20, '14', 1, 1, 2, '2025-02-28 13:25:01', 248, 'Kofiwsssddfe Worlds', 1),
(402, 20, '14', 1, 1, 2, '2025-02-28 13:27:42', 249, 'Kofiwsssddfe Worlds', 1),
(403, 20, '14', 1, 1, 2, '2025-02-28 13:27:49', 250, 'Kofiwsssddfe Worlds', 1),
(404, 20, '14', 1, 1, 2, '2025-02-28 14:39:35', 251, 'Kofiwsssddfe Worlds', 1),
(405, 14, '20', 1, 1, 2, '2025-02-28 14:46:01', 252, 'yaw brogya', 1),
(406, 14, '20', 1, 1, 2, '2025-02-28 14:46:49', 253, 'yaw brogya', 1),
(407, 20, '14', 1, 1, 2, '2025-02-28 15:14:51', 254, 'Kofiwsssddfe Worlds', 1),
(408, 20, '14', 1, 1, 2, '2025-02-28 15:24:04', 255, 'Kofiwsssddfe Worlds', 1),
(409, 20, '14', 1, 1, 2, '2025-02-28 15:29:26', 256, 'Kofiwsssddfe Worlds', 1),
(410, 20, '14', 1, 1, 2, '2025-02-28 15:33:49', 257, 'Kofiwsssddfe Worlds', 1),
(411, 20, '14', 1, 1, 2, '2025-02-28 15:34:36', 258, 'Kofiwsssddfe Worlds', 1),
(412, 20, '14', 1, 1, 2, '2025-02-28 15:36:19', 259, 'Kofiwsssddfe Worlds', 1),
(413, 20, '14', 1, 1, 2, '2025-02-28 15:47:03', 261, 'Kofiwsssddfe Worlds', 1),
(414, 20, '14', 1, 1, 2, '2025-02-28 15:47:03', 260, 'Kofiwsssddfe Worlds', 1),
(415, 20, '14', 1, 1, 2, '2025-02-28 15:47:17', 262, 'Kofiwsssddfe Worlds', 1),
(416, 20, '14', 1, 1, 2, '2025-02-28 16:11:54', 264, 'Kofiwsssddfe Worlds', 1),
(417, 20, '14', 1, 1, 2, '2025-02-28 16:11:54', 263, 'Kofiwsssddfe Worlds', 1),
(418, 20, '14', 1, 1, 2, '2025-02-28 16:20:46', 266, 'Kofiwsssddfe Worlds', 1),
(419, 20, '14', 1, 1, 2, '2025-02-28 16:20:46', 265, 'Kofiwsssddfe Worlds', 1),
(420, 20, '14', 1, 1, 2, '2025-02-28 16:32:54', 267, 'Kofiwsssddfe Worlds', 1),
(421, 20, '14', 1, 1, 2, '2025-02-28 16:33:36', 268, 'Kofiwsssddfe Worlds', 1),
(422, 20, '14', 1, 1, 2, '2025-02-28 22:17:42', 269, 'Kofiwsssddfe Worlds', 1),
(423, 20, '14', 1, 1, 2, '2025-03-01 09:44:36', 270, 'Kofiwsssddfe Worlds', 1),
(424, 20, '14', 1, 1, 2, '2025-03-01 09:50:36', 271, 'Kofiwsssddfe Worlds', 1),
(425, 20, '14', 1, 1, 2, '2025-03-01 10:05:36', 275, 'Kofiwsssddfe Worlds', 1),
(426, 20, '14', 1, 1, 2, '2025-03-01 10:17:36', 278, 'Kofiwsssddfe Worlds', 1),
(427, 20, '14', 1, 1, 2, '2025-03-01 10:17:36', 279, 'Kofiwsssddfe Worlds', 1),
(428, 20, '14', 1, 1, 2, '2025-03-01 10:21:36', 280, 'Kofiwsssddfe Worlds', 1),
(429, 20, '14', 1, 1, 2, '2025-03-01 13:40:30', 281, 'Kofiwsssddfe Worlds', 1),
(430, 20, '14', 1, 1, 2, '2025-03-01 13:41:30', 282, 'Kofiwsssddfe Worlds', 1),
(431, 20, '14', 1, 1, 2, '2025-03-01 13:46:30', 283, 'Kofiwsssddfe Worlds', 1),
(432, 20, '14', 1, 1, 2, '2025-03-01 13:50:30', 284, 'Kofiwsssddfe Worlds', 1),
(433, 20, '14', 1, 1, 2, '2025-03-01 13:50:30', 285, 'Kofiwsssddfe Worlds', 1),
(434, 20, '14', 1, 1, 2, '2025-03-01 13:51:30', 286, 'Kofiwsssddfe Worlds', 1),
(435, 20, '14', 1, 1, 2, '2025-03-01 14:05:30', 287, 'Kofiwsssddfe Worlds', 1),
(436, 14, '20', 1, 1, 2, '2025-03-01 15:04:58', 288, 'yaw brogya', 1),
(437, 20, '14', 1, 1, 2, '2025-03-01 15:18:12', 289, 'Kofiwsssddfe Worlds', 1),
(438, 20, '14', 1, 1, 2, '2025-03-01 15:18:19', 290, 'Kofiwsssddfe Worlds', 1),
(439, 20, '14', 1, 1, 2, '2025-03-01 20:59:24', 291, 'Kofiwsssddfe Worlds', 1),
(440, 20, '14', 1, 1, 2, '2025-03-01 21:00:24', 292, 'Kofiwsssddfe Worlds', 1),
(441, 14, '20', 1, 1, 2, '2025-03-01 21:08:24', 293, 'yaw brogya', 1),
(442, 20, '14', 1, 1, 2, '2025-03-03 08:46:53', 294, 'Kofiwsssddfe Worlds', 1),
(443, 20, '14', 1, 1, 2, '2025-03-05 22:22:29', 295, 'Kofiwsssddfe Worlds', 1),
(444, 20, '14', 1, 1, 2, '2025-03-05 22:25:29', 296, 'Kofiwsssddfe Worlds', 1),
(445, 20, '14', 1, 1, 2, '2025-03-05 22:26:29', 297, 'Kofiwsssddfe Worlds', 1),
(446, 20, '14', 1, 1, 2, '2025-03-05 22:28:44', 299, 'Kofiwsssddfe Worlds', 1),
(447, 20, '14', 1, 1, 2, '2025-03-05 22:29:40', 300, 'Kofiwsssddfe Worlds', 1),
(448, 14, '20', 1, 1, 2, '2025-03-05 22:32:12', 302, 'yaw brogya', 1),
(449, 20, '14', 1, 1, 2, '2025-03-05 22:32:56', 303, 'Kofiwsssddfe Worlds', 1),
(450, 20, '14', 1, 1, 2, '2025-03-05 22:33:29', 304, 'Kofiwsssddfe Worlds', 1),
(451, 6, '14', 0, 0, 3, '2025-03-08 16:21:41', 0, 'N/A', 1),
(452, 20, '14', 1, 1, 2, '2025-03-08 16:47:55', 305, 'Kofiwsssddfe Worlds', 1),
(453, 20, '14', 1, 1, 2, '2025-03-08 16:49:03', 306, 'Kofiwsssddfe Worlds', 1),
(454, 20, '14', 1, 1, 2, '2025-03-08 16:51:04', 307, 'Kofiwsssddfe Worlds', 1),
(455, 20, '14', 1, 1, 2, '2025-03-08 16:51:39', 308, 'Kofiwsssddfe Worlds', 1),
(456, 20, '14', 1, 1, 2, '2025-03-08 16:54:41', 309, 'Kofiwsssddfe Worlds', 1),
(457, 20, '14', 1, 1, 2, '2025-03-08 16:55:30', 310, 'Kofiwsssddfe Worlds', 1),
(458, 20, '14', 1, 1, 2, '2025-03-08 16:58:25', 311, 'Kofiwsssddfe Worlds', 1),
(459, 20, '14', 1, 1, 2, '2025-03-08 16:58:53', 312, 'Kofiwsssddfe Worlds', 1),
(460, 20, '14', 1, 1, 2, '2025-03-08 16:59:00', 313, 'Kofiwsssddfe Worlds', 1),
(461, 20, '14', 1, 1, 2, '2025-03-08 17:02:02', 314, 'Kofiwsssddfe Worlds', 1),
(462, 20, '14', 1, 1, 2, '2025-03-08 17:02:37', 315, 'Kofiwsssddfe Worlds', 1),
(463, 20, '14', 1, 1, 2, '2025-03-08 17:05:11', 316, 'Kofiwsssddfe Worlds', 1),
(464, 20, '14', 1, 1, 2, '2025-03-08 17:06:07', 317, 'Kofiwsssddfe Worlds', 1),
(465, 20, '14', 1, 1, 2, '2025-03-08 17:14:03', 318, 'Kofiwsssddfe Worlds', 1),
(466, 20, '14', 1, 1, 2, '2025-03-08 17:14:10', 319, 'Kofiwsssddfe Worlds', 1),
(467, 20, '14', 1, 1, 2, '2025-03-08 20:16:10', 320, 'Kofiwsssddfe Worlds', 1),
(468, 20, '14', 1, 1, 2, '2025-03-08 20:20:36', 321, 'Kofiwsssddfe Worlds', 1),
(469, 20, '14', 1, 1, 2, '2025-03-08 20:21:18', 322, 'Kofiwsssddfe Worlds', 1),
(470, 20, '14', 1, 1, 2, '2025-03-08 20:22:28', 323, 'Kofiwsssddfe Worlds', 1),
(471, 20, '14', 1, 1, 2, '2025-03-08 20:27:29', 324, 'Kofiwsssddfe Worlds', 1),
(472, 20, '14', 1, 1, 2, '2025-03-08 20:28:25', 325, 'Kofiwsssddfe Worlds', 1),
(473, 20, '14', 1, 1, 2, '2025-03-08 20:29:28', 326, 'Kofiwsssddfe Worlds', 1),
(474, 20, '14', 1, 1, 2, '2025-03-08 20:31:27', 327, 'Kofiwsssddfe Worlds', 1),
(475, 20, '14', 1, 1, 2, '2025-03-09 15:56:25', 328, 'Kofiwsssddfe Worlds', 1),
(476, 20, '14', 1, 1, 2, '2025-03-09 15:56:25', 329, 'Kofiwsssddfe Worlds', 1),
(477, 20, '14', 1, 1, 2, '2025-03-09 15:56:25', 330, 'Kofiwsssddfe Worlds', 1),
(478, 20, '14', 1, 1, 2, '2025-03-09 15:56:25', 331, 'Kofiwsssddfe Worlds', 1),
(479, 20, '14', 1, 1, 2, '2025-03-09 15:56:25', 332, 'Kofiwsssddfe Worlds', 1),
(480, 20, '14', 1, 1, 2, '2025-03-09 15:56:25', 333, 'Kofiwsssddfe Worlds', 1),
(481, 20, '14', 1, 1, 2, '2025-03-09 16:11:48', 334, 'Kofiwsssddfe Worlds', 1),
(482, 14, '20', 1, 1, 2, '2025-03-09 16:40:25', 335, 'yaw brogya', 1),
(483, 20, '14', 1, 1, 2, '2025-03-09 16:40:48', 336, 'Kofiwsssddfe Worlds', 1),
(484, 20, '14', 1, 1, 2, '2025-03-09 16:41:20', 338, 'Kofiwsssddfe Worlds', 1),
(485, 20, '14', 1, 1, 2, '2025-03-09 16:42:10', 339, 'Kofiwsssddfe Worlds', 1),
(486, 14, '20', 1, 1, 2, '2025-03-09 16:42:32', 341, 'yaw brogya', 1),
(487, 14, '20', 1, 1, 2, '2025-03-09 16:44:12', 343, 'yaw brogya', 1),
(488, 14, '20', 1, 1, 2, '2025-03-09 16:44:32', 345, 'yaw brogya', 1),
(489, 14, '20', 1, 1, 2, '2025-03-09 16:45:32', 349, 'yaw brogya', 1),
(490, 20, '14', 1, 1, 2, '2025-03-09 16:49:07', 350, 'Kofiwsssddfe Worlds', 1),
(491, 20, '14', 1, 1, 2, '2025-03-09 16:49:47', 352, 'Kofiwsssddfe Worlds', 1),
(492, 14, '20', 1, 1, 2, '2025-03-09 16:50:19', 353, 'yaw brogya', 1),
(493, 14, '20', 1, 1, 2, '2025-03-09 16:51:19', 357, 'yaw brogya', 1),
(494, 14, '20', 1, 1, 2, '2025-03-09 16:51:19', 358, 'yaw brogya', 1),
(495, 20, '14', 1, 1, 2, '2025-03-09 16:51:54', 360, 'Kofiwsssddfe Worlds', 1),
(496, 14, '20', 1, 1, 2, '2025-03-09 16:52:59', 362, 'yaw brogya', 1),
(497, 14, '20', 1, 1, 2, '2025-03-09 16:54:19', 363, 'yaw brogya', 1),
(498, 14, '20', 1, 1, 2, '2025-03-09 16:58:37', 364, 'yaw brogya', 1),
(499, 14, '20', 1, 1, 2, '2025-03-09 16:59:17', 366, 'yaw brogya', 1),
(500, 20, '14', 1, 1, 2, '2025-03-09 17:17:14', 371, 'Kofiwsssddfe Worlds', 1),
(501, 20, '14', 1, 1, 2, '2025-03-09 19:50:53', 375, 'Kofiwsssddfe Worlds', 1),
(502, 20, '14', 1, 1, 2, '2025-03-09 20:24:02', 386, 'Kofiwsssddfe Worlds', 1),
(503, 14, '20', 1, 1, 2, '2025-03-09 20:25:39', 387, 'yaw brogya', 1),
(504, 14, '20', 1, 1, 2, '2025-03-09 20:37:49', 388, 'yaw brogya', 1),
(505, 14, '20', 1, 1, 2, '2025-03-09 20:40:49', 389, 'yaw brogya', 1),
(506, 14, '20', 1, 1, 2, '2025-03-09 20:41:09', 390, 'yaw brogya', 1),
(507, 14, '20', 1, 1, 2, '2025-03-09 20:41:49', 391, 'yaw brogya', 1),
(508, 14, '20', 1, 1, 2, '2025-03-09 20:44:27', 392, 'yaw brogya', 1),
(509, 14, '20', 1, 1, 2, '2025-03-09 20:44:27', 393, 'yaw brogya', 1),
(510, 14, '20', 1, 1, 2, '2025-03-09 21:39:53', 409, 'yaw brogya', 1),
(511, 14, '20', 1, 1, 2, '2025-03-09 21:40:53', 410, 'yaw brogya', 1),
(512, 14, '20', 1, 1, 2, '2025-03-09 21:41:51', 411, 'yaw brogya', 1),
(513, 14, '20', 1, 1, 2, '2025-03-09 21:41:51', 412, 'yaw brogya', 1),
(514, 14, '20', 1, 1, 2, '2025-03-10 10:44:53', 419, 'yaw brogya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wiki_posts`
--

CREATE TABLE `wiki_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post` varchar(3000) NOT NULL,
  `status` int(1) NOT NULL,
  `security` int(1) NOT NULL,
  `post_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki_posts`
--

INSERT INTO `wiki_posts` (`id`, `user_id`, `post`, `status`, `security`, `post_date_time`) VALUES
(6, 14, 'Hello world', 1, 1, '2025-03-20 15:02:41'),
(7, 14, 'Hello frieds,\r\nHow are you doing?\r\nIt just begun !', 1, 1, '2025-03-20 15:18:57'),
(8, 14, 'Good morning friends\r\nIt\'s me again', 1, 1, '2025-03-21 10:04:42'),
(19, 20, 'Hello world', 1, 1, '2025-03-23 21:11:29'),
(20, 20, 'come here boy.\r\nhow are you?', 1, 1, '2025-03-23 21:12:55'),
(21, 14, '<blockquote class="twitter-tweet" data-media-max-width="560"><p lang="zxx" dir="ltr"><a href="https://t.co/xeCJgvyb9D">pic.twitter.com/xeCJgvyb9D</a></p>&mdash; Kwadwo Sheldon (@kwadwosheldon) <a href="https://twitter.com/kwadwosheldon/status/1903955945325203605?ref_src=twsrc%5Etfw">March 23, 2025</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>', 1, 1, '2025-03-24 09:56:41'),
(10, 14, '<div>', 1, 1, '2025-03-21 10:07:24'),
(11, 14, '<div>hi', 1, 1, '2025-03-21 10:07:53'),
(12, 14, '<iframe src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fweb.facebook.com%2Freel%2F9692717760795405%2F&show_text=false&width=267&t=0" width="267" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>', 1, 1, '2025-03-21 10:16:38'),
(13, 14, '<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@willsmith/video/7481699258819693870" data-video-id="7481699258819693870" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@willsmith" href="https://www.tiktok.com/@willsmith?refer=embed">@willsmith</a> Waited 35 years for this dance to trend.  Ib: @Mimii <a target="_blank" title="â™¬ Anxiety - Doechii" href="https://www.tiktok.com/music/Anxiety-7474209817062574850?refer=embed">â™¬ Anxiety - Doechii</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>', 1, 1, '2025-03-21 22:17:38'),
(14, 14, '<blockquote class="twitter-tweet" data-media-max-width="560"><p lang="qme" dir="ltr">ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚ <a href="https://t.co/2keHI8Jrlo">pic.twitter.com/2keHI8Jrlo</a></p>&mdash; Serwaa Amihere (@Serwaa_Amihere) <a href="https://twitter.com/Serwaa_Amihere/status/1902751598650044430?ref_src=twsrc%5Etfw">March 20, 2025</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>', 1, 1, '2025-03-21 22:21:04'),
(15, 14, '<iframe width="560" height="315" src="https://www.youtube.com/embed/9Cg3ArPwz6s?si=10v3pvdjnT5ZBDVp" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>', 1, 1, '2025-03-21 22:29:47'),
(22, 14, '<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2FChannel1tvgh%2Fposts%2Fpfbid026GLYWQKGF1dVGubiKTjT73T6Df5x1Sps4Zrg2aNnEFFTVXhhmQzUrJzkxpHzhSdpl&show_text=true&width=500" width="500" height="792" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>', 1, 1, '2025-03-24 21:56:15'),
(23, 14, '<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fweb.facebook.com%2Fmawuni%2Fposts%2Fpfbid02BcGzLotknxBCHUVgtqydEab4DMRiyu6235qjESjdn3kHDypbMt8cQydtuG32BLQml&show_text=true&width=500" width="500" height="474" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>', 1, 1, '2025-03-24 22:06:43'),
(24, 14, '<iframe width="560" height="315" src="https://www.youtube.com/embed/GSBQMAFoFkg?si=-WnMLwnjkhX2ijBi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>', 1, 1, '2025-03-24 22:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `wiki_users`
--

CREATE TABLE `wiki_users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_level` int(10) NOT NULL,
  `is_active` int(1) DEFAULT NULL,
  `pass_code` varchar(100) DEFAULT NULL,
  `creation_date_time` datetime DEFAULT NULL,
  `is_verified` int(1) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki_users`
--

INSERT INTO `wiki_users` (`user_id`, `full_name`, `email`, `password`, `user_level`, `is_active`, `pass_code`, `creation_date_time`, `is_verified`, `shop_id`) VALUES
(46, 'Rukaiya', 'rukaiya2@gmail.com', '$2y$10$LZGQDvEberbO8F8Y7VTFSONmAT.NuEyNuuNMZA5HQ1Uj.t6fZMgii', 3, 1, 'K6Q8579JGYLmtusnwpg10kDFOcZBx3XTSWIHaf4MyvNrzlkRbPgiA2eVChUdEo', '2025-01-12 09:00:09', 1, 2),
(43, 'Maruf Ibrahim', 'info@wikighana.com', '$2y$10$CgupL0KtbTM.kIJuMBE2eOO1QTPmiUh/fuhZD44urQbbkquQZ3LTK', 1, 1, '2g5Frzfd86SOZcbY7lpQ3HI4t1NsPeUuhEKD0yanGvVkXwxRJWTLBMkC9iAmog', '2024-11-25 11:24:56', 1, 1),
(47, 'mandd', 'come@gmail.com', NULL, 4, 1, 'gwL7ScUKfXC2doJVgTInk134p5r0iMRFshkDAtuzvByl8aGQ9bmWNZPexOYEH6', '2025-04-30 13:02:37', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wiki_visitors`
--

CREATE TABLE `wiki_visitors` (
  `user_id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `pass_code` varchar(500) NOT NULL,
  `is_active` int(1) NOT NULL,
  `username` varchar(500) NOT NULL,
  `creation_date_time` datetime DEFAULT NULL,
  `is_verified` int(1) DEFAULT NULL,
  `is_subscribed` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wiki_visitors`
--

INSERT INTO `wiki_visitors` (`user_id`, `email`, `password`, `pass_code`, `is_active`, `username`, `creation_date_time`, `is_verified`, `is_subscribed`) VALUES
(26, 'mant2@gmail.com', '$2y$10$ONk6hETLw2EgGDFiG9y0D.gjVLfzC0QgC58jUVlMs9z.vpCFVQ5BO', 'NTnyAJQDVa5LHrmbkMsEot320BOdxFI4fpUzXPWZuh8S9g7cGlKwgk6C1RYevi', 1, 'Kofifru6', '2025-03-17 08:31:31', 0, 0),
(25, 'mant@gmail.com', '$2y$10$Yo/YTdNMppxx/V8fqDPtZeHaa/C73vI.ljAqCG9YHnPj4O200SALS', 'eaJ98MWxtYzhN2bOs7pZGPndSgloCU3DALcwIfkXv0FiTVmkB5rRuyE6Q41HgK', 1, 'Kofifru', '2025-03-13 09:13:42', 0, 0),
(24, 'man@gmail.com', '$2y$10$SlkvykK08z7A1S/HPoLrS.zoy7rU2ABG8XzAQ1OttXX6JRSNhNSyi', 'Cwtvx0ZNQGSamnODTIP4MUk7hF3ybkgHVcfpgJRlAu8KY9r12ozdLesB5X6EWi', 1, 'Kofifr', '2025-03-13 09:12:00', 0, 0),
(23, 'kofi@yahoo.com', '$2y$10$qweZl7uQONOas0NEjpLLy.xVV.GUtjj/4ibn0ijU0xi4ZSD8Y8Sgu', 'FlyaNkd648UW7BXGCE9tRiISLYKPwozVThkOfrpZne0Q51JmcDbxAgH3u2Mgvs', 1, 'kofi23', '2025-01-30 21:27:13', 1, 0),
(15, 'chris@yahoo.com', '$2y$10$qweZl7uQONOas0NEjpLLy.xVV.GUtjj/4ibn0ijU0xi4ZSD8Y8Sgu', 'FlyaNkd648UW7BXGCE9tRiISLYKPwozVThkOfrpZne0Q51JmcDbxAgH3u2Mgvs', 1, 'chris24', '2025-01-30 21:27:13', 1, 0),
(6, 'yaw596@yahoo.com', '$2y$10$qweZl7uQONOas0NEjpLLy.xVV.GUtjj/4ibn0ijU0xi4ZSD8Y8Sgu', 'FlyaNkd648UW7BXGCE9tRiISLYKPwozVThkOfrpZne0Q51JmcDbxAgH3u2Mgvs', 1, 'Yaw693', '2025-01-30 21:27:13', 1, 0),
(20, 'ibra@yahoo.com', '$2y$10$qweZl7uQONOas0NEjpLLy.xVV.GUtjj/4ibn0ijU0xi4ZSD8Y8Sgu', 'FlyaNkd648UW7BXGCE9tRiISLYKPwozVThkOfrpZne0Q51JmcDbxAgH3u2Mgvs', 1, 'Musah523', '2025-01-30 21:27:13', 1, 0),
(14, 'marufibra@yahoo.com', '$2y$10$qweZl7uQONOas0NEjpLLy.xVV.GUtjj/4ibn0ijU0xi4ZSD8Y8Sgu', 'FlyaNkd648UW7BXGCE9tRiISLYKPwozVThkOfrpZne0Q51JmcDbxAgH3u2Mgvs', 1, 'Maruf_Visitor', '2025-01-30 21:27:13', 1, 0),
(27, 'kofi123@gmail.com', '$2y$10$VpFvnDizUWtaZsoXQJA9I.r5MJjg/pcEwwYK0i8G5IrPAUUnvm6JW', 'QYdSWrk6zepgvyE3RH1O7lnsAhIPXw2aNFBKD9L45McVfobmti0u8gkZxUCTGJ', 1, 'Kofi123', '2025-05-16 12:28:05', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `comment_reaction`
--
ALTER TABLE `comment_reaction`
  ADD PRIMARY KEY (`reaction_id`);

--
-- Indexes for table `content_reaction`
--
ALTER TABLE `content_reaction`
  ADD PRIMARY KEY (`reaction_id`);

--
-- Indexes for table `dating_images`
--
ALTER TABLE `dating_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcm_token`
--
ALTER TABLE `fcm_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `CategoryID` (`category_id`);

--
-- Indexes for table `news_comment`
--
ALTER TABLE `news_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `news_content`
--
ALTER TABLE `news_content`
  ADD PRIMARY KEY (`content_id`),
  ADD UNIQUE KEY `contentID` (`content_id`);
ALTER TABLE `news_content` ADD FULLTEXT KEY `subject` (`subject`,`content`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_brand`
--
ALTER TABLE `shop_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_customer`
--
ALTER TABLE `shop_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_item`
--
ALTER TABLE `shop_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_item_uom`
--
ALTER TABLE `shop_item_uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_stock_ledger`
--
ALTER TABLE `shop_stock_ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_subcategory1`
--
ALTER TABLE `shop_subcategory1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_subcategory2`
--
ALTER TABLE `shop_subcategory2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki_dating_profile`
--
ALTER TABLE `wiki_dating_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki_friends`
--
ALTER TABLE `wiki_friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki_notification`
--
ALTER TABLE `wiki_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `wiki_posts`
--
ALTER TABLE `wiki_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wiki_users`
--
ALTER TABLE `wiki_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UserID` (`user_id`);

--
-- Indexes for table `wiki_visitors`
--
ALTER TABLE `wiki_visitors`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;
--
-- AUTO_INCREMENT for table `comment_reaction`
--
ALTER TABLE `comment_reaction`
  MODIFY `reaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;
--
-- AUTO_INCREMENT for table `content_reaction`
--
ALTER TABLE `content_reaction`
  MODIFY `reaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `dating_images`
--
ALTER TABLE `dating_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `fcm_token`
--
ALTER TABLE `fcm_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `news_comment`
--
ALTER TABLE `news_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `news_content`
--
ALTER TABLE `news_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `shop_brand`
--
ALTER TABLE `shop_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `shop_customer`
--
ALTER TABLE `shop_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shop_item`
--
ALTER TABLE `shop_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `shop_item_uom`
--
ALTER TABLE `shop_item_uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shop_stock_ledger`
--
ALTER TABLE `shop_stock_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shop_subcategory1`
--
ALTER TABLE `shop_subcategory1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `shop_subcategory2`
--
ALTER TABLE `shop_subcategory2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `wiki_friends`
--
ALTER TABLE `wiki_friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `wiki_notification`
--
ALTER TABLE `wiki_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;
--
-- AUTO_INCREMENT for table `wiki_posts`
--
ALTER TABLE `wiki_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `wiki_users`
--
ALTER TABLE `wiki_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `wiki_visitors`
--
ALTER TABLE `wiki_visitors`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
