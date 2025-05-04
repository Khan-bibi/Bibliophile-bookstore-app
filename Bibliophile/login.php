<?php
include 'dbConnection.php';
session_start(); // Start the session to track login status

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Prepare the stored procedure call
    $sql = "{CALL CheckUserCredentials('$email', '$password')}";
    $stmt = odbc_exec($connection, $sql);
    $result = odbc_fetch_array($stmt);
    if (isset($result['ErrorMessage'])) {
        header("Location: index.php?error=true");
        exit();
    }
    if (isset($result['UserID']) && isset($result['Role'])) {
        $_SESSION['userId'] = $result['UserID'];
        $_SESSION['role'] = $result['Role'];
        if ($result['Role'] === 'Member') {
            header("Location: studentview.php");
            exit();
        } elseif ($result['Role'] === 'Admin') {
            header("Location: staffview.php");
            exit();
        }
    }
}
odbc_close($connection);
