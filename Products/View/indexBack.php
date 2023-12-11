<?php
	include '../Controller/ProductsC.php';

	$ProductC=new ProductC();
	/* $listeProducts=$ProductC->AfficherProducts(); */ 
  if (isset($_GET['label']) && !empty($_GET['label'])) {
    $listeProducts = $ProductC->showCom($_GET['label']);
  }else if(isset($_POST['tri']))
  {
  $listeProducts=$ProductC->trierproduit();
  session_start();

} 
  else if(isset($_POST['triasc']))
{
  
    $listeProducts=$ProductC->trierproduit1();
    session_start();
}  else{
  $listeProducts=$ProductC->AfficherProducts();}

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
                        <a class="active-menu"  href="indexback.php"><i class="fa fa-dashboard fa-3x"></i> Products</a>
                    </li>
                    <li>
                        <a  href="indexCategory.php"><i class="fa fa-desktop fa-3x"></i> Category</a>
                    </li>
                    <li>
                        <a  href="indexOrder.php"><i class="fa fa-desktop fa-3x"></i> Order</a>
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
                     <form action="" method="GET">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control" name="label" id="label">
              </form>  
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
      <form method="POST" action="indexBack.php">
      <input type="submit"  name="tri" id="tri"  class="btn bg-gradient-dark mb-0" value="tri" ></input>                              
       <input type="submit"  name="trieasc"  id="triasc"  class="btn bg-gradient-dark mb-0" value="triasc" ></input>
         </form>

      <center><h1>List of Products</h1>
				<a class="btn btn-primary" href="AjouterProduct.php" role="button">New Product</a>
    </center>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Availability</th>
                    <th>Image</th>
                    <th>Creation Date</th>
                    <th>Category</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
		
    foreach($listeProducts as $produits){
  ?>
                  <tr>
                  <td><?php echo $produits['idProduit']; ?></td>
				<td><?php echo $produits['Product_name']; ?></td>
				<td><?php echo $produits['Descriptionn']; ?></td>
        <td><?php echo $produits['Product_price']; ?></td>
				<td><?php echo $produits['Availabilityy']; ?></td>
				<td><img src="../assets/images/<?php echo $produits['img']; ?>" width="200" height="150" ></td>
				<td><?php echo $produits['creationDate']; ?></td>
				<td><?php echo $produits['categ']; ?></td>
                    
                    <td>
					<form method="GET" action="ViewProduct.php">
						<input type="submit"  class="btn btn-info " name="Voir" value="Voir">
						<input type="hidden"  value=<?php echo $produits['idProduit']; ?>  name="idProduit">  
					</form>
				</td>
				<td>
					<form method="POST" action="UpdateProduct.php">
						<input type="submit"  class="btn btn-success " name="Update" value="Update">
						<input type="hidden"  value=<?php echo $produits['idProduit']; ?>  name="idProduit">  
					</form>
				</td>
				<td>
					<a  class="btn btn-danger " href="SupprimerProduct.php?idProduit=<?php echo $produits['idProduit']; ?>">Delete</a>
				</td>
                  </tr>
                  <?php
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
