CREATE DATABASE pets;

CREATE TABLE users (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(255), birthdate varchar(255),
                    email varchar(255), photo varchar(255), address varchar(255), password varchar(255));

CREATE TABLE pets (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(255), description varchar(255),
                    type varchar(255), photo varchar(255), adoption_state tinyint,  user_id int, FOREIGN KEY (user_id) REFERENCES users(id));

CREATE TABLE records (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, user_id int, pet_id int, FOREIGN KEY (user_id) REFERENCES users(id),
                     FOREIGN KEY (pet_id) REFERENCES pets(id));
