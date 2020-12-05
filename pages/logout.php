<?php
    session_start();
    setcookie("login","true",time() - 3600);
    setcookie("role",$row['role'], time() - 3600);
    session_destroy();
    header('Location: login.php');

?>