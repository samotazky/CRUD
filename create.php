<?php

    require "assets/db.php";

    $connection = connectionDB();

    $first_name = null;
    $second_name = null;
    $age = null;
    $email = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $email = $_POST["email"];

        $sql = "INSERT INTO users(first_name, second_name, age, email)
                VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($connection, $sql);

        if(!$stmt) {
            echo mysqli_connect_error($connection);
        } else {
            mysqli_stmt_bind_param($stmt, "ssis", $first_name, $second_name, $age, $email);
            
            mysqli_stmt_execute($stmt);
        }



    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create users</title>
</head>
<body>
    
    <form action="create.php" method="POST">
        <input type="text" name="first_name" placeholder="First Name"> <br>
        <input type="text" name="second_name" placeholder="Second Name"> <br>
        <input type="number" name="age" placeholder="age" min="18" max="99"> <br>
        <input type="text" name ="email" placeholder="E-Mail"> <br>
        <input type="submit" value="submit">
    </form>

</body>
</html>