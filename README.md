# Inventory Management System

## Overview
The Inventory Management System is a web-based application designed to help businesses manage their stock, suppliers, and purchase orders easily. It allows an admin to add, update, and track products, manage suppliers, and generate reports from one centralized dashboard.

---

## Technologies Used
- **Frontend:** HTML, CSS  
- **Backend:** PHP, MySQL  
- **Additional Tools:** JavaScript, XAMPP (for local hosting)

---

## Setup Instructions

### 1. Install XAMPP
1. Download XAMPP from [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)  
2. Install XAMPP using default settings (keep Apache and MySQL checked)  

### 2. Start the Server
1. Open **XAMPP Control Panel**  
2. Click **Start** for **Apache** and **MySQL**  
3. Both should turn green (this means they are running)

### 3. Copy Project Files
1. Go to your XAMPP folder (default: `C:\xampp\htdocs`)  
2. Copy the `Inventory-System` project folder here

### 4. Set Up the Database
1. Open browser → go to: `http://localhost/phpmyadmin`  
2. Create a new database called `inventory_db`  
3. Import the SQL file located at `Inventory-System/sql/inventory_db.sql` to create the tables

### 5. Run the Project
1. Open browser → go to: `http://localhost/Inventory-System/index.php`  
2. Login using your admin credentials (or create new if not set)  
3. You can now navigate the dashboard, add products, manage suppliers, and view reports

---

## Project Structure
