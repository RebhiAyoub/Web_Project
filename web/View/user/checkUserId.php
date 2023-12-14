<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "WWC";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the idUser from the POST data
    $idUser = $_POST["idUser"];

    // Check if idUser already exists in the database
    $sql = "SELECT COUNT(*) AS count FROM user WHERE idUser = '$idUser'";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();
        $count = $row["count"];

        // Return JSON response indicating whether idUser exists
        echo json_encode(["exists" => $count > 0]);
    } else {
        // Handle database query error
        echo json_encode(["error" => "Database query error"]);
    }

    $conn->close();
}
?>
