<?php
    require "assets/db.php";

    $connection = connectionDB();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $id = $_GET["id"];

        $sql = "DELETE
                FROM users
                WHERE id = ?";
        
        $stmt = mysqli_prepare($connection, $sql);

        if(!$stmt) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>
</head>
<body>
    
    <form action="" method="POST">
        <p>Ste si istý vymazať žiaka</p>
        <button type="submit">Vymazať</button>
    </form>

</body>
</html>