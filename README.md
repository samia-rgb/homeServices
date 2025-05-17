# Home Services Application

## Database Update Required

There is an issue with the database schema that needs to be fixed. The application requires several columns in the `orders` table that might not exist in your database yet.

## How to Fix the Issue (Recommended Method)

1. Make sure your web server (WAMP) is running
2. Open your web browser and navigate to: http://localhost/web/update_database_all.php
3. This will run a script that checks for and adds any missing required columns to the `orders` table
4. The script will show which columns were added and which already exist
5. You should see a success message if all columns were added or already exist
6. After running this script, you should be able to book services without any errors
7. The script provides convenient buttons to return to the service booking page or browse services by category
8. This script is safe to run multiple times - it will only add columns that don't already exist

### Automatic Detection

The application now automatically detects if required columns are missing from the database and will show a clear error message with a direct link to run the update script if needed. This makes it easier to identify and fix database issues.

## Alternative Fix (Service Name Column Only)

If you only need to add the `service_name` column:

1. Make sure your web server (WAMP) is running
2. Open your web browser and navigate to: http://localhost/web/update_database_service_name.php
3. This will run a script that adds the missing `service_name` column to the `orders` table
4. You should see a success message if the column was added successfully

## Manual Fix

If you're unable to run the update scripts, you can manually add all required columns using phpMyAdmin:

1. Open phpMyAdmin (usually at http://localhost/phpmyadmin)
2. Select the `homeservices` database
3. Select the `orders` table
4. Go to the "Structure" tab
5. For each of the following columns, click "Add column" and enter the details:

   | Column Name     | Type      | Length |
   |-----------------|-----------|--------|
   | service_date    | DATE      | -      |
   | address         | VARCHAR   | 255    |
   | city            | VARCHAR   | 100    |
   | state           | VARCHAR   | 100    |
   | zipcode         | VARCHAR   | 20     |
   | payment_method  | VARCHAR   | 50     |
   | service_name    | VARCHAR   | 100    |

6. Click "Save" after adding each column

## Troubleshooting

If you continue to experience issues after running the update script, please check:

1. That you're using the correct database name (`homeservices`)
2. That the database user has permission to alter tables
3. That the `orders` table exists in the database
4. That you're running the script from the correct URL path

## Required Columns in Orders Table

The following columns are required in the `orders` table for the application to function properly:

| Column Name     | Description                                      |
|-----------------|--------------------------------------------------|
| id              | Auto-increment primary key                       |
| user_id         | Foreign key to user_table.id                     |
| service_id      | Foreign key to services.id                       |
| order_date      | Date and time when the order was placed          |
| status          | Status of the order (e.g., Pending, Completed)   |
| service_date    | Date when the service is scheduled               |
| address         | Street address for the service                   |
| city            | City for the service                             |
| state           | State for the service                            |
| zipcode         | Zip code for the service                         |
| payment_method  | Method of payment                                |
| service_name    | Name of the service                              |

## Recent Fixes

### Automatic Database Column Check

The book-service.php file now automatically checks if all required columns exist in the orders table. If any columns are missing, it will display a clear error message with:

1. A list of the missing columns
2. A direct link to run the database update script
3. A link to the README.md file for alternative methods

This makes it easier to identify and fix database schema issues without having to manually check the database structure.

### Parameter Binding Issue in book-service.php

There was an issue with the parameter binding in the book-service.php file that caused the following error:

```
Fatal error: Uncaught ArgumentCountError: The number of elements in the type definition string must match the number of bind variables in C:\wamp64\www\web\book-service.php:99
```

This issue has been fixed by correcting the type definition string in the bind_param call to match the number of parameters being bound. The issue was that the type definition string had 10 characters ("iissssssss") but only 9 parameters were being bound.

### Service Type Options

All four service types are now available in the dropdown menu:
- Air Conditioners
- Appliances
- Home Needs
- Home Cleaning

For any other issues, please contact support.
