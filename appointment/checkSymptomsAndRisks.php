<?php
    session_start();

    if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != 1) {
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
    for ($i = 0; $i < count($riskFactors); $i++) {
        if ($riskFactors[$i] == 'true')
            $query .= '(' . $appointmentID . ', ' . ($i + 1) . '), ';
    }
    $query = substr($query, 0, -2);
    echo '<p>' . $query . '</p>';
    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));

    
    unset($_SESSION["appointmentID"]);

    header('Location: ../appointment/appointment.php?id=' . $appointmentID);
?>