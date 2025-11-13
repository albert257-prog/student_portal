CREATE DATABASE student_portal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE student_portal;


-- Users table (admins, teachers, students as system users)
CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
email VARCHAR(150) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
role ENUM('admin','teacher','student') NOT NULL DEFAULT 'student',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;


-- Students table (actual student records)
CREATE TABLE students (
id INT AUTO_INCREMENT PRIMARY KEY,
student_number VARCHAR(50) NOT NULL UNIQUE,
first_name VARCHAR(100) NOT NULL,
last_name VARCHAR(100) NOT NULL,
email VARCHAR(150),
dob DATE DEFAULT NULL,
course VARCHAR(150),
year INT DEFAULT 1,
created_by INT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (created_by) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;


-- sample admin user (change password after import)
INSERT INTO users (name, email, password, role)
VALUES ('Admin User','admin@local.test', '" + md5("replace-me") + "', 'admin');