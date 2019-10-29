<script type="text/javascript" src="../../util.js"></script>
<h1>User</h1>
<?php
    require_once "../../connection.php";

    $id = $_GET["id"];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "DELETE FROM user WHERE id = $id";

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
<button type="button" onclick="goToUrl('list.php')">Back</button>
<br />
<br />

<form action="delete.php?id=<? echo $id ?>" method="post">
    <?php
        echo "Are you sure you want delete the user \"$username\"?"
    ?>
    <br />
    <br />
    <button type="submit">Yes</button>
    <button type="button" onclick="goToUrl('list.php')">No</button>
</form>
