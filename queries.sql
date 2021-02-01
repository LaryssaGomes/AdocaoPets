CREATE DATABASE pets;

CREATE TABLE users (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(255), birthdate varchar(255),
                    email varchar(255), photo varchar(255), address varchar(255), password varchar(255));

CREATE TABLE pets (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(255), description varchar(255),
                    type varchar(255), photo varchar(255), user_id int, FOREIGN KEY (user_id) REFERENCES users(id));