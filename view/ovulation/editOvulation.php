<?php
include '../../Controller/OvulationC.php';
include '../../model/Ovulation.php';
$error = "";

// create client
$ovulation = null;

// create an instance of the controller
$ovulationC = new OvulationC();


if (
    isset($_POST["firstDayOfLMP"]) &&
    isset($_POST["averageCycleLength"]) &&
    isset($_POST["ovulationDate"]) 
) {
    if (
        !empty($_POST['firstDayOfLMP']) &&
        !empty($_POST["averageCycleLength"]) &&
        !empty($_POST["ovulationDate"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $ovulation = new Ovulation(
            null,
            $_POST['firstDayOfLMP'],
            $_POST['averageCycleLength'],
            $_POST['ovulationDate']
            
        );
        var_dump($ovulation);
        
        $ovulationC->editOvulation($ovulation,$_POST['idUser']);

        header('Location:listOvulations.php');
    } else
        $error = "Missing information";
}



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WWC</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
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
				
				
                  <li  >
                        <a class="active-menu"  href="listeCycle.php"><i class="fa fa-square-o fa-3x"></i> list cycles</a>
                        <li  >
                        <a class="active-menu"  href="/cycle/view/ovulation/listOvulations.php"><i class="fa fa-square-o fa-3x"></i> list ovulations</a>
                    </li>	
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <button><a href="listOvulations.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idUser'])) {
        $ovulation = $ovulationC->showovulations($_POST['idUser']);
        
    ?>

        <form action="" method="POST">
           
        <div class="form-group">
                    <label for="idUser">Id user :</label>
                   
                        <input type="number"  class="form-control" id="idUser" name="idUser" value="<?php echo $_POST['idUser'] ?>" readonly />
                        <span id="erreuridUser" style="color: red"></span>
                        </div>
                     <div class="form-group">
                   <label for="firstDayOfLMP"> First Day Of Last Menstrual Period</label>
                  
                        <input type="date" class="form-control" id="firstDayOfLMP" name="firstDayOfLMP" value="<?php echo $ovulation['firstDayOfLMP'] ?>" />
                        <span id="erreurfirstDayOfLMP" style="color: red"></span>
                        </div>
                        <div class="form-group">
                   <label for="averageCycleLength">Average Cycle Length</label>
                    
                        <input type="number" class="form-control" id="averageCycleLength" name="averageCycleLength"  onchange="checkCycleLength()" value="<?php echo $ovulation['averageCycleLength'] ?>" />
                        <span id="erreuraverageCycleLength" style="color: red"></span>
                        </div>
                        <div class="form-group">
                    <label for="ovulationDate">Ovulation Date</label></td>
                
                        <input type="date" class="form-control" id="ovulationDate" name="ovulationDate" value="<?php echo $ovulation['ovulationDate'] ?>" />
                        <span id="erreurovulationDate" style="color: red"></span>
                   
                        </div>


                <td>
                    <input type="submit" id="calculateovulation" onclick="checkCycleLength()" value="Save" disabled>
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>


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
    <?php
    }
    ?>

                    
            

        
                       
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
