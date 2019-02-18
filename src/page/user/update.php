<script type="text/javascript" src="../../util.js"></script>
<h1>User</h1>
<?php
    require_once "../../connection.php";

    $id = $_GET["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "UPDATE user SET username='$username', password='$password', email='$email 'WHERE id = $id";

        $result = mysqli_query($connection, $sql);

        if($result) {
            echo "<script>goToUrl('list.php')</script>";
        } else {
            // TODO:
        }

    } else {
        $sql = "SELECT * FROM user WHERE id = $id";
    
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);  
    
        $username = $row["username"];
        $password = $row["password"];
        $email = $row["email"];
    }
?>
<button type="button" onclick="goToUrl('users.php')">Back</button>
<br />
<br />

<form action="update.php?id=<? echo $id ?>" method="post">
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
