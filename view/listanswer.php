<?php
include "../controller/answerC.php";

$c = new AnswerC();
$answerTab = $c->listAnswers();

?>




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
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
                <a class="navbar-brand" href="php">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 27 November 2023 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
                            <li>
                        <a class="active-menu"  href="listquestion.php"><i class="fa fa-dashboard fa-3x"></i> Questions</a>
                    </li>
                      
                    <li  >
                        <a class="active-menu"  href="listanswer.php"><i class="fa fa-edit fa-3x"></i> Answers </a>
                    </li>				
					

					                   	
                </ul>
               
            </div>
            
        </nav>  
       <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Forms Page</h2>   
                        
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Elements
                        </div>
            <!-- /. ROW -->
          

                        <!-- Table: List of Answers -->
                        <body>
                            <h1>Forum Answers</h1>
                            <a href="addanswer.php" class="add-button">Add Answer</a>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">ID Answer</th>
                                        <th style="width: 15%;">Title</th>
                                        <th style="width: 40%;">Content</th>
                                        <th style="width: 15%;">Category</th>
                                        <th style="width: 5%;">Update</th>
                                        <th style="width: 5%;">Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($answerTab as $answer) : ?>
                                        <tr>
                                            <td><?= $answer['id_answer']; ?></td>
                                            <td><?= $answer['title']; ?></td>
                                            <td><?= $answer['content']; ?></td>
                                            <td><?= $answer['category']; ?></td>
                                            <td>
                                                <form method="POST" action="updateanswer.php">
                                                    <button type="submit" name="update" class="btn btn-primary btn-sm">Update</button>
                                                    <input type="hidden" value="<?= $answer['id_answer']; ?>" name="idAnswer">
                                                </form>
                                            </td>
                                            <td>
                                                <a href="deleteanswer.php?id=<?= $answer['id_answer']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



                                
                               
                
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
