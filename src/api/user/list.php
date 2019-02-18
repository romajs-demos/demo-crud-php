<?php

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once "../../connection.php";

    $sql = "SELECT * FROM user";
    $result = mysqli_query($connection, $sql); 

    if (!$result) {
        http_response_code(500);
        echo json_encode(
            array("message" => "Error executing query with no result")
        );
        die ();
    }

    $items = array();

    while($row = $result->fetch_assoc()) {
        $item = array(
            "id" => $row["id"],
            "username" => $row["username"],
            "password" => $row["password"],
            "email" => $row["email"]
        );
        array_push($items, $item);
    }

    echo json_encode($items);

?>