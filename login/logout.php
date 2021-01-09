<?php
    session_start();
    session_destroy();

    ob_start();
    header("Location: ../index");
    ob_end_flush();
    die();
?>