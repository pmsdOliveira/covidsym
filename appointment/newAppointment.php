<!DOCTYPE html>

<?php
    session_start();

    if (!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 1 && $_SESSION["userType"] != 2)) {
        header('Location: ../commons/accessDenied.php');
    }
?>

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
        <?php
            include "../commons/config.php";
            if (isset($_GET["page"]))
                $pageNumber = $_GET["page"];
            else
                $pageNumber = 1;
            $firstResult = ($pageNumber - 1) * 5;

            if ($_SESSION["userType"] == 1)
                $query = "SELECT * FROM medic";
            else if ($_SESSION["userType"] == 2)
                $query = "SELECT * FROM patient";
            $result = mysqli_query($connect, $query)
                or die(mysqli_error($connect));

            $nResults = mysqli_num_rows($result);
            $nPages = intval($nResults / 5);
            $nPages += ($nResults % 5 == 0 ? 0 : 1);
        ?>
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
                        <?php
                            if ($_SESSION["userType"] == 1) {
                                echo '<p>Select which doctor should do the consultation:</p>';
                            } else if ($_SESSION["userType"] == 2) {
                                echo '<p>Select a patient to create an appointment:</p>';
                            }
                        ?>
                        <form action="../appointment/checkNewAppointment.php" method="POST">
                            <?php
                                include("../commons/stringManipulation.php");

                                if ($_SESSION["userType"] == 1) {
                                    $query = 'SELECT medic.id, medic.name, count(appointment.medic_id) AS nrAppointments 
                                        FROM medic LEFT JOIN appointment ON medic.id = appointment.medic_id 
                                        WHERE appointment.prescription IS NULL GROUP BY medic.id 
                                        -- ORDER BY nrAppointments';
                                    $appointmentsAuxString = 'Users waiting: ';
                                } else if ($_SESSION["userType"] == 2) {
                                    $query = 'SELECT patient.id, patient.name, count(appointment.patient_id) AS nrAppointments 
                                        FROM patient LEFT JOIN appointment ON patient.id = appointment.patient_id 
                                        GROUP BY patient.id 
                                        -- ORDER BY nrAppointments';
                                    $appointmentsAuxString = 'Appointments: ';
                                }

                                $result = mysqli_query($connect, $query)
                                    or die(mysqli_error($connect));

                                for ($i = 0; $i < $firstResult; $i++) {
                                    $user = mysqli_fetch_array($result);
                                }

                                for ($i = 0; $i < 5; $i++) {
                                    echo '<div class="medic">';
                                    if ($user = mysqli_fetch_array($result)) {
                                        echo '<p>' . getFirstAndLast($user["name"]) . '</p>
                                            <p>' . $appointmentsAuxString . $user["nrAppointments"] . '</p>
                                            <button type="submit" name="userID" value=' . $user["id"] . '>Select</button>';
                                    }

                                    echo '</div>';
                                }
                            ?>
                        </form>
                    </div>
                    
                    <div class="pages">
                    <?php
                        for ($i = 1; $i <= $nPages; $i++) {
                            if ($i == $pageNumber)
                                echo '<p>' . $i . '</p>';
                            else
                                echo '<a href="newAppointment?page=' . $i . '">' . $i . '</a>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>

        <?php include('../commons/footer.php'); ?>
    </body>

</html>