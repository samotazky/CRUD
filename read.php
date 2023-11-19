<?php
    require "assets/db.php";

    $connection = connectionDB();

    $sql = "SELECT *
            FROM users";
    
    $result = mysqli_query($connection, $sql);

    if ($result == false) {
        mysqli_error($connection);
    } else {
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove users</title>
</head>
<body>
    <?php if (empty($users)) : ?>
        <p>Database is empty.</p>

        <?php else : ?>
    <ol>
        <?php foreach($users as $one_user) : ?>
            <li>
                <a href="user.php?id=<?= $one_user["id"] ?>">
                    <?= htmlspecialchars($one_user["first_name"]) ?>
                </a>
            </li>
        <?php endforeach ?>
    </ol>
    <?php endif ?>

</body>
</html>