CREATE DATABASE IF NOT EXISTS columbarium_db;
USE columbarium_db;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','staff','family') NOT NULL
);

-- Niches Table
CREATE TABLE niches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    floor INT NOT NULL,
    section VARCHAR(10) NOT NULL,
    number VARCHAR(10) NOT NULL,
    status ENUM('available','reserved','occupied') DEFAULT 'available'
);

-- Deceased Table
CREATE TABLE deceased (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    dob DATE,
    dod DATE,
    photo VARCHAR(255)
);

-- Reservations Table
CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    niche_id INT NOT NULL,
    payment_status ENUM('pending','gcash','cash') DEFAULT 'pending',
    expires_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (niche_id) REFERENCES niches(id) ON DELETE CASCADE
);

-- Sample Admin User
INSERT INTO users (name, email, password, role) VALUES
('Admin User', 'Romulo', '{PASSWORD_HASH_HERE}', 'admin');
