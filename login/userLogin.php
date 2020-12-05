<!DOCTYPE html>

<html>
    <head>
        <title>COVIDSYM - User Login</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/navbar.css">
        <link rel="stylesheet" type="text/css" href="../css/userLogin.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
    </head>

    <body>
        <?php
            include "../commons/navbar.php";
        ?>
        
        <div class="image-wrapper">
            <img src="../img/logo.png" alt="Logo" height="50px" style="margin: auto;">
        </div>

        <div class="container">
            <div class="login-wrapper">
                <div class="header">
                    User Login
                </div>

                <form action="../login/checkLogin.php" method="POST">
                    <div class="field">
                        <input type="text" name="Email" required>
                        <label>Email</label>
                    </div>

                    <div class="field">
                        <input type="password" required>
                        <label>Password</label>
                    </div>

                    <div class="content">
                        <div class="checkbox">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">Remember me</label>
                        </div>

                        <div class="pass-link">
                            <a href="#">Forgot your password?</a>
                        </div>
                    </div>

                    <div class="field">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>

            <div class="info-wrapper">
                <h1>O que é o COVIDSYM?</h1>
                <p class="info-text">
                    By now you should be quite happy about what's happening here. You can bend rivers. But when I get home, the only thing I have power over is the garbage. We don't really know where this goes - and I'm not sure we really care. A beautiful little sunset. The more we do this - the more it will do good things to our heart.
                </p>
                <p class="more-info">Para mais informações, consulte:</p>
                <a href="#">Perguntas frequentes</a>
            </div>
        </div>

        <?php
            include "../commons/footer.php";
        ?>
    </body>
</html>