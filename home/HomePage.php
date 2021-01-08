<!DOCTYPE html>
<?php
    
    session_start();
    if (!isset($_SESSION["userType"])) {
        header('Location: ../commons/accessDenied.php');
    } else {
        include "../commons/config.php";

        $id = $_SESSION["id"];
        
        if($_SESSION["userType"] ==1){
            $query = "SELECT * FROM patient JOIN user ON patient.user_id = user.id WHERE patient.id = $id ";
        }else if($_SESSION["userType"] ==2){
            $query = "SELECT * FROM medic JOIN user ON medic.user_id = user.id WHERE medic.id = $id";
        }else if($_SESSION["userType"] ==3){
            $query = "SELECT * FROM investigator JOIN user ON investigator.user_id = user.id WHERE investigator.id = $id";
        }else if($_SESSION["userType"] ==4){
            $query = "SELECT * FROM admin JOIN user ON admin.user_id = user.id WHERE admin.id = $id";
        }
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $user = mysqli_fetch_array($result);
    }
?>

<html>
    <head>
        <title>COVIDSYM - Home Page</title>
    
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/homePage.css">

        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    </head>
    
    <body>
        <?php include "../commons/navbar.php"; ?>
    
        <div class="wrapper">
        
            <?php include "../commons/sidebar.php"; ?>

            <div class="content-wrapper">
                <div class="image-wrapper">
                    <img src="../img/logo.png" height="50px" style="margin: auto;">
                </div>
        
                <div class="modal">
                    <div class="modal-header">
                        <?php echo '<h1>Welcome, ' . $user["name"] . '</h1>'; ?>
                    </div>
                    <?php 
                        if ($_SESSION["userType"] == 2) {
                            echo '<div class="modal-body">
                                    <p><span>Users waiting for appointment: </span>420</p>
                                    <div class="buttons">
                                        <a href="../appointment/appointments">See Appointments</a>
                                        <a href="../profile/usersList">New Appointment</a>
                                    </div>
                            </div>';
                        }else if ($_SESSION["userType"] == 4) {
                            echo '<div class="modal-body">
                                    <div class="buttons">
                                        <a href="../appointment/appointments">Create New User</a>
                                        <a href="../profile/usersList">Create New Staff Member</a>
                                    </div>
                                </div>';
                        }else {
                            echo '
                            <div class="modal-body">
                                <h1>What is COVID-19?</h1>
                
                                <div class="modal-text">
                                    <p>COVID-19 is an infectious disease caused by a newly discovered coronavirus.</p>
                                    <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment. Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>
                                    <p>The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus,
                                    the disease it causes and how it spreads. Protect yourself and others from infection by washing your
                                    hands or using an alcohol based rub frequently and not touching your face.</p>
                                </div>';
                                if($_SESSION["userType"] == 1){
                                    echo '<a href="../appointment/newAppointment.php">Make an Appointment</a>
                                        </div>';
                                }else if($_SESSION["userType"] == 3){
                                    echo '<a href="../statistics/charts">Check Statistics</a>
                                        </div>';
                                }
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>
    </body>
</html>