<!DOCTYPE html>

<?php 
    session_start()

    if (isset($_SESSION["userType"]) && $_SESSION["userType"] == 3)
    header('Location: http://localhost/covidsym/commons/accessDenied.php');
?>