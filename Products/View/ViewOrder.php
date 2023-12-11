<?php
    include_once '../Controller/ProductsC.php';


    $error = "";
    $mess = "" ; 


    // create user
    $commande = null;

    // create an instance of the controller
    $commandeC = new CommandeC();   
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
     <script src="Controle.js"></script>
    <title>Ordres</title>
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
        <center><h1>Order Details</h1></center>
        <hr>
		<br>
		<?php
			if (isset($_POST['idCommande'])){
				$commande = $commandeC->showCommande($_POST['idCommande']);
				
		?>
    
        <form method="post" class="form"  id="form" onsubmit="return validateForm();" >
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >Id Order</label>
                <div class="col-sm-6">
                    <p class="form-control">
                    <?php echo $commande['idCommande'];?>
                    </p>
                </div>
            </div>
            <!---------------------------------------------desc---------------------------------------------->
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label "  >Quantite</label>
                <div class="col-sm-6">
                <p class="form-control">
                    <?php echo $commande['quantite'];?>
                    </p>
                </div>
            </div>

            <!---------------------------------------------prix---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Date of the Order </label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $commande['dateCommande'];?>
                    </p>
                      </div>
                </div>
          <!---------------------------------------------availability---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Status</label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $commande['status'];?>
                    </p>
                      </div>
                </div>
                <!---------------------------------------------img---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Amount</label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $commande['amount'];?>
                    </p>
                      </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Id product</label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $commande['idProduit'];?>
                    </p>
                      </div>
                </div>
             <!---------------------------------------------Buttons---------------------------------------------->
             <br>
             <br>
             <div class="row mb-5">
             <div class="col-sm-2 d-grid">
             <a class="btn btn-danger" href="indexOrder.php" role="button">Cancel</a>
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
