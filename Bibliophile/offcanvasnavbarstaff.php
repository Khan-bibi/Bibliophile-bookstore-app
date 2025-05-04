<!-- offcanvasnavbar.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Bibliophile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="offcanvasnavbar.css">

</head>
<body>

<!-- Off-Canvas Menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
        <li><button onclick="window.location.href='staffview.php'">Home</button></li>
        <li><button onclick="window.location.href='staffprofile.php'">View Profile</button></li>
            <li><button onclick="window.location.href='manageStudents.php'">Manage Student</button></li>
            <li><button onclick="window.location.href='booksstaff.php'">Manage Book</button></li>
            <li><button onclick="window.location.href='addBook.php'">Add Book</button></li>
            <li><button onclick="window.location.href='manageRequests.php'">Manage Requests</button></li>
        </ul>
    </div>
</div>


<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>