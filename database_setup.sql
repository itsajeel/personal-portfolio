-- Database setup
-- Run in phpMyAdmin: SQL tab, paste, Go

CREATE DATABASE IF NOT EXISTS portfolio;
USE portfolio;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (email, password) VALUES
('sajeel@qmul.ac.uk', 'password123');

-- Posts table
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    created_at DATETIME NOT NULL
);

-- A few sample posts across different months
INSERT INTO posts (title, body, created_at) VALUES
('First post', 'Trying out the new blog. Took a while to get the database hooked up but its all working now.', '2026-02-14 22:30:00'),
('OOP starting to click', 'Spent the weekend on the student management system for OOP. Inheritance makes way more sense once you actually use it instead of just reading about it.', '2026-03-08 19:15:00'),
('Front end done', 'Got the phase 1 front end submitted. Glad thats over. Time to start on the backend.', '2026-04-02 16:45:00'),
('PHP sessions', 'Sessions are pretty neat. Once you log in the server remembers you across pages. Useful for the blog login.', '2026-04-21 11:20:00'),
('Merge sort', 'Wrote merge sort in PHP for sorting the blog posts. A level computer science finally paying off.', '2026-05-01 09:00:00');
