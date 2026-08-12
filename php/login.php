<?php
session_start();
include 'config.php';

if(isset($_POST['login'])){

    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $sql = "SELECT UserID, FullName, Role
        FROM user
        WHERE Email='$Email'
        AND Password='$Password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['UserID'] = $row['UserID'];
        $_SESSION['Name'] = $row['FullName'];
        $_SESSION['Role'] = $row['Role'];

        if($row['Role'] == 'admin'){
            header("Location: admin_dashboard.php");
        }
        else{
            header("Location: index.php");
        }

        exit();

    } else {
        echo "<script>alert('Invalid Login');</script>";
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
            width:70vw;
            height:auto;
            min-height:60vh;
            margin:80px auto 40px auto;
            background:#1b1b1b;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 0 20px rgba(201,168,76,0.15);
        }
        #left{
            width:60%;
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
            font-size:24px;
            
        }

        .overlay-text p{
            color:#c9a84c;
            font-size:15px;
        }
        #right{
            width:40%;
            padding:30px 40px;
            background:#1b1b1b;
            color:#e6e1d5;
        }

        #logo{
            width:55px;
            height:55px;
            border-radius:50%;
            margin-bottom:10px;
        }
        h2{
            color:#c9a84c;
            font-size:28px;
            margin:10px 0;
        }

        label{
            display:block;
            margin-top:12px;
            margin-bottom:5px;
            font-weight:600;
            font-size:14px;
        }

        input[type="email"],
        input[type="password"]{
            width:90%;
            padding:10px;
            background:#111;
            border:1px solid #333;
            border-radius:5px;
            color:white;
        }

        #check{
            width:auto;
            margin-top:12px;
            margin-right:8px;
        }

        button{
            width:90%;
            padding:12px;
            margin-top:15px;
            border:none;
            border-radius:5px;
            background:#c9a84c;
            color:black;
            font-size:15px;
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
                <p>Play • laugh • Enjoy</p>
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
                <label for="Password">Password</label>
                <input type="password" name="password" placeholder="Enter your password"><br>
                <input type="checkbox" name="remember" id="check">Remember me <br>
                <button name="login" id="login">Login</button>
                <p id="register">Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </div>
</body>
</html>