<?php
include "../../controller/OvulationC.php";

$o = new  OvulationC();//same name as controller file 
$tab = $o->listovulations();//o as u like

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assetsTable/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assetsTable/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assetsTable/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assetsTable/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                    <img src="assetsTable/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                      <li  >
                        <a   href="/cycle/view/cycle/listeCycle.php"><i class="fa fa-table fa-3x"></i>List Cycle</a>
                    </li>
                    <li  >
                        <a  class="active-menu" href="/cycle/view/ovulation/listOvulations.php"><i class="fa fa-edit fa-3x"></i> List Ovulation </a>
                    </li>				
					
					                   
                    
                </ul>
               
            </div>
            
        </nav>  
         <!-- /. NAV SIDE  -->
         <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Woman ovulation day</h2>   
                        <h2><a href="createOvulation.php">Add ovulation</a></h2>
                        <button type="button" class="btn btn-primary">Download as CSV</button>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table of woman ovulation days
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                
                                <?php
                                // Pagination
                            // Connection to the database
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "cycle";

                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            // Pagination variables
                            $records_per_page = 5;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($page - 1) * $records_per_page;

                            // Fetch data from the database
                            $sql = "SELECT * FROM user2 LIMIT $offset, $records_per_page";
                            $result = $conn->query($sql);

                            // Display the table
                            echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
                            echo '<tr><th>User ID</th><th>First Day Of Last Menstrual Period</th><th>Average Cycle Length</th><th>Ovulation Date</th><th>Update</th><th>Delete</th></tr>';

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr class="odd gradeX">';
                                echo '<td>' . $row['idUser'] . '</td>';
                                echo '<td>' . $row['firstDayOfLMP'] . '</td>';
                                echo '<td>' . $row['averageCycleLength'] . '</td>';
                                echo '<td>' . $row['ovulationDate'] . '</td>';
                                echo '<td><form method="POST" action="editOvulation.php"><span class="glyphicon glyphicon-pencil"></span><input type="submit" name="update" class="btn btn-default btn-sm" value="Update"><input type="hidden" value="' . $row["idUser"] . '" name="idUser"> </form></td>';
                                echo '<td><a class="btn btn-info btn-lg" href="deleteOvulation.php?idUser=' . $row["idUser"] . '"><span class="glyphicon glyphicon-remove"></span>Delete</a> </td>';
                                echo '</tr>';
                            }

                            echo '</table>';

                            // Pagination links
                            $sql = "SELECT COUNT(idUser) AS total FROM user2";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $total_records = $row['total'];
                            $total_pages = ceil($total_records / $records_per_page);

                            
                        

               



                            echo '<div class="pagination">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo '<li class="page-item"><a href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                            echo '</div>';

                            // Close the database connection
                            $conn->close();
                            ?>

                                
                                
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

            <script>
                                        $(function() {
                                        $("button").on('click', function() {
                                            var data = "";
                                            var tableData = [];
                                            var rows = $("table tr");
                                            rows.each(function(index, row) {
                                            var rowData = [];
                                            $(row).find("th, td").each(function(index, column) {
                                                rowData.push(column.innerText);
                                            });
                                            tableData.push(rowData.join(","));
                                            });
                                            data += tableData.join("\n");
                                            $(document.body).append('<a id="download-link" download="data.csv" href=' + URL.createObjectURL(new Blob([data], {
                                            type: "text/csv"
                                            })) + '/>');


                                            $('#download-link')[0].click();
                                            $('#download-link').remove();
                                        });
                                        });
                                        </script>
                
            
               
        </div>
             <!-- /. PAGE INNER  -->
            </div>   

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assetsTable/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assetsTable/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assetsTable/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assetsTable/js/dataTables/jquery.dataTables.js"></script>
    <script src="assetsTable/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assetsTable/js/custom.js"></script>
    
    
   
</body>
</html>
