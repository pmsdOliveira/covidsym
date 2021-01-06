<!DOCTYPE html>

<html>
    <head>
        <title>COVIDSYM - Page Not Found</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
        
        <link rel="stylesheet" type="text/css" href="../css/pageNotFound.css">
    </head>

    <body>
        <?php include "../commons/navbar.php"; ?>

        <div class="container">
            <div class="image-wrapper">
                <img src="../img/logo.png" alt="Logo">
            </div>

            <div class="modal">
                <div class="modal-header">
                    Page Not Found
                </div>

                <div class="modal-body">
                    <div class="modal-text">
                        <br>
                        <p>It’s seems like you tried to access a page that does not exist. Are you trying to hack us?</p>
                        <p>Your computer will explode in <span id="counter">30</span> seconds.</p>
                        <p>Consider returning to the Home Page, while you still can...</p>
                    </div>

                    <a href="../home/userHomePage.php">Return to Home Page</a>
                </div>
            </div>
        </div>

        <?php include "../commons/footer.php";?>
        <script src="../js/counter.js"></script>
    </body>
</html>