<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once '../../Model/Products.php';
include_once 'ProductsC.php';


$CategorieC = new CategorieC();
$list = $CategorieC->afficherCategorie();





$errorMessage = "";
$successMessage = "";







$products = null;


$ProductC = new ProductC();
if (
    isset($_POST["Product_name"]) &&
    isset($_POST["Descriptionn"]) &&
    isset($_POST["Product_price"]) &&
    isset($_POST["Availabilityy"]) &&
    isset($_FILES["img"]) &&
    isset($_POST["categ"])
) {
    if (!empty($_POST["Product_name"]) && !empty($_POST["Descriptionn"]) && !empty($_POST["Product_price"]) && !empty($_POST["Availabilityy"]) && !empty($_FILES["img"]) && !empty($_POST["categ"])) {
        $filename = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $folder = "./image/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
        $products = new Product(
            null,
            $_POST['Product_name'],
            $_POST['Descriptionn'],
            $_POST['Product_price'],
            $_POST['Availabilityy'],
            $filename,
            $_POST['categ']
        );
        $ProductC->AjouterProduct($products);
        header("Location:/carvilla-v1.0/View/admin/ui.php");



    } else
        $errorMessage = "<label id = 'form' style = 'color: red; font-weight: bold;'>&emsp;Une Information manquant !</label>   ";


}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Controle.js"></script>
    <link rel="stylesheet" href="Style.css">
    <title>Products</title>
    <script>
        function validateForm() { //recuperation des name descript w ...
            var Product_name = document.getElementById("Product_name").value;
            var Descriptionn = document.getElementById("Descriptionn").value;
            var Product_price = document.getElementById("Product_price").value;
            var Availabilityy = document.getElementById("Availabilityy").value;
            var img = document.getElementById("img").value;
            //trim: fct ytesti bch y3mel alerte
            if (Product_name.trim() === "" || Descriptionn.trim() === "" || Product_price.trim() === "" || Availabilityy.trim() === "" || img.trim() === "") {
                alert("Tous les champs sont obligatoires.");
                return false;
            }
            if (Product_name.length <= 5) {
                alert("Le nom du produit doit contenir plus de 5 caractères.");
                return false;
            }

            var firstChar = Product_name.charAt(0);
            if (firstChar !== firstChar.toUpperCase()) {
                alert("Le nom du produit doit commencer par une lettre majuscule.");
                return false;
            }

            if (isNaN(Product_price)) {
                alert("Le prix du produit doit être un nombre.");
                return false;
            }

            if (Availabilityy !== "available" && Availabilityy !== "not available") {
                alert("La disponibilité doit être 'available' ou 'not available'.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <style>
        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 0.2em;
        }
    </style>


    <div class="container my-5">
        <center>
            <h1>New Product</h1>
        </center>
        <hr>
        <br>




        <form method="post" class="form" name="form" id="form" enctype="multipart/form-data"
            onsubmit="return validateForm()">



            <!--------------------------------------------nom ------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label ">Product_name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Product_name" id="Product_name"
                        placeholder="Product_name">
                </div>
            </div>

            <!---------------------------------------------desc---------------------------------------------->
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Descriptionn" id="Descriptionn"
                        placeholder="Description">
                </div>
            </div>

            <!---------------------------------------------prix---------------------------------------------->
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Product_price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Product_price" id="Product_price"
                        placeholder="Product_price">
                </div>
            </div>

            <!---------------------------------------------aivailability---------------------------------------------->
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Availability</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Availabilityy" id="Availabilityy"
                        placeholder="Availability">
                </div>
            </div>
            <!---------------------------------------------img---------------------------------------------->
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Product_img</label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="img" id="img" placeholder="Product_img">
                </div>
            </div>
            <!---------------------------------------------aivailability---------------------------------------------->
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Availability</label>
                <div class="col-sm-6">
                    <select class="form-control" name="categ" class="col-sm-6">
                        <?php
                        foreach ($list as $categorie) {
                            ?>
                            <option class="col-sm-6" value="<?php echo $categorie['idCategorie'] ?>">
                                <?php echo $categorie['nomCategorie'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <!-- <input type="text" class="form-control" name="categ" id="categ" placeholder= "Availability"  > -->
                </div>
            </div>
            <!---------------------------------------------Buttons---------------------------------------------->
            <div class="row mb-5">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary" name="Ajouter" id="Ajouter">Add</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-primary" href="/carvilla-v1.0/View/admin/ui.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>