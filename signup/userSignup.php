<!DOCTYPE html>

<html>
    <head>
        <title>COVIDSYM - Staff Login</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/signUp.css">
    </head>

    <body>
        <?php
            include "../commons/navbar.php";
        ?>
        
        <div class="container">
            <div class="image-wrapper">
                <img src="../img/logo.png" alt="Logo" height="50px" style="margin: auto;">
            </div>

            <div class="sign-up-wrapper">
                <div class="header">
                    Sign Up
                </div>

                <form action="../login/checkLogin.php" method="POST">
                    <div class="form-wrapper">
                        <div class="left-form">
                            <div class="field">
                                <input type="text" name="Username" required>
                                <label>Username</label>
                            </div>

                            <div class="field">
                                <input type="text" name="Email" required>
                                <label>Email</label>
                            </div>
                        </div>

                        <div class="right-form">
                            <div class="field">
                                <input type="password" required>
                                <label>Password</label>
                            </div>

                            <div class="field">
                                <input type="password" required>
                                <label>Confirm Password</label>
                            </div>
                        </div>
                    </div>

                    <div class="terms-of-service">
                        By submiting, you are accepting our <a href="#">Terms of Service</a>.
                    </div>

                    <div class="field">
                        <input type="submit" value="Next Step">
                    </div>
                </form>
            </div>
        </div>

        <?php
            include "../commons/footer.php";
        ?>
    </body>
</html>