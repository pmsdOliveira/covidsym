<!DOCTYPE html>

<?php
    session_start();
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
    
    
?>

<html>
    <head>
        <title>COVIDSYM - New Staff Member</title>

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
                    New Staff Member
                </div>
                
                <div class="modal-content">
                    <?php
                        if (isset($userAlreadyExists) && $userAlreadyExists == true) {
                            echo '<p class="central-text">Username ' . $_POST["username"] . ' already exists.
                                Please try  with a different username.</p>';
                        } else if (isset($emailAlreadyExists) && $emailAlreadyExists == true) {
                            echo '<p class="central-text">E-mail ' . $_POST["email"] . ' already has an associated account.
                                Please try  with a different e-mail.</p>';
                        } else {
                            $query = 'INSERT INTO user (username, password, email) VALUES ("'
                                . $_POST["username"] . '", MD5("' . $_POST["password"] . '"), "' . $_POST["email"] . '")';
                            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                            $id = mysqli_insert_id($connect);
                            $type = $_POST["staff-type"];
                            $query = 'INSERT INTO  ' . $type . ' (name, phone, address, user_id) VALUES ("'
                                . $_POST["name"] . '", "' . $_POST["phone"] . '", "' . $_POST["address"]. '", ' . $id . ')';
                            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                            
                            header('Location: ../home/homePage.php');
                        }
                        
                    ?>
                    <a class="login-button" href="../signup/adminNewStaff.php">Try Again </a>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>

       
    </body>
</html>