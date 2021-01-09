<!DOCTYPE html>

<?php 
    session_start();

    include("../commons/config.php");

    $query = 'SELECT user.id FROM user JOIN patient ON user.id = patient.user_id WHERE
        user.username = "' . $_POST["username"] . '" AND user.password = MD5("' . $_POST["password"] . '")';
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    if(mysqli_num_rows($result) != 1) {
        $wrongCredentials = true;
    }
?>

<html>
    <head>
        <title>COVIDSYM - User Login</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
        
        <link rel="stylesheet" type="text/css" href="../css/checkUserSignup.css">
    </head>

    <body>
        <?php include "../commons/navbar.php";?>
        
        <div class="container">
            <div class="image-wrapper">
                <img src="../img/logo.png" alt="Logo">
            </div>

            <div class="sign-up-wrapper">
                <div class="header">
                    User Login
                </div>
                
                <div class="modal-content">
                    <?php
                        if (isset($wrongCredentials) && $wrongCredentials == true) {
                            echo '<p class="central-text">Wrong credentials. Try to log in again.</p>';
                            echo '<a class="login-button" href="../login/userLogin">Go to Login</a>';
                        } else {
                            echo '<p class="central-text">Logged in successfully.</p>';
                            echo '<a class="login-button" href="../home/homePage">Go to Home Page</a>';
                            
                            $_SESSION["userType"] = 1; // sets user type as patient
                            $user = mysqli_fetch_array($result);
                            $_SESSION["id"] = $user["id"];
                        }
                    ?>
                    
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>
    </body>
</html>