<?php
if (isset($_GET['id'])) {
    include 'dbConnection.php';
    session_start();
    $bookId = (int)$_GET['id'];
    $userID = $_SESSION['userId'];
    $requestType = 'borrow';
    $sql = "{CALL insert_request($userID,$bookId,'$requestType')}";
    $stmt = odbc_exec($connection, $sql);
    // $borrow = odbc_fetch_array($stmt);
    if ($stmt) {
        header('location: singlebookstudent.php?id=' . $bookId . '&msg=success');
    }
}