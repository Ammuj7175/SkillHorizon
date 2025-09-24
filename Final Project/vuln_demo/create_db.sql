-- create_db.sql
CREATE DATABASE IF NOT EXISTS vuln_demo;
USE vuln_demo;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Sample user (plaintext password for demo only)
INSERT INTO users (username, password) VALUES ('admin', 'admin123');
