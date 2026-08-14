<?php
include 'config.php';

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $status = $_POST['status'];
    $bookedby = $_POST['bookedby'];
    mysqli_query($conn,
    "UPDATE slots
    SET Status='$status',
        BookedBy='$bookedby'
    WHERE SlotID='$id'");
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
table{
    width:100%;
    border-collapse:collapse;
    background:#1b1b1b;
}
th,td{
    border:1px solid #444;
    padding:12px;
    text-align:center;
}
th{
    background:#c9a84c;
    color:black;
}
select,
input[type="text"]{
    padding:8px;
    width:120px;
    border:none;
    border-radius:5px;
}
button{
    background:#c9a84c;
    color:black;
    border:none;
    padding:8px 15px;
    border-radius:5px;
    cursor:pointer;
    font-weight:bold;
}
button:hover{
    background:#e0bf63;
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
<table>
<tr>
    <th>Day</th>
    <th>Time Slot</th>
    <th>Status</th>
    <th>Booked By</th>
    <th>Action</th>
</tr>
<?php
$result = mysqli_query($conn,"SELECT * FROM slots");

while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
<form method="POST">
    <td><?php echo $row['DayName']; ?></td>
    <td><?php echo $row['TimeSlot']; ?></td>
    <td>
    <select name="status">
        <option value="Available"
        <?php if($row['Status']=='Available') echo 'selected'; ?>>
        Available
        </option>

        <option value="Booked"
        <?php if($row['Status']=='Booked') echo 'selected'; ?>>
        Booked
        </option>
    </select>
</td>
<td>
    <input type="text"
           name="bookedby"
           value="<?php echo $row['BookedBy']; ?>">
</td>
<td>
    <input type="hidden"
           name="id"
           value="<?php echo $row['SlotID']; ?>">
    <button type="submit" name="update">
        Save
    </button>
</td>
</form>
</tr>
<?php
}
?>

</table>
</div>
</body>
</html>