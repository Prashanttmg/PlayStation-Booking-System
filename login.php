<?php
session_start();
$conn = mysqli_connect("localhost","root","","playstation");

if(isset($_POST['login'])){
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE Email='$Email' AND Password='$Password'";
    $result = mysqli_query($conn,$sql);

    if($result > 0) {
        $_SESSION['login']='TRUE';
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid Login";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background: #222;
        }
        #main{
            display: flex;
            flex-direction: row;
            width:60vw;
            height:70vh;
            margin-left:20vw;
            margin-right: 20vw;
            margin-top: 15vh;
            margin-bottom: 15vh;
            border-radius: 10px;
            box-shadow: 5px 5px 30px 0px #84820e4a;
        }
        img{
            width:100%;
            height:100%;
            border-radius: 10px 0px 0px 10px;
        }
        #left{
            width:50%;
            height:100%;
            border-radius: 10px;
        }
        #right{
            padding-left: 50px;
            width:50%;
            background-color: white;
            border-radius: 10px; 
            background: #222;
            color: #c4bdac;
        }
        label{
            font-weight: bold;
        }
        input{
            width:80%;
            height:30px;
            margin-bottom: 20px;
            margin-top: 10px;
        }
        #check{
            width:auto;
            height: auto;
            color: #c9a84c;
            border: 1px solid #c9a84c;
        }
        button{
            background-color:#c9a84c;
            border: 1px solid #c9a84c;
            color:white;
            width:80%;
            height: 40px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        button:hover{
            background-color: #f8cb4f;
        }
        #register{
            margin-left: 50px;
        }
        a{
            color: #5857b97a;
        }
        a:hover{
            color: white;
        }
        #logo{
            height:55px;
            width:55px;
            border-radius:50%;

        }
    </style>
</head>
<body>
    <div id="main">
        <div id="left">
            <img src="a.jpeg" alt="">
        </div>
        <div id="right" enctype="multipart/form-data">
            <h1><img src="logo.png" alt="logo" id="logo"></h1>
            <form action="" method="POST">
                <h2>Welcome Back!</h2>
                <p>Login to continue</p> 
                <label for="Email">Email Address</label> 
                <input type="email" name="email" placeholder="Enter your email">
                <br>
                <label for="Password">Password</label><br>
                <input type="password" name="password" placeholder="Enter your password"><br>
                <input type="checkbox" name="remember" id="check">Remember me <br>
                <button name="login" id="login">Login</button>
                <p id="register">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>