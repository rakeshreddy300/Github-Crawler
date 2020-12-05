<?php
    include_once('connection.php');
    session_start();
	if(!isset($_COOKIE["login"])){
        if(!isset($_SESSION['login'])){
            header('Location: login.php');
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Crawl</title>
</head>
<body>
    <nav>
        <h4 class="logo">Github</h4>
        <ul class="nav-menu">
            <li>
                <a class="nav-links active" href="crawl.php">Home</a>
            </li>
            <li>
                <a class="nav-links" href="contact.php">Contact</a>
            </li>
            <li>
                <a class="nav-links" href="about.php">About</a>
            </li>

            <?php
                if(isset($_COOKIE['login'])){
                    if($_COOKIE['role']== 'user' || $_SESSION['role'] == 'user'){
                        echo "          <li>
                        <a class='nav-links' href='logout.php'>logout</a>
                    </li>";
                    }else{
                        echo "          <li>
                        <a class='nav-links' href='admin.php'>Dashboard</a>
                    </li>";
                    }
                }else{
                    if($_SESSION['role'] == 'user'){
                        echo "          <li>
                        <a class='nav-links' href='logout.php'>logout</a>
                    </li>";
                    }else{
                        echo "          <li>
                        <a class='nav-links' href='admin.php'>Dashboard</a>
                    </li>";
                    }
                }
            ?>
      
        </ul>
    </nav>
    <div class="clearfix"></div>
    <form>
        <div class="form">
            <label for="num">Enter the username to get data</label>
            <input type="text" id="num" name="num"><br>
            <button type="button" onclick="getData(num.value)">Get Results!</button>
        </div>

    </form>
    <table class="table" id="table">


    </table>

    <script src="script.js">

    </script>
</body>
</html>