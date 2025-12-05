# Inventory Management System

## Overview
The Inventory Management System is a web-based application that helps businesses manage their products, stock levels, and suppliers in one place. It allows an **admin** to add, update, and delete products, track stock, manage suppliers, and view reports. A **user** can view products and their details.

---

## Technologies Used
- **Frontend:** HTML, CSS  
- **Backend:** PHP, MySQL  
- **Additional Tools:** JavaScript, XAMPP (for local hosting)

---

## Features
- Admin login and authentication  
- User login and authentication  
- Admin dashboard with key inventory stats  
- Add, edit, and delete products (Admin only)  
- View product list and details (Both Admin & User)  
- Manage suppliers (Admin only)  
- Track stock levels  
- Logout functionality  

---

## Setup Instructions

### 1. Install XAMPP
1. Download XAMPP: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)  
2. Install XAMPP using default settings. Make sure **Apache** and **MySQL** are selected.  

### 2. Start the Server
1. Open **XAMPP Control Panel**  
2. Click **Start** for **Apache** and **MySQL**  
3. Both services should turn green

### 3. Copy Project Files
1. Go to your XAMPP installation folder (default: `C:\xampp\htdocs`)  
2. Copy the `Inventory-System` folder here

### 4. Set Up the Database
1. Open your browser → `http://localhost/phpmyadmin`  
2. Create a database named `inventory_db`  
3. Import the SQL file: `Inventory-System/sql/inventory_db.sql`  
4. Make sure the **users table** has at least:  
   - Admin: `username: admin`, `password: admin123`  
   - User: `username: user1`, `password: user123`

### 5. Run the Project
1. Open your browser → `http://localhost/Inventory-System/index.php`  
2. Login as **admin** or **user1**  
3. Explore the dashboards:  
   - **Admin:** can manage products and suppliers  
   - **User:** can view products  

---

## Notes
- Do **not rename** the folder; keep it as `Inventory-System`  
- All database changes are stored in `inventory_db`  
- For any issues, ensure **Apache and MySQL** are running  