<?php

    require "assets/db.php";

    connectionDB();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
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