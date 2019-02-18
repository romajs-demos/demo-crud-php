<script type="text/javascript" src="../util.js"></script>
<h1>User</h1>
<?php
    require_once "../connection.php";

    $method = $_SERVER['REQUEST_METHOD'];
    // echo "method=".$method."<br />";
    // echo "<br />";

    $id = $_GET["id"] || $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    if($method === 'POST') {

        if($id > 0) {
            $sql = "UPDATE user SET username='$username', password='$password', email='$email 'WHERE id = $id";
        } else {
            $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";
        }

        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "<script>goToUrl('users.php')</script>";
        } else {
            // TODO:
        }

    } else if($id > 0) {
        $sql = "SELECT * FROM user WHERE id = $id";

        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);  

        $username = $row["username"];
        $password = $row["password"];
        $email = $row["email"];

    }


    // echo "id=".$id."<br />";
    // echo "username=".$username."<br />";
    // echo "password=".$password."<br />";
    // echo "email=".$email."<br />";
    // echo "<br />";
?>
<button type="button" onclick="goToUrl('users.php')">Back</button>
<br />
<br />

<form action="user.php" method="post">
    <input type="hidden" name="id" id="id" value="<? echo $id ?>" /> 

    <label for="username">Username</label>
    <input type="text" name="username" id="username" value="<? echo $username ?>" /> 
    <br />

    <label for="password">Password</label>
    <input type="password" name="password" id="password" value="<? echo $password ?>" /> 
    <br />

    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" value="<? echo $email ?>" /> 
    <br />

    <button type="submit">Save</button>
</form>
