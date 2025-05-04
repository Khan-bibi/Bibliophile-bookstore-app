<?php

session_start();
include 'dbConnection.php';
$userID = (int)$_SESSION['userId'];
$sql = "{CALL get_user_details( $userID )}";
$stmt = odbc_exec($connection, $sql);
$userDetails = odbc_fetch_array($stmt);
// print_r($userDetails)
?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="logo.png" type="image/png">
  <title>Staff Profile</title>

  <!-- Bootstrap CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="staffprofile.css">
</head>

<body>

  <!-- Include view nav bar -->
  <?php include 'viewnavbar.php'; ?>

  <!-- Include off canvas nav bar -->
  <?php include 'offcanvasnavbarstaff.php'; ?>

  <section class="profile-section">
    <div class="container">
      <h2
        style="color: #eedbce; font-family: 'vintagetext'; margin-bottom: 20px; font-size: 30px; transform:translateX(410px);">
        Staff Profile
      </h2>
      <div class="row justify-content-center">
        <!-- Profile Information -->
        <div class="col-md-8">
          <div class="profile-info">
            <p><strong>Staff ID:</strong></p>
            <p><strong>Name: <?= $userDetails["username"] ?></strong></p>
            <p><strong>Email: <?= $userDetails["email"] ?></strong></p>
            <p><strong>Contact Number:</strong></p>
            <p><strong>Department:</strong></p>
            <p><strong>Role</strong></p>
          </div>

          <!-- Action Buttons -->
          <div class="profile-actions mt-3 text-center">
            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#editProfileModal">Edit
              Profile</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="editName">Name</label>
              <input type="text" class="form-control" id="editName" value="Jane Smith">
            </div>
            <div class="form-group">
              <label for="editEmail">Email</label>
              <input type="email" class="form-control" id="editEmail" value="jane.smith@school.edu">
            </div>
            <div class="form-group">
              <label for="editContactNumber">Contact Number</label>
              <input type="text" class="form-control" id="editContactNumber" value="+123456789">
            </div>
            <div class="form-group">
              <label for="editDepartment">Department</label>
              <input type="text" class="form-control" id="editDepartment" value="English Literature">
            </div>
            <div class="form-group">
              <label for="role">Role:</label>
              <select class="form-control" id="role" required>
                <div class="roleofstaff">
                  <option value="librarian">Librarian</option>
                  <option value="admin">Admin</option>
                </div>
              </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #a75c1e; 
    border-color: #8b8c7a;
    color: #fff;">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>