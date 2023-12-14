<?php


include_once 'ProductsC.php';
include_once 'CategorieC.php';
include_once 'commandeC.php';

$commande = null;


$commandeC = new CommandeC();
if (
    isset($_POST["idCommande"]) &&
    isset($_POST["quantite"])&&
    isset($_POST["status"]) &&
    isset($_POST["amount"]) &&
    isset($_POST["idProduit"]) 
) {
    if (
        !empty($_POST["idCommande"]) &&
        !empty($_POST['quantite'])&&
        !empty($_POST["status"]) &&
        !empty($_POST["amount"]) &&
        !empty($_POST["idProduit"]) 
    ) {
        $commande = new Commande(

            $_POST["idCommande"],
            $_POST['quantite'],
            $_POST["status"],
            $_POST["amount"],
            $_POST["idProduit"]
        );
        $commandeC->updateCommande($commande, $_POST["idCommande"]);
        header('Location:/web/View/admin/ui.php');
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
 <div class="container my-5">
   <a class="btn btn-danger"href="indexOrder.php">Back to list</a>
    <hr>
    <center><h1>Update Order</h1></center>
        
        <hr>
		<br>
		<br>
    <div class="container my-5">
    <?php
    if (isset($_POST['idCommande'])) {
        $commande = $commandeC->showCommande($_POST['idCommande']);
    ?>

        <form action="" class="form"  method="POST" >
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label " >Id Commande</label>
                <div class="col-sm-6">
                <input type="text"  class="form-control" name="idCommande" id="idCommande" value="<?php echo $commande['idCommande']; ?>" maxlength="20" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >quantite</label>
                <div class="col-sm-6">
                <input type="text"  class="form-control" name="quantite" id="quantite" value="<?php echo $commande['quantite']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >status</label>
                <div class="col-sm-6">
                <input type="text"  class="form-control" name="status" id="status" value="<?php echo $commande['status']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >amount</label>
                <div class="col-sm-6">
                <input type="text"  class="form-control" name="amount" id="amount" value="<?php echo $commande['amount']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label "  >quantite</label>
                <div class="col-sm-6">
                <input type="text"   class="form-control" class="form-control" name="idProduit" id="idProduit" value="<?php echo $commande['idProduit']; ?>" maxlength="20">
                </div>
            </div>
            <div class="row mb-5">
             <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
             </div>
             <div class="col-sm-3 d-grid">
                 <a class="btn btn-primary" href="/web/View/admin/ui.php" role="button">Cancel</a>
             </div>
          </div>
               
           
        </form>
        </div>
    <?php
    }
    ?>

</body>

</html>
