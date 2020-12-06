DROP DATABASE IF EXISTS SchemaDB;
CREATE DATABASE SchemaDB;
USE SchemaDB;

GRANT ALL PRIVILEGES ON world.* TO 'project2_user'@'localhost' IDENTIFIED BY 'password123';

CREATE TABLE UsersTable (
   id INT AUTO_INCREMENT,
   firstname VARCHAR(64),
   lastname VARCHAR(64),
   password VARCHAR(64),
   email VARCHAR(64),
   date_joined DATETIME,
   PRIMARY KEY(id));
   
INSERT INTO UsersTable (firstname, lastname, password, email, date_joined) VALUES ('Marcia', 'Brady', MD5('password123'), 'admin@project2.com', '2012-01-01 00:00:00');
INSERT INTO UsersTable (firstname, lastname, password, email, date_joined) VALUES ('LeBron', 'James', MD5('12345'), 'lbjames@bugme.com', '2019-09-12 13:23:42');
INSERT INTO UsersTable (firstname, lastname, password, email, date_joined) VALUES ('James', 'Jones', MD5('12345'), 'jamesjones@bugme.com', '2019-11-21 19:44:02');
INSERT INTO UsersTable (firstname, lastname, password, email, date_joined) VALUES ('Jackie', 'Sharp', MD5('12345'), 'jackiesharp@bugme.com', '2012-01-01 00:00:00');

CREATE TABLE IssuesTable (
   id INT AUTO_INCREMENT,
   title VARCHAR(64),
   description TEXT(64),
   type  VARCHAR(64),
   priority VARCHAR(64),
   status VARCHAR(64),
   assigned_to INT,
   created_by INT,
   created DATETIME,
   updated DATETIME,
   date_joined DATETIME,
   PRIMARY KEY(id));


INSERT INTO IssuesTable (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('XSS Vulnerability in Add User Form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Major', 'OPEN', 1, 1, '2019-11-01 16:30:12', '2019-11-08 10:00:00');
INSERT INTO IssuesTable (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Location Service isnt working', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Bug', 'Major', 'OPEN', 2, 1, '2019-10-15 16:30:12', '2019-12-08 10:00:00');
INSERT INTO IssuesTable (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Setup Logger', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Major', 'CLOSED', 3, 1, '2019-08-10 18:32:12', '2019-10-18 01:00:00');
INSERT INTO IssuesTable (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Create API Documentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Minor', 'IN PROGRESS', 4, 1, '2019-10-29 17:33:12', '2019-11-29 12:34:18');