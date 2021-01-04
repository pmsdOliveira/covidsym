<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - New Staff Member</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/staffRegistry.css" />

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
            <h1>New Staff</h1>
          </div>

          <form action="updateStaffProfile.php" method="POST">
            <table class="form">
              <tr>
                <td class="names"><label>Name</label></td>
                <td colspan="3">
                  <input name="name" placeholder="Name" type="text" />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Email</label></td>
                <td colspan="3">
                  <input name="email" placeholder="Email" type="email" />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Phone Number</label></td>
                <td colspan="3">
                  <input
                    name="number"
                    placeholder="Phone number"
                    type="number"
                  />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Address</label></td>
                <td colspan="3">
                  <input name="address" placeholder="Address" type="text" />
                </td>
              </tr>
              <tr>
                <td class="names"><label>Password</label></td>
                <td>
                  <input
                    name="password"
                    placeholder="********"
                    type="password"
                  />
                </td>
                <td class="names"><label>Staff Type</label></td>
                <td>
                  <select name="staff" id="staff">
                    <option value="Medic">Medic</option>
                    <option value="Investigator">Investigator</option>
                    <option value="Admin">Admin</option>
                  </select>
                </td>
              </tr>
            </table>
            <input type="submit" value="Submit" />
          </form>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
