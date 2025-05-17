<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
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

// Get the search query
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Log the query for debugging
file_put_contents('search_log.txt', date('Y-m-d H:i:s') . " - Query: " . $query . "\n", FILE_APPEND);

// Define the services as per the requirements
$services = array(
    array("name" => "AC Servicing", "category" => "AC Servicing"),
    array("name" => "Wet Servicing", "category" => "AC Servicing"),
    array("name" => "Dry Servicing", "category" => "AC Servicing"),
    array("name" => "Gas Refill", "category" => "AC Servicing"),
    array("name" => "Repair", "category" => "AC Servicing"),
    array("name" => "Home Cleaning", "category" => "Home Cleaning"),
    array("name" => "Bedroom Deep Cleaning", "category" => "Home Cleaning"),
    array("name" => "Dining Chair Shampooing", "category" => "Home Cleaning"),
    array("name" => "Home Deep Cleaning", "category" => "Home Cleaning"),
    array("name" => "Bathroom Deep Cleaning", "category" => "Home Cleaning"),
    array("name" => "Kitchen Deep Cleaning", "category" => "Home Cleaning")
);

// Filter services based on the search query
$result = array();
if (!empty($query)) {
    foreach ($services as $service) {
        if (stripos($service['name'], $query) !== false) {
            $result[] = $service;
        }
    }
}

// Log the result for debugging
file_put_contents('search_log.txt', date('Y-m-d H:i:s') . " - Result count: " . count($result) . "\n", FILE_APPEND);

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($result);
?>
