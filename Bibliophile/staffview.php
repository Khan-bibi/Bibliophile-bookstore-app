<?php
session_start();
// if (!isset($_SESSION['logged_in'])) {
//     header("Location: index.php"); // Redirect to login page if not logged in
//     exit();
// }

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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link to the custom CSS file -->
    <link rel="stylesheet" href="staffview.css">
</head>

<body>

    <!-- Include view nav bar  -->
    <?php include 'viewnavbar.php'; ?>

    <!-- Include off canvas nav bar  -->
    <?php include 'offcanvasnavbarstaff.php'; ?>


    <!-- Hero Section -->
    <section class="hero-section"></section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>