<!DOCTYPE html>

<?php
  session_start();

  if (!isset($_SESSION["userType"]))
    header('Location: ../commons/accessDenied.php');
?>

<html>
  <head>
    <title>COVIDSYM - Appointment</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/appointment.css" />

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
        include("../commons/config.php");
        $query = 'SELECT MAX(id) AS maxID FROM appointment';
        $result = mysqli_query($connect, $query);
        $appointment = mysqli_fetch_array($result);

        if (isset($_GET["id"]) && $_GET["id"] <= $appointment["maxID"])
          $appointmentID = $_GET["id"];
        else
          header('Location: ../commons/pageNotFound.php');

        $query = "SELECT appointment.id AS id, appointment.date AS date, medic.name AS medicName,
                  patient.name AS patientName, appointment.result AS supportResult,
                  appointment.prescription as prescription, appointment.notes as notes
                  FROM appointment
                  JOIN patient ON appointment.patient_id = patient.id
                  JOIN medic ON appointment.medic_id = medic.id
                  WHERE appointment.id = $appointmentID";

        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $appointment = mysqli_fetch_array($result);
        }

        $query = "SELECT * FROM appointment_symptoms
                    JOIN symptom ON appointment_symptoms.symptom_id = symptom.id
                    WHERE appointment_symptoms.appointment_id = $appointmentID";

        $symptoms = mysqli_query($connect, $query) or die(mysqli_error($connect));

        $query = "SELECT * FROM appointment_riskfactors
                    JOIN riskfactor ON appointment_riskfactors.riskfactor_id = riskfactor.id
                    WHERE appointment_riskfactors.appointment_id = $appointmentID";

        $riskfactors = mysqli_query($connect, $query) or die(mysqli_error($connect));

        $numSymptoms = mysqli_num_rows($symptoms);
        $numRisks = mysqli_num_rows($riskfactors);
        $symptomsCounter = 1;
        $risksCounter = 1;
        $symptomsAndRisks = "";

        while($symptom = mysqli_fetch_array($symptoms)) {
            if($symptom["name"] == "Temperature") {
                $symptomsAndRisks = 'Temperature (' . round((($symptom["value"] - 32) / 1.8), 1) . 'ºC)' . $symptomsAndRisks;
            } else {
                $symptomsAndRisks = $symptomsAndRisks . $symptom["name"];
            }

            if($symptomsCounter == $numSymptoms AND $numRisks == 0) {
                $symptomsAndRisks = $symptomsAndRisks . '.';
            } else {
                $symptomsAndRisks = $symptomsAndRisks . ', ';
            }

            $symptomsCounter++;
        }

        while($risk = mysqli_fetch_array($riskfactors)) {
            $symptomsAndRisks = $symptomsAndRisks . $risk["name"];

            if($risksCounter == $numRisks) {
                $symptomsAndRisks = $symptomsAndRisks . '.';
            } else {
                $symptomsAndRisks = $symptomsAndRisks . ', ';
            }

            $risksCounter++;
        }
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
            <h1>Appointment Num. <?php echo $appointment["id"]?></h1>
          </div>

          <div class="appointment-header">
            <p><span class="bold">Date: </span><?php echo date("d-m-Y", strtotime($appointment["date"]))?></p>
            <p><span class="bold">Medic: </span><?php echo $appointment["medicName"]?></p>
            <p><span class="bold">Patient: </span><?php echo $appointment["patientName"]?></p>
          </div>
          <div class="grid">
            <div class="sypmtoms-risks">
              <p><span class="bold">Symptoms and Risks:</span></p>
              <textarea rows="8" readonly><?php echo $symptomsAndRisks?></textarea>
            </div>
            <?php
              if ($_SESSION["userType"] == 2)
                echo '<div class="diagnosis">
                        <p><span class="bold">Support System Result:</span></p>
                        <textarea rows="8" readonly><?php echo $appointment["supportResult"]?></textarea>
                      </div>';
            ?>
            <div class="prescription">
              <p><span class="bold">Prescription:</span></p>
              <textarea rows="8" readonly><?php echo $appointment["prescription"]?></textarea>
            </div>
            <?php
              if ($_SESSION["userType"] == 1)
                echo '<div class="notes" style="grid-column: 1 / span 2;">
                        <p><span class="bold">Decision Notes:</span></p>
                        <textarea rows="8" readonly>' . $appointment["notes"] . '</textarea>
                      </div>';
            ?>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
