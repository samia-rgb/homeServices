-- Add all required columns to the orders table
ALTER TABLE orders 
ADD COLUMN service_date DATE,
ADD COLUMN address VARCHAR(255),
ADD COLUMN city VARCHAR(100),
ADD COLUMN state VARCHAR(100),
ADD COLUMN zipcode VARCHAR(20),
ADD COLUMN payment_method VARCHAR(50),
ADD COLUMN service_name VARCHAR(100);
