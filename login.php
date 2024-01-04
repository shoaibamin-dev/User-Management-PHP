
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Sign In</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                    <form action="login.php" method="post" class="login__registre" id="login-in">
                        <h1 class="login__title">Sign In</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" name='email' class="login__input">
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name ='password'class="login__input">
                        </div>


                        <button type="submit" class="login__button" style="width: 300px">Sign In</button>

                        <div>
                            <span class="login__account">Are you new user ?</span>
                            <span class="login__signin" id="sign-up"><a href="regester.php" >Sign up</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </body>

<?php
require('mysqli_connect.php');


// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the email and password from the form
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = hash('sha512', $password);

  // Prepare the SQL statement
	echo($hashed_password);
  $query = "SELECT * FROM users WHERE email = '$email' AND password ='$hashed_password' AND role='user'";

  // Check if the connection to the database was successful
  if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Execute the query and check for errors
  $result = mysqli_query($dbc, $query);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($dbc));
    exit();
  }

  // Check if the query returned any rows
  if (mysqli_num_rows($result) === 1) {
    session_start();
    $_SESSION['email'] = $email;
    echo "<script>alert('Logged in');         window.location='user_edit.php';    </script>";
    
  } else {
    // Authentication failed
    echo "<script>alert('Invalid email or password');</script>";
  }

  // Close the database connection
  mysqli_close($dbc);
}
?>

</html>