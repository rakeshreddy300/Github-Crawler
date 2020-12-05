<?php
    $username = $_GET['name'];
    include_once('connection.php');
    $sql = "DELETE FROM login where username='$username'";
    mysqli_query($con,$sql);

?>