<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>My Blog</title>
</head>
<body>
    
    <header>
        <nav>
            <h3 class="logo">My Blog</h3>


            <?php
                if(!empty($_SESSION['name'])){
            
            ?>
                <div class="menu">
                    <p>Welcome, <?php echo $_SESSION['name'];?></p>
                    <a class="logout" href="./log-out.php">Logout</a>
                </div>
            <?php
                }else{
            ?>
            <div class="menu">
                <a href="#"> Our Story</a>
                <a href="./sign-in.php">Sign In</a>
                <a class="button" id="menuButton" href="./sign-up.php">Get Started</a>
            </div>
            <?php
                }
            ?>
        </nav>

            <div class="details">
                <div class="details-text">
                    <h1>Where Good Ideas Find You</h1>
                    <h3>Read and share new perspectives on just about any topic. Everyone’s welcome.</h3>

                    <a class="button" href="./sign-up.php">Get Started</a>
                </div>

                <img src="./img/pine-cone.svg" alt="description image">

            </div>


    </header>

    <main>
        <div class="posts">
            <div class="post">
                <div class="post-content">
                    <p class="post-details">John Doe <span>in</span> UCSC</p>
                    <h3>My Life Story</h3>
                    <p class="subheading">Here is my lifestory</p>
                    <p class="info">Jan 12, 12 min read</p>
                </div>
                <img src="./img/lifestory.jpg" alt="mylifestory">
            </div>

            <div class="post">
                <div class="post-content">
                    <p class="post-details">John Doe <span>in</span> UCSC</p>
                    <h3>My Life Story</h3>
                    <p class="subheading">Here is my lifestory</p>
                    <p class="info">Jan 12, 12 min read</p>
                </div>
                <img src="./img/lifestory.jpg" alt="mylifestory">
            </div>

            <div class="post">
                <div class="post-content">
                    <p class="post-details">John Doe <span>in</span> UCSC</p>
                    <h3>My Life Story</h3>
                    <p class="subheading">Here is my lifestory</p>
                    <p class="info">Jan 12, 12 min read</p>
                </div>
                <img src="./img/lifestory.jpg" alt="mylifestory">
            </div>

            <div class="post">
                <div class="post-content">
                    <p class="post-details">John Doe <span>in</span> UCSC</p>
                    <h3>My Life Story</h3>
                    <p class="subheading">Here is my lifestory</p>
                    <p class="info">Jan 12, 12 min read</p>
                </div>
                <img src="./img/lifestory.jpg" alt="mylifestory">
            </div>

            <div class="post">
                <div class="post-content">
                    <p class="post-details">John Doe <span>in</span> UCSC</p>
                    <h3>My Life Story</h3>
                    <p class="subheading">Here is my lifestory</p>
                    <p class="info">Jan 12, 12 min read</p>
                </div>
                <img src="./img/lifestory.jpg" alt="mylifestory">
            </div>

            <div class="post">
                <div class="post-content">
                    <p class="post-details">John Doe <span>in</span> UCSC</p>
                    <h3>My Life Story</h3>
                    <p class="subheading">Here is my lifestory</p>
                    <p class="info">Jan 12, 12 min read</p>
                </div>
                <img src="./img/lifestory.jpg" alt="mylifestory">
            </div>

            

        </div>
    </main>

    <script src="./app.js"></script>
</body>
</html>