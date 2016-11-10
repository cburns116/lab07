/* This creates the database */

CREATE DATABASE IF NOT EXISTS `websyslab8` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `websyslab8`;

/*This adds the tables*/

CREATE TABLE IF NOT EXISTS `courses` (
  `crn` int(11) NOT NULL,
  `prefix` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`crn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `students` (
  `rin` int(9) NOT NULL,
  `rscID` char(7) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`rin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


/* This is part 2 */
ALTER TABLE `courses`
 ADD `section` int(1) NOT NULL,
 ADD `year` int(4) NOT NULL;

ALTER TABLE `students`
 ADD `street` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 ADD `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
 ADD `st` char(2) COLLATE utf8_unicode_ci NOT NULL,
 ADD `zip` int(5) NOT NULL;

CREATE TABLE IF NOT EXISTS `grades` (
`id` int(11) NOT NULL,
  `crn` int(5) NOT NULL,
  `rin` int(9) NOT NULL,
  `grade` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`crn`) REFERENCES courses(`crn`),
  FOREIGN KEY (`rin`) REFERENCES students(`rin`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;


/*This Inserts data */
INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
(35090, 'PSYC', 1200, 'General Psychology', 2, 2016),
(35098, 'CIVL', 4080, 'Concrete Design', 1, 2016),
(35297, 'MATH', 2400, 'Introduction to Differential Equations', 3, 2016),
(35301, 'ARTS', 1020, 'Media Studio: Imaging', 1, 2016),
(35303, 'ECON', 1200, 'Introductory Economics', 2, 2016),
(35439, 'CSCI', 1100, 'Computer Science 1', 4, 2016),
(35444, 'CSCI', 1200, 'Data Structures', 3, 2016),
(35512, 'MATH', 1020, 'Calculus 1', 1, 2016),
(35672, 'CHEM', 1100, 'Chemistry', 3, 2016),
(37889, 'BIOL', 1010, 'Introduction to Biology', 2, 2016);




INSERT INTO `students` (`rin`, `rscID`, `first_name`, `last_name`, `alias`, `phone`, `street`, `city`, `st`, `zip`) VALUES
(661198084, 'tedds8', 'Theodore', 'Roosevelt', 'Teddy', 1234543210, '19 Roosevelt Ln', 'Ann Arbor', 'MI', 11093),
(661198086, 'bushg6', 'George', 'Bush', 'N/A', 1234543999, '19 Bush Ln', 'Troy', 'NY', 11083),
(661498071, 'obama5', 'Barack', 'Obama', 'N/A', 2147483647, '50 Obama Ln', 'San Diego', 'CA', 12333),
(661498081, 'linc3', 'Abraham', 'Lincoln', 'N/A', 2147483647, '30 Lincoln Ln', 'Las Vegas', 'NV', 12349),
(661498084, 'burnsc7', 'Corey', 'Burns', 'N/A', 2147483647, '7 Fox Meadow Ln', 'Lloyd Harbor', 'NY', 11743),
(661498085, 'georgew', 'George', 'Washington', 'N/A', 1234567890, '8 Washington Ln', 'Washington D.C.', 'MD', 12345),
(661498086, 'johna7', 'John', 'Adams', 'N/A', 1234567899, '10 Adams Ln', 'Dallas', 'TX', 12346),
(661498087, 'jjeff7', 'Thomas', 'Jefferson', 'N/A', 1234567891, '12 Jefferson Ln', 'Seattle', 'WA', 12347),
(661498771, 'clinb1', 'Bill', 'Clinton', 'N/A', 2147483647, '38 Clinton Ln', 'San Diego', 'CA', 12322),
(661498991, 'linc3', 'Abraham', 'Lincoln', 'N/A', 2147483647, '30 Lincoln Ln', 'Las Vegas', 'NV', 12349);




INSERT INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
(1, 35090, 661498991, 94),
(2, 35098, 661498771, 95),
(3, 35297, 661498087, 86),
(4, 35301, 661498086, 57),
(5, 35303, 661498085, 91),
(6, 35439, 661498084, 80),
(7, 35444, 661498081, 91),
(8, 35512, 661498071, 82),
(9, 35672, 661198086, 49),
(10, 37889, 661198084, 69),
(11, 35090, 661198084, 92),
(12, 35098, 661198086, 93),
(13, 35297, 661498071, 87),
(14, 35301, 661498081, 58),
(15, 35303, 661498084, 92),
(16, 35439, 661498085, 81),
(17, 35444, 661498086, 92),
(18, 35512, 661498087, 80),
(19, 35672, 661498771, 47),
(20, 37889, 661498991, 68);


/* 7: Sorts students in order of rin lastname firstname */
SELECT * FROM `students` ORDER BY `rin`, `last_name`, `first_name` ASC

/* 8: Displays students with above a 90*/
SELECT students.rin, `first_name`, `last_name`, `address_st`, `address_city`, `address_state`, `address_zip`
FROM `students`
INNER JOIN `grades`
ON grades.grade>90 and grades.rin = students.rin;

/*9: lists outs averages for specific class: 2 entries 93 and 95, and displayed 94 as the average */
SELECT avg(grades.grade)
FROM `grades`
WHERE grades.crn = 35098;

/* 10: lists out the number of student */
select count(*) from `students`

