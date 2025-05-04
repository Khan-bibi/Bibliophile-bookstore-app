<?php


include 'dbConnection.php';
session_start(); // Start the session to track login status

if (isset($_POST['submit'])) {

    // $userId = $_SESSION['userId'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $categoryID = (int)$_POST['category'];
    $isbn = $_POST['isbn'];
    $qty = (int)$_POST['qty'];
    $description = $_POST['description'];
    $thumbnail = $_FILES['thumbnail'];
    $name = $thumbnail['name'];
    $time = time();
    $nameInDB = $time . $name;
    $destinationPath = "./uploads/" . $nameInDB;
    $tmp_name = $thumbnail['tmp_name'];
    if (move_uploaded_file($tmp_name, $destinationPath)) {
        $sql = "{CALL addBook('$author', '$title','$description','$nameInDB',$qty,$qty)}";
        $stmt = odbc_exec($connection, $sql);

        $result = odbc_fetch_array($stmt, (int)$bookID);

        $bookID = (int)$result["bookID"];
        $sql = "{CALL addBookCategory($bookID,$categoryID)}";
        $stmt = odbc_exec($connection, $sql);
        $result = odbc_fetch_array($stmt);

        header('location: addBook.php?msg=success');
    }
} else {
    header('location: addBook.php?error=NOT A Request');
}