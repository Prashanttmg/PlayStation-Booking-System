<?php
session_start();
include 'config.php';


if(!isset($_SESSION['UserID']) || $_SESSION['Role']!='admin'){
    header("Location: login.php");
    exit();
}

if(isset($_GET['delete']))
    {
        $id = intval($_GET['delete']);
        if($id == $_SESSION['UserID']){ 
            echo "<script> alert('You cannot delete your own admin account.');
            window.location='manage_users.php';
            </script>"; 
            exit(); 
        }
        mysqli_begin_transaction($conn); 
        try {
        $sql = "DELETE FROM tournament_participants WHERE UserID = $id";
        if(!mysqli_query($conn, $sql)){ throw new Exception(mysqli_error($conn));
        } 
        $sql = "DELETE FROM booking WHERE UserID = $id";
        if(!mysqli_query($conn, $sql)){ throw new Exception(mysqli_error($conn));
        }  
        $sql = "DELETE FROM user WHERE UserID = $id"; 
        if(!mysqli_query($conn, $sql)){ throw new Exception(mysqli_error($conn)); 
        }  
        mysqli_commit($conn); 
        echo "<script> alert('User deleted successfully.'); 
        window.location='manage_users.php';
        </script>"; 
        exit(); 
        } 
        catch(Exception $e) 
        {  
            mysqli_rollback($conn); 
            echo "<script> alert('Delete failed: " . addslashes($e->getMessage()) . "');
            window.location='manage_users.php'; 
            </script>"; 
            exit(); 
        }
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
