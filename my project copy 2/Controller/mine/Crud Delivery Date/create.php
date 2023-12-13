<?php
include_once '../../config.php';

$idUser = "";
$period = "";
$length = 0;
$deliveryDate = "";
$errorMessage = "";
$successMessage = "";

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $period = $_POST["period"];
        $length = $_POST["length"];
        $deliveryDate = $_POST["deliveryDate"];

        do {
            if (empty($period) || empty($length) || empty($deliveryDate)) {
                $errorMessage = "All the fields are required";
                break;
            }

            // Retrieve the maximum idUser from the database
            $maxIdSql = "SELECT MAX(idUser) AS maxId FROM user";
            $maxIdResult = $conn->query($maxIdSql);
            $maxIdRow = $maxIdResult->fetch(PDO::FETCH_ASSOC);
            $maxId = $maxIdRow['maxId'];

            // Increment the maximum idUser by 1
            $idUser = $maxId + 1;

            // Add the new delivery date to the database using prepared statements
            $stmt = $conn->prepare("INSERT INTO user(idUser, period, length, deliveryDate) VALUES (?, ?, ?, ?)");
            $stmt->execute([$idUser, $period, $length, $deliveryDate]);

            $successMessage = "Delivery date added successfully";

            header("location: /carvilla-v1.0/Controller/back/ui.php");
            exit;

        } while (false);
    }
} catch (PDOException $e) {
    $errorMessage = "Error: " . $e->getMessage();
}

?>

<!-- Rest of your HTML code remains unchanged -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Date</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" type="image/icon" href="../CrudDeliveryDate/favicon.png"/>

    <style>
       body{
        background: url(bg.png);
       }
       .validation-message {
    color: #ff0000; /* Set the text color to red */
    font-size: 14px; /* Adjust the font size */
    margin-top: 5px; /* Add some top margin for spacing */
}

    </style>


</head>
<body>
    <div class="container my-5">
        <h2>New Delivery Date</h2>
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
                <label class="col-sm-3 col-form-label">Delivery Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="deliveryDate" value="<?php echo $deliveryDate;?>">
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
                    <a class="btn btn-outline-primary" href="/carvilla-v1.0/Controller/back/ui.php" role="button">Cancel</a>
                </div>
            </div>  
        </form>
        <div style="padding-left: 560px;">
        </div>


    </div>
    <script>
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
    </script>

    
</body>
</html>