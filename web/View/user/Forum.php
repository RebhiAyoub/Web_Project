
<?php


ini_set('display_errors', 1);
include_once  '../../Controller/Forum/questionC.php';

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
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/icon" href="../assets/logo/favicon.png" />

    <title>Forum WWC</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('raef.jpg') !important;

        }

        /* New button styles using Bootstrap classes */
        .btn-primary,
        .btn-danger {
            font-size: 16px;
        }

        .add-question-button {
            font-size: 18px;
        }

        .question-container {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff; /* Added background color for better visibility */
        }

        

        h5 {
            font-size: 24px;
            color: #333; /* Updated text color */
            margin-bottom: 15px;
        }

        strong {
            color: #555; /* Updated text color */
        }

        p {
            color: #555; /* Updated text color */
            margin-bottom: 10px;
        }

        .answer-container {
            border-top: 1px solid #ddd;
            margin-top: 15px;
            padding-top: 15px;
        }
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
                margin-bottom: 40px;
                /* Increased margin for more space */
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
    </style>
</head>

<body>
    <!--featured-cars start -->


    <section id="featured-cars" class="featured-cars mt-5">
        











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
            <div class="featured-cars-content">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="bg-light p-4 rounded" style="background:transparent !important;">
                        <h1 style="padding-left:250px;">Forum</h1>





                            <div id="forum-content">
                                
                                <a href="addquestion1.php#featured-cars"
                                    class="btn btn-primary add-question-button mb-4">Add Question</a>
                                <a href="searchquestion.php#featured-cars"
                                    class="btn btn-primary add-question-button mr-2">Search Question</a>
                                <?php foreach ($tab as $question): ?>
                                    <?php
                                    // Fetch answers for the current question
                                    $answers = $c->ListAnswersForQuestion($question['id']);
                                    ?>

                                    <div class="question-container border mb-4 p-3">
                                        <div class="inner-border p-3">
                                            <h5>
                                                <?= $question['title']; ?>
                                            </h5>
                                            <p><strong>Question:</strong>
                                                <?= $question['content']; ?>
                                            </p>
                                            <p><strong>Category:</strong>
                                                <?= $question['category']; ?>
                                            </p>

                                            <!-- Display answers for the current question -->
                                            <?php foreach ($answers as $answer): ?>
                                                <div class="answer-container border-top mt-3 pt-3">
                                                    <p><strong>Answer:</strong>
                                                        <?= $answer['title']; ?> -
                                                        <?= $answer['content']; ?> -
                                                        <?= $answer['category']; ?>
                                                    </p>
                                                </div>

                                            <?php endforeach; ?>

                                            <div class="question-actions mt-3">
                                                <form method="POST" action="updatequestion1.php#featured-cars"
                                                    class="d-inline">
                                                    <button type="submit" name="update"
                                                        class="btn btn-primary">Update</button>
                                                    <input type="hidden" value="<?= $question['id']; ?>" name="idQuestion">
                                                </form>
                                                <a href="deletequestion1.php?id=<?= $question['id']; ?>"
                                                    class="btn btn-danger ml-2">Delete</a>
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