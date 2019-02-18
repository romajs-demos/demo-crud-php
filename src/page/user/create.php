<script type="text/javascript" src="../../util.js"></script>
<h1>User</h1>
<?php
    require_once "../../connection.php";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "INSERT INTO user (username, password, email) VALUES ('$username', '$password', '$email')";

        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "<script>goToUrl('list.php')</script>";
        } else {
            // TODO:
        }
    }
?>
<button type="button" onclick="goToUrl('list.php')">Back</button>
<br />
<br />
<form action="create.php" method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required/> 
    <br />

    <label for="password">Password</label>
    <input type="password" name="password" id="password" /> 
    <br />

    <label for="email">E-mail</label>
    <input type="text" name="email" id="email" /> 
    <br />

    <button type="submit">Save</button>
</form>
