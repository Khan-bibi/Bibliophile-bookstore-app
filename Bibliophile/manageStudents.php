<?php
session_start();
include 'dbConnection.php';

$sql = "{CALL getAllMembers}";
$stmt = odbc_exec($connection, $sql);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.png" type="image/png">
    <title>Manage Students</title>
    <link rel="stylesheet" href="manageStudents.css">
</head>

<body style="background-color:#8b570b">

    <!-- Include view nav bar -->
    <?php include 'viewnavbar.php'; ?>

    <!-- Include off canvas nav bar -->
    <?php include 'offcanvasnavbarstaff.php'; ?>

    <section class="manage-students">
        <div>
            <h1>Manage Students</h1>
        </div>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Edit Info</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = odbc_fetch_array($stmt)) {
                ?>
                <tr>
                    <td><?= $row['userName'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= Null ?></td>
                    <td><a href="deleteStudent.php?id=<?= $row['userID'] ?>"><button
                                class="btn-edit">Delete</button></a>
                    </td>
                    <td><button class="btn-delete">Edit</button></td>
                </tr>
                <?php
                } ?>

            </tbody>
        </table>
    </section>

    <!-- Edit Form Modal -->
    <div class="edit-form-container" id="editForm">
        <form class="edit-form">
            <h2>Edit Student Info</h2>
            <label for="studentName">Name</label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="studentRollNo">Roll No.</label>
            <input type="text" id="studentRollNo" name="studentRollNo" required>

            <label for="studentDepartment">Department</label>
            <input type="text" id="studentDepartment" name="studentDepartment" required>

            <button type="submit">Save Changes</button>
            <button type="button" id="closeForm">Close</button>
        </form>
    </div>

    <script>
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', () => {
            document.getElementById('editForm').classList.add('active');
        });
    });

    document.getElementById('closeForm').addEventListener('click', () => {
        document.getElementById('editForm').classList.remove('active');
    });
    </script>
</body>

</html>