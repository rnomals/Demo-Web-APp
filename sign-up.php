<?php

    require_once("./conf/db_conn.php");

    $name = $organization = $email = $password = $confirmPassword = "";
    $passwordErr = $emailErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = format_input($_POST['name']);
        $organization = format_input($_POST['organization']);
        $email = format_input($_POST['email']);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];

        if($password != $confirmPassword){
            $passwordErr = "Password and confirm password does not match !";
        }else{
            $sql_email_verify = "SELECT user_id from user WHERE email='$email'";
            $result = $conn->query($sql_email_verify);
            if(!empty($result) && $result->num_rows > 0){
                $emailErr = "User Email already exists!";
            }else{
                $password = password_hash($password,PASSWORD_DEFAULT);
                $sql_query = "INSERT INTO user (name,email,organization,password) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql_query);
                $stmt->bind_param('ssss', $name,$email,$organization,$password);
                $stmt->execute();

                header("Location:http://127.0.0.1/demo/sign-in.php");
            }
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
            <?php
                if(!empty($passwordErr)){
                    echo "<div class='error'>".$passwordErr."</div>";
                }else{
                    if(!empty($emailErr)){
                        echo "<div class='error'>".$emailErr."</div>";
                    }
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="input-field">
                    <label for="Name">Name</label>
                    <input type="text" name="name" id="name" 
                        <?php if(!empty($name)) echo 'value="'.$name.'"'; ?>
                    required>
                </div>

                <div class="input-field">
                    <label for="Email">Email</label>
                    <input type="email" name="email" id="email" 
                    <?php if(!empty($email)) echo 'value="'.$email.'"'; ?>
                    required>
                </div>

                <div class="input-field">
                    <label for="Organization">Organization</label>
                    <input type="text" name="organization" id="organization" 
                    <?php if(!empty($organization)) echo 'value="'.$organization.'"'; ?>
                    required>
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