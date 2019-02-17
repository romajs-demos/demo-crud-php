<h1>Hello World!</h1>
<?php
    require_once "../connection.php";
    
    $sql = "SELECT * FROM user";
    $result = mysqli_query($connection, $sql); 

    if (!$result) {
        die ("Fail to query with no result");
    }
?>
<table>
    <thead>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>E-mail</th>
    </thead>
    <tbody>
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["username"]."</td>";
                    echo "<td>".$row["password"]."</td>";
                    echo "<td>".$row["email"]."</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo "<td colspan=\"4\">No results</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>