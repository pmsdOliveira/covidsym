<!DOCTYPE html>
<?php
  session_start();

  if (!isset($_SESSION["userType"]) || $_SESSION["userType"] != 3) {
    header('Location: ../commons/accessDenied.php');
  }
?>

<html>
  <head>
    <title>COVIDSYM - Statistics</title>
    <link rel="icon" href="../img/icon.ico" type="image/icon type" />
    <link rel="stylesheet" href="../css/statistics.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  </head>

  <body>
    <?php 
        include("../commons/config.php");       

        $query = "SELECT (SELECT COUNT(patient.id) FROM patient) as patients,
                         (SELECT COUNT(medic.id) from medic) as medics,
                         (SELECT COUNT(investigator.id) from investigator) as investigators,
                         (SELECT COUNT(admin.id) from admin) as admins";

        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $firstChartData = mysqli_fetch_array($result);

        $query = "SELECT (SELECT COUNT(*) FROM `appointment` WHERE appointment.prescription IS NULL) as waiting,
                         (SELECT COUNT(*) FROM `appointment` WHERE appointment.prescription IS NOT NULL) as prescribed";

        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $secondChartData = mysqli_fetch_array($result);

        $query = "SELECT extract(year FROM appointment.date) as year,
                         extract(month FROM appointment.date) as month,
                         COUNT(appointment.date) as cnt FROM `appointment`
                  GROUP BY extract(year FROM appointment.date),
                           extract(month FROM appointment.date)
                  ORDER BY year, month";

        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $thirdChartData = [];

        while($row = mysqli_fetch_array($result)) {
            array_push($thirdChartData, $row);
        }

        $query = "SELECT COUNT(symptom.name) as cnt, symptom.name FROM appointment_symptoms
                  JOIN symptom ON appointment_symptoms.symptom_id = symptom.id 
                  GROUP BY symptom.name
                  UNION SELECT COUNT(riskfactor.name) as cnt, riskfactor.name FROM appointment_riskfactors
                  JOIN riskfactor ON appointment_riskfactors.riskfactor_id = riskfactor.id
                  GROUP BY riskfactor.name
                  ORDER BY `cnt`  DESC";

        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
        $fourthChartData = [];

        while($row = mysqli_fetch_array($result)) {
            array_push($fourthChartData, $row);
        }
    ?>

    <?php include "../commons/navbar.php"; ?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <h1>Statistics</h1>
          </div>

          <div class="modal-body">
            <script>
                var firstData = <?php echo json_encode($firstChartData); ?>;
                var secondData = <?php echo json_encode($secondChartData); ?>;
                var thirdData = <?php echo json_encode($thirdChartData); ?>;
                var fourthData = <?php echo json_encode($fourthChartData); ?>;
            </script>

            <div class="users-chart">
                <canvas id="first-chart" ></canvas>
            </div>
            <div class="prescribed-chart">
                <canvas id="second-chart"></canvas>
            </div>
            <div class="appointments-chart">
                <canvas id="third-chart"></canvas>
            </div>
            <div class="symptoms-risks-chart">
                <canvas id="fourth-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
    <script src="../js/statistics.js"></script>
  </body>
</html>
