<?php
$errors = [
    'title' => '',
    'content' => '',
    'category' => '',
];

include_once '../../Controller/Forum/questionC.php';
include '../../Model/question.php';

$question = null;
$questionC = new QuestionC();

$categories = [
    'Contraception and Family Planning',
    'Menstrual Health',
    'Pregnancy and Childbirth',
    'Sexual Wellness',
    'Reproductive Health Conditions'
];

if (
    isset($_POST["title"]) &&
    isset($_POST["content"]) &&
    isset($_POST["category"])
) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    // Validate title
    if (empty($title) || preg_match('/[!@#$%^&*(),.?":{}|<>]/', $title)) {
        $errors['title'] = "Title should not be empty and should not contain special symbols.";
    }

    // Validate content
    if (empty($content)) {
        $errors['content'] = "Content should not be empty.";
    } elseif (substr($content, -1) !== '?') {
        $errors['content'] = "Content must end with a question mark (?).";
    }

    // Validate category
    if (empty($category)) {
        $errors['category'] = "Category should not be empty.";
    } elseif (!in_array($category, $categories)) {
        $errors['category'] = "Invalid category selected.";
    }

    if (empty($errors['title']) && empty($errors['content']) && empty($errors['category'])) {
        $question = new Question(null, $title, $content, $category);
        $questionC->addQuestion($question);
        header('Location: /web/View/user/Forum.php');
    }
}



function filterBadWords($text)
{
    // List of bad words (add more as needed)
    $badWords = array('b1', 'b2', 'b3');

    // Convert text to lowercase for case-insensitive matching
    $lowercaseText = strtolower($text);

    // Check if the text contains any bad words
    foreach ($badWords as $badWord) {
        if (stripos($lowercaseText, $badWord) !== false) {
            // Bad word detected, show alert
            echo '<script>alert("Profanity detected! Please avoid using offensive language.");</script>';
            // You can choose to stop processing further or continue as needed
            return '';
        }
    }

    // No bad words detected, return the filtered text
    return $lowercaseText;
}

// Example usage:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = filterBadWords($_POST['title']); // Assuming the input field for title
    $content = filterBadWords($_POST['content']); // Assuming the input field for content
    $category = filterBadWords($_POST['category']); // Assuming the input field for category

    // Rest of your code to process the form data, save to the database, etc.
}



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
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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




</head>

<body>



    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!--welcome-hero start -->
    
    <!--new-cars start -->

    <!--new-cars end -->



    <!--featured-cars start -->
    <!--featured-cars start -->
    <section id="featured-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
            </div><!--/.section-header-->
            <div class="featured-cars-content">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="container">


                            <!-- Add this div for the popup container -->
                            <div id="popup-container">
                                <p id="popup-message" style="margin: 0;"></p>
                            </div>

                            <audio id="forbidden-sound" src="forbidden.mp3"></audio>





                            <h1 class="mt-4 mb-4">Forum</h1>
                            <div id="container" class="bg-light p-4 rounded">
                                
                                <form action="" method="POST" id="form">
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" id="title" name="title" class="form-control" required />
                                        <p class="text-danger" id="titleError">
                                            <?php echo $errors['title']; ?>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <input type="text" id="content" name="content" class="form-control" required />
                                        <p class="text-danger" id="contentError">
                                            <?php echo $errors['content']; ?>
                                        </p>
                                    </div>


                                    <script>
                                        document.addEventListener("DOMContentLoaded", function () {
                                            var contentInput = document.getElementById("content");
                                            var contentError = document.getElementById("contentError");
                                            var popupContainer = document.getElementById("popup-container");
                                            var popupMessage = document.getElementById("popup-message");
                                            var forbiddenSound = document.getElementById("forbidden-sound");

                                            contentInput.addEventListener("input", function () {
                                                var inputValue = contentInput.value.toLowerCase();
                                                var prohibitedWords = ["fuck", "shit", "2 girls 1 cup", "2g1c", "4r5e", "5h1t", "5hit", "a$$", "a$$hole", "a_s_s", "a2m", "a54", "a55", "a55hole", "aeolus", "ahole", "alabama hot pocket", "alaskan pipeline", "anal", "wtf", "anal impaler", "anal leakage", "analannie", "analprobe", "analsex", "anilingus", "anus", "apeshit", "ar5e", "areola", "areole", "arian", "arrse", "arse", "arsehole", "aryan", "ass", "ass fuck", "ass hole", "assault", "assbag", "assbagger", "assbandit", "assbang", "assbanged", "assbanger", "assbangs", "assbite", "assblaster", "assclown", "asscock", "asscracker", "asses", "assface", "assfaces", "assfuck", "assfucker", "ass-fucker", "assfukka", "assgoblin", "assh0le", "asshat", "ass-hat", "asshead", "assho1e", "asshole", "assholes", "asshopper", "asshore", "ass-jabber", "assjacker", "assjockey", "asskiss", "asskisser", "assklown", "asslick", "asslicker", "asslover", "assman", "assmaster", "assmonkey", "assmucus", "assmunch", "assmuncher", "assnigger", "asspacker", "asspirate", "ass-pirate", "asspuppies", "assranger", "assshit", "assshole", "asssucker", "asswad", "asswhole", "asswhore", "asswipe", "asswipes", "auto erotic", "autoerotic", "axwound", "azazel", "azz", "b!tch", "b00bs", "b17ch", "b1tch", "babe", "babeland", "babes", "baby batter", "baby juice", "badfuck", "ball gag", "ball gravy", "ball kicking", "ball licking", "ball sack", "ball sucking", "ballbag", "balllicker", "balls", "ballsack", "bampot", "bang", "bang (one's) box", "bangbros", "banger", "banging", "bareback", "barely legal", "barenaked", "barf", "barface", "barfface", "bastard", "bastardo", "bastards", "bastinado", "batty boy", "bawdy", "bazongas", "bazooms", "bbw", "bdsm", "beaner", "beaners", "beardedclam", "beastial", "beastiality", "beatch", "beater", "beatyourmeat", "beaver", "beaver cleaver", "beaver lips", "beef curtain", "beef curtains", "beer", "beeyotch", "bellend", "bender", "beotch", "bestial", "bestiality", "bi+ch", "biatch", "bicurious", "big black", "big breasts", "big knockers", "big tits", "bigbastard", "bigbutt", "bigger", "bigtits", "bimbo", "bimbos", "bint", "birdlock", "bisexual", "bi-sexual", "bitch", "bitch tit", "bitchass", "bitched", "bitcher", "bitchers", "bitches", "bitchez", "bitchin", "bitching", "bitchtits", "bitchy", "black cock", "blonde action", "blonde on blonde action", "bloodclaat", "bloody", "bloody hell", "blow", "blow job", "blow me", "blow mud", "blow your load", "blowjob", "blowjobs", "blue waffle", "blumpkin", "boang", "bod", "bodily", "bogan", "bohunk", "boink", "boiolas", "bollick", "bollock", "bollocks", "bollok", "bollox", "bomd", "bondage", "bone", "boned", "boner", "boners", "bong", "boob", "boobies", "boobs", "booby", "booger", "bookie", "boong", "boonga", "booobs", "boooobs", "booooobs", "booooooobs", "bootee", "bootie", "booty", "booty call", "booze", "boozer", "boozy", "bosom", "bosomy", "bowel", "bowels", "bra", "brassiere", "breast", "breastjob", "breastlover", "breastman", "breasts"]


                                                for (var i = 0; i < prohibitedWords.length; i++) {
                                                    if (inputValue.includes(prohibitedWords[i])) {
                                                        showPopup("Please avoid using inappropriate language.");
                                                        contentInput.setCustomValidity("Invalid input");
                                                        return;
                                                    }
                                                }

                                                // Clear the error message if no prohibited words are found
                                                contentError.innerHTML = "";
                                                contentInput.setCustomValidity("");
                                            });

                                            // Function to show the popup
                                            function showPopup(message) {
                                                // Set the popup message
                                                popupMessage.innerHTML = message;
                                                // Show the popup
                                                popupContainer.style.display = "block";
                                                // Play the forbidden sound
                                                forbiddenSound.play();
                                                // Hide the popup after a delay (e.g., 3 seconds)
                                                setTimeout(function () {
                                                    popupContainer.style.display = "none";
                                                }, 3000);
                                            }
                                        });
                                    </script>



                                    <div class="form-group">
                                        <label for="category">Category:</label>
                                        <select id="category" name="category" class="form-control" required>
                                            <option value="" selected disabled>Select a category</option>
                                            <?php foreach ($categories as $cat): ?>
                                                <option value="<?php echo $cat; ?>">
                                                    <?php echo $cat; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <p class="text-danger" id="categoryError">
                                            <?php echo $errors['category']; ?>
                                        </p>
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>

                                    <div class="form-group mt-3">
                                        <a href="/web/View/user/Forum.php" class="btn btn-outline-primary">Back
                                            to List</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








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