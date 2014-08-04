<?php
    session_start();

    $page_components = [
        "FOOTER" => [
            "BUSINESS_DETAILS" => "partials/includes/footer/businessDetails.php",
            "OFFERS_AND_UPDATES" => "partials/includes/footer/offersAndUpdates.php",
            "OUR_LOCATION" => "partials/includes/footer/ourLocation.php",
            "SERVICE_AREA" => "partials/includes/footer/serviceArea.php"
        ]
    ];

    $business = json_decode(file_get_contents('assets/json/client.json'), TRUE);
    $layout = json_decode(file_get_contents('assets/json/layout.json'), TRUE);

    $path = ltrim($_SERVER['REQUEST_URI'], '/');
    $elements = explode('/', $path);
    $active = count($elements) == 0 ? '' : strtolower(array_shift($elements));
?>

<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<!--  Platform & Site Documentation -->
<!--==================================================-->
<!--  TBA -->

<head>
        <!-- Site: Standard Metadata -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Site: Custom Metadata -->
        <meta name="description" content="<?php echo $business["legalName"] . " homepage"; ?>">
        <meta name="author" content="AURA Access Pty Ltd.">
        <!-- Site: Title & Favicon-->
        <title><?php echo $business["legalName"] ?></title>
        <link rel="shortcut icon" href="favicon.png">
        <!-- Site: CSS -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/site.css">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Google: Translate ID -->
        <meta name="google-translate-customization" content="9f1da1da9193eef4-a909844e54745c79-g42c4feae33b27c46-13" />
</head>

<body>

    <!-- Branded Header	================================================== -->
    <header role="banner">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>AURA Sites v0.9</h1>
<!--                    <img class="pull-left" src="assets/img/aaa-head-splash.png">-->
                </div>
                <div class="col-xs-6 hidden-xs">
                    <div class="pull-right">
                    <h3>Ph. XXXX XXXX</h3>
<!--                    <img class="pull-right" src="assets/img/aaa-head-splash.png">-->
                    </div>
                </div>
             </div>
         </div>
    </header>



    <!-- Responsive Nav ================================================== -->
	<nav class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                <ul class="nav navbar-nav">
                <li<?php echo $active == '' ? ' class="active"' : ''; ?>><a href="/">Home</a></li>
                <li<?php echo $active == 'samples' ? ' class="active"' : ''; ?>><a href="samples">Samples</a></li>
                <li<?php echo $active == 'services' ? ' class="active"' : ''; ?>><a href="services">Services</a></li>
                <li<?php echo $active == 'about' ? ' class="active"' : ''; ?>><a href="about">About</a></li>
                <li<?php echo $active == 'location' ? ' class="active"' : ''; ?>><a href="location">Location</a></li>
                <li<?php echo $active == 'contact' ? ' class="active"' : ''; ?>><a href="contact">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
	</nav>



    <!--  Content Module ================================================== -->
    <?php
        switch ($active) {
            case "samples":
                include "partials/samples.html";
                break;
            case "about":
                include "partials/about.html";
                break;
            case "contact":
                include "partials/contact.php";
                break;
            case "location":
                include "partials/location.html";
                break;
            case "services":
                include "partials/services.html";
                break;
            default:
                include "partials/home.html";
        }
    ?>

    <!-- Footer Module  ================================================== -->
    <div class="footer-section">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-4">
                        <?php include $page_components["FOOTER"][$layout["footer"][0]] ?>
                    </div>
                    <div class="col-sm-4">
                        <?php include $page_components["FOOTER"][$layout["footer"][1]] ?>
                    </div>
                    <div class="col-sm-4">
                        <?php include $page_components["FOOTER"][$layout["footer"][2]] ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="sitemap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xs-9">
                        &copy; 2014 <?php echo $business["legalName"]; ?>. All rights reserved.</br>
                        <a href="#">Terms of Service</a> |
                        <a href="#">Privacy &amp; Security</a> |
                        <a href="#">Sitemap</a>
                    </div>
                    <div class="col-xs-3">
                    <!-- Translate Plugin  ================================================== -->
                    <div class="muted pull-right" id="google_translate_element"></div>
                    <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'en', gaTrack: true, gaId: 'UA-46169315-1'}, 'google_translate_element');
                        }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript Core  ================================================== -->
    <script src="http://www.google.com/recaptcha/api/js/recaptcha_ajax.js"></script>
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/holder.js"></script>
    
    <!-- Google Analytics Tracking Code  ================================================== -->
    <?php include 'partials/includes/ga.html' ?>

</body>

</html>
