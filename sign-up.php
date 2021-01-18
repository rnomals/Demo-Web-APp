<?php

    require_once("./conf/db_conn.php");

    $name = $organization = $email = $password = $confirmPassword = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = format_input($_POST['name']);
        $organization = format_input($_POST['organization']);
        $email = format_input($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        if($password != $confirmPassword){
            
        }else{
            $password = password_hash($password,PASSWORD_DEFAULT);
            $sql_query = "INSERT INTO user (name,email,organization,password) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_query);
            $stmt->bind_param('ssss', $name,$email,$organization,$password);
            $stmt->execute();
        }

    }



    function format_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Register</title>
</head>
<body>
        <div class="auth-form register" id="signIn-form">
            <h3>Register</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="input-field">
                    <label for="Name">Name</label>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="input-field">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="input-field">
                    <label for="Organization">Organization</label>
                    <input type="text" name="organization" id="organization" required>
                </div>
    
                <div class="input-field">
                    <label for="Password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="input-field">
                    <label for="Password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" required>
                </div>
                
                <a class="close" href="./index.html">Close</a>
                <button class="submit" type="submit">Sign Up</button>
    
            </form>
        </div>

        <img class="img-right" src="./img/undraw_happy_feeling_slmw.svg" alt="">

</body>
</html>