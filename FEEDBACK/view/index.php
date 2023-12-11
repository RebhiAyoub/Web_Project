
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

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha384-wHA48JNKIV2n8vwDndAihcUMZSmKvyUwhCkKOQ9W6ZON6irZCr1BZe2XWBU5Q56f" crossorigin="anonymous">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        
		<style>
			 @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'Poppins', sans-serif;
	}
	:root {
            --pink: #FF69B4; 
            --light-pink: #FFC0CB; 
            --dark-pink: #FF1493; 
            --yellow: #FFBD13;
            --blue: #4383FF;
            --blue-d-1: #3278FF;
            --light: #F5F5F5;
            --grey: #AAA;
            --white: #FFF;
            --shadow: 8px 8px 30px rgba(0, 0, 0, .05);
        }
		.clients-say {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #FFC0CB; 
    width: 100%; 
    height: 100vh; 
    padding: 1rem; 
}

.clients-say .wrapper {
    background: var(--white);
    padding: 2rem;
    max-width: 576px;
    width: 100%;
    border-radius: .75rem;
    box-shadow: var(--shadow);
    text-align: center;
}

.clients-say h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--pink);
}

.clients-say .rating {
    display: flex;
    justify-content: center;
    align-items: center;
    grid-gap: .5rem;
    font-size: 2rem;
    color: var(--yellow); 
    margin-bottom: 2rem;
}

.clients-say .rating .star {
    cursor: pointer;
}

.clients-say .rating .star.active {
    opacity: 0;
    animation: animate .5s calc(var(--i) * .1s) ease-in-out forwards;
}

@keyframes animate {
    0% {
        opacity: 0;
        transform: scale(1);
    }
    50% {
        opacity: 1;
        transform: scale(1.2);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.clients-say .rating .star:hover {
    transform: scale(1.1);
}

.clients-say label {
    color: var(--pink); 
}

.clients-say select {
    width: 100%;
    background: var(--light-pink);
    padding: 1rem;
    border-radius: .5rem;
    border: none;
    outline: none;
    resize: none;
    margin-bottom: .5rem;
    color: var(--pink); 
}

.clients-say textarea {
    width: 100%;
    background: #DABFE1; 
    padding: 1rem;
    border-radius: .5rem;
    border: none;
    outline: none;
    resize: none;
    margin-bottom: .5rem;
    color: #FF1493; 
}

.clients-say ::placeholder {
    color: #FF69B4; 
}

.clients-say .category-dropdown {
    color: #DABFE1; 
    border: 1px solid #DABFE1; 
    border-radius: .5rem;
    outline: none;
    padding: 0.5rem;
    background-color: #DABFE1; 
}

.clients-say .category-dropdown:hover {
    background-color: #FF69B4; 
    color: #FFF; 
}

.clients-say .btn-group {
    display: flex;
    grid-gap: .5rem;
    align-items: center;
}

.clients-say .btn-group .btn {
    padding: .75rem 1rem;
    border-radius: .5rem;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: .875rem;
    font-weight: 500;
}

.clients-say .btn-group .btn.submit {
    background: var(--pink); 
    color: var(--white); 
}

.clients-say .btn-group .btn.submit:hover {
    background: var(--dark-pink); 
}

.clients-say .btn-group .btn.cancel {
    background: var(--white);
    color: var(--pink); 
}

.clients-say .btn-group .btn.cancel:hover {
    background: var(--light-pink); 
}




        #feedback-area {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 8px;
        }

        .user-feedback {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .user-feedback:last-child {
            border-bottom: none;
        }

        .feedback-content {
            margin-bottom: 8px;
        }

        .feedback-metadata {
            color: #888;
            font-size: 12px;
        }

		.username {
            font-weight: bold;
            color: #3498db; /* Change the color to your preference */
        }
		
        /* Add this to your CSS file or style section */
.clients-say {
    background-color: #FFC0CB; /* Set your desired background color */
    padding: 20px;
}

.submit-feedback {
    text-align: center;
    margin: 50px 0;
}

.submit-feedback p {
    font-size: 18px;
    color: #333; /* Set your desired text color */
}

.btn.submit {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff; /* Set your desired button background color */
    color: #fff; /* Set your desired button text color */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn.submit:hover {
    background-color: #0056b3; /* Set your desired button background color on hover */
}

	

    

			.logo {
				display: inline-block;
				vertical-align: middle;
			}
	
			.logo img {
				width: 200px; 
				height: auto; 
			}
	
			.site-title {
				display: inline-block;
				vertical-align: middle;
				font-size: 100px; 
				margin-left: 20px; 
			}
    /* Styles for user feedback */
.user-feedback {
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

.feedback-content {
    font-size: 14px;
}

.feedback-metadata {
    font-size: 12px;
    color: #888;
}

.btn {
    display: inline-block;
    padding: 5px 10px;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border: 1px solid #007bff;
    border-radius: 3px;
    margin-right: 5px;
}

/*******************************************************************************************************************************NEW******************** */
.feedback-item {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            position: relative;
        }

        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            color: red;
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
									<li class="scroll"><a href="#clients-say">Feedback</a></li>
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

		

		
		
		
<!-- Submit Feedback section -->
<section id="clients-say" class="clients-say">
    <div class="wrapper">
        <h3>Your feedback is important to us!</h3>

        <form id="feedback-form" action="addFeedback.php" method="post" onsubmit="return validateForm()">
            <input type="hidden" name="operation" id="operation" value="add">
            <input type="hidden" name="feedbackId" id="feedbackId">
            <div class="rating">
                <input type="number" name="rating" id="rating" hidden>

                <i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
            <label for="category" class="category-label">Category:</label>
            <select id="category" name="category">
                <?php
                // Include the CategoryC.php controller
                require_once 'C:\xampp\htdocs\FEEDBACK\controller\CategoryC.php';

                // Create an instance of CategoryC
                $categoryController = new CategoryC();

                // Call the showCategories method to get category data
                $categoriesData = $categoryController->showCategories();

                // Display the categories dynamically
                foreach ($categoriesData as $category) {
                    echo "<option value='{$category['nameCategory']}'>{$category['nameCategory']}</option>";
                }
                ?>
            </select>

            <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Your opinion..."></textarea>
            <p id="opinionLengthMessage"></p>
            <p id="wordsRemaining" style="float: right;">256</p>
            <div class="btn-group">
                <button type="submit" class="btn submit" href="addFeedback.php?feedbackId=<?php echo $feedback['idFeedback']; ?>&page=<?php echo $currentPage; ?>">Submit</button>
                <button class="btn cancel">Cancel</button>
            </div>
        </form>
    </div>

    <script>
        const allStar = document.querySelectorAll('.rating .star');
        const ratingValue = document.querySelector('.rating input');

        allStar.forEach((item, idx) => {
            item.addEventListener('click', function () {
                let click = 0;
                ratingValue.value = idx + 1;

                allStar.forEach(i => {
                    i.classList.replace('bxs-star', 'bx-star');
                    i.classList.remove('active');
                });

                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace('bx-star', 'bxs-star');
                        allStar[i].classList.add('active');
                    } else {
                        allStar[i].style.setProperty('--i', click);
                        click++;
                    }
                }
            });
        });

        function validateForm() {
            // Get the selected rating value
            var rating = ratingValue.value;

            // Get the opinion value
            var opinion = document.getElementById('comment').value;

            // Perform validation
            if (!rating) {
                alert("Please select a rating.");
                return false;
            }

            if (opinion.trim() === "") {
                alert("Please provide your opinion.");
                return false;
            }

            if (!validateOpinionLength(opinion, 1)) {
                alert("Opinion should have at least 1 word.");
                return false;
            }

            if (!validateMaxWords(opinion, 256)) {
                alert("Opinion cannot exceed 256 words.");
                return false;
            }

            // If all validations pass, the form will be submitted
            return true;
        }

        function validateOpinionLength(opinion, minLength) {
            // Split the opinion into words
            var words = opinion.trim().split(/\s+/).filter(function (el) {
                return el.length > 0;
            });

            // Display the number of words remaining to reach the specified minimum length
            var wordsRemaining = 256 - words.length;
            document.getElementById('wordsRemaining').innerText = wordsRemaining;

            // Check if the number of words is at least minLength
            return words.length >= minLength;
        }

        function validateMaxWords(opinion, maxWords) {
            // Split the opinion into words
            var words = opinion.trim().split(/\s+/).filter(function (el) {
                return el.length > 0;
            });

            // Check if the number of words does not exceed maxWords
            return words.length <= maxWords;
        }

        // Display the number of words in the opinion as the user types
        document.getElementById('comment').addEventListener('input', function () {
            var opinion = this.value;
            var words = opinion.trim().split(/\s+/).filter(function (el) {
                return el.length > 0;
            });

            // Display the number of words remaining out of 256
            var wordsRemaining = 256 - words.length;
            document.getElementById('wordsRemaining').innerText = wordsRemaining;
        });
    </script>
</section>



<!-- clients-say end -->

<!-- Feedback display section -->
<section id="feedback-area">
    <h3>Feedback Area</h3>
    <div id="insert-feedback-area">
        <?php
        // Include the FeedbackC.php and ReplyC.php controllers
        require_once 'C:\xampp\htdocs\FEEDBACK\controller\FeedbackC.php';
        require_once 'C:\xampp\htdocs\FEEDBACK\controller\ReplyC.php';

        // Create instances of FeedbackC and ReplyC
        $feedbackController = new FeedbackC();
        $replyController = new ReplyC();

        // Call the showFeedback method to get feedback data
        $feedbackData = $feedbackController->showFeedback();

        // Number of feedback items to display per page
        $itemsPerPage = 4;

        // Get the current page from the URL parameter
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;



        // Calculate the starting index for the displayed feedback items
     $startIndex = ($currentPage - 1) * $itemsPerPage;



// Get a subset of feedback items based on the current page
      $pagedFeedbackData = array_slice($feedbackData, $startIndex, $itemsPerPage);


        // Display the feedback
        foreach ($pagedFeedbackData as $feedback): ?>
            <div class="feedback-item">
                <p><strong>User ID:</strong> <?php echo $feedback['idUser']; ?></p>
                <p><strong>Rating:</strong> <?php echo $feedback['Rating']; ?></p>
                <p><strong>Comment:</strong> <?php echo $feedback['Comment']; ?></p>
                <p><strong>Category:</strong> <?php echo $feedback['nameCategory']; ?></p>
                <p><strong></strong> <?php echo $feedback['timestamp_column']; ?></p>
                <a class="delete-btn" href="deleteFeedback.php?feedbackId=<?php echo $feedback['idFeedback']; ?>&page=<?php echo $currentPage; ?>">

                    <i class="fa-solid fa-trash fa-fade" style="color: #ff0000;"></i> <!-- Font Awesome trash icon -->
                </a>
                <a class="edit-btn" href="updateFeedback.php?feedbackId=<?php echo $feedback['idFeedback']; ?>&page=<?php echo $currentPage; ?>">
                    <i class="fa-solid fa-pen fa-beat" style="color: #11b805;"></i> <!-- Font Awesome edit icon -->
                </a>
                <hr>

                <!-- Display replies for the current feedback -->
                <?php
                $feedbackId = $feedback['idFeedback'];
                $replies = $replyController->showReplies($feedbackId);

                foreach ($replies as $reply): ?>
                    <div class="reply-item">
                        <p><strong>Admin Reply:</strong> <?php echo $reply['adminReply']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
        <!--************************************************* -->
        <!-- Pagination navigation -->
        <style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    .pagination a, .pagination span {
        display: inline-block;
        padding: 8px 16px;
        margin: 0 4px;
        text-align: center;
        text-decoration: none;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 4px;
    }

    .pagination a:hover {
        background-color: #ddd;
    }

    .pagination span.active {
        background-color: #007bff;
        color: #fff;
    }

    .pagination i {
        margin-right: 4px;
    }
  </style>
  <div class="pagination">
        <?php
        // Calculate the total number of pages
        $totalPages = ceil(count($feedbackData) / $itemsPerPage);

        // Display previous page arrow
        if ($currentPage > 1) {
            echo '<a href="?page=' . ($currentPage - 1) . '#feedback-area"><i class="fas fa-chevron-left"></i></a>';
        }

        // Display page numbers with '/' separator
        for ($i = 1; $i <= $totalPages; $i++) {
            // Display only the arrows as links
            if ($i == $currentPage) {
                echo '<span class="active">' . $i . '</span>';
            } else {
                echo '<a href="?page=' . $i . '#feedback-area">' . $i . '</a>';
            }
        }

        // Display next page arrow
        if ($currentPage < $totalPages) {
            echo '<a href="?page=' . ($currentPage + 1) . '#feedback-area"><i class="fas fa-chevron-right"></i></a>';
        }
        ?>
    </div>

        <!-- Admin link -->
        <div class="admin-link">
            <a href="admin.php">Admin</a>
        </div>

    </div>
</section>

</section>




               
            </div>
            
        </div>
        <!-- End of sample feedback entry -->
    </div>
		</section>
		

		<!--brand strat -->
	
		<!--brand end -->

		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

		<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">Women's Health Compass</a>
								</div>
								<p>
									Ased do eiusm tempor incidi ut labore et dolore magnaian aliqua. Ut enim ad minim veniam.
								</p>
								<div class="footer-contact">
									<p>info@themesine.com</p>
									<p>+1 (885) 2563154554</p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="single-footer-widget">
								<h2>about devloon</h2>
								<ul>
									<li><a href="#">about us</a></li>
									<li><a href="#">career</a></li>
									<li><a href="#">terms <span> of service</span></a></li>
									<li><a href="#">privacy policy</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="single-footer-widget">
								<h2>top brands</h2>
								<div class="row">
									<div class="col-md-7 col-xs-6">
										<ul>
											<li><a href="#">BMW</a></li>
											<li><a href="#">lamborghini</a></li>
											<li><a href="#">camaro</a></li>
											<li><a href="#">audi</a></li>
											<li><a href="#">infiniti</a></li>
											<li><a href="#">nissan</a></li>
										</ul>
									</div>
									<div class="col-md-5 col-xs-6">
										<ul>
											<li><a href="#">ferrari</a></li>
											<li><a href="#">porsche</a></li>
											<li><a href="#">land rover</a></li>
											<li><a href="#">aston martin</a></li>
											<li><a href="#">mersedes</a></li>
											<li><a href="#">opel</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<h2>news letter</h2>
								<div class="footer-newsletter">
									<p>
										Subscribe to get latest news  update and informations
									</p>
								</div>
								<div class="hm-foot-email">
									<div class="foot-email-box">
										<input type="text" class="form-control" placeholder="Add Email">
                                        


									</div><!--/.foot-email-box-->
									<div class="foot-email-subscribe">
										<span><i class="fa fa-arrow-right"></i></span>
									</div><!--/.foot-email-icon-->
								</div><!--/.hm-foot-email-->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-sm-6">
							<p>
								&copy; copyright.designed and developed by <a href="https://www.themesine.com/">themesine</a>.
							</p><!--/p-->
						</div>
						<div class="col-sm-6">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>	
							</div>
						</div>
					</div>
				</div><!--/.footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->


		
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