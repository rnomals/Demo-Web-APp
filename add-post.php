<?php

    require_once("./conf/db_conn.php");
    session_start();

    if(empty($_SESSION['name'])){
        header("Location:http://127.0.0.1/demo/sign-in.php");
    }


    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $target_dir = "uploads/";
        $time = time();
        $target_file = $target_dir.$time.basename($_FILES["post-image"]["name"]);

        $title = $subtitle = $minutes = $content = $uid = "";

        if (move_uploaded_file($_FILES["post-image"]["tmp_name"], $target_file)) {
            $title = $_POST['topic'];
            $subtitle = $_POST['subtopic'];
            $minutes = $_POST['minutes'];
            $content = $_POST['content'];
            $uid = $_SESSION['uid'];
            $date = date('Y/m/d');

            $sql_query = "INSERT INTO post (title,subtitle,date,readingTime,content,file_path,user_id) VALUES (?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql_query);
            $stmt->bind_param('sssssss',$title,$subtitle,$date,$minutes,$content,$target_file,$uid);
            $stmt->execute();

            header("Location:http://127.0.0.1/demo/dashboard.php");

        } 

    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Add Post</title>
</head>
<body>
    <header>
            <nav>
                <h3 class="logo">My Blog</h3>

                <div class="menu">
                    <p>Welcome, <?php echo $_SESSION['name']; ?></p>
                    <a class="logout" href="./log-out.php">Logout</a>
                </div>
            </nav>
    </header>

    <div class="post-form">
        <form action="#" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <label for="Topic">Topic</label>
                    <input type="text" name="topic" id="topic">
                </div>

                <div class="input-field">
                    <label for="Topic">Sub Topic</label>
                    <input type="text" name="subtopic" id="subtopic">
                </div>

                <div class="input-field">
                    <label for="Minutes">Minutes</label>
                    <input type="text" name="minutes" id="minutes">
                </div>

                <div class="input-field">
                    <label for="Content">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10"></textarea>
                </div>

                <div class="input-field">
                    <label for="Content">Upload Image</label>
                    <input type="file" name="post-image" id="post-image" required>
                </div>

                <a class="close" href="./dashboard.php">Close</a>
                <button class="submit" type="submit">Add Post</button>


        </form>
    </div>
</body>
</html>