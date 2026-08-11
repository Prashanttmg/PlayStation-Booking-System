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
            margin:50px auto;
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
    </style>
</head>
<body>

<div class="booking-container">

    <h2>BOOK YOUR SESSION</h2>

    <form action="" method="POST">

        <label>Console</label>
        <select name="console">
            <option>PS5</option>
            <option>PS4</option>
            <option>Nintendo Switch</option>
        </select>

        <label>Date</label>
        <input type="date" name="booking_date">

        <label>Time Slot</label>
        <select name="time_slot">
            <option>10:00 AM - 11:00 AM</option>
            <option>11:00 AM - 12:00 PM</option>
            <option>12:00 PM - 1:00 PM</option>
            <option>1:00 PM - 2:00 PM</option>
            <option>2:00 PM - 3:00 PM</option>
        </select>

        <label>Number of Players</label>
        <input type="number" name="players" min="1" max="4">

        <button type="submit" name="book">Book Now</button>

    </form>

</div>

</body>
</html>

<?php include 'footer.php'; ?>