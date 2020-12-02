<html>
  <head>
    <title>COVIDSYM - User Clinical Registry</title>
    
    <link rel="icon" href="../img/icon.ico" type="image/icon type">

    <link rel="stylesheet" href="../css/registry.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    </script>
  </head>
  <body>
    <?php
        include "../commons/navbar.php";
    ?>

    <div class="modal">
      <div class="modal-header">
        <i class="fa fa-arrow-left goBackBtn">
          <a href="#"></a>
        </i>
        <h1 class="title">User Clinical Registry</h1>
      </div>
      <form action="submitUserRegistry.php" method="POST">
        <table class="form">
          <tr>
            <td><label>Name</label></td>
            <td><input name="name" type="text"></td>
          </tr>
          <tr>
            <td><label>Username</label></td>
            <td><input name="username" type="text"></td>
          </tr>
          <tr>
            <td><label>Email</label></td>
            <td><input name="email" type="email"></td>
          </tr>
          <tr>
            <td><label>Phone Number</label></td>
            <td><input name="phone" type="text"></td>
          </tr>
          <tr>
            <td><label>Address</label></td>
            <td><input name="address" type="text"></td>
          </tr>
          <tr>
            <td><label>Local</label></td>
            <td><input name="local" type="text"></td>
          </tr>
          <tr>
            <td><label>District</label></td>
            <td><input name="district" type="text"></td>
          </tr>
          <tr>
            <td><label>Birthdate</label></td>
            <td><input name="birthdate" type="date"></td>
          </tr>
          <tr>
            <td><label>Gender</label></td>
            <td><div class="gender">
              <label>Male<input name="gender" type="radio" value="male"></label>
              <label>Female<input name="gender" type="radio" value="female"></label>
              <label>Other<input name="gender" type="radio" value="other"></label>
            </div></td>
          </tr>
          <tr>
            <td><label>Fiscal Number</label></td>
            <td><input name="fiscal" type="text"></td>
          </tr>
          <tr>
            <td><label>Healthcare Number</label></td>
            <td><input name="healthcare" type="text"></td>
          </tr>
        </table>
        <input type="submit" value="Guardar">
      </form>
    </div>
  </body>
  <footer>
    <?php
      include('../commons/footer.php');
    ?>
  </footer>
</html>