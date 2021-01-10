<!DOCTYPE html>

<?php 
    session_start();

    if (isset($_SESSION["userType"]) && $_SESSION["userType"] <= 1)
        header('Location: http://localhost/covidsym/commons/accessDenied.php');

    include("../commons/config.php");

    $staffType = ($_POST["staffType"] == null) ? null : $_POST["staffType"];  

    if($staffType == null) {
        switch($_SESSION["userType"]) {
            case 2: $staffType = "Medic"; break;
            case 3: $staffType = "Investigator"; break;
            case 4: $staffType = "Admin"; break;
        }
    }

    if ($_SESSION["userType"] == 4 && isset($_POST["delete"])) {
        $query = 'SELECT user_id FROM ' . $staffType . ' INNER JOIN user ON ' 
            . $staffType . '.user_id = user.id WHERE ' . $staffType . '.id = ' . $_POST["id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $userID = mysqli_fetch_array($result);

        $query = 'DELETE FROM user WHERE id = ' . $userID["user_id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    } else {
        $staffID = $_POST["id"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        $query = 'UPDATE ' . $staffType . ' SET name = "' . $_POST["name"]
        . '", phone = "' . $_POST["phone"] . '", address = "' . $_POST["address"]
        . '" WHERE id = ' . $staffID;

        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    }

    
?>

<html>
    <head>
        <title>COVIDSYM - Profile Saved</title>

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
                    Profile Saved
                </div>
                
                <div class="modal-content">
                    <?php
                        if (isset($_POST["delete"])) {
                            echo '<p class="central-text">' . $staffType . ' successfully deleted.</p>';
                            echo '<a class="login-button" href="../profile/staffList.php">Go Back to Staff List</a>';
                        } else {
                            echo '<p class="central-text">Profile successfully updated.</p>';
                            if($_POST["staffType"] == null) {
                                echo '<a class="login-button" href="../profile/staffProfile.php?id=' . $staffID . '">Go Back to Profile</a>';
                            } else {
                                echo '<a class="login-button" href="../profile/staffProfile.php?staff=' . $staffType . '&id=' . $staffID . '">Go Back to Profile</a>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>
    </body>
</html>