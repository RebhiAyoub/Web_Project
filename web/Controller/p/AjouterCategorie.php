<?php

include_once 'CategorieC.php';




$errorMessage = "";
$successMessage = "" ;






// create user
$Categorie = null;

// create an instance of the controller
$CategorieC = new CategorieC();
if (		
    isset($_POST["NomCategorie"])
){
    if ( !empty($_POST["NomCategorie"]) )
    {   
        $Categorie = new Categorie(
            null,
            $_POST['NomCategorie']
        );
        $CategorieC->ajouterCategorie($Categorie);
        header("Location:/web/View/admin/ui.php");
    }
    else
        $errorMessage = "<label id = 'form' style = 'color: red; font-weight: bold;'>&emsp;Une Information manquant !</label>   ";    
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
    <title>Categories</title>
    <script>
        function validateForm() {
            var NomCategorie = document.getElementById("NomCategorie").value;
            if (NomCategorie.trim() === "") {
                alert("Tous les champs sont obligatoires.");
                return false;
            }
            
             if (NomCategorie.length <= 5) {
                alert("Le nom du Categorie doit contenir plus de 5 caractères.");
                return false;
            }
           
             var firstChar = NomCategorie.charAt(0);
            if (firstChar !== firstChar.toUpperCase()) {
                alert("Le nom du Categorie doit commencer par une lettre majuscule.");
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
    <center><h1>New Category</h1></center>
    <hr>
    <br>
        
      


        <form method="post" class="form" name="form"  id="form" enctype="multipart/form-data" onsubmit="return validateForm()">



            <!--------------------------------------------nom ------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label "> Nom Catrgorie </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="NomCategorie" id="NomCategorie"  placeholder= "nomCategorie">
                </div>
            </div>
 <!---------------------------------------------Buttons---------------------------------------------->
 <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button  type="submit" class="btn btn-primary" name = "Ajouter"  id ="Ajouter">Add</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="/web/View/admin/ui.php" role="button">Cancel</a>
             </div>
          </div>





        </form>
        </div>
    </body>
</html>
