<!DOCTYPE html>

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
          <form class="form" action="....." method="POST">
            <table>
              <tr>
                <td><Label> Body Temperature(ºC)</Label></td>
                <td>
                  <input
                    class="temperature"
                    name="temperature"
                    placeholder="00.0"
                    type="number"
                    step=".1"
                    required
                  />
                </td>
                <td><label>Kidney Disease</label></td>
                <td><input name="kidney" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Dry Cough</label></td>
                <td>
                  <input name="cough" type="checkbox" />
                </td>
                <td><label>Lung Disease</label></td>
                <td><input name="lung" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Sore Throat</label></td>
                <td><input name="throat" type="checkbox" /></td>
                <td><label>Diabetes</label></td>
                <td><input name="diabetes" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Weakness</label></td>
                <td>
                  <input name="weakness" type="checkbox" />
                </td>
                <td><label>Recently Travelled</label></td>
                <td><input name="travelled" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Breathing Dificulties</label></td>
                <td><input name="breathing" type="checkbox" /></td>
                <td><label>High Blood Pressure</label></td>
                <td><input name="blood" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Drowsiness</label></td>
                <td><input name="drowsiness" type="checkbox" /></td>
                <td><label>Stroke or Reduced Imunity</label></td>
                <td><input name="stroke" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Chest Pain</label></td>
                <td><input name="pain" type="checkbox" /></td>
                <td><label>Symptoms Progressed</label></td>
                <td><input name="progressed" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Change in Appetite</label></td>
                <td><input name="appetite" type="checkbox" /></td>
                <td rowspan="2" colspan="2">
                  <div class="buttonSide">
                    <input type="submit" value="Next" />
                  </div>
                </td>
              </tr>
              <tr>
                <td><label>Loss of Smell</label></td>
                <td><input name="smell" type="checkbox" /></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
