<?php
include_once '../../Controller/OvulationC.php';
include_once '../../model/Ovulation.php';

$firstDayOfLMP= $_POST['firstDayOfLMP'];
$averageCycleLength= $_POST['averageCycleLength'];

    // Convert the LMP to a DateTime object
    $lmpDate = new DateTime($firstDayOfLMP);

    // Calculate the estimated ovulation date
    $ovulationDate = clone $lmpDate;
    $ovulationDate->modify("+" . ($averageCycleLength - 14) . " days");

    // Format and return the result
    $response = "<p>Your ovulation date is: " . $ovulationDate->format('Y-m-d') . "</p>";

    // Send the response back to the client
    echo $response;


    $ovulation = null;

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
        $ovulation = new Ovulation(
            null,
            $_POST['firstDayOfLMP'],
            $_POST['averageCycleLength'],
            $ovulationDate->format('Y-m-d')
            
        );
        $ovulationC->create($ovulation);
        header('Location: ../index.php');
    } else {
        $error = "Missing information";
    }
}




?>
