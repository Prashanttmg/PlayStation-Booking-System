<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE Email='$Email' AND Password='$Password'";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0) {
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
            background:#111;
            font-family:'Poppins',sans-serif;
        }
        #main{
            display:flex;
            width:75vw;
            min-height:75vh;
            height: auto;
            margin:60px auto;
            background:#1b1b1b;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 0 30px rgba(201,168,76,0.2);
        }

        #left{
            width:50%;
            position:relative;
        }

        #left img{
            width:100%;
            height:100%;
            object-fit:cover;
        }
        .overlay-text{
            position:absolute;
            bottom:40px;
            left:30px;
            color:white;
        }

        .overlay-text h2{
            color:#fff;
            font-size:32px;
            margin-bottom:10px;
        }

        .overlay-text p{
            color:#c9a84c;
            font-size:18px;
        }
        #right{
            width:50%;
            padding:50px;
            background:#1b1b1b;
            color:#e6e1d5;
            overflow-y:auto;
        }

        #logo{
            width:70px;
            height:70px;
            border-radius:50%;
            margin-bottom:15px;
        }

        h2{
            color:#c9a84c;
            font-size:40px;
            margin-bottom:10px;
        }

        label{
            display:block;
            margin-top:20px;
            margin-bottom:8px;
            font-weight:600;
        }

        input[type="email"],
        input[type="password"]{
            width:90%;
            padding:14px;
            background:#111;
            border:1px solid #333;
            border-radius:5px;
            color:white;
        }

        #check{
            width:auto;
            margin-top:20px;
            margin-right:8px;
        }

        button{
            width:90%;
            padding:14px;
            margin-top:25px;
            border:none;
            border-radius:5px;
            background:#c9a84c;
            color:black;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#d9b95d;
            transform:translateY(-2px);
        }

        #register{
            margin-top:25px;
            text-align:center;
        }

        a{
            color:#c9a84c;
            text-decoration:none;
        }

        a:hover{
            color:white;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="left">
            <img src="images/about.jpg" alt="Gaming Zone">
            <div class="overlay-text">
                <h2>NAMUZ PLAYSTATION</h2>
                <p>Play • Compete • Win</p>
            </div>
        </div>
        <div id="right" enctype="multipart/form-data">
            <h1><img src="images/logo.png" alt="logo" id="logo"></h1>
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