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

            <div class="acc-kontainer">
              <div>
                <button class="accordion">Who are we?</button>

                <div class="panel">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque sit amet semper velit. Duis vel ex tincidunt, gravida
                  libero sed, fermentum enim. Vivamus non risus sed urna
                  fermentum aliquet. Ut tincidunt diam et orci auctor facilisis.
                  In hac habitasse platea dictumst. Praesent id varius lectus.
                  Duis facilisis viverra turpis ac consequat.
                </div>
              </div>
              <div>
                <button class="accordion">What do we do?</button>
                <div class="panel">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque sit amet semper velit. Duis vel ex tincidunt, gravida
                  libero sed, fermentum enim. Vivamus non risus sed urna
                  fermentum aliquet. Ut tincidunt diam et orci auctor facilisis.
                  In hac habitasse platea dictumst. Praesent id varius lectus.
                  Duis facilisis viverra turpis ac consequat.
                </div>
              </div>
              <div>
                <button class="accordion">
                  How does the Diagnostic Support System do?
                </button>
                <div class="panel">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque sit amet semper velit. Duis vel ex tincidunt, gravida
                  libero sed, fermentum enim. Vivamus non risus sed urna
                  fermentum aliquet. Ut tincidunt diam et orci auctor facilisis.
                  In hac habitasse platea dictumst. Praesent id varius lectus.
                  Duis facilisis viverra turpis ac consequat.
                </div>
              </div>
              <div>
                <button class="accordion">How can you prevent COVID-19</button>
                <div class="panel">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Quisque sit amet semper velit. Duis vel ex tincidunt, gravida
                  libero sed, fermentum enim. Vivamus non risus sed urna
                  fermentum aliquet. Ut tincidunt diam et orci auctor facilisis.
                  In hac habitasse platea dictumst. Praesent id varius lectus.
                  Duis facilisis viverra turpis ac consequat.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php');?>
    <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          }
        });
      }
    </script>
  </body>
</html>
