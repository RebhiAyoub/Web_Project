<?php
require_once('../controller/questionC.php');
require_once('config.php');

$pdo = Config::getConnexion();

// On détermine sur quelle page on se trouve
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

$recordsPerPage = 10;
$offset = ($currentPage - 1) * $recordsPerPage;

$query = "SELECT * FROM your_table LIMIT :offset, :limit";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':limit', $recordsPerPage, PDO::PARAM_INT);
$stmt->execute();
$tab = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content here, such as meta tags, stylesheets, etc. -->
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
</head>

<body>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <h1>List of Records</h1>
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Category</th>
                        <!-- Add more columns as needed -->
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $question) : ?>
                            <tr>
                                <td><?= $question['id'] ?></td>
                                <td><?= $question['title'] ?></td>
                                <td><?= $question['content'] ?></td>
                                <td><?= $question['category'] ?></td>
                                <!-- Add more columns as needed -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Add your pagination code here -->
                <!-- You can include your existing pagination.php file -->
            </section>
        </div>
    </main>
</body>

</html>
