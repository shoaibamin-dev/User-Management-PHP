<?php
// Connect to the database
require('mysqli_connect.php');
// Check if the user ID is set in the query string
session_start();
$old_email = $_SESSION['email'];
echo $_SESSION['email'];
if (isset($_GET['email'])) {
    $old_email = $_GET['email'];
}
if (isset($old_email)) {

    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Get the form data
        $fname = mysqli_real_escape_string($dbc, $_POST['Fname']);
        $lname = mysqli_real_escape_string($dbc, $_POST['Lname']);
        $email = mysqli_real_escape_string($dbc, $_POST['email']);
        $role = mysqli_real_escape_string($dbc, $_POST['role']);

        // Hash the password using SHA512
        $password = hash('sha512', mysqli_real_escape_string($dbc, $_POST['password']));

        // Update the user information in the database
        $query = "UPDATE users SET Fname='$fname', Lname='$lname', email='$email', role='$role', password='$password' WHERE `email`='$old_email'";
        mysqli_query($dbc, $query);
        echo ("<script>alert('User Edited Successfully');
    
        window.location='admin_panel.php';
        </script>");
        // exit;
    }

    $query = "SELECT * FROM `users` WHERE `email`= '$old_email'";
    $result = mysqli_query($dbc, $query);
    $user = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="text-center"><span class="text-left">
            <form action="logout.php" class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Logout </a>
            </form>
        </span> </h1>
    <div class="container">
        <h1>Edit User</h1>
        <form method="post">
            <div class="form-group">
                <label for="Fname">First Name:</label>
                <input type="text" class="form-control" id="Fname" name="Fname" value="<?php echo $user['Fname']; ?>">
            </div>
            <div class="form-group">
                <label for="Lname">Last Name:</label>
                <input type="text" class="form-control" id="Lname" name="Lname" value="<?php echo $user['Lname']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
            </div>
            <div class="form-group">
                <label>New Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="role"><i class="fas fa-user"></i> Role:</label>
                <select class="form-control" name="role" id="role">
                    <option value="user" <?php if ($user['role'] == 'user')
                        echo 'selected'; ?>>User</option>
                    <option value="admin" <?php if ($user['role'] == 'admin')
                        echo 'selected'; ?>>Admin</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>

</body>

</html>