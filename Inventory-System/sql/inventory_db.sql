-- Create database
CREATE DATABASE IF NOT EXISTS inventory_db;
USE inventory_db;

-- USERS TABLE
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('admin','user') NOT NULL
);

-- INSERT USERS (plain text passwords)
INSERT INTO users (username, password, role) VALUES 
('admin', 'admin123', 'admin'),
('user1', 'user123', 'user');

-- PRODUCTS TABLE
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    quantity INT,
    price DECIMAL(10,2)
);
