<?php
    include("../commons/config.php");

    $appointmentID = $_GET["appointmentID"];

    $query = "SELECT TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) AS age FROM appointment
              JOIN patient on appointment.patient_id = patient.id
              WHERE appointment.id = $appointmentID";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    $row = mysqli_fetch_array($result);
    $age = $row["age"];

    $query = "SELECT name, appointment_symptoms.value FROM appointment_symptoms
              JOIN symptom ON appointment_symptoms.symptom_id = symptom.id WHERE appointment_symptoms.appointment_id = $appointmentID
              UNION SELECT name, NULL FROM appointment_riskfactors 
              JOIN riskfactor ON appointment_riskfactors.riskfactor_id = riskfactor.id WHERE appointment_riskfactors.appointment_id = $appointmentID";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    while($row = mysqli_fetch_array($result)) {
        ($row["name"] == "Temperature") ? $temperature = $row["value"] : $temperature = null;
        ($row["name"] == "Symptoms Progressed") ? $symptomsProgressed = 1 : $symptomsProgressed = 0;
        ($row["name"] == "Recently Traveled") ? $recentlyTraveled = 1 : $recentlyTraveled = 0;
        ($row["name"] == "Drowsiness") ? $drowsiness= 1 : $drowsiness = 0;
        ($row["name"] == "Dry Cough") ? $dryCough = 1 : $dryCough = 0;
        ($row["name"] == "Chest Pain") ? $chestPain = 1 : $chestPain = 0;
        ($row["name"] == "Stroke or Reduced Imunity") ? $strokeOrReducedImunity = 1 : $strokeOrReducedImunity = 0;
        ($row["name"] == "Diabetes") ? $diabetes = 1 : $diabetes = 0;
    }

    // Decision Support System (Decision Tree)
    $supportResult = "Inconclusive";

    // Terminal Node 1
    if($symptomsProgressed && $recentlyTraveled && $age <= 27) {
        $supportResult = "Medium Risk";
    }

    // Terminal Node 2
    if($symptomsProgressed && $recentlyTraveled && $age > 27) {
        $supportResult = "High Risk";
    } 

    // Terminal Node 3
    if($drowsiness && !$symptomsProgressed && $recentlyTraveled) {
        $supportResult = "Medium Risk";
    } 

    // Terminal Node 4
    if(!$drowsiness && !$symptomsProgressed && $recentlyTraveled && $age <= 54 && $temperature <= 98.9) {
        $supportResult = "Medium Risk";
    }

    // Terminal Node 5
    if(!$drowsiness && !$symptomsProgressed && $recentlyTraveled && $age <= 54 && $temperature > 98.9) {
        $supportResult = "High Risk";
    }
    
    // Terminal Node 6
    if(!$drowsiness && !$symptomsProgressed && $recentlyTraveled && $age > 54) {
        $supportResult = "Low Risk";
    }

    // Terminal Node 7
    if($dryCough && $chestPain && !$recentlyTraveled) {
        $supportResult = "High Risk";
    }
    
    // Terminal Node 8
    if(!$dryCough && $chestPain && !$recentlyTraveled) {
        $supportResult = "Medium Risk";
    }
    
    // Terminal Node 9
    if($strokeOrReducedImunity && !$chestPain && !$recentlyTraveled) {
        $supportResult = "Medium Risk";
    }

    // Terminal Node 10
    if($diabetes && !$strokeOrReducedImunity && !$chestPain && !$recentlyTraveled) {
        $supportResult = "High Risk";
    }
    
    // Terminal Node 11
    if(!$diabetes && !$strokeOrReducedImunity && !$chestPain && !$recentlyTraveled) {
        $supportResult = "Low Risk";
    }

    $query = "UPDATE appointment SET result = '$supportResult' WHERE appointment.id = $appointmentID";
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
?>