<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
//include('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = []; // Initialize an error array.

	// Check for a first name:
	if (empty($_POST['Fname'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = trim($_POST['Fname']);
	}

	// Check for a last name:
	if (empty($_POST['Lname'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = trim($_POST['Lname']);
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = trim($_POST['email']);
	}

	// Check for a password and match against the confirmed password:
	if (!empty($_POST['password'])) {
		if ($_POST['password'] != $_POST['password2']) {
			$errors[] = 'Your password did not match the confirmed password.';
		} else {
			$p = trim($_POST['password']);
		}
	} else {
		$errors[] = 'You forgot to enter your password.';
	}

	if (empty($errors)) { // If everything's OK.

		// Register the user in the database...
//require('../mysqli_connect.php'); // Connect to the db.
require('mysqli_connect.php'); // Connect to the db.

		// Make the query:
		$hashed_password = hash('sha512', $p);
		$q = "INSERT INTO users (Fname, Lname, email, password, role) VALUES ('$fn', '$ln', '$e', '$hashed_password', 'user' )";
		$r = @mysqli_query($dbc, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you!</h1>
		<p>You are now registered. In Chapter 12 you will actually be able to log in!</p><p><br></p>';

		} else { // If it did not run OK.

			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

			// Debugging message:
			echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

		} // End of if ($r) IF.

		mysqli_close($dbc); // Close the database connection.

		// Include the footer and quit the script:
		//include('includes/footer.html');
		exit();

	} else { // Report the errors.

		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Please try again.</p><p><br></p>';

	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-info mt-5">
                <div class="card-header bg-info text-white"><i class="fas fa-user-plus"></i> Register</div>
                <div class="card-body">
                    <form action="regester.php" method="post">
                        <div class="form-group">
                            <label for="Fname"><i class="fas fa-user"></i> First Name:</label>
                            <input type="text" class="form-control" name="Fname" id="Fname" maxlength="20" value="<?php if (isset($_POST['Fname'])) echo $_POST['Fname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Lname"><i class="fas fa-user"></i> Last Name:</label>
                            <input type="text" class="form-control" name="Lname" id="Lname" maxlength="40" value="<?php if (isset($_POST['Lname'])) echo $_POST['Lname']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fas fa-lock"></i> Password:</label>
                            <input type="password" class="form-control" name="password" id="password" maxlength="20" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password2"><i class="fas fa-lock"></i> Confirm Password:</label>
                            <input type="password" class="form-control" name="password2" id="password2" maxlength="20" value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>">
                        </div>
                        <button type="submit" name="submit" class="btn btn-info"><i class="fas fa-user-plus"></i> Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>






