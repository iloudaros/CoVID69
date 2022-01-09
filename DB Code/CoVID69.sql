CREATE TABLE `User` (
  `username` varchar(255) PRIMARY KEY,
  `password` varchar(255),
  `email` varchar(255),
  `is_manager` bit DEFAULT 0
);

CREATE TABLE `POI` (
  `id` varchar(255) PRIMARY KEY,
  `name` varchar(255),
  `address` varchar(255),
  `lat` float,
  `lng` float,
  `rating` float4 DEFAULT 0,
  `rating_n` int DEFAULT 0
);

CREATE TABLE `Types` (
  `poi` varchar(255),
  `type` varchar(255),
  PRIMARY KEY (`poi`, `type`)
);

CREATE TABLE `PopularTimes` (
  `poi` varchar(255),
  `day` day,
  `time` int,
  `data` int DEFAULT 0,
  PRIMARY KEY (`poi`, `day`, `time`)
);

CREATE TABLE `UserVisits` (
  `user` varchar(255),
  `poi` varchar(255),
  `timestamp` datetime DEFAULT (NOW()),
  `report` int
);

CREATE TABLE `Cases` (
  `user` varchar(255) PRIMARY KEY,
  `date` date
);

ALTER TABLE `Types` ADD FOREIGN KEY (`poi`) REFERENCES `POI` (`id`);

ALTER TABLE `PopularTimes` ADD FOREIGN KEY (`poi`) REFERENCES `POI` (`id`);

ALTER TABLE `UserVisits` ADD FOREIGN KEY (`user`) REFERENCES `User` (`username`);

ALTER TABLE `UserVisits` ADD FOREIGN KEY (`poi`) REFERENCES `POI` (`id`);

ALTER TABLE `Cases` ADD FOREIGN KEY (`user`) REFERENCES `User` (`username`);

