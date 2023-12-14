<?php

include 'CycleC.php';
include '../../model/Cycle.php';

$error = "";

// create client
$cycle = null;

// create an instance of the controller
$cycleC = new CycleC();
if (
    isset($_POST["currentPeriodDate"]) &&
    isset($_POST["previousPeriodDate"]) &&
    isset($_POST["menstrualCycleLength"]) 
  
) {
    if (
        !empty($_POST["currentPeriodDate"]) &&
        !empty($_POST["previousPeriodDate"]) &&
        !empty($_POST["menstrualCycleLength"]) 
        
    ) {
        $cycle = new Cycle(
            null,
            $_POST['currentPeriodDate'],
            $_POST['previousPeriodDate'],
            $_POST['menstrualCycleLength']
            
        );
        $cycleC->create($cycle);
        header('Location: /web/View/admin/ui.php');
    } else {
        $error = "Missing information";
    }
}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WWC</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="/web/View/admin/assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link href="/web/View/admin/assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
      <link href="/web/View/admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                
                    <li>
                        <a class="active-menu"  href="/cycle/view/cycle/listeCycle.php"><i class="fa fa-square-o fa-3x"></i> list Cycles</a>
                        <li  >
                        <a class="active-menu"  href="listOvulations.php"><i class="fa fa-square-o fa-3x"></i> list Ovulations</a>
                    </li>	
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">


                   

                    <a href="listeCycle.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
    
            <div class="form-group">
                <label for="id user">Age</label>
                
                    <input type="number" class="form-control" id="idUser" name="idUser" />
                    <span id="erreuridUser" style="color: red"></span>
                
            </div>
            <div class="form-group">
                <label for="currentPeriodDate ">Current Period Date</label>
                
                    <input type="date" class="form-control" id="currentPeriodDate" name="currentPeriodDate" oninput="compareDates()" />
                    <span id="erreurcurrentPeriodDate " style="color: red"></span>
                
            </div>
            <div class="form-group">
                <label for="previousPeriodDate"> Previous Period Date</label>
                
                    <input type="date"  class="form-control" id="previousPeriodDate" name=" previousPeriodDate" oninput="compareDates()"/>
                    <span id="erreurpreviousPeriodDate" style="color: red"></span>
               
            
                    </div>
            <div class="form-group">
                <label for="menstrualCycleLength">menstrualCycleLength :</label>
                
                    <input type="number" class="form-control" id="menstrualCycleLength" name="menstrualCycleLength" />
                    <span id="erreurmenstrualCycleLength" style="color: red"></span>
                
            
                    </div>


            
                <input type="submit" class="btn btn-primary" id="calculatePeriod" onclick="compareDates();calculateCycleLength();" value="Save" disabled>
            
            
                <input type="reset" class="btn btn-light" value="Reset">
            
    </div>

    </form>
    
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
                       


        
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
