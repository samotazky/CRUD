<?php

    require "assets/db.php";

    $connection = connectionDB();

    if (isset($_GET["id"]) and is_numeric($_GET["id"])) {

        $sql = "SELECT * 
                FROM users
                WHERE id = ?";
        
        $stmt = mysqli_prepare($connection, $sql);

        if ($stmt === false) {
            echo mysqli_error($connection);
        } else {
            mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            }
        }
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
    
    <?php if ($user === null) : ?>
        <p>User is not find</p>

    <?php else : ?>
        <h2><?= htmlspecialchars($user["first_name"]) ." " .htmlspecialchars($user["second_name"]) ?></h2>
        <p><strong>Age:</strong> <?= htmlspecialchars($user["age"]) ?></p>
        <p><strong>E-Mail:</strong> <?= htmlspecialchars($user["email"]) ?></p>
    <?php endif ?>

</body>
</html>