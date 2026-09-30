<?php
include 'config.php';
session_start();

if(!isset($_SESSION['UserID']) || $_SESSION['Role']!='admin'){
    header("Location: login.php");
    exit();
}

if(isset($_GET['delete']))
{
    $id=$_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM tournament WHERE TournamentID='$id'");

    header("Location: manage_tournament.php");
}
?>

<?php include 'admin_header.php'; ?>

<div class="container">
<h1>Manage Tournaments</h1>

<a href="add_tournament.php" class="btn">
Add Tournament
</a>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Game</th>
<th>Date</th>
<th>Time</th>
<th>Entry Fee</th>
<th>Players</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$result=mysqli_query($conn,
"SELECT * FROM tournament ORDER BY TournamentDate DESC");

while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?= $row['TournamentID']; ?></td>
<td><?= $row['TournamentName']; ?></td>
<td><?= $row['GameName']; ?></td>
<td><?= $row['TournamentDate']; ?></td>
<td><?= $row['StartTime']; ?></td>
<td>Rs <?= $row['EntryFee']; ?></td>
<td><?= $row['MaxPlayers']; ?></td>
<td><?= $row['Status']; ?></td>

<td>
<a href="edit_tournament.php?id=<?= $row['TournamentID']; ?>">
Edit
</a> |

<a href="participants.php?id=<?= $row['TournamentID']; ?>">
Participants
</a> |

<a href="?delete=<?= $row['TournamentID']; ?>"
onclick="return confirm('Delete Tournament?')">
Delete
</a>
</td>
</tr>
<?php } ?>
</table>
</div>

<style>
.container{
    padding:30px;
    color:white;
}
.btn{
    background:#c9a84c;
    color:black;
    padding:10px 15px;
    text-decoration:none;
}
table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}
th,td{
    border:1px solid #c9a84c;
    padding:10px;
}
th{
    background:#c9a84c;
    color:black;
}
</style>