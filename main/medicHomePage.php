<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - Home Page</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" type="text/css" href="../css/medicHomePage.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
    />
  </head>

  <body>
    <?php include "../commons/navbar.php"; ?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="image-wrapper">
          <img src="../img/logo.png" height="50px" style="margin: auto" />
        </div>

        <div class="modal">
          <div class="modal-header">
            <h1>Welcome, {Medic Name}</h1>
          </div>

          <div class="modal-body">
            <table>
              <tr>
                <td><h1>Users waiting for appointment:</h1></td>
                <td>420</td>
              </tr>
            </table>
            <button>See Appointments</button>
            <button>New Appointment</button>
          </div>
        </div>
      </div>
    </div>

    <?php include "../commons/footer.php"; ?>
  </body>
</html>
