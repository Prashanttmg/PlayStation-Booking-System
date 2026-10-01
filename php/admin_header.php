<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION['Role']) || $_SESSION['Role'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    margin:0;
    font-family:Poppins,sans-serif;
    background:#111;
    color:white;
}

.sidebar{
    width:220px;
    height:100vh;
    background:#1b1b1b;
    position:fixed;
    top:0;
    left:0;
    padding:20px;
}

.sidebar h2{
    color:#c9a84c;
    text-align:center;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:10px;
    margin:8px 0;
    border-radius:5px;
}

.sidebar a:hover{
    background:#c9a84c;
    color:black;
}

.main{
    margin-left:260px;
    padding:20px;
}
.cards{
    display:flex;
    gap:20px;
    margin-bottom:30px;
}

.card{
    flex:1;
    background:#1b1b1b;
    border:1px solid #333;
    border-radius:10px;
    padding:20px;
    text-align:center;
}

.card h2{
    color:#c9a84c;
    font-size:35px;
    margin-bottom:10px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
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

.card{
    background:#1b1b1b;
    border:1px solid #333;
    border-radius:10px;
    padding:20px;
    text-align:center;
}

.card h2{
    color:#c9a84c;
}

.approve-btn{
    background:green;
    color:white;
    border:none;
    padding:8px 12px;
    border-radius:5px;
    cursor:pointer;
}

.delete-btn{
    background:red;
    color:white;
    border:none;
    padding:8px 12px;
    border-radius:5px;
    cursor:pointer;
}

.edit-btn{
    background:#c9a84c;
    color:black;
    border:none;
    padding:8px 12px;
    border-radius:5px;
    cursor:pointer;
}
</style>
</head>
<body>
<div class="sidebar">
    <h2>NAMUZ ADMIN</h2>
    <a href="admin_dashboard.php">Dashboard</a>

    <a href="manage_users.php">Manage Users</a>

    <a href="manage_tournament.php">Manage Tournaments</a>

    <a href="booking_history.php">Booking History</a>

    <a href="logout.php">Logout</a>

</div>

<div class="main">