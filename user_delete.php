<?php
require('mysqli_connect.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE `UID` = $id";
    mysqli_query($dbc, $query);

    echo("<script>alert('User Deleted Successfully');
    
    window.location='admin_panel.php';
    </script>");

   
    
}

?>