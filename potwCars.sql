DROP TABLE IF EXISTS `potwCars`;

CREATE TABLE `potwCars` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `lotnum` int(10) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `aucstatus` char(40) NOT NULL,
  `votenum` int(5) NOT NULL,
  `imagefilename` varchar(50) NOT NULL,
  `seatnum` varchar(20) NOT NULL,
  `doornum` varchar(20) NOT NULL,
  `fueltype` varchar(20) NOT NULL,
  `vehtype` varchar(20) NOT NULL,
  `engsize` varchar(20) NOT NULL,
  `transmission` varchar(20) NOT NULL,
  PRIMARY KEY (`carID`),
  UNIQUE KEY `lotnum` (`lotnum`)
) ENGINE=InnoDB;

-- INSERT INTO `potwCars` VALUES (1,'000001', 'BMW','M3 Saloon','10,000','Not Sold','0',' ');
-- INSERT INTO `potwCars` VALUES (2,'000002', 'Ford','KA','2,000','Not Sold','0',' ');
-- INSERT INTO `potwCars` VALUES (3,'000003', 'VW','Golf','8,000','Not Sold','0',' ');
-- INSERT INTO `potwCars` VALUES (4,'000004', 'Citroen','C4','6,000','Not Sold','0',' ');