<!DOCTYPE html>

<?php
  session_start();

  if (!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 1 && $_SESSION["userType"] != 2)) {
    header('Location: ../commons/accessDenied.php');
  }
?>

<html>
  <head>
    <title>COVIDSYM - Appointments</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/appointmentsList.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
  </head>

  <body>
    <?php
      include "../commons/config.php";
      if (isset($_GET["page"]))
        $pageNumber = $_GET["page"];
      else
        $pageNumber = 1;
      $firstResult = ($pageNumber - 1) * 5;

      if ($_SESSION["userType"] == 1) {
        $query = 'SELECT id FROM patient WHERE patient.user_id = ' . $_SESSION["id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $patient = mysqli_fetch_array($result);

        $query = 'SELECT appointment.id, appointment.date, patient.name AS patient, medic.name, appointment.date, appointment.prescription 
          FROM appointment 
          INNER JOIN patient ON appointment.patient_id = patient.id 
          INNER JOIN medic ON appointment.medic_id = medic.id
          WHERE patient.id = ' . $patient["id"];      
      } else if ($_SESSION["userType"] == 2) {
        $query = 'SELECT id FROM medic WHERE medic.user_id = ' . $_SESSION["id"];
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $medic = mysqli_fetch_array($result);

        $query = 'SELECT appointment.id, appointment.date, patient.name AS patient, medic.name, appointment.date, appointment.prescription 
          FROM appointment 
          INNER JOIN patient ON appointment.patient_id = patient.id 
          INNER JOIN medic ON appointment.medic_id = medic.id
          WHERE medic.id = ' . $medic["id"];  
      }

      $result = mysqli_query($connect, $query)
        or die(mysqli_error($connect));
      $nResults = mysqli_num_rows($result);
      $nPages = intval($nResults / 5);
      $nPages += ($nResults % 5 == 0 ? 0 : 1);
      
    ?>
    <?php include "../commons/navbar.php"; ?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <i class="fas fa-arrow-alt-circle-left goBackBtn">
              <a href="#"></a>
            </i>
            <h1>Appointments</h1>
          </div>

          <div class="appointments-header">
            <p>Select an appointment:</p>
            <div class="pages">
              <?php
                for ($i = 1; $i <= $nPages; $i++) {
                  if ($i == $pageNumber)
                    echo '<p>' . $i . '</p>';
                  else
                    echo '<a href="appointmentsList?page=' . $i . '">' . $i . '</a>';
                }
              ?>
            </div>
          </div>
          <div class="appointments-list">
            <?php
                include("../commons/stringManipulation.php");

                for ($i = 0; $i < $firstResult; $i++) {
                  $appointment = mysqli_fetch_array($result);
                }
                
                for ($i = 0; $i < 5; $i++) {
                  echo '<div class="appointment">';
                  if ($appointment = mysqli_fetch_array($result)) {
                    $closed = $appointment["prescription"] == null ? "No" : "Yes";

                    echo '<div class="appointment-date">
                            <i class="fas fa-calendar-day"></i>
                            <p>' . $appointment["date"] . '</p>
                          </div>';
                    if($_SESSION["userType"] == 1) {
                        echo '<div class="appointment-id">
                                <p>Dr. ' . getFirstAndLast($appointment["name"]) . '</p>
                             </div>';
                    } else {
                        echo '<div class="appointment-id">
                            <p>' . getFirstAndLast($appointment["patient"]) . '</p>
                        </div>';
                    } 
                    echo '<p>Closed: ' . $closed . '</p>
                          <a href="appointment?id=' . $appointment["id"] . '">Select</i></a>';
                  }
                  echo '</div>';
                }
            ?>

          <a class="appointment-button" href="newAppointment?page=1">Make a new Appointment</a>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
