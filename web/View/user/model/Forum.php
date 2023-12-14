<?php


ini_set('display_errors', 1);
include '/Applications/XAMPP/xamppfiles/htdocs/carvilla-v1.0/Controller/Forum/questionC.php';

$c = new QuestionC();
$tab = $c->listQuestions(); 
 
if (isset($_POST['search'])) {
    $searchKeyword = $_POST['searchKeyword'];
    $searchResults = $c->searchQuestions($searchKeyword);

    // Display the search results
    foreach ($searchResults as $question) {
        // Output the question details as needed
    }
} else {
    // Your existing logic to list all questions
    $searchResults = $c->listQuestions();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.profile-container {
    max-width: 600px;
    margin: 50px auto;
    padding: 30px;
    background-color: #ffffff;
    box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

span {
    display: block;
    margin-bottom: 20px;
}


.bn5 {
    padding: 0.6em 2em;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}
  
.bn5:before {
    content: "";
    background: linear-gradient(
      45deg,
      #ff0000,
      #ff7300,
      #fffb00,
      #48ff00,
      #00ffd5,
      #002bff,
      #7a00ff,
      #ff00c8,
      #ff0000
    );
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowingbn5 20s linear infinite;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    border-radius: 10px;
}
  
@keyframes glowingbn5 {
    0% {
      background-position: 0 0;
    }
    50% {
      background-position: 400% 0;
    }
    100% {
      background-position: 0 0;
    }
}
  
.bn5:active {
    color: #000;
}
  
.bn5:active:after {
    background: transparent;
}
  
.bn5:hover:before {
    opacity: 1;
}
  
.bn5:after {
    z-index: -1;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: #191919;
    left: 0;
    top: 0;
    border-radius: 10px;
}
    </style>
</head>
<body>
    <!--featured-cars start -->


<section id="featured-cars" class="featured-cars mt-5"> <!-- Add a margin-top to create space below the fixed navigation bar -->
<style>
        /* Ajoutez votre CSS personnalisé ici */
        .question-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .question-title {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .question-content,
        .question-category {
            color: #555;
            margin-bottom: 10px;
        }

        .question-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }

        .btn-primary,
        .btn-danger {
            padding: 10px 20px;
            font-size: 14px;
        }

        h1.forum-title {
            font-size: 24px;
            margin-bottom: 40px; /* Increased margin for more space */
        }

        .add-question-button {
            margin-bottom: 20px;
        }

        .section-header p {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .section-header h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Additional styling to make sure content is visible below the fixed navigation bar */
        body {
            padding-top: 56px; /* Adjust this value according to your navigation bar height */
        }

        @media (min-width: 992px) {
            body {
                padding-top: 76px; /* If you have a larger navigation bar height for larger screens */
            }
        }



    </style>











<!-- Add the Google Translate API script -->
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { pageLanguage: 'en', autoDisplay: false },
            'google_translate_element'
        );
    }
</script>


<div class="container">
    <div class="section-header">
        <p>Explore <span>Our</span> Forum</p>
        <h2>Forum</h2>
    </div><!--/.section-header-->
    <div class="featured-cars-content">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="bg-light p-4 rounded">
                                   
                




                    <p id="anonymous-text" class="mb-4">Your question will be anonymous.</p>
                    <div id="forum-content">
                        <h1 class="forum-title mb-4">Forum</h1>
                        <a href="addquestion1.php#featured-cars" class="btn btn-primary add-question-button mb-4">Add Question</a>
                        <a href="searchquestion.php#featured-cars" class="btn btn-primary add-question-button mr-2">Search Question</a>
                        <?php foreach ($tab as $question) : ?>
                            <?php
                                // Fetch answers for the current question
                                $answers = $c->ListAnswersForQuestion($question['id']);
                            ?>

                            <div class="question-container border mb-4 p-3">
                                <div class="inner-border p-3">
                                    <h5><?= $question['title']; ?></h5>
                                    <p><strong>Question:</strong> <?= $question['content']; ?></p>
                                    <p><strong>Category:</strong> <?= $question['category']; ?></p>

                                    <!-- Display answers for the current question -->
                                    <?php foreach ($answers as $answer) : ?>
                                        <div class="answer-container border-top mt-3 pt-3">
                                            <p><strong>Answer:</strong> <?= $answer['title']; ?> - <?= $answer['content']; ?> - <?= $answer['category']; ?></p>
                                        </div>
                                       
                                    <?php endforeach; ?>

                                    <div class="question-actions mt-3">
                                        <form method="POST" action="updatequestion1.php#featured-cars" class="d-inline">
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                            <input type="hidden" value="<?= $question['id']; ?>" name="idQuestion">
                                        </form>
                                        <a href="deletequestion1.php?id=<?= $question['id']; ?>" class="btn btn-danger ml-2">Delete</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Add a trigger for translation -->
<div id="google_translate_element"></div>













		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->
    
</body>
</html>