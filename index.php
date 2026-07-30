<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        .landing{
            height:100vh;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url("landing.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .content{
            color:white;
            text-align: center;
        }

        .content h1{
            font-family: 'Orbitron', sans-serif;
            font-size:80px;
            font-weight:900;
            text-transform:uppercase;
            letter-spacing:4px;
            margin-bottom:15px;
            text-shadow:0 0px 20px rgba(0,0,0,0.8);
        }

        .content p{
            font-size:28px;
            margin-bottom: 30px;
            color: yellow;
        }
        .GameButton button{
            padding:15px 35px;
            border:none;
            border-radius: 5px;
            background:#ffd700;
            color:#000;
            font-size:18px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }
        .GameButton button:hover{
            background:white;
            transform:translateY(-3px);
        }
    </style>
</head>
<body>
    <header><?php include 'header.php'; ?></header>
    <section class="landing">
        <div class="content">
            <h1>Namuz Playstation</h1>
            <p>Book your gaming session now</p>
            <div class="GameButton">
                <button>Explore our games</button>
            </div>
        </div>
    </section>
    <footer><?php include 'footer.php'; ?></footer>
</body>
</html>