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
                    <td><label>nº12345678</label></td>
                    <td class="buttonSide">
                      <input type="submit" value="Update Profile" />
                    </td>
                  </tr>
                  <tr>
                    <td class="names"><label>Staff Type</label></td>
                    <td><label>Medic/Investigator/Admin</label></td>
                  </tr>
                </td>
              </tr>
              <tr>
                <td class="names"><label>Name</label></td>
                <td colspan="2">
                  <input name="name" value="Name from DB" type="text" />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Email</label></td>
                <td colspan="2">
                  <input
                    name="email"
                    value="Email from DB"
                    type="email"
                  />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Phone Number</label></td>
                <td colspan="2">
                  <input
                    name="number"
                    value="123456789"
                    type="text"
                  />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Address</label></td>
                <td colspan="2">
                  <input
                    name="address"
                    value="Address from DB"
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
