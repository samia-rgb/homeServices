<?php
// Test script to check if get-services.php returns the expected data

// Make a direct request to get-services.php with a test query
$query = "ac";
$response = file_get_contents("get-services.php?query=" . urlencode($query));

// Output the response
echo "Response from get-services.php:\n";
echo $response;

// Decode the JSON response
$data = json_decode($response, true);

// Check if the response is valid JSON
if ($data === null) {
    echo "\n\nError: Invalid JSON response";
} else {
    echo "\n\nDecoded response:\n";
    print_r($data);
}
?>
