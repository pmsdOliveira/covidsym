<!DOCTYPE html>

<html>
    <head>
        <title>Sidebar</title>

        <link rel="preconnect" href="https://fonts.gstatic.com/ ">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        
        <link rel="icon" href="../img/icon.ico" type="image/icon type">
    
        <link rel="stylesheet" type="text/css" href="../css/sidebar.css">
    </head>

    <body>
        <div class="sidebar">
            <a class="sidebar-button" href="../home/homePage">
                <i class="fas fa-home icon"></i>
                Home Page
            </a>
            
            <?php
                if($_SESSION["userType"] == 1) {
                    $sidebarQuery = 'SELECT id FROM patient WHERE patient.user_id = ' . $_SESSION["id"];
                    $sidebarResult = mysqli_query($connect, $sidebarQuery) or die(mysqli_error($connect));
                    $sidebarPatient = mysqli_fetch_array($sidebarResult);

                    echo '<a class="sidebar-button" href="../profile/userProfile.php?id=' . $sidebarPatient["id"] . '">
                              <i class="far fa-id-card icon"></i>    
                              Profile
                          </a>';
                    echo '<a class="sidebar-button" href="../appointment/appointmentsList">
                            <i class="far fa-calendar-check icon"></i>    
                            Appointments
                        </a>
                        <a class="sidebar-button" href="../info/faq">
                            <i class="far fa-question-circle icon"></i> 
                            FAQ
                        </a>';
                } else if($_SESSION["userType"] == 2) {
                    $sidebarQuery = 'SELECT id FROM medic WHERE medic.user_id = ' . $_SESSION["id"];
                    $sidebarResult = mysqli_query($connect, $sidebarQuery) or die(mysqli_error($connect));
                    $sidebarMedic = mysqli_fetch_array($sidebarResult);

                    echo '<a class="sidebar-button" href="../profile/staffProfile.php?id=' . $sidebarMedic["id"] . '">
                              <i class="far fa-id-card icon"></i>    
                              Profile
                          </a>';
                    echo '<a class="sidebar-button" href="../profile/usersList">
                            <i class="fas fa-users icon"></i>  
                            Users
                        </a>
                        <a class="sidebar-button" href="../appointment/appointmentsList">
                            <i class="far fa-calendar-check icon"></i>    
                            Appointments
                        </a>';
                } else if($_SESSION["userType"] == 3) {
                    echo '<a class="sidebar-button" href="../statistics/charts">
                              <i class="fas fa-chart-line icon"></i>    
                              Statistics
                          </a>';
                } else if($_SESSION["userType"] == 4) {
                    echo '<a class="sidebar-button" href="../profile/usersList">
                              <i class="fas fa-users icon"></i>    
                              Users
                          </a>
                          <a class="sidebar-button" href="../profile/staffList">
                              <i class="fas fa-users-cog icon"></i>
                              Staff
                          </a>';
                }
            ?>
        </div>
    </body>
</html>