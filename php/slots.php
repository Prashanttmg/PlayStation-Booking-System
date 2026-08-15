<?php
include 'config.php';

$message = "";

if(isset($_POST['save']))
{
    $day = $_POST['day'];
    $time = $_POST['timeslot'];
    $status = $_POST['status'];
    $bookedby = $_POST['bookedby'];

    mysqli_query($conn,"
    UPDATE slots
    SET Status='$status',
        BookedBy='$bookedby'
    WHERE DayName='$day'
    AND TimeSlot='$time'
    ");

    $message = "
    <div class='success'>
        <h3>Booking Saved</h3>
        <p><b>Day:</b> $day</p>
        <p><b>Time:</b> $time</p>
        <p><b>Name:</b> $bookedby</p>

        <form method='POST'>
            <input type='hidden' name='day' value='$day'>
            <input type='hidden' name='timeslot' value='$time'>

            <button type='submit' name='remove'>
                Remove Booking
            </button>
        </form>
    </div>";
}

if(isset($_POST['remove']))
{
    $day = $_POST['day'];
    $time = $_POST['timeslot'];

    mysqli_query($conn,"
    UPDATE slots
    SET Status='Available',
        BookedBy=''
    WHERE DayName='$day'
    AND TimeSlot='$time'
    ");

    $message = "
    <div class='success'>
        <h3>Booking Removed</h3>
        <p>$day - $time is now available.</p>
    </div>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Slots</title>

<style>

body{
    margin:0;
    background:#111;
    color:white;
    font-family:Poppins,sans-serif;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#1b1b1b;
    position:fixed;
    left:0;
    top:0;
    padding:20px;
}

.sidebar h2{
    color:#c9a84c;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    margin:15px 0;
}

.sidebar a:hover{
    color:#c9a84c;
}

.main{
    margin-left:260px;
    padding:30px;
}

h2{
    color:#c9a84c;
}

.slot-form{
    display:flex;
    flex-wrap:wrap;
    gap:15px;
    margin-top:20px;
}

.slot-form select,
.slot-form input{
    padding:10px;
    min-width:180px;
    border:none;
    border-radius:5px;
}

button{
    background:#c9a84c;
    color:black;
    border:none;
    padding:10px 18px;
    border-radius:5px;
    cursor:pointer;
    font-weight:bold;
}

button:hover{
    background:#e0bf63;
}

.success{
    margin-top:25px;
    background:#1b1b1b;
    border:1px solid #c9a84c;
    padding:20px;
    border-radius:10px;
    max-width:450px;
}

.success h3{
    color:#c9a84c;
    margin-bottom:10px;
}

.success p{
    margin:8px 0;
}

</style>
</head>

<body>

<div class="sidebar">
    <h2>Admin</h2>

    <a href="admin_dashboard.php">Dashboard</a>
    <a href="manage_users.php">Users</a>
    <a href="slots.php">Slots</a>
    <a href="manage_tournaments.php">Tournaments</a>
    <a href="logout.php">Logout</a>
</div>

<div class="main">

    <h2>Manage Slots</h2>

    <form method="POST" class="slot-form">

        <select name="day" required>
            <option value="">Select Day</option>
            <option value="Mon">Mon</option>
            <option value="Tue">Tue</option>
            <option value="Wed">Wed</option>
            <option value="Thu">Thu</option>
            <option value="Fri">Fri</option>
            <option value="Sat">Sat</option>
            <option value="Sun">Sun</option>
        </select>

        <select name="timeslot" required>
            <option value="">Select Time Slot</option>
            <option value="12 PM - 1 PM">12 PM - 1 PM</option>
            <option value="1 PM - 2 PM">1 PM - 2 PM</option>
            <option value="2 PM - 3 PM">2 PM - 3 PM</option>
            <option value="3 PM - 4 PM">3 PM - 4 PM</option>
            <option value="4 PM - 5 PM">4 PM - 5 PM</option>
            <option value="5 PM - 6 PM">5 PM - 6 PM</option>
            <option value="6 PM - 7 PM">6 PM - 7 PM</option>
            <option value="7 PM - 8 PM">7 PM - 8 PM</option>
            <option value="8 PM - 9 PM">8 PM - 9 PM</option>
        </select>

        <select name="status">
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
        </select>

        <input
            type="text"
            name="bookedby"
            placeholder="Customer Name"
        >

        <button type="submit" name="save">
            Save Booking
        </button>

    </form>

    <?php echo $message; ?>

</div>

</body>
</html>