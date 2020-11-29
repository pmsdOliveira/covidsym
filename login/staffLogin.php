<!DOCTYPE html>

<head>
    <title>Staff Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/ ">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>

<body>
    <div class="wrapper">
        <div class="title-container">
            <h1>COVIDSYM</h1>
        </div>
    
        <div class="login-container">
            <div class="header-wrapper">
                <div class="header">
                    <h4>Login</h4>
                </div>
            </div>
    
            <div class="login-wrapper">
                <div class="login">
                    <form class="form" action="/login/checkLogin.php" method="POST">
                        <input class="text-input" type="text" name="username" placeholder="Username">
                        <input class="text-input" type="password" name="password" placeholder="Password">
                        <a href="#">Recuperar Password</a>
                        <input class="button" type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>