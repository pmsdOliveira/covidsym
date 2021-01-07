<!DOCTYPE html>

<?php
    session_start();

    if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != 0) {
        header('Location: http://localhost/covidsym/commons/accessDenied.php');
    } else {
        include("../commons/config.php");
        
        $query = 'SELECT * FROM user WHERE username = "' . $_POST["username"] . '"';
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect)) ;
        if (mysqli_num_rows($result) > 0) {
            $userAlreadyExists = true;
        } else {
            $query = 'SELECT * FROM user WHERE email = "' . $_POST["email"] . '"';
            $result = mysqli_query($connect, $query) or die(mysqli_error($connect)) ;
            if (mysqli_num_rows($result) > 0) {
                $emailAlreadyExists = true;
            }
        }
    }
?>

<html>
    <head>
        <title>COVIDSYM - User Signup</title>

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
                    Sign Up
                </div>
                
                <div class="modal-content">
                    <?php
                        if (isset($userAlreadyExists) && $userAlreadyExists == true) {
                            echo '<p class="central-text">Username ' . $_POST["username"] . ' already exists.
                                Please try signing up with a different username.</p>';
                        } else if (isset($emailAlreadyExists) && $emailAlreadyExists == true) {
                            echo '<p class="central-text">E-mail ' . $_POST["email"] . ' already has an associated account.
                                Please try signing up with a different e-mail.</p>';
                        } else {
                            session_start();
                            $_SESSION["userType"] = 0;
                            $_SESSION["username"] = $_POST["username"];
                            $_SESSION["email"] = $_POST["email"];
                            $_SESSION["password"] = $_POST["password"];

                            header('Location: ../profile/userProfile.php');
                        }
                    ?>
                    <a class="login-button" href="../signup/userSignup.php">Login</a>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>
    </body>
</html>