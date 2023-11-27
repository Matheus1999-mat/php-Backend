# php-Backend
How to download and use this system:

1-)Download it from GitHub.

2-)Open xampp.

3-)Start Apache and start MySQL.

4-)Create a database "contacts". 

5-)Paste "crud" folder into htdocs folder, inside xampp.

6-)Open "crud" folder in vs code. This folder must be open from htdocs.

7-)In vs code, open "contacts.sql" file. Create a table called "contacts". 
For this, use this script:
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT primary key,
  `fullName` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


8-)Create another table called "user". Use this script:
CREATE TABLE `user` (
    `id` int(11) NOT NULL AUTO_INCREMENT primary key,
    `email` varchar(100) DEFAULT NULL,
    `password` varchar(255) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

9-)Type "localhost/crud/login.php", without "".




