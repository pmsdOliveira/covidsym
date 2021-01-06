<!DOCTYPE html>

<?php
  session_start();

  if (isset($_POST["username"]) && isset($_POST["email"]) && 
  isset($_POST["password"]) && isset($_POST["confirm-password"])) {
    $_SESSION["userType"] = 0; // user creating account
  } else if (!isset($_GET["id"])) {
    header('Location: http://localhost/covidsym/commons/accessDenied.php');
  } else {
    $_SESSION["userType"] = 1;
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
    <?php 
        include("../commons/config.php");
        if (isset($_GET["id"])) {
          $patientID = $_GET["id"];

          $query = "SELECT * FROM patient JOIN user ON patient.user_id = user.id WHERE patient.id = $patientID";
          $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
          $count = mysqli_num_rows($result);

          if ($count == 1) {
            $user = mysqli_fetch_array($result);
          }
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
            <h1>User Profile</h1>
          </div>

          <table class="table">
            <tr>
              <td class="table_left">
                <div class="profile">
                  <h2>
                    <?php
                      if ($_SESSION["userType"] == 0)
                        echo $_POST["username"];
                      else
                        echo $user["username"];
                    ?>
                  </h2>
                  <?php
                    if ($_SESSION["userType"] == 0)
                      echo '<i class="fas fa-user-circle"></i>';
                    else
                      echo '<img class="profile-pic" src="data:image/jpeg;base64,'. base64_encode($user["profile_pic"]) . '"/>';
                  ?>
                  <button>Update Picture</button>
                </div>
              </td>
              <td>
                <form method="POST" onsubmit="return validateUserProfileForm()"
                action="<?php echo $_SESSION["userType"] == 0 ? '../signup/checkSignup.php' : '../profile/checkUserProfile.php';?>">
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
                  <input type="submit" value="Update Profile" />
                  <?php
                    if ($_SESSION["userType"] == 0) {
                      echo '<input type="hidden" name="username" value="' . $_POST["username"] . '">
                            <input type="hidden" name="email" value="' . $_POST["email"] . '">
                            <input type="hidden" name="password" value="' . $_POST["password"] . '">';
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
