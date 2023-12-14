<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
include '../../Controller/p/ProductsC.php';
include '../../Controller/p/commandeC.php';
include '../../Controller/p/CategorieC.php';
include '../../Controller/FeedbackC.php';
$CategorieC = new CategorieC();
$list = $CategorieC->afficherCategorie();
$poductC = new ProductC();
$liste = $poductC->AfficherProducts();

$commandeC = new CommandeC();
// Call the addCommande function to insert into the database

if (isset($_POST["add_to_cart"])) {
	$amount = $_POST['Quantite'] * $_POST['amount'];
	$commande = new Commande(null,
		$_POST['Quantite'],
		'EN COURS',
		$amount,
		$_POST['idProduit'],
		$_SESSION['id_user']
	);
	$commandeC->addCommande($commande);
	echo '<script>
	document.addEventListener("DOMContentLoaded", function () {
		Swal.fire({
			icon: "success",
			title: "Added Successfully",
			text: "Product added to cart!",
		});
	});
  </script>';
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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">



	<style>
.welcome-hero {
			background-image: url(bgg_2.jpeg) !important;
		}

		.semah {
			background: url(a.png) !important;

		}

		.clients-say {
			background: url(a.png) !important;
		}

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

		.product-table {
			width: 100%;
			border-collapse: collapse;
		}

		.product-table th {
			background-color: #ffbbbb;
			/* pink */
		}

		.product-table td {
			padding: 5px;
		}

		.add-to-cart-btn {
			background-color: #000000;
			/* black */
			color: white;
			/* white text */
			padding: 10px;
			cursor: pointer;
		}


		h5 {
			margin-top: 100px;
			position: relative;
			font-family: url('blinkwomen/Blinkwomen.ttf');
			font-size: 80px;
			letter-spacing: 2px;
			background: linear-gradient(90deg, #800080, #DDA0DD, #000);
			background-repeat: no-repeat;
			background-size: 80%;
			animation: animate 6s;
			-webkit-background-clip: text;
			-webkit-text-fill-color: rgba(255, 255, 255, 0);
			padding-right: 1000px;
		}

		@keyframes animate {
			0% {
				background-position: -500%;
			}

			100% {
				background-position: 500%;
			}
		}

		.button-semah {



			background-color: #EA4C89;
			border-radius: 8px;
			border-style: none;
			box-sizing: border-box;
			color: #FFFFFF;
			cursor: pointer;
			display: inline-block;
			font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-size: 20px;
			font-weight: 500;
			height: 60px;
			width: 200px;

			line-height: 40px;
			list-style: none;
			margin: 0;
			outline: none;
			padding: 10px 16px;
			position: relative;
			text-align: center;
			text-decoration: none;
			transition: color 100ms;
			vertical-align: baseline;
			user-select: none;
			-webkit-user-select: none;
			touch-action: manipulation;
		}

		.button-semah:hover,
		.button-semah:focus {
			background-color: #F082AC;
		}


		.bn5 {
			padding: 0.6em 2em;
			border: none;
			outline: none;
			color: rgb(255, 255, 255);
			background: #111;
			cursor: pointer;
			position: relative;
			z-index: 0;
			border-radius: 10px;
		}

		.bn5:before {
			content: "";
			background: linear-gradient(45deg,
					#ff0000,
					#ff7300,
					#fffb00,
					#48ff00,
					#00ffd5,
					#002bff,
					#7a00ff,
					#ff00c8,
					#ff0000);
			position: absolute;
			top: -2px;
			left: -2px;
			background-size: 400%;
			z-index: -1;
			filter: blur(5px);
			width: calc(100% + 4px);
			height: calc(100% + 4px);
			animation: glowingbn5 20s linear infinite;
			opacity: 0;
			transition: opacity 0.3s ease-in-out;
			border-radius: 10px;
		}

		@keyframes glowingbn5 {
			0% {
				background-position: 0 0;
			}

			50% {
				background-position: 400% 0;
			}

			100% {
				background-position: 0 0;
			}
		}

		.bn5:active {
			color: #000;
		}

		.bn5:active:after {
			background: transparent;
		}

		.bn5:hover:before {
			opacity: 1;
		}

		.bn5:after {
			z-index: -1;
			content: "";
			position: absolute;
			width: 100%;
			height: 100%;
			background: #191919;
			left: 0;
			top: 0;
			border-radius: 10px;
		}

		.single-service-item {
			border: 0px !important;
		}

		.wrapper {
			background: transparent !important;



		}

	</style>


</head>

<body>



	<!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->

	<!--welcome-hero start -->
	<section id="home" class="welcome-hero" style="margin-top:10px;">
		<div class="logo">
			<img src="assets/logo/favicon.png" alt="Logo">
		</div>


		<!-- top-area Start -->
		<div class="top-area">
			<div class="header-area">
				<!-- Start Navigation -->
				<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"
					data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

					<div class="container">

						<!-- Start Header Navigation -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse"
								data-target="#navbar-menu">
								<i class="fa fa-bars"></i>
							</button>


						</div><!--/.navbar-header-->
						<!-- End Header Navigation -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
							<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
								<li class=" scroll active"><a href="#home">home</a></li>
								<li class="scroll"><a href="#service">Pregnancy & Maternity</a></li>
								<!-- Add this to your HTML file -->
								<li class="scroll dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sexual Health <span
											class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="/web/View/user/cycle%207/view/index.php">Ovulation Date</a></li>
										<li><a href="Forum.php">Forum</a></li>
									</ul>
								</li>

								<li class="scroll"><a href="#featured-cars">Product</a></li>

								<li class="scroll"><a href="#clients-say">Feedback</a></li>
								<li class="scroll"><a href="#contact">Contact</a></li>
								<li><a href="/web/View/user/profile.php">Profile</a></li>
							</ul><!--/.nav -->
						</div><!-- /.navbar-collapse -->
					</div><!--/.container-->
				</nav><!--/nav-->
				<!-- End Navigation -->
			</div><!--/.header-area-->
			<div class="clearfix"></div>

		</div><!-- /.top-area-->
		<!-- top-area End -->

		<div class="container" style="margin-right:220px;">
			<div>
				<h5> welcome<br>
					<?php echo $_SESSION['first_name'] ?>
					<?php echo $_SESSION['last_name'] ?>
				</h5>

			</div>
		</div>



	</section><!--/.welcome-hero-->
	<!--welcome-hero end -->

	<!--service start -->
	<section id="service" class="service" style="padding-top: 70px; padding-bottom: 200px;">
		<div class="container">
			<div class="service-content">
				<div class="row">
					<a>
						<div class="col-md-4 col-sm-6" style="padding-top: 23px;">
							<style>
								.single-service-icon img {
									width: 250px;
									/* Adjust the width to your desired size */
									height: 200px;
									/* Adjust the height to your desired size */
								}
							</style>

							<div class="single-service-item" style="padding-top: 10px; padding-left: 10px; ">
								<div class="single-service-icon">
									<img src="../user/img/pregnantexercice.png" alt="Pregnancy Exercise">
								</div>

								<h2><a href="model/prenatal.html">Prenatal Classes</a></h2>
								<p style="text-align: left; padding-left: 50px;">
									-> Prenatal Exercises<br>
									-> Nutrition<br>
									-> Childbirth Preparation<br>
									<br>
								</p>
							</div>
						</div>
					</a>



					<a>
						<div class="col-md-4 col-sm-6" style="padding-top: 23px;">
							<div class="single-service-item" style="padding-top: 10px; padding-left: 10px; ">
								<div class="single-service-icon">
									<img src="../user/img/pregnancytracker.png" alt="Pregnancy Tracker">
								</div>
								<h2><a href="model/tracker.html">Pregnancy Tracker</a></h2>
								<p style="text-align: left; padding-left: 60px;">
									-> Personalized Insights<br>
									-> Week-By-Week Guidance<br>
									-> Conception And Delivery<br>
									<br>
								</p>
							</div>
						</div>
					</a>


					<a>
						<div class="col-md-4 col-sm-6">
							<div class="single-service-item" style="padding-top: 10px; padding-left: 10px; ">
								<div class="single-service-icon">
									<img src="../user/img/maternity.png" alt="Maternity">
								</div>
								<h2><a href="model/parenting.html">Parenting Guides</a></h2>
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
	<!--featured-cars start -->
	<!--featured-cars start -->
	
	<section id="featured-cars" class="semah">
		<div class="container" style=" height:800px;">
			<div>
				<a href="YourOrders.php"
					style="display: inline-block; padding-left: 10px;padding-top: 40px;height:10px !important; width:100px!important;">
					<button type="button" class="button-semah">
						Your Orders
					</button>
				</a>
				<h2 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 20px;">Checkout Our Products
				</h2>
			</div><!--/.section-header-->
			<div class="featured-cars-content" style="padding-top:50px !important;">
				<div class="row">
					<?php
					foreach ($liste as $produits) {
						$categorie = $CategorieC->getCategById($produits['categ']);
						?>
						<form method="POST" action="index.php#featured-cars">
							<div class="col-lg-3 col-md-4 col-sm-6">
								<div class="single-service-item" style="height:550px;">

									<div class="featured-cars-img" style="height:170px;">
										<img src="<?php echo $produits['img']; ?>" alt="">
									</div>
									<div class="featured-cars-txt" style="padding-left:30px;">
										<?php echo $categorie['nomCategorie']; ?>
										<h2><a href="#">
												<?php echo $produits['Product_name']; ?>
											</a></h2>
										<h3>
											<?php echo $produits['Product_price']; ?>
										</h3>
										<p>
											<?php echo $produits['Descriptionn']; ?>
										</p>
									</div>
									<div class="featured-model-info"
										style="padding-left:29px;margin-top:40px; padding-bottom:40px;">
										<input style="background:transparent !important;width:33px;" class="int-num"
											type="number" min="1" name="Quantite" id="Quantite" value="1">
										<input style="margin-left:30px; margin-top:10px;" class="bn5" type="submit"
											value="Make Order" name="add_to_cart" id="add_to_cart">
									</div>


								</div>
							</div>

							<input type="hidden" name="produitImg" id="profuitImg" value="<?php echo $produits['img']; ?>">
							<input type="hidden" name="amount" id="amount"
								value="<?php echo $produits['Product_price']; ?>">
							<input type="hidden" name="idProduit" id="idProduit"
								value="<?php echo $produits['idProduit']; ?>">

						</form>
						<?php
					}
					?>
					<!--  -->
				</div>



			</div>
		</div><!--/.container-->

	</section><!--/.featured-cars-->
	<!--new-cars end -->
	<!--new-cars end -->



	<!-- clients-say strat -->
	<!-- Submit Feedback section -->
	<section id="clients-say" class="clients-say">
		<div class="wrapper">
			<h3>Your feedback is important to us!</h3>

			<form id="feedback-form" action="/web/View/user/addFeedback.php" method="post"
				onsubmit="return validateForm()">
				<div class="form-row">
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
						require_once '../../Controller/CategoryC.php';

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
						<button type="submit" class="btn submit"
							href="/web/View/user/addFeedback.php">
							Submit
						</button>
						<button class="btn cancel">Cancel</button>
					</div>
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
	<!-- clients-say strat -->

	<section id="clients-say" class="clients-say" style="padding-top: 20px;">
		<div class="container">
			<div class="section-header">
				<h2>what our clients say</h2>
			</div>
			<div class="row">
				<div class="owl-carousel testimonial-carousel">

					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/c2.jpeg" alt="image of clients person" />
									</div>
								</div>
								<br>
								<div class="testimonial-person">
									<h2><a href="#">Lana Del REY</a></h2>
								</div>
								<div class="testimonial-comment">
									<?php
									// Include the FeedbackC.php controller
									

									// Create an instance of FeedbackC
									$feedbackController = new FeedbackC();

									// Call the showFeedback method to get feedback data
									$feedbackData = $feedbackController->showFeedback();

									// Display the first feedback comment and rating
									if (!empty($feedbackData)) {
										$firstFeedback = $feedbackData[1];
										echo '<p>Rating: ' . $firstFeedback['Rating'] . '</p>';
										echo '<p>Comment: "' . $firstFeedback['Comment'] . '"<br><br></p>';
										echo '<p>Category: ' . $firstFeedback['nameCategory'] . '</p>';
										echo $firstFeedback['timestamp_column'] . '</p>';
									} else {
										echo '<p>No feedback available.</p>';
									}
									?>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/abdou.jpg" alt="image of clients person" />
									</div>
								</div>
								<br>
								<div class="testimonial-person">
									<h2><a href="#">Abderrahmen OUESLATI</a></h2>
								</div>
								<div class="testimonial-comment">
									<?php
									// Include the FeedbackC.php controller
									require_once '../../Controller/FeedbackC.php';

									// Create an instance of FeedbackC
									$feedbackController = new FeedbackC();

									// Call the showFeedback method to get feedback data
									$feedbackData = $feedbackController->showFeedback();

									// Display the first feedback comment and rating
									if (!empty($feedbackData)) {
										$firstFeedback = $feedbackData[2];
										echo '<p>Rating: ' . $firstFeedback['Rating'] . '</p>';
										echo '<p>Comment: "' . $firstFeedback['Comment'] . '"<br><br></p>';
										echo '<p>Category: ' . $firstFeedback['nameCategory'] . '</p>';
										echo $firstFeedback['timestamp_column'] . '</p>';
									} else {
										echo '<p>No feedback available.</p>';
									}
									?>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/semah.jpg" alt="image of clients person" />
									</div>
								</div>
								<br>
								<div class="testimonial-person">
									<h2><a href="#">Semah AYACHI</a></h2>
								</div>
								<div class="testimonial-comment">
									<?php
									// Include the FeedbackC.php controller
									require_once '../../Controller/FeedbackC.php';

									// Create an instance of FeedbackC
									$feedbackController = new FeedbackC();

									// Call the showFeedback method to get feedback data
									$feedbackData = $feedbackController->showFeedback();

									// Display the first feedback comment and rating
									if (!empty($feedbackData)) {
										$firstFeedback = $feedbackData[3];
										echo '<p>Rating: ' . $firstFeedback['Rating'] . '</p>';
										echo '<p>Comment: "' . $firstFeedback['Comment'] . '"<br><br></p>';
										echo '<p>Category: ' . $firstFeedback['nameCategory'] . '</p>';
										echo $firstFeedback['timestamp_column'] . '</p>';
									} else {
										echo '<p>No feedback available.</p>';
									}
									?>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3 col-xs-12">
						<div class="single-testimonial-box">
							<div class="testimonial-description">
								<div class="testimonial-info">
									<div class="testimonial-img">
										<img src="assets/images/clients/dhia.jpg" alt="image of clients person" />
									</div>
								</div>
								<br>
								<div class="testimonial-person">
									<h2><a href="#">
											<?php echo $_SESSION['first_name'] ?>
										</a></h2>
								</div>
								<div class="testimonial-comment">
									<?php


									require_once '../../Controller/FeedbackC.php';

									$feedbackController = new FeedbackC();
									$feedbackData = $feedbackController->showFeedback();

									if (!empty($feedbackData)) {
										// Sort feedback data by timestamp in descending order
										usort($feedbackData, function ($a, $b) {
											return strtotime($b['timestamp_column']) - strtotime($a['timestamp_column']);
										});

										$lastFeedback = reset($feedbackData); // Get the first element after sorting
										$feedbackId = $lastFeedback['idFeedback'];

										// Fetch replies for the correct parameter (idFeedback)
										$db = config::getConnexion();
										$sql = "SELECT * FROM reply WHERE idFeedback = :feedbackId";
										$query = $db->prepare($sql);
										$query->bindParam(':feedbackId', $feedbackId); // Fix the binding here
										$query->execute();
										$replies = $query->fetchAll(PDO::FETCH_ASSOC);

										echo '<p>Rating: ' . $lastFeedback['Rating'] . '<br></p>';
										echo '<p>Comment: ' . $lastFeedback['Comment'] . '<br></p>';

										// Display the replies
										if (!empty($replies)) {

											foreach ($replies as $reply) {
												echo '<p>Admin Reply : ';
												echo $reply['adminReply'] . '<br>';
											}
											echo '</p>';
										} else {
											echo '<p>No replies available.</p>';
										}

										echo '<p>Category: ' . $lastFeedback['nameCategory'] . '<br></p>';
										echo '<p>' . $lastFeedback['timestamp_column'] . '</p>';
									} else {
										echo '<p>No feedback available.</p>';
									}

									?>

									<div>

										<button class="button-1"
											onclick="window.location.href='deleteFeedback2.php'">
											<div class="inner"></div>
											<span>Delete</span>
										</button>
										<a style="padding-left: 30px; padding-right: 30px;"> </a>
										<button class="button-1" onclick="window.location.href=' updateFeedback.php'">
											<div class="inner"></div>
											<span>Edit</span>
										</button>

									</div>


								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			< </div>

	</section>


	<!--brand strat -->
	<!--brand strat -->
	<section id="brand"  class="brand" style="background-color:white !important;padding-top: 80px; padding-bottom: 80px;">
			<div class="container">
				<div class="brand-area">
					<div class="owl-carousel owl-theme brand-item">
						<div class="item">
							<a href="https://www.thebump.com">
								<img src="assets/images/brand/br1.jpeg" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="https://www.babycenter.com">
								<img src="assets/images/brand/br2.jpeg" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="https://americanpregnancy.org">
								<img src="assets/images/brand/br3.png" alt="brand-image" />
							</a>
						</div><!--/.item-->
						<div class="item">
							<a href="https://www.whattoexpect.com">
								<img src="assets/images/brand/br4.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="https://www.pregnancybirthbaby.org.au">
								<img src="assets/images/brand/br5.png" alt="brand-image" />
							</a>
						</div><!--/.item-->

						<div class="item">
							<a href="https://www.tommys.org/pregnancy-information">
								<img src="assets/images/brand/br6.svg" alt="brand-image" />
							</a>
						</div><!--/.item-->
					</div><!--/.owl-carousel-->
				</div><!--/.clients-area-->

			</div><!--/.container-->

		</section><!--/brand-->	
		<!--brand end -->
	<!--brand end -->

	<!--blog start -->
	<section id="blog" class="blog"></section><!--/.blog-->
	<!--blog end -->

	<!--contact start-->
	<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top" style="padding-top: 30px; padding-bottom: 0px;">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">Women's Welness Compass</a>
								</div>
								<p>
									Empowering women through comprehensive health resources, tailored support, and expert guidance for every step of the pregnancy journey								</p>
								<div class="footer-contact">
									<p>WomensWelnessCompass@gmail.com</p>
									<p>(+216) 20.549.004 </p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="single-footer-widget">
								<h2>about wwc</h2>
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
								<h2>Our Sister Sites</h2>
								<div class="row">
									<div class="col-md-7 col-xs-6">
										<ul>
											<li><a href="https://www.thebump.com">TheBump</a></li>
											<li><a href="https://www.babycenter.com">BabyCenter</a></li>
											<li><a href="https://americanpregnancy.org">AmericanPregnancy</a></li>
											<li><a href="https://www.whattoexpect.com">WhatToExpect</a></li>
											<li><a href="https://www.pregnancybirthbaby.org.au">PregnancyBirth&Baby</a></li>
											<li><a href="https://www.tommys.org/pregnancy-information">Tommy's</a></li>
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
								&copy; copyright.designed and developed by <a href="https://www.themesine.com/">CodeCrafters</a>.
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