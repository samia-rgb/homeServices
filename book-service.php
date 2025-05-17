<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$connection = new mysqli('localhost', 'root', '', 'homeservices');

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if required columns exist in orders table
$required_columns = ['service_name', 'service_date', 'address', 'city', 'state', 'zipcode', 'payment_method'];
$missing_columns = [];

foreach ($required_columns as $column) {
    $result = $connection->query("SHOW COLUMNS FROM orders LIKE '$column'");
    if ($result->num_rows == 0) {
        $missing_columns[] = $column;
    }
}

if (!empty($missing_columns)) {
    echo '<div style="background-color: #f8d7da; color: #721c24; padding: 15px; margin: 20px; border: 1px solid #f5c6cb; border-radius: 5px;">';
    echo '<h3>Database Update Required</h3>';
    echo '<p>The following columns are missing from the orders table:</p>';
    echo '<ul>';
    foreach ($missing_columns as $column) {
        echo '<li>' . $column . '</li>';
    }
    echo '</ul>';
    echo '<p>Please run the database update script to add these columns:</p>';
    echo '<p><a href="update_database_all.php" class="btn btn-primary">Run Database Update</a></p>';
    echo '<p>Or follow the instructions in the <a href="README.md">README.md</a> file for alternative methods.</p>';
    echo '</div>';
    exit();
}

$error_message = "";
$success_message = "";
$service_id = "";
$service_name = "";
$service_price = "";

// Get service details if service_id is provided
if(isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];

    // Validate service_id to prevent SQL syntax error
    $service_id = is_numeric($service_id) ? (int)$service_id : 0;

    // Get service details using prepared statement
    $stmt = $connection->prepare("SELECT id, service_name, description FROM services WHERE id = ?");
    if($stmt) {
        $stmt->bind_param("i", $service_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    } else {
        $error_message = "Error preparing statement: " . $connection->error;
    }

    if($result && $result->num_rows > 0) {
        $service = $result->fetch_assoc();
        $service_name = $service['service_name'];
        // For simplicity, we're using a fixed price. In a real application, you'd get this from the database
        $service_price = 300; // Default price
    } else {
        $error_message = "Service not found.";
    }
}

// Process form submission
if(isset($_POST['submit'])) {
    $service_id = $_POST['service_id'];
    $service_type = $_POST['service_type'];
    $specific_service = $_POST['specific_service'];
    $service_date = $_POST['service_date'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    $payment_method = $_POST['payment_method'];
    $user_id = $_SESSION['user_id'];

    // Get service name from database using prepared statement
    $service_name = "";
    // Validate service_id to prevent SQL syntax error
    $service_id = isset($service_id) && is_numeric($service_id) ? (int)$service_id : 0;

    $stmt = $connection->prepare("SELECT service_name FROM services WHERE id = ?");
    if($stmt) {
        $stmt->bind_param("i", $service_id);
        $stmt->execute();
        $service_result = $stmt->get_result();

        if($service_result && $service_result->num_rows > 0) {
            $service_data = $service_result->fetch_assoc();
            $service_name = $service_data['service_name'];
        }

        $stmt->close();
    }

    // Combine service type and specific service for a more descriptive service name
    $combined_service_name = $service_type . " - " . $specific_service;

    // Basic validation
    if(empty($service_type) || empty($specific_service) || empty($service_date) || empty($address) || empty($city) || empty($state) || empty($zipcode) || empty($payment_method)) {
        $error_message = "All fields are required.";
    } else {
        // Validate user_id to prevent SQL syntax error
        $user_id = isset($user_id) && is_numeric($user_id) ? (int)$user_id : 0;

        // Use prepared statement to prevent SQL injection
        $stmt = $connection->prepare("INSERT INTO orders (user_id, service_id, service_name, service_date, address, city, state, zipcode, payment_method, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");

        if($stmt) {
            $stmt->bind_param("iisssssss", $user_id, $service_id, $combined_service_name, $service_date, $address, $city, $state, $zipcode, $payment_method);

            if($stmt->execute()) {
                $success_message = "Service booked successfully!";
                // Redirect to dashboard after 3 seconds
                header("refresh:3;url=dashboard.php");
            } else {
                $error_message = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $error_message = "Error: " . $connection->error;
        }
    }
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Book Service - Home Services</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="assets/css/style.css" rel="stylesheet" media="screen">
    <link href="assets/css/chblue.css" rel="stylesheet" media="screen">
    <link href="assets/css/theme-responsive.css" rel="stylesheet" media="screen">
    <link href="assets/css/dtb/jquery.dataTables.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/select2.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/toastr.min.css" rel="stylesheet" media="screen">        
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.1.10.4.min.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/modernizr.js"></script>
</head>
<body>
    <div id="layout">
        <div class="info-head">
            <div class="container">

            </div>
        </div>
        <?php
        include "header.php";
        ?>
        <div class="section-title-01 honmob">
            <div class="bg_parallax image_02_parallax"></div>
            <div class="opacy_bg_02">
                <div class="container">
                    <h1>Book Service</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li>/</li>
                            <li>Book Service</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row">
                            <!-- FORM REGISTER -->
                            <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Book Service: <?php echo $service_name; ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(!empty($error_message)): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $error_message; ?>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(!empty($success_message)): ?>
                                        <div class="alert alert-success">
                                            <?php echo $success_message; ?>
                                            <p>Redirecting to dashboard...</p>
                                        </div>
                                        <?php else: ?>
                                        <form method="POST" action="">
                                            <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">

                                            <div class="form-group">
                                                <label for="service_type">Service Type:</label>
                                                <select class="form-control" id="service_type" name="service_type" required>
                                                    <option value="">Select Service Type</option>
                                                    <option value="Air Conditioners">Air Conditioners</option>
                                                    <option value="Appliances">Appliances</option>
                                                    <option value="Home Needs">Home Needs</option>
                                                    <option value="Home Cleaning">Home Cleaning</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="specific_service">Specific Service:</label>
                                                <select class="form-control" id="specific_service" name="specific_service" required>
                                                    <option value="">Select Service Type First</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="service_date">Service Date:</label>
                                                <input type="date" class="form-control" id="service_date" name="service_date" required min="<?php echo date('Y-m-d'); ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="address" name="address" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="city">City:</label>
                                                <input type="text" class="form-control" id="city" name="city" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="state">State:</label>
                                                <input type="text" class="form-control" id="state" name="state" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="zipcode">Zip Code:</label>
                                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="payment_method">Payment Method:</label>
                                                <select class="form-control" id="payment_method" name="payment_method" required>
                                                    <option value="">Select Payment Method</option>
                                                    <option value="Credit Card">Credit Card</option>
                                                    <option value="Debit Card">Debit Card</option>
                                                    <option value="PayPal">PayPal</option>
                                                    <option value="Cash on Delivery">Cash on Delivery</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Price: $<?php echo $service_price; ?></label>
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-primary">Book Now</button>
                                            <a href="javascript:history.back()" class="btn btn-default">Cancel</a>
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM REGISTER -->
                        </div>
                    </div>
                </div>
            </div> 
            <div class="section-twitter">
                <i class="fa fa-twitter icon-big"></i>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </section>
        <footer id="footer" class="footer-v1">
            <div class="container">
                <div class="row visible-md visible-lg">
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>APPLIANCE SERVICES </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/12.html">TV</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/14.html">Geyser</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/13.html">Refrigerator</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/21.html">Washing Machine</a>
                            </li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/22.html">Microwave Oven</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/10.html">Water Purifier</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>AC SERVICES </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a
                                    href="service-details/ac-installation.html">Installation</a></li>
                            <li><i class="fa fa-check"></i> <a
                                    href="service-details/ac-uninstallation.html">Uninstallation</a></li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-repair.html">AC Repair</a></li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-gas-refill.html">Gas Refill</a>
                            </li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-wet-servicing.html">Wet
                                    Servicing</a></li>
                            <li><i class="fa fa-check"></i> <a href="service-details/ac-dry-servicing.html">Dry
                                    Servicing </a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>HOME NEEDS </h3>
                        <ul>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/19.html">Laundry </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/4.html">Electrical</a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/8.html">Pest Control </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/7.html">Carpentry </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/3.html">Plumbing </a></li>
                            <li><i class="fa fa-check"></i> <a href="servicesbycategory/20.html">Painting </a></li>
                        </ul>
                    </div>
                </div>            
            </div>           
        </footer>
    </div>
    <script type="text/javascript" src="assets/js/nav/jquery.sticky.js"></script>
    <script type="text/javascript" src="assets/js/totop/jquery.ui.totop.js"></script>
    <script type="text/javascript" src="assets/js/accordion/accordion.js"></script>
    <script type="text/javascript" src="assets/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="assets/js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="assets/js/maps/gmap3.js"></script>
    <script type="text/javascript" src="assets/js/fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript" src="assets/js/carousel/carousel.js"></script>
    <script type="text/javascript" src="assets/js/filters/jquery.isotope.js"></script>
    <script type="text/javascript" src="assets/js/twitter/jquery.tweet.js"></script>
    <script type="text/javascript" src="assets/js/flickr/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="assets/js/theme-options/theme-options.js"></script>
    <script type="text/javascript" src="assets/js/theme-options/jquery.cookies.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap-slider.js"></script>
    <script type="text/javascript" src="assets/js/dtb/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/dtb/jquery.table2excel.js"></script>
    <script type="text/javascript" src="assets/js/dtb/script.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/validation-rule.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Define the service options for each service type
            var serviceOptions = {
                "Air Conditioners": [
                    "Wet Servicing",
                    "Dry Servicing",
                    "Gas Refill",
                    "Repair"
                ],
                "Appliances": [
                    "Computer Repair",
                    "TV Repair",
                    "Washing Machine Repair",
                    "Refridegrator Repair"
                ],
                "Home Needs": [
                    "Laundry",
                    "Electrical",
                    "Painting",
                    "Shower Filters"
                ],
                "Home Cleaning": [
                    "Bedroom Deep cleaning",
                    "Kitchen Deep Cleaning",
                    "Bathroom Deep Cleaning",
                    "Dining Chair Shampooing"
                ]
            };

            // Function to update the specific service dropdown
            function updateSpecificServiceOptions() {
                var serviceType = $("#service_type").val();
                var specificServiceDropdown = $("#specific_service");

                // Clear existing options
                specificServiceDropdown.empty();

                // Add default option
                specificServiceDropdown.append('<option value="">Select Specific Service</option>');

                // If a service type is selected, add the corresponding options
                if (serviceType && serviceOptions[serviceType]) {
                    $.each(serviceOptions[serviceType], function(index, value) {
                        specificServiceDropdown.append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            }

            // Update specific service options when service type changes
            $("#service_type").change(updateSpecificServiceOptions);
        });
    </script>
</body>
</html>
