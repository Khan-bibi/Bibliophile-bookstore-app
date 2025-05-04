<?php
if (isset($_GET['id'])) {
    include 'dbConnection.php';
    session_start();
    $requestID = (int)$_GET['id'];
    $userID = (int)$_SESSION['userId'];
    $sql = "{CALL reject_request($requestID,$userID)}";
    $stmt = odbc_exec($connection, $sql);
    if ($stmt) {
        header('location: manageRequests.php?msg=requestRejected');
    }
} else {
    header('location: manageRequests.php');
    exit();
}