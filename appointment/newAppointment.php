<!DOCTYPE html>
<html>

    <head>
        <title>COVIDSYM - New Appointment</title>

        <link rel="icon" href="../img/icon.ico" type="image/icon type">

        <link rel="stylesheet" href="../css/newAppointment.css">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>

    <body>
        <?php include "../commons/navbar.php"; ?>

        <div class="wrapper">
            <?php include "../commons/sidebar.php"?>

            <div class="content-wrapper">
                <div class="modal">
                    <div class="modal-header">
                        <i class="fas fa-arrow-alt-circle-left goBackBtn">
                            <a href="#"></a>
                        </i>
                        <h1 class="title">New Appointment</h1>
                    </div>
                    <div class="medic-list">
                        <p>Select which doctor should do the consultation:</p>
                        <?php
                            for ($i = 0; $i < 5; $i++) {
                                echo '<div class="medic">
                                        <i class="fas fa-user-circle"></i>
                                        <p>Hipólito Asdrubal</p>
                                        <p>Users waiting: XX</p>
                                        <button>Select</button>
                                    </div>';
                            }
                        ?>
                    </div>
                    <div class="pages">
                        <a class="currentPage">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">></a>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../commons/footer.php'); ?>
    </body>

</html>