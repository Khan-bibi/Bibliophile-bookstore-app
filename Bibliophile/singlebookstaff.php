<?php

include 'dbConnection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "{CALL getBookDetails($id)}";
    $stmt = odbc_exec($connection, $sql);
    $book = odbc_fetch_array($stmt);
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Book Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="singlebookstaff.css">
    <script>
    function toggleEditForm() {
        var form = document.getElementById('editForm');
        if (form.style.display === 'none' || form.style.display === '') {
            form.style.display = 'block';
        } else {
            form.style.display = 'none';
        }
    }
    </script>
</head>

<body style="background-color:#8b570b;">
    <!-- Navbar inclusion -->
    <?php include 'viewnavbar.php'; ?>
    <?php include 'offcanvasnavbarstaff.php'; ?>

    <!-- Single Book Page for Staff -->
    <div class="single-book">
        <div class="book-card">
            <div class="image-container">
                <img src="book1.jpg" alt="Book Cover">
            </div>
            <div class="details-container">
                <h2 class="book-title"><?= $book['title'] ?></h2>
                <p class="book-author">By <?= $book['author'] ?></p>
                <p class="book-description" id="bookDescription">
                    <?= $book['description'] ?>
                </p>
                <div class="action-buttons">
                    <button class="remove-button">Remove</button>
                    <button class="edit-button" onclick="toggleEditForm()">Edit Description</button>
                </div>
                <a href="booksstaff.php" class="back-button">Back to Catalog</a>

                <!-- Edit Description Form -->
                <form id="editForm" class="edit-form">
                    <label for="newDescription">Edit Description:</label>
                    <textarea id="newDescription"><?= $book['description'] ?></textarea>
                    <button type="button" onclick="saveDescription()">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    function saveDescription() {
        var newDescription = document.getElementById('newDescription').value;
        document.getElementById('bookDescription').innerText = newDescription;
        toggleEditForm();
    }
    </script>
</body>

</html>