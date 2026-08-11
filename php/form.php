<?php

$host = 'localhost';
$db_name = 'PROJECTDB';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false.
];

try{
    $pdo = new PDO($dsn, $username, $password, $options);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user_name = isset($_POST['username']) ? trim($_POST['username']) : '';
        $user_email = isset($_POST['email']) ? trim($_POST['email']) : '';


        if(empty($user_name) || empty($user_email)){
            echo "Please fill in all required fields.";
        } elseif(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            echo "Please enter a valid email address.";
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (username, email) VALUES (:username, :email)");
            $stmt->bindParam(':username', $user_name);
            $stmt->bindParam(':email', $user_email);

            if($stmt->execute()){
                echo "User information saved successfully.";
            } else {
                echo "Error saving user information.";
            }
        }
    }
} catch(PDOException $e){
    echo "Database connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>

        <?php
        if(!empty($message)): 
        ?>
        <?php foreach($messages as $msg): ?>
            <div class="alert">
</body>
</html>