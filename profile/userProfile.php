<!DOCTYPE html>

<?php
  session_start();

  include("../commons/config.php");
  if (isset($_SESSION["userType"])) {
    if (isset($_GET["id"]) && ($_SESSION["userType"] == 1 || $_SESSION["userType"] == 2 || $_SESSION["userType"] == 4)) {
      $patientID = $_GET["id"];
  
      $query = "SELECT * FROM patient JOIN user ON patient.user_id = user.id WHERE patient.id = $patientID";
      $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  
      $user = mysqli_fetch_array($result);
    } else if ($_SESSION["userType"] != 0) {
      header('Location: ../commons/accessDenied.php');
    } 
  } else {
    header('Location: ../commons/accessDenied.php');
  }
?>

<html>
  <head>
    <title>COVIDSYM - Profile</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/userProfile.css" />

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
      <?php 
        if ($_SESSION["userType"] != 0) {
          include "../commons/sidebar.php";
          echo '<div class="content-wrapper" style="margin-left: 200px;">';
        } else {
          echo '<div class="content-wrapper">';
        }
      ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <i class="fas fa-arrow-alt-circle-left goBackBtn">
              <a href="#"></a>
            </i>
            <h1>User Profile</h1>
          </div>

          <table class="table">
            <tr>
              <td class="table_left">
                <form method="POST" action="../profile/checkUserProfile.php" enctype="multipart/form-data" onsubmit="return validateUserProfileForm()">
                <div class="profile">
                  <h2>
                    <?php
                      if ($_SESSION["userType"] == 0) {
                        echo $_SESSION["username"];
                      } else {
                        echo $user["username"];
                      }
                    ?>
                  </h2>
                  <?php
                    if ($_SESSION["userType"] == 0)
                      echo '<img id="profile-pic" class="profile-pic" src="../img/profileDefault.jpg"/>';
                    else
                      if($user["profile_pic"] == null) {
                        echo '<img id="profile-pic" class="profile-pic" src="../img/profileDefault.jpg"/>';
                      } else {
                        echo '<img id="profile-pic" class="profile-pic" src="data:image/jpeg;base64,'. base64_encode($user["profile_pic"]) . '"/>';
                      }
                  ?>

                    <label for="file-upload" class="file-upload">
                        <input name="picture" onchange=fileChanged() id="file-upload" type="file" accept="image/*"/>
                        Upload Picture
                    </label>
                </div>
              </td>
              <td>
                  <table class="form">
                    <tr>
                      <td><label>Name</label></td>
                      <td>
                        <input id="profile-name" name="name"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["name"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Phone Number</label></td>
                      <td>
                        <input id="profile-phone" name="phone"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["phone"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Address</label></td>
                      <td>
                        <input id="profile-address" name="address"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["address"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Local</label></td>
                      <td>
                        <input id="profile-local" name="local"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["local"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>District</label></td>
                      <td>
                        <input id="profile-district" name="district"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["district"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Birthdate</label></td>
                      <td>
                        <input id="profile-birthdate" name="birthdate"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["birthdate"];?>"
                        type="date" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Gender</label></td>
                      <td>
                        <div class="gender">
                          <label>Male
                            <input name="gender" type="radio" value="M" required
                                <?php echo $_SESSION["userType"] == 0 ? '' : ($user["gender"] == "M") ? "checked" : null;?>
                            />
                          </label>
                          <label>Female
                            <input name="gender" type="radio" value="F" required
                                <?php echo $_SESSION["userType"] == 0 ? '' : ($user["gender"] == "F") ? "checked" : null ?>
                            />
                          </label>
                          <label>Other
                            <input name="gender" type="radio" value="O" required
                                <?php echo $_SESSION["userType"] == 0 ? '' : ($user["gender"] == "O") ? "checked" : null ?>
                            />
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Fiscal Number</label></td>
                      <td>
                        <input id="profile-fiscal" name="fiscal"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["fiscal_number"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Healthcare Number</label></td>
                      <td>
                        <input id="profile-healthcare" name="healthcare"
                        value="<?php echo $_SESSION["userType"] == 0 ? '' : $user["healthcare_number"];?>"
                        type="text" required/>
                      </td>
                    </tr>
                  </table>
                  <input type="submit" value="<?php echo $_SESSION["userType"] == 0 ? 'Create Profile' : 'Update Profile'?>" />
                  <?php
                    if ($_SESSION["userType"] == 0) {
                      echo '<input type="hidden" name="username" value="' . $_SESSION["username"] . '">
                            <input type="hidden" name="email" value="' . $_SESSION["email"] . '">
                            <input type="hidden" name="password" value="' . $_SESSION["password"] . '">';
                    }
                  ?>
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>

    <script src="../js/profile.js"></script>
  </body>
</html>
