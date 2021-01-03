<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - Appointment</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/appointment.css" />

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
            <h1>Appointment Nr 123456789</h1>
          </div>

          <div class="appointment-header">
            <p><span class="bold">Date: </span>dd/mm/aaaa</p>
            <p><span class="bold">Medic: </span>Dr. Asdrúbal Canhoto</p>
          </div>
          <div class="grid">
            <div class="diagnosis">
              <p><span class="bold">Diagnosis:</span></p>
              <textarea rows="8" readonly>Cancer</textarea>
            </div>
            <div class="prescription">
              <p><span class="bold">Prescription:</span></p>
              <textarea rows="8" readonly>Uninstall League</textarea>
            </div>
            <div class="notes">
              <p><span class="bold">Decision Notes:</span></p>
              <textarea rows="8" readonly>League causes cancer</textarea>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
