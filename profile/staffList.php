<!DOCTYPE html>

<?php
    session_start();

    include("../commons/config.php");
?>

<html>
  <head>
    <title>COVIDSYM - Staff List</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/staffList.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>

  <body>
    <?php include "../commons/navbar.php"; ?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <h1>Staff</h1>
          </div>

          <div class="staffs-header">
            <p>Select a Staff Member to see his profile:</p>   
            <form action="" method="POST">  
              <select name="staff" id="staff" onchange="setTableCookie();">
                <?php
                  include("../commons/config.php");
                  if(isset($_GET["type"])) {
                    $table = $_GET["type"];
                    if ($table == "Medic")
                      echo '<option value="Medic" selected>Medic</option>
                            <option value="Investigator">Investigator</option>
                            <option value="Admin">Admin</option>';
                    else if ($table == "Investigator")
                      echo '<option value="Medic">Medic</option>
                            <option value="Investigator" selected>Investigator</option>
                            <option value="Admin">Admin</option>';
                    else if ($table == "Admin")
                      echo '<option value="Medic">Medic</option>
                            <option value="Investigator">Investigator</option>
                            <option value="Admin" selected>Admin</option>';
                  } else {
                    $table = "Medic";
                    echo '<option value="Medic" selected>Medic</option>
                          <option value="Investigator">Investigator</option>
                          <option value="Admin">Admin</option>';
                  }
                ?>
              </select>
            </form>
          </div>
          <div class="staffs-list">
          <?php
              if (isset($_GET["page"]))
                $pageNumber = $_GET["page"];
              else
                $pageNumber = 1;
              $firstResult = ($pageNumber - 1) * 5;

              $query = "SELECT * FROM " . $table;
              $result = mysqli_query($connect, $query)
                  or die(mysqli_error($connect));
              $nResults = mysqli_num_rows($result);
              $nPages = intval($nResults / 5);
              $nPages += ($nResults % 5 == 0 ? 0 : 1);
              
              $query = "SELECT * FROM " . $table . " WHERE id > " . $firstResult;
              $result = mysqli_query($connect, $query)
                  or die(mysqli_error($connect));
              
              for ($i = 0; $i < 5; $i++) {
                echo '<div class="staff">';
                if ($staff = mysqli_fetch_array($result)) {
                  echo '<p>' . $staff["name"] . '</p>
                        <a class="button" href="../profile/staffProfile.php?staff=' . 
                        $table . '&id=' . $staff["id"] . '">Select</a>';
                }       
                echo '</div>';
              }
            ?>
          </div>
          <div class="pages">
            <?php
              for ($i = 1; $i <= $nPages; $i++) {
                if ($i == $pageNumber)
                  echo '<p>' . $i . '</p>';
                else
                  echo '<a href="staffList?page=' . $i . '">' . $i . '</a>';
                }
            ?>
          </div>
          <div class="staff-button">
            <a href="../signup/adminNewStaff">Create New Staff Member</a>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
    <script src="../js/staffList.js">setTableCookie()</script>
  </body>
</html>