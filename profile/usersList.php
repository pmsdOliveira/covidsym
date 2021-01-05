<!DOCTYPE html>
<html>

    <head>
        <title>COVIDSYM - Users List</title>

        <link rel="icon" href="../img/icon.ico" type="image/icon type">

        <link rel="stylesheet" href="../css/usersList.css">
        <link rel="preconnect" href="https://fonts.gstatic.com/">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>

    <body>
        <?php 
            include("../commons/config.php");
            $pageNumber = $_GET["page"];
            $firstResult = ($pageNumber - 1) * 5;

            $query = "SELECT * FROM patient";
            $result = mysqli_query($connect, $query)
                or die(mysqli_error($connect));
            $nPages = intval(mysqli_num_rows($result) / 5 + 1);
            
            $query = "SELECT * FROM patient WHERE id > " . $firstResult;
            $result = mysqli_query($connect, $query)
                or die(mysqli_error($connect));
        ?>

        <?php include "../commons/navbar.php"; ?>

        <div class="wrapper">
            <?php include "../commons/sidebar.php"?>

            <div class="content-wrapper">
                <div class="modal">
                    <div class="modal-header">
                        <i class="fas fa-arrow-alt-circle-left goBackBtn">
                            <a href="#"></a>
                        </i>
                        <h1>Users</h1>
                    </div>
                    <div class=" user-list">
                        <p>Select a user to see his profile:</p>
                        <?php
                            for ($i = 0; $i < 5; $i++) {
                                echo '<div class="user">';
                                if ($patient = mysqli_fetch_array($result)) {
                                    echo '<img class="profile-pic" src="data:image/jpeg;base64,'. base64_encode($patient["profile_pic"]) . '"/>';
                                    echo '<p>'. $patient["name"] . '</p>
                                        <button class="patient-button" id="' . $patient["id"] . '">Select</button>';
                                }
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="pages">
                        <?php
                            for ($i = 1; $i <= $nPages; $i++) {
                                if ($i == $pageNumber)
                                    echo '<p class="bold">' . $i . '</p>';
                                else
                                    echo '<a href="usersList?page=' . $i . '">' . $i . '</a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../commons/footer.php'); ?>

        <script src="../js/userList.js"></script>
    </body>

</html>