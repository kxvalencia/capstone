# Valencia Medical Portal (Capstone Project)

<img align="right" alt="Logo" width="300px" src="https://github.com/kxvalencia/capstone/assets/143300278/1e06d17a-4e9e-419c-a257-c5b4811786d4" />

Live domain: https://capstone-main.000webhostapp.com/

Local domain: http://localhost/capstone

<br>

---

<br>

## README Sections

| SECTION | EXPLANATION |
| :--- | :--- |
| [IMAGE PREVIEWS](https://github.com/kxvalencia/capstone#image-previews) | Shows images of various pages |
| [WEBSITE BREAKDOWN](https://github.com/kxvalencia/capstone#website-breakdown) | Explains each page and it's functionality |
| [LOCAL DEVELOPMENT SETUP](https://github.com/kxvalencia/capstone#local-development) | How to setup a local development environment |


<br>

---

<br>

## Image Previews

![Screenshot 2023-10-21 at 21-13-34 Create a Patient](https://github.com/kxvalencia/capstone/assets/143300278/83a31f2b-2c1e-43c5-b104-e6bb8a21cde3)

<br>

![Screenshot 2023-10-21 at 21-10-04 Valencia Medical](https://github.com/kxvalencia/capstone/assets/143300278/5d045b0f-7a23-46ff-b05e-c9e737a01845)

<br>

---

<br>

## Website Breakdown

- Sign-Up and Login:
    - http://localhost/capstone/ 
    - Admins Can signup and log in.
    - Allows access to patient creator page and patient information.

- Patient Page:
  - http://localhost/capstone/patient.php
  - See all patients and search for specific patient. 

- Create Patient Page:
    - http://localhost/capstone/create_patient_page.php 
    - Create a patient with various information such as name, age, sex, height, weight, blood type, etc.


<br>

---

<br>

## Local Development

PHP files in this project require a web server. In order to simulate a working 000webhost.com experience, you need to install XAMPP and configure it similarly on your local machine. This guide will walkthrough the necessary steps:

<br>

### 1. Install XAMPP:

- Go to https://www.apachefriends.org/ and download the version for your OS.
- Run the installer and make sure at least Apache, MySQL, and PHP are checked (enabled) for installation.
- After installation, open the XAMPP Control Panel application and start the `Apache` and `MySQL` modules under the `Action` column. (If you recieve an error about port 3306 being closed then click the "Config" button next to "MySQL", choose `my.ini` and change 3306 to 3307 and save/restart XAMPP Control Panel).
- Apache and MySQL service should be started and the `start` buttons should now say `stop`. 

<br>

### 2. Setup Local Project

- Locate your `htdocs` directory: On Windows it's in C:\xampp\htdocs.
- Clone this repo inside the htdocs directory or download the repo and rename the folder to 'capstone' (which will be the website address).
- Verify that the 'capstone' folder is located inside 'htdocs' by going to the address: http://localhost.com/capstone. 

<br>

### 3. Setup the Database

- Access phpMyAdmin by going to a web browser and type in: http://localhost/phpmyadmin/
- Click "New" on the left hand side to create a new database and call it `id21196724_capstone`. Then click the "Import" button in the middle of the top bar.
- Select the sql file inside the sql-tables/ directory from the repo and keep all the options set as-is. If successful you should see no errors and a `users` and `patients` table inside the capstone database (on the left).

You can manually create the SQL tables or download the files using the section below:

<br>

## SQL TABLE QUERIES

`user` table: [Download](https://github.com/kxvalencia/capstone/blob/main/sql-tables/users.sql)
```sql
CREATE TABLE `users` (
    `id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

`patients` table: [Download](https://github.com/kxvalencia/capstone/blob/main/sql-tables/patients.sql)

```sql
CREATE TABLE `patients` (
    `patient_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `sex` ENUM('Male', 'Female', 'Other', 'Prefer Not to Say') NOT NULL,
    `height_feet` TINYINT UNSIGNED,
    `height_inches` TINYINT UNSIGNED,
    `weight_pounds` DECIMAL(5,2),
    `blood_type` ENUM('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'),
    `medical_history` TEXT,
    `insurance` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

`appointments` table

```sql
CREATE TABLE `appointments` (
    `appointment_id` INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `patient_id` INT(11) UNSIGNED NOT NULL,
    `appointment_date` DATETIME NOT NULL,
    `appointment_time` TIME, -- Assuming you need only the time part
    `physician` VARCHAR(255) NOT NULL,
    `reason_for_visit` ENUM('First Visit', 'Follow-up Visit', 'Wellness Check', 'Pre-Op Consultation', 'Surgery', 'Post-op Consultation'),
    `notes` TEXT,
    FOREIGN KEY (`patient_id`) REFERENCES `patients`(`patient_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
```

<br>

### 4. Accessing The Project

Now you are ready to work on the project locally. If setup correctly, you should be able to sign up and sign in and create and view patients. 

The `auth.php` and `db.php` files are for working excluesively on the back-end. These files are crucial to interacting with the database securely.

<br>

## P.S: DO NOT USE PERSONAL INFORMATION FOR THE SIGNUP OR LOG IN!

The password is hashed, but this projectt is not using a sophisticated framework to handle the proper security and privacy measures. I setup the project with sql injections and password hashing in mind, but even that is not 100% safe. Use only throwaway information to test the signup and log in system. 

<br>

## Useful Links Used During Development:

https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/

https://www.000webhost.com/forum/t/how-to-connect-to-database-using-php/42093


