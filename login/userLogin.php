<!DOCTYPE html>

<?php
    session_start();
    $_SESSION["login"] = "User";
?>

<html>
    <head>
        <title>COVIDSYM - User Login</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
        
        <link rel="stylesheet" type="text/css" href="../css/userLogin.css">
    </head>

    <body>
        <?php include "../commons/navbar.php"; ?>

        <div class="container">
            <div class="image-wrapper">
                <img src="../img/logo.png" alt="Logo">
            </div>

            <div class="main">
                <div class="login-wrapper">
                    <div class="header">
                        User Login
                    </div>

                    <form action="../login/checkUserLogin.php" method="POST">
                        <div class="field">
                            <input type="text" name="username" required>
                            <label>Username</label>
                        </div>

                        <div class="field">
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>

                        <div class="content">
                            <!-- <div class="checkbox">
                                <input type="checkbox" id="remember-me">
                                <label for="remember-me">Remember me</label>
                            </div>

                            <div class="pass-link">
                                <a href="#">Forgot your password?</a>
                            </div> -->
                        </div>

                        <input type="submit" value="Login">

                        <div class="signup-link">
                            <a href="../signup/userSignup">Don't have an account yet?</a>
                        </div>
                    </form>
                </div>

                <div class="info-wrapper">
                    <h1>What is COVIDSYM?</h1>
                    <p class="info-text">
                        COVIDSYM consists in a symptom and risk factor registry and analysis system, that supports medical staff in deciding to prescribe a test to COVID-19, based on the assessment of the user's risk of being diagnosed with it. The risk assessment is done automatically based on the indicators registered by the user, using a high-fidelity Diagnostic Support System.
                    </p>
                    <p class="more-info">For more information:</p>
                    <a href="../info/faq">Frequently asked questions</a>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php";?>
    </body>
</html>