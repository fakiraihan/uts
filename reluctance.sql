CREATE DATABASE reluctance6;

USE reluctance6;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, password, role) VALUES (
    'admin',
    '$2y$10$QTO5Yr9jXIxXwrvMoP0tG.s/hZTYxjZPL9vW0RApFbTALcYrUqU7C', -- password: admin1234
    'admin'
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    message TEXT NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
);

INSERT INTO contacts (name, email, message, created_at, updated_at) VALUES
('Andi Nugroho', 'andi@example.com', 'Saya ingin tahu lebih banyak tentang layanan Anda.', NOW(), NOW());
