<?php

include '../controller/answerC.php';
include '../model/answer.php';

$error = "";

// create answer
$answer = null;

// create an instance of the controller
$answerC = new AnswerC();

if (
    isset($_POST["title"]) &&
    isset($_POST["content"]) &&
    isset($_POST["category"]) &&
    isset($_POST["id_specialist"])
) {
    if (
        !empty($_POST['title']) &&
        !empty($_POST["content"]) &&
        !empty($_POST["category"]) &&
        !empty($_POST["id_specialist"])
    ) {
        $answer = new Answer(
            null,
            $_POST['title'],
            $_POST['content'],
            $_POST['category'],
            $_POST['id_specialist']
        );
        $answerC->addAnswer($answer);
        header('Location: listanswer.php');
    } else {
        $error = "Missing information";
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }

        #error {
            color: red;
            margin-bottom: 10px;
        }

        form {
            width: 50%;
            margin: 0 auto;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <a href="listanswer.php">Back to list</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table>
            <tr>
                <td><label for="title">Title :</label></td>
                <td>
                    <input type="text" id="title" name="title" />
                    <span id="erreurTitle" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="content">Content :</label></td>
                <td>
                    <input type="text" id="content" name="content" />
                    <span id="erreurContent" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="category">Category :</label></td>
                <td>
                    <input type="text" id="category" name="category" />
                    <span id="erreurCategory" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="id_specialist">Specialist ID :</label></td>
                <td>
                    <input type="text" id="id_specialist" name="id_specialist" />
                    <span id="erreurIdSpecialist" style="color: red"></span>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
