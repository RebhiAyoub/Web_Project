<?php
include_once 'ProductsC.php';


    $error = "";
    $mess = "" ; 


    
    $products = null;

 
    $ProductC = new ProductC();   
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
     <script src ="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> 
     <script src="Controle.js"></script>
    <title>Products</title>
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
        <center><h1>Products Details</h1></center>
        <hr>
		<br>
		<?php
			if (isset($_GET['idProduit'])){
				$products = $ProductC->RecupererProduct($_GET['idProduit']);
				
		?>
    
        <form method="post" class="form"  id="form" onsubmit="return validateForm();" >
            <!--------------------------------------------Nom------------------------------------------------->
            <div class="row mb-3"> 
                <label class="col-sm-3 col-form-label "  >Product name</label>
                <div class="col-sm-6">
                    <p class="form-control">
                    <?php echo $products['Product_name'];?>
                    </p>
                </div>
            </div>
            <!---------------------------------------------desc---------------------------------------------->
            <div class="row mb-3">
            <label class="col-sm-3 col-form-label "  >Description</label>
                <div class="col-sm-6">
                <p class="form-control">
                    <?php echo $products['Descriptionn'];?>
                    </p>
                </div>
            </div>

            <!---------------------------------------------prix---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Product price</label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $products['Product_price'];?>
                    </p>
                      </div>
                </div>
          <!---------------------------------------------availability---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Availability</label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $products['Availabilityy'];?>
                    </p>
                      </div>
                </div>
                <!---------------------------------------------img---------------------------------------------->
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label " >Product_img</label>
                      <div class="col-sm-6">
                      <p class="form-control">
                    <?php echo $products['img'];?>
                    </p>
                      </div>
                </div>
             <!---------------------------------------------Buttons cancel---------------------------------------------->
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
