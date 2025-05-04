<?php
session_start();
include 'dbConnection.php';
$sql1 = "{CALL get_user_details(" . $_SESSION['userId'] . ")}";
$stmt1 = odbc_exec($connection, $sql1);
$userDetails = odbc_fetch_array($stmt1);

$sql = "{CALL GetBorrowedBooksByUser(" . $_SESSION['userId'] . ")}";
$stmt = odbc_exec($connection, $sql);


// print_r($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Student Profile</title>

    <!-- Bootstrap CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="studentprofile.css">


</head>

<body>

    <!-- Include view nav bar  -->
    <?php include 'viewnavbar.php'; ?>

    <!-- Include off canvas nav bar  -->
    <?php include 'offcanvasnavbarstudent.php'; ?>


    <section class="profile-section">

        <div class="container">
            <h2
                style=" color: #eedbce;font-family: 'vintagetext';margin-bottom: 20px;margin-left:400px;font-size:30px;">
                Student Profile</h2>
            <div class="row justify-content-center">
                <!-- Profile Information -->
                <div class="col-md-8">
                    <div class="profile-info">
                        <p><strong>Student ID:</strong></p>
                        <p><strong>Name: <?= $userDetails["username"] ?></strong></p>
                        <p><strong>Email: <?= $userDetails["email"] ?></strong></p>
                        <p><strong>Contact Number:</strong></p>
                        <p><strong>Department:</strong></p>
                        <p><strong>Batch:</strong></p>
                        <p><strong>Books Borrowed:</strong></p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="profile-actions mt-3 text-center">
                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#borrowedBooksModal">View
                            Borrowed Books</a>
                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#lateBooksModal">View Late
                            Books & Fines</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Borrowed Books Modal -->
    <div class="modal fade" id="borrowedBooksModal" tabindex="-1" aria-labelledby="borrowedBooksModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrowedBooksModalLabel">Borrowed Books</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="borrowedBooksList">
                        <?php

                        while ($book = odbc_fetch_array($stmt)) {
                        ?>
                        <li><?php echo ($book['bookTitle']) ?> by <?php echo ($book['bookAuthor']) ?><br><strong>Issue
                                Date:</strong>
                            <?php echo ($book['borrowDate']) ?>
                            <br><strong>Due Date:</strong> <?php echo ($book['dueDate']) ?><br>
                            <button class="btn btn-success mt-2"
                                onclick="window.location.href='returnBookLogic.php?id=<?= $book['bookID'] ?>'">Return
                                Book</button>
                            <button class="btn btn-success mt-2">Write a Review & Return
                                Book</button>
                        </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Late Books & Fines Modal -->
    <div class="modal fade" id="lateBooksModal" tabindex="-1" aria-labelledby="lateBooksModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lateBooksModalLabel">Late Books & Fines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="lateBooksList">
                        <?php

                        $sql1 = "{CALL CalculateLateFeeForUser(" . $_SESSION['userId'] . ")}";
                        $stmt1 = odbc_exec($connection, $sql1);
                        while ($fine = odbc_fetch_array($stmt1)) { ?>

                        <li><?= $fine['bookTitle'] ?> by <?= $fine['author'] ?><br><strong>Due Date:</strong>
                            <?= $fine['dueDate'] ?><br><strong>Days Overdue:</strong>
                            <?= $fine['overdueDays'] ?><br><strong>Fine:</strong>
                            $<?= $fine['lateFee'] ?>
                        </li>
                        <?php } ?>



                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Return Book Modal -->
    <!-- <div class="modal fade" id="returnBookModal" tabindex="-1" aria-labelledby="returnBookModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returnBookModalLabel">Return Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="bookReview">Optional Book Review</label>
                            <textarea class="form-control" id="bookReview" rows="3"
                                placeholder="Write a review..."></textarea>
                        </div>
                        <button type="submit" class="btn-submit">Submit Review & Return Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Bootstrap and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>