
DROP DATABASE IF EXISTS college_database;
CREATE DATABASE college_database;
USE college_database;



CREATE TABLE academicnews(

anewsID				INT								PRIMARY KEY 	AUTO_INCREMENT,
title 				VARCHAR(50)		NOT NULL,
anewsContent		TEXT			NOT NULL,
imagePath			VARCHAR(200)									DEFAULT NULL,
timeNews 			DATE         	NOT NULL

);



CREATE TABLE campusnews(

cnewsID				INT								PRIMARY KEY		AUTO_INCREMENT,
title				VARCHAR(50)		NOT NULL,
cnewsContent		TEXT			NOT NULL,
imagePath			VARCHAR(200)									DEFAULT NULL,
timeNews 			DATE 			NOT NULL

);


CREATE TABLE clubs_society(

clubID				INT  							PRIMARY KEY		AUTO_INCREMENT,
clubName			VARCHAR(20)		NOT NULL								UNIQUE,
clubLogoPath		VARCHAR(50)		NOT NULL,	
clubPresident 		VARCHAR(20)		NOT NULL,
clubVicePresident	VARCHAR(20)		NOT NULL,
clubDetails			TEXT			DEFAULT NULL

);


GRANT SELECT
ON college_database.*
to machines@localhost
IDENTIFIED BY 'yomama';


INSERT INTO academicnews (title,anewsContent,timeNews) VALUES
('A-Level Exam timetable', 'New Time table for A-Level Examnination'  ,'1000-10-10'),
('AS Trial Date', 'Here are the AS Trial Date'  , '2012-2-1'),
('A2 Examination', 'Here are the A2 Examination Date'  , NOW()),
('Extension of Lab Exam', 'Lab exam shall be extended'  , NOW()),
('Group 12 class changes', 'Class changes due to some spaces allocated for event'  , NOW()),
('Lab closure', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.
ulla consequat massa', NOW());


INSERT INTO campusnews (title, cnewsContent, timeNews) VALUES
('New Club', 'Engineering Club is established'  ,'1000-10-10'),
('Upcoming Event', 'Fiesta de Voice'  , '2012-2-1'),
('Top 10 volunteering activities around campus', 'Reading Bus'  , NOW()),
('Recruitment Drive', 'Happening at main campus on 15th April'  , NOW()),
('SDC new staff', 'Mr Ali'  , NOW()),
('Top 10 smartest in A level', 'Definitely not you reading this'  , NOW())

