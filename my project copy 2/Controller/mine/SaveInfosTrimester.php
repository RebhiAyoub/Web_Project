<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WWC";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUser = "";
$period = "";
$length = 0;
$Trimester = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $idUser = $_POST["idUser"];
    $period = $_POST["period"];
    $length = $_POST["length"];
    $Trimester = $_POST["Trimester"];

    do{
        if (empty($idUser) || empty($period) || empty($length) || empty($Trimester) ){
            $errorMessage = "All the fields are required";
            break;
        }

        //add new Trimester to database
        $sql = "INSERT INTO userTr(idUser,period,length,Trimester)"."VALUES ('$idUser','$period','$length','$Trimester')";
        $result = $conn->query($sql);

        if (! $result){
            $errorMessage = "Invalid query: ".$conn->error;
            break;
        }

        $idUser = "";
        $period = "";
        $length = 0;
        $Trimester = "";

        $successMessage = "Client added successfully";

        header("location: /carvilla-v1.0/View/model/SaveInfosTrimester.php");
        exit;





    }
    while(false);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
    <meta charset="UTF-8">
    <title>Trimester Saver</title>
    <link rel="stylesheet" href="deliverydate.css">
</head>
<body>

<section id="featured-cars" class="wte-ddc-index-hero">
    <div class="breadcrumb text-center mx-auto col-12">
        <div class="inner">
            <a class="category ga-breadcrumb-link" href="tracker.html">Pregnancy Tracker</a>
            <span>&gt;</span>
            <a class="category ga-breadcrumb-link" href="trimester.php">Trimester Finder</a>
            <span>&gt;</span>
            <a class="category ga-breadcrumb-link" href="SaveInfosTrimester.php">Trimester Saver</a>
        </div>
    </div>
    <div class="container">
        <div class="text">
            Trimester Saver
        </div>

        <form method="post">
                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" class="form-control" name="idUser" value="<?php echo $idUser;?>" style="padding-top: 15px;  padding-left: 10px; color: #800e78;">
                            <div class="underline"></div>
                            <label style="padding-top: 10px; padding-bottom" for="idUser">User ID</label>

                        </div>
                    </div>  

                    <div class="form-row">
                        <div class="input-data">

                            <input type="date" class="form-control" name="period" value="<?php echo $period;?>" style="padding-top: 15px;  padding-left: 10px; color: #800e78;">
                            <div class="underline"></div>
                            <label style="padding-top: 10px;" for="lastPeriodDate">First Day Of Last Period</label>

                        </div>
                    </div> 
                    
                    <div class="form-row">
                        <div class="input-data">
                            <input type="number" class="form-control" name="length" value="<?php echo $length;?>" style="padding-top: 15px;  padding-left: 10px; color: #800e78;">
                            <div class="underline"></div>
                            <label style="padding-top: 10px;" for="cycleLength">Cycle Length</label>

                        </div>
                    </div> 

                    <div class="form-row">
                        <div class="input-data">
                            <input type="text" class="form-control" name="Trimester" value="<?php echo $Trimester;?>" style="padding-top: 15px;  padding-left: 10px; color: #800e78;">
                            <div class="underline"></div>
                            <label style="padding-top: 10px;" for="trimester">Trimester</label>

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
                    
                    <div class="form-row">
                        <div class="input-data textarea" style="padding-left: 250px; padding-bottom: 50px;" >
                            <div class="form-row submit-btn" style="margin-top: 10px;">
                                <div class="input-data">
                                    <div  class="inner"></div>
                                    <input name="submit" type="submit" value="Submit">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </form>
</section>
</body>
</html>