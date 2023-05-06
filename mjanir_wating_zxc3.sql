SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `mjanir_wating_zxc3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mjanir_wating_zxc3`;

CREATE TABLE `log_lkjh` (
  `logid` bigint(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `actiontype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `log_lkjh` (`logid`, `name`, `logtime`, `actiontype`) VALUES
(3, 'A', '2023-05-05 23:23:36', 'Added to waitinglist'),
(4, 'B', '2023-05-05 23:23:39', 'Added to waitinglist'),
(5, 'C', '2023-05-05 23:23:42', 'Added to waitinglist'),
(6, 'D', '2023-05-05 23:23:45', 'Added to waitinglist'),
(7, 'Tom', '2023-05-05 23:23:55', 'Added to waitinglist'),
(8, 'Kaan', '2023-05-05 23:24:09', 'Added to waitinglist'),
(9, 'Joe', '2023-05-05 23:24:18', 'Added to waitinglist'),
(10, 'Martin', '2023-05-05 23:24:26', 'Added to waitinglist'),
(11, 'Nurdan', '2023-05-05 23:24:37', 'Added to waitinglist'),
(12, 'Gokhan', '2023-05-05 23:24:48', 'Added to waitinglist');

CREATE TABLE `player_lkjh` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `groupnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `player_lkjh` (`id`, `name`, `addtime`, `groupnumber`) VALUES
(2, 'A', '2023-05-05 23:23:45', 1),
(3, 'B', '2023-05-05 23:23:45', 1),
(4, 'C', '2023-05-05 23:23:45', 1),
(5, 'D', '2023-05-05 23:23:45', 1),
(6, 'Tom', '2023-05-05 23:24:26', 2),
(7, 'Kaan', '2023-05-05 23:24:26', 2),
(8, 'Joe', '2023-05-05 23:24:26', 2),
(9, 'Martin', '2023-05-05 23:24:26', 2),
(10, 'Nurdan', '2023-05-05 23:24:37', 0),
(11, 'Gokhan', '2023-05-05 23:24:48', 0);


ALTER TABLE `log_lkjh`
  ADD PRIMARY KEY (`logid`);

ALTER TABLE `player_lkjh`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `log_lkjh`
  MODIFY `logid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `player_lkjh`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
