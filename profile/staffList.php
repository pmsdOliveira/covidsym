<!DOCTYPE html>
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
  </head>

  <body>
    <?php include "../commons/navbar.php"; ?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <i class="fas fa-arrow-alt-circle-left goBackBtn">
              <a href="#"></a>
            </i>
            <h1>Staff</h1>
          </div>

          <div class="staffs-header">
            <p>Select a Staff Member to see his profile:</p>   
            <form action="" method="POST">  
              <select name="staff" id="staff" onchange="setTableCookie();">
                <?php
                  include("../commons/config.php");
                  if(isset($_COOKIE["table"])) {
                    $table = $_COOKIE["table"];
                    if ($table == "medic")
                      echo '<option value="medic" selected>Medic</option>
                            <option value="investigator">Investigator</option>
                            <option value="admin">Admin</option>';
                    else if ($table == "investigator")
                      echo '<option value="medic">Medic</option>
                            <option value="investigator" selected>Investigator</option>
                            <option value="admin">Admin</option>';
                    else if ($table == "admin")
                      echo '<option value="medic">Medic</option>
                            <option value="investigator">Investigator</option>
                            <option value="admin" selected>Admin</option>';
                  } else {
                    $table = "medic";
                    echo '<option value="medic" selected>Medic</option>
                          <option value="investigator">Investigator</option>
                          <option value="admin">Admin</option>';
                  }
                ?>
              </select>
            </form>
          </div>
          <div class="staffs-list">
          <?php
              $pageNumber = $_GET["page"];
              $firstResult = ($pageNumber - 1) * 5;

              $query = "SELECT * FROM " . $table;
              $result = mysqli_query($connect, $query)
                  or die(mysqli_error($connect));
              $nPages = intval(mysqli_num_rows($result) / 5 + 1);
              
              $query = "SELECT * FROM " . $table . " WHERE id > " . $firstResult;
              $result = mysqli_query($connect, $query)
                  or die(mysqli_error($connect));
            ?>
            <?php
              for ($i = 0; $i < 5; $i++) {
                echo '<div class="staff">';
                if ($staff = mysqli_fetch_array($result)) {
                  echo '<p>' . $staff["name"] . '</p>
                        <button class="button">Select</button>';
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
                  echo '<a href="staffList?page=' . $i . '">' . $i . '</a>';
                }
            ?>
          </div>
          <div class="staff-button">
            <a href="#">Create New Staff Member</a>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
    <script src="../js/staffList.js">setTableCookie()</script>
  </body>
</html>