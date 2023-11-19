<?php

function connectionDB() {

    $db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "crud";
    
    $connection = mysqli_connect($db_server, $db_username, $db_password, $db_database);
    
    if(mysqli_connect_error()) {
        die(mysqli_connect_error());
    }

    return $connection;
}


