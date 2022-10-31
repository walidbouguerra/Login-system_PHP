# PROCEDURAL PHP LOGIN SYSTEM

##TO USE IT :

- connect to your database in /php/includes/database-inc.php
- create a database "loginsystem"
- create a table "users"

##SQL :
CREATE DATABASE loginsystem;
CREATE TABLE users (
user_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
username VARCHAR(128) NOT NULL,
email VARCHAR(128) NOT NULL,
pwd VARCHAR(128) NOT NULL
);
