<?php
    session_start();
    if(!isset($_COOKIE["login"])){
        if(!isset($_SESSION["login"])){
           header('Location: login.php');
        }
        elseif($_SESSION['role']=='user'){
            header('Location: crawl.php');
        }
	}elseif($_COOKIE['role']=='user'){
        header('Location: crawl.php');
    }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <nav>
        <h4 class="logo active">Dashboard</h4>
        <ul class="nav-menu">
            <li>
                <a class="nav-links" href="crawl.php">Home</a>
            </li>
            <li>
                <a class="nav-links" href="add.php">Add</a>
            </li>
            <li>
                <a class="nav-links" href="javascript:modify();">Modify</a>
            </li>
            <li>
                <a href="logout.php" class="nav-links">logout</a>
            </li>
        </ul>
    </nav>

    <div id="data"></div>

    <script>
        function modify(){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("data").innerHTML = this.responseText;
                } 
            };
            xmlhttp.open("GET","modify.php",true);
            xmlhttp.send();
        }

        function deleteData(value){
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    modify();
                    console.log("deleted "+ value);
                } 
            };
            xmlhttp.open("GET","delete.php?name="+value,true);
            xmlhttp.send();
        }
    </script>
</body>
</html>