<?php
session_start();
include 'config.php';

if(!isset($_SESSION['UserID'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['book'])){

    $userid = $_SESSION['UserID'];
    $console_id = $_POST['console_id'];
    $booking_date = $_POST['booking_date'];
    $start_time = $_POST['start_time'];
    $duration = $_POST['duration'];

    $sql = "INSERT INTO booking
            (UserID, ConsoleID, BookingDate, StartTime, Duration)
            VALUES
            ('$userid','$console_id','$booking_date','$start_time','$duration')";

    if(mysqli_query($conn,$sql)){
        echo "<script>alert('Booking Successful');</script>";
    }else{
        echo "<script>alert('Booking Failed');</script>";
    }
}
?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Now</title>
    <style>
        body{
            background:#111;
            color:white;
            font-family:Poppins,sans-serif;
        }

        .booking-container{
            width:60%;
            margin:120px auto 50px auto;
            background:#1b1b1b;
            padding:40px;
            border-radius:10px;
        }

        h2{
            color:#c9a84c;
            text-align:center;
            margin-bottom:30px;
        }

        label{
            display:block;
            margin-top:15px;
            margin-bottom:5px;
        }

        input,select{
            width:100%;
            padding:12px;
            background:#222;
            border:1px solid #444;
            color:white;
            border-radius:5px;
        }

        button{
            width:100%;
            margin-top:25px;
            padding:15px;
            background:#c9a84c;
            border:none;
            font-size:16px;
            font-weight:bold;
            cursor:pointer;
        }

        button:hover{
            opacity:0.9;
        }
        .booking-content{
            display:flex;
            gap:30px;
            align-items:center;
        }
        .form-section{
            width:55%;
        }
        .image-section{
            width:45%;
        }
        .image-section img{
            width:100%;
            height:350px;
            object-fit:cover;
            border-radius:10px;
            border:2px solid #c9a84c;
        }
    </style>
</head>
<body>

<div class="booking-container">
    <h2>BOOK YOUR SESSION</h2>
    <form action="" method="POST">

    <div class="booking-content">

        <div class="form-section">

            <label>Select Console</label>
            <select name="console_id" id="consoleSelect" onchange="changeConsoleImage()">
                <option value="1">Console 1 - PS5</option>
                <option value="2">Console 2 - PS5</option>
                <option value="3">Console 3 - PS4</option>
                <option value="4">Console 4 - PS5</option>
                <option value="5">Console 5 - PS3 / Nintendo</option>
            </select>

            <label>Date</label>
            <input type="date" name="booking_date" required>

            <label>Start Time</label>
            <select name="start_time" required>
                <option value="10:00:00">10:00 AM</option>
                <option value="11:00:00">11:00 AM</option>
                <option value="12:00:00">12:00 PM</option>
                <option value="13:00:00">1:00 PM</option>
                <option value="14:00:00">2:00 PM</option>
            </select>

            <label>Duration (hours)</label>
            <input type="number" name="duration" min="1" max="4" required>

            <button type="submit" name="book">Book Now</button>

        </div>

        <div class="image-section">
            <img id="consoleImage" src="images/tv1.jpg" alt="console Setup">
        </div>
    </div>
</form>
</div>
<script>
function changeConsoleImage(){

    let console = document.getElementById("consoleSelect").value;
    let img = document.getElementById("consoleImage");

    if(console=="1"){
        img.src="images/tv1.jpg";
    }
    else if(console=="2"){
        img.src="images/tv2.jpg";
    }
    else if(console=="3"){
        img.src="images/tv3.jpg";
    }
    else if(console=="4"){
        img.src="images/tv4.jpg";
    }
    else if(console=="5"){
        img.src="images/tv5.jpg";
    }
}
</script>
</body>
</html>

<?php include 'footer.php'; ?>