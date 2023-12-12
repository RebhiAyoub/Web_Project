


<!doctype html>
<html class="no-js" lang="en">

    <head>
		<link rel="stylesheet" href="assets/css/sexual.css">

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
		<style>
			.logo {
				display: inline-block;
				vertical-align: middle;
			}
	
			.logo img {
				width: 200px; /* Set the width of your logo image */
				height: auto; /* Maintain aspect ratio */
			}
	
			.site-title {
				display: inline-block;
				vertical-align: middle;
				font-size: 100px; /* Adjust the text size of the site title */
				margin-left: 20px; /* Adjust the distance between the logo and text */
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
				<img src="logo2.png" alt="Logo">
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
				                    <li class="scroll"><a href="#featured-cars">cycle length</a></li>
				                    <li class="scroll"><a href="#new-cars">ovulation</a></li>
				                    <li class="scroll"><a href="#contact">review</a></li>
									
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
		

		

		<!--featured-cars start -->
		<section id="featured-cars" class="featured-cars" style="background: url(assets/img5.jpg);">
			<div class="container" >
				<div class="section-header">
					
					



   
					

<!--featured-cars start -->
<section id="featured-cars" class="featured-cars" >
    <div class="container" >
        <div class="section-header">
            <!-- Your existing code for the "featured-cars" section -->
        </div>

        <!-- Menstrual Cycle Length Calculator Form -->
        <div class="menstrual-cycle-form">
            <h2 style="color: fuchsia;"><b>Woman's Cycle Length Calculator</b></h2>
            <form id="cycle-form" method="post" action="#featured-cars"> <!--  the form data will be submitted to a PHP script named "cyclefinder.php" for processing. -->
				<div class="form-group">
                    <label for="idUser">User ID:</label>
                    <input type="text" name="idUser" required>
                </div>

                <div class="form-group">
                    <label for="currentPeriodDate">Current Period Date:</label>
                    <input type="date" name="currentPeriodDate" id="currentPeriodDate" oninput="compareDates()" required>
                </div>

                <div class="form-group">
                    <label for="previousPeriodDate">Previous Period Date:</label>
                    <input type="date" name="previousPeriodDate" id="previousPeriodDate" oninput="compareDates()" required>
                </div>

              

				<button type="submit" id="calculatePeriod" name="calculate" onclick="compareDates();calculateCycleLength();" style="background-color: fuchsia; color: white;" disabled>Calculate</button>
				
            </form>

			<hr>

            <!-- Result Display -->
            <div id="result-display" class="result-display" >
			<?php


						include_once '../Controller/CycleC.php';


						$cycleController = new  CycleC();//same name as controller file 
						$cycleList = $cycleController->listcycles();//o as u like


						if (isset($_POST['calculate'])) {
							// Retrieve the form data
							$cycleStart = new DateTime($_POST['previousPeriodDate']);
							$cycleEnd = new DateTime($_POST['currentPeriodDate']);
							$currentPeriodDate = $_POST['currentPeriodDate'];
							$previousPeriodDate = $_POST['previousPeriodDate'];
							$idUser = $_POST['idUser'];

							// Perform any database interactions here
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "cycle";

							try {
								$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
								$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

								// Calculate the menstrual cycle length
								$cycleLength = $cycleStart->diff($cycleEnd)->days;

								// Use prepared statement to prevent SQL injection
								$query = "INSERT INTO user1 (currentPeriodDate, previousPeriodDate, menstrualCycleLength) VALUES (:currentPeriodDate, :previousPeriodDate, :cycleLength)";
								$stmt = $conn->prepare($query);
								
								$stmt->bindParam(':currentPeriodDate', $currentPeriodDate);
								$stmt->bindParam(':previousPeriodDate', $previousPeriodDate);
								$stmt->bindParam(':cycleLength', $cycleLength);
								$stmt->execute();

								// Prepare the response
								$response ='<b> Your average cycle length is: ' . $cycleLength . ' days.</b>';

								// Send the response back to the client
								echo $response;
								
							} catch (PDOException $e) {
								echo "Error: " . $e->getMessage();
							} finally {
								// Close the connection
								$conn = null;
							}
						
						}
						?>
			</div>
        </div>
    </div>
	
	<script>
        function calculateCycleLength() {
			var resultContainer = document.getElementById('result-display');
            // Get form data
			 //FORMDATA it took values from the form variables
            var formData = $('#cycle-form').serialize();

            // Perform AJAX:no reload needed post and sends data to the html page created request
            $.post('./cyclefinder.php', formData, function (response) {
				  
                // Update result-container with the response
                $('result-display').html(index);
            });
        }
		function compareDates() {
            // Get the input values from HTML form elements
            var date1 = new Date(document.getElementById('currentPeriodDate').value);
            var date2 = new Date(document.getElementById('previousPeriodDate').value);
			var submitButton = document.getElementById('calculatePeriod');
			

            // Compare the dates
            if (date1 > date2) {
				date1.disabled = false;
                date2.disabled = false;
				submitButton.disabled = false;
            } else if (date1 < date2) {
                alert('currentPeriodDate must be later than previousPeriodDate !');
				submitButton.disabled = true;
				date1.disabled = true;
                date2.disabled = true;
            } else {
				submitButton.disabled = true;
            }

			return (date1>date2)
        }

    </script>
</section>
<!--featured-cars end -->


	<!--featured-cars start -->
<section id="new-cars" class="featured-cars" >
    <div class="container" >
        <div class="section-header">
            <!-- Your existing code for the "featured-cars" section -->
        </div>

        <!-- Menstrual Cycle Length Calculator Form -->
        <div class="menstrual-cycle-form">
            <h2 style="color: fuchsia;"><b>Woman's ovulation day calculator</b></h2>
            <form id="ovulation-form" method="post" action="#new-cars"> <!--  the form data will be submitted to a PHP script named "cyclefinder.php" for processing. -->
				<div class="form-group">
                    <label  for="idUser">User ID:</label>
                    <input class="form-control" type="number" name="idUser" required>
                </div>

                <div class="form-group">
                    <label  for="firstDayOfLMP">First Day of the previous period:</label>
                    <input class="form-control" type="date" name="firstDayOfLMP" id="firstDayOfLMP" required>
                </div>

				<div class="form-group">
				<label  for="averageCycleLength">Average Cycle Length</label>
				<select   class="form-control" name="averageCycleLength"  class="col-sm-6">
                        <?php
                         foreach($cycleList as $cycl) {
                        ?>
                                <option class="col-sm-6" value="<?php echo $cycl['menstrualCycleLength'] ?>"><?php echo $cycl['menstrualCycleLength'] ?> -- UserID: <?php echo $cycl['idUser'] ?> </option>
                                     <?php }  ?>
                    </select>

					</div>

              

				<button type="submit" id="calculateovulation" style="background-color: fuchsia; color: white;"> Calculate</button>
            </form>

            <!-- Result Display -->
            <div id="result-container-ov" class="result-container">
			<?php
					include_once '../Controller/OvulationC.php';
					include_once '../model/Ovulation.php';

					

					// create an instance of the controller
					$ovulationC = new OvulationC();
					if (
						isset($_POST["firstDayOfLMP"]) &&
						isset($_POST["averageCycleLength"]) 
					
					) {
						if (
							!empty($_POST['firstDayOfLMP']) &&
							!empty($_POST["averageCycleLength"]) 
							
						) {
							$firstDayOfLMP= $_POST['firstDayOfLMP'];
						$averageCycleLength= $_POST['averageCycleLength'];

						// Convert the LMP to a DateTime object
						$lmpDate = new DateTime($firstDayOfLMP);

						// Calculate the estimated ovulation date
						$ovulationDate = clone $lmpDate;
						$ovulationDate->modify("+" . ($averageCycleLength - 14) . " days");

						// Format and return the result
						$response = "<p><b>Your ovulation date is: " . $ovulationDate->format('Y-m-d') . "</b></p>";

						// Send the response back to the client
						echo $response;


						$ovulation = null;
							$ovulation = new Ovulation(
								null,
								$_POST['firstDayOfLMP'],
								$_POST['averageCycleLength'],
								$ovulationDate->format('Y-m-d')
								
							);
							$ovulationC->create($ovulation);
							
						} else {
							$error = "Missing information";
						}
					}




			?>

			</div>
        </div>
    </div>
	
	<script>
		function checkCycleLength() {
			// Get the input element and submit button
			var averageCycleLengthInput = document.getElementById('averageCycleLength');
			var submitButton = document.getElementById('calculateovulation');
			
			
			// Get the entered cycle length value
			var cycleLength = parseInt(averageCycleLengthInput.value);
		
			// Check if the cycle length is within the desired range (23 to 35)
			if (cycleLength >= 23 && cycleLength <= 35) {
				// Enable the button
				submitButton.disabled = false;
			} else {
				// Show an alert and disable the button
				alert('Please enter a cycle length between 23 and 35.');
				averageCycleLengthInput.value = ''; // Reset the input field
				submitButton.disabled = true;
			}
		}
		
		
		
		function calculateOvulationDay() {
			// Get form data
			var formData = $('#ovulation-form').serialize();
		
			// Perform AJAX: no reload needed, post, and send data to the HTML page created request
			$.post('./ovulationTracker.php', formData, function (response) {
				// Update result-container with the response
				$('#result-container-ov').html(response);
			});
		}
		</script>
		
		

</section>

        
<section id="contact" class="featured-cars" >
    <div class="container" >
        <div class="section-header">
            <!-- Your existing code for the "featured-cars" section -->
        </div>

        <!-- Menstrual Cycle Length Calculator Form -->
        <div class="menstrual-cycle-form">
            <h2 style="color: fuchsia;"><b>Did You Like Our Content ?</b></h2>
            
            
				<form method="POST" id="likeDislikeForm" action="#contact">
					<div class="form-group">
						
						<div class="like-dislike-container">
							<label class="like-dislike-option">
								<input type="radio" name="likeDislike" value="like">
								<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Like
							</label>
							<label class="like-dislike-option">
								<input type="radio" name="likeDislike" value="dislike">
								<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> Dislike
							</label>
						</div>
					</div>
					<button type="submit" id="submitLikeDislike" style="background-color: fuchsia; color: white;">Submit</button>
    
				</form>

			</div>

			<div id="result-container-feed" class="result-container"> 
			<?php
			// Include necessary files and configurations
			if (
				isset($_POST["likeDislike"]) 
			
			) {
				if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['likeDislike'])) {
					$feed = $_POST['likeDislike'];

					// Database connection details
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "cycle";

					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

						// Assuming you have a table named 'user_feedback'
						$query = "INSERT INTO feedbackk (idUser, feed) VALUES (NULL,:feed)";
						$stmt = $conn->prepare($query);
						$stmt->bindParam(':feed', $feed);
						$stmt->execute();

						// You can customize the response as needed
						echo "<b>Review saved successfully! Thank you.</b>";
					} catch (PDOException $e) {
						echo "Error: " . $e->getMessage();
					} finally {
						$conn = null;
					}
				} else {
					// Handle invalid requests
					echo "Invalid request";
				}

			}
					
			?>
			</div>
        </div>
    </div>
		

</section>







<style> tag in the head of your HTML document */
	.featured-cars {
		background-color: #f5f5f53e;
		
		
		padding: 40px 0;
	}
	
	.container {
		max-width: 960px;
		
		margin: 0 auto;
	}
	
	.menstrual-cycle-form {
		background-color: #ffffff9a ;
		
		
		padding: 20px;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		margin-top: 20px;
	}
	
	.form-group {
		margin-bottom: 15px;
	}
	
	label {
		display: block;
		margin-bottom: 5px;
	}
	
	input {
		width: 100%;
		padding: 8px;
		box-sizing: border-box;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	
	button {
		background-color: #4caf50;
		color: #fff;
		padding: 10px 15px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}
	
	button:hover {
		background-color: #45a049;
	}
	
	.result-container {
		margin-top: 20px;
		font-size: 16px;
	}
	
			
				
			
			
			
			
			
			

    


				
			</div><!--/.container-->

		</section><!--/.featured-cars-->
		<!--featured-cars end -->

		<!-- clients-say strat -->
		<section id="clients-say"  class="clients-say">
			<div class="container">
				<div class="section-header">
					<h2>what our clients say</h2>
				</div><!--/.section-header-->
				<div class="row">
					<div class="owl-carousel testimonial-carousel">
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/c1.png" alt="image of clients person" />
										</div><!--/.testimonial-img-->
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan rem aperiam, eaque ipsa quae ab illo inventore verit. 
										</p>
									</div><!--/.testimonial-comment-->
									<div class="testimonial-person">
										<h2><a href="#">tomas lili</a></h2>
										<h4>new york</h4>
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/c2.png" alt="image of clients person" />
										</div><!--/.testimonial-img-->
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan rem aperiam, eaque ipsa quae ab illo inventore verit. 
										</p>
									</div><!--/.testimonial-comment-->
									<div class="testimonial-person">
										<h2><a href="#">romi rain</a></h2>
										<h4>london</h4>
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
						<div class="col-sm-3 col-xs-12">
							<div class="single-testimonial-box">
								<div class="testimonial-description">
									<div class="testimonial-info">
										<div class="testimonial-img">
											<img src="assets/images/clients/c3.png" alt="image of clients person" />
										</div><!--/.testimonial-img-->
									</div><!--/.testimonial-info-->
									<div class="testimonial-comment">
										<p>
											Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan rem aperiam, eaque ipsa quae ab illo inventore verit. 
										</p>
									</div><!--/.testimonial-comment-->
									<div class="testimonial-person">
										<h2><a href="#">john doe</a></h2>
										<h4>washington</h4>
									</div><!--/.testimonial-person-->
								</div><!--/.testimonial-description-->
							</div><!--/.single-testimonial-box-->
						</div><!--/.col-->
					</div><!--/.testimonial-carousel-->
				</div><!--/.row-->
			</div><!--/.container-->

		</section><!--/.clients-say-->	
		<!-- clients-say end -->

		<!--brand strat -->
		<section id="brand"  class="brand">
			<div class="container">
				<div class="brand-area">
					<div class="owl-carousel owl-theme brand-item">
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br1.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br2.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br3.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br4.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br5.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="#">
								<img src="assets/images/brand/br6.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.clients-area-->

			</div><!--/.container-->

		</section><!--/brand-->	
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