<?php
session_start();

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

<h1 class="text-center">Welcome <?php echo $_SESSION['username'] ?>  <span class="text-left"> <a href="logout.php" class="btn btn-primary">Logout </a></span> </h1>


<div class="container mt-5">

<?php


if (isset($_SESSION['username'])) {
    
require('mysqli_connect.php');

$query = "SELECT * FROM users";

if(isset($_GET['query']) && $_GET['query'] != ''){
    $uid = $_GET['query'];
    $query = $query.' where UID ='.$uid;  
}

$result = mysqli_query($dbc, $query);


// Store the query results in an array
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo '<form action="admin_panel.php" method="get">
<input class="w-75" type="text" name="query" placeholder="search by user id, leave empty and click seach for all users"/>
<input class="btn btn-primary" type="submit" value="Search" />
</form>';

echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th>User ID</th>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Email</th>';
echo '<th>Role</th>';
echo '<th>Actions</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($rows as $row) {
    echo '<tr>';
    echo '<td>' . $row['UID'] . '</td>';
    echo '<td>' . $row['Fname'] . '</td>';
    echo '<td>' . $row['Lname'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['role'] . '</td>';
    echo '<td>';
    echo '<a href="user_edit.php?email=' . $row['email'] . '" class="btn btn-primary">Edit</a>';
    echo '<a href="user_delete.php?id=' . $row['UID'] . '" class="btn btn-danger">Delete</a>';
    echo '</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';

}
else {
    echo ' you are not logged in as admin, please log in first !';
}
?>
</div>


</div>

</body>
</html>
