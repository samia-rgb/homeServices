<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homeservices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to database successfully.<br>";

// SQL to add service_name column to the orders table
$sql = "ALTER TABLE orders ADD COLUMN service_name VARCHAR(100);";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Database updated successfully. Added service_name column to orders table.<br>";
} else {
    echo "Error executing SQL: " . $conn->error;
}

$conn->close();

echo "<br>The database has been updated with a new column for service name.<br>";
echo "You can now:";
echo "<ul>";
echo "<li><a href='book-service.php' class='btn btn-primary'>Return to Service Booking</a></li>";
echo "<li><a href='services-by-category.php' class='btn btn-info'>Browse Services by Category</a></li>";
echo "</ul>";

// Add some basic styling
echo "
<style>
.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    text-decoration: none;
    margin: 5px;
}
.btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}
.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}
</style>
";
?>
