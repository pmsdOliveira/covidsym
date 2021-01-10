<?php
  session_start();

  if(!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 2))
    header('Location: ../commons/accessDenied.php');

  include("../commons/config.php");

  echo $_POST["appointmentID"];

  $query = 'UPDATE appointment SET prescription = "' . htmlspecialchars($_POST["prescription"])
    . '", notes = "' . htmlspecialchars($_POST["notes"]) . '" WHERE id = ' . $_POST["appointmentID"];
  $result = mysqli_query($connect, $query);

  header('Location: ../appointment/appointment?id=' . $_POST["appointmentID"]);
?>