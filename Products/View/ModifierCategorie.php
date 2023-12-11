<?php

include '../Controller/CategorieC.php';

$error = "";

// create category
$categorie = null;


$categorieC = new CategorieC();
if (
    isset($_POST["idCategorie"]) &&
    isset($_POST["nomCategorie"])
) {
    if (
        !empty($_POST["idCategorie"]) &&
        !empty($_POST['nomCategorie'])
    ) {
        $categorie = new Categorie(
            $_POST['idCategorie'],
            $_POST['nomCategorie']
        );
        
        $categorieC->modifierCategorie($categorie, $_POST["idCategorie"]);

   
        header('Location:indexCategory.php');
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
    <title>Update Category</title>
</head>

<body>
<div class="container my-5">
    <a  class="btn btn-danger" href="indexCategory.php">Back to list</a>
    <hr>
    <center><h1>Update Category</h1></center>
        
        <hr>
		<br>
		<br>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idCategorie'])) {
        $categorie = $categorieC->showCategorie($_POST['idCategorie']);
    ?>

        <form action="" method="POST">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >IdCategory</label>
                <div class="col-sm-6">
                <input type="text" class="form-control" name="idCategorie" id="idCategorie" value="<?php echo $categorie['idCategorie']; ?>" maxlength="20" readonly></td>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >NomCategory</label>
                <div class="col-sm-6">
                <input type="text" class="form-control"  name="nomCategorie" id="nomCategorie" value="<?php echo $categorie['nomCategorie']; ?>" maxlength="20">
                </div>
            </div>
                <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="indexCategory.php" role="button">Cancel</a>
             </div>
          </div>
           
        </form>
        </div>
    <?php
    }
    ?>
</body>

</html>
