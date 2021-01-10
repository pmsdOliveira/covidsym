<?php
    session_start();

    if (!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 1 && $_SESSION["userType"] != 2)) {
        header('Location: ../commons/accessDenied.php');
    }

    $appointmentID = $_SESSION["appointmentID"];

    $symptoms = array(
        $_POST["temperature"] = isset($_POST["temperature"]) ? $_POST["temperature"] : 'false',
        $_POST["cough"] = isset($_POST["cough"]) ? $_POST["cough"] : 'false',
        $_POST["throat"] = isset($_POST["throat"]) ? $_POST["throat"] : 'false',
        $_POST["weakness"] = isset($_POST["weakness"]) ? $_POST["weakness"] : 'false',
        $_POST["breathing"] = isset($_POST["breathing"]) ? $_POST["breathing"] : 'false',
        $_POST["drowsiness"] = isset($_POST["drowsiness"]) ? $_POST["drowsiness"] : 'false',
        $_POST["pain"] = isset($_POST["pain"]) ? $_POST["pain"] : 'false',
        $_POST["appetite"] = isset($_POST["appetite"]) ? $_POST["appetite"] : 'false',
        $_POST["progressed"] = isset($_POST["progressed"]) ? $_POST["progressed"] : 'false'
    );

    $riskFactors = array(
        $_POST["kidney"] = isset($_POST["kidney"]) ? $_POST["kidney"] : 'false',
        $_POST["lung"] = isset($_POST["lung"]) ? $_POST["lung"] : 'false',
        $_POST["heart"] = isset($_POST["heart"]) ? $_POST["heart"] : 'false',
        $_POST["diabetes"] = isset($_POST["diabetes"]) ? $_POST["diabetes"] : 'false',
        $_POST["travelled"] = isset($_POST["travelled"]) ? $_POST["travelled"] : 'false',
        $_POST["stroke"] = isset($_POST["stroke"]) ? $_POST["stroke"] : 'false',
        $_POST["blood"] = isset($_POST["blood"]) ? $_POST["blood"] : 'false'
    );

    include('../commons/config.php');

    $query = 'INSERT INTO appointment_symptoms (value, appointment_id, symptom_id) 
        VALUES (' . ($symptoms[0] * 1.8 + 32) . ', ' . $appointmentID . ', ' . '1), ';
    for ($i = 1; $i < count($symptoms); $i++) {
        if ($symptoms[$i] == 'true')
            $query .= '(NULL, ' . $appointmentID . ', ' . ($i + 1) . '), ';
    }
    $query = substr($query, 0, -2);
    echo '<p>' . $query . '</p>';
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    $query = 'INSERT INTO appointment_riskfactors (appointment_id, riskfactor_id) VALUES ';
    $queryValues = '';
    for ($i = 0; $i < count($riskFactors); $i++) {
        if ($riskFactors[$i] == 'true')
            $queryValues .= '(' . $appointmentID . ', ' . ($i + 1) . '), ';
    }

    if($queryValues != '') {
        $query .= $queryValues;
        $query = substr($query, 0, -2);
        echo '<p>' . $query . '</p>';
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
    }

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

    unset($_SESSION["appointmentID"]);
    header('Location: ../appointment/appointment.php?id=' . $appointmentID);
?>