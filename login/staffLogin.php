<!DOCTYPE html>

<html>
    <head>
        <title>COVIDSYM - Staff Login</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/staffLogin.css">
    </head>

    <body>
        <?php
            include "../commons/navbar.php";
        ?>
        
        <div class="container">
            <div class="image-wrapper">
                <img src="../img/logo.png" alt="Logo">
            </div>

            <div class="login-wrapper">
                <div class="header">
                    Staff Login
                </div>

                <form action="../login/checkLogin.php" method="POST">
                    <div class="field">
                        <input type="text" name="username" required>
                        <label>Username</label>
                    </div>

                    <div class="field">
                        <input type="password" required>
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
                </form>
            </div>
        </div>

        <?php
            include "../commons/footer.php";
        ?>
    </body>
</html>