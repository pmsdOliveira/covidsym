<!DOCTYPE html>

<?php
    session_start();

    if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != 1) {
        header('Location: ../commons/accessDenied.php');
    } else {
        include "../commons/config.php";

        $query = 'SELECT * FROM user WHERE id = ' . $_SESSION["id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $user = mysqli_fetch_array($result);
    }
?>

<html>
    <head>
        <title>COVIDSYM - Home Page</title>
    
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/userHomePage.css">

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
                        <?php echo '<h1>Welcome, ' . $_SESSION["username"] . '</h1>'; ?>
                    </div>
        
                    <div class="modal-body">
                        <h1>What is COVID-19?</h1>
        
                        <div class="modal-text">
                            <p>COVID-19 is an infectious disease caused by a newly discovered coronavirus.</p>
                            <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment. Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>
                            <p>The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus,
                            the disease it causes and how it spreads. Protect yourself and others from infection by washing your
                            hands or using an alcohol based rub frequently and not touching your face.</p>
                        </div>
        
                        <a href="../appointment/newAppointment.php">Make an Appointment</a>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php"; ?>
    </body>
</html>