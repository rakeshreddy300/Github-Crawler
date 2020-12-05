<?php
    include_once('connection.php');
    session_start();
    $err = "";
    if(!isset($_COOKIE["login"])){
        if(isset($_SESSION["login"])){
            if($_SESSION['role']=='user'){
                header('Location: crawl.php');
            }elseif($_SESSION['role']=='admin'){
                header('Location: admin.php');
            }
        }
	}elseif($_COOKIE['role']=='user'){
        header('Location: crawl.php');
    }elseif($_COOKIE['role']=='admin'){
        header('Location: admin.php');
    }
	if(!empty($_POST["username"])){
		$username=$_POST['username'];
		$password=sha1($_POST['password']);
		$email=$_POST['email'];
		$sql = "SELECT * FROM login WHERE username='$username' or email='$email'";
		$res = mysqli_query($con, $sql);
		$count = mysqli_num_rows($res);
		if(!$count){
			$sql1 = "INSERT INTO login(username,password,email,role)
			VALUES ('$username','$password','$email','user')";
			if(mysqli_query($con,$sql1)){
				header('Location: login.php');
			}
			else{
				die(mysqli_error());
			}
		}
		else{
			$err = "username/email already exists";
		}
		
	}
?>
<!DOCTYPE html>
<html>
	<head>
        <title>register</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">


        <style>
            *{
                padding:0;
                margin:0;
                box-sizing: border-box;
            }

            body{
                font-size:62.5%;
                background-color: rgba(15,48,42,1);
                color: white;
                font-family: lato;
            }

            .clearfix{
                display: table;
                clear: both;
            }

            nav{
                float: left;
                min-height: 12vh;
                background: #181716;
                display: flex;
                flex-wrap: wrap;
                width: 100%;
            }
                
            nav h4{
                flex: 1 1 0rem;
                color: white;
                font-weight: bold;
                text-align: center;
                padding: 0.8rem;
                font-size: 2rem;
            }

            nav ul{
                flex: 5 1 30rem;
                padding: 0.8rem;
                display: flex;
                justify-content: flex-end;
                font-size: 1.3rem;
            }

            nav ul li{    
                list-style: none;
                align-self: center;
                align-content: center;
            }
                
            nav ul li a{
                text-decoration: none;
                color: white;
                border-radius: 0.1rem;
                padding: 0.4rem 0.9rem;
            }

            nav ul li a.active{
                background: white;
                color:#181716;
            }

            nav ul li a:hover{
                background: rgb(58, 58, 58);
                color: rgb(228, 228, 228);
            }


            .form{
                font-size: 1.6rem;
                width: 50rem;
                margin:0 auto;
                text-align:center;
            }

            .form input[type='text'],input[type='password']{
                height:2rem;
                width:10rem;
                border:none;
                border-bottom:2px solid red;
                background-color:rgba(15,48,42,1);
                color: white;

            }

            .form label{
                display: inline-block;
                width: 15rem;
                text-align:center;
            }

            .form div{
                margin:10px;
                vertical-align: center;
            }

            .form .error{
                color: orange;
                font-size: 14px;
            }
        </style>
	</head>

	<body>
        <nav>
            <h4 class="logo">Github</h4>
            <ul class="nav-menu">
            <li>
                <a class="nav-links active" href="register.php">Register</a>
            </li>
            <li>
                <a class="nav-links" href="Login.php">Login</a>
            </li>
        
            </ul>
        </nav>
        <div class="clearfix"></div>
        <div class="form">
            <form name="f1" method="POST" action="register.php" onsubmit='return validation()'>
                <div class="username">
                    <label for="username">Username: </label>
                    <input type="text" id="username" name="username" />
                </div>
                <div class="password">
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password">
                </div>
                <div class="email">
                    <label for="email">Email: </label>
                    <input type="text" id="email" name="email">
                </div>
                <button type="submit">Register!</button><br>
                <span class="error"><?php echo $err?></span>
            </form>

        </div>
		<script>
			function validation(){
				var id=document.f1.username.value;
				var ps=document.f1.password.value;
				var ph=document.f1.phone.value;
				if( id.length == 0 || ps.length == 0 || ph.length == 0){
					alert("fill all the details");
					return false;
				}
				return true;
			}
		</script>
	
	</body>

</html>