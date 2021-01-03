<!DOCTYPE html>

<html>
  <head>
    <title>COVIDSYM - User Clinical Registry</title>

    <link rel="icon" href="../img/icon.ico" type="image/icon type" />

    <link rel="stylesheet" href="../css/registry.css" />

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
            <h1>Personal Information</h1>
          </div>

          <table class="table">
            <tr>
              <td class="table_left">
                <div class="profile">
                  <h2>[Username]</h2>
                  <i class="fas fa-user-circle profileIcon"></i>
                  <button>Update Picture</button>
                  <button>Cancel</button>
                </div>
              </td>
              <td>
                <form action="submitUserRegistry.php" method="POST">
                  <table class="form">
                    <tr>
                      <td><label>Name</label></td>
                      <td>
                        <input
                          name="name"
                          placeholder="Name from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>Email</label></td>
                      <td>
                        <input
                          name="email"
                          placeholder="Email from DB"
                          type="email"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>Phone Number</label></td>
                      <td>
                        <input
                          name="phone"
                          placeholder="XXXXXXXXXX from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>Address</label></td>
                      <td>
                        <input
                          name="address"
                          placeholder="Adress from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>Local</label></td>
                      <td>
                        <input
                          name="local"
                          placeholder="Local from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>District</label></td>
                      <td>
                        <input
                          name="district"
                          placeholder="District from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>Birthdate</label></td>
                      <td><input name="birthdate" type="date" /></td>
                    </tr>
                    <tr>
                      <td><label>Gender</label></td>
                      <td>
                        <div class="gender">
                          <label
                            >Male<input name="gender" type="radio" value="male"
                          /></label>
                          <label
                            >Female<input
                              name="gender"
                              type="radio"
                              value="female"
                          /></label>
                          <label
                            >Other<input
                              name="gender"
                              type="radio"
                              value="other"
                          /></label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><label>Fiscal Number</label></td>
                      <td>
                        <input
                          name="fiscal"
                          placeholder="XXXXXXXX from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                    <tr>
                      <td><label>Healthcare Number</label></td>
                      <td>
                        <input
                          name="healthcare"
                          placeholder="XXXXXXXX from DB"
                          type="text"
                        />
                      </td>
                    </tr>
                  </table>
                  <input type="submit" value="Submit" />
                </form>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <?php include('../commons/footer.php'); ?>
  </body>
</html>
