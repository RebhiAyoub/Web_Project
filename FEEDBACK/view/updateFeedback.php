<?php
// Include necessary files and classes
require_once 'C:\xampp\htdocs\FEEDBACK\controller\FeedbackC.php';

// Create an instance of FeedbackC
$feedbackController = new FeedbackC();

// Check if feedbackId is provided in the URL
if (isset($_GET['feedbackId'])) {
    $feedbackId = $_GET['feedbackId'];

    // Retrieve the feedback data based on the feedbackId
    $oldFeedback = $feedbackController->getFeedbackById($feedbackId);

    // Check if feedbackData is not empty
    if (!$oldFeedback) {
        // Handle the case where feedbackData is not found
        echo "Feedback not found!";
        exit;
    }

    // Extract data from $oldFeedback
    $idUser = $oldFeedback['idUser'];
    $rating = $oldFeedback['Rating'];
    $comment = $oldFeedback['Comment'];
    $categoryName = $oldFeedback['nameCategory'];
} else {
    // Handle the case where feedbackId is not provided
    echo "FeedbackId not provided!";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['operation']) && $_POST['operation'] === 'update') {
    // Get the feedback ID from the form data
    $feedbackId = $_POST['feedbackId'];

    // Call the updateFeedback method in the controller with user ID set to null for now
    $result = $feedbackController->updateFeedback($feedbackId, null, $_POST['rating'], $_POST['comment'], $_POST['category']);

    // Handle the result
    if ($result === "Feedback updated successfully") {
        // Redirect to index.php with the current page
        header("Location: index.php?page=" . $_GET['page'] . '#feedback-area');
        exit;
    } else {
        // Handle the error
        echo "Error: $result";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
    
        :root {
            --pink: #FF69B4; 
            --light-pink: #FFC0CB; 
            --dark-pink: #FF1493; 
            --yellow: #FFBD13;
            --blue: #4383FF;
            --blue-d-1: #3278FF;
            --light: #F5F5F5;
            --grey: #AAA;
            --white: #FFF;
            --shadow: 8px 8px 30px rgba(0, 0, 0, .05);
        }
    
        body {
            background: var(--light-pink); 
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }
    
        .wrapper {
            background: var(--white);
            padding: 2rem;
            max-width: 576px;
            width: 100%;
            border-radius: .75rem;
            box-shadow: var(--shadow);
            text-align: center;
        }
    
        .wrapper h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--pink);
        }
    
        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
            grid-gap: .5rem;
            font-size: 2rem;
            color: var(--yellow); 
            margin-bottom: 2rem;
        }
    
        .rating .star {
            cursor: pointer;
        }
    
        .rating .star.active {
            opacity: 0;
            animation: animate .5s calc(var(--i) * .1s) ease-in-out forwards;
        }
    
        @keyframes animate {
            0% {
                opacity: 0;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.2);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    
        .rating .star:hover {
            transform: scale(1.1);
        }
    
        label {
            color: var(--pink); 
        }
    
        select {
            width: 100%;
            background: var(--light-pink);
            padding: 1rem;
            border-radius: .5rem;
            border: none;
            outline: none;
            resize: none;
            margin-bottom: .5rem;
            color: var(--pink); 
        }
    
        textarea {
            width: 100%;
            background: #DABFE1; 
            padding: 1rem;
            border-radius: .5rem;
            border: none;
            outline: none;
            resize: none;
            margin-bottom: .5rem;
            color: #FF1493; 
        }
    
        ::placeholder {
            color: #FF69B4; 
        }
    
        .category-dropdown {
    color: #DABFE1; 
    border: 1px solid #DABFE1; 
    border-radius: .5rem;
    outline: none;
    padding: 0.5rem;
    background-color: #DABFE1; 
}

.category-dropdown:hover {
    background-color: #FF69B4; 
    color: #FFF; 
}

    
        .btn-group {
            display: flex;
            grid-gap: .5rem;
            align-items: center;
        }
    
        .btn-group .btn {
            padding: .75rem 1rem;
            border-radius: .5rem;
            border: none;
            outline: none;
            cursor: pointer;
            font-size: .875rem;
            font-weight: 500;
        }
    
        .btn-group .btn.submit {
            background: var(--pink); /* Pink submit button background */
            color: var(--white); /* White text color */
        }
    
        .btn-group .btn.submit:hover {
            background: var(--dark-pink); /* Dark pink on hover */
        }
    
        .btn-group .btn.cancel {
            background: var(--white);
            color: var(--pink); /* Pink cancel button text color */
        }
    
        .btn-group .btn.cancel:hover {
            background: var(--light-pink); /* Light pink on hover */
        }
    </style>
    
    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Form Reviews</title>
</head>

<body>

  <div class="wrapper">
    <h3>Your feedback is important to us!</h3>
    <form id="feedback-form" action="updateFeedback.php?feedbackId=<?php echo $feedbackId; ?>" method="post" onsubmit="return validateForm()">
    <input type="hidden" name="operation" id="operation" value="update">
    <input type="hidden" name="feedbackId" id="feedbackId" value="<?php echo $feedbackId; ?>">
    <input type="hidden" name="idUser" id="idUser" value="<?php echo $idUser; ?>">

      <div class="rating">
        <input type="number" name="rating" hidden value="<?php echo $rating; ?>">
        
        <i class='bx bx-star star' style="--i: 0;"></i>
        <i class='bx bx-star star' style="--i: 1;"></i>
        <i class='bx bx-star star' style="--i: 2;"></i>
        <i class='bx bx-star star' style="--i: 3;"></i>
        <i class='bx bx-star star' style="--i: 4;"></i>
      </div>
      <label for="category" class="category-label">Category:</label>
      <select id="category" name="category">
      <?php
        // Include the CategoryC.php controller
        require_once 'C:\xampp\htdocs\FEEDBACK\controller\CategoryC.php';

        // Create an instance of CategoryC
        $categoryController = new CategoryC();

        // Call the showCategories method to get category data
        $categoriesData = $categoryController->showCategories();

        // Display the categories dynamically
        foreach ($categoriesData as $category) {
            echo "<option value='{$category['nameCategory']}' " . ($categoryName === $category['nameCategory'] ? 'selected' : '') . ">{$category['nameCategory']}</option>";
        }
        ?>
    </select>

    <textarea name="comment" id="comment" cols="30" rows="5" placeholder="Your opinion..."><?php echo $comment; ?></textarea>
    <p id="opinionLengthMessage"></p>
    <p id="wordsRemaining" style="float: right;">256</p>
    <div class="btn-group">
        <button type="submit" class="btn submit" href="updateFeedback.php?feedbackId=<?php echo $feedback['idFeedback']; ?>&page=<?php echo $currentPage; ?>">Update</button>
        <button type="button" class="btn cancel" onclick="window.location.href='index.php'">Cancel</button>
    </div>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
        const allStar = document.querySelectorAll('.rating .star');
        const ratingValue = document.querySelector('.rating input');

        allStar.forEach((item, idx) => {
            item.addEventListener('click', function () {
                let click = 0;
                ratingValue.value = idx + 1;

                allStar.forEach(i => {
                    i.classList.replace('bxs-star', 'bx-star');
                    i.classList.remove('active');
                });

                for (let i = 0; i < allStar.length; i++) {
                    if (i <= idx) {
                        allStar[i].classList.replace('bx-star', 'bxs-star');
                        allStar[i].classList.add('active');
                    } else {
                        allStar[i].style.setProperty('--i', click);
                        click++;
                    }
                }
            });
        });

        // Set initial rating on page load
        const initialRating = parseInt(ratingValue.value) || 0;
        allStar.forEach((star, index) => {
            if (index < initialRating) {
                star.classList.replace('bx-star', 'bxs-star');
                star.classList.add('active');
            }
        });
    });

    function validateForm() {
        // Get the selected rating value
        var rating = document.querySelector('.rating input').value;

        // Get the opinion value
        var opinion = document.getElementById('comment').value;

        // Perform validation
        if (rating === "") {
            alert("Please select a rating.");
            return false;
        }

        if (opinion.trim() === "") {
            alert("Please provide your opinion.");
            return false;
        }

        if (!validateOpinionLength(opinion, 1)) {
            alert("Opinion should have at least 1 word.");
            return false;
        }

        if (!validateMaxWords(opinion, 256)) {
            alert("Opinion cannot exceed 256 words.");
            return false;
        }

        // If all validations pass, the form will be submitted
        return true;
    }

    function validateOpinionLength(opinion, minLength) {
        // Split the opinion into words
        var words = opinion.trim().split(/\s+/).filter(function (el) {
            return el.length > 0;
        });

        // Display the number of words remaining to reach the specified minimum length
        var wordsRemaining = 256 - words.length;
        document.getElementById('wordsRemaining').innerText = wordsRemaining;

        // Check if the number of words is at least minLength
        return words.length >= minLength;
    }

    function validateMaxWords(opinion, maxWords) {
        // Split the opinion into words
        var words = opinion.trim().split(/\s+/).filter(function (el) {
            return el.length > 0;
        });

        // Check if the number of words does not exceed maxWords
        return words.length <= maxWords;
    }

    // Display the number of words in the opinion as the user types
    document.getElementById('comment').addEventListener('input', function () {
        var opinion = this.value;
        var words = opinion.trim().split(/\s+/).filter(function (el) {
            return el.length > 0;
        });

        // Display the number of words remaining out of 256
        var wordsRemaining = 256 - words.length;
        document.getElementById('wordsRemaining').innerText = wordsRemaining;
    });
</script>

</body>

</html>