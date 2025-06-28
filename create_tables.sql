CREATE DATABASE IF NOT EXISTS exam_system;
USE exam_system;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES ('student', '1234');

CREATE TABLE IF NOT EXISTS questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question TEXT,
    option_a VARCHAR(255),
    option_b VARCHAR(255),
    option_c VARCHAR(255),
    option_d VARCHAR(255),
    correct CHAR(1)
);

INSERT INTO questions (question, option_a, option_b, option_c, option_d, correct) VALUES
('Capital of Bangladesh?', 'Mumbai', 'Dhaka', 'Kathmandu', 'Colombo', 'B'),
('5 + 3 = ?', '6', '7', '8', '9', 'C');

CREATE TABLE IF NOT EXISTS results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    score INT,
    total INT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);