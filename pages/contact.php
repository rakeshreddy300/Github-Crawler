<?php
    include_once('connection.php');
    session_start();
	if(!isset($_COOKIE["login"])){
        if(!isset($_SESSION['login'])){
            header('Location: login.php');
        }
        
    }

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    // Load Composer's autoloader
    require '../vendor/autoload.php';

    if(isset($_POST['send-mail'])){
        $first = $_POST['username'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $mail = new PHPMailer(true);
        try{
            $mail->IsSMTP();
            $mail->SMTPDebug  = 0;  
            $mail->SMTPAuth   = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port       = 587;
            $mail->Host       = "smtp.gmail.com";
            $mail->Username   = "testmail@domain.com";  //email to be sent from //
            $mail->Password   = "testmail-password";  //email password //

            $mail->IsHTML(true);
            $mail->AddAddress("addaddressmail", "add-address name");  /*mention the email id and name to add to mail */
            $mail->SetFrom("setfrommailid", "IMDbCrawler"); /*mention the email id to be sent from and name */
            $mail->Subject = "IMDbCrawler Contact Form";
            $content = "<p>First Name: $first <br> Email: $email <br>Message: $message </p>";

            $mail->MsgHTML($content); 
            $mail->send();
            echo "<script>alert('Email Sent Successfully!');</script>";
            
        }catch(Exception $e){
            echo "<script>alert('Email Wasn't Sent | Some error occured');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Contact</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body{
            background-color: rgba(15,48,42,1);
            color: white;
            font-family: lato;
        }

        .clearfix{
            display: table;
            clear: both;
        }



        .form{
            min-width:100px;
            width:450px;
            margin: 50px auto;
            text-align: center;

        }

        .form div{
            margin: 15px;
        }

        .form button{
            margin: 15px;
            padding:5px;
            height: 30px;
            /* width:60px; */
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
    </style>
</head>
<body>
    <nav>
        <h4 class="logo">Github</h4>
        <ul class="nav-menu">
            <li>
                <a class="nav-links" href="crawl.php">Home</a>
            </li>
            <li>
                <a class="nav-links" href="contact.php">Contact</a>
            </li>
            <li>
                <a class="nav-links active" href="about.php">About</a>
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
    <div class="form">
        <form name="f1" action="contact.php" onsubmit="return validation()" method="POST">
            <h4>Reach Us for more info</h4>
            <div class="username"> 
                <label>Name: </label>
                <input type="text" id="username" name="username" />
            </div>
            <div class="email">
                <label>Email: </label>
                <input type="email" id="email" name="email" />
            </div>
            <div class="message">
                <label for="message">Message: </label>
                <textarea id="message" name="message" rows="3" cols="30"></textarea>
            </div>
            <input type="submit" id="btn" name="send-mail" value="Send mail!" />
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