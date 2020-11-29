<html>
  <head>
    <title>COVIDSYM - User Clinical Registry</title>
    <link rel="stylesheet" href="../css/registry.css">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    </script>
  </head>
  <body>
    <div class="container">
      <div class="title">
        <i class="fa fa-arrow-left goBack"></i>
        <h2 class="title">User Clinical Registry</h2>
      </div>
      <form style="display: block" action="submitUserRegistry.php" method="POST">
        <label>Name</label>
        <input name="name" type="text">
        <label>Username</label>
        <input name="username" type="text">
        <label>Email</label>
        <input name="email" type="email">
        <label>Phone Number</label>
        <input name="phone" type="text">
        <label>Address</label>
        <input name="address" type="text">
        <label>Local</label>
        <input name="local" type="text">
        <label>District</label>
        <input name="district" type="text">
        <label>Birthdate</label>
        <input name="phone" type="date">
        <label>Gender</label>
        <label>Male</label>
        <input name="gender" type="radio" value="male">
        <label>Female</label>
        <input name="gender" type="radio" value="female">
        <label>Other</label>
        <input name="gender" type="radio" value="other">
        <label>Fiscal Number</label>
        <input name="fiscal" type="text">
        <label>Healthcare Number</label>
        <input name="healthcare" type="text">
        <input type="reset" value="Limpar">
        <input type="submit" value="Guardar">
      </form>
    </div>
  </body>
</html>