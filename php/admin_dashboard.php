<?php
session_start();
include 'config.php';

if(!isset($_SESSION['Role']) || $_SESSION['Role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$user_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));
$booking_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM booking"));
$tournament_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tournament"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body{
            margin:0;
            font-family:Poppins,sans-serif;
            background:#111;
            color:white;
        }
        .main h1{
            color:#c9a84c;
        }
        .sidebar{
            width:220px;
            height:100vh;
            background:#1b1b1b;
            position:fixed;
            padding:20px;
        }

        .sidebar h2{
            color:#c9a84c;
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
            padding:20px;
        }

        .cards{
            display:flex;
            gap:20px;
        }

        .card{
            background:#1b1b1b;
            padding:20px;
            border-radius:10px;
            width:180px;
            text-align:center;
            border:1px solid #333;
        }

        .card h2{
            color:#c9a84c;
        }

        table{
            width:100%;
            margin-top:20px;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #333;
            padding:10px;
            text-align:center;
        }

        th{
            background:#c9a84c;
            color:black;
        }
</style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin</h2>

        <a href="admin_dashboard.php">Dashboard</a>
        <a href="manage_users.php">Users</a>
        <a href="slots.php">Approve Bookings</a>
        <a href="manage_tournaments.php">Tournaments</a>
        <a href="logout.php">Logout</a>
    </div>

<div class="main">

    <h1>Welcome <?php echo $_SESSION['Name']; ?></h1>

    <div class="cards">

        <div class="card">
            <h2><?php echo $user_count; ?></h2>
            <p>Users</p>
        </div>

        <div class="card">
            <h2><?php echo $booking_count; ?></h2>
            <p>Bookings</p>
        </div>

        <div class="card">
            <h2><?php echo $tournament_count; ?></h2>
            <p>Tournaments</p>
        </div>

    </div>

    <h2>Recent Bookings Request</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Console</th>
            <th>Date</th>
            <th>Time</th>
            <th>Players</th>
        </tr>

        <?php
        $result = mysqli_query($conn,"
        SELECT booking.*, user.FullName
        FROM booking
        JOIN user ON booking.UserID = user.UserID
        ORDER BY booking.BookingID DESC
        ");

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['BookingID']; ?></td>
            <td><?php echo $row['FullName']; ?></td>
            <td><?php echo $row['ConsoleID']; ?></td>
            <td><?php echo $row['BookingDate']; ?></td>
            <td><?php echo $row['StartTime']; ?></td>
            <td><?php echo $row['Duration']; ?></td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>