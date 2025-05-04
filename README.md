
# 📚 Bibliophile – Bookstore Web Application

A dynamic and user-friendly full-stack **bookstore web application** built with HTML, CSS, PHP, and Microsoft SQL Server. The project allows users to explore a collection of books, register accounts, borrow and return books, and leave reviews — with a dedicated admin dashboard to manage the system.

---

## 🌟 Overview

**Bibliophile** is designed for book lovers who want a seamless and intuitive digital library experience. It simulates a real-world bookstore or library system with features for:

- User registration & login  
- Book browsing and search  
- Borrowing & returning books  
- Ratings & reviews  
- Admin panel to manage the system  

---

## 🛠️ Tech Stack

| Layer        | Technology           |
|--------------|----------------------|
| Frontend     | HTML5, CSS3          |
| Backend      | PHP (Procedural)     |
| Database     | Microsoft SQL Server |
| Tools Used   | VS Code, XAMPP/WAMP  |

---

## 💡 Features

### 👥 User Side
- Sign up and log in
- Browse and search books
- Borrow and return books
- Submit reviews and ratings
- View personal borrowing history

### 🔐 Admin Side
- Add/update/delete books
- Manage user accounts and borrowing logs
- Monitor site activity and feedback

---

## 🚀 Getting Started

### 📥 Step 1: Clone the Repository

Clone this project to your local machine:

```bash
git clone https://github.com/Khan-bibi/bibliophile-bookstore-app.git
```

---

### ✅ Step 2: Move Project to Server Directory

Copy the project folder to your local web server directory.

**Example (for XAMPP users):**

```
C:/xampp/htdocs/bibliophile-bookstore-app/
```

---

### ⚙️ Step 3: Start Server & Database

1. Launch **XAMPP** or **WAMP**.
2. Start the following services:
   - **Apache**
   - **Microsoft SQL Server**

---

### 🗄️ Step 4: Create and Import the Database

1. Open **SQL Server Management Studio (SSMS)**.
2. Create a new database named:

   ```
   bibliophile
   ```

3. Import the SQL script located at:

   ```
   /sql/bibliophile_db.sql
   ```

   This will create the necessary tables and populate them with sample data.

---

### 🔧 Step 5: Configure the Database Connection

1. Open the file:

   ```
   php/db_connect.php
   ```

2. Update your database connection credentials:

   ```php
   $serverName = "localhost";
   $connectionOptions = array(
       "Database" => "bibliophile",
       "Uid" => "your_username",
       "PWD" => "your_password"
   );
   ```

---

### 🌐 Step 6: Run the Application

Open your browser and go to:

```
http://localhost/bibliophile-bookstore-app/
```

You should now see the homepage or login screen.

---

## 🧪 Test & Explore

- Register as a new user
- Log in using test credentials (if provided)
- Browse books, borrow and return them
- Leave reviews
- Log in as admin to manage the system

---

## 📄 License

This project is intended for **educational purposes** and personal learning only.

---

## 🙌 Contributions

Pull requests are welcome! Feel free to fork the repo and submit improvements.

---
