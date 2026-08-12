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
            position:fixed;
            top:0;
            left: 0;
            width: 100%;
            background:rgba(0, 0, 0, 0.78);
            backdrop-filter:blur(5px);
            padding:12px 30px;
            z-index:1000;
            font-weight:550;
            transition:all 0.3s ease;
        }

        header.scrolled{
            padding:4px 35px;
        }

        header.scrolled .logo img{
            height:44px;
            width:44px;
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
            color:#c9a84c;
        }
        .logo{
            margin:0 60px;
        }
        .logo img{
            height:60px;
            width:60px;
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
            background:#222;
            border: 2px solid #c9a84c;
            color:white !important;
            padding:10px 25px;
            border-radius:15px;
            font-weight:600;
        }
        .login-btn:hover{
            background:#c9a84c;
        }
        a:active{
            text-decoration:underline #c9a84c;
        }
    </style>
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="nav-left">
                <a href="index.php">Home</a>
                <a href="index.php#about">About</a>
                <a href="index.php#games">Games</a>
                <a href="index.php#Console">Console</a>
            </div>
            <div class="logo">
                <a href="index.php">
                    <img src="images/logo.png" alt="Namuz PlayStation">
                </a>
            </div>
            <div class="nav-right">
                <a href="booking.php">Booking</a>
                <a href="tournaments.php">Tournament</a>
                <a href="contact.php">Contact</a>
            </div>
            <div class="login">
                <a href="login.php" class="login-btn">Login</a>
            </div>
        </nav>
    </header>
    <script>
const header = document.querySelector('.header');
window.addEventListener('scroll', () => {
    if(window.scrollY > 50){
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});
</script>
</body>
</html>