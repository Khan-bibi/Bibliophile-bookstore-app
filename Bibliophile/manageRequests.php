<?php

include 'dbConnection.php';
session_start(); // Start the session to track login status
$sql = "{CALL GetPendingRequests}";
$stmt = odbc_exec($connection, $sql);



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">

    <title>Manage Requests</title>
    <link rel="stylesheet" href="manageRequests.css"> <!-- Link to custom CSS file -->

</head>

<body style="background-color:#8b570b">

    <!-- Include view nav bar -->
    <?php include 'viewnavbar.php'; ?>

    <!-- Include off canvas nav bar -->
    <?php include 'offcanvasnavbarstaff.php'; ?>

    <section class="manage-requests">
        <div>
            <h1>Manage Requests</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Student Roll#</th>

                    <th>Request Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($request = odbc_fetch_array($stmt)) {

                ?>
                <tr>
                    <td><?= $request['BookTitle'] ?></td>
                    <td><?= $request['UserName'] ?></td>

                    <td><?= $request['requestType'] ?></td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn-approve"
                                onclick="window.location.href='approveRequest.php?id=<?= $request['requestID'] ?>'">Approve</button>
                            <button class="btn-reject"
                                onclick="window.location.href='rejectRequest.php?id=<?= $request['requestID'] ?>'">Reject</button>
                        </div>
                    </td>
                </tr>


                <?php } ?>



            </tbody>
        </table>
    </section>

</body>

</html>