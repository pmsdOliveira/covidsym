<!DOCTYPE html>
<?php
    session_start();
    
?>

<html>
    <head>
        <title>COVIDSYM - Welcome</title>

        <link rel="icon" href="img/icon.ico" type="image/icon type" />

        <link rel="stylesheet" type="text/css" href="css/index.css" />

        <link rel="preconnect" href="https://fonts.gstatic.com/" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
        />
    </head>

    <body>
        <section>
            <div class="shape"></div>
            <div class="covidsym">
                <img class="img2" src="img/logo.png" alt="" />
            </div>
            <div class="navbar">
                <a href="index.php"
                    ><img src="img/logo-white.png" alt="Logo"
                /></a>
                <div class="nav-links">
                    <?php 
                        if (isset($_SESSION["userType"]) && $_SESSION["userType"] != 0) {
                            echo '<a href="login/logout.php">Logout</a>';
                        } else {
                            echo '
                                <a href="login/userLogin.php">Login</a>
                                <a href="login/staffLogin.php"> Staff Login</a>
                                ';
                        }
                    ?>
                    
                </div>
            </div>

            <div class="wrapper">
                <div class="left">
                    <img class="img" src="img/medic.png" alt="" />
                </div>
                <div class="right">
                    <div class="info-body">
                        <h1>Your Health is our Responsability!</h1>

                        <div class="info-text">
                            <p>
                                COVIDSYM helps you face the pandemic safely,
                                using a highly reliable system to help our
                                medical staff take care of all your worries, as
                                fast and easily as possible.
                            </p>
                        </div>
                        <?php 
                            if (isset($_SESSION["userType"])) {
                                if ($_SESSION["userType"] ==1){
                                    echo '<a href="appointment/newAppointment.php">Make an Appointment</a>';
                                }else{
                                    echo '<a href="home/homePage">Go to Home Page</a>';
                                }
                                
                            } else {
                                echo '<a href="login/userLogin.php">Login</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div class="footer">
                <a href="index.php"
                    ><img src="img/logo-white.png" alt="Logo"
                /></a>
                <p>
                    Project developed for Medical Information Systems Course @
                    FCT-NOVA
                </p>
                <p>Copyright &copy; 2020</p>
            </div>
        </section>
    </body>
</html>
