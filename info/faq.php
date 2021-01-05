
<!DOCTYPE html>
<html>
  <head>
    <title>COVIDSYM - FAQ</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/faq.css" />
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
    <?php include "../commons/navbar.php";?>

    <div class="wrapper">
      <?php include "../commons/sidebar.php"; ?>

      <div class="content-wrapper">
        <div class="modal">
          <div class="modal-header">
            <i class="fas fa-arrow-alt-circle-left goBackBtn">
              <a href="#"></a>
            </i>
            <h1>Frequently Asked Questions</h1>
          </div>

          <div class="modal-content">
            <p>
              The FAQ page aims to address the issues considered most important
              by our clients. If your question is not answered on this page, do
              not hesitate to contact us via email.
            </p>

            <div class="acc-container">
              <div>
                <button class="accordion">Who are we?</button>

                <div class="panel">
                  A group of students of FTC-NOVA, it's part of a final project
                  for the subject "Sistemas de Informação Médica"
                </div>
              </div>
              <div>
                <button class="accordion">What do we do?</button>
                <div class="panel">
                  The COVIDSYM system is a system for registering and analysing
                  symptoms, which supports the doctor in prescribing COVID-19
                  tests through the assessment of the risk of the user being
                  diagnosed with COVID-19.
                </div>
              </div>
              <div>
                <button class="accordion">
                  How does the Diagnostic Support System do?
                </button>
                <div class="panel">
                  The risk assessment will be carried out automatically on the
                  basis of the recorded indicators, using a Diagnostic Support
                  System (SAD) implemented using decision trees
                </div>
              </div>
              <div>
                <button class="accordion">How can you prevent COVID-19</button>
                <div class="panel">
                  Wash your hands regularly. Maintain at least 1m of social
                  distancing. Stay home if you feel unwell. Wear a mask.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php');?>
    <script src="../js/faq.js"></script>
  </body>
</html>
