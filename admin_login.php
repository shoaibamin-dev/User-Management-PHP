
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>Admin Sign In</title>
    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/img-login.svg" alt="">
                </div>

                <div class="login__forms">
                     <form action="admin_login.php" method="post" class="login__registre">
                        <h1 class="login__title">Admin Sign In</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" placeholder="Email" name='email' class="login__input">
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" placeholder="Password" name='password' class="login__input">
                        </div>


                        <button type="submit" class="login__button" style="width: 300px">Sign In</button>
                       
                    </form>
                </div>
            </div>
        </div>

</script>

    </body>


<?php
require('mysqli_connect.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the email and password from the form
  $email = $_POST['email'];
  $password = $_POST['password'];

  echo $email;
  echo $password;
//database query
  $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' AND role='admin'";
  
  //  connection to the database was successful
  if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // query and check for errors
  $result = mysqli_query($dbc, $query);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($dbc));
    exit();
  }

  //  query returned any rows
  if (mysqli_num_rows($result) === 1) {
    // Authentication successful
	  
    session_start();


    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['Fname'].' '.$row['Lname'] ;
    $_SESSION['email'] = $email;

    
	 echo("<script>alert('Looged in')</script>");

  header("Location:admin_panel.php");
  } 
	
	else {
    // Display an error message
	echo("<script>alert('Invalid email or password')</script>");
  }
}

mysqli_close($dbc);
?>

</html>