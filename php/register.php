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
    margin:0;
    padding:20;
    background:#111;
    font-family:Poppins,sans-serif;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

#main{
    display:flex;
    width:750px;
    max-width:95%;
    background:#1b1b1b;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 0 25px rgba(201,168,76,0.3);
}

#left{
    width:50%;
}

#left img{
    width:100%;
    height:100%;
    object-fit:cover;
}

#right{
    width:50%;
    padding:25px;
    color:white;
}

#right h1{
    margin-bottom:25px;
    color:white;
}
#right b{
    color:#c9a84c;
}
label{
    display:block;
    margin-bottom:5px;
    font-size:14px;
}
input[type="text"],
input[type="email"],
input[type="password"]{
    width:100%;
    padding:8px;
    margin-bottom:15px;
    background:#111;
    border:1px solid #333;
    border-radius:6px;
    color:white;
    box-sizing:border-box;
}
input:focus{
    outline:none;
    border-color:#c9a84c;
}
.terms{
    margin:15px 0;
    font-size:14px;
}
#term{
    width:auto;
    margin-right:8px;
}
button{
    width:100%;
    padding:10px;
    background:#c9a84c;
    border:none;
    border-radius:6px;
    color:black;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}
button:hover{
    background:#e0bf63;
}
#login{
    text-align:center;
    margin-top:20px;
}
a{
    color:#c9a84c;
    text-decoration:none;
}
a:hover{
    text-decoration:underline;
}
@media(max-width:768px){
    #main{
        flex-direction:column;
    }

    #left{
        width:100%;
        height:250px;
    }

    #right{
        width:100%;
        padding:25px;
    }
}
    </style>
</head>
<body>
    <div id="main">
        <div id="left">
            <img src="images/regis.jpg" alt="">
        </div>
        <div id="right">
            <form method="post" enctype="multipart/form-data">
            <h1>Create an <b>Account</b></h1>
            <label for="Name">Full Name</label>
            <input type="text" name="name" id="">
            <label for="Email">Email Address</label>
            <input type="email" name="email" id="">
            <label for="Phone">Phone Number</label>
            <input type="text" name="phone" id="">
            <label for="Password">Password</label>
            <input type="password" name="password" id="">
            <label for="Cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id=""><br>
            <div class="terms">
                <input type="checkbox" name="terms" id="term" required>I agree with the Terms & Conditions
            </div>
            <button type="submit" name="submit">Register</button>
            <p id="login">Already have an account? <a href="login.php">Login Here</a></p>
        </form>
        </div>
    </div>
</body>
</html>