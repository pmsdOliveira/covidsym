<?php
  session_start();

  if(!isset($_SESSION["userType"]) || $_SESSION["userType"] != 0)
    header('Location: ../commons/accessDenied.php');

  include "../commons/config.php";

  $query = 'SELECT * FROM patient WHERE patient.user_id = ' . $_SESSION["id"];
  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  $patient = mysqli_fetch_array($result);

  $query = 'INSERT INTO appointment(date, patient_id, medic_id) 
    VALUES ("' . date("Y-m-d") . '", ' . $patient["id"] . ', ' . $_POST["medic-id"] . ')';
  $result = mysqli_query($connect, $query);
  $id = mysqli_insert_id($connect);

  header('Location: ../appointment/appointment.php?id=' . $id);
?>