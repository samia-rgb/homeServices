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

// Define the columns to add
$columns = [
    "service_date DATE",
    "address VARCHAR(255)",
    "city VARCHAR(100)",
    "state VARCHAR(100)",
    "zipcode VARCHAR(20)",
    "payment_method VARCHAR(50)",
    "service_name VARCHAR(100)"
];

// Add each column separately
$success = true;
foreach ($columns as $column) {
    $column_name = explode(" ", $column)[0];
    $column_def = $column;

    // Check if column exists
    $result = $conn->query("SHOW COLUMNS FROM orders LIKE '$column_name'");
    if ($result->num_rows == 0) {
        // Column doesn't exist, add it
        $sql = "ALTER TABLE orders ADD COLUMN $column_def";
        if ($conn->query($sql) !== TRUE) {
            echo "Error adding column $column_name: " . $conn->error . "<br>";
            $success = false;
        } else {
            echo "Added column $column_name successfully.<br>";
        }
    } else {
        echo "Column $column_name already exists.<br>";
    }
}

if ($success) {
    echo "Database updated successfully.<br>";
} else {
    echo "Some columns could not be added. See errors above.<br>";
}

$conn->close();

echo "<br>The database has been updated with all required columns for the orders table.<br>";
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
