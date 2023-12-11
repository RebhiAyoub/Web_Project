<?php


include_once '../Controller/ProductsC.php';


$errorMessage = "";
$successMessage = "" ;



$ProduitC=new ProductC();
$list=$ProduitC->AfficherProducts(); 


$commande = null;
$commandeC = new CommandeC();
if (		
    isset($_POST["quantite"])&&
    isset($_POST["status"])&&
    isset($_POST["amount"])&&
    isset($_POST["idProduit"])
){
    if ( !empty($_POST["quantite"])&&
    !empty($_POST["status"])&&
    !empty($_POST["amount"])&&
    !empty($_POST["idProduit"]) )
    {   
        $commande = new Commande(
            null,
            $_POST["quantite"],
            $_POST["status"],
            $_POST["amount"],
            $_POST["idProduit"]
           
        );
        $commandeC->addCommande($commande);
        header("Location:AfficherCommande.php?successMessage= Commande ajoutée avec successee");
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
    <title>Orders</title>
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
    <a class="btn btn-danger"href="indexOrder.php">Back to list</a>
    <hr>
    <center><h1>New Order</h1></center>
    <hr>
    <br>
        
      


        <form method="post" class="form" name="form"  id="form" enctype="multipart/form-data" onchange=" validateForm();">



            <!--------------------------------------------nom ------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label "> Quantite </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="quantite" id="quantite"  placeholder= "quantite">
                </div>
            </div>
        
             <!--------------------------------------------nom ------------------------------------------------->
             <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label "> Status </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="status" id="status"  placeholder= "status">
                </div>
            </div>
            <!--------------------------------------------nom ------------------------------------------------->
            <div class=" input-group mb-3 ">
                <label class="col-sm-3 col-form-label "> Amount </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="amount" id="amount"  placeholder= "amount">
                </div>
            </div>
            <div class="input-group mb-3">
                <label class="col-sm-3 col-form-label ">Product</label>
                <div class="col-sm-6">
                <select  name="categ" class="form-control">
                        <?php
                         foreach($list as $produits) {
                        ?>
                                <option class="col-sm-6" value="<?php echo $produits['idProduit'] ?>"><?php echo $produits['Product_name'] ?></option>
                                     <?php }  ?>
                    </select>  
                    <!-- <input type="text" class="form-control" name="categ" id="categ" placeholder= "Availability"  > -->
                </div>
             </div>
 <!---------------------------------------------Buttons---------------------------------------------->
 <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button  type="submit" class="btn btn-primary" name = "Ajouter"  id ="Ajouter">Add</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="YourOrders.php" role="button">Cancel</a>
             </div>
          </div>
          





        </form>
        </div>
    </body>
</html>
