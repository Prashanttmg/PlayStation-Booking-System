<?php
include 'config.php';
session_start();

if(!isset($_SESSION['UserID']) || $_SESSION['Role']!='admin'){
    header("Location: login.php");
    exit();
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    mysqli_query($conn,"DELETE FROM user WHERE UserID='$id'");
    header("Location: manage_user.php");
}
?>

<?php include 'admin_header.php'; ?>

<div class="container">
    <h1>Manage Users</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($conn,"SELECT * FROM user ORDER BY UserID DESC");

        while($row=mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><?= $row['UserID']; ?></td>
            <td><?= $row['FullName']; ?></td>
            <td><?= $row['Email']; ?></td>
            <td><?= $row['Phone']; ?></td>
            <td><?= $row['Role']; ?></td>
            <td>
                <a href="?delete=<?= $row['UserID']; ?>"
                onclick="return confirm('Delete this user?')">
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
table{
    width:100%;
    border-collapse:collapse;
}
th,td{
    border:1px solid #c9a84c;
    padding:12px;
}
th{
    background:#c9a84c;
    color:black;
}
a{
    color:red;
    text-decoration:none;
}
</style>
