<?php
include 'config.php';

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password != $cpassword)
    {
        echo "<script>alert('Passwords do not match');</script>";
    }
    else
    {
        $check = mysqli_query($conn,
        "SELECT * FROM user WHERE Email='$email'");
        if(mysqli_num_rows($check) > 0)
        {
            echo "<script>alert('Email already exists');</script>";
        }
        else
        {
            mysqli_query($conn,"
            INSERT INTO user
            (FullName, Email, Password, Phone, Role)
            VALUES
            ('$name','$email','$password','$phone','user')
            ");

            echo "<script>
                alert('Registration Successful');
                window.location='login.php';
            </script>";
        }
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
            width:55%;
            height:100%;
            border-radius: 10px;
        }
        #right{
            padding-left: 50px;
            width:50%;
            background: #222;
            color: #c4bdac;
            border-radius: 10px; 
        }
        input{
            width:80%;
            height:20px;
            margin-bottom: 20px;
        }
        #term{
            width:auto;
            height: auto;
        }
        button{
            background-color:#c9a84c;
            border: 1px solid #c9a84c;
            color:white;
            width:80%;
            height: 40px;
        }
        button:hover{
            background-color: #f8cb4f;
        }
        a{
            color: #7e7cbb7a;
        }
        a:hover{
            color: white;
        }
        b{
            color: #c9a84c;
        }
        #login{
            margin-left: 50px;
        }
    </style>
</head>
<body>
    <div id="main">
        <div id="left">
            <img src="dog.jpeg" alt="">
        </div>
        <div id="right">
            <form method="post" enctype="multipart/form-data">
            <h1>Create an <b>Account</b></h1>
            <label for="Name">Full Name</label><br>
            <input type="text" name="name" id=""><br>
            <label for="Email">Email Address</label><br>
            <input type="email" name="email" id=""><br>
            <label for="Phone">Phone Number</label><br>
            <input type="text" name="phone" id=""><br>
            <label for="Password">Password</label><br>
            <input type="password" name="password" id=""><br>
            <label for="Cpassword">Confirm Password</label><br>
            <input type="password" name="cpassword" id=""><br>
            <input type="checkbox" name="terms" id="term">I agree with the Terms & Conditions <br>
            <button type="submit" name="submit">Register</button>
            <p id="login">Already have an account? <a href="login.php">Login Here</a></p>
        </form>
        </div>
    </div>
</body>
</html>