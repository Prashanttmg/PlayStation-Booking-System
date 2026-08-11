<?php
function searchStudentsByName($name){
    if(isset($_GET['query']) && !empty($_GET['query'])){
        $name = $_GET['query'];
    } else{
        $name = "";
    }

    $conn = mysqli_connect("db", "student", "student123", "student_db");
    $sql = "SELECT * FROM students WHERE name LIKE '%$name'";
    $result = mysqli_query($conn, $sql);
    $students = [];
    while($row = mysqli_fetch_assoc($result)){
        $students[] = $row;
    }
    $conn->close();

    // Filter students by name
    return array_filter($students, function($student) use ($name){
        return stripos($student['name'], $name) !== false;
    });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" integrity="sha512-ApSLB1Pd3/bZN8fw8/RG9YhN/7bd9HKf3AGaE2mPfebjrxagjuBtx2GcgdqILJkUzwy1Bo61r9Xa9mgBI0swA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <div class="container bg-white p-4 mt-5 rounded shadow">
        <h1 class="bg-primary text-white p-3">Student Search</h1>
        <form action="#" method="GET" class="mt-4 d-flex flex-row align-items-center justify-content-start gap-2">
            <div class="form-group">
                <input type="text" name="query" placeholder="Search students by name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Search</button>
        </form>
    </div>
    <div class="container mt-3">
        <?php
        // your php code for displaying search results geos here
        if(isset($_GET['query']) && !empty($_GET['query'])){
            // Assuming you have a function to search students by name
            $students = searchStudentsByName('query');

            if(!empty($students)){
                foreach($students as $student){
                    echo '<div class="col-md-4 mb-3"'
                }
            }
        }
        ?>
    </div>
</body>
</html>