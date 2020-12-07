<html>

<head>
    <title>COVIDSYM - User Home Page</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type">

    <link rel="stylesheet" href="../css/mainPage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <?php
        include "../commons/navbar.php";
    ?>

    <div class="modal">
        <div class="modal-header">
            <img src="../img/logo-white.png" height="30px" style="margin: auto;">
            <h1 class="title">Welcome, [Username]</h1>
        </div>
        <div class="modal-body">
            <h1>What is COVID-19?</h1>
            <div class="modal-text">
                <p>Coronavirus disease (COVID-19) is an infectious disease caused by a newly discovered coronavirus.</p>
                <br>
                <p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and
                    recover without requiring special treatment. Older people, and those with underlying medical
                    problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more
                    likely to develop serious illness.</p><br>
                <p>The best way to prevent and slow down transmission is to be well informed about the COVID-19 virus,
                    the disease it causes and how it spreads. Protect yourself and others from infection by washing your
                    hands or using an alcohol based rub frequently and not touching your face. </p><br>
            </div>
            <button>Make an appointment</button>
        </div>
    </div>
</body>
<footer>
    <?php
      include('../commons/footer.php');
    ?>
</footer>

</html>