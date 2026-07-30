<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            text-decoration:none;
            font-family:'Poppins',sans-serif;
        }
        header{
            position:sticky;
            top:0;
            background:#222;
            padding:8px 30px;
            z-index:1000;
            font-weight: 550;
        }
        .navbar{
            display:flex;
            align-items:center;
        }
        .nav-left{
            margin-left: 200px;
        }
        .nav-left,
        .nav-right{
            display:flex;
            align-items:center;
            gap:30px;
        }
        .navbar a{
            color: #b8b1a0;
            font-size:15px;
            transition:0.3s;
        }
        .navbar a:hover{
            color:#ffd700;
        }
        .logo{
            margin:0 60px;
        }
        .logo img{
            height:55px;
            width:55px;
            border-radius:50%;
            transition:0.3s;
        }
        .logo img:hover{
            transform:scale(1.1);
        }
        .login{
            margin-left:auto;
        }
        .login-btn{
            background:#ffd700;
            color:black !important;
            padding:10px 25px;
            border-radius:6px;
            font-weight:600;
        }
        .login-btn:hover{
            background:white;
        }
        a:active{
            text-decoration:underline #ffd700;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="nav-left">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="games.php">Games</a>
                <a href="booking.php">Booking</a>
            </div>
            <div class="logo">
                <a href="index.php">
                    <img src="logo.png" alt="Namuz PlayStation">
                </a>
            </div>
            <div class="nav-right">
                <a href="tournaments.php">Tournament</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="login">
                <a href="login.php" class="login-btn">Login</a>
            </div>
        </nav>
    </header>
</body>
</html>