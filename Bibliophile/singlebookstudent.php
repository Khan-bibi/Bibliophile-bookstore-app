<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Member') {
    header("Location: index.php");
    exit();
}
include 'dbConnection.php';

// check for get request
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql = "{CALL getBookDetails($id)}";
    $stmt = odbc_exec($connection, $sql);
    $book = odbc_fetch_array($stmt);
    // print_r($book);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Book Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="singlebookstudent.css">
</head>

<body style="background-color:#8b570b;">
    <!-- Navbar inclusion -->
    <?php include 'viewnavbar.php'; ?>
    <?php include 'offcanvasnavbarstudent.php'; ?>

    <!-- Single Book Page -->
    <div class="single-book">
        <div class="book-card">
            <div class="image-container">
                <img src="book1.jpg" alt="Book Cover">
            </div>
            <div class="details-container">
                <h2 class="book-title"><?= $book['title'] ?></h2>
                <p class="book-author">By <?= $book['author'] ?></p>
                <p class="book-author">Category: <?= $book['categoryname'] ?></p>
                <p class="book-description">
                    <?= $book['description'] ?>
                </p>

                <button class="borrow-button"
                    onclick="window.location.href='./borrowBookLogic.php?id=<?= $book['bookID'] ?>'">

                    Borrow</button>
                <a href="viewbooks.php" class="back-button">Back to Catalog</a>
            </div>
        </div>
    </div>
</body>

</html>