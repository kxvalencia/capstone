# Captstone Project

Website domain: https://capstone-main.000webhostapp.com/

I made this guide on Windows, so it contains Windows-specific steps. If you are on MacOS or Linux, let me know in the discord and I will update this to help you with the setup process. Please read the guide all the way to the end. There is important information about the database at the bottom. 

<br>

## Local Development

PHP files in this project require a web server. In order to simulate a working 000webhost.com experience, you need to install XAMPP and configure it similarly on your local machine. This guide will walkthrough the necessary steps:

<br>

### 1. Install XAMPP:

- Go to https://www.apachefriends.org/ and download the version for your OS.
- Run the installer and make sure at least Apache, MySQL, and PHP are checked (enabled) for installation.
- Start the XAMPP Control Panel. (If you recieve an error about port 3306 being closed then click the "Config" button next to "MySQL", choose `my.ini` and change 3306 to 3307 and save/restart XAMPP Control Panel).
- Apache and MySQL service should be started (if not, start them). 

<br>

### 2. Setup Local Project

- Locate your `htdocs` directory: On Windows it's in C:\xampp\htdocs.
- Clone this repo inside the htdocs directory.
- Verify that the 'capstone' folder is located inside 'htdocs'. 

<br>

### 3. Setup the Database

- Access phpMyAdmin by going to a web browser and type in: http://localhost/phpmyadmin/
- Click "New" on the left hand side to create a new database and call it `id21196724_capstone`. Then click the "Import" button in the middle of the top bar.
- Select the sql file inside the sql/ directory from the repo and keep all the options set as-is. If successful you should see no errors and a 'users' table inside the capstone database (on the left).

<br>

## SQL TABLE QUERIES

`user` table:
```sql
CREATE TABLE `users` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

`patients` table:

```sql
CREATE TABLE `patients` (
    `patient_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `sex` ENUM('Male', 'Female', 'Other', 'Prefer Not to Say') NOT NULL,
    `height_feet` TINYINT UNSIGNED,
    `height_inches` TINYINT UNSIGNED,
    `weight_pounds` DECIMAL(5,2),
    `blood_type` ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'),
    `medical_history` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

<br>

### 4. Accessing The Project

Now you are ready to work on the project locally. Go to http://localhost/capstone to view the home page for the project. If setup correctly, you should be able to sign up and sign in. 

Please do not mess with the `auth.php` file below the variables unless you are working on the back-end. This file is crucial to interacting with the database securely. The `user.php` file is where the main page is for users when they log in. This is where the main application (HTML) should be.

<br>

## P.S: DO NOT USE PERSONAL INFORMATION FOR THE SIGNUP OR LOG IN!

The password is hashed, but this projectt is not using a sophisticated framework to handle the proper security and privacy measures. I setup the project with sql injections and password hashing in mind, but even that is not 100% safe. Use only throwaway information to test the signup and log in system. 

<br>

## Useful Links Used During Development:

https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/

https://www.000webhost.com/forum/t/how-to-connect-to-database-using-php/42093


