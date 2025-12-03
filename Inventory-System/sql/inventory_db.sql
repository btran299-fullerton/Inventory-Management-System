-- Create database
CREATE DATABASE IF NOT EXISTS inventory_db;
USE inventory_db;

-- USERS TABLE
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- INSERT ADMIN USER (plain password for testing)
INSERT INTO users (username, password)
VALUES ('admin', 'admin123');

-- PRODUCTS TABLE
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    quantity INT,
    price DECIMAL(10,2)
);

-- SUPPLIERS TABLE
CREATE TABLE suppliers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    contact VARCHAR(100)
);

-- PURCHASE ORDERS TABLE
CREATE TABLE purchase_orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    supplier_id INT,
    quantity INT,
    date_created DATE,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (supplier_id) REFERENCES suppliers(id)
);
