<?php
session_start();
include 'dbConnection.php';
$sql = "{CALL getAllCategories}";
$stmt = odbc_exec($connection, $sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Bibliophile</title>

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <style>
    .book-thumbnails img {
        width: 230px;
        height: 340px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .book-thumbnails img:hover {
        transform: scale(1.1);
        /* Slightly enlarge the image */
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        /* Add a shadow effect */
    }
    </style>
</head>

<body>


    <!-- Include Header -->
    <?php include 'header.php'; ?>

    <!--Hero Image 1 -->
    <section class="hero-section 1">
        <p class="hero-quote">"The more you read, the more things you will know. The more that you learn, the more
            places you will go."</p>
        <div class="hero-image">
            <img src="booksmain2.png" alt="Hero Image">
        </div>
    </section>


    <!-- Main Banner -->
    <!-- <section class="main-banner text-center py-5">
        <h1 class="mb-3">Top 3 Favourites This Month</h1>
        <div class="book-thumbnails d-flex justify-content-center">
            <img src="book1.jpg" alt="Book 1" class="mx-2">
            <img src="book2.jpg" alt="Book 2" class="mx-2">
            <img src="book3.jpg" alt="Book 3" class="mx-2">
        </div>
        <button href="#" data-toggle="modal" data-target="#loginModal" type="button"
            class="btn btn-outline-light">Borrow Now</button>
    </section> -->

    <!--Popular Books-->
    <section class="popular-books">
        <div class="container">
            <h2 class="text-center mb-4">Popular Books by Genre</h2>

            <!-- Carousel -->
            <div id="bookCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $active = true;
                    while ($category = odbc_fetch_array($stmt)) {

                        $categoryId = $category['categoryID'];
                        $sql1 = "{CALL get_top_books_by_category($categoryId)}";
                        $stmt1 = odbc_exec($connection, $sql1);


                    ?>
                    <div class="carousel-item <?= $active ? 'active' : '' ?>">
                        <h3><?= $category['categoryName'] ?></h3>
                        <div class="row">
                            <?php
                                $active = false;
                                while ($book = odbc_fetch_array($stmt1)) {
                                ?>
                            <div class="col-md-4">
                                <div class="book-card">
                                    <img src="https://via.placeholder.com/250x350" alt="Fiction Book 1">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $book['title'] ?></h5>
                                        <p class="card-text"><?= $book['author'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>


                        </div>
                    </div>


                    <?php } ?>


                </div>

                <!-- Carousel Controls -->
                <a class="carousel-control-prev" href="#bookCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#bookCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>