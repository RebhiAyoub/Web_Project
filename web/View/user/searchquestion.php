<?php
include '../../Controller/Forum/questionC.php';

$questionC = new QuestionC();

// Form handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $list = $questionC->searchQuestions($keyword);
    }
}

$questions = $questionC->affichequestions();
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

    <!-- title of site -->
    <title>Women's Health Compass</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="assets/css/linearicons.css">

    <!--flaticon.css-->
    <link rel="stylesheet" href="assets/css/flaticon.css">

    <!--animate.css-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="assets/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    <!-- Add jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
        .logo {
            display: inline-block;
            vertical-align: middle;
        }

        .logo img {
            width: 200px;
            /* Set the width of your logo image */
            height: auto;
            /* Maintain aspect ratio */
        }

        .site-title {
            display: inline-block;
            vertical-align: middle;
            font-size: 100px;
            /* Adjust the text size of the site title */
            margin-left: 20px;
            /* Adjust the distance between the logo and text */
        }

        /* Add these styles to your CSS file or in a <style> tag in the head of your HTML */
        body.modal-open {
            overflow: hidden;
        }

        .modal-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        logo {
            display: inline-block;
            vertical-align: middle;
        }

        .logo img {
            width: 200px;
            /* Set the width of your logo image */
            height: auto;
            /* Maintain aspect ratio */
        }

        .site-title {
            display: inline-block;
            vertical-align: middle;
            font-size: 100px;
            /* Adjust the text size of the site title */
            margin-left: 20px;
            /* Adjust the distance between the logo and text */
        }

        /* Add these styles to your CSS file or in a <style> tag in the head of your HTML */
        body.modal-open {
            overflow: hidden;
        }

        .modal-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Styles for the popup container */
        #popup-container {

            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background-color: #ff6961;
            /* Red color */
            color: #fff;
            /* Text color */
            padding: 80px;
            /* Increase padding to make the popup larger */
            border-radius: 16px;
            font-size: 36px;
            /* Increase font size */
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            animation: blink 1s infinite;
            /* Add blinking animation */
        }

        @keyframes blink {

            0%,
            50%,
            100% {
                opacity: 0;
            }

            25%,
            75% {
                opacity: 1;
            }
        }

        audio {
            display: none;
        }
        body {
            font-family: Arial, sans-serif;
            background-image: url('raef.jpg') !important;

        }

        /* New button styles using Bootstrap classes */
        .btn-primary,
        .btn-danger {
            font-size: 16px;
        }

        .add-question-button {
            font-size: 18px;
        }

        .question-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Added background color for better visibility */
        }

        

        h5 {
            font-size: 24px;
            color: #333; /* Updated text color */
            margin-bottom: 15px;
        }

        strong {
            color: #555; /* Updated text color */
        }

        p {
            color: #555; /* Updated text color */
            margin-bottom: 10px;
        }

        .answer-container {
            border-top: 1px solid #ddd;
            margin-top: 15px;
            padding-top: 15px;
        }
    </style>

    <!-- Add the search script here -->
    <script>
        function searchQuestions() {
            var searchKeyword = document.getElementById("searchKeyword").value;

            // Use AJAX to send a request to your PHP script
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../controller/questionC.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the content on the page with the search results
                    document.getElementById("searchResults").innerHTML = xhr.responseText;
                }
            };

            // Prepare the data to send
            var data = "search=true&searchKeyword=" + encodeURIComponent(searchKeyword);

            // Send the request
            xhr.send(data);
        }
    </script>


</head>

<body>



    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!--welcome-hero start -->
    










        <!-- Add the Google Translate API script -->
        <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                        pageLanguage: 'en',
                        autoDisplay: false
                    },
                    'google_translate_element'
                );
            }
        </script>


<div >
            <div class="section-header">
                <div class="row">

                </div>
            </div>

        </div><!--/.section-header-->
        <div class="featured-cars-content">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="bg-light p-4 rounded">

                        <head>
                            <title>Search for questions</title>

                            <style>
                                .search-results {
                                    list-style: none;
                                    padding: 0;
                                }

                                .result-card {
                                    border: 1px solid #ddd;
                                    border-radius: 8px;
                                    padding: 20px;
                                    margin-bottom: 20px;
                                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                }

                                .result-title {
                                    font-size: 18px;
                                    font-weight: bold;
                                }

                                .result-content {
                                    color: #555;
                                }

                                .result-category {
                                    color: #888;
                                }
                            </style>
                        </head>

                        <body>
                            <div class="container" style="padding-left:350px !important;width:1600px;">
                                <div class="section-header">
                                    <p>Explore <span>Our</span> Forum</p>
                                    <h2>Forum</h2>
                                </div><!--/.section-header-->
                                <div class="featured-cars-content">
                                    <div class="row">
                                        <div class="col-md-8 offset-md-2">
                                            <div class="bg-light p-4 rounded">


                                                <div class="row">
                                                    <div class="col-md-8 offset-md-2">
                                                        <div class="bg-light p-4 rounded">
                                                            <h1>Search by title, content, or category</h1>
                                                            <form action="#featured-cars" method="POST">
                                                                <label for="keyword">Write a keyword:</label>
                                                                <input type="text" name="keyword" id="keyword" required>
                                                                <input type="submit" value="Search" name="search">
                                                            </form>

                                                            <?php if (isset($list)) { ?>
                                                                <br>
                                                                <h2>Questions corresponding to the keyword:</h2>
                                                                <div class="search-results">
                                                                    <?php foreach ($list as $question) { ?>
                                                                        <div class="result-card">
                                                                            <p class="result-title"><?= $question['title'] ?></p>
                                                                            <p class="result-content"><strong>Content:</strong> <?= $question['content'] ?></p>
                                                                            <p class="result-category"><strong>Category:</strong> <?= $question['category'] ?></p>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                                    </body>


                            <!-- Add a trigger for translation -->
                            <div id="google_translate_element"></div>













                            <!--blog start -->
                            <section id="blog" class="blog"></section><!--/.blog-->
                            <!--blog end -->




                            <!-- Include all js compiled plugins (below), or include individual files as needed -->

                            <script src="assets/js/jquery.js"></script>

                            <!--modernizr.min.js-->
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

                            <!--bootstrap.min.js-->
                            <script src="assets/js/bootstrap.min.js"></script>

                            <!-- bootsnav js -->
                            <script src="assets/js/bootsnav.js"></script>

                            <!--owl.carousel.js-->
                            <script src="assets/js/owl.carousel.min.js"></script>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

                            <!--Custom JS-->
                            <script src="assets/js/custom.js"></script>

</body>

</html>