<?php

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
        $query = "INSERT INTO user1 (idUser, currentPeriodDate, previousPeriodDate, menstrualCycleLength) VALUES (:idUser, :currentPeriodDate, :previousPeriodDate, :cycleLength)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':currentPeriodDate', $currentPeriodDate);
        $stmt->bindParam(':previousPeriodDate', $previousPeriodDate);
        $stmt->bindParam(':cycleLength', $cycleLength);
        $stmt->execute();

        // Prepare the response
        $response = '<div id="result-container-ov" class="result-container">Your cycle length is: $cycleLength days.</div>';

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
