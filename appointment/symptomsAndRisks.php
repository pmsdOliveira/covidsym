<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - symptoms and Risks</title>

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
                <td><Label>Kidney Disease</Label></td>
                <td><input name="Kidney" type="checkbox" /></td>
              </tr>
              <tr>
                <td><Label>Dry Cough</Label></td>
                <td>
                  <input name="Cough" type="checkbox" />
                </td>
                <td><label>Lung Disease</label></td>
                <td><input name="Lung" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Sore Throat</label></td>
                <td><input name="Throat" type="checkbox" /></td>
                <td><label>Diabetes</label></td>
                <td><input name="Diabetes" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Weakness</label></td>
                <td>
                  <input name="Weakness" type="checkbox" />
                </td>
                <td><label>Recently Travelled</label></td>
                <td><input name="Travelled" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Breathing Dificulties</label></td>
                <td><input name="Breathing" type="checkbox" /></td>
                <td><label>High Blood Pressure</label></td>
                <td><input name="Blood" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Drownsiness</label></td>
                <td><input name="Drownsiness" type="checkbox" /></td>
                <td><label>Stroke or Reduced Imunity</label></td>
                <td><input name="Stroke" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Chest Pain</label></td>
                <td><input name="Pain" type="checkbox" /></td>
                <td><label>Symptoms Progressed</label></td>
                <td><input name="Symptoms" type="checkbox" /></td>
              </tr>
              <tr>
                <td><label>Change in Appetite</label></td>
                <td><input name="Appetite" type="checkbox" /></td>
                <td rowspan="2" colspan="2">
                  <input type="submit" value="Next" />
                </td>
              </tr>
              <tr>
                <td><label>Loss of Smell</label></td>
                <td><input name="Smell" type="checkbox" /></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
