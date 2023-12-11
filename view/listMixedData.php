<?php
// Include your AnswerC class and other necessary files
require_once '../Controller/AnswerC.php'; // Update the path and class name as needed
require_once '../config.php'; // Include your database configuration

$database = config::getConnexion(); // Connect to the database
$answerC = new AnswerC($database); // Create an instance of the AnswerC class

// Get the mixed data from both tables
$mixedData = $answerC->listAnswer_question();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mixed Data List</title>
    <!-- Add your CSS styles or include Bootstrap if needed -->
</head>
<body>

    <h1>Mixed Data List</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Answer</th>
                <th>Answer Title</th>
                <th>Answer Content</th>
                <th>Answer Category</th>
                <th>ID Question</th>
                <th>Question Title</th>
                <th>Question Content</th>
                <th>Question Category</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mixedData as $row): ?>
                <tr>
                    <td><?= $row['id_answer']; ?></td>
                    <td><?= $row['answer_title']; ?></td>
                    <td><?= $row['answer_content']; ?></td>
                    <td><?= $row['answer_category']; ?></td>
                    <td><?= $row['question_id']; ?></td>
                    <td><?= $row['question_title']; ?></td>
                    <td><?= $row['question_content']; ?></td>
                    <td><?= $row['question_category']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Add your additional HTML/PHP content here -->

</body>
</html>
