<?php
session_start();
include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';

// Instantiate the controller
$c = new controller_user_admin();

// Get the current page from the URL, default to 1 if not set
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Get paginated user data
$perPage = 10; // Set the number of users per page
$paginationData = $c->getPaginatedUsers($currentPage, $perPage);
$tab = $paginationData['data'];

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets2/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets2/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets2/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets2/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style>
        table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        }
        thead {
        background-color: #f2f2f2;
        }
        th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        }
        tbody tr:nth-child(even) {
        background-color: #f9f9f9;
        }
        tbody tr:hover {
        background-color: #e0e0e0;
        }
        td:first-child {
        font-weight: bold;
        }
        tbody tr:last-child {
        border-bottom: 2px solid #333;
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
                <a class="navbar-brand" href="index.html"><?php echo $_SESSION['first_name'];?> <?php echo $_SESSION['last_name'] ;?> </a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a onclick="window.location.href='log_out.php'" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets2/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="index.html"><i class="fa fa-dashboard fa-3x"></i> Products</a>
                    </li>
                   <li>
                        <a  href="ui.html"><i class="fa fa-desktop fa-3x"></i> Feedback</a>
                    </li>
                    <li>
                        <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Lsers List</a>
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
                     <h2>Users List</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <?php
                    //include '../CONTROLLER_USER_ADMIN/controller_user_admin.php';
                    //$c= new controller_user_admin();
                    //$tab = $c->ListUsers();
                    //$tab = $c->getPaginatedUsers()
                ?>
                <table style="width: 90%; margin: 0 auto;">
                    <tr>
                        <th style="text-align: center; background-color: #333; color: white; padding: 20px;">Id</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">First Name</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Last Name</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Date of Birth</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Email</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Password</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Role</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Status</th>
                        <th style="text-align: center; background-color: #333; color: white; padding: 10px;">Delete</th>
                    </tr>

                    <?php
                    foreach ($tab as $user) {
                        ?>
                        <tr style="background-color: <?php echo ($user['status'] == 1) ? '#e6ffe6' : '#ffe6e6'; ?>">
                            <td style="text-align: center;" ><?php echo $user['id_user']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['first_name']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['last_name']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['date_of_birth']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['email']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['password']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['role']; ?></td>
                            <td style="text-align: center;" ><?php echo $user['status']; ?></td>
                            <td align="center">
                                <a class='btn btn-danger btn-sm' href="delete.php?id_user=<?php echo $user['id_user']; ?>" style="text-align: center;">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="pagination" style="text-align: center; margin-top: 20px;">
            <?php
            for ($i = 1; $i <= $paginationData['totalPages']; $i++) {
                echo "<a href='table.php?page=$i' class='btn btn-info'>$i</a> ";
            }
            ?>
            </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets2/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets2/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets2/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets2/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets2/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="/js/custom.js"></script>
    
   
</body>
</html>
