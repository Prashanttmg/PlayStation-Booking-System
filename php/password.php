<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT UserID, Password FROM user");

while($row = mysqli_fetch_assoc($result)){
    // skip rows that are already hashed
    if(strpos($row['Password'], '$2y$') === 0) continue;

    $hash = password_hash($row['Password'], PASSWORD_DEFAULT);
    $id = (int)$row['UserID'];

    mysqli_query($conn, "UPDATE user SET Password='$hash' WHERE UserID=$id");
}

echo "Done";
?>