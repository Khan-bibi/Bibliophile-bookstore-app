<!-- viewnavbar.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Bibliophile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="viewnavbar.css">

</head>
<body>

<nav class="navbar navbar-light ">
    <div class="container-fluid">
        <button class="menu-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
            <img src="menu-svgrepo-com.svg" alt="menu" class="menu-icon">
        </button>
        <h1 class="navbar-brand">Bibliophile</h1>
        <button class="custom-btn" onclick="window.location.href='logout.php'">LogOut</button>
    </div>
</nav>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

