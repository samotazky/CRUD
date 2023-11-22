<?php 

    require "assets/db.php";
    $connection = connectionDB();

    if (isset($_GET["id"]) and is_numeric($_GET["id"]))
    $sql = "SELECT * 
            FROM users
            WHERE id = ?";
    
    $stmt = mysqli_prepare($connection, $sql);

    if (!$stmt) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $first_name = $_POST["first_name"];
        $second_name = $_POST["second_name"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $id = $_GET["id"];
        
        $sql = "UPDATE users
                SET first_name = ?,
                    second_name = ?,
                    age = ?,
                    email = ?
                WHERE id = ?";
        
        $stmt = mysqli_prepare($connection, $sql);

        if(!$stmt) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($stmt, "ssisi", $first_name, $second_name, $age, $email, $_GET["id"]);
            mysqli_stmt_execute($stmt);
            
            if(isset($_SERVER["HTTPS"]) and $_SERVER["HTTP"] != "off") {
                $url_protocol = "https";
            } else {
                $url_protocol = "http";
            } 

            header("location: $url_protocol://" .$_SERVER["HTTP_HOST"] ."/projects/database_CRUD/user.php?id=$id");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update user</title>
</head>
<body>
    
    <form action="update.php?id=<?= $user["id"] ?>" method="POST">
        <input type="text" name="first_name" value="<?= $user['first_name'] ?>" placeholder="First Name"> <br>
        <input type="text" name="second_name" value="<?= $user['second_name'] ?>" placeholder="Second Name"> <br>
        <input type="number" name="age" value="<?= $user['age'] ?>" placeholder="age" min="18" max="99"> <br>
        <input type="text" name ="email" value="<?= $user['email'] ?>" placeholder="E-Mail"> <br>
        <input type="submit" value="submit">
    </form>

</body>
</html>