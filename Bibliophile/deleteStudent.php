<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header('location: manageStudents.php');
    exit();
}