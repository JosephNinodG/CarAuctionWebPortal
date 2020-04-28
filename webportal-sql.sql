
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) NOT NULL,
  `adminname` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3;

INSERT INTO `admin` VALUES (1,'Administrator','admin01abc','admin01abc');
INSERT INTO `admin` VALUES (2,'NINO-DE-GUZMAN,Joseph','jnino01','jninojnino123');

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `votes` int(10) NOT NULL,
  `comments` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2;

INSERT INTO `users` VALUES (1,'SMITH,John','jsmith01','jsmith01password',0,0);

CREATE TABLE `carcomments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(200) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `carID` int(10) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `carcomments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`), 
  ADD KEY `carID` (`carID`);