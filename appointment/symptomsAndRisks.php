<!DOCTYPE html>

<?php
  session_start();

  if (!isset($_SESSION["userType"]) || ($_SESSION["userType"] != 1 && $_SESSION["userType"] != 2)) {
    header('Location: ../commons/accessDenied.php');
  }

  include "../commons/config.php";
?>

<html>
  <head>
    <title>COVIDSYM - Symptoms and Risks</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/symptomsAndRisks.css" />

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
            <h1>Symptoms and Risks</h1>
          </div>
          <div class="symptoms">
            <h4>Fill in the following Symptoms and Risk Factors:</h4>
          </div>
          <form class="form" action="../appointment/checkSymptomsAndRisks.php" method="POST" onsubmit="return validateForm();">
            <table>
              <tr>
                <td><Label> Body Temperature(ºC)</Label></td>
                <td>
                  <input
                    id="temperature"
                    class="temperature"
                    name="temperature"
                    value="37.0"
                    type="number"
                    step=".5"
                    required
                  />
                </td>
                <td><label>Kidney Disease</label></td>
                <td><input name="kidney" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Dry Cough</label></td>
                <td>
                  <input name="cough" type="checkbox" value="true"/>
                </td>
                <td><label>Lung Disease</label></td>
                <td><input name="lung" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Sore Throat</label></td>
                <td><input name="throat" type="checkbox" value="true"/></td>
                <td><label>Heart Disease</label></td>
                <td><input name="heart" type="checkbox" value="true"/></td>
                
              </tr>
              <tr>
                <td><label>Weakness</label></td>
                <td>
                  <input name="weakness" type="checkbox" value="true"/>
                </td>
                <td><label>Recently Travelled</label></td>
                <td><input name="travelled" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Breathing Dificulties</label></td>
                <td><input name="breathing" type="checkbox" value="true"/></td>
                <td><label>High Blood Pressure</label></td>
                <td><input name="blood" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Drowsiness</label></td>
                <td><input name="drowsiness" type="checkbox" value="true"/></td>
                <td><label>Stroke or Reduced Imunity</label></td>
                <td><input name="stroke" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Chest Pain</label></td>
                <td><input name="pain" type="checkbox" value="true"/></td>
                <td><label>Diabetes</label></td>
                <td><input name="diabetes" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Change in Appetite</label></td>
                <td><input name="appetite" type="checkbox" value="true"/></td>
                <td><label>Symptoms Progressed</label></td>
                <td><input name="progressed" type="checkbox" value="true"/></td>
              </tr>
              <tr>
                <td><label>Loss of Smell</label></td>
                <td><input name="smell" type="checkbox" value="true"/></td>
                <td rowspan="2" colspan="2">
                  <div class="buttonSide">
                    <input type="submit" value="Submit" />
                  </div>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>

    <script src="../js/symptomsAndRisks.js"></script>
  </body>
</html>
