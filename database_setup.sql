-- Create the homeservices database if it doesn't exist
CREATE DATABASE IF NOT EXISTS homeservices;

-- Use the homeservices database
USE homeservices;

-- Drop tables if they exist to avoid conflicts
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS user_table;

-- Create the user_table
CREATE TABLE user_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(100) NOT NULL
);

-- Create the services table
CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    description TEXT
);

-- Create the orders table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT NOT NULL,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'Pending',
    FOREIGN KEY (user_id) REFERENCES user_table(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
);

-- Insert sample user data
INSERT INTO user_table (user_name, name, email, phone, password) VALUES
('john_doe', 'John Doe', 'john@example.com', '1234567890', 'password123'),
('jane_smith', 'Jane Smith', 'jane@example.com', '0987654321', 'password456');

-- Insert sample services
INSERT INTO services (service_name, description) VALUES
('AC Repair', 'Professional air conditioner repair service'),
('Plumbing', 'Expert plumbing services for your home'),
('Electrical', 'Electrical repair and installation services'),
('Cleaning', 'Professional home cleaning services'),
('Painting', 'Interior and exterior painting services');

-- Insert sample orders
INSERT INTO orders (user_id, service_id, order_date, status) VALUES
(1, 1, '2023-01-15 10:30:00', 'Completed'),
(1, 3, '2023-02-20 14:45:00', 'Completed'),
(1, 5, '2023-03-10 09:15:00', 'Pending'),
(2, 2, '2023-02-05 11:00:00', 'Completed'),
(2, 4, '2023-03-25 16:30:00', 'Pending');