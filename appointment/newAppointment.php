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
        <?php
            include "../commons/config.php";
            if (isset($_GET["page"]))
                $pageNumber = $_GET["page"];
            else
                $pageNumber = 1;
            $firstResult = ($pageNumber - 1) * 5;

            $query = "SELECT * FROM medic";
            $result = mysqli_query($connect, $query)
                or die(mysqli_error($connect));
            $nPages = intval(mysqli_num_rows($result) / 5 + 1);
            
            $query = "SELECT medic.id, medic.name FROM medic WHERE medic.id > " . $firstResult;
            $result = mysqli_query($connect, $query)
                or die(mysqli_error($connect));
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
                        <p>Select which doctor should do the consultation:</p>
                        <?php
                            for ($i = 0; $i < 5; $i++) {
                                echo '<div class="medic">';
                                if ($medic = mysqli_fetch_array($result)) {
                                    $countQuery = 'SELECT count(appointment.medic_id) AS waiting_list 
                                        FROM medic INNER JOIN appointment ON medic.id = appointment.medic_id 
                                        WHERE medic.id =' . (($pageNumber - 1) * 5 + ($i + 1));
                                    $countResult = mysqli_query($connect, $countQuery)
                                        or die(mysqli_error($connect));
                                    $waitingList = mysqli_fetch_array($countResult);
                                    echo '<p>' . $medic["name"] . '</p>
                                        <p>Users waiting: ' .$waitingList["waiting_list"] . '</p>
                                        <button>Select</button>';
                                }
                            echo '</div>';
                            }
                        ?>
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