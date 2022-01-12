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
  `day` ENUM ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Suturday', 'Sunday') COMMENT 'enum with the days of the week',
  `time` int,
  `data` int DEFAULT 0,
  PRIMARY KEY (`poi`, `day`, `time`)
);

CREATE TABLE `UserVisits` (
  `user` varchar(255),
  `poi` varchar(255),
  `timestamp` datetime DEFAULT NOW(),
  `report` int
);

CREATE TABLE `Cases` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(255),
  `date` date
);

ALTER TABLE `Types` ADD FOREIGN KEY (`poi`) REFERENCES `POI` (`id`);

ALTER TABLE `PopularTimes` ADD FOREIGN KEY (`poi`) REFERENCES `POI` (`id`);

ALTER TABLE `UserVisits` ADD FOREIGN KEY (`user`) REFERENCES `User` (`username`);

ALTER TABLE `UserVisits` ADD FOREIGN KEY (`poi`) REFERENCES `POI` (`id`);

ALTER TABLE `Cases` ADD FOREIGN KEY (`user`) REFERENCES `User` (`username`);


ALTER TABLE `User` COMMENT = "The table where user information and their role is stored";

ALTER TABLE `POI` COMMENT = "This information is collected using this library: https://github.com/m-wrzr/populartimes ";

ALTER TABLE `Types` COMMENT = "We use this table to store the types of each Point of Interest";

ALTER TABLE `PopularTimes` COMMENT = "The data for the popular times as given by the Google API";

ALTER TABLE `UserVisits` COMMENT = "Here we store the reported visits of the user, as well as the reported number of people present";

ALTER TABLE `Cases` COMMENT = "Here we store the user reported cases of CoVID19";
