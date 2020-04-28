DROP TABLE IF EXISTS `potwCars`;

CREATE TABLE `potwCars` (
  `carID` int(11) NOT NULL AUTO_INCREMENT,
  `lotnum` int(10) NOT NULL,
  `make` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `aucstatus` char(40) NOT NULL,
  `votenum` int(5) NOT NULL,
  PRIMARY KEY (`carID`),
  UNIQUE KEY `lotnum` (`lotnum`)
) ENGINE=InnoDB;