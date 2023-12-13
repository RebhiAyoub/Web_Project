<?php
include_once '../../config.php';

$idUser = "";
$period = "";
$length = 0;
$Trimester = "";
$errorMessage = "";
$successMessage = "";

try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        // GET method: Show the data of the Trimester
        if (!isset($_GET['idUser'])) {
            header("location: /carvilla-v1.0/Controller/CrudTrimester/Functions.php");
            exit;
        }

        $idUser = $_GET['idUser']; // read id Trimester from the request

        // read the row of the selected Trimester from the database table
        $stmt = $conn->prepare("SELECT * FROM userTr WHERE idUser = :idUser");
        $stmt->bindParam(':idUser', $idUser);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // if we can't read the data from the database, we exit file
        if (!$row) {
            header("location: /carvilla-v1.0/Controller/CrudTrimester/Functions.php");
            exit;
        }

        // store data from the database into variables which are displayed in the form
        $idUser = $row['idUser'];
        $period = $row['period'];
        $length = $row['length'];
        $Trimester = $row['Trimester'];
    } else {
        // POST method: Update the data of the Trimester

        // read data from the form
        $idUser = $_POST['idUser'];
        $period = $_POST['period'];
        $length = $_POST['length'];
        $Trimester = $_POST['Trimester'];

        do {
            // check we don't have empty fields
            if (empty($idUser) || empty($period) || empty($length) || empty($Trimester)) {
                $errorMessage = "All the fields are required";
                break;
            }

            $stmt = $conn->prepare("UPDATE userTr SET period = :period, length = :length, Trimester = :Trimester WHERE idUser = :idUser");
            $stmt->bindParam(':idUser', $idUser);
            $stmt->bindParam(':period', $period);
            $stmt->bindParam(':length', $length);
            $stmt->bindParam(':Trimester', $Trimester);

            // execute SQL query
            $result = $stmt->execute();
            if (!$result) {
                $errorMessage = "Invalid query: " . $stmt->errorInfo()[2];
                break;
            }

            $successMessage = "Client updated successfully";

            header("location: /carvilla-v1.0/Controller/back/ui.php");
            exit;

        } while (false);
    }
} catch (PDOException $e) {
    $errorMessage = "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trimester</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="shortcut icon" type="image/icon" href="../CrudTrimester/favicon.png"/>
    <style>
       body{
        background: url(bg.png);
       }
    </style>

</head>
<body>
    <div class="container my-5">
        <h2>Edit Trimester</h2>
        <br>

        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            
            </div>
            ";
        }
        ?>
        
        <form method="post">
            <input type="hidden" name="idUser" value="<?php echo $idUser;?>"> 

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">First Day Last Period</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="period" value="<?php echo $period;?>">
                </div>
            </div> 
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cycle Length</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="length" value="<?php echo $length;?>">
                </div>
            </div> 

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Trimester</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Trimester" value="<?php echo $Trimester;?>">
                </div>
            </div> 

            <?php 
            if (!empty($successMessage)) {
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
    </div>
    
</body>
</html>
