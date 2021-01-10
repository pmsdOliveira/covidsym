<?php
  session_start();

  if(!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 2))
    header('Location: ../commons/accessDenied.php');

  include("../commons/config.php");

  $query = 'UPDATE appointment SET prescription = "' . htmlspecialchars($_POST["prescription"])
    . '", notes = "' . htmlspecialchars($_POST["notes"]) . '" WHERE id = ' . $_POST["appointmentID"];
  $result = mysqli_query($connect, $query);

  $query = 'SELECT user.email, appointment.date, patient.name, medic.name AS medicName,
    appointment.result, appointment.prescription
    FROM user INNER JOIN patient ON user.id = patient.user_id 
    INNER JOIN appointment ON patient.id = appointment.patient_id 
    INNER JOIN medic ON medic.id = appointment.medic_id
    WHERE appointment.id = ' . $_POST["appointmentID"];

  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  $data = mysqli_fetch_array($result);

  $query = 'SELECT * FROM appointment_symptoms
    JOIN symptom ON appointment_symptoms.symptom_id = symptom.id
    WHERE appointment_symptoms.appointment_id = ' . $_POST['appointmentID'];
  $symptoms = mysqli_query($connect, $query) or die(mysqli_error($connect));

  $query = 'SELECT * FROM appointment_riskfactors
    JOIN riskfactor ON appointment_riskfactors.riskfactor_id = riskfactor.id
    WHERE appointment_riskfactors.appointment_id = ' . $_POST["appointmentID"];
  $riskfactors = mysqli_query($connect, $query) or die(mysqli_error($connect));

  $numSymptoms = mysqli_num_rows($symptoms);
  $numRisks = mysqli_num_rows($riskfactors);
  $symptomsCounter = 1;
  $risksCounter = 1;
  $symptomsAndRisks = "";

  while($symptom = mysqli_fetch_array($symptoms)) {
      if($symptom["name"] == "Temperature") {
          $symptomsAndRisks = 'Temperature =' . round((($symptom["value"] - 32) / 1.8), 1) . 'ºC' . $symptomsAndRisks;
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

  $message = 'Dear ' . $data["name"] . ',' . PHP_EOL . 'Your appointment with ' . $data["medicName"] . ' has been updated.
    Here is the resume:' . PHP_EOL . 'Symptoms and Risk Factors: ' . $symptomsAndRisks . PHP_EOL
    . ;
  echo $message;
  //mail($data["email"], $data["date"] . '\'s Appointment Results', )

  //header('Location: ../appointment/appointment?id=' . $_POST["appointmentID"]);
?>