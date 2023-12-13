<?php
include_once '../../config.php';

$idUser = "";
$period = "";
$length = 0;
$Trimester = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $period = $_POST["period"];
    $length = $_POST["length"];
    $Trimester = $_POST["Trimester"];

    do {
        if (empty($period) || empty($length) || empty($Trimester)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Retrieve the maximum idUser from the database
        $maxIdSql = "SELECT MAX(idUser) AS maxId FROM userTr";
        $maxIdResult = $conn->query($maxIdSql);
        $maxIdRow = $maxIdResult->fetch_assoc();
        $maxId = $maxIdRow['maxId'];

        // Increment the maximum idUser by 1
        $idUser = $maxId + 1;

        // Add the new trimester to the database
        $sql = "INSERT INTO userTr(idUser, period, length, Trimester)
                VALUES ('$idUser', '$period', '$length', '$Trimester')";
        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $conn->error;
            break;
        }

        $successMessage = "Trimester added successfully";

        header("location: /carvilla-v1.0/View/admin/ui.php");
        exit;

    } while (false);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>WWC Admin</title>
	    <!-- BOOTSTRAP STYLES-->
      <link href="../back/assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link href="../back/assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
      <link href="../back/assets/css/custom.css" rel="stylesheet" />
      <!-- GOOGLE FONTS-->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

      <link rel="shortcut icon" type="image/icon" href="../CrudTrimester/favicon.png"/>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      

</head>


<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                    <span class="fa fa-bar"></span>
                </button>
                <a class="navbar-brand" href="ui.html">Admin Access</a> 
            </div>
          <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> Last access : 21 November 2023 &nbsp; <a href="../../View/welcome.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				          <li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					        </li>
                  
                  <li>
                    <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Pregnancy Tracker<span class="fa arrow"></span></a>
                      <ul class="nav nav-second-level">
                        <li>
                          <a href="#deliveryDate">Delivery Dates</a>
                        </li>
                        <li>
                          <a href="#trimester">Trimesters</a>
                        </li>
                      </ul>
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                      <h2>Pregnancy Tracker</h2> 
                      <h5>Welcome Admin , Love to see you back. </h5>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr/>
                <div class="container my-5">
        <h2>New Trimester</h2>
        <br>

        <?php
        if (!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            
            </div>
            ";
        }


        ?>
        <form method="post">
            
        

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Day Last Period</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="period" value="<?php echo $period;?>" id="SaveLastPeriodDate">
                    <div id="dateValidationMessageSave" class="validation-message"></div>

                </div>
            </div> 
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cycle Length</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="length" value="<?php echo $length;?>" id="SaveCycleLength">
                    <div id="cycleLengthValidationMessageSave" class="validation-message"></div>


                </div>
            </div> 

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Trimester</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Trimester" value="<?php echo $Trimester;?>" id="SaveTrimester">
                    <div id="TrimesterValidationMessageSave" class="validation-message"></div>

                </div>
            </div> 

            <?php 
            if (!empty($successMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                
                </div>
            ";

            }

            ?>
            
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary"> Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/carvilla-v1.0/View/admin/ui.php" role="button">Cancel</a>
                </div>
            </div>  
        </form>
        

    </div>
    <script>
        // Validate Save Date
        document.getElementById('SaveLastPeriodDate').addEventListener('input', validateSaveDate);
        function validateSaveDate() {
            const findLastPeriodDate = new Date(document.getElementById('SaveLastPeriodDate').value);
            const currentDate = new Date();
            const eightMonthsAgo = new Date();
            eightMonthsAgo.setMonth(currentDate.getMonth() - 8);

            const dateValidationMessage = document.getElementById('dateValidationMessageSave');

            if (findLastPeriodDate < eightMonthsAgo || findLastPeriodDate > currentDate) {
                dateValidationMessage.innerHTML = "Please enter a valid date within the last 8 months and not exceeding today's date.";
                return false;
            }

            dateValidationMessage.innerHTML = ""; // Clear the validation message if date is valid
            return true;
        }

            //Validate Save Cycle Length
        document.getElementById('SaveCycleLength').addEventListener('input', validateSaveCycleLength);
        function validateSaveCycleLength() {
            const findCycleLength = parseInt(document.getElementById('SaveCycleLength').value);
            const cycleLengthValidationMessage = document.getElementById('cycleLengthValidationMessageSave');

            if (findCycleLength < 27 || findCycleLength > 31) {
                cycleLengthValidationMessage.innerHTML = "Cycle length should be between 27 and 31.";
                return false;
            }

            cycleLengthValidationMessage.innerHTML = ""; // Clear the validation message if cycle length is valid
            return true;
        }
        
        //Validate Save Trimester
        document.getElementById('SaveTrimester').addEventListener('input', validateSaveTrimester);
        function validateSaveTrimester() {
            const saveTrimesterValue = document.getElementById('SaveTrimester').value;
            const trimesterValidationMessage = document.getElementById('TrimesterValidationMessageSave');

            // Check if the value is not one of the specified trimesters
            if (!['first', 'second', 'third'].includes(saveTrimesterValue.toLowerCase())) {
                trimesterValidationMessage.innerHTML = "Trimester: First | Second | Third";
                return false;
            }

            trimesterValidationMessage.innerHTML = ""; // Clear the validation message if the value is valid
            return true;
        }
    </script>
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
