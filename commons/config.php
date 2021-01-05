<?php
    define("DB_SERVER", "localhost");
    define("DB_USERNAME", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "covidsym");

    $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) 
        or die("Error connecting to COVIDSYM database.");
?>