<?php
include 'dbConnection.php';
session_start(); // Start the session to track login status


$sql = "{CALL getAllCategories}";
$stmt = odbc_exec($connection, $sql);

?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">

    <title>Add Book</title>
    <link rel="stylesheet" href="addBook.css"> <!-- Link to custom CSS file -->

</head>

<body style="background-color:#8b570b">

    <!-- Include view nav bar -->
    <?php include 'viewnavbar.php'; ?>

    <!-- Include off canvas nav bar -->
    <?php include 'offcanvasnavbarstaff.php'; ?>

    <section class="manage-students py-2 mt-3 px-5">
        <div>
            <h1 class="text-center my-2" style="color:#4a3311;">Add Book</h1>
        </div>
        <div class="d-flex align-items-center justify-content-center">

            <form class="col-md-8" action="./addBookLogic.php" method="post" enctype="multipart/form-data">
                <div class="d-flex flex-column gap-3">
                    <!-- Title and Author -->
                    <div class="form-group">
                        <label for="book-title">Book Title:</label>
                        <input type="text" id="book-title" placeholder="Enter book title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="author-name">Author Name:</label>
                        <input type="text" id="author-name" placeholder="Enter author name" name="author">
                    </div>

                    <!-- File Upload and Category -->
                    <div class="form-group">
                        <label for="book-cover">Upload Book Cover:</label>
                        <input type="file" id="book-cover" name="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="book-category">Category:</label>
                        <select id="book-category" name="category">
                            <option disabled selected>Select Category</option>
                            <?php while ($categories = odbc_fetch_array($stmt)) { ?>

                            <option value="<?= $categories["categoryID"] ?>"><?= $categories["categoryName"] ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <!-- ISBN and Quantity -->
                    <div class="form-group">
                        <label for="book-isbn">Book ISBN:</label>
                        <input type="text" id="book-isbn" placeholder="Enter book ISBN" name="isbn">
                    </div>
                    <div class="form-group">
                        <label for="book-quantity">Quantity:</label>
                        <input type="text" id="book-quantity" placeholder="Enter quantity" name="qty">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="book-description">Book Description:</label>
                        <textarea id="book-description" cols="10" rows="5" placeholder="Enter book description"
                            name="description"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" name="submit">Add Book</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

</body>

</html>