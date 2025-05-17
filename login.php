<?php
session_start();

// Check if user is already logged in
if(isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error_message = "";

if(isset($_POST['username'])) {
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    $connection = new mysqli('localhost', 'root', '', 'homeservices');

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Get user data including ID, name, email, and phone
    $sql = "SELECT id, user_name, name, email, phone, password FROM user_table WHERE user_name='$user_name'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();

        if($password == $user_data['password']) {
            // Set session variables
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_name'] = $user_data['user_name'];
            $_SESSION['name'] = $user_data['name'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['phone'] = $user_data['phone'];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Incorrect password. Please try again.";
        }
    } else {
        $error_message = "User not found. Please check your username.";
    }

    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home Services</title>
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
                    <h1>Login</h1>
                    <div class="crumbs">
                        <ul>
                            <li><a href="index.php.html">Home</a></li>
                            <li>/</li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="content-central">
            <div class="content_info">
                <div class="paddings-mini">
                    <div class="container">
                        <div class="row portfolioContainer">
                            <div class="col-xs-12 col-sm-3 col-md-3 profile1">
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 profile1" style="min-height: 300px;">
                                <div class="thinborder-ontop">
                                    <h3>Login Info</h3>
                                    <?php if(!empty($error_message)): ?>
                                    <div class="alert alert-danger">
                                        <?php echo $error_message; ?>
                                    </div>
                                    <?php endif; ?>
                                    <form method="POST" id="userloginform" action="">
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-4 col-form-label text-md-right">User Name</label>
                                            <div class="col-md-6">
                                                <input id="username" type="text" class="form-control" name="username" value="" required="" autofocus="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password"
                                                class="col-md-4 col-form-label text-md-right">Password</label>
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" id="remember_me" name="remember"> Remember Me </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-10">
                                                <a class="" href="register.php">New User? Register here</a>
                                            </div>

                                        </div>
                                    </form>
                                </div>                                
                            </div>

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
</body>
</html>
