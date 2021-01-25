<?php

require_once("./conf/db_conn.php");
session_start();

if(empty($_SESSION['name'])){
    header("Location:http://127.0.0.1/demo/sign-in.php");
}

$uid = $_SESSION['uid'];
$sql_query = "SELECT * from post WHERE user_id='$uid'";
$results = $conn->query($sql_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Dashboard</title>
</head>
<body>
    <header>
            <nav>
                <h3 class="logo">My Blog</h3>

                <div class="menu">
                    <p>Welcome, <?php echo $_SESSION['name'];?></p>
                    <a class="logout" href="./log-out.php">Logout</a>
                </div>
            </nav>
    </header>

    <div class="dashboard">
        <div class="top-block">
            <h3>My Blog Posts</h3>
            <a href="./add-post.php">Add New</a>
        </div>

        <table id="posts">
            <tr>
                <th>Topic</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>

            <?php if($results->num_rows > 0){
                while($row = $results->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "
                    <td>
                    <a href='#'>Edit</a>
                    <a href='#'>Delete</a>
                    </td>
                    ";

                }
            }
            ?>

        </table>
    </div>

    
</body>
</html>