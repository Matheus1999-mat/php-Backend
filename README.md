# PHP Backend System

## Overview

This PHP Backend System is designed for managing contacts. It includes a CRUD (Create, Read, Update, Delete) functionality and user authentication.

## Installation

Follow these steps to download and set up the system:

1. ##Download from GitHub:## 

2. ##Open XAMPP:##
    - Start Apache.
    - Start MySQL.

3. ##Database Setup:##
    - Create a database named "contacts" in MySQL.

4. ##Project Placement:##
    - Paste the "crud" folder into the `htdocs` folder inside XAMPP.

5. ##Open in VS Code:##
    - Open the "crud" folder in VS Code. Ensure that it is opened from the `htdocs` directory.

6. ##Database Table Creation:##
    - Open the "contacts.sql" file in VS Code and execute the script to create the "contacts" table.
    ```sql
    CREATE TABLE `contacts` (
      `id` int(11) NOT NULL AUTO_INCREMENT primary key,
      `fullName` varchar(200) NOT NULL,
      `phone` varchar(100) NOT NULL,
      `email` varchar(200) NOT NULL,
      `address` varchar(300) NOT NULL,
      `relation` varchar(100) NOT NULL,
      `created_at` datetime NOT NULL DEFAULT current_timestamp()
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

    - Create another table called "user" using this script:
    ```sql
    CREATE TABLE `user` (
        `id` int(11) NOT NULL AUTO_INCREMENT primary key,
        `email` varchar(100) DEFAULT NULL,
        `password` varchar(255) DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ```

7. ##Access the System:##
    - Type "localhost/crud/login.php" in your browser.
