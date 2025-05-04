<?php
session_start();
include 'dbConnection.php';


$sql = "{CALL GetAllBooks}";
$stmt = odbc_exec($connection, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <->Book Catalog</-> -->
    <link rel="stylesheet" href="catalogue.css">
</head>

<?php include 'viewnavbar.php'; ?>


<?php include 'offcanvasnavbarstudent.php'; ?>

<body style="background-color:#5a2c0e">
    <div class="container">
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search books...">
            <select id="sort-dropdown">
                <option value="-">Alphabetically</option>
                <option value="popularity">Most Popular</option>
                <option value="author">By Author</option>
            </select>
            <button id="filter-btn" style="color:#582f06; background-color:#FFEEAD;" class="btn">Filter</button>
        </div>

        <div class="book-grid">

            <?php
            while ($book = odbc_fetch_array($stmt)) {
            ?>
            <div class="book-card">

                <!--wrap the image in an anchor tag-->
                <a href="singlebookstudent.php?id=<?= $book['bookID'] ?>" class="book-image">
                    <img src="book1.jpg" alt="Book Title 1">
                </a>

                <h2 class="book-title"> <?= $book['title'] ?></h2>
                <p class="book-author"><?= $book['author'] ?> </p>

                <!--<div class="button-container">-->
                <!--</div>-->

            </div>
            <?php
            }
            ?>


            <!-- Static book cards -->


        </div>
    </div>

    <!-- <script src="script.js"></script> -->


</body>

</html>