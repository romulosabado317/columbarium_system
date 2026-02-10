CREATE DATABASE IF NOT EXISTS columbarium_db;
USE columbarium_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin','staff','family')
);

CREATE TABLE niches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    floor INT,
    section VARCHAR(10),
    number VARCHAR(10),
    status ENUM('available','reserved','occupied') DEFAULT 'available'
);

CREATE TABLE deceased (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50),
    lname VARCHAR(50),
    dob DATE,
    dod DATE,
    photo VARCHAR(255)
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    niche_id INT,
    payment_status ENUM('pending','gcash','cash') DEFAULT 'pending',
    expires_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (niche_id) REFERENCES niches(id) ON DELETE CASCADE
);

INSERT INTO users (name,email,password,role) VALUES
('Admin','admin@church.com','$2y$10$abc123hashedpassword','admin'); 
-- replace with real password hash
