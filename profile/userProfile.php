<!DOCTYPE html>

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
                  <h2>[Username]</h2>
                  <i class="fas fa-user-circle profileIcon"></i>
                  <button>Update Picture</button>
                </div>
              </td>
              <td>
                <form action="submitUserRegistry.php" method="POST" onsubmit="return validateUserProfileForm()">
                  <table class="form">
                    <tr>
                      <td><label>Name</label></td>
                      <td>
                        <input id="profile-name" name="name" value="Name from DB" type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Phone Number</label></td>
                      <td>
                        <input id="profile-phone" name="phone" value="XXXXXXXXXX from DB" type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Address</label></td>
                      <td>
                        <input id="profile-address" name="address" value="Adress from DB" type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Local</label></td>
                      <td>
                        <input id="profile-local" name="local" value="Local from DB" type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>District</label></td>
                      <td>
                        <input id="profile-district" name="district" value="District from DB" type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Birthdate</label></td>
                      <td><input id="profile-birthdate" name="birthdate" type="date" required/></td>
                    </tr>
                    <tr>
                      <td><label>Gender</label></td>
                      <td>
                        <div class="gender">
                          <label>Male
                            <input name="gender" type="radio" value="male" required/>
                          </label>
                          <label>Female
                            <input name="gender" type="radio" value="female" required/>
                          </label>
                          <label>Other
                            <input name="gender" type="radio" value="other" required/>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Fiscal Number</label></td>
                      <td>
                        <input id="profile-fiscal" name="fiscal" value="XXXXXXXX from DB" type="text" required/>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Healthcare Number</label></td>
                      <td>
                        <input id="profile-healthcare" name="healthcare" value="XXXXXXXX from DB" type="text" required/>
                      </td>
                    </tr>
                  </table>
                  <input type="submit" value="Update Profile" />
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
