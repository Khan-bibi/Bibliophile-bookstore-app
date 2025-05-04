<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Member') {
    header("Location: index.php");
    exit();
}

// Prevent browser from caching the page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Bibliophile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="studentview.css"> <!-- Link to your custom CSS file -->
</head>

<body>

    <!-- Include view nav bar  -->
    <?php include 'viewnavbar.php'; ?>

    <!-- Include off canvas nav bar  -->
    <?php include 'offcanvasnavbarstudent.php'; ?>


    <!-- Hero Section -->
    <section class="hero2-section"></section>


    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>