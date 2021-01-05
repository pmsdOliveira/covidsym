<?php
    include('config.php');
    session_start();
    
    if(!isset($_SESSION["user"])){
        header("location: ../login/userLogin.php");
        die();
    } else {
        $userID = $_SESSION['user'];
    
        // code here for user related stuff that need to come from DB

        // EXAMPLE:
        // $ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
        // $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        // $login_session = $row['username'];
    }    
?>