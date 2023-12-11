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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <style>
        /* Pagination styles */
.pagination {
    display: flex;
    list-style: none;
    padding: 0;
}

.pagination a, .pagination span {
    margin: 0 5px;
    padding: 8px 12px;
    border: 1px solid #ddd;
    text-decoration: none;
    color: #333;
    background-color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.pagination a:hover {
    background-color: #ddd;
}

.pagination span.active {
    background-color: #4CAF50;
    color: white;
}

/******************************************************************** */
.table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .table td, .table th {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .feedback-item {
        margin-bottom: 20px;
        position: relative;
    }

    .btn {
        padding: 8px 16px;
        margin-right: 8px;
        cursor: pointer;
        border: none;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #f2f2f2;
    }

    .btn i {
        margin-right: 4px;
    }

    .btn-delete {
        background-color: #ff6666;
        color: #fff;
    }

    .btn-primary {
        background-color: #3498db;
        color: #fff;
    }

    .btn-success {
        background-color: #4caf50;
        color: #fff;
    }

    .btn-danger {
        background-color: #e74c3c;
        color: #fff;
    }

    .btn-warning {
        background-color: #f39c12;
        color: #fff;
    }

    textarea {
        width: calc(100% - 16px);
        padding: 8px;
        margin-bottom: 8px;
        box-sizing: border-box;
    }

    .high-rating {
        background-color: #c8e6c9; 
    }

    .medium-rating {
        background-color: #ffe082; 
    }

    .low-rating {
        background-color: #ffcdd2; 
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
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="#" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/find_user.png" class="user-image img-responsive" />
                    </li>
                    <li>
                        <a href="index.html"><i class="fa fa-dashboard fa-3x"></i> Products</a>
                    </li>
                    <li>
                        <a class="active-menu" href="blank.html"><i class="fa fa-square-o fa-3x"></i>Feedbacks </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <header>
                    <a href='index.php' class='btn btn-go-to-index'>Go to User Page</a>
                </header>

           
                <!-- Feedback display section -->
                <section id="feedback-area">
                    <h3>Feedback Area</h3>
                    <div id="insert-feedback-area">
                        <?php
                        // Include the FeedbackC.php controller
                        require_once 'C:\xampp\htdocs\FEEDBACK\controller\FeedbackC.php';
                        require_once 'C:\xampp\htdocs\FEEDBACK\controller\ReplyC.php';

                        // Create an instance of FeedbackC
                        $feedbackController = new FeedbackC();

                        // Call the showFeedback method to get feedback data
                        $feedbackData = $feedbackController->showFeedback();
                       
                        $repliesController = new ReplyC();

                         // Number of feedback items to display per page
                     $itemsPerPage = 4;

        // Get the current page from the URL parameter
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Calculate the starting index for the displayed feedback items
        $startIndex = ($currentPage - 1) * $itemsPerPage;

        // Get a subset of feedback items based on the current page
        $pagedFeedbackData = array_slice($feedbackData, $startIndex, $itemsPerPage);


                        // Display the feedback
                        foreach ($pagedFeedbackData as $feedback) : ?>
                        <?php
            // Add a class based on the rating
            $ratingClass = '';
            if ($feedback['Rating'] >= 4) {
                $ratingClass = 'high-rating';
            } elseif ($feedback['Rating'] >= 2) {
                $ratingClass = 'medium-rating';
            } else {
                $ratingClass = 'low-rating';
            }
            ?>
              <div class="feedback-item <?php echo $ratingClass; ?>">
                <table class="table">
                    <tbody>
            <tr>
                <td><strong>User ID:</strong> <?php echo $feedback['idUser']; ?></td>
                <td><strong>Rating:</strong> <?php echo $feedback['Rating']; ?></td>
                <td><strong>Comment:</strong> <?php echo $feedback['Comment']; ?></td>
                <td><strong>Category:</strong> <?php echo $feedback['nameCategory']; ?></td>
                <td><strong>Timestamp:</strong> <?php echo $feedback['timestamp_column']; ?></td>
                <td>
                    <form action="deleteFeedbackAD.php" method="get">
                        <!-- Pass the current page information to deleteFeedbackAD.php -->
                        <input type="hidden" name="feedbackId" value="<?php echo $feedback['idFeedback']; ?>">
                        <input type="hidden" name="page" value="<?php echo $currentPage; ?>">
                        <button type="submit" class="btn btn-delete" title="Delete Feedback"><i class="fa-solid fa-eraser" style="color: #ffffff;"></i></button>
                    </form>
                    <button type="button" class="btn btn-primary" title="Reply" onclick="toggleReplyForm(<?php echo $feedback['idFeedback']; ?>)"><i class="fas fa-reply"></i></button>
                </td>
            </tr>
        </tbody>
    </table>

                                <!-- Reply form -->
                                <div id="reply-form-<?php echo $feedback['idFeedback']; ?>" style="display: none;">
        <form action="replyFeedback.php" method="post" id="reply-form">
            <input type="hidden" name="idFeedback" value="<?php echo $feedback['idFeedback']; ?>">
            <label for="adminReply">Admin Reply:</label>
            <textarea name="adminReply" rows="4" required></textarea>
            <button type="submit" class="btn btn-success" onclick="setFormAction(<?php echo $feedback['idFeedback']; ?>)" title="Submit Reply"><i class="fas fa-check"></i></button>
            <button type="button" class="btn btn-danger" onclick="toggleReplyForm(<?php echo $feedback['idFeedback']; ?>)" title="Cancel"><i class="fas fa-times"></i></button>
        </form>
    </div>
                                       <!-- Display replies -->
                <?php
                $feedbackId = $feedback['idFeedback'];
                $replies = $repliesController->showReplies($feedbackId);

                foreach ($replies as $reply) : ?>
                    <div class="reply-item">
                        <p><strong>Admin Reply:</strong> <?php echo $reply['adminReply']; ?></p>
                        <!-- Add other reply information as needed -->
                        <form action="deleteReply.php" method="get">
    <input type="hidden" name="idReply" value="<?php echo $reply['idReply']; ?>">
    <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>">
    <button type="submit" class="btn btn-delete">Delete Reply</button>
</form>

                        <!-- Edit button to toggle the edit form -->
        <button type="button" class="btn btn-warning" onclick="toggleEditForm(<?php echo $reply['idReply']; ?>)">Edit Reply</button>
        
        <!-- Edit form (initially hidden) -->
        <form action="editReply.php" method="post" id="edit-form-<?php echo $reply['idReply']; ?>" style="display: none;">
    <input type="hidden" name="idReply" value="<?php echo $reply['idReply']; ?>">
    <input type="hidden" name="page" value="<?php echo isset($_GET['page']) ? $_GET['page'] : 1; ?>">
    <label for="editedReply">Edit Reply:</label>
    <textarea name="editedReply" rows="4" required><?php echo $reply['adminReply']; ?></textarea>
    <button type="submit" class="btn btn-success">Confirm</button>
    <button type="button" class="btn btn-danger" onclick="toggleEditForm(<?php echo $reply['idReply']; ?>)">Cancel</button>
</form>
                    </div>
                <?php endforeach; ?>
            </div>
                        <?php endforeach; ?>
                        
                    </div>
                    <!-- Pagination navigation -->
    <div class="pagination">
        <?php
        
        // Calculate the total number of pages
        $totalPages = ceil(count($feedbackData) / $itemsPerPage);

        // Display previous page arrow
        if ($currentPage > 1) {
            echo '<a href="?page=' . ($currentPage - 1) . '">&laquo;</a>';
        }

        // Display page numbers with '/' separator
        for ($i = 1; $i <= $totalPages; $i++) {
            // Display only the arrows as links
            if ($i == $currentPage) {
                echo '<span class="active">' . $i . '</span>';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }

        // Display next page arrow
        if ($currentPage < $totalPages) {
            echo '<a href="?page=' . ($currentPage + 1) . '">&raquo;</a>';
        }
        ?>
    </div>
                </section>

                <!-- JavaScript to toggle reply form visibility -->
                <script>
                    function toggleReplyForm(feedbackId) {
                        var replyForm = document.getElementById('reply-form-' + feedbackId);
                        replyForm.style.display = (replyForm.style.display === 'none' || replyForm.style.display === '') ? 'table-row' : 'none';
                    }
                    function toggleEditForm(replyId) {
        var editForm = document.getElementById('edit-form-' + replyId);

        // Check if the form is currently visible
        var isVisible = window.getComputedStyle(editForm).display !== 'none';

        // Toggle the display property based on its current state
        editForm.style.display = isVisible ? 'none' : 'block';
    }
                </script>

<div id="add-category-form" style="margin-top: 20px;">
    <h4>Add New Category</h4>
    <form action="addCategory.php" method="post">
        <label for="categoryName">Category Name:</label>
        <input type="text" name="categoryName" required>
        <button type="submit" class="btn btn-success">Add Category</button>
    </form>
</div>

 <!-- Dropdown bar for sorting -->
 <div id="category-sort-dropdown">
        <label for="sort-category">Sort by:</label>
        <select id="sort-category" class="btn btn-default" onchange="sortCategories()">
            <option value="name">Alphabetical Order</option>
            <option value="id">ID</option>
        </select>
    </div>

    <!-- Show Categories section -->
    <section id="show-categories">
        <h3>Categories</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the CategoryC.php controller
                require_once 'C:\xampp\htdocs\FEEDBACK\controller\CategoryC.php';

                // Create an instance of CategoryC
                $categoryController = new CategoryC();

                // Call the showCategories method to get category data
                $categoriesData = $categoryController->showCategories();

                // Display the categories
                foreach ($categoriesData as $category) {
                    echo "<tr>";
                    echo "<td>{$category['CategoryID']}</td>";
                    echo "<td>{$category['nameCategory']}</td>";
                    echo "<td><button class='btn-delete' onclick='deleteCategory({$category['CategoryID']})'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
    </table>
</section>

<!-- JavaScript to handle category deletion -->
<script>
    function deleteCategory(categoryId) {
        if (confirm('Are you sure you want to delete this category?')) {
            // You can redirect to deleteCategory.php with categoryId as a parameter
            window.location.href = `deleteCategory.php?categoryId=${categoryId}`;
        }
    }
    function sortCategories() {
            var sortBy = document.getElementById('sort-category').value;
            var categoriesTable = document.querySelector('#show-categories table tbody');
            var rows = Array.from(categoriesTable.rows);

            rows.sort(function (a, b) {
                var aValue, bValue;

                if (sortBy === 'name') {
                    aValue = a.cells[1].textContent.toLowerCase();
                    bValue = b.cells[1].textContent.toLowerCase();
                } else if (sortBy === 'id') {
                    aValue = parseInt(a.cells[0].textContent, 10);
                    bValue = parseInt(b.cells[0].textContent, 10);
                }

                if (aValue < bValue) {
                    return -1;
                } else if (aValue > bValue) {
                    return 1;
                } else {
                    return 0;
                }
            });

            // Clear the existing rows
            rows.forEach(function (row) {
                categoriesTable.removeChild(row);
            });

            // Append the sorted rows
            rows.forEach(function (row) {
                categoriesTable.appendChild(row);
            });
        }
    function setFormAction(feedbackId) {
    var form = document.getElementById('reply-form');
    if (form) {
        form.action = 'replyFeedback.php?page=<?php echo $currentPage; ?>&feedbackId=' + feedbackId;
    }
    
}


</script>



            </div>
        </div>
    </div>
    
    
</body>

</html>
