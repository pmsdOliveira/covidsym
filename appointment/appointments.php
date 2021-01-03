<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - Appointments</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/appointments.css" />

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
            <h1>Appointments</h1>
          </div>

          <div class="appointments-header">
            <p>Select an appointment:</p>
            <div class="pages">
              <a class="currentPage">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <a href="#">></a>
            </div>
          </div>
          <div class="appointments-list">
            <?php
                for ($i = 0; $i < 5; $i++) {
                    echo '<div class="appointment">
                            <div class="appointment-id">
                              <i class="fas fa-clipboard-list"></i>
                              <p>Nº ' . ($i + 1) . '</p>
                            </div>
                            <div class="appointment-date">
                            <i class="fas fa-calendar-day"></i>
                              <p>dd/mm/aaaa</p>
                            </div>
                            <p>Diagnosis: NA</p>
                            <i class="fas fa-arrow-right"><a href="#"></a></i>
                        </div>';
                }
            ?>
          </div>

          <div class="appointment-button">
            <a href="#">Make a new Appointment</a>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
