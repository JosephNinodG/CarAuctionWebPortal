CREATE TABLE `adminuser` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) NOT NULL,
  `adminname` varchar(20) NOT NULL,
  `adminpass` varchar(40) NOT NULL,
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2;

INSERT INTO `adminuser` VALUES (1,'Administrator','admin01','admin01');

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `votes` int(10) NOT NULL,
  `comments` int(10) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2;

INSERT INTO `users` VALUES (1,'SMITH,John','jsmith01','jsmith01password',0,0);

CREATE TABLE `carcomments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `carID` int(10) NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB;

ALTER TABLE `carcomments`
  ADD CONSTRAINT `carcomments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `carcomments_ibfk_2` FOREIGN KEY (`carID`) REFERENCES `potwCars` (`carID`);