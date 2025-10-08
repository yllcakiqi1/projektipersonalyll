CREATE DATABASE appointment_db;

USE appointment_db;

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    note TEXT
);

CREATE TABLE admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin_users (username, password)
VALUES ('admin', SHA2('admin123', 256));
