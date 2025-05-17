-- Add service_name column to the orders table
ALTER TABLE orders 
ADD COLUMN service_name VARCHAR(100);