<?php

function supportResult() {
    // Risk Factors
    $age = null; //GET FROM DB
    $kidneyDisease = $_POST["kidney"];
    $lungDisease = $_POST["lung"];
    $heartDisease = $_POST["heart"];
    $diabetes = $_POST["diabetes"];
    $recentlyTravelled = $_POST["travelled"];
    $stroke = $_POST["stroke"];
    $highBloodPressure = $_POST["blood"];

    // Symptoms
    $temperature = $_POST["temperature"];
    $dryCough = $_POST["cough"];
    $soreThroat = $_POST["throat"];
    $weakness = $_POST["weakness"];
    $breathingDificulties = $_POST["breathing"];
    $drowsiness = $_POST["drowsiness"];
    $chestPain = $_POST["pain"];
    $appetiteChange = $_POST["appetite"];
    $smellLoss = $_POST["smell"];
    $symptomsProgressed = $_POST["progressed"];

    // Decision Tree - exported from CART
    // ...

    return $result;
}
?>