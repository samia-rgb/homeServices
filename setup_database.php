<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";

// Create connection to MySQL server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL server successfully.<br>";

// Read the SQL file
$sql = file_get_contents('database_setup.sql');

// Execute multi query
if ($conn->multi_query($sql)) {
    echo "Database setup completed successfully.<br>";
    
    // Process all result sets
    do {
        // Store first result set
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
    
    if ($conn->error) {
        echo "Error executing SQL: " . $conn->error;
    }
} else {
    echo "Error executing SQL: " . $conn->error;
}

$conn->close();

echo "<br>You can now <a href='login.php'>login</a> with the following credentials:<br>";
echo "Username: john_doe<br>";
echo "Password: password123<br>";
echo "<br>Or<br>";
echo "Username: jane_smith<br>";
echo "Password: password456<br>";
?>