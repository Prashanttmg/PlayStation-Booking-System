<?php
session_start();
include 'config.php';

if(!isset($_SESSION['Role']) || $_SESSION['Role'] != 'admin'){
    header("Location: login.php");
    exit();
}

$user_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM user"));
$booking_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM booking WHERE Status='Pending'"));
$tournament_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tournament"));

if(isset($_GET['approve']))
{
    $id = $_GET['approve']; 
    mysqli_query($conn,"
    UPDATE booking
    SET Status='Approved'
    WHERE BookingID='$id'
    ");

    header("Location: admin_dashboard.php");
    exit();
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,"
    DELETE FROM booking
    WHERE BookingID='$id'
    ");

    header("Location: admin_dashboard.php");
    exit();
}
?>
<?php include 'admin_header.php'; ?>
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
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($conn,"
        SELECT booking.*, user.FullName
        FROM booking
        JOIN user ON booking.UserID = user.UserID
        WHERE booking.Status='Pending'
        ORDER BY booking.bookingID DESC
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
            <td><?php echo $row['Status']; ?></td>
            <td>
            <?php if($row['Status']=="Pending"){ ?>
            <a href="?approve=<?php echo $row['BookingID']; ?>"
            onclick="return confirm('Approve this Booking?')">
                <button class="approve-btn">
                    Approve
                </button>
            </a>
            <a href="?delete=<?php echo $row['BookingID']; ?>"
            onclick="return confirm('Delete booking?')">
                <button class="delete-btn">
                    Delete
                </button>
            </a>
            <?php } else { ?>
            Approved
            <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>