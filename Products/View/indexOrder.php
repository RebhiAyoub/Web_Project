<?php
	
    include '../Controller/ProductsC.php';
    $poductC=new ProductC();
    $commandeC = new CommandeC();
    $liste1 = $commandeC->listCommandes();
?>
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Women wellness compass</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assetsBack/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assetsBack/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assetsBack/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assetsBack/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <style>
    body {
      font-family: sans-serif;
    }

    .categories {
      float: left;
      width: 200px;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
    }

    .categories ul {
      list-style-type: none;
      padding: 0;
    }

    .categories li a {
      text-decoration: none;
      color: #000;
    }

    .categories li a:hover {
      color: #ff0000;
    }

    .product-table {
      width: 100%;
      border-collapse: collapse;
    }

    .product-table th {
      background-color: #ffbbbb; /* pink */
    }

    .product-table td {
      padding: 5px;
    }

    .add-to-cart-btn {
      background-color: #000000; /* black */
      color: white; /* white text */
      padding: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assetsBack/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a   href="indexback.php"><i class="fa fa-dashboard fa-3x"></i> Products</a>
                    </li>
                    <li>
                        <a  href="indexCategory.php"><i class="fa fa-desktop fa-3x"></i> Category</a>
                    </li>
                    <li>
                        <a  class="active-menu" href="indexOrder.php"><i class="fa fa-desktop fa-3x"></i> Order</a>
                    </li>
                     <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> Feedback</a>
                    </li>
                    <li  >
                        <a  href="table.html"><i class="fa fa-table fa-3x"></i> Users List</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                    </li>					
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Our Products</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                
    
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">240 New</p>
                    <p class="text-muted">Notifications</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">3 Orders</p>
                    <p class="text-muted">Pending</p>
                </div>
             </div>
		     </div>
			</div>
      <?php
$commandeParPage =3;
$sql = "SELECT idCommande FROM commande";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->execute();

    $com = $query->rowCount();;
    
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
$pagesTotales=ceil($com/$commandeParPage);
if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page']<= $pagesTotales){
  $_GET['page']=intval($_GET['page']);
  $pageCourante=$_GET['page'];
  }else{
      $pageCourante=1;
  }
  $depart=($pageCourante-1)*$commandeParPage;
?> 
      <center><h1>List of Orders</h1>
				
    </center>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>IdCommande</th>
				          <th>Quantite</th>	
				          <th>DateOrder</th>
				          <th>Status</th>
                          <th>Amount</th>
                          <th>Product</th>
                    <th>View</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
		 $db = config::getConnexion();
       $liste1=$db->query('SELECT * FROM commande ORDER BY idCommande DESC LIMIT '.$depart.','.$commandeParPage);   
        foreach($liste1 as $commande){
            $produit = $poductC->getProduitById($commande['idProduit']);
    ?>
                  <tr>
                  <td><?php echo $commande['idCommande']; ?></td>
                  <td><?php echo $commande['quantite']; ?></td>
							<td><?php echo $commande['dateCommande']; ?></td>
							<td><?php echo $commande['status']; ?></td>
              <td><?php echo $commande['amount']; ?></td>
              <td><?php echo $produit['Product_name']; ?></td>
                    <td>
					<form method="POST" action="ViewOrder.php">
						<input type="submit"  class="btn btn-info " name="Voir" value="Voir">
						<input type="hidden"  value=<?php echo $commande['idCommande']; ?>  name="idCommande">  
					</form>
          <td>
					<form method="POST" action="ModifierCommande.php">
						<input type="submit"class="btn btn-success " name="update" value="update">
						<input type="hidden"  value=<?php echo $commande['idCommande']; ?>  name="idCommande">  
					</form>
				</td>
				<td>
					<a  class="btn btn-danger " href="SupprimerCommande.php?idCommande=<?php echo $commande['idCommande']; ?>">Delete</a>
				</td>
                  </tr>
                  <?php
				}
			?>
      <?php 
        for($i=1;$i<=$pagesTotales;$i++){
            if($i == $pageCourante){
               
            echo $i.' ';
             
            }else{
            echo '<a href="indexOrder.php?page='.$i.'" class="pagee">'.$i.'</a> ';
        }
    }
        ?>
                  </tbody>
              </table>

              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXKrwra6b8Q9" crossorigin="anonymous"></script>
 
                 


           
    
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assetsBack/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assetsBack/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assetsBack/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assetsBack/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assetsBack/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assetsBack/js/custom.js"></script>
    
   
</body>
</html>
