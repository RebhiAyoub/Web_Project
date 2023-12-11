<?php
$errors = [
    'title' => '',
    'content' => '',
    'category' => '',
];

include '../Controller/questionC.php'; // Update the path to QuestionC
include '../model/question.php'; // Update the path to Question

$categories = [
    'Contraception and Family Planning',
    'Menstrual Health',
    'Pregnancy and Childbirth',
    'Sexual Wellness',
    'Reproductive Health Conditions'
];

$error = "";

// Create question
$question = null;

// Create an instance of the controller
$questionC = new QuestionC(); // Update the class name to QuestionC



if (
    isset($_POST["title"]) &&
    isset($_POST["content"]) &&
    isset($_POST["category"])
) {
    if (
        !empty($_POST['title']) &&
        !empty($_POST["content"]) &&
        !empty($_POST["category"])
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
            $questionC->updateQuestion($question, $_POST['idQuestion']);
            header('Location:listquestion1.php');
        }
    } else {
        $error = "Missing information";
    }
}


?>



<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
        
        <!-- title of site -->
        <title>Women's Health Compass</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
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
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
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
    </style>




    </head>
	
	<body>
		
		
	
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">
			<div class="logo">
				<img src="logo155.png" alt="Logo">
			</div>
			

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <div class="container">

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				        

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" scroll active"><a href="#home">home</a></li>
				                    <li class="scroll"><a href="#service">Pregnancy & Maternity</a></li>
				                    <li class="scroll"><a href="#featured-cars">Sexual & Reproductive Health</a></li>
				                    <li class="scroll"><a href="#new-cars">Product</a></li>
				                    <li class="scroll"><a href="#contact">Contact</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">
					<h2>"Empowering Women, Nurturing Health. Discover a journey to wellness with our comprehensive resources and support. Welcome to a community that cares for every step of your health journey"</h2>
					<button class="welcome-btn" onclick="window.location.href='#'">Log in</button>
				</div>
			</div>

			

		</section><!--/.welcome-hero-->
		<!--welcome-hero end -->

		<!--service start -->
		<section id="service" class="service" style="padding-top: 70px; padding-bottom: 200px;">	  
			<div class="container">
				<div class="service-content">
					<div class="row">
                        <a href="../carvilla-v1.0/model/prenatal.html">
                            <div class="col-md-4 col-sm-6" style="padding-top: 23px;">
                                <style>
                                    .single-service-icon img {
                                        width: 250px; /* Adjust the width to your desired size */
                                        height: 200px; /* Adjust the height to your desired size */
                                    }
                                </style>
                        
							<div class="single-service-item" style="padding-top: 10px; padding-left: 10px; ">
                                    <div class="single-service-icon">
                                        <img src="pregnantexercice.png" alt="Pregnancy Exercise">
                                    </div>
                                    
                                    <h2><a href="#">Prenatal Classes</a></h2>
                                    <p style="text-align: left; padding-left: 50px;">
                                        -> Prenatal Exercises<br>
                                        -> Nutrition<br>
                                        -> Childbirth Preparation<br>
										<br>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        
                        
                        <a href="../carvilla-v1.0/model/tracker.html">
                            <div class="col-md-4 col-sm-6" style="padding-top: 23px;">
								<div class="single-service-item" style="padding-top: 10px; padding-left: 10px; ">
                                    <div class="single-service-icon">
                                        <img src="pregnancytracker.png" alt="Pregnancy Tracker">
                                    </div>
                                    <h2><a href="#">Pregnancy Tracker</a></h2>
                                    <p style="text-align: left; padding-left: 60px;">
                                        -> Personalized Insights<br>
                                        -> Week-By-Week Guidance<br>
                                        -> Conception And Delivery<br>
										<br>
                                    </p>
                                </div>
                            </div>
                        </a>
                        
                        
                        <a href="../carvilla-v1.0/model/parenting.html">
                            <div class="col-md-4 col-sm-6">
								<div class="single-service-item" style="padding-top: 10px; padding-left: 10px; ">
                                    <div class="single-service-icon">
                                        <img src="maternity.png" alt="Maternity">
                                    </div>
                                    <h2><a href="#">Parenting Guides</a></h2>
                                    <p style="text-align: left; padding-left: 60px;">
                                        -> NewBorn Care<br>
                                        -> Recovery And Welness Programs<br>
                                        -> Infant Safety Measures
                                    </p>
                                </div>
                            </div>
                        </a>

					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->

		<!--new-cars start -->
			
		<!--new-cars end -->



<!--featured-cars start -->
<!--featured-cars start -->
<section id="featured-cars" class="featured-cars mt-5">
    <div class="container">
        <div class="section-header">
            <p>Explore <span>Our</span> Forum</p>
            <h2>Forum</h2>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div id="error" class="alert alert-danger">
                    <?php echo $error; ?>
                </div>

                <?php
                if (isset($_POST['idQuestion'])) {
                    $question = $questionC->showQuestion($_POST['idQuestion']);
                ?>

                <form action="" method="POST">
                    <div class="form-group" style="display: none;">
                        <label for="idQuestion">Id Question:</label>
                        <input type="text" id="idQuestion" name="idQuestion" value="<?php echo $_POST['idQuestion'] ?>" readonly />
                        <span id="erreurIdQuestion" style="color: red"></span>
                    </div>

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" value="<?php echo $question['title'] ?>" class="form-control" />
                        <span id="erreurTitle" style="color: red"><?php echo $errors['title']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea id="content" name="content" class="form-control"><?php echo $question['content'] ?></textarea>
                        <span id="erreurContent" style="color: red"><?php echo $errors['content']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" class="form-control" required>
                            <option value="" selected disabled>Select a category</option>
                            <?php foreach ($categories as $cat) : ?>
                                <option value="<?php echo $cat; ?>" <?php echo ($cat == $question['category']) ? 'selected' : ''; ?>><?php echo $cat; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span id="erreurCategory" style="color: red"><?php echo $errors['category']; ?></span>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary" />
                        <input type="reset" value="Reset" class="btn btn-default" />
                    </div>
                </form>

                <?php
                }
                ?>
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