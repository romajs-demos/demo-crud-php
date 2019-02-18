<?php

    // echo "<h4>Attempting MySQL connection from php...</h4>";

    $database = 'demo-crud-php';
    $host = 'mysql';
    $user = 'root'; // FIXME: use "demo-crud-php" user
    $pass = '123mudar';

    $connection = new mysqli($host, $user, $pass);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } 

    // echo "<p>Connected to MySQL successfully</p>";

    mysqli_select_db($connection, $database);

    // echo "<p>Selected database <strong>$database</strong></p>";
?>