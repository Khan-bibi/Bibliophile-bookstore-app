<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Member') {
    header("Location: index.php");
    exit();
}
include 'dbConnection.php';
$sql = "{CALL get_all_reviews_with_books}";
$stmt = odbc_exec($connection, $sql);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Reviews and Ratings</title>
    <link rel="stylesheet" href="reviewandrating.css">
</head>

<body style="background-color: #FFEEAD;">


    <?php include 'viewnavbar.php'; ?>


    <?php include 'offcanvasnavbarstudent.php'; ?>



    <section class="bg" style="background-color:#FFEEAD;">
        <div class="heading">
            <h2>Reviews and Ratings</h2>
        </div>
        <div class="container">
            <div class="row" id="bookCards">
                <?php
                while ($review = odbc_fetch_array($stmt)) {

                ?>
                    <div class="col-md-4">
                        <div class="book-card">
                            <div class="card">
                                <img src="book2.jpg" alt="Book Cover" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $review['book_title'] ?></h5>
                                    <h6 class="card-subtitle mb-2 ">by <?= $review['book_author'] ?></h6>
                                    <p class="card-text"><strong>RATING:</strong> <span class="star-rating">
                                            <?php
                                            for ($i = 0; $i  < 5; $i++) {
                                                if ($i < $review['stars']) {
                                                    echo "★";
                                                } else {
                                                    echo "☆";
                                                }
                                            }
                                            ?>
                                        </span></p>
                                    <p class="card-text"><?= $review['review'] ?></p>
                                    <p class="card-text"><small class="text-muted">Reviewed by:
                                            <?= $review['userName'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </section>
</body>

</html>