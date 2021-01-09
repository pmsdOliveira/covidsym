<!DOCTYPE html>

<?php
    session_start();

    if (!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 0 && $_SESSION["userType"] != 1))
        header('Location: http://localhost/covidsym/commons/accessDenied.php');
        
    include("../commons/config.php");

    if ($_SESSION["userType"] == 0) {
        $query = 'INSERT INTO user (username, password, email) VALUES ("'
            . $_POST["username"] . '", MD5("' . $_POST["password"] . '"), "' . $_POST["email"] . '")';
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $id = mysqli_insert_id($connect);

        $query = 'INSERT INTO patient (name, gender, birthdate, phone, address, local, district, 
            fiscal_number, healthcare_number, user_id) VALUES ("'
            . $_POST["name"] . '", "' . $_POST["gender"] . '", "' . $_POST["birthdate"] . '", "'
            . $_POST["phone"] . '", "' . $_POST["address"] . '", "' . $_POST["local"] . '", "'
            . $_POST["district"] . '", "' . $_POST["fiscal"] . '", "' . $_POST["healthcare"] . '", ' 
            . $id . ')';
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    } else if ($_SESSION["userType"] == 1) {
        $query = 'SELECT id FROM patient WHERE patient.user_id = ' . $_SESSION["id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $patient = mysqli_fetch_array($result);

        $query = 'UPDATE patient SET name = "' . $_POST["name"]
        . '", gender = "' . $_POST["gender"] . '", birthdate = "' . $_POST["birthdate"]
        . '", phone = "' . $_POST["phone"] . '", address = "' . $_POST["address"]
        . '", local = "' . $_POST["local"] . '", district = "' . $_POST["district"]
        . '", fiscal_number = "' . $_POST["fiscal"] . '", healthcare_number = "' . $_POST["healthcare"] . '"
        WHERE id = ' . $patient["id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
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
                        if ($_SESSION["userType"] == 0) {
                            echo '<p class="central-text">User ' . $_POST["username"] . '\'s successfully registered.
                            Please proceed to login.</p>';
                            echo '<a class="login-button" href="../login/userLogin.php">Login</a>';

                            unset($_SESSION["userType"]);
                        } else if ($_SESSION["userType"] == 1) {
                            echo '<p class="central-text">Profile successfully updated.</p>';
                            echo '<a class="login-button" href="../profile/userProfile.php?id=' . $patient["id"] . '">Go Back to Profile</a>';
                        }
                    ?>
                    
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>

        <script src="../js/signup.js"></script>
    </body>
</html>