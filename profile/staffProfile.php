<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - Profile</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/staffProfile.css" />

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
    <?php 
        include("../commons/config.php");

        $staffType = $_GET["staff"];
        $staffID = $_GET["id"];

        $query = "SELECT * FROM $staffType JOIN user ON $staffType.user_id = user.id WHERE $staffType.id = $staffID";
        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $staff = mysqli_fetch_array($result);
        }
    ?>

    <?php include "../commons/navbar.php"; ?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <i class="fas fa-arrow-alt-circle-left goBackBtn">
              <a href="#"></a>
            </i>
            <h1>Staff Profile</h1>
          </div>

          <form action="updateStaffProfile.php" method="POST">
            <table class="form">
              <tr>
                <td>
                  <tr>
                    <td class="names"><label>Staff ID</label></td>
                    <td><label><?php echo $staffID?></label></td>
                    <td class="buttonSide">
                      <input type="submit" value="Update Profile" />
                    </td>
                  </tr>
                  <tr>
                    <td class="names"><label>Staff Type</label></td>
                    <td><label><?php echo $staffType?></label></td>
                  </tr>
                </td>
              </tr>
              <tr>
                <td class="names"><label>Name</label></td>
                <td colspan="2">
                  <input name="name" value="<?php echo $staff["name"]?>" type="text" />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Email</label></td>
                <td colspan="2">
                  <input
                    name="email"
                    value="<?php echo $staff["email"]?>"
                    type="email"
                  />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Phone Number</label></td>
                <td colspan="2">
                  <input
                    name="number"
                    value="<?php echo $staff["phone"]?>"
                    type="text"
                  />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Address</label></td>
                <td colspan="2">
                  <input
                    name="address"
                    value="<?php echo $staff["address"]?>"
                    type="text"
                  />
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
