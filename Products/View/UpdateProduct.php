<?php

include '../Controller/ProductsC.php';

$CategorieC=new CategorieC();
	$list=$CategorieC->afficherCategorie(); 
$produit = null;
$error = "";


$produitC = new ProductC();
if (
    isset($_POST["idProduit"]) &&
    isset($_POST["Product_name"]) &&
    isset($_POST["Descriptionn"]) &&
    isset($_POST["Product_price"]) && 
    isset($_POST["Availabilityy"]) &&
    isset($_FILES["img"])&&
    isset($_POST["categ"])
) {
    if (
        !empty($_POST["idProduit"]) &&
        !empty($_POST["Product_name"]) &&
        !empty($_POST["Descriptionn"])  &&
        !empty($_POST["Product_price"]) && 
        !empty($_POST["Availabilityy"]) && 
        !empty($_FILES["img"]) &&  
        !empty($_POST["categ"])

    ) {
        if (!empty($_FILES["img"]["name"])) {
        $filename = $_FILES["img"]["name"];
        $tempname = $_FILES["img"]["tmp_name"];
        $folder = "./image/" . $filename;
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    }else {
        // Si aucun fichier n'est téléchargé, utilisez l'image existante
        $filename = $_POST["existing_img"];
    }
    
        $produit = new Product(
            $_POST["idProduit"],
            $_POST["Product_name"], 
            $_POST["Descriptionn"],
            $_POST["Product_price"],
            $_POST["Availabilityy"],
            $filename,
            $_POST["categ"]
        );
        $produitC->modifierProduit($produit,$_POST["idProduit"]);
        
        header('Location:indexBack.php');
    } else {
        $error = "Missing information";
    }
}
?>

<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
     <script src="Controle.js"></script>
    <link rel="stylesheet" href="Style.css"> 
    <title>UpdateOrder</title>
</head>
<body>
<div id="error">
        <?php echo $error; ?>
        </div>
 <div class="container my-5">
    <a class="btn btn-danger" href="indexback.php">Back to list</a>
    <hr>
    <center><h1>Update Product</h1></center>
        
        <hr>
		<br>
		<br>
        
    
    <?php
    if (isset($_POST['idProduit'])) {
        $produit = $produitC->showProduit($_POST['idProduit']);
    ?>

        <form   method="POST" action="" class="form"  enctype="multipart/form-data" method="POST" >
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label " >idProduit</label>
                <div class="col-sm-6">
                <input type="text"class="form-control"  name="idProduit" id="idProduit" value="<?php echo $produit['idProduit']; ?>" maxlength="20" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label ">Product_name</label>
                <div class="col-sm-6">
                <input type="text" class="form-control"  name="Product_name" id="Product_name" value="<?php echo $produit['Product_name']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >Descriptionn</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="Descriptionn" id="Descriptionn" value="<?php echo $produit['Descriptionn']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >Product_price</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="Product_price" id="Product_price" value="<?php echo $produit['Product_price']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >Availabilityy</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="Availabilityy" id="Availabilityy" value="<?php echo $produit['Availabilityy']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >img</label>
                <div class="col-sm-6">
                <input type="file" class="form-control" name="img" id="img" accept="image/*">
                        <!-- Ajout d'un champ caché pour conserver l'image existante -->
                        <input type="hidden" name="existing_img" value="<?php echo $produit['img']; ?>">
            </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >categ</label>
                <div class="col-sm-6">
                <select  class="form-control" name="categ"  class="col-sm-6">
                        <?php
                         foreach($list as $categorie) { 
                        ?>
                                <option  class="col-sm-6" value="<?php echo $categorie['idCategorie'] ?>"><?php echo $categorie['nomCategorie'] ?></option>
                                     <?php }  ?>
                    </select>
                </div>
            </div>
            <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="indexBack.php" role="button">Cancel</a>
             </div>
          </div>
               
           
        </form>
        </div>
    <?php
    }
    ?>

</body>

</html>
