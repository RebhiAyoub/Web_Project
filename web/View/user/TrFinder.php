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

        header("location: /carvilla-v1.0/View/user/TrFinder.php");
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

    <title>Trimester Finder</title>
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
                <h1>Check Your Trimester Here</h1>
                <input type="date" placeholder="First Day Of Last Period" id="findLastPeriodDate">
                <div id="dateValidationMessage" class="validation-message"></div>
                <input type="number" placeholder="Cycle Length" id="findCycleLength">
                <div id="cycleLengthValidationMessage" class="validation-message"></div>
                <button type="submit">Find Trimester</button>
                <div id="findResult"></div>
            </form>
            
        </div>
       
        <div class="form-container save-trimester">
            <form method="post">
                <h1>Save Your Trimester Here</h1>
                <input type="hidden" placeholder="User ID" name="idUser" value="<?php echo $_SESSION['id_user'];?>" id="SaveId">
                <div id="idValidationMessageSave" class="validation-message"></div>
                <input type="date" placeholder="First Day Of Last Period" name="period" value="<?php echo $period;?>" id="SaveLastPeriodDate">
                <div id="dateValidationMessageSave" class="validation-message"></div>
                <input type="number" placeholder="Cycle Length" name="length" value="<?php echo $length;?>" id="SaveCycleLength">
                <div id="cycleLengthValidationMessageSave" class="validation-message"></div>

                <input type="text" placeholder="Trimester" name="Trimester" value="<?php echo $Trimester;?>" id="SaveTrimester">
                <div id="TrimesterValidationMessageSave" class="validation-message"></div>

                
                <button name="submit" type="submit" value="Submit">Save Trimester</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Hello, <?php echo $_SESSION['first_name'] ?></h1>
                    <p>Find Out Your Trimester</p>
                    <button class="hidden" id="login">Find Trimester</button>
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

            // Make an asynchronous request to check if idUser already exists
            fetch('checkUserIdTr.php', {
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
        document.getElementById('findLastPeriodDate').addEventListener('input', validateDate);
        function validateDate() {
            const findLastPeriodDate = new Date(document.getElementById('findLastPeriodDate').value);
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
        document.getElementById('findCycleLength').addEventListener('input', validateCycleLength);
        function validateCycleLength() {
            const findCycleLength = parseInt(document.getElementById('findCycleLength').value);
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



        function calculateDelivery(event) {
            event.preventDefault(); // Prevent the form from submitting and refreshing the page
            // Get the input values for finding trimester
            const findLastPeriodDate = new Date(document.getElementById('findLastPeriodDate').value);
            const findCycleLength = parseInt(document.getElementById('findCycleLength').value);
            // Calculate the current date
            const currentDate = new Date();
            // Calculate the weeks elapsed since the last period
            const weeksElapsed = Math.floor((currentDate - findLastPeriodDate) / (7 * 24 * 60 * 60 * 1000));
            let findTrimester = '';
            // Determine trimester based on weeks elapsed
            if (weeksElapsed >= 1 && weeksElapsed <= 12) {
                findTrimester = 'First Trimester';
            } else if (weeksElapsed > 12 && weeksElapsed <= 27) {
                findTrimester = 'Second Trimester';
            } else if (weeksElapsed > 27 && weeksElapsed <= 40) {
                findTrimester = 'Third Trimester';
            } else {
                findTrimester = 'Not in a valid trimester yet';
            }
            // Show the result div and set its content
            const resultDiv = document.getElementById('findResult');
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = ${findTrimester};
        }

    </script>
</body>
</html>