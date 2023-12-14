<?php
include_once 'ProductsC.php';
include_once 'CategorieC.php';


    $error = "";
    $mess = "" ; 


    // create user
    $categorie = null;

    // create an instance of the controller
    $categorieC = new CategorieC();   
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
     <script src="Controle.js"></script>
    <title>Categorie</title>
</head>
    <body>
    <style>
  .error-message {
    color: red;
    font-size: 0.8em;
    margin-top: 0.2em;
  }
     </style>
        <div class="container my-5" >
        <center><h1>Category Details</h1></center>
        <hr>
		<br>
		<?php
			if (isset($_POST['idCategorie'])){
				$categorie = $categorieC->showCategorie($_POST['idCategorie']);
				
		?>
    
        <form method="post" class="form"  id="form" onsubmit="return validateForm();" >
            <!--------------------------------------------idCategorie------------------------------------------------->
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >Id Categorie </label>
                <div class="col-sm-6">
                    <p class="form-control">
                    <?php echo $categorie['idCategorie'];?>
                    </p>
                </div>
            </div>
            <!---------------------------------------------desc---------------------------------------------->
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label "  >Nom Categorie</label>
                <div class="col-sm-6">
                <p class="form-control">
                    <?php echo $categorie['nomCategorie'];?>
                    </p>
                </div>
            </div>

          
             <!---------------------------------------------Buttons---------------------------------------------->
             <br>
             <br>
             <div class="row mb-5">
             <div class="col-sm-2 d-grid">
             <a class="btn btn-danger" href="/web/View/admin/ui.php" role="button">Cancel</a>
             </div>
          </div>
            </table>
        </form>
        </div>
        <?php
            }
		?>
    </body>
</html>
