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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui.1.10.4.min.js"></script>
    <script type="text/javascript" src="assets/js/toastr.min.js"></script>
    <script type="text/javascript" src="assets/js/modernizr.js"></script>
</head>
<body>
    <div id="layout">
        <div class="info-head">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="visible-md visible-lg text-left">
                            <li><a href="tel:01403692054"><i class="fa fa-phone"></i> 01403692054</a></li>
                            <li><a href="mailto:Surfsidemedia@gmail.com"><i class="fa fa-envelope"></i>
                                    contact:@Surfsidemedia.com</a></li>
                        </ul>
                        <ul class="visible-xs visible-sm">
                            <li class="text-left"><a href="Phone:01403692054"><i class="fa fa-phone"></i>
                                    01876543421</a></li>
                            <li class="text-right"><a href="changelocation.html"><i
                                        class="fa fa-map-marker"></i>Mirpur,Dhaka</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="visible-md visible-lg text-right">
                            <li><i class="fa fa-comment"></i> Live Chat</li>
                            <li><a href="index.php/changelocation.html"><i class="fa fa-map-marker"></i>Dhaka,Bangladesh</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include "header.php";
        ?>
        <section class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="slidevertical" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="assets/img/slide/1.jpg" alt="fullslide1" data-bgposition="center center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                    <li data-transition="slidehorizontal" data-slotamount="1" data-masterspeed="1000"
                        data-saveperformance="off" data-title="Slide">
                        <img src="assets/img/slide/2.jpg" alt="fullslide1" data-bgposition="top center"
                            data-kenburns="on" data-duration="6000" data-ease="Linear.easeNone" data-bgfit="130"
                            data-bgfitend="100" data-bgpositionend="right center">
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
            <div class="filter-title">
                <div class="title-header">
                    <h2 style="color:#fff;">BOOK A SERVICE</h2>
                    <p class="lead">Book a service  </p>
                </div>
                <div class="filter-header">
                    <form id="sform" action="searchservices" method="post">
                        <input type="text" id="q" name="q" required="required" placeholder="What Services do you want?"
                            class="input-large typeahead" autocomplete="off">
                        <input type="submit" name="submit" value="Search">
                    </form>
                </div>
            </div>
        </section>

        <section class="content-central">
            <div class="content_info content_resalt">
                <div class="container" style="margin-top: 40px;">
                    <div class="row">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul id="sponsors" class="tooltip-hover">
                                <li data-toggle="tooltip" title="" data-original-title="AC"> <a href="servicesbycategory/1.html">
                                    <i class="fas fa-snowflake" style="font-size:40px; color:#3498db;"></i>
                                  </a></li>
                                <li data-toggle="tooltip" title="" data-original-title="Beauty"><a href="servicesbycategory/2.html">
                                    <i class="fas fa-spa" style="font-size:40px; color:#e91e63;"></i>
                                  </a></li>
                                <li data-toggle="tooltip" title="" data-original-title="Plumbing"><a href="servicesbycategory/3.html">
                                    <i class="fas fa-wrench" style="font-size:40px; color:#3498db;"></i>
                                  </a></li>
                                <li data-toggle="tooltip" title="" data-original-title="Electrical"> <a href="servicesbycategory/4.html">
                                    <i class="fas fa-bolt" style="font-size:40px; color:#f1c40f;"></i>
                                  </a></li>
                                <li data-toggle="tooltip" title="" data-original-title="Shower Filter"> <a href="servicesbycategory/5.html">
                                    <i class="fas fa-shower" style="font-size:40px; color:#00bcd4;"></i>
                                  </a></li>
                                <li data-toggle="tooltip" title="" data-original-title="Home Cleaning"> <a href="servicesbycategory/6.html">
                                    <i class="fas fa-broom" style="font-size:40px; color:#4caf50;"></i>
                                  </a></li>
                                <li data-toggle="tooltip" title="" data-original-title="Carpentry"> <a href="servicesbycategory/7.html">
                                    <i class="fas fa-hammer" style="font-size:40px; color:#795548;"></i>
                                  </a>
                                  </li>
                                <li data-toggle="tooltip" title="" data-original-title="Pest Control"> <a href="servicesbycategory/8.html">
                                    <i class="fas fa-bug" style="font-size:40px; color:#e53935;"></i>
                                  </a>
                                  </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin-top: 40px;">
                    <div class="row">
                    </div>
                </div>
            </div>
            <div class="content_info">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-4 col-md-3 hsgrids" style="padding-right: 5px;padding-left: 5px;">
                            <a class="g-list" href="service-details/ac-installation.html">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 hsgrids" style="padding-right: 5px;padding-left: 5px;">
                            <a class="g-list" href="service-details/ac-gas-top-up.html">
                                <div class="img-hover">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 hsgrids" style="padding-right: 5px;padding-left: 5px;">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="container">
                    <div class="row">
                        <div class="titles">
                            <hr class="tall">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer id="footer" class="footer-v1">
            <div class="container">
                <div class="row visible-md visible-lg samia">
                    <div class="col-md-3 col-xs-6 col-sm-6">
                        <h3>CONTACT US</h3>
                        <ul class="contact_footer">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="#">Dhaka,Bangladesh</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                        href="">cleantodaybd@gmail.com</a>
                            </li>
                            <li>
                                <i class="fa fa-headphones"></i> <a href="">01403692054</a>
                            </li>
                        </ul>
                        <h3 style="margin-top: 10px">FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#"></a></li>
                            <li class="github"><span><i class="fa fa-instagram"></i></span><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-6">

                   </div>
                </div>
                <div class="row visible-sm visible-xs">
                    <div class="col-md-6">
                        <h3 class="mlist-h">CONTACT US</h3>
                        <ul class="contact_footer mlist">
                            <li class="location">
                                <i class="fa fa-map-marker"></i> <a href="#">Dhaka,Bangladesh</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> <a
                                    href="mailto:cleantodaybd@gmail.com">cleantodaybd.com</a>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> <a href="tel:+911234567890">+91-1234567890</a>
                            </li>
                        </ul>
                        <ul class="social mlist-h">
                            <li class="facebook"><span><i class="fa fa-facebook"></i></span><a href="#"></a></li>
                            <li class="twitter"><span><i class="fa fa-twitter"></i></span><a href="#"></a></li>
                            <li class="github"><span><i class="fa fa-instagram"></i></span><a href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-down">
                <div class="container">
                    <div class="row">


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
        // Add a test function to check if JavaScript is working
        function testTypeahead() {
            console.log('Testing typeahead functionality...');
            var query = 'ac';
            $.ajax({
                url: 'get-services.php',
                type: 'GET',
                data: { query: query },
                dataType: 'json',
                success: function(data) {
                    console.log('Test AJAX request succeeded. Data:', data);
                },
                error: function(xhr, status, error) {
                    console.error('Test AJAX request failed:', status, error);
                }
            });
        }

        jQuery(document).ready(function () {
            console.log('Document ready. Testing JavaScript...');

            // Call the test function after a short delay
            setTimeout(testTypeahead, 1000);

            jQuery('.tp-banner').show().revolution({
                dottedOverlay: "none",
                delay: 5000,
                startwidth: 1170,
                startheight: 480,
                minHeight: 250,
                navigationType: "none",
                navigationArrows: "solo",
                navigationStyle: "preview1"
            });

            // Add some CSS for the dropdown
            $('<style>\
                .dropdown-menu { width: 100%; }\
                .dropdown-menu > li > a { white-space: normal; }\
                .typeahead-result { display: flex; justify-content: space-between; }\
                .service-name { font-weight: bold; }\
                .service-category { color: #777; font-size: 0.9em; }\
            </style>').appendTo('head');

            // Define the services directly in JavaScript
            var services = [
                { name: "AC Servicing", category: "AC Servicing" },
                { name: "Wet Servicing", category: "AC Servicing" },
                { name: "Dry Servicing", category: "AC Servicing" },
                { name: "Gas Refill", category: "AC Servicing" },
                { name: "Repair", category: "AC Servicing" },
                { name: "Home Cleaning", category: "Home Cleaning" },
                { name: "Bedroom Deep Cleaning", category: "Home Cleaning" },
                { name: "Dining Chair Shampooing", category: "Home Cleaning" },
                { name: "Home Deep Cleaning", category: "Home Cleaning" },
                { name: "Bathroom Deep Cleaning", category: "Home Cleaning" },
                { name: "Kitchen Deep Cleaning", category: "Home Cleaning" }
            ];

            // Initialize typeahead for search box
            $('#q').typeahead({
                source: function (query, process) {
                    console.log('Searching for:', query);

                    // Filter services based on the query
                    var filteredServices = [];
                    if (query) {
                        query = query.toLowerCase();
                        for (var i = 0; i < services.length; i++) {
                            if (services[i].name.toLowerCase().indexOf(query) !== -1) {
                                filteredServices.push(services[i]);
                            }
                        }
                    }

                    console.log('Filtered services:', filteredServices);
                    return process(filteredServices);
                },
                displayText: function(item) {
                    console.log('Display text for item:', item);
                    return item.name;
                },
                afterSelect: function(item) {
                    console.log('Selected item:', item);
                    $('#q').val(item.name);
                },
                items: 8,
                minLength: 1,
                delay: 300,
                autoSelect: false,
                fitToElement: true,
                highlighter: function (item) {
                    console.log('Highlighting item:', item);
                    var html = '<div class="typeahead-result">';
                    html += '<div class="service-name">' + item + '</div>';
                    if (item.category && item.category !== item.name) {
                        html += '<div class="service-category">' + item.category + '</div>';
                    }
                    html += '</div>';
                    return html;
                }
            });
        });
    </script>
</body>
</html>
