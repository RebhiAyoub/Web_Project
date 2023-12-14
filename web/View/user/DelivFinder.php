<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WWC";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$idUser = "";
$period = "";
$length = 0;
$deliveryDate = "";
$errorMessage = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $idUser = $_POST["idUser"];
    $period = $_POST["period"];
    $length = $_POST["length"];
    $deliveryDate = $_POST["deliveryDate"];

    do{
        if (empty($idUser) || empty($period) || empty($length) || empty($deliveryDate) ){
            $errorMessage = "All the fields are required";
            break;
        }

        //add new Trimester to database
        $sql = "INSERT INTO user(idUser,period,length,deliveryDate)"."VALUES ('$idUser','$period','$length','$deliveryDate')";
        $result = $conn->query($sql);

        if (! $result){
            $errorMessage = "Invalid query: ".$conn->error;
            break;
        }

        $idUser = "";
        $period = "";
        $length = 0;
        $deliveryDate = "";

        $successMessage = "Client added successfully";

        header("location: /carvilla-v1.0/Controller/CrudDeliveryDate/DelivFinder.php");
        exit;





    }
    while(false);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="shortcut icon" type="image/icon" href="favicon.png"/>

    <title>Delivery Date Finder</title>
    <style>
        body {
            background: url(bg.jpg);
            
        }

    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container find-trimester">
            <form onsubmit="calculateDelivery(event)">
                <h1>Check Your Delivery Date Here</h1>
                <input type="date" placeholder="First Day Of Last Period" id="lastPeriodDate">
                <div id="dateValidationMessage" class="validation-message"></div>
                <input type="number" placeholder="Cycle Length" id="cycleLength">
                <div id="cycleLengthValidationMessage" class="validation-message"></div>
                <button type="submit">Find Delivery Date</button>
                <div id="result"></div>
            </form>
            
        </div>
       
        <div class="form-container save-trimester">
            <form method="post">
                <h1>Save Your Delivery Date Here</h1>
                <input type="hidden" placeholder="User ID" name="idUser" value="<?php echo $_SESSION['id_user'];?>" id="SaveId">
                <div id="idValidationMessageSave" class="validation-message"></div>
                <input type="date" placeholder="First Day Of Last Period" name="period" value="<?php echo $period;?>" id="SaveLastPeriodDate">
                <div id="dateValidationMessageSave" class="validation-message"></div>
                <input type="number" placeholder="Cycle Length" name="length" value="<?php echo $length;?>" id="SaveCycleLength">
                <div id="cycleLengthValidationMessageSave" class="validation-message"></div>
                <input type="date" placeholder="Delivery Date" name="deliveryDate" value="<?php echo $deliveryDate;?>" id="SaveDeliveryDate">
                <div id="DeliveryDateValidationMessageSave" class="validation-message"></div>
                <button name="submit" type="submit" value="Submit">Save Delivery Date</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, <?php echo $_SESSION['first_name'] ?></h1>
                    <p>Find Out Your Delivery Date</p>
                    <button class="hidden" id="login">Find Delivery Date</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome Back</h1>
                    <p>Save Your Infos To Get Personal Insights And Features</p>
                    <button class="hidden" id="register">Save Infos</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script1.js"></script>
    <script>

        // Validate Save Id
        document.getElementById('SaveId').addEventListener('input', validateSaveId);
        function validateSaveId() {
            const idUserInput = document.getElementById('SaveId');
            const idUser = idUserInput.value.trim();
            const idValidationMessage = document.getElementById('idValidationMessageSave');

            if (!idUser) {
                idValidationMessage.innerHTML = "Please enter a valid User ID.";
                return false;
            }

            // Make an asynchronous request to check if idUser already exists
            fetch('checkUserId.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'idUser=' + encodeURIComponent(idUser),
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    idValidationMessage.innerHTML = "User ID already exists. Please choose a different one.";
                } else {
                    idValidationMessage.innerHTML = ""; // Clear the validation message if idUser is valid
                }
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle error
            });

            return true; // Return true for now, the final decision will be made in the asynchronous request
        }
        
        // Validate Date
        document.getElementById('lastPeriodDate').addEventListener('input', validateDate);
        function validateDate() {
            const findLastPeriodDate = new Date(document.getElementById('lastPeriodDate').value);
            const currentDate = new Date();
            const eightMonthsAgo = new Date();
            eightMonthsAgo.setMonth(currentDate.getMonth() - 8);

            const dateValidationMessage = document.getElementById('dateValidationMessage');

            if (findLastPeriodDate < eightMonthsAgo || findLastPeriodDate > currentDate) {
                dateValidationMessage.innerHTML = "Please enter a valid date within the last 8 months and not exceeding today's date.";
                return false;
            }

            dateValidationMessage.innerHTML = ""; // Clear the validation message if date is valid
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

        //Validate Cycle Length
        document.getElementById('cycleLength').addEventListener('input', validateCycleLength);
        function validateCycleLength() {
            const findCycleLength = parseInt(document.getElementById('cycleLength').value);
            const cycleLengthValidationMessage = document.getElementById('cycleLengthValidationMessage');

            if (findCycleLength < 27 || findCycleLength > 31) {
                cycleLengthValidationMessage.innerHTML = "Cycle length should be between 27 and 31.";
                return false;
            }

            cycleLengthValidationMessage.innerHTML = ""; // Clear the validation message if cycle length is valid
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

        //Validate Save DeliveryDate
        //document.getElementById('SaveDeliveryDate').addEventListener('input', validateSaveDeliveryDate);
        //function validateSaveDeliveryDate() {
        //    const saveDeliveryDateInput = document.getElementById('SaveDeliveryDate');
        //    const DeliveryDateValidationMessage = document.getElementById('DeliveryDateValidationMessageSave');
        //    const findLastPeriodDate = new Date(document.getElementById('lastPeriodDate').value);

            // Check if the input is empty
        /*   if (!saveDeliveryDateInput.value) {
                DeliveryDateValidationMessage.innerHTML = "Please enter a delivery date.";
                return false;
            }

            const saveDeliveryDate = new Date(saveDeliveryDateInput.value);

            // Calculate the date 9 months from findLastPeriodDate
            const validDeliveryDate = new Date(findLastPeriodDate);
            validDeliveryDate.setMonth(findLastPeriodDate.getMonth() + 9);

            // Check if the entered delivery date is 9 months away
            if (saveDeliveryDate.getTime() !== validDeliveryDate.getTime()) {
                DeliveryDateValidationMessage.innerHTML = "Please enter a valid delivery date (9 months from the first day of the last period).";
                return false;
            }

            DeliveryDateValidationMessage.innerHTML = ""; // Clear the validation message if the date is valid
            return true;
        }
        */
       
        function calculateDelivery(event) {
            event.preventDefault(); // Prevent form submission

            // Fetching values from form fields
            const lastPeriodDate = new Date(document.getElementById('lastPeriodDate').value);
            const cycleLength = parseInt(document.getElementById('cycleLength').value);

            // Calculate the predicted delivery date
            const predictedDelivery = new Date(lastPeriodDate);
            predictedDelivery.setMonth(predictedDelivery.getMonth() - 3); // Subtract 3 months
            predictedDelivery.setFullYear(predictedDelivery.getFullYear() + 1); // Add 1 year
            predictedDelivery.setDate(predictedDelivery.getDate() + 7); // Add 7 days

            // Display the result
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const formattedDueDate = predictedDelivery.toLocaleDateString('en-US', options);

            const resultElement = document.getElementById('result');
            // Show the result div and set its content
            resultElement.style.display = 'block';
            resultElement.innerHTML = Predicted Delivery Date: ${formattedDueDate};
        }

    </script>
</body>
</html>