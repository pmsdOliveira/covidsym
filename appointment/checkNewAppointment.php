<?php
  session_start();

  if(!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 1 && $_SESSION["userType"] != 2))
    header('Location: ../commons/accessDenied.php');

  include("../commons/config.php");

  if ($_SESSION["userType"] == 1) {
    $query = 'SELECT id FROM patient WHERE patient.user_id = ' . $_SESSION["id"];
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $patient = mysqli_fetch_array($result);

    $query = 'INSERT INTO appointment(date, patient_id, medic_id) 
      VALUES ("' . date("Y-m-d") . '", ' . $patient["id"] . ', ' . $_POST["userID"] . ')';
    $result = mysqli_query($connect, $query);
  } else if ($_SESSION["userType"] == 2) {
    $query = 'SELECT id FROM medic WHERE medic.user_id = ' . $_SESSION["id"];
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $medic = mysqli_fetch_array($result);

    $query = 'INSERT INTO appointment(date, patient_id, medic_id) 
      VALUES ("' . date("Y-m-d") . '", ' .  $_POST["userID"] . ', ' . $medic["id"] . ')';
    $result = mysqli_query($connect, $query);
  }
  
  $_SESSION["appointmentID"] = mysqli_insert_id($connect);

  header('Location: ../appointment/symptomsAndRisks');
?>