<!DOCTYPE html>

<?php session_start() ?>

<html>
    <head>
        <title>Navbar</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    </head>

    <body>
        <div class="navbar">
            <a href="../home/userHomePage.php"><img src="../img/logo-white.png" alt="Logo"></a>
            <?php 
                $_SESSION["userType"] = 1; //placeholder

                if ($_SESSION["userType"] != 0) {
                    echo '<div class="nav-links">
                            <a href="#">Logout</a>
                         </div>';
                } else {
                    echo '<div class="nav-links">
                            <a href="../login/userLogin.php">Login</a>
                         </div>';
                }
            ?>
        </div>
    </body>
</html>