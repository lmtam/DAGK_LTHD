-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.16-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table maybay.chitietchuyenbay
CREATE TABLE IF NOT EXISTS `chitietchuyenbay` (
  `Madatcho` char(50) NOT NULL,
  `Machuyenbay` char(50) NOT NULL,
  `Ngay` date NOT NULL,
  `Hang` char(1) NOT NULL,
  `Mucgia` char(2) NOT NULL,
  PRIMARY KEY (`Madatcho`,`Machuyenbay`,`Ngay`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table maybay.chitietchuyenbay: ~2 rows (approximately)
/*!40000 ALTER TABLE `chitietchuyenbay` DISABLE KEYS */;
INSERT INTO `chitietchuyenbay` (`Madatcho`, `Machuyenbay`, `Ngay`, `Hang`, `Mucgia`) VALUES
	('ABCXYZ', 'BL326', '2016-10-05', 'Y', 'E'),
	('ABCXYZ', 'BL327', '2016-10-06', 'Y', 'E');
/*!40000 ALTER TABLE `chitietchuyenbay` ENABLE KEYS */;


-- Dumping structure for table maybay.chuyenbay
CREATE TABLE IF NOT EXISTS `chuyenbay` (
  `Machuyenbay` char(50) NOT NULL,
  `Tenchuyenbay` varchar(100) NOT NULL,
  `Noidi` varchar(50) NOT NULL,
  `Noiden` varchar(50) NOT NULL,
  `Ngay` date NOT NULL,
  `Gio` time DEFAULT NULL,
  `Hang` enum('Y','C') NOT NULL,
  `Mucgia` char(2) NOT NULL,
  `Soluongghe` int(11) DEFAULT NULL,
  `Giaban` int(11) DEFAULT NULL,
  PRIMARY KEY (`Machuyenbay`,`Noidi`,`Noiden`,`Ngay`,`Hang`,`Mucgia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table maybay.chuyenbay: ~5 rows (approximately)
/*!40000 ALTER TABLE `chuyenbay` DISABLE KEYS */;
INSERT INTO `chuyenbay` (`Machuyenbay`, `Tenchuyenbay`, `Noidi`, `Noiden`, `Ngay`, `Gio`, `Hang`, `Mucgia`, `Soluongghe`, `Giaban`) VALUES
	('BL326', 'Sài Gòn - Tuy Hòa', 'SGN', 'TBB', '2016-10-05', '08:45:00', 'Y', 'E', 100, 100000),
	('BL326', 'Sài Gòn - Tuy Hòa', 'SGN', 'TBB', '2016-10-05', '08:45:00', 'Y', 'F', 20, 10000),
	('BL326', 'Sài Gòn - Tuy Hòa', 'SGN', 'TBB', '2016-10-05', '08:45:00', 'C', 'G', 10, 500000),
	('BL327', 'Tuy Hòa - Sài Gòn ', 'TBB', 'SGN', '2016-10-06', '10:30:00', 'Y', 'E', 100, 100000),
	('BL328', 'Sài Gòn- Đà Nẵng', 'SGN', 'DNN', '2016-10-24', '13:00:00', 'Y', 'E', 100, 500000);
/*!40000 ALTER TABLE `chuyenbay` ENABLE KEYS */;


-- Dumping structure for table maybay.datcho
CREATE TABLE IF NOT EXISTS `datcho` (
  `Madatcho` char(6) NOT NULL,
  `Thoigiandatcho` datetime NOT NULL,
  `Tongtien` int(11) NOT NULL,
  `Trangthai` char(1) NOT NULL,
  `Danhxung` varchar(10) NOT NULL,
  `Hoten` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `SDT` char(15) NOT NULL,
  PRIMARY KEY (`Madatcho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table maybay.datcho: ~0 rows (approximately)
/*!40000 ALTER TABLE `datcho` DISABLE KEYS */;
INSERT INTO `datcho` (`Madatcho`, `Thoigiandatcho`, `Tongtien`, `Trangthai`, `Danhxung`, `Hoten`, `Email`, `SDT`) VALUES
	('ABCXYZ', '2016-05-01 10:00:00', 400000, '1', '', '', '', '0');
/*!40000 ALTER TABLE `datcho` ENABLE KEYS */;


-- Dumping structure for table maybay.hanhkhach
CREATE TABLE IF NOT EXISTS `hanhkhach` (
  `Madatcho` char(50) NOT NULL,
  `Danhxung` char(10) NOT NULL,
  `Ho` char(10) NOT NULL,
  `Ten` char(50) NOT NULL,
  `Maghe` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table maybay.hanhkhach: ~2 rows (approximately)
/*!40000 ALTER TABLE `hanhkhach` DISABLE KEYS */;
INSERT INTO `hanhkhach` (`Madatcho`, `Danhxung`, `Ho`, `Ten`, `Maghe`) VALUES
	('ABCXYZ', 'MR', 'NGUYEN', 'VAN A', ''),
	('ABCXYZ', 'MS', 'TRAN', 'THI B', '');
/*!40000 ALTER TABLE `hanhkhach` ENABLE KEYS */;


-- Dumping structure for table maybay.sanbay
CREATE TABLE IF NOT EXISTS `sanbay` (
  `masanbay` char(3) NOT NULL,
  `tensanbay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table maybay.sanbay: ~5 rows (approximately)
/*!40000 ALTER TABLE `sanbay` DISABLE KEYS */;
INSERT INTO `sanbay` (`masanbay`, `tensanbay`) VALUES
	('SGN', 'TP.HCM'),
	('TBB', 'Phú Yên'),
	('HNN', 'Hà Nội'),
	('DNN', 'Đà Nẵng'),
	('VCA', 'Cần Thơ');
/*!40000 ALTER TABLE `sanbay` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
